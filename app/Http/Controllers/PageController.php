<?php

namespace App\Http\Controllers;


use App\Models\Partner;

class PageController extends Controller
{
    public function index(){
        $partnerList = Partner::all();
        return view('index', compact('partnerList'));
    }


}
