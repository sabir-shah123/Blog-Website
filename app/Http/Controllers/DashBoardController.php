<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index(){
        $page_title = 'Dashboard';
        return view('backend.dashboard',compact('page_title'));
    }
}
