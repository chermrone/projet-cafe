<?php
include('db.php');
include('function.php');
if(isset($_POST["id_comande"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM commande 
		WHERE id_comande = '".$_POST["id_comande"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["id_comande"]=$row["id_comande"];
		$output["id_user"]=$row["id_user"];
		$output["full_name"] = $row["full_name"];
		$output["detailles"] = $row["detailles"];
		$output["date"]=$row["date"];
		
		
		
	}
	echo json_encode($output);
}
?>