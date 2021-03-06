<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function telephones()
    {
        return $this->hasMany(Telephone::class);
    }

    public function emails()
    {
        return $this->hasMany(Email::class);
    }
}
