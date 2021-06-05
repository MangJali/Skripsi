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

    protected $fillable = ['id_uts', 'kodemapel', 'nis', 'ujiantengahsemester'];

    public function mapel()
    {
        return $this->belongsTo(Matapelajaran::class, 'kodemapel');
    }
    public function siswa()
    {
        return $this->belongsTo(Siswaa::class, 'nis');
    }
}
