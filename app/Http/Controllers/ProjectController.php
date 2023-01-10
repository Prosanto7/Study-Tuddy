<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $timeSlots = DB::table('time_slots')->where('user_id', \Auth::id())->get();
        return view('timeslots', ['timeSlots' => $timeSlots]);
    }

    function deleteTimeSlot() {
        DB::table('time_slots')->where('id', $_POST['rowId'])->delete();
        return back()->with('success','Time Slot deleted Successfully.');
    }

    function addTimeSlot() {
        if ($_POST['start'] >= $_POST['end']) {
            return back()->with('error','Invalid Time Slot');
        }

        $timeSlots = DB::table('time_slots')->where('user_id', \Auth::id())->get();

        foreach($timeSlots as $timeSlot) {
            if ($_POST['start'] > $timeSlot->start && $_POST['start'] < $timeSlot->end) { 
                return back()->with('error','Given time slot is already taken between ' . date('h:i:s A', strtotime($timeSlot->start)) . ' to ' . date('h:i:s A',strtotime($timeSlot->end)));
            } else if ($_POST['end'] > $timeSlot->start && $_POST['end'] < $timeSlot->end) { 
                return back()->with('error','Given time slot is already taken between ' . date('h:i:s A', strtotime($timeSlot->start)) . ' to ' . date('h:i:s A',strtotime($timeSlot->end)));
            }
        }

        if ($_POST['addTime'] == '0') {
            $id = (int) \Auth::id() + 1;
        } else {
            $id = (int) $_POST['addTime'] + 1;
        }

        DB::table('time_slots')->insert([
            'id' => $id,
            'user_id' => \Auth::id(),
            'start' => $_POST['start'],
            'end' => $_POST['end']
        ]);

        return back()->with('success','Time Slot added Successfully.');
    }
}
