<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dmdPrestation extends Model
{
    //permettre l'écriture de certains champs dans la base de données
    protected $fillable = ['nom', 'email', 'tel', 'indicationPrest', 'booldmdP'];
}
