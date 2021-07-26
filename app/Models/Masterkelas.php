<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masterkelas extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_master';

    protected $keyType = 'integer';

    protected $table = 'masterkelases';

    protected $fillable = ['id_master', 'id_mapel', 'nip', 'tahnakademik', 'semester', 'rombel'];

    public function Rombel()
    {
        return $this->belongsTo(Rombel::class, 'id_rombel');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
    public function guru()
    {
        return $this->belongsTo(Tenagapendidik::class, 'nip');
    }
    public function mapel()
    {
        return $this->belongsTo(Matapelajaran::class, 'id_mapel');
    }
}
