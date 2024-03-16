<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profileadminController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }
}
