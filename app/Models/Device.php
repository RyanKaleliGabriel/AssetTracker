<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'modelnumber',
        'type',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
