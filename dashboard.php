<!--<?php include('config.php');

/*session_start();
$obj=new DB_con();
$message = '';
$errors = array();
function fetch_data(){
	$query="SELECT * FROM tbl_ride ORDER BY user_id DESC";
	$exec=mysqli_query($db, $query);
	if(mysqli_num_rows($exec)>0){
		$row=mysqli_fetch_all($exec,MYSQLI_ASSOC);
		return $row;
	}else {
		return $row=[];
	}
}
$fetchData=fetch_data();
show_data($fetchData);*/
?>-->

<!DOCTYPE html>
    <html>
        <head>
            <title>Login</title>
            <link rel="stylesheet" href="userd.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		</head>
    
    <body>
		        
		        <nav class="navbar navbar-expand-lg " id="nav">
		  <!--<a class="navbar-brand" href="#">Admin Dashboard</a>-->
		  <span>User Dashboard</span>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse rr" id="navbarSupportedContent">
		    <ul class="navbar-nav ml-auto rr">
		      <li class="nav-item active">
		        <a class="nav-link" href="" style='color:black'>Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item active">
		        <a class="nav-link" href="trial.html" style='color:black'>Book New Ride <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='color:black'>
		          Rides
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Pending Rides</a>
		          <a class="dropdown-item" href="#">Completed Rides</a>
		          <a class="dropdown-item" href="#">All Rides</a>
		        </div>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='color:black'>
		          Account
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Update Information</a>
		          <a class="dropdown-item" href="#">Change Password</a>
		        </div>
		      </li>

		  </div>
		</nav>
		        

        <div class="back">
            <div class=cover>
        <form method="post" action="admin_dashboard.php">

        	<!--<?php
    	/*function show_data($fetchData){
    		echo 'table border="1">
    		<tr>
    		<th>UserName</th>
    		<th>Name</th>
    		<th>Dateofsignup</th>
    		<th>mobile</th>
    		<th>is_block</th>
    		<th>password</th>
    		<th>is_admin</th>
    		</tr>';

    		if(count($fetchData as $data)>0){
    			$sn=1;
    			foreach($fetchData as $data){
    				echo "<tr>
    				<td>".$data['user_name']."</td>
    				<td>".$data['name']."</td>
    				<td>".$data['date_of_signup']."</td>
    				<td>".$data['mobile']."</td>
    				<td>".$data['is_block']."</td>
    				<td>".$data['password']."</td>
    				<td>".$data['is_admin']."</td>
    				<td><a href='crud-form.php?edit=".$data['id']."'>Edit</a></td>
          <td><a href='crud-form.php?delete=".$data['id']."'>Delete</a></td>
   </tr>";
   $sn++;
    			}
    		}
    		else{
    			echo "<tr>
    			<td colspan='7'>No Data Found</td>
    			</tr>";
    		}
    		echo "</table>";
    	}*/
        	?>-->

       
        </div>
    </div>
    </form>
    <footer class="page-footer xc">
    	

	  
	  <div class="footer-copyright text-center py-3 xz"><h4>CEDCABS</h4></div>
	  

	</footer>

    </body>
    </html>