<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    protected $table = 'absensis';

    protected $primaryKey = 'id_absensi';

    protected $fillable = ['id_absensi', 'hadir','ijin','alpha','nis','kodemapel'];
    
    public function siswa()
    {
        return $this->belongsTo(Siswaa::class, 'nis')->withDefault(["namakelas"=>"ABC"]);
    }
    
    public function mapel()
    {
        return $this->belongsTo(Matapelajaran::class, 'kodemapel');
    }

}
