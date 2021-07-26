<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujiantengahsemester extends Model
{
    use HasFactory;

    protected $table = 'ujiantengahsemesters';

    protected $primaryKey = 'id_uts';

    protected $keyType = 'integer';

    protected $fillable = ['id_uts', 'id', 'nis', 'id_kelas', 'id_mapel', 'ujiantengahsemester'];

    public function pesertakelas()
    {
        return $this->belongsTo(Pesertakelas::class, 'id');
    }
    public function masterkelas()
    {
        return $this->belongsTo(Masterkelas::class, 'id_master');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
    public function mapel()
    {
        return $this->belongsTo(Matapelajaran::class, 'id_mapel');
    }
    public function siswa()
    {
        return $this->belongsTo(Siswaa::class, 'nis');
    }
}
