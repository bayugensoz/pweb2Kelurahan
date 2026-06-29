<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Surat extends Model
{
    protected $fillable = ['nomor_surat', 'jenis_surat', 'tanggal_ajuan', 'berkas_pendukung', 'penduduk_id'];

    public function penduduk(): BelongsTo
    {
        return $this->belongsTo(Penduduk::class);
    }
}
