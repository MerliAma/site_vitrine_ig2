<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    //permettre l'écriture de certains champs dans la base de données
    protected $fillable = ['libelle'];

    public function users()
    {
        return $this->hasMany(User::class,'role_id');
    } 
}
