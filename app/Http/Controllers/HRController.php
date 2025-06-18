<?php

namespace App\Http\Controllers;

use App\Models\Post; // Ini pastikan kamu pakai model yang sesuai dengan tabel jobs\
use App\Models\Application;
use App\Models\Company;
use App\Models\Hr;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HRController extends Controller
{
    // Dashboard Utama - hanya tampilkan post milik HR yang login
    public function index()
    {
        $userId = Auth::id();

        // Ambil HR yang sesuai dengan user login
        $hr = Hr::where('user_id', $userId)->first();

        if (!$hr) {
            return abort(404, 'HR profile not found.');
        }

        // Ambil semua job dari HR tersebut
        $jobs = Post::with('hr')->where('hr_id', $hr->id)->get();

        return view('hr.jobs', compact('jobs'));
    }


    // Tampilkan daftar semua job milik HR ini

public function jobIndex()
{
    $userId = Auth::id();
    $address = Auth::user()->address;

    $hr = Auth::user()->hr; // Ambil HR yang lagi login

    if (!$hr) {
        return redirect()->back()->with('error', 'HR profile not found.');
    }

    $jobs = Post::with('hr.user')
        ->where('hr_id', $hr->id) // Ini yang bener
        ->orderBy('created_at', 'desc')
        ->with(['applications.applier.user'])
        ->paginate(8);

    return view('hr.jobs', compact('jobs', 'userId', 'address'));
}



    public function JobCreate()
    {
        $user = Auth::user();
        $hr = Hr::where('user_id', $user->id)->first();

        if (!$hr) {
            return redirect()->route('hr-home')->with('error', 'HR profile not found.');
        }

        $company = $hr->company;

        return view('hr.hr-posts', compact('company'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'job_description' => 'required|string',
            'working_hour' => 'required|integer|min:1',
            'salary' => 'required|string',
            'job_category' => 'required|string',
            'image_post_url' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        // Handle Image Upload

        $user = Auth::user();
        $hr = $user->hr;

        $imagePath = null;
        if ($request->hasFile('image_post_url')) {
            $imagePath = $request->file('image_post_url')->store('job-images', 'public');
        }

        Post::create([
            'job_title' => $request->job_title,
            'job_description' => $request->job_description,
            'working_hour' => $request->working_hour,
            'salary' => $request->salary,
            'category' => $request->job_category, // FIXED!
            'image_post_url' => $imagePath,
            'status' => 'open',
            'hr_id' => $hr->id,
            'company_id' => $hr->company_id,
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job post created successfully.');
    }





    // Tampilkan form edit job
    public function editPost($id)
    {
        $post = Post::findOrFail($id);
        $user = Auth::user();

        // Pastikan hanya HR pemilik post yang bisa mengedit
        if ($post->hr->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $company = $post->company;

        return view('hr.hr-posts-edit', compact('post', 'company'));
    }


    // Update job
    public function updatePost(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $user = Auth::user();

        if ($post->hr->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'job_title' => 'required|string|max:255',
            'job_description' => 'required|string',
            'working_hour' => 'required|integer|min:1',
            'salary' => 'required|string',
            'job_category' => 'required|string',
            'image_post_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Cek kalau user upload file baru
        if ($request->hasFile('image_post_url')) {
            $imagePath = $request->file('image_post_url')->store('image_post_url', 'public');
            $post->image_post_url = $imagePath;
        }

        $post->update([
            'job_title' => $request->job_title,
            'job_description' => $request->job_description,
            'working_hour' => $request->working_hour,
            'salary' => $request->salary,
            'category' => $request->job_category,
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job post updated successfully.');
    }


    // Hapus job
    public function destroyJob($id)
    {
        $job = Post::findOrFail($id);

        // Pastikan job yang dihapus milik HR yang sedang login
        if ($job->hr_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }

    // Halaman show applicants
    public function showApplicants(Request $request)
    {
        $hrId = Auth::user()->hr->id;

        $totalApplicants = Application::whereHas('post', function($query) use ($hrId) {
            $query->where('company_id', $hrId);
        })->count();

        $applications = Application::whereHas('post', function($query) use ($hrId) {
        $query->where('hr_id', $hrId);
        })->paginate(4);
        $jobs = Post::where('hr_id', $hrId)
        ->with('applications.applier.user') // eager load semua data yang dibutuhkan
        ->get();


        $applicationDates = Application::select('id', 'created_at') // atau tambah 'name', dst. sesuai kebutuhan
        ->whereHas('post', function($query) use ($hrId) {
            $query->where('hr_id', $hrId);
        })->get();

        $search = $request->input('search');

        $applicationsSearch = Application::with('applier')
        ->whereHas('post', function ($q) use ($hrId) {
            $q->where('hr_id', $hrId);
        })
        ->when($search, function ($q) use ($search) {
            $q->where(function ($query) use ($search) {
                $query->whereHas('user', fn($q2) =>
                    $q2->where('name', 'like', '%' . $search . '%')
                )
                ->orWhere('application_status', 'like', '%' . $search . '%');
            });
        })
        ->latest()
        ->get();


        return view('hr.hr-dashboard', [
            'totalApplicants' => $totalApplicants,
            'applications' => $applications,
            'jobs' => $jobs,
            'applicationDates' => $applicationDates,
            'applicationsSearch' => $applicationsSearch,
            // tambahkan variabel lainnya kalau ada
        ]);
    }


    // Halaman show company
    public function showCompany()
    {
        return view('hr.company');
    }

    // Halaman show jobs (bisa khusus tampilan slider kayak di dashboard)
    public function showJob()
    {
        return view('hr.jobs');
    }

    public function show(Post $post)
    {
        $user = Auth::user();
        $hr = Hr::where('user_id', $user->id)->first();

        if (!$hr) {
            abort(403, 'HR tidak ditemukan.');
        }

        $company = $hr->company;



        // Load applications + applier + user
        $post->load('applications.applier.user');

        return view('hr.hr-post-view', compact('post', 'company', 'hr'));
    }




    public function showPost()
    {
        $user = Auth::user();
        $company = $user->company;
        return view('hr.posts');
    }

    public function createPostForm()
    {
        $user = Auth::user();
        $company = $user->company;

        return view('hr.posts', compact('company'));
    }
}
