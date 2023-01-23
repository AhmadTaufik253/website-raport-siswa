<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matapelajaran extends Model
{
    use HasFactory;

    protected $table = 'mata_pelajaran';

    protected $fillable = [
        'nama_pelajaran', 'akm'
    ];

    public function raports()
    {
        return $this->belongsTo(Raport::class, 'id_pelajaran', 'id');
    }
}