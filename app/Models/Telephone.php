<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function contact()
    {
       $this->belongsTo(Contact::class);
    }

    public function telephone_type()
    {
        $this->hasOne(TelephoneType::class, 'telephone_type_id');
    }
}
