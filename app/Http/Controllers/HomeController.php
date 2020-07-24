<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $districts = App\District::all()->sortBy('name');
        // dd($districts);
        return view('home', [
            'districts' => $districts,
            'server' => $this->server_status(),
            'api' => $this->api_status(),
        ]);
    }

    public function server_status()
    {
        $apicode = env("ITEXMO_API_CODE");
        $url = "https://www.itexmo.com/php_api/serverstatus.php?apicode={$apicode}";
        $result = json_decode(file_get_contents($url));
        return $result->result->APIStatus;
    }

    public function api_status()
    {
        $apicode = env("ITEXMO_API_CODE");
        $url = "https://www.itexmo.com/php_api/apicode_info.php?apicode={$apicode}";
        $result = json_decode(file_get_contents($url));
        return $result->{'Result '}->MessagesLeft;
    }
}
