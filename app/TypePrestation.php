<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypePrestation extends Model
{
    //permettre l'écriture de certains champs dans la base de données
    protected $fillable = ['libPr', 'boolTPrest'];
}
