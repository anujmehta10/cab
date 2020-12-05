<?php session_start();
include('config.php');
$obj=new DB_con();
$message = '';
$errors = array();
$user_id=$_SESSION['userdata']['user_id'];
$resultc=$obj->comp($user_id);
$resultp=$obj->pending($user_id);
$resultall=$obj->allr($user_id);
 
 ?>      

<!DOCTYPE html>
    <html>
        <head>
            <title>Login</title>
            <link rel="stylesheet" type="text/css" href="userd.css">
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
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='color:black'>
		          Rides
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item pending"  href="#">Pending Rides</a>
		          <a class="dropdown-item completed" href="#">Approved Rides</a>
		          <a class="dropdown-item all" href="#">All Rides</a>
		        </div>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='color:black'>
		          Account
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="update.php">Update Information</a>
			        </div>
		      </li>
              <li class="nav-item active">
                <a class="nav-link" href="trial.html" style='color:black'>Book New Ride <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="logout.php" style='color:black'>Logout <span class="sr-only">(current)</span></a>
              </li>

		  </div>
		</nav>       
        <form method="post" action="dashboard.php">
            <div class="back">
                <div class="show" id="show">
                    <div class="row">
                        <div class="tiles text-centre"><p>Pending Rides</p>
                            <p><?php
                            if($resultp!=false){
                                if ($resultp->num_rows >= 0) {
                                    echo $resultp->num_rows;
                                }
                            }
                            else{
                                    echo "0";
                                }
                                 ?>
                            </p>
                            <p id="card-ride-request"></p>
                            <a class="btn-btn-outline-info pending">PendingRides</a>
                        </div>
                        <div class="tiles text-centre">
                            <p>Completed Rides</p><p>
                                <?php
                                if($resultc!=false){
                                if ($resultc->num_rows >= 0) {
                                    echo $resultc->num_rows;
                                }
                            }else{
                                    echo "0";
                                }
                                 ?>
                            </p>
                            <p id="card-ride-request">
                            </p><a href="#" class="btn-btn-outline-info completed">Completed Rides</a>
                        </div>
                        <div class="tiles text-centre">
                            <p>All Rides</p><p>
                                <?php
                                if($resultall!=false){
                                if ($resultall->num_rows >= 0) {
                                    echo $resultall->num_rows;
                                }
                            }else{
                                    echo "0";
                                }
                                 ?>
                                     
                                 </p>
                            <p id="card-ride-request"></p>
                            <a href="#" class="btn-btn-outline-info all">All Rides</a>
                        </div>
                         <div class="tiles text-centre">
                            <p>Total Fare</p><p>
                            <?php 
                            $total=0;
                            if($resultc!=false){
                            if ($resultc->num_rows > 0) {
  
                          while($row = $resultc->fetch_assoc()) {
                            $total=$total+$row['total_fare'];
                          }
                          echo $total;
                        }
                        }
                            else{
                                echo "0";
                                }
                            ?></p>
                            <p id="card-ride-request"></p>
                            <a href="#" class="btn-btn-outline-info completed" id="totalfare">Total Fare</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <footer class="page-footer xc">
	  <div class="footer-copyright text-center py-3 xz"><h4>CEDCABS</h4></div>
	</footer>

    <script>
        $('.all').click(function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    showall:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html='<li class="nav-item dropdown">\
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:black">\
                  All\
                </a>\
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">\
                      <a class="dropdown-item" id="usermicro" href="#">CedMicro</a>\
                      <a class="dropdown-item" id="usermini" href="#">CedMini</a>\
                      <a class="dropdown-item" id="userroyal" href="#">CedRoyal</a>\
                      <a class="dropdown-item" id="usersuv" href="#">CedSUV</a>\
                    </div>\
                </li>';
                html+="<table id='tabledecorate'><tr><th>RideDate<a class='icon' id='all-user-asc' href='#'>&#8593;</a><a class='icon' id='all-user-desc'  href='#'>&#8595;</a></th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare<a class='icon' id='all-fare-asc' href='#'>&#8593;</a><a class='icon' id='all-fare-desc'  href='#'>&#8595;</a></th><th>Status</th><th>Ctype</th></tr>";
                var user_status;
                for(var i=0;i<row.length;i++){
                    html+="<tr><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td><td></tr>";
                } 
                html+='</table>';
                $('#show').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
       
       
        });

        $('.pending').click(function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    pending:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html='<li class="nav-item dropdown">\
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:black">\
                  All\
                </a>\
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">\
                      <a class="dropdown-item" id="micro" href="#">CedMicro</a>\
                      <a class="dropdown-item" id="mini" href="#">CedMini</a>\
                      <a class="dropdown-item" id="royal" href="#">CedRoyal</a>\
                      <a class="dropdown-item" id="suv" href="#">CedSUV</a>\
                    </div>\
                </li>';
                html+="<table id='tabledecorate'><tr><th>RideDate</th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare</th><th>Status</th><th>Ctype</th><th>Action</th></tr>";
                for(var i=0;i<row.length;i++){
                    html+="<tr><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td><td><a id='remove' data-id="+row[i]['ride_id']+" href='#'>Remove</a></td></tr>";
                } 
                $('#show').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
       
       
        });
        $('.completed').click(function(){
            var total=0;
            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    completed:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<table id='tabledecorate'><tr><th>RideDate<a class='icon' id='complete-user-asc' href='#'>&#8593;</a><a class='icon' id='complete-user-desc'  href='#'>&#8595;</a></th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare<a class='icon' id='user-fare-asc' href='#'>&#8593;</a><a class='icon' id='user-fare-desc'  href='#'>&#8595;</a></th><th>Status</th><th>Ctype</th></tr>";
                for(var i=0;i<row.length;i++){
                     html+="<tr id='tabledecorate'><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td></tr>";
                } 
                 for(var i=0;i<row.length;i++){
                     total+=parseInt(row[i]['total_fare']);
                } 
                $('#show').html(html); 
                $('#show').append(total);      
                       },
                error:function(){
                    alert("error");
                }
            }); 
       
       
        });

        $('#show').on('click','#micro',function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    micro:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr id='tabledecorate'><th>RideDate</th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare</th><th>Status</th><th>Ctype</th></tr>";
                for(var i=0;i<row.length;i++){
                     html+="<tr id='tabledecorate'><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td></tr>";
                } 
                $('#tabledecorate').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
       
       
        });
        $('#show').on('click','#usermicro',function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    usermicro:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr id='tabledecorate'><th>RideDate</th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare</th><th>Status</th><th>Ctype</th></tr>";
                for(var i=0;i<row.length;i++){
                     html+="<tr id='tabledecorate'><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td></tr>";
                } 
                $('#tabledecorate').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
       
       
        });

        $('#show').on('click','#mini',function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    mini:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr id='tabledecorate'><th>RideDate</th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare</th><th>Status</th><th>Ctype</th></tr>";
                for(var i=0;i<row.length;i++){
                     html+="<tr id='tabledecorate'><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td></tr>";
                } 
                $('#tabledecorate').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
       
       
        });
        $('#show').on('click','#usermini',function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    usermini:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr id='tabledecorate'><th>RideDate</th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare</th><th>Status</th><th>Ctype</th></tr>";
                for(var i=0;i<row.length;i++){
                     html+="<tr id='tabledecorate'><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td></tr>";
                } 
                $('#tabledecorate').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
       
       
        });

        $('#show').on('click','#royal',function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    royal:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr id='tabledecorate'><th>RideDate</th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare</th><th>Status</th><th>Ctype</th></tr>";
                for(var i=0;i<row.length;i++){
                     html+="<tr id='tabledecorate'><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td></tr>";
                } 
                $('#tabledecorate').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
       
       
        });
        $('#show').on('click','#userroyal',function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    userroyal:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr id='tabledecorate'><th>RideDate</th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare</th><th>Status</th><th>Ctype</th></tr>";
                for(var i=0;i<row.length;i++){
                     html+="<tr id='tabledecorate'><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td></tr>";
                } 
                $('#tabledecorate').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
       
       
        });

        $('#show').on('click','#suv',function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    suv:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr id='tabledecorate'><th>RideDate</th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare</th><th>Status</th><th>Ctype</th></tr>";
                for(var i=0;i<row.length;i++){
                     html+="<tr id='tabledecorate'><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td></tr>";
                } 
                $('#tabledecorate').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
        });
            $('#show').on('click','#usersuv',function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    usersuv:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr id='tabledecorate'><th>RideDate</th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare</th><th>Status</th><th>Ctype</th></tr>";
                for(var i=0;i<row.length;i++){
                     html+="<tr id='tabledecorate'><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td></tr>";
                } 
                $('#tabledecorate').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
       
       
        });
        $('#show').on('click','#umicro',function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    umicro:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr id='tabledecorate'><th>RideDate</th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare</th><th>Status</th><th>Ctype</th></tr>";
                for(var i=0;i<row.length;i++){
                     html+="<tr id='tabledecorate'><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td></tr>";
                } 
                $('#tabledecorate').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
       
       
        });
        $('#show').on('click','#umini',function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    umini:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr id='tabledecorate'><th>RideDate</th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare</th><th>Status</th><th>Ctype</th></tr>";
                for(var i=0;i<row.length;i++){
                     html+="<tr id='tabledecorate'><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td></tr>";
                } 
                $('#tabledecorate').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
       
       
        });
        $('#show').on('click','#uroyal',function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    uroyal:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr id='tabledecorate'><th>RideDate</th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare</th><th>Status</th><th>Ctype</th></tr>";
                for(var i=0;i<row.length;i++){
                     html+="<tr id='tabledecorate'><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td></tr>";
                } 
                $('#tabledecorate').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
       
       
        });
        $('#show').on('click','#usuv',function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    usuv:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr id='tabledecorate'><th>RideDate</th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare</th><th>Status</th><th>Ctype</th></tr>";
                for(var i=0;i<row.length;i++){
                     html+="<tr id='tabledecorate'><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td></tr>";
                } 
                $('#tabledecorate').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
       
       
        });
       
        $('#show').on('click','#all-user-asc',function(){
            var sort="asc";
            allridesortbydate(sort);
        });
        $('#show').on('click','#all-user-desc',function(){
            var sort="desc";
            allridesortbydate(sort);
        });
        function allridesortbydate(sort){
            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    sort:sort,
                    allridesortbydate:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr><th>RideDate<a class='icon' id='all-user-asc' href='#'>&#8593;</a><a class='icon' id='all-user-desc'  href='#'>&#8595;</a></th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare<a class='icon' id='asc' href='#'>&#8593;</a><a class='icon' id='des'  href='#'>&#8595;</a></th><th>Status</th><th>Ctype</th></tr>";
                for(var i=0;i<row.length;i++){
                     html+="<tr><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td></tr>";
                } 
                $('#tabledecorate').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
        }

            $('#show').on('click','#all-fare-asc',function(){
                var sort="asc";
                allbyfare(sort);
            });
            $('#show').on('click','#all-fare-desc',function(){
                var sort="desc";
                allbyfare(sort);
            });
            function allbyfare(sort){
            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    sort:sort,
                    allbyfare:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr><th>RideDate<a class='icon' id='all-user-asc' href='#'>&#8593;</a><a class='icon' id='all-user-desc'  href='#'>&#8595;</a></th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare<a class='icon' id='all-fare-asc' href='#'>&#8593;</a><a class='icon' id='all-fare-desc'  href='#'>&#8595;</a></th><th>Status</th><th>Ctype</th></tr>";
                for(var i=0;i<row.length;i++){
                     html+="<tr><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td></tr>";
                } 
                $('#tabledecorate').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
        }
            
            $('#show').on('click','#complete-user-asc',function(){
                var sort="asc";
                completeuserbydate(sort);
            });
            $('#show').on('click','#complete-user-desc',function(){
                var sort="desc";
                completeuserbydate(sort);
            });
            function completeuserbydate(sort){
            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    sort:sort,
                    completeuserbydate:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr><th>RideDate<a class='icon' id='complete-user-asc' href='#'>&#8593;</a><a class='icon' id='complete-user-desc'  href='#'>&#8595;</a></th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare<a class='icon' id='asc' href='#'>&#8593;</a><a class='icon' id='des'  href='#'>&#8595;</a></th><th>Status</th><th>Ctype</th></tr>";
                for(var i=0;i<row.length;i++){
                     html+="<tr><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td></tr>";
                } 
                $('#tabledecorate').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
        }

            $('#show').on('click','#user-fare-asc',function(){
                var sort="asc";
                userbyfare(sort);
            });
            $('#show').on('click','#user-fare-desc',function(){
                var sort="desc";
                userbyfare(sort);
            });
            function userbyfare(sort){
            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    sort:sort,
                    userbyfare:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr><th>RideDate<a class='icon' id='all-user-asc' href='#'>&#8593;</a><a class='icon' id='all-user-desc'  href='#'>&#8595;</a></th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare<a class='icon' id='user-fare-asc' href='#'>&#8593;</a><a class='icon' id='user-fare-desc'  href='#'>&#8595;</a></th><th>Status</th><th>Ctype</th></tr>";
                for(var i=0;i<row.length;i++){
                     html+="<tr><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td></tr>";
                } 
                $('#tabledecorate').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
        }
        
       
        $(document).ready(function(){
            
           
        });

        $('#show').on('click','#remove',function(){
            var id=$(this).data('id');
            $.ajax({
                url: 'midd.php',
                method:'GET',
                data:{
                    id:id,
                    removeupdate:true
               
                },           
                dataType:'json',   
                success:function(row) {
                    //console.log(row);
                // var html="<table id='tabledecorate'><tr><th>RideDate</th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare</th><th>Status</th><th>Ctype</th><th>Action</th></tr>";
                // for(var i=0;i<row.length;i++){
                //      html+="<tr><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td><td><a id='remove' data-id="+row[i]['ride_id']+" href='#'>Remove</a></td></tr>";
                window.location.reload();
                }, 
                // $('#show').html(html);
                // //$('#tabledecorate').html(html);       
                //        },
                error:function(){
                    alert("error");
                }
            });


        });




        
        
       


      
 
</script>
</body>
</html>