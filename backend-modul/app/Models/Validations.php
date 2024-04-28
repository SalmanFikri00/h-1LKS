<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Validations extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_category_id',
        'society_id',
        'validator_id',
        'status',
        'work_experience',
        'job_position',
        'reasons_accepted',
        'validator_notes',
    ];


    public function society(): BelongsTo
    {
        return $this->belongsTo(Societies::class , 'society_id' , 'id');
    }

    public function validator(): BelongsTo
    {
        return $this->belongsTo(Validators::class, 'validator_id', 'id');
    }

    public function job_category(): BelongsTo {
        return $this->belongsTo(job_categories::class , 'job_category_id' , 'id');
    }
}
