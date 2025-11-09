<?php

namespace App\Http\Controllers;
use App\Models\Partner; 


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $partnerList = Partner::all(); 
        return view('index', compact('partnerList'));
    }
}

