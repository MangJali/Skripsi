<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $keyType = 'integer';

    protected $table = 'kelases';

    protected $primaryKey = 'id_kelas';

    protected $fillable = ['id_kelas',  'kelas'];

    public function masterkelas()
    {
        return $this->hasMany(Masterkelas::class);
    }
    public function tugassiswa()
    {
        return $this->hasMany(TugasSiswa::class);
    }
}
