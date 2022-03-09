<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GetapiData extends Controller
{

    public function index()
    {
        $api_responece = Http::get('https://reqres.in/api/users?page=2');
        $responce = json_decode($api_responece);
        $res = $responce->data;
        // dd($responce->data);
        return view('indexApi', compact('res'));
    }

}
