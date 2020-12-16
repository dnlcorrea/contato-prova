<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['telephone_type'];

    public function contact()
    {
       return $this->belongsTo(Contact::class);
    }

    public function telephone_type()
    {
        return $this->belongsTo(TelephoneType::class);
    }
}
