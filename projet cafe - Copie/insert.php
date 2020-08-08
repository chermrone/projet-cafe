<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<?php
include("db1.php");
include("functions.php");

$jsonobj = get_name($dblink);
$row= array();
$row=json_decode($jsonobj, true);
$final=array();

foreach ($row as $detailles)
{
  $id_prod=$detailles['id_produit'];
  $quantite=$_POST[$id_prod];
  if($quantite!=0){
  
      $final[$i]['id_produit']=$detailles['id_produit'];
      $final[$i]['nom']=$detailles['nom'];
      $final[$i]['Quantite']=$quantite;
    
  }
  
}


$detailles1=json_encode($final);
$id_user1=$_POST['id_user'];
$full_name1=$_POST['full_name'];
$img1=$_POST['img'];
echo "$id_user1 $full_name1";


//requete mysql pour insertion des donnés dans la table


$sql = "INSERT INTO `commande` (`id_user`, `full_name`, `detailles`, `image`) VALUES ('".$id_user1."', '".$full_name1."', '".$detailles1."', '".$img1."');";

if ($dblink->query($sql) === TRUE) {
  echo '
  <div class="container">
  
  <div class="alert alert-success" style=" margin: 20%; width: 50%; text-align:center;">
    <strong>Success!</strong> Votre commande est passée avec succéss</br> merci pour votre confiance!.
  </div>';
} 
else {
  echo "Error: " . $sql . "<br>" . $dblink->error;
}

$dblink->close();
?>

</body>
</html>

