<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Avaible_position extends Model
{
    use HasFactory;

    protected $fillable =[
        'job_vacancy_id',
        'position',
        'capacity',
        'apply_capacity',
    ];

    public function job_vacancy(): BelongsTo
    {
        return $this->belongsTo(Jobs_vacancy::class, 'job_vacancy_id', 'id');
    }
}
