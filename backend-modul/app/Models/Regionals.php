<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Regionals extends Model
{
    use HasFactory;

    protected $fillable = [
        'province',
        'district',
    ];


    public function Societies() :HasMany{
        return $this->hasMany(Societies::class, 'regional_id' , 'id');
    }


}
