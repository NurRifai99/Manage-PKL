<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    //
    protected $fillable = [
        'user_id',
        'nama',
        'nis',
        'gender',
        'alamat',
        'kontak',
        'status_pkl',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
