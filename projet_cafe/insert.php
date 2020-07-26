<?php
include("db1.php");
include("functions.php");

$jsonobj = get_name($dblink);
$row= array();
$row=json_decode($jsonobj, true);
$final=array();
$i=0;
foreach ($row as $detailles)
{
  $id_prod=$detailles['id_produit'];
  $quantite=$_POST[$id_prod];
  if($quantite!=0){
      while ($i <= count($row)) {
        $final[$i]['id_produit']=$detailles['id_produit'];
        $final[$i]['nom']=$detailles['nom'];
        $final[$i]['Quantite']=$quantite;
        $i++;
      }
  }
}


$detailles1=json_encode($final);
$id_user=$_GET['id_user'];
$full_name=$_GET['full_name'];


//requete mysql pour insertion des donnés dans la table


$sql = "INSERT INTO `commande` (`id_user`, `full_name`, `detailles`) VALUES ('".$id_user."', '".$full_name."', '".$detailles1."');";

if ($dblink->query($sql) === TRUE) {
  echo "succés";
} else {
  echo "Error: " . $sql . "<br>" . $dblink->error;
}

$dblink->close();
?>
