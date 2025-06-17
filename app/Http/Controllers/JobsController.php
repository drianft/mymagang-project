<?php

namespace App\Http\Controllers;
use app\Models\Hr;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index()
    {
        return view('jobs');  // pastikan nama view 'jobs' sesuai dengan nama file 'jobs.blade.php'
    }

    public function destroy($id)
    {
        $job = Hr::findOrFail($id);
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully');
    }

}
