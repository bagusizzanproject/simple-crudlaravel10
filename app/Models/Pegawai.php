<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Pegawai extends Model{
    use HasFactory;
    protected $guarded = [];
   
    protected static function booted(){
        static::created(function ($pegawai) {
            $storagePath = storage_path('app/public/' . $pegawai->id);
            if (!file_exists($storagePath)) {
                mkdir($storagePath, 0777, true);
            }
        });
    }
}
