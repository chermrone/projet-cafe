<?php

include('db.php');
include("function.php");

if(isset($_POST["id_comande"]))
{
	
	$statement = $connection->prepare(
        "UPDATE commande SET etat = 1 WHERE id_comande = :id_comande"
	);
	$result = $statement->execute(
		array(
			':id_comande'	=>	$_POST["id_comande"]
		)
	);
	echo 'commande traitée';
	
}



?>