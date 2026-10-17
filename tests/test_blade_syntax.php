<?php

require_once __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Blade;

echo "=== TEST DE COMPILATION BLADE DES VUES DU LOT 6 ET LOT 7 ===\n\n";

$views = [
    // Lot 6
    'Layouts/admin/baseAdmin.blade.php',
    'Layouts/admin/baseAdmin2.blade.php',
    'administration/accueilAd.blade.php',
    // Lot 7
    'administration/dmdForm.blade.php',
    'administration/listeBenef.blade.php',
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
];

$success = 0;
$errors = 0;

foreach ($views as $viewRel) {
    $fullPath = resource_path('views/' . $viewRel);
    if (!file_exists($fullPath)) {
        echo " [ERREUR INTROUVABLE] {$viewRel}\n";
        $errors++;
        continue;
    }

    $rawBlade = file_get_contents($fullPath);

    try {
        $compiledPhp = Blade::compileString($rawBlade);

        // Vérifier la syntaxe PHP du code compilé avec php -l via lint string
        $tempFile = tempnam(sys_get_temp_dir(), 'blade_lint_');
        file_put_contents($tempFile, $compiledPhp);

        exec('php -l ' . escapeshellarg($tempFile), $output, $returnCode);
        unlink($tempFile);

        if ($returnCode === 0) {
            echo " [OK] {$viewRel} (Compilé avec succès - " . strlen($compiledPhp) . " octets)\n";
            $success++;
        } else {
            echo " [LINT ERROR] {$viewRel}: " . implode("\n", $output) . "\n";
            $errors++;
        }
    } catch (\Throwable $e) {
        echo " [EXCEPTION] {$viewRel}: " . $e->getMessage() . "\n";
        $errors++;
    }
}

echo "\n------------------------------------------------------------\n";
echo "RÉSULTAT DU CONTRÔLE SYNTAXIQUE : {$success} vues conformes, {$errors} erreurs.\n";
echo "------------------------------------------------------------\n";

if ($errors > 0) {
    exit(1);
}
exit(0);
