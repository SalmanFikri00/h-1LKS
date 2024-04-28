<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Societies extends Model
{
    use HasFactory;

        protected $fillable = [
        'id_card_number',
        'password',
        'name',
        'born_date',
        'gender',
        'address',
        'regional_id',
        'login_tokens',
    ];

    /**
     * Get all of the comments for the Societies
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function regional(): BelongsTo
    {
        return $this->belongsTo(Regionals::class, 'regional_id', 'id');
    }

    public function validation(): HasOne
    {
        return $this->hasOne(Validations::class, 'society_id', 'id');
    }


}
