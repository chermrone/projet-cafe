<?php
require 'db1.php';

if(isset($_POST['action'])){
    $sql = "SELECT * FROM produits WHERE class!=''";
    if(isset($_POST['class'])){
        $class= implode("','", $_POST['class']);
        $sql.="AND class IN('".$class."')";   
    }
    $result = $dblink->query($sql);
    $dbdata = '';

    if($result->num_rows>0){
        while ( $row = $result->fetch_assoc())  {
            $dbdata.='<div class="menu-item" style="text-align: center;">
            <h2 class="menu-item-contenu" style="text-align: center;" >
                    '. $row["class"].'
            </h2>
            <h3 class="menu-item-contenu" style="text-align: center;" >
                   '.$row["nom"].'
            </h3>
            <p style="text-align: center;">
            '.$row["contenu"].'
            </p>
            <div class="container mt-5" style="width: 300px;">
                <input type="number" placeholder="0" min="0" max="1000" step="1" data-prefix="'. $row["prix"].'DT" name="'.$row["id_produit"].'">
            </div>
        </div>
            </br></br>'
          }
    }
    else $dbdata= "<h3>Pas de produits</h3>";
    echo $dbdata;
}
  
?>