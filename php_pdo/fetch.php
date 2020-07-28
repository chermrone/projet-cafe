<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM commande where etat='0' ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'OR etat="0" AND full_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR etat="0" AND id_comande LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR etat="0" AND id_user LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR etat="0" AND date LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY id_comande ASC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	

	$sub_array = array();
	$sub_array[] = $row["id_comande"];
	$sub_array[] = $row["id_user"];
	$sub_array[] = $row["full_name"];
	$sub_array[] = $row["detailles"];
	$sub_array[] = $row["date"];
	$sub_array[] = '<button type="button" name="update" id_comande="'.$row["id_comande"].'" class="btn btn-warning btn-xs update">Confirmer</button>';
	$sub_array[] = '<button type="button" name="delete" id_comande="'.$row["id_comande"].'" class="btn btn-danger btn-xs delete">Supprimer</button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>