<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodigosIncidencias extends Model
{
    use HasFactory;

    protected $table = 'codigos_de_incidencias';

    protected $guarded = [];
    protected $appends = ['fullDescription'];

    public function getFullDescriptionattribute()
    {
        return "{$this->code} - {$this->description}";
    }
}
