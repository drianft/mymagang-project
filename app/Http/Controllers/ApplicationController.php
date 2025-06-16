<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Post;
use App\Notifications\ApplicationDuplicateAttempt;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ApplicationSubmitted;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    // handle apply
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
    public function myApplications()
    {
        $applications = Application::with('post')
            ->where('applier_id', Auth::id())
            ->get();

        return view('applications.my', compact('applications'));
    }
}
