<?php

/**
 * Connecting to database within php
 * - Mysql_ , MySQLi,
 * - pdo, (much more flexible and more simple syntax).
 * MySQLi - restrict only to work with Mysql databases
 * Pdo, support different databases with user driver .
 * - IBM, Oracle, CUBRID, FIrebird
 *
 *
 * Why Pdo?
 *
 * Sequel Pro for MAC- users
 *
 *
 */

//Checking the driver existing in php!!
$driver = PDO::getAvailableDrivers();
var_dump($driver);

//checking if a connection fail!
try{
  $db = new PDO('mysql:host=127.0.0.1;dbname=todo','root','');
}catch(PDOException $e){
    echo $e->getMessage();
    //for flow Control,we dont want customer to know what is wrong with the SoapServer//
    //so we dont want to output the Error Report to users
    //Do do that, we need to kill the page by
    //die('We are having technical issue currently!! Checking back later');
}

/**
 * Execute the data Right away!!!
 */
        // $db->query("
        //     UPDATE task
        //     SET username='billyg'
        //     WHERE id = 2
        // ");

/**
 * To pull data back from database record!!
 *
 *
 * $user = $db->query('SELECT * FROM users WHERE id =2');
 * var_dump($user); //will return the query!!! bcs it is PDOStatement query!!
 *
 * $user->fetch(); //To retrieve the result from database! Fetch back with numerical and associative Array
 * echo $user['username'];
 */


/**
 * setFetch Style/Types
 *   - By Default, it fetch both index and key results back!!
 *   $user->fetch(PDO::FETCH_ASSOC);
 *   $user->fetch(PDO::FETCH_NUM);
 *
 * Better Way, pull result back as an object
 *  $user->fetch(PDO::FETCH_OBJ);
 *  $user->username;
 */


/**
 * Pulling Back All Result!!!
 *   $users->fetchAll(PDO::FETCH_OBJ);
 *
 *   foreach($users as $user)
 *   {
 *      echo $user->username ,'<br>';
 *   }
 */
