<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasSiswa extends Model
{
    use HasFactory;

    protected $primariKey = 'id_nilai';

    protected $keytipe = 'integer';

    protected $table = 'tugassiswas';

    protected $fillable = ['id_tugas', 'kodemapel', 'nis', 'tugas1', 'tugas2', 'tugas3'];

    public function mapel()
    {
        return $this->belongsTo(Matapelajaran::class, 'kodemapel');
    }
    public function siswa()
    {
        return $this->belongsTo(Siswaa::class, 'nis');
    }
}
