<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MobilController extends Controller
{
    public function jual()
    {
        return view('mobil.jual');
    }

    public function beli()
    {
        return view('mobil.beli');
    }

    public function detail()
    {
        return view('mobil.detail');
    }
}
