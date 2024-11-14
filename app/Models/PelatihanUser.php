<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelatihanUser extends Model
{
    use HasFactory;

    protected $table = 'pelatihan_user';

    protected $fillable = [
        'user_id',
        'pelatihan_id',
        'bukti_pembayaran',
        'status_pendaftaran',
    ];

    public function pelatihanuser()
    {
        return $this->belongsToMany(PelatihanUser::class);
    }
}
