<?php

// Liste des images lourdes à optimiser (DEC-006 & Lot 8 Axe 4)
$targets = [
    'img/gerant2.jpg' => ['max_w' => 600, 'max_h' => 600, 'quality' => 85],
    'img/team/member2.jpg' => ['max_w' => 600, 'max_h' => 600, 'quality' => 85],
    'img/team/member3.jpg' => ['max_w' => 600, 'max_h' => 600, 'quality' => 85],
    'img/team/member1.jpg' => ['max_w' => 600, 'max_h' => 600, 'quality' => 85],
    'img/portfolios/itg/MED_1878-7.jpg' => ['max_w' => 1200, 'max_h' => 900, 'quality' => 82],
    'img/portfolios/itg/MED_1921-33.jpg' => ['max_w' => 1200, 'max_h' => 900, 'quality' => 82],
    'img/portfolios/itg/MED_2233.jpg' => ['max_w' => 1200, 'max_h' => 900, 'quality' => 82],
    'img/portfolios/itg/MED_5.jpg' => ['max_w' => 1200, 'max_h' => 900, 'quality' => 82],
    'img/portfolios/itg/MED_6.jpg' => ['max_w' => 1200, 'max_h' => 900, 'quality' => 82],
    'img/works/MED_5.JPG' => ['max_w' => 1200, 'max_h' => 900, 'quality' => 82],
    'img/works/MED_1878-7.JPG' => ['max_w' => 1200, 'max_h' => 900, 'quality' => 82],
];

$backupDir = 'sauvegarde/original_images';
if (!is_dir($backupDir)) {
    mkdir($backupDir, 0777, true);
}

$totalBefore = 0;
$totalAfter = 0;

echo "=== OPTIMISATION DES IMAGES DU LOT 8 ===\n\n";

foreach ($targets as $relPath => $opts) {
    if (!file_exists($relPath)) {
        echo "IGNORÉ (non trouvé) : $relPath\n";
        continue;
    }

    $backupPath = $backupDir . '/' . basename($relPath);
    if (!file_exists($backupPath)) {
        copy($relPath, $backupPath);
    }

    $sizeBefore = filesize($relPath);
    $totalBefore += $sizeBefore;

    list($origW, $origH, $type) = getimagesize($relPath);

    if ($type !== IMAGETYPE_JPEG) {
        echo "Type non JPEG : $relPath\n";
        continue;
    }

    $srcImg = imagecreatefromjpeg($relPath);
    if (!$srcImg) {
        echo "Erreur chargement : $relPath\n";
        continue;
    }

    // Calcul ratio conservé
    $ratio = min($opts['max_w'] / $origW, $opts['max_h'] / $origH);
    if ($ratio >= 1.0) {
        // Déjà plus petite
        $newW = $origW;
        $newH = $origH;
    } else {
        $newW = (int)round($origW * $ratio);
        $newH = (int)round($origH * $ratio);
    }

    $dstImg = imagecreatetruecolor($newW, $newH);
    imagecopyresampled($dstImg, $srcImg, 0, 0, 0, 0, $newW, $newH, $origW, $origH);

    // Sauvegarde optimisée
    imagejpeg($dstImg, $relPath, $opts['quality']);

    imagedestroy($srcImg);
    imagedestroy($dstImg);

    clearstatcache(true, $relPath);
    $sizeAfter = filesize($relPath);
    $totalAfter += $sizeAfter;

    $gainPercent = round((1 - ($sizeAfter / $sizeBefore)) * 100, 1);
    echo sprintf(
        "%-36s : %7.1f KB -> %6.1f KB (-%4.1f%%) | %4dx%-4d -> %4dx%-4d\n",
        $relPath,
        $sizeBefore / 1024,
        $sizeAfter / 1024,
        $gainPercent,
        $origW, $origH,
        $newW, $newH
    );
}

$gainTotal = round((1 - ($totalAfter / $totalBefore)) * 100, 1);
echo "\n------------------------------------------------------------\n";
echo sprintf("POIDS TOTAL INITIAL  : %7.1f KB (%.2f MB)\n", $totalBefore / 1024, $totalBefore / (1024 * 1024));
echo sprintf("POIDS TOTAL OPTIMISÉ : %7.1f KB (%.2f MB)\n", $totalAfter / 1024, $totalAfter / (1024 * 1024));
echo sprintf("GAIN TOTAL           : -%4.1f%% (-%.2f MB économisés)\n", $gainTotal, ($totalBefore - $totalAfter) / (1024 * 1024));
