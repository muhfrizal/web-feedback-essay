<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawaban';
    protected $fillable = ['user_id', 'soal_id', 'jawaban'];

    public function soal()
    {
        return $this->belongsTo(Soal::class, 'soal_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
