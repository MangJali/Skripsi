<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    use HasFactory;

    protected $keyType = 'integer';

    protected $table = 'rombels';

    protected $primaryKey = 'id_rombel';

    protected $fillable = ['id_rombel',  'rombel'];

    public function masterkelas()
    {
        return $this->hasMany(masterkelas::class);
    }
}
