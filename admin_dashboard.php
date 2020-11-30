<?php include('config.php');

session_start();
$obj=new DB_con();
$message = '';
$errors = array();

        /*if(isset($_GET['click'])){
		
			$pick=$_GET['pick'];
			$drop=$_GET['drop'];
			$ctype=$_GET['ctype'];
			$luggage=$_GET['luggage'];
			$total_distance=$_GET['distance'];
			$total_fare=$_GET['fare'];
		
			 <table border="1">
			<tr>
				<td>ride_id</td>
				<td>ride_date</td>
				<td>from</td>
				<td>to</td>
				<td>total_distance</td>
				<td>luggage</td>
				<td>total_fare</td>
				<td>status_in</td>
				<td>customer_user_id</td>
			</tr>


		<?php
			$sql="SELECT * FROM tbl_ride";
			$result= $this->conn->query($sql);
			while($row = $result->fetch_assoc()){
				?>
				<td><?php echo $row['ride_id']; ?></td>
				<td><?php echo $row['ride_date']; ?></td>
				<td><?php echo $row['from']; ?></td>
				<td><?php echo $row['to']; ?></td>
				<td><?php echo $row['total_distance']; ?></td>
				<td><?php echo $row['luggage']; ?></td>
				<td><?php echo $row['total_fare']; ?></td>
				<td><?php echo $row['status']; ?></td>
				<td><?php echo $row['customer_user_id']; ?></td>
				<?php
			}
		?>
		</tr>
		</table>

		}*/
?>table

<!DOCTYPE html>
    <html>
        <head>
            <title>Login</title>
            <link rel="stylesheet" href="admind.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		</head>
    
    <body>
		        
		<nav class="navbar navbar-expand-lg " id="nav">
		  <!--<a class="navbar-brand" href="#">Admin Dashboard</a>-->
		    <span>Admin Dashboard</span>
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		    </button>

		  <div class="collapse navbar-collapse rr" id="navbarSupportedContent">
			    <ul class="navbar-nav ml-auto rr">
			      <li class="nav-item active">
			        <a class="nav-link" href="trial.html" style='color:black'>Home <span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='color:black'>
			          Rides
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="#">Pending Rides</a>
			          <a class="dropdown-item" href="#">Completed Rides</a>
			          <a class="dropdown-item" href="#">Cancelled Rides</a>
			          <a class="dropdown-item" href="#">All Rides</a>
			        </div>
			      </li>
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='color:black'>
			          Users
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="#">Pending User Request</a>
			          <a class="dropdown-item" href="#">Approved User Request</a>
			          <a class="dropdown-item" href="#">All Users</a>
			        </div>
			      </li>
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='color:black'>
			          Location
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="#">Location List</a>
			          <a class="dropdown-item" href="#">Add New Location</a>
			        </div>
			      </li>
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='color:black'>
			          Account
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="#">Change Password</a>
			        </div>
			      </li>
		    </div>
		</nav>
		        
        <div class="back">
            <div class=cover>
        		<form method="post" action="admin_dashboard.php">
        			<?php
        			$query="SELECT * FROM tbl_ride";
        			echo "<b> <center>DatabaseOutput</center></b><br><br>";
        			if($result=$mysqli->query($query)){
        				while($row=$result->fetch_assoc()){
        					$ride_id=$row['ride_id'];
        					$ride_date=$row['ride_date'];
        					$from=$row['from'];
        					$to=$row['to'];
        					$total_distance=$row['total_distance'];
        					$luggage=$row['luggage'];
        					$total_fare=$row['total_fare'];
        					$customer_user_id=$row['customer_user_id'];

        				}
        				$result->free();
        			}



        			?>
        		</form>
      
        	

        	</div>
    	</div>
      
	    <footer class="page-footer xc">
		  <div class="footer-copyright text-center py-3 xz"><h4>CEDCABS</h4></div>
		</footer>

    </body>
</html>