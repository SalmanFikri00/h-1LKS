<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jobs_vacancy extends Model
{
    use HasFactory;

    protected $fillable =[
        'job_category_id',
        'company',
        'address',
        'description',
    ];


    public function job_category(): BelongsTo
    {
        return $this->belongsTo(job_categories::class, 'job_category_id', 'id');
    }


    public function avaible_position(): HasMany
    {
        return $this->hasMany(Avaible_position::class, 'job_vacancy_id', 'id');
    }


}
