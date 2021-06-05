<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulanganharian extends Model
{
    use HasFactory;
    protected $table = 'ulanganharians';

    protected $primaryKey = 'id_uh';

    protected $keyType = 'integer';

    protected $fillable = ['id_uh', 'kodemapel', 'nis', 'ulanganharian'];

    public function mapel()
    {
        return $this->belongsTo(Matapelajaran::class, 'kodemapel');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswaa::class,"nis");
    }
}
