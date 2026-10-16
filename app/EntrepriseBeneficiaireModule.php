<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntrepriseBeneficiaireModule extends Model
{
    //

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'entreprise_beneficiaire_module';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'entreprise_id',
        'beneficiaire_id',
        'module_id',
        'date_demande',
        'attentes',
        'booldmdF',
    ];

        /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date_demande' =>'datetime',
    ];


}
