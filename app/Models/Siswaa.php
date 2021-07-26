<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswaa extends Model
{
    use HasFactory;
    protected $table = 'siswas';

    protected $keytype = 'string';

    protected $primaryKey = 'nis';

    protected $fillable = ['nis', 'namalengkap'];

    public function pesertakelas()
    {
        return $this->hasMany(Pesertakelas::class);
    }

    public function tugassiswa()
    {
        return $this->hasMany(TugasSiswa::class, "nis", "nis");
    }

    public function ulanganharian()
    {
        return $this->hasMany(Ulanganharian::class, "nis", "nis");
    }
    public function uts()
    {
        return $this->hasMany(Ujiantengahsemester::class, "nis", "nis");
    }
    public function uas()
    {
        return $this->hasMany(Ujianakhirsemester::class, "nis", "nis");
    }
}
