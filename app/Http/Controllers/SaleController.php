<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index(){
        return view('layouts.sidebar.sale');
    }

    public function detail(){
        return view('layouts.sidebar.detail');
    }
}
