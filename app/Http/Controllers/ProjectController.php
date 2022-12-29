<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    function showHome() {
        return view('home');
    }

    function showSubjects() {
        return view('subjects');
    }

    function showSubjectPerDay() {
        return view('subjectperday');
    }

    function showTimeSlots() {
        return view('timeslots');
    }
}
