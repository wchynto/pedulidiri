<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perjalanan extends Model
{
    use HasFactory;

    protected $table = 'perjalanan';

    protected $fillable = [
        'tanggal' => 'required',
        'waktu' => 'required',
        'lokasi' => 'required',
        'suhu_tubuh' => 'required'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
