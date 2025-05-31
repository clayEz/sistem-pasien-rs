<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PasienController extends Controller
{
    /**
     * Menampilkan daftar pasien
     */


    public function daftarPasien(Request $request)
    {
        // Query dasar
        $query = Pasien::query();
        
        // Pencarian berdasarkan nama atau no RM
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('nama_pasien', 'like', "%{$search}%")
                  ->orWhere('no_rm', 'like', "%{$search}%");
            });
        }
        
        // Filter berdasarkan jenis kelamin
        if ($request->has('gender') && in_array($request->gender, ['L', 'P'])) {
            $query->where('gender', $request->gender);
        }
        
        // Urutkan dan paginasi
        $pasiens = $query->orderBy('nama_pasien')->paginate(10);
        
        return view('daftarpasien', compact('pasiens'));
    }

    /**
     * API untuk mendapatkan data pasien (JSON)
     */
    public function getDataPasien()
    {
        $pasiens = Pasien::select('no_rm', 'nama_pasien', 'gender', 'no_telp')
                        ->orderBy('nama_pasien')
                        ->get();
        
        return response()->json([
            'success' => true,
            'data' => $pasiens
        ]);
    }
}