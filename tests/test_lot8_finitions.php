<?php

require_once __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Blade;

echo "============================================================\n";
echo "BANC DE TEST AUTOMATISÉ — LOT 8 : FINITIONS & ACCESSIBILITÉ\n";
echo "============================================================\n\n";

$assertions = 0;
$passed = 0;
$failed = 0;

function assertCondition($cond, $desc) {
    global $assertions, $passed, $failed;
    $assertions++;
    if ($cond) {
        echo "  [PASS] $desc\n";
        $passed++;
    } else {
        echo "  [FAIL] $desc\n";
        $failed++;
    }
}

// 1. Contrôle des Layouts & Accessibilité
echo "1. CONTRÔLE DES LAYOUTS & ATTRIBUTS D'ACCESSIBILITÉ :\n";

$baseHTML = file_get_contents(resource_path('views/Layouts/baseHTML.blade.php'));
assertCondition(strpos($baseHTML, 'skip-link') !== false, "baseHTML possède un lien d'évitement (skip-link WCAG 2.4.1)");
assertCondition(strpos($baseHTML, 'id="main-content"') !== false, "baseHTML possède la cible main-content");

$appLayout = file_get_contents(resource_path('views/Layouts/app.blade.php'));
assertCondition(strpos($appLayout, 'user-scalable=0') === false, "app.blade.php ne bloque plus le zoom mobile (WCAG 1.4.4)");
assertCondition(strpos($appLayout, 'js/app.js') === false, "app.blade.php ne charge plus le script orphelin js/app.js (404)");
assertCondition(strpos($appLayout, 'skip-link') !== false, "app.blade.php possède un lien d'évitement accessible");

$baseAdmin = file_get_contents(resource_path('views/Layouts/admin/baseAdmin.blade.php'));
assertCondition(strpos($baseAdmin, 'user-scalable=0') === false, "baseAdmin ne bloque plus le zoom mobile (WCAG 1.4.4)");
assertCondition(strpos($baseAdmin, 'skip-link') !== false, "baseAdmin possède un lien d'évitement accessible");
assertCondition(strpos($baseAdmin, 'chartist.min.js') === false, "baseAdmin ne charge plus le script chartist inutilisé");
assertCondition(strpos($baseAdmin, 'easypiechart') === false, "baseAdmin ne charge plus easypiechart inutilisé");
assertCondition(strpos($baseAdmin, 'id="admin-main"') !== false, "baseAdmin possède la balise sémantique <main id=\"admin-main\">");

$baseAdmin2 = file_get_contents(resource_path('views/Layouts/admin/baseAdmin2.blade.php'));
assertCondition(strpos($baseAdmin2, 'user-scalable=0') === false, "baseAdmin2 ne bloque plus le zoom mobile (WCAG 1.4.4)");
assertCondition(strpos($baseAdmin2, 'skip-link') !== false, "baseAdmin2 possède un lien d'évitement accessible");

// 2. Contrôle des vues publiques
echo "\n2. CONTRÔLE DES VUES PUBLIQUES & SÉMANTIQUE :\n";
$header = file_get_contents(resource_path('views/Layouts/header.blade.php'));
assertCondition(strpos($header, 'aria-current="page"') !== false, "header.blade.php supporte aria-current='page' sur les liens actifs");

$contact = file_get_contents(resource_path('views/contact.blade.php'));
assertCondition(strpos($contact, '<iframe') !== false && strpos($contact, 'title=') !== false, "L'iframe Google Maps dans contact.blade.php a un titre accessible");

$infosDroit = file_get_contents(resource_path('views/Layouts/infosDroit.blade.php'));
assertCondition(strpos($infosDroit, 'http://webmail') === false, "Le lien webmail dans infosDroit est sécurisé (HTTPS)");

// 3. Contrôle des styles (design-system.css)
echo "\n3. CONTRÔLE DU SYSTÈME DE DESIGN (css/design-system.css) :\n";
$ds = file_get_contents(public_path('css/design-system.css'));
assertCondition(strpos($ds, '.skip-link') !== false && strpos($ds, '.skip-link:focus') !== false, "Styles .skip-link et .skip-link:focus définis");
assertCondition(strpos($ds, '@media print') !== false, "Feuille de style d'impression @media print présente");
assertCondition(strpos($ds, 'overflow-wrap: break-word') !== false, "overflow-wrap anti-débordement mobile présent");

