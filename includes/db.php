<?php
require_once 'vendor/autoload.php'; 

define('DSN', 'mysql:host=127.0.0.1; dbname=oopcms');
define('DB_USER','root');
define('DB_PASS','');

try{

  $db = new PDO(DSN, DB_USER, DB_PASS);

}catch(PDOException $e){

  $e->getMessage();

}
