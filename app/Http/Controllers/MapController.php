<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function map(){
        $data= [
            "title" => "Petaku",
        ];
        return view('map', $data);
    }
    public function table(){
        $data=[
            "title" => "Table"
        ];
        return view('table', $data);
    }

}
