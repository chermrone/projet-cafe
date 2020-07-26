<?php

$dblink = new mysqli("localhost", "root", "", "cafeshop");

//Check connection was successful
  if ($dblink->connect_errno) {
     printf("Failed to connect to database");
     exit();
  }


?>