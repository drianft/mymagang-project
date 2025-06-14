<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::with(['post.hr', 'post.company', 'applier'])->paginate(20);

        return view('application', compact('applications'));
    }
}
