<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectsPerDay;

class ProjectController extends Controller
{
    function showHome() {
        return view('home');
    }

    function showSubjects() {
        return view('subjects');
    }

    function showSubjectsPerDay() {
        $subjectsPerDay = SubjectsPerDay::find(\Auth::id());
        return view('subjectperday', ['subjectsPerDay' => $subjectsPerDay]);
    }

    function updateSubjectsPerDay() {
        $subjectsPerDay = SubjectsPerDay::find(\Auth::id());
        
            $subjectsPerDay->saturday = $_POST['saturdayValue'];
        
            $subjectsPerDay->sunday = $_POST['sundayValue'];
        
            $subjectsPerDay->monday = $_POST['mondayValue'];
        
            $subjectsPerDay->tuesday = $_POST['tuesdayValue'];
        
            $subjectsPerDay->wednesday = $_POST['wednesdayValue'];
        
            $subjectsPerDay->thursday = $_POST['thursdayValue'];
        
            $subjectsPerDay->friday = $_POST['fridayValue'];
        
        $subjectsPerDay->save();
        return back()->with('success','Days Updated Successfully.');
    }

    function showTimeSlots() {
        return view('timeslots');
    }
}
