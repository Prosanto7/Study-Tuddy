<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    function Home() {
        return view('homepage');
    }

    function About() {
        return view('aboutpage');
    }

    function Contact() {
        return view('contactpage');
    }

    function MyName($namevalue) {
        return "Hi " . $namevalue . "!";
    }

    function MyFullName($firstName, $middleName, $lastName) {
        $message = "<script>alert('hi');</script>";
        return view('namepage', ['firstKey'=>$firstName, 'middleKey'=>$middleName, 'lastKey'=>$lastName, 'message'=>$message]);
    }
}
