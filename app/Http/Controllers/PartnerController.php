<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function adminPage(Request $request){
        if ($request->has('search')) {
            $partnerList = Partner::where('nama', 'like', '%' . $request->search . '%')->paginate(6);
            return view('partner', compact('partnerList'));
        } else {
            $partnerList = Partner::paginate(6);
            return view('partner', compact('partnerList'));
        }
    }
}
