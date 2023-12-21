<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GasCompanyController extends Controller
{
    public function bharat_gas()
    {
        return view('admin.bharat-gas');
    }

    public function go_gas()
    {
        return view('admin.go-gas');
    }

    public function pure_gas()
    {
        return view('admin.pure-gas');
    }

    public function hp_gas()
    {
        return view('admin.hp-gas');
    }
    public function reliance_gas()
    {
        return view('admin.reliance-gas');
    }
    public function indian_gas()
    {
        return view('admin.indian-gas');
    }

    public function other_gas()
    {
        return view('admin.other-gas');
    }
}
