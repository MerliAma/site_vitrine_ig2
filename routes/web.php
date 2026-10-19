<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('accueil');  //welcome
})->name('accueil');*/
Route::get('/', 'accueilC@EventAc' )->name('accueil');

Route::get('/presentation', function () {
    return view('presentation');  
})->name('presentation');


Route::get('/developpement', function () {
    return view('developpement');  
})->name('developpement');

Route::get('/contact', function () {
    return view('contact');  
})->name('contact');

Route::get('/fdfp', function () {
    return view('fdfp');  
})->name('fdfp');


Route::get('/dmdPrestation', 'TypePrestationC@AfficheTypePrest2' )->name('dmdPrestation');
Route::post('/dmdPrestation', 'dmdPrestationC@newdmdPrest' )->name('newdmdPrest');
//Route::post('/newdmdPrest', 'dmdPrestationC@newdmdPrest' )->name('newdmdPrest');


Route::get('/dmdFormation', 'DomaineFormationC@AfficheDomForm2' )->name('dmdFormation');
Route::post('/dmdFormation', 'dmdFormationC@newdmdForm' )->name('newdmdForm');
//Route::get('/dmdFormation2', 'dmdFormationC@newdmdForm' )->name('dmdFormation2');
Route::get('/dmdForm2', function () {
    return view('dmdForm2');  
})->name('dmdForm2');
Route::post('/dmdFormation2', 'dmdFormationC@newdmdForm2' )->name('newdmdForm2');
Route::get('/quitter', 'dmdFormationC@Quitter' )->name('quitter');


Route::get('/formation','DomaineFormationC@AfficheFormation' )->name('formation');

/* Routes ADMIN */


Route::get('/accueilAd', 'accueilC@nombre' )->name('accueilAd');


Route::get('/suggestions', 'suggestionC@AfficheSug' )->name('suggestions');
Route::delete('/SupSug', 'suggestionC@SupSug' )->name('SupSug'); //get devient delete
Route::match(['get', 'post'], '/MarqSug', 'suggestionC@MarqSug' )->name('MarqSug');

Route::get('/profil', 'profilC@profilSug' )->name('profil');
Route::get('/modifPro', function () {
    return view('administration/modifPro');  
})->name('modifPro');

/*Route::get('/user', function () {
    return view('administration/user');  
})->name('user');*/
Route::get('/user', 'UserC@AfficheUser' )->name('user');
Route::delete('/SupUser', 'UserC@SupUser' )->name('SupUser');
Route::match(['get', 'post'], '/RenPermUser', 'UserC@RenPermUser' )->name('RenPermUser');


Route::get('/typePr', 'TypePrestationC@AfficheTypePrest' )->name('typePr');
Route::delete('/SupTypeP','TypePrestationC@SupTypeP')->name('SupTypeP');
Route::match(['get', 'post'], '/RetP','TypePrestationC@RetTypeP')->name('RetP');


Route::get('/domForm', 'DomaineFormationC@AfficheDomForm' )->name('domForm');
Route::delete('/SupDomF','DomaineFormationC@SupDomF')->name('SupDomF');
Route::match(['get', 'post'], '/RetF','DomaineFormationC@RetDomF')->name('RetF');

Route::get('/listeModules', 'ModuleC@listeModules' )->name('listeModules');
Route::get('/newModule', function () {
    if (auth()->guest()) 
    {
        return redirect('/login')->withErrors([
            'logout' => "Vous devez être connecté pour voir cette page.",
        ]);
    }
    return view('administration/newModule');  
})->name('newModule');
Route::post('/newModule2', 'ModuleC@newModule' )->name('newModule2');
Route::delete('/supModule', 'ModuleC@supModule' )->name('supModule');
//Route::get('/updModule', 'ModuleC@updModule' )->name('updModule');


Route::get('/dmdPrest', 'dmdPrestationC@AffichedmdP' )->name('dmdPrest');
Route::delete('/SupP', 'dmdPrestationC@SupP' )->name('SupP');
Route::match(['get', 'post'], '/MarqP', 'dmdPrestationC@MarqP' )->name('MarqP');


Route::get('/dmdForm', 'dmdFormationC@AffichedmdF' )->name('dmdForm');
Route::delete('/SupF', 'dmdFormationC@SupF' )->name('SupF');
Route::match(['get', 'post'], '/MarqF', 'dmdFormationC@MarqF' )->name('MarqF');
Route::get('/listeBenef', 'BeneficiaireC@listeBenef' )->name('listeBenef');


Route::get('/evenements', 'evenementC@AfficheEvent' )->name('evenements');
Route::delete('/Sup','evenementC@SupEvent')->name('Sup');
Route::match(['get', 'post'], '/Ret','evenementC@RetEvent')->name('Ret');

Route::get('/essai', function () {
    return view('essai');  
})->name('essai');

Route::get('/newForm', function () {
    if (auth()->guest()) 
    {
        return redirect('/login')->withErrors([
            'logout' => "Vous devez être connecté pour voir cette page.",
        ]);
    }
    return view('administration/newForm');  
})->name('newForm');
Route::post('/newForm2','DomaineFormationC@newdomForm')->name('newForm2');

Route::get('/newPr', function () {
    if (auth()->guest()) 
    {
        return redirect('/login')->withErrors([
            'logout' => "Vous devez être connecté pour voir cette page.",
        ]);
    }
    return view('administration/newPr');  
})->name('newPr');
Route::post('/newPr2','TypePrestationC@newTypePr')->name('newPr2');


Route::get('/newUser', function () {
    if (auth()->guest()) 
    {
        return redirect('/login')->withErrors([
            'logout' => "Vous devez être connecté pour voir cette page.",
        ]);
    }
    return view('administration/newUser');  
})->name('newUser');
Route::post('/newUser2','UserC@newUser')->name('newUser2');

Route::get('/newEvenements', function () {
    if (auth()->guest()) 
    {
        return redirect('/login')->withErrors([
            'logout' => "Vous devez être connecté pour voir cette page.",
        ]);
    }
    return view('administration/newEvenements');  
})->name('newEvenements');
Route::post('/newEvenements2','evenementC@newEvent')->name('newEvenements2');

Route::get('/login2', function () {
    return view('auth/loginInit');  
})->name('login2'); //essai
Route::get('/formES', function () {
    return view('formationES');  
})->name('formES'); //essai

/* pour les controllers */

Route::post('/SugCont','suggestionC@EnrgSuggestion')->name('SugCont');



//Au niveau de la connexion
Auth::routes();
Route::group(['middleware'=>['auth']],function(){
    route::get('redirectDashboard','HomeController@redirectDashboard')->name('redirectDashboard');
});

//Route::get('/home', 'HomeController@index')->name('home');

Route::post('/verifLog', 'UserC@verifLog')->name('verifLog');
Route::match(['get', 'post'], '/SupRenPerm', 'UserC@SupRenPerm')->name('SupRenPerm');

