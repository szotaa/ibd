<?php

// jesli nie podano parametru id, przekieruj do listy książek
if (empty($_GET['id'])) {
    header("Location: ksiazki.lista.php");
    exit();
}

$id = (int)$_GET['id'];

include 'header.php';

use Ibd\Ksiazki;

$ksiazki = new Ksiazki();
$dane = $ksiazki->pobierz($id)
?>

    <h2><?= $dane['tytul'] ?></h2>

    <img src="zdjecia/<?=$dane['zdjecie']?>" alt="Zdjecie">

    <div class="container">
        <div class="row">Tytul: <?=$dane['tytul']?></div>
        <div class="row">Opis: <?=$dane['opis']?></div>
        <div class="row">Cena: <?=$dane['cena']?></div>
        <div class="row">Liczba Stron: <?=$dane['liczba_stron']?></div>
        <div class="row">ISBN: <?=$dane['isbn']?></div>
    </div>

<?php include 'footer.php'; ?>