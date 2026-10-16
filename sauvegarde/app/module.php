<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //permettre l'écriture de certains champs dans la base de données
    protected $fillable = ['libMod','domForm_id'];
    
        //relation ternaire entre module, beneficiaire et entreprise
    public function beneficiaires(){
        return $this->belongsToMany(Beneficiaire::class, 'entreprise_beneficiaire_module', 'module_id', 'beneficiaire_id')
                    ->using(EntrepriseBeneficiaireModule::class)
                    ->withTimestamps([
                        'date_demande',
                    ]);
    }
        //module est enfant de domaine de formation
    public function DomaineFormation()
    {
        return $this->belongsTo(DomaineFormation::class, 'domForm_id'); //domForm_id
    } 
}