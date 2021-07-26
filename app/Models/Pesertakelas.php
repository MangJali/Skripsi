<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesertakelas extends Model
{
    use HasFactory;

    public $table = 'pesertakelases';

    public $fillable = ['id_pesertakelas', 'id_master', 'id_kelas', 'nis'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
    public function mapel()
    {
        return $this->belongsTo(Matapelajaran::class, 'id_mapel');
    }
    public function masterkelas()
    {
        return $this->belongsTo(Masterkelas::class, 'id_master');
    }
    public function siswa()
    {
        return $this->belongsTo(Siswaa::class, 'nis');
    }
}
