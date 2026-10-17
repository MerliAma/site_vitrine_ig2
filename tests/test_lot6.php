<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Simuler un utilisateur connecté pour le test
$user = new \App\User([
    'name' => 'Anet Clément Brou',
    'username' => 'directeur',
    'email' => 'direction@intergroupe-ci.com',
    'telUser' => '0102030405',
    'role_id' => 1,
]);
$user->id = 1;
\Illuminate\Support\Facades\Auth::setUser($user);

echo "--- TEST DU RENDU DU TABLEAU DE BORD (LOT 6) ---\n";

try {
    $html = view('administration/accueilAd', [
        'nbdmdprest' => 5,
        'nbdmdform' => 12,
        'nbEvent' => 3,
        'nbSugNonLu' => 2,
    ])->render();

    echo "Taille HTML généré: " . strlen($html) . " octets\n";

    assert(strpos($html, 'INTER-GROUPE') !== false, "Le nom INTER-GROUPE doit être présent");
    assert(strpos($html, 'Demandes Formation') !== false, "La métrique Demandes Formation doit être présente");
    assert(strpos($html, 'Demandes Prestation') !== false, "La métrique Demandes Prestation doit être présente");
    assert(strpos($html, 'Événements en ligne') !== false, "La métrique Événements en ligne doit être présente");
    assert(strpos($html, 'Messages non lus') !== false, "La métrique Messages non lus doit être présente");
    assert(strpos($html, '12') !== false, "Le nombre 12 doit être présent");
    assert(strpos($html, 'Anet Clément Brou') !== false, "Le nom de l'utilisateur connecté doit être présent");

    echo "SUCCÈS: accueilAd.blade.php et baseAdmin.blade.php compilés et validés avec succès!\n";
} catch (\Throwable $e) {
    echo "ERREUR: " . $e->getMessage() . " à la ligne " . $e->getLine() . "\n";
    echo $e->getTraceAsString() . "\n";
    exit(1);
}

try {
    $html2 = view('Layouts/admin/baseAdmin2', ['title' => 'Test'])->render();
    assert(strpos($html2, 'INTER-GROUPE') !== false, "baseAdmin2 doit comporter INTER-GROUPE");
    echo "SUCCÈS: baseAdmin2.blade.php compilé et validé avec succès!\n";
} catch (\Throwable $e) {
    echo "ERREUR sur baseAdmin2: " . $e->getMessage() . "\n";
    exit(1);
}

echo "TOUS LES TESTS DU LOT 6 SONT VALIDES!\n";
