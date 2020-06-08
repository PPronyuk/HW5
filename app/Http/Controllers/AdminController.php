<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedback::latest()->get();

        return view('adminPage', compact('feedbacks'));
    }

}
