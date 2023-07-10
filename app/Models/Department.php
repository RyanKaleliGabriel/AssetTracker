<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Department extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'email', 
        'password',
        'departmentid'
    ];

    public function student(): HasOne
    {
        return $this->hasOne(Student::class);
    }
    public function administartor(): HasOne
    {
        return $this->hasOne(Administrator::class);
    }
}
