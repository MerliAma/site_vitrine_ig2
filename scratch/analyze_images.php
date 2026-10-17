<?php

$images = [
    'img/gerant2.jpg',
    'img/portfolios/itg/MED_1878-7.jpg',
    'img/portfolios/itg/MED_1921-33.jpg',
    'img/portfolios/itg/MED_2233.jpg',
    'img/portfolios/itg/MED_5.jpg',
    'img/portfolios/itg/MED_6.jpg',
    'img/team/member2.jpg',
    'img/team/member3.jpg',
    'img/works/img11.jpg',
    'img/works/form.jpg',
    'img/works/img92.jpg',
    'img/works/site3.png',
    'img/tab1.png',
    'img/itg.png',
    'img/2.png',
    'img/catalogue.png'
];

foreach ($images as $img) {
    if (file_exists($img)) {
        $info = @getimagesize($img);
        $sizeKB = round(filesize($img) / 1024, 1);
        $w = $info ? $info[0] : '?';
        $h = $info ? $info[1] : '?';
        $mime = $info ? $info['mime'] : 'unknown';
        echo sprintf("%-35s : %8.1f KB | %4s x %-4s | %s\n", $img, $sizeKB, $w, $h, $mime);
    } else {
        echo sprintf("%-35s : NOT FOUND\n", $img);
    }
}
