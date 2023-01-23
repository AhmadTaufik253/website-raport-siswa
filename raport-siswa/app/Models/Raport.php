<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raport extends Model
{
    use HasFactory;

    protected $table = 'raport_siswa';

    protected $fillable = [
        'id_siswa', 'id_pelajaran', 'nilai', 'keterangan'
    ];

    public function siswas()
    {
        return $this->hasOne(User::class, 'id', 'id_siswa');
    }

    public function mapels()
    {
        return $this->hasOne(Matapelajaran::class, 'id', 'id_pelajaran');
    }
}