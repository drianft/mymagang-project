<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Interview;
use App\Models\Post;
use App\Notifications\ApplicationDuplicateAttempt;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ApplicationSubmitted;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function apply(Post $post)
    {
        $user = Auth::user();
        $applier = $user->applier;

        if (!$applier) {
            return back()->with('error', 'Applier profile not found.');
        }

        // ✅ Cek apakah user sudah pernah apply (hindari duplikat)
        $alreadyApplied = Application::where('applier_id', $applier->id)
            ->where('post_id', $post->id)
            ->exists();

        if ($alreadyApplied) {
            $applier->notify(new ApplicationDuplicateAttempt());

            return back()->with('error', 'Kamu sudah pernah apply untuk pekerjaan ini.');
        }

        // ✅ Simpan aplikasi
        $application = Application::create([
            'applier_id' => $applier->id,
            'post_id' => $post->id,
            'application_status' => 'pending',
        ]);

        // ✅ Kirim notifikasi
        $applier->notify(new ApplicationSubmitted());

        return back()->with('success', 'Berhasil apply!');
    }


    public function store(Request $request)
    {
        $user = Auth::user();
        $applier = $user->applier;

        // Simpan aplikasi
        $application = Application::create([
            'applier_id' => $applier->id,
            'post_id' => $request->post_id,
            'application_status' => 'pending',
        ]);

        // Kirim notifikasi ke user/applier
        $applier->notify(new ApplicationSubmitted());

        return redirect()->back()->with('success', 'Berhasil apply!');
    }

    // list aplikasi milik user
    public function myApplications(Request $request)
    {
        $user = Auth::user();
        $applier = $user->applier;

        if (!$applier) {
            return redirect('/')->with('error', 'Applier profile not found.');
        }

        $query = $applier->applications()->with(['post', 'interview']);

        if ($request->filled('search')) {
            $search = strtolower($request->search);
            $query->whereHas('post', fn($q) => $q->whereRaw('LOWER(job_title) LIKE ?', ["%{$search}%"]));
        }

        if ($request->filled('status')) {
            $query->where('application_status', $request->status);
        }

        // Ambil semua applications milik applier ini
        $applications = $query
                        ->with('post', 'interview.hr.user')
                        ->latest()
                        ->paginate(20)
                        ->withQueryString();

        if ($request->ajax()) {
            return view('applications._ajax', compact('applications'))->render();
        }

        return view('applications.my', compact('applications'));
    }

    public function update(Request $request, Application $application)
    {
        $user = Auth::user();
        $hr = $user->hr;

        $status = $request->input('application_status');
        $application->application_status = $status;
        $application->save();

        // Cek jika status-nya jadi "interview"
        if ($status === 'interview' && $application->interview === null) {
            $interview = new Interview();
            $interview->application_id = $application->id;
            $interview->hr_id = $hr->id;
            $interview->save();

            return redirect()->route('interviews.edit', $interview->id)
                                ->with('success', 'Interview entry created, please fill the details.');
        }

        return back()->with('success', 'Application updated successfully.');
    }

    public function updateHr(Request $request, $id)
    {
         $application = Application::findOrFail($id);

        $request->validate([
            'application_status' => 'required|in:Accepted,Rejected',
        ]);

        $application->application_status = $request->application_status;
        $application->save();

        return redirect()->back()->with('success', 'Application status updated.');
    }

    public function show($id)
    {
        $application = Application::with(['applier.user', 'job'])->findOrFail($id);
        return view('applications.show', compact('application'));
    }

}
