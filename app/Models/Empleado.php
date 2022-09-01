<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'employees';

    protected $guarded = [];

     protected $appends = ['fullname'];


    public function getFullNameAttribute()
    {
        return "{$this->num_empleado} - {$this->name} {$this->father_lastname} {$this->mother_lastname}";
    }
}
