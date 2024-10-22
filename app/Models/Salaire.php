<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employe;

class Salaire extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function employe()
    {
         return $this->belongsTo(Employe::class);
    }
}
