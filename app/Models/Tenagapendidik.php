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

    protected $fillable = [

        'nip', 'namapendidik'

    ];

    public function kelas()
    {
        return $this->hasMany(Masterkelas::class);
    }
}
