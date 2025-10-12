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
    public function galeri(){
        $galeriList = Galeri::paginate(6);
        return view('gallery', compact('galeriList'));
    }
    public function investor_relation(){
        return view('investor_relation');
    }
    public function mining_assets(){
        return view('mining_assets');
    }
    public function project_data(){
        return view('project_data');
    }   

}
