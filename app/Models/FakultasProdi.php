<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FakultasProdi extends Model
{
    protected $table = "fakultas_prodi";
    // protected $primaryKey = "kode";
    protected $fillable = ["kode", "prodi", "fakultas"];
}
