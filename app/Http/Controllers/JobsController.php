<?php

namespace App\Http\Controllers;
use app\Models\job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index()
    {
        return view('jobs');  // pastikan nama view 'jobs' sesuai dengan nama file 'jobs.blade.php'
    }
    
}
