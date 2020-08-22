<?php

$dblink = new mysqli("sql308.byetcluster.com", "epiz_26241248", "hnAxe40lodNyO3t", "epiz_26241248_cafeshop");

//Check connection was successful
  if ($dblink->connect_errno) {
     printf("Failed to connect to database");
     exit();
  }


?>