// 4. Contrôle des optimisations d'images
echo "\n4. CONTRÔLE DE L'OPTIMISATION DES IMAGES :\n";
$gerantSize = file_exists('img/gerant2.jpg') ? filesize('img/gerant2.jpg') : 0;
assertCondition($gerantSize > 0 && $gerantSize < 100 * 1024, sprintf("img/gerant2.jpg est optimisé (<100 KB, mesuré: %.1f KB)", $gerantSize / 1024));

$backupExists = file_exists('sauvegarde/original_images/gerant2.jpg');
assertCondition($backupExists, "La sauvegarde originale de gerant2.jpg est préservée dans sauvegarde/original_images/");

// 5. Test de compilation Blade de toutes les vues actives du projet
echo "\n5. TEST DE COMPILATION BLADE DE TOUTES LES VUES ACTIVES (24 vues) :\n";
$allViews = [
    // Layouts
    'Layouts/baseHTML.blade.php',
    'Layouts/header.blade.php',
    'Layouts/footer.blade.php',
    'Layouts/infosDroit.blade.php',
    'Layouts/app.blade.php',
    'Layouts/admin/baseAdmin.blade.php',
    'Layouts/admin/baseAdmin2.blade.php',
    // Public
    'accueil.blade.php',
    'presentation.blade.php',
    'formation.blade.php',
    'developpement.blade.php',
    'fdfp.blade.php',
    'contact.blade.php',
    'dmdForm.blade.php',
    'dmdForm2.blade.php',
    'dmdPrest.blade.php',
    // Auth
    'auth/login.blade.php',
    'auth/register.blade.php',
    'auth/passwords/email.blade.php',
    'auth/passwords/reset.blade.php',
    'auth/passwords/confirm.blade.php',
    'auth/verify.blade.php',
    // Admin
    'administration/accueilAd.blade.php',
    'administration/dmdForm.blade.php',
    'administration/dmdPrest.blade.php',
    'administration/domForm.blade.php',
    'administration/newForm.blade.php',
    'administration/listeModules.blade.php',
    'administration/newModule.blade.php',
    'administration/typePr.blade.php',
    'administration/newPr.blade.php',
    'administration/evenements.blade.php',
    'administration/newEvenements.blade.php',
    'administration/suggestions.blade.php',
    'administration/user.blade.php',
    'administration/newUser.blade.php',
    'administration/profil.blade.php',
    'administration/modifPro.blade.php',
    'administration/listeBenef.blade.php',
];

$bladeErrors = 0;
foreach ($allViews as $v) {
    $full = resource_path('views/' . $v);
    if (!file_exists($full)) {
        echo "  [ERREUR] Vue non trouvée: $v\n";
        $bladeErrors++;
        continue;
    }
    try {
        $compiled = Blade::compileString(file_get_contents($full));
        $temp = tempnam(sys_get_temp_dir(), 'bld_');
        file_put_contents($temp, $compiled);
        exec('php -l ' . escapeshellarg($temp), $out, $ret);
        unlink($temp);
        if ($ret === 0) {
            // OK
        } else {
            echo "  [LINT ERROR] $v\n";
            $bladeErrors++;
        }
    } catch (\Throwable $e) {
        echo "  [EXCEPTION] $v: " . $e->getMessage() . "\n";
        $bladeErrors++;
    }
}
assertCondition($bladeErrors === 0, sprintf("Toutes les %d vues Blade se compilent sans aucune erreur PHP", count($allViews)));

echo "\n------------------------------------------------------------\n";
echo sprintf("RÉSULTAT DU BANC DE TEST : %d/%d assertions réussies (%d échecs)\n", $passed, $assertions, $failed);
echo "------------------------------------------------------------\n";

if ($failed > 0) {
    exit(1);
}
exit(0);
