<?php

use Ibd\Ksiazki;

require_once 'src/Ksiazki.php';
require_once 'src/Db.php';

$ksiazki = new Ksiazki();
$bestsellery = $ksiazki->pobierzBestsellery();
?>

<div class="col-md-2">
	<h1>Bestsellery</h1>

    <?php foreach ($bestsellery as $item):?>
    <div class="card">
        <img src="<?=$item['zdjecie']?>" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"><?=$item['tytul']?></h5>
            <p class="card-text"><?=$item['imie'] . ' ' . $item['nazwisko']?></p>
            <a href="ksiazki.szczegoly.php?id=<?= $item['id'] ?>" class="btn btn-primary">Zobacz</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>