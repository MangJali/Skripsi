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

    protected $fillable = ['id_uas', 'kodemapel', 'nis', 'ujianakhirsemester'];

    public function mapel()
    {
        return $this->belongsTo(Matapelajaran::class, 'kodemapel');
    }
    public function siswa()
    {
        return $this->belongsTo(Siswaa::class, 'nis');
    }
}
