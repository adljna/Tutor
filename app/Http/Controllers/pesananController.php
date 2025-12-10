<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class pesananController extends Controller
{
    // ======================================================
    // AKTIVITAS AKAN DATANG (tanggal > hari ini)
    // ======================================================
    public function akanDatang()
    {
        $today = Carbon::today()->toDateString();

        $akanDatang = DB::table('pesanan')
            ->join('sesi', 'pesanan.idsesi', '=', 'sesi.idsesi')
            ->join('tutor', 'sesi.idtutor', '=', 'tutor.idtutor')
            ->join('matakuliah', 'sesi.idmatkul', '=', 'matakuliah.idmatkul')
            ->select(
                'pesanan.*',
                'tutor.nama AS namatutor',
                'tutor.fototutor AS foto',
                'matakuliah.namamatkul AS matkul'
            )
            ->whereDate('pesanan.tanggal', '>', $today)
            ->get();

        return view('Aktivitas-AkanDatang', compact('akanDatang'));
    }

    // ======================================================
    // AKTIVITAS BERLANGSUNG (tanggal == hari ini)
    // ======================================================
    public function berlangsung()
    {
        $today = Carbon::today()->toDateString();

        $berlangsung = DB::table('pesanan')
            ->join('sesi', 'pesanan.idsesi', '=', 'sesi.idsesi')
            ->join('tutor', 'sesi.idtutor', '=', 'tutor.idtutor')
            ->join('matakuliah', 'sesi.idmatkul', '=', 'matakuliah.idmatkul')
            ->select(
                'pesanan.*',
                'tutor.nama AS namatutor',
                'tutor.fototutor AS foto',
                'matakuliah.namamatkul AS matkul'
            )
            ->whereDate('pesanan.tanggal', '=', $today)
            ->get();

        // 🔥 PERBAIKAN DI SINI: view-nya harus sama dengan nama file blade kamu
        return view('Aktivitas-Berlangsung', compact('berlangsung'));
    }

    // ======================================================
    // AKTIVITAS LAMPAU (tanggal < hari ini)
    // ======================================================
    public function lampau()
    {
        $today = Carbon::today()->toDateString();

        $lampau = DB::table('pesanan')
            ->join('sesi', 'pesanan.idsesi', '=', 'sesi.idsesi')
            ->join('tutor', 'sesi.idtutor', '=', 'tutor.idtutor')
            ->join('matakuliah', 'sesi.idmatkul', '=', 'matakuliah.idmatkul')
            ->select(
                'pesanan.*',
                'tutor.nama AS namatutor',
                'tutor.fototutor AS foto',
                'matakuliah.namamatkul AS matkul'
            )
            ->whereDate('pesanan.tanggal', '<', $today)
            ->get();

        return view('Aktivitas-Lampau', compact('lampau'));
    }
}
