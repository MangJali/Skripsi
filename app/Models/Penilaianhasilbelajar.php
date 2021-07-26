<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaianhasilbelajar extends Model
{
    use HasFactory;

    protected $table = 'nilais';

    protected $fillable = ['id', 'nis', 'id_mepel', 'id_tugas1', 'id_tugas2', 'id_tugas3', 'id_tugas4', 'id_uh', 'id_uts', 'id_uas'];

    public function pesertakelas()
    {
        return $this->belongsTo(Pesertakelas::class, 'id');
    }
    // public function mapel()
    // {
    //     return $this->belongsTo(Matapelajaran::class, 'id_mapel');
    // }

    // public function siswa()
    // {
    //     return $this->belongsTo(Siswaa::class, 'nis');
    // }

    public function tugas1()
    {
        return $this->belongsTo(Tugaspertama::class, 'id_tugas1');
    }

    public function tugas2()
    {
        return $this->belongsTo(Tugaskedua::class, 'id_tugas2');
    }

    public function tugas3()
    {
        return $this->belongsTo(Tugasketiga::class, 'id_tugas3');
    }

    public function tugas4()
    {
        return $this->belongsTo(Tugaskeempat::class, 'id_tugas4');
    }

    public function uh()
    {
        return $this->belongsTo(Ulanganharian::class, 'id_uh');
    }

    public function uts()
    {
        return $this->belongsTo(Ujiantengahsemeseter::class, 'id_uts');
    }

    public function uas()
    {
        return $this->belongsTo(Ujianakhirsemeseter::class, 'id_uas');
    }
}
