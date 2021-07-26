<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujianakhirsemester extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'ujianakhirsemesters';

    protected $primaryKey = 'id_uas';

    protected $keyType = 'integer';

    protected $fillable = ['id_uas', 'id', 'nis', 'id_kelas', 'id_mapel', 'ujianakhirsemester'];

    public function pesertakelas()
    {
        return $this->belongsTo(pesertakelas::class, 'id');
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
