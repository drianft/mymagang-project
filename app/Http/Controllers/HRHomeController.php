<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HRHomeController extends Controller
{
    // Fungsi untuk menampilkan halaman HR Home
    public function index()
    {
        return view('hr-home');  // Pastikan view 'hr-home.blade.php' sudah ada
    }
}
