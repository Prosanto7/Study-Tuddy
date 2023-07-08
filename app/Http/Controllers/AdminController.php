<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function showAdmin(Request $request) {
        if ($request->session()->has('admin')) {
            $classes = DB::table('admin_classes')->get();
            $subjects = DB::table('admin_subjects')->get();
            return view('admin-subject', ['classes' => $classes, 'subjects' => $subjects]);
        } else {
            return back();
        }
    }

    public function logout(Request $request) {
        if ($request->session()->has('admin')) {
            Session::flush();
            return redirect('login')->with('success', 'Logged out from admin Successfully!');
        } else {
            return back();
        }
    }

    function addClass(Request $request) {
        $rules = [
            'className' => 'required',
        ];

        $customMessage = [
            'className.required' => 'The class name field is required.',
        ];

        $this->validate($request, $rules, $customMessage);

        $classes = DB::table('admin_classes')->get();
    
        foreach($classes as $class) {
            if ($class->class_name == $_POST['className']) {
                return back()->with('error','Class ' . $_POST['className'] . ' is added already!');
            }
        }

        DB::table('admin_classes')->insert([
            'id' => null,
            'class_name' => $_POST['className']
        ]);

        return back()->with('success','Class ' . $_POST['className'] . ' added Successfully!');
    }

    function deleteClass() {
        DB::table('admin_classes')->where('id', $_POST['rowId'])->delete();
        return back()->with('success','Class deleted Successfully.');
    }

    function updateClass() {
        $classes = DB::table('admin_classes')->get();
    
        foreach($classes as $class) {
            if ($class->class_name == $_POST['className']) {
                return back()->with('error','Class ' . $_POST['className'] . ' is added already!');
            }
        }

        DB::table('admin_classes')->where('id', $_POST['rowId'])->update(['class_name' => $_POST['className']]);

        return back()->with('success','Class updated Successfully.');
    }

    function addAdminSubject(Request $request) {
        $subjects = DB::table('admin_subjects')->where('class_id', $request->classId)->get();
    
        foreach($subjects as $subject) {
            if ($subject->subject_name ==  $request->subjectName) {
                return back()->with('error','Subject ' . $request->subjectName . ' is added already!');
            }
        }

        $filename = "";

        if($request->file('resourceFile')) 
        {
            $file = $request->file('resourceFile');
            $filename = time() . '.' . $request->file('resourceFile')->extension();
            $filePath = public_path() . '/files/uploads/';
            $file->move($filePath, $filename);
        }

        DB::table('admin_subjects')->insert([
            'id' => null,
            'class_id' =>  $request->classId,
            'subject_name' => $request->subjectName,
            'file_name' => $filename,
        ]);

        return redirect()->to('admin/#'.$request->classId);
    }

    function updateAdminSubject($classId) {
        $subjects = DB::table('admin_subjects')->where('class_id', $classId)->get();

        foreach($subjects as $subject) {
            if (($subject->class_id ==  $classId) && ($subject->subject_name == $_POST["subjectName"])) {
                return back()->with('error','Subject ' . $_POST["subjectName"] . ' is added already!');
            }
        }

        DB::table('admin_subjects')->where('id', $_POST['rowId'])->update(['subject_name' => $_POST['subjectName']]);

        return redirect()->to('admin/#'.$classId);
    }

    function updateAdminSubjectFile($classId, Request $request) {
        $filename = "";

        if($request->file('resourceFile')) 
        {
            $file = $request->file('resourceFile');
            $filename = time() . '.' . $request->file('resourceFile')->extension();
            $filePath = public_path() . '/files/uploads/';
            $file->move($filePath, $filename);
        }

        if ($filename != "") {
            DB::table('admin_subjects')->where('id', $_POST['rowId'])->update(['file_name' => $filename]);
        }

        return redirect()->to('admin/#'.$classId);
    }

    function deleteAdminSubject($classId) {
        DB::table('admin_subjects')->where('id', $_POST['rowId'])->delete();
        return redirect()->to('admin/#'.$classId);
    }
}
