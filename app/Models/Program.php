<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function donatur()
    {
        return $this->hasOne(User::class, 'id');
    }

    // public function donation()
    // {
    //     return $this->hasOne(User::class, 'id');
    // }

    public function donation()
    {
        return $this->belongsTo(Donation::class, 'program_id', 'id');
    }

    public function gallery()
    {
        return $this->hasMany(Galleries::class);
    }
}
