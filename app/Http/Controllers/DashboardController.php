<?php

namespace App\Http\Controllers;
use App\Models\Buku;

class DashboardController extends Controller
{
    public function index()
    { 
        $jumlahJenis = Buku::count();
        $totalBuku = Buku::sum('jumlah');
        $stokMenipis = Buku::where('jumlah', '>', 0)
            ->where('jumlah', '<=', 5)
            ->count();

        $bukuHabis = Buku::where('jumlah', 0)->count();

        return view('dashboard', compact(
            'jumlahJenis',
            'totalBuku',
            'stokMenipis',
            'bukuHabis'
        ));
        
    }
}
