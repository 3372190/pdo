<?php

/**
 * Fudamental Part of PDO. (Prepare Statement!!!)
 *     - Escaping data before insert into database from USER PROVIDED DATA!!!
 * WITH Mysql = we need to do manually one by one
 * $email = mysql_real_escape_string($email);
 *
 * Why prepare() statment instead of query() statement!!
 * Security Protection against SQL query Injection!!
 * $db->prepare();
 *
 */
$db->query("SELECT * FROM users WHERE id = . $_GET[$id] . ");

/**
 *:id  is a placeholder.
 *prepare statement just preparing the query!!
 *Assign it to $user variable, for refercing which prepare statement to be executed.
 *
 *$user = $db->prepare("SELECT * FROM users WHERE id = :id ");
 *
 * - We need pass in the value of that we want to replace.
 * - Usually the placeHolder!!!!!!! value
 *   $user = $user->execute([
 *
 * //The key will be the placeholder , and assign with value
 *       'id' => $_GET['id'];
 *   ]);
 */



/**
 * Another way of doing Execute() statement
 * Binding Values method / OR Pass In as Array()
 *
 *   $user = $db->prepare("
 *      SELECT *
 *      FROM users
 *      WHERE id = :id  AND email = :email
 *   ");
 *
 *    //First parameter take the placeholder
 *    //Second Parameter take the value
 *
 *   $user->bindValue(':id'    , $_GET['id']);
 *   $user->bindValue(':email' , $_GET['email']);
 *
 *   $user = $user->fetch(PDO::FETCH_OBJ);
 *   var_dump($user);
 */

/**
 * bindParam is the same as bindValue but passes as Reference
 * $user->bindParam(':id', '$id');
 * $id = 'Egegegeeg';   //variable $id will change here! bcs of actual reference
 * $user->execute();
 */


/**
 *  Question Mark ? for placeholder
 *  $user = $db->prepare("SELECT * FROM users
 *      WHERE email = ?
 *      AND    id   = ?
 *  ");
 *
 * Execute Statement Will be Executed in the order of QuestionMark ?
 *    Execute() Statement will not be associative array
 *    The Array is just going to contain value
 * $user->execute([$_GET['email'] , $_GET['id']);
 */


/**
 * Complex query
 *
 * $username = $_GET['username'];
 *
 *  $user->prepare("
 *      SELECT *
 *      FROM user
 *      WHERE username LIKE :username
 *  ");
 *
 * //usually when we use LIKE , it came with %:username%
 * //BUT prepare statement wont allow us to do this.
 * //so we need to do it in Execute or bindvalue method
 *
 * $user->bindValue('username','%$username%');
 */

/**
 *
 *
 *
 *
 */

/**
 *
 *    $orders = ['DESC','ACS'];
 *    $order  = strtoupper($_GET['order']);
 *
 *    $order = in_array($order, $orders) ? $order : 'DESC' ;
 *
 *    $user = $db->prepare("
 *        SELECT *
 *        FROM user
 *        ORDER BY date $order
 *    ");
 *
 *   $user->execute();
 *   $user->fetchAll(PDO::FETCH_OBJ);
 *
 *
 */

/**
 * manually Escaping Method in PDO
 * quote() Method!!  "SAME AS"  mysql_real_escape_string();
 *
 * $username = $db->quote($_GET['username']);
 *
 * $user = $db->query("
 *     SELECT *
 *     FROM user
 *     WHERE username = '$username'
 * ");
 */



/**
 * Handle Error In Pdo
 * ERRMODE_EXCEPTION is default Erorr Reporting in PDO
 *
 *$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 *
 *try{
     *   $user = $db->prepare("
     *       SELECT *
     *       FROM users
     *       WHERE username = :username
     *   ");
     *
     * $user->execute([]);
 *}catch (PDOException $e){
     * $e->getMessage();
 *}
 */


/**
 * Pdo rowCount() Method to count the total amount of Record!!
 *
 *     $users = $db->query("
 *         SELECT *
 *         FROM users
 *     ")
 *
 *     echo $users->rowCount();
 *
 */


/**
 *
 * If we want to return row Affected in the database
 *  after update the record!!!
 *
 *     $update = $db->query("
 *         UPDATE users
 *         SET active = 1
 *         WHERE last_name = 'Henry'
 *     ")
 *
 * //It will return the $query RowCount of Update!!!
 *     echo $update->rowCount();
 *
 */
