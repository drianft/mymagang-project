<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Application;;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::whereHas('job', function($query) {
        $query->where('company_id', Auth::user()->id);
        })->paginate(4);

        return view('application', compact('applications'));

        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $application = Application::with(['applier.user', 'job'])->findOrFail($id);
        return view('applications.show', compact('application'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $application = Application::findOrFail($id);
        $application->status = $request->status;
        $application->save();

        return response()->json(['message' => 'Status updated']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(application $application)
    {
        //

    }
}
