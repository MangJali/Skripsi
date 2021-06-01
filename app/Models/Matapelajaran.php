<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matapelajaran extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    protected $table = 'matapelajarans';

    protected $primaryKey = 'kodemapel';

    protected $fillable = ['kodemapel', 'matapelajaran', 'kodekelas', 'nip',];

    public function guru()
    {
        return $this->belongsTo(Tenagapendidik::class, 'nip');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'id_semester');
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
