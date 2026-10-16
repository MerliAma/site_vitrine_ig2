<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suggestion extends Model
{
    //permettre l'écriture de certains champs dans la base de données
    protected $fillable = ['nomSug', 'mailSug', 'telSug', 'msgSug', 'boolSug'];
}
