<?php

include('db.php');
include("function.php");

if(isset($_POST["id_comande"]))
{
	$statement = $connection->prepare(
		"DELETE FROM commande WHERE id_comande = :id_comande"
	);
	$result = $statement->execute(
		array(
			':id_comande'	=>	$_POST["id_comande"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>