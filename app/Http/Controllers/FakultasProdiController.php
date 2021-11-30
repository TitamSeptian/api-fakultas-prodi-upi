<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FakultasProdi as FP;

class FakultasProdiController extends Controller
{
    public function __construct()
    {
        $this->univ = "Universitas Pendidikan Indonesia";
    }
    public function getFakultasProdi()
    {
        $data = [];
        $fakultas = FP::select("fakultas")->groupBy("fakultas")->get();
        foreach ($fakultas as $f) {
            $x = [
                "namaFakultas" => $f->fakultas,
                "listProdi" => FP::where("fakultas", $f->fakultas)->get(),
            ];
            array_push($data, $x);
        }
        return response()->json([
            "universitas" => $this->univ,
            "listFakultas" => $data,
        ], 200);
    }

    public function getFakultas()
    {
        $data = FP::selectRaw("fakultas as namaFakultas")->groupBy("fakultas")->orderBy("fakultas")->get();
        return response()->json(["data" => $data], 200);
    }

    public function getProdiByFakultas($fakultas)
    {
        $data = FP::select("kode as kodeProdi", "prodi as namaProdi")->where("fakultas", $fakultas)->orderBy("prodi")->get();
        if (count($data) <= 0) {
            return response()->json(["errors" => [
                "status" => "404",
                "title" => "Tidak ditemukan",
                "detail" => "Prodi dari fakultas bersangkutan tidak ditemukan"
            ]], 404);
        } else {
            return response()->json(["data" => [
                "namaFakultas" => $fakultas,
                "listProdi" => $data,
            ]], 200);
        }
    }

    public function getProdi()
    {
        $data = FP::select("kode", "prodi")->orderBy("prodi")->get();
        return response()->json(["data" => $data], 200);
    }

    public function getProdiByKode($kode)
    {
        $data = FP::where("kode", $kode)->first();
        if (!$data) {
            return response()->json(["errors" => [
                "status" => "404",
                "title" => "Tidak ditemukan",
                "detail" => "Kode Prodi tidak ditemukan",
            ]], 404);
        } else {
            return response()->json(["data" => $data], 200);
        }
    }
}
