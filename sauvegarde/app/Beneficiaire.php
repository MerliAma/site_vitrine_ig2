<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiaire extends Model
{
    //permettre l'écriture de certains champs dans la base de données
    protected $fillable = ['matBen','nomBen','foncBen','catBen','AnEmBen','NatBen'];
}
