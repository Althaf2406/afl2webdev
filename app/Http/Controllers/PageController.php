<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('index');
    }
    public function corporate_governance(){
        return view('corporate_governance');
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
    public function company_overview(){
        return view('company_overview');
    }

}
