<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use App\Models\Partner;

class PageController extends Controller
{
    public function index(){
        $partnerList = Partner::all();
        return view('index', compact('partnerList'));
    }
    public function gallery(){
        $galeriList = Galeri::paginate(6);
        return view('gallery', compact('galeriList'));
    }

}
