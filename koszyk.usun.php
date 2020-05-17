<?php
ini_set('display_errors',1);
error_reporting(E_ALL|E_STRICT);
session_start();
require_once 'vendor/autoload.php';

$koszyk = new Ibd\Koszyk();

if(isset($_POST['id_ksiazki'])) {
    $koszyk->zmienLiczbeSztuk([$_POST['id_ksiazki'] => 0]);
    echo 'ok';
}