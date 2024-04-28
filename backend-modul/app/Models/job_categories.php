<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class job_categories extends Model
{
    use HasFactory;

    protected $fillable =[
        'job_category'
    ];

    public function validation(): HasMany
    {
        return $this->hasMany(Validations::class, 'job_category_id', 'id');
    }


    public function job_vacancy(): HasMany
    {
        return $this->hasMany(Jobs_vacancy::class, 'job_category_id', 'id');
    }

}
