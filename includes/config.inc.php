<?php
$ablakcim = array(
    'cim' => 'Beadandó',
);

$fejlec = array(
    'kepforras' => 'header.jpg',
    'kepalt' => 'header',
	'cim' => '',
	'motto' => ''
);

$lablec = array(
    'copyright' => 'Copyright '.date("Y").'.',
    'ceg' => 'Beadandó'
);

$oldalak = array(
	'/' => array('fajl' => 'cimlap', 'szoveg' => 'Címlap', 'menun' => array(1,1)),
	'terkep' => array('fajl' => 'terkep', 'szoveg' => 'Térkép', 'menun' => array(1,1)),
	'videok' => array('fajl' => 'videok', 'szoveg' => 'Videók', 'menun' => array(1,1)),
	'fenykepalbum' => array('fajl' => 'fenykepalbum', 'szoveg' => 'Galéria', 'menun' => array(1,1)),
    'kapcsolat' => array('fajl' => 'kapcsolat', 'szoveg' => 'Kapcsolat', 'menun' => array(1,1)),
    'belepes' => array('fajl' => 'belepes', 'szoveg' => 'Belépés', 'menun' => array(1,0)),
    'kilepes' => array('fajl' => 'kilepes', 'szoveg' => 'Kilépés', 'menun' => array(0,1)),
    'belep' => array('fajl' => 'belep', 'szoveg' => '', 'menun' => array(0,0)),
    'regisztral' => array('fajl' => 'regisztral', 'szoveg' => '', 'menun' => array(0,0)),
	'feltoltes' => array('fajl' => 'feltoltes', 'szoveg' => '', 'menun' => array(1,1)),
	'kapcsolat1' => array('fajl' => 'kapcsolat1', 'szoveg' => '', 'menun' => array(1,1))
	
	
);

$hiba_oldal = array ('fajl' => '404', 'szoveg' => 'A keresett oldal nem található!');
?>