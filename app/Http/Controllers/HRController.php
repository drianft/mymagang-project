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
        $address = Auth::user()->address; // Ambil alamat dari user yang sedang login
        $jobs = Post::with('user')
            ->where('hr_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->with(['applications.user'])
            ->paginate(8); // Tambahkan pagination jika diperlukan
        // dd($jobs->first());

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
            'working_hour' => 'required|string',
            'salary' => 'required|string',
            'job_category' => 'required|string',
            'image_post_url' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        // Handle Image Upload

        $user = Auth::user();
        $hr = $user->hr;

        $imagePath = null;
        if ($request->hasFile('image_post_url')) {
            $imagePath = $request->file('image_post_url')->store('image_post_url', 'public');
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
            'working_hour' => 'required|string',
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
    public function showApplicants()
    {
        $hrId = Auth::user()->id;

        $totalApplicants = Application::whereHas('post', function($query) use ($hrId) {
            $query->where('company_id', $hrId);
        })->count();

        $applications = Application::whereHas('post', function($query) use ($hrId) {
        $query->where('hr_id', $hrId);
        })->paginate(4);
        $jobs = Post::where('hr_id', $hrId)
        ->with('applications.applier.user') // eager load semua data yang dibutuhkan
        ->get();

        $applicantCount = Application::whereHas('post', function($query) use ($hrId) {
            $query->where('hr_id', $hrId);
        })->count();
        $acceptedCount = Application::whereHas('post', function($query) use ($hrId) {
            $query->where('hr_id', $hrId);
        })->where('application_status', 'Accepted')->count();
        $rejectedCount = Application::whereHas('post', function($query) use ($hrId) {
            $query->where('hr_id', $hrId);
        })->where('application_status', 'Rejected')->count();
        $pendingCount = Application::whereHas('post', function($query) use ($hrId) {
            $query->where('hr_id', $hrId);
        })->where('application_status', 'Pending')->count();

        $applicationDates = Application::select('id', 'applied_at') // atau tambah 'name', dst. sesuai kebutuhan
        ->whereHas('post', function($query) use ($hrId) {
            $query->where('hr_id', $hrId);
        })->get();


        return view('hr.hr-dashboard', [
            'applicantCount' => $applicantCount,
            'acceptedCount' => $acceptedCount,
            'rejectedCount' => $rejectedCount,
            'pendingCount' => $pendingCount,
            'totalApplicants' => $totalApplicants,
            'applications' => $applications,
            'jobs' => $jobs,
            'applicationDates' => $applicationDates,
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
