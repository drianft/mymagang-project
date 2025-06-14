<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HRPostController extends Controller
{
    public function index()
    {
        return view('hr-posts');
    }
}
