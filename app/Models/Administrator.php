<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Administrator extends Authenticatable
{
    use HasFactory;
    protected $table = 'administrators';

    protected $fillable = [
        'name',
        'department_id',
        'email',
        'password'
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
