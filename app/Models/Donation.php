<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function program()
    {
        // return $this->hasOne(User::class, 'id');
        return $this->hasOne(Program::class, 'id', 'program_id');
    }

    public function donatur()
    {
        // return $this->hasOne(User::class, 'id');
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
