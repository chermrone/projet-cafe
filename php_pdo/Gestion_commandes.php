<?php
   include('session.php');
?>

<html>
	<head>
		<title>Gestion des commandes</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="script.js"></script>
		<style>
			body
			{
				margin:0;
				padding:0;
				background-color:#f1f1f1;
			}
			.box
			{
				width:1270px;
				padding:20px;
				background-color:#fff;
				border:1px solid #ccc;
				border-radius:5px;
				margin-top:25px;
			}
		</style>
	</head>
	<body>
		<div class="container box">
			<h1 align="center">Gestion des commandes</h1>
			<br />
			<div class="table-responsive">
				<br />
				
				<br /><br />
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
						<th width="10%">#</th>
							<th width="10%">id d'utilisateur</th>
							<th width="35%">nom d'utilisateur</th>
							<th width="35%">commande</th>
							<th width="35%">Date & heure</th>
							<th width="10%">confirmer</th>
							<th width="10%">Supprimer</th>
						</tr>
					</thead>
				</table>
				
			</div>
		</div>
		
	</body>
</html>


<div class="footer" align="center">
			<form action="Logout.php" method="post">
				<input type="submit" class="btn btn-dark" name="logout" value="logout">
			</form>
		</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Add User");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#id_user').html('');
	});
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],

	});

	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var full_name = $('#full_name').val();
		var detailles = $('#detailles').val();
		var date=$('date').val();
		var password=$('password').val();

		if(full_name != '' && detailles != '')
		{
			$.ajax({
				url:"insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Both Fields are Required");
		}
	});
	
	$(document).on('click', '.update', function(){
		var id_comande = $(this).attr("id_comande");
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{id_comande:id_comande},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#full_name').val(data.full_name);
				$('#detailles').val(data.detailles);
				$('#date').val(data.date);
				$('#password').val(data.password);
				$('.modal-title').text("Edit User");
				$('#id_comande').val(id_comande);
				$('#id_user').html(data.id_user);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var id_comande = $(this).attr("id_comande");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{id_comande:id_comande},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
	

	$(document).on('click', '.update', function(){
		var id_comande = $(this).attr("id_comande");
		if(confirm("Voulez vous valider la commande?"))
		{
			$.ajax({
				url:"confirm.php",
				method:"POST",
				data:{id_comande:id_comande},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
	
});
</script>