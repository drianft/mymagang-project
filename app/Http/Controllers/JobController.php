<?php

namespace App\Http\Controllers;

use App\Models\Job; // Sesuaikan dengan model Anda
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully');
    }
}
