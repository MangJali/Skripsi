<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Sekolahumum extends Model
{
    use HasFactory;

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswaa::class);
    }
}
