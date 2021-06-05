<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $table = 'semesters';

    protected $primaryKey = 'id_semester';

    protected $keyType = 'integer';

    protected $fillable = ['id_semester', 'semester'];

    public function mapel()
    {
        return $this->hasMany(Matapelajaran::class);
    }
}
