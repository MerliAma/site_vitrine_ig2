<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evenement extends Model
{
    //permettre l'écriture de certains champs dans la base de données
    protected $fillable = ['themEvent', 'entEvent', 'boolEvent', 'datedebEvent', 'datefinEvent'];
}
