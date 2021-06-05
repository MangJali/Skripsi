<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $table = 'kelases';

    protected $primaryKey = 'kodekelas';

    protected $fillable = ['kodekelas', 'kelas'];


    public function siswa()
    {
        return $this->hasMany(Siswaa::class);
    }
}
