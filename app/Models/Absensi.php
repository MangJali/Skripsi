<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $keyType = 'integer';

    protected $table = 'absensis';

    protected $primaryKey = 'id_absensi';

    protected $fillable = ['id_absensi', 'hadir', 'ijin', 'alpha', 'nis', 'id_kelas', 'id_mapel', 'id'];

    public function siswa()
    {
        return $this->belongsTo(Siswaa::class, 'nis')->withDefault(["namakelas" => "ABC"]);
    }
    public function pesertakelas()
    {
        return $this->belongsTo(Pesertakelas::class, 'id')->withDefault();
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas')->withDefault();
    }
    public function mapel()
    {
        return $this->belongsTo(Matapelajaran::class, 'id_mapel')->withDefault();
    }
}
