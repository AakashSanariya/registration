<?php
	if(!isset($_SESSION['user'])){
		header("location: login.php");
	}
	else{
		if(time() > $_SESSION['expire']){
			session_destroy();

			/*Cookies Destroy*/
			setcookie("Email", "", time() - 50);
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User List</title>

	<!-- Datatable -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

	<!-- Css Datatable -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

	<!-- //Datatable -->

</head>
<body>
<div class="container">
	<div class="float-right">
		<button class="btn btn-danger float:right"><a href="con_logout.php" style="text-decoration: none; color: white">Logout</a></button>
	</div>
	<div style="text-align: center">
		<h3>User List</h3>
	</div>
	<div class="table-responsive">
	<table id="userData" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Pincode</th>
            </tr>
        </thead>
        <tbody>
        	<?php
        		include_once("database.php");
        		$sql = "SELECT * FROM user";
        		$result = mysqli_query($con,$sql);
        		while ($row = mysqli_fetch_assoc($result)) {
        	?>
        	<tr>
        		<td><?php echo($row['firstName']); ?></td>
        		<td><?php echo($row['lastName']); ?></td>
        		<td><?php echo($row['email']); ?></td>
        		<td><?php echo($row['pincode']); ?></td>
        	</tr>
        	<?php	
        		}
        	?>
        </tbody>
    </table>
	</div>
</div>
<!-- Insert datatable -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#userData').DataTable();
	} );
</script>
<!-- //Insert Datatable -->
</body>
</html>