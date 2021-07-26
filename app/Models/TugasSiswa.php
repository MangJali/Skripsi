<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasSiswa extends Model
{
    use HasFactory;

    protected $primariKey = 'id_tugas';

    protected $keytipe = 'integer';

    protected $table = 'tugassiswas';

    protected $fillable = ['id_tugas', 'id_kelas', 'id_mapel', 'nis', 'tugas1', 'tugas2', 'tugas3', 'nip'];

    public function pesertakelas()
    {
        return $this->belongsTo(Pesertakelas::class, 'id')->withDefault();
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas')->withDefault();
    }
    public function siswa()
    {
        return $this->belongsTo(Siswaa::class, 'nis');
    }
    public function mapel()
    {
        return $this->belongsTo(Matapelajaran::class, 'id_mapel')->withDefault();
    }
    public function guru()
    {
        return $this->belongsTo(Tenagapendidik::class, 'nip');
    }
}
