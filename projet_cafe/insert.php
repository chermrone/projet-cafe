<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		$paswd=$_POST["password"];
		$paswdc=$_POST["passwordc"];
		if($paswd==$paswdc){
			$pass=$paswd;
		}
		else $pass='';

		$statement = $connection->prepare("
			INSERT INTO users (first_name, last_name, email, password, image) 
			VALUES (:first_name, :last_name, :email, :password, :image)
		");
		if ($pass!=''){
		$result = $statement->execute(
			array(
				':first_name'	=>	$_POST["first_name"],
				':last_name'	=>	$_POST["last_name"],
				':email'	=>	$_POST["email"],
				':password' => $pass,
				':image'		=>	$image
			)
		);}
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
		else {echo 'le mot de passe de confirmation est différent du mot de passe';}
	}
	if($_POST["operation"] == "Edit")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_user_image"];
		}
		$statement = $connection->prepare(
			"UPDATE users 
			SET first_name = :first_name, last_name = :last_name, email=:email, password=:password, image = :image  
			WHERE id = :id
			"
		);
		$paswd=$_POST["password"];
		$paswdc=$_POST["passwordc"];
		if($paswd==$paswdc){
			$pass=$paswd;
		}
		else $pass='';
		if ($pass!=''){
		$result = $statement->execute(
			array(
				':first_name'	=>	$_POST["first_name"],
				':last_name'	=>	$_POST["last_name"],
				':email'	=>	$_POST["email"],
				'password' => $pass,
				':image'		=>	$image,
				':id'			=>	$_POST["user_id"]
			)
		);}

		if(!empty($result))
		{
			echo 'Data Updated';
		}
		else {echo 'le mot de passe de confirmation est différent du mot de passe';}
	}
}

?>