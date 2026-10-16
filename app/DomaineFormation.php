<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DomaineFormation extends Model
{
    //permettre l'écriture de certains champs dans la base de données
    protected $fillable = ['libForm', 'boolForm'];
    //module est enfant de domaine de formation
    public function modules()
    {
        return $this->hasMany(Module::class, 'domForm_id'); //module_id
    }
}
