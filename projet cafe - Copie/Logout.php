<?php
if($_POST['logout'])
{
   session_start();
   
   if(session_destroy()) {
      header("Location: login.php");
   }
}
?>