<?php

include_once('db1.php');

$filtre = $_POST['filtre'];
//Fetch 3 rows from actor table
 $result = $dblink->query("SELECT * FROM `produits` order by `id_produit`");

//Initialize array variable
  $dbdata = array();

//Fetch into associative array
  while ( $row = $result->fetch_assoc())  {
	$dbdata[]=$row;
  }

//Print array in JSON format
// echo json_encode($dbdata);

?>