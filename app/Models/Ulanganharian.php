<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulanganharian extends Model
{
    use HasFactory;
    protected $table = 'ulanganharians';

    protected $primaryKey = 'id_uh';

    protected $keyType = 'integer';

    protected $fillable = ['id_uh', 'id_kelas', 'id_mapel', 'nis', 'ulanganharian1', 'ulanganharian2'];

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
}
