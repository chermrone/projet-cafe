<?php

$username = 'root';
$password = '';
$connection = new PDO( 'mysql:host=localhost;dbname=cafeshop', $username, $password );
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

?>