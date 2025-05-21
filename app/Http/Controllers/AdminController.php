<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\application;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
     $search = $request->input('search');

    $users = User::query()
        ->when($search, function ($query, $search) {
            $query->where('fullName', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
        })
        ->get();
    return view('admin.user', compact('users'));
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
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
    public function showUsers()
    {
    // $users = User::all();
    // return view('admin.user', compact('user'));
     $users = User::all(); // ambil semua data user dari database
    return view('admin.user', compact('users'));

    }

    public function showCompanys()
    {
    // $users = User::all();
    // return view('admin.user', compact('user'));
     $companies = Company::all(); // ambil semua data company dari database
    return view('admin.company', compact('companies'));

    }

    public function showApplicant()
    {
    // $users = User::all();
    // return view('admin.user', compact('user'));
     $application = application::all(); // ambil semua data user dari database
    return view('admin.application', compact('application'));

    }
}
