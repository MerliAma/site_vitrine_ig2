<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dmdFormation extends Model
{
    //permettre l'écriture de certains champs dans la base de données
    protected $fillable = ['raisonSocial', 'ncc', 'email', 'tel', 'indicationForm', 'booldmdF'];
}
