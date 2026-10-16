<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lier2 extends Model
{
    //permettre l'écriture de certains champs dans la base de données
    protected $fillable = ['dmdPrest', 'typePrest'];
}
