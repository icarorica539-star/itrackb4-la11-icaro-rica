<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subject extends Model
{
    protected $fillable = [
        'code',
        'title',
        'units',
        'is_active',
        'prerequisite_id',
    ];

    public function prerequisite(): BelongsTo
    {
        return $this->belongsTo(Prerequisite::class);
    }
}