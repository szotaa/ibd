<?php

use Ibd\Ksiazki;
use Ibd\Koszyk;

require_once 'src/Ksiazki.php';
require_once 'src/Db.php';

$ksiazki = new Ksiazki();
$koszyk = new Koszyk();
$bestsellery = $ksiazki->pobierzBestsellery();
$wartosc = $koszyk->policzWartosc(session_id());
?>

<div class="col-md-3">
    <?php if (empty($_SESSION['id_uzytkownika'])): ?>
        <h1>Logowanie</h1>

        <form method="post" action="logowanie.php">
            <div class="form-group">
                <label for="login">Login:</label>
                <input type="text" id="login" name="login" class="form-control input-sm" />
            </div>
            <div class="form-group">
                <label for="haslo">Hasło:</label>
                <input type="password" id="haslo" name="haslo" class="form-control input-sm" />
            </div>
            <div class="form-group">
                <button type="submit" name="zaloguj" id="submit" class="btn btn-primary btn-sm">Zaloguj się</button>
                <a href="rejestracja.php" class="btn btn-link btn-sm">Zarejestruj się</a>
                <input type="hidden" name="powrot" value="<?= basename($_SERVER['SCRIPT_NAME']) ?>" />
            </div>
        </form>
    <?php else: ?>
        <p class="text-right">
            Zalogowany: <strong><?= $_SESSION['login'] ?></strong>
            &nbsp;
            <a href="wyloguj.php" class="btn btn-secondary btn-sm">wyloguj się</a>
        </p>
    <?php endif; ?>

    <h1>Koszyk</h1>
    <p>
        Suma wartości książek w koszyku:
        <strong><?=$wartosc?></strong> PLN
    </p>

    <div>
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
</div>