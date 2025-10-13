<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;


class PartnerController extends Controller
{
    public function index()
    {
        $partnerList = Partner::all();
        return view('index', compact('partnerList'));
    }
}
