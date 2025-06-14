<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HRDashboardController extends Controller
{
    // Fungsi untuk menampilkan halaman HR Home
    public function index()
    {
        return view('hr-dashboard');  // Pastikan view 'hr-home.blade.php' sudah ada
    }
}
