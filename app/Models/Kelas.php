<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kelas extends Model
{
    use HasFactory;
    // protected $table = 'kelas';
    // protected $primaryKey = 'id';

    protected $fillable = ['name', 'jumlah'];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'kelas_id');
    }

    public function mahasiswa(): HasMany //belum ada model mahasiswa
    {
        return $this->hasMany(Mahasiswa::class, 'kelas_id');
    }

    public function request()
    {
        return $this->hasMany(RequestEdit::class);
    }
}
