<?php 
    include('db1.php');
    function get_name($dblink){
        //Fetch 3 rows from actor table
        $result = $dblink->query("SELECT * FROM `produits`");

        //Initialize array variable
            $dbdata = array();
        
        //Fetch into associative array
            while ( $row = $result->fetch_assoc())  {
            $dbdata[]=$row;
            }
        
        //Print array in JSON format
         return json_encode($dbdata);
  
    }
    
?>


