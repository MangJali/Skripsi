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

    protected $fillable = ['nis', 'namalengkap', 'alamat', 'tempatlahir', 'tanggallahir', 'jeniskelamin', 'sekolahumum', 'kodekelas'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kodekelas');
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
