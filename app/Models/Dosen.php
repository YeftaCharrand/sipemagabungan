<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dosen extends Model
{
    use HasFactory;
    // protected $table = 'dosens';
    // protected $primaryKey = 'id';

    protected $fillable = ['user_id','kelas_id','kode_dosen','nip','name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelas() //masi bingung pake hasone/belongsto
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
