<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'soal'; // sesuaikan nama tabel
    protected $fillable = ['nomor', 'pertanyaan'];



    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }
}
