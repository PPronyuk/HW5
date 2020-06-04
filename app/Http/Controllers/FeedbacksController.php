<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Feedback;

class FeedbacksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contacts');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeedbackRequest $request)
    {
        $validatedInput = $request->validated();

        Feedback::create($validatedInput);

        return redirect()->route('contacts')->with('msgSent', 'Y');
    }


}
