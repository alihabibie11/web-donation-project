<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galleries extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //relasi
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
