<?php

namespace App\Http\Controllers;

use Auth;
use App\District;
use App\Recipient;
use Illuminate\Http\Request;

class RecipientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipients = Recipient::all();
        return view('home', compact('recipients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::all();
        return view('recipient.create', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subscribe()
    {
        $districts = District::all();
        return view('recipient.subscribe', compact('districts'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //run validation on data sent in
        $validatedData = $request->validate([
            'district_id' => ['required', 'numeric'],
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'unique:recipients', 'numeric'],
        ]);
        $recipient = new Recipient($request->all());
        $recipient->save();
        $message = "Thank you for subscribing, {$recipient->firstname}! In the future, you will be notified with tsunami alerts.";
        DistrictController::sendMessage($recipient->phone, $message);
        if (Auth::check()) {
            $message = "{$recipient->firstname} {$recipient->lastname} ({$recipient->phone}) has been registered.";
        } else {
            $message = "Thank you for subscribing, {$recipient->firstname}! In the future, you will be notified with tsunami alerts.";
        }
        return back()->with(['success' => $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipient  $recipient
     * @return \Illuminate\Http\Response
     */
    public function show(Recipient $recipient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipient  $recipient
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipient $recipient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipient  $recipient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipient $recipient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipient  $recipient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipient $recipient)
    {
        //
    }
}
