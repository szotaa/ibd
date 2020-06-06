<?php

ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);
session_start();

require_once 'vendor/autoload.php';

use Ibd\Autorzy;
use Ibd\Db;

if(isset($_POST)) {
	$autorzy = new Autorzy();
	$db = new Db();
	if($db->policzRekordy("select count(*) from ksiazki k where :id = k.id_autora", ["id" => $_GET['id']]) > 0)
	    echo "ten autor ma ksiazki";
	elseif($autorzy->usun($_GET['id']))
		echo 'ok';
}
