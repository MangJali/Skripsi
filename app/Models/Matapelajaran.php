<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matapelajaran extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    protected $table = 'matapelajarans';

    protected $primaryKey = 'id_mapel';

    protected $fillable = ['id_mapel', 'namamapel'];


    public function masterkelas()
    {
        return $this->hasMany(Masterkelas::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function tugassiswa()
    {
        return $this->hasMany(TugasSiswa::class);
    }
    public function ulanganharian()
    {
        return $this->hasMany(Ulanganharian::class);
    }
    public function uts()
    {
        return $this->hasMany(Ujiantengahsemeseter::class);
    }
    public function uas()
    {
        return $this->hasMany(Ujianakhirsemeseter::class);
    }
}
