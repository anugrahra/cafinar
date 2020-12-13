<?php
if (!session_id()) session_start();

setlocale(LC_ALL, 'id_ID');
// error_reporting(0);

require_once "app/init.php";

// instansiasi class App
$app = new App();
