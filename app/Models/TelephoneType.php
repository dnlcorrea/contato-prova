<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent;

/**
 * Class TelephoneType
 * @package App\Models
 * @mixin Eloquent
 * @method static firstOrCreate(array $array)
 */
class TelephoneType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function telephones()
    {
        return $this->hasMany(Telephone::class);
    }
}
