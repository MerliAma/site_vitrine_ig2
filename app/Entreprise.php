<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    //permettre l'écriture de certains champs dans la base de données et la liaison 1,n - 1,n
	protected $fillable = ['raisonSocial', 'ncc', 'email', 'tel','MsalarialePA'];
    public function modules(){
        return $this->belongsToMany(Module::class, 'entreprise_beneficiaire_module', 'entreprise_id', 'module_id')
                    ->using(EntrepriseBeneficiaireModule::class)
                    ->withTimestamps([
                        'date_demande',
                    ]);
    }
}
