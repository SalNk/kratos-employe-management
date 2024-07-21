<?php

namespace App\Models;

use App\Models\Salaire;
use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employe extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function salaires()
    {
        return $this->hasMany(Salaire::class);
    }
}