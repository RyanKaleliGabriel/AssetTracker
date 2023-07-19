<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Department extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'email', 
        'password',
        'departmentid'
    ];

    public function student(): HasMany
    {
        return $this->hasMany(Student::class);
    }
    public function administartor(): HasMany
    {
        return $this->hasMany(Administrator::class);
    }

    public function getNumberofDevicesAttribute()
    {
        return $this->students->sum(function($student){
            return $student->devices->count();
        });
    }
}
