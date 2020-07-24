<?php

namespace App\Http\Controllers;

use App\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, District $district)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
        //
    }

    public static function sendMessage($number, $message)
    {
        $apicode = env("ITEXMO_API_CODE");
        $passwd = env("ITEXMO_PASSWORD");
        $url = 'https://www.itexmo.com/php_api/api.php';
        $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
        $param = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($itexmo),
            ),
        );
        dd($param);
        $context  = stream_context_create($param);
        $result = file_get_contents($url, false, $context);
        if ($result == "") {
            return back()->with(['error' => "No response from server!"]);
        }
    }

    /**
     * Send message to a selected users
     */
    public function sendCustomMessage(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'districts' => 'required|array',
            'textmessage' => 'required',
        ]);
        $districts = $validatedData["districts"];
        // iterate over the arrray of districts and send a itexmo request for each
        foreach ($districts as $district) {
            // dd(District::findOrFail($district)->recipients);
            foreach (District::findOrFail($district)->recipients as $recipient) {
                $this->sendMessage($recipient->phone, $validatedData["textmessage"]);
            }
        }
        return back()->with(['success' => "Messages on their way!"]);
    }
}
