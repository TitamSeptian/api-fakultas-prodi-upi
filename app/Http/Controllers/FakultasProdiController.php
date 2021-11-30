<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FakultasProdi as FP;

class FakultasProdiController extends Controller
{
    public function getFakultasProdi()
    {
        $data = FP::all();
        return response()->json($data, 200);
    }

    public function getFakultas()
    {
        $data = FP::select("fakultas")->groupBy("fakultas")->orderBy("fakultas")->get();
        return response()->json($data, 200);
    }

    public function getProdiByFakultas($fakultas)
    {
        $data = FP::select("kode", "prodi")->where("fakultas", $fakultas)->orderBy("prodi")->get();
        return response()->json($data, 200);
    }

    public function getProdi()
    {
        $data = FP::select("kode", "prodi")->orderBy("prodi")->get();
        return response()->json($data, 200);
    }

    public function getProdiByKode($kode)
    {
        $data = FP::where("kode", $kode)->first();
        return response()->json($data, 200);
    }
}
