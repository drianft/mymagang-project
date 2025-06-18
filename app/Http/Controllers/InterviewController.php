<?php

namespace App\Http\Controllers;

use App\Models\interview;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    public function store(Request $request, $applicationId)
    {
        $request->validate([
            'interview_time' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        $application = Application::findOrFail($applicationId);

        // Cek apakah HR nya ada
        $hr = Auth::user()->hr;
        if (!$hr) {
            return back()->with('error', 'HR profile not found.');
        }

        // Cek apakah sudah ada interview sebelumnya
        $existing = Interview::where('application_id', $applicationId)->first();
        if ($existing) {
            return back()->with('error', 'Interview already set.');
        }

        // Simpan interview baru
        Interview::create([
            'application_id' => $application->id,
            'hr_id' => $hr->id, // ini yg bener! integer ID nya
            'interview_time' => $request->interview_time,
            'location' => $request->location,
        ]);

        // Update status application
        $application->application_status = 'interview';
        $application->save();

        return redirect()->back()->with('success', 'Interview successfully scheduled.');
    }


    /**
     * Display the specified resource.
     */
    public function show(interview $interview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(interview $interview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, interview $interview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(interview $interview)
    {
        //
    }
}
