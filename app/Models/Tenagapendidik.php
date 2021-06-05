<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenagapendidik extends Model
{
    use HasFactory;
    protected $table = "tenagapendidiks";

    protected $keyType = 'string';

    protected $primaryKey = 'nip';

    public $incrementing = false;




    public function mapel()
    {
        return $this->hasMany(Matapelajaran::class);
    }
}
