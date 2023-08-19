<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->string('nama');
            $table->char('jenis_kelamin',1);
            $table->string('alamat')->nullable();
            $table->string('agama');
            $table->string('no_telp');
            $table->string('email')->unique();
            $table->string('bidang')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('golongan')->nullable();
            $table->string('eselon')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('gelar_d')->nullable();
            $table->string('gelar_b')->nullable();
            $table->string('unit_kerja')->nullable();
            $table->string('foto')->nullable()->default('default_profil.jpg');
            $table->string('sk_cpns')->nullable();
            $table->string('sk_pns')->nullable();
            $table->string('sk_pelantikan')->nullable();
            $table->string('sk_penempatan')->nullable();
            $table->string('sk_jabatan')->nullable();
            $table->string('npwp')->nullable();
            $table->string('kgb')->nullable();
            $table->string('kp')->nullable();
            $table->string('bpjs')->nullable();
            $table->string('kk')->nullable();
            $table->string('skp')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('dpl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
