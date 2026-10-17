<?php

require_once __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\User;
use App\role;

echo "=== TEST DE VALIDATION DU LOT 7 (PAGES DE GESTION BACKOFFICE) ===\n\n";

// Vider le cache des vues pour s'assurer que Blade compile à blanc
\Artisan::call('view:clear');
echo "Cache des vues Blade nettoyé.\n";

// Simuler un utilisateur connecté pour auth()->user()
$user = new User();
$user->id = 1;
$user->name = 'Administrateur Test';
$user->username = 'admintest';
$user->email = 'admin@inter-groupe.ci';
$user->telUser = '0102030405';
$user->role_id = 1;

auth()->setUser($user);

// Définir des variables globales GET factices pour tester les vues sans crash
$_GET['idDomForm'] = 1;
$_GET['idModule'] = 1;
$_GET['idTypeP'] = 1;
$_GET['idEvent'] = 1;
$_GET['mode'] = 'Ajouter';
$_GET['idUser'] = 1;

$viewsToTest = [
    // Module 1
    'administration.dmdForm' => [
        'nbdmdform' => 1,
        'listedmdForm' => [(object)[
            'id' => 1, 'nomEntreprise' => 'GMA', 'nomSignataire' => 'Koffi', 'fonctSignataire' => 'DRH',
            'telEntreprise' => '07070707', 'emailEntreprise' => 'gma@ci.ci', 'dateForm' => '2026-10-18',
            'boolTrait' => 0
        ]],
        'idDomForm' => [1],
        'nbBen' => [5],
        'domForm' => [(object)['id' => 1, 'libDomForm' => 'Réseaux & Télécoms']],
        'nbBeneficiaire' => 1
    ],
    'administration.listeBenef' => [
        'nbBeneficiaire' => 1,
        'listeBeneficiaire' => [(object)[
            'id' => 1, 'nomBenef' => 'Kouame', 'prenomBenef' => 'Paul', 'fonctBenef' => 'Ingénieur',
            'matriculeCnpsBenef' => '123456789'
        ]],
        'nomEnt' => 'GMA',
        'theme' => 'Administration CISCO'
    ],
    // Module 2
    'administration.dmdPrest' => [
        'nbdmdprest' => 1,
        'listedmdPrest' => [(object)[
            'id' => 1, 'nomEntreprise' => 'SOLIBRA', 'nomSignataire' => 'Yao', 'fonctSignataire' => 'DSI',
            'telEntreprise' => '05050505', 'emailEntreprise' => 'solibra@ci.ci', 'idTypePrest' => 1,
            'descPrest' => 'Audit de sécurité réseau', 'datePrest' => '2026-10-18', 'boolTrait' => 0
        ]],
        'typePrest' => [(object)['id' => 1, 'libPr' => 'Audit Informatique']]
    ],
    // Module 3
    'administration.domForm' => [
        'nblisteDomForm' => 1,
        'listeDomForm' => [(object)[
            'id' => 1, 'libDomForm' => 'Génie Logiciel', 'boolDomForm' => 1
        ]]
    ],
    'administration.newForm' => [],
    'administration.listeModules' => [
        'nblisteMod' => 1,
        'listeMod' => [(object)[
            'id' => 1, 'libMod' => 'Laravel & API Rest'
        ]]
    ],
    'administration.newModule' => [],
    // Module 4
    'administration.typePr' => [
        'nblisteTypePr' => 1,
        'listeTypePr' => [(object)[
            'id' => 1, 'libPr' => 'Maintenance Systèmes', 'boolTPrest' => 1
        ]]
    ],
    'administration.newPr' => [],
    // Module 5
    'administration.evenements' => [
        'nblistEvent' => 1,
        'listeEvent' => [(object)[
            'id' => 1, 'themEvent' => 'Sécurité Informatique', 'entEvent' => 'CIE',
            'datedebEvent' => '2026-10-01', 'datefinEvent' => '2026-10-05', 'boolEvent' => 1
        ]]
    ],
    'administration.newEvenements' => [],
    // Module 6
    'administration.suggestions' => [
        'nbSug' => 1,
        'listeSug' => [(object)[
            'id' => 1, 'nomSug' => 'Amadou Diallo', 'mailSug' => 'amadou@test.ci',
            'telSug' => '01010101', 'msgSug' => 'Excellente initiative de modernisation !',
            'boolSug' => 0
        ]]
    ],
    // Module 7
    'administration.user' => [
        'nblisteUser' => 1,
        'listeUser' => [(object)[
            'id' => 1, 'name' => 'Administrateur Test', 'telUser' => '0102030405',
            'email' => 'admin@inter-groupe.ci', 'username' => 'admintest', 'role_id' => 1
        ]]
    ],
    'administration.newUser' => [],
    // Module 8
    'administration.profil' => [],
    'administration.modifPro' => []
];

$successCount = 0;
$failCount = 0;

foreach ($viewsToTest as $viewName => $data) {
    try {
        $html = View::make($viewName, $data)->render();
        if (strlen($html) > 500) {
            echo " [OK] Vue '{$viewName}' compilée avec succès (" . strlen($html) . " octets)\n";
            $successCount++;
        } else {
            echo " [WARN] Vue '{$viewName}' a un rendu inhabituellement court (" . strlen($html) . " octets)\n";
            $successCount++;
        }
    } catch (\Throwable $e) {
        echo " [FAIL] Erreur de rendu sur '{$viewName}': " . $e->getMessage() . " à la ligne " . $e->getLine() . " de " . $e->getFile() . "\n";
        $failCount++;
    }
}

echo "\n------------------------------------------------------------\n";
echo "RÉSULTAT GLOBAL LOT 7 : {$successCount} vues validées, {$failCount} échecs.\n";
echo "------------------------------------------------------------\n";

if ($failCount > 0) {
    exit(1);
}
exit(0);
