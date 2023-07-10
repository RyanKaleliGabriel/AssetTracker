<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'departmentid',
        'deviceid'
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
    public function device(): HasMany
    {
        return $this->hasMany(Device::class);
    }
}
