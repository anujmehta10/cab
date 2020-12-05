<?php session_start();
include('config.php');
$obj=new DB_con();
$message = '';
$errors = array();
$resultpend=$obj->pend();	
$resultcompl=$obj->compl();	
$resultcancel=$obj->cancel();
$resultallrides=$obj->allrides();	
$resultuserreq=$obj->userreq();
$resultapprove=$obj->approve();
$resultalluser=$obj->alluser();
$resultloc=$obj->loc();
?>
			
<!DOCTYPE html>
    <html>
        <head>
            <title>Login</title>
            <link rel="stylesheet" type="text/css" href="admind.css">
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
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='color:black'>
			          Rides
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item pend" href="#">Pending Rides</a>
			          <a class="dropdown-item compl" href="#">Completed Rides</a>
			          <a class="dropdown-item cancel" href="#">Cancelled Rides</a>
			          <a class="dropdown-item allr" href="#">All Rides</a>
			        </div>
			      </li>
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='color:black'>
			          Users
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item userreq" href="#">Pending User Request</a>
			          <a class="dropdown-item approve" href="#">Approved User Request</a>
			          <a class="dropdown-item alluser" href="#">All Users</a>
			        </div>
			      </li>
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='color:black'>
			          Location
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item loc" href="#">Location List</a>
			          <a class="dropdown-item" id="addloc" href="#">Add New Location</a>
			        </div>
			      </li>
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='color:black'>
			          Account
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="update.php">Update information</a>
			        </div>
			      </li>
			      <li class="nav-item active">
			        <a class="nav-link" href="logout.php" style='color:black'>Logout <span class="sr-only">(current)</span></a>
			      </li>
		    </div>
		</nav>
   
        	<div class="back">
            	<div class=cover id="disp">
            		<div class="row">
                        <div class="tiles text-centre pend"><p>Pending Rides</p>
                            <p><?php
                            if($resultpend!=false){
                                if ($resultpend->num_rows >= 0) {
                                    echo $resultpend->num_rows;
                                }
                            }
                            else{
                                    echo "0";
                                }
                                 ?>
                            </p>
                            <p id="card-ride-request"></p>
                            <a class="btn-btn-outline-info ">Pending Rides</a>
                        </div>
                        <div class="tiles text-centre compl">
                            <p>Approved Rides</p><p>
                                <?php
                                if($resultcompl!=false){
                                if ($resultcompl->num_rows >= 0) {
                                    echo $resultcompl->num_rows;
                                }
                            }else{
                                    echo "0";
                                }
                                 ?>
                            </p>
                            <p id="card-ride-request">
                            </p><a href="#" class="btn-btn-outline-info compl">Approved Rides</a>
                        </div>
                        <div class="tiles text-centre">
                            <p>Cancelled Rides</p><p>
                                <?php
                                if($resultcancel!=false){
                                if ($resultcancel->num_rows >= 0) {
                                    echo $resultcancel->num_rows;
                                }
                            }else{
                                    echo "0";
                                }
                                 ?>
                                     
                                 </p>
                            <p id="card-ride-request"></p>
                            <a href="#" class="btn-btn-outline-info cancel">Cancelled Rides</a>
                        </div>
                         <div class="tiles text-centre">
                            <p>All Rides</p><p>
                            <?php
                                if($resultallrides!=false){
                                if ($resultallrides->num_rows >= 0) {
                                    echo $resultallrides->num_rows;
                                }
                            }else{
                                    echo "0";
                                }
                                 ?></p>
                            <p id="card-ride-request"></p>
                            <a href="#" class="btn-btn-outline-info  allr" id="totalfare">All Rides</a>
                        </div>
                    










                    <div class="tiles text-centre userreq"><p>Pending Users</p>
                            <p><?php
                            if($resultuserreq!=false){
                                if ($resultuserreq->num_rows >= 0) {
                                    echo $resultuserreq->num_rows;
                                }
                            }
                            else{
                                    echo "0";
                                }
                                 ?>
                            </p>
                            <p id="card-ride-request"></p>
                            <a class="btn-btn-outline-info userreq">Pending Users</a>
                        </div>
                        <div class="tiles text-centre">
                            <p>Completed Users</p><p>
                                <?php
                                if($resultapprove!=false){
                                if ($resultapprove->num_rows >= 0) {
                                    echo $resultapprove->num_rows;
                                }
                            }else{
                                    echo "0";
                                }
                                 ?>
                            </p>
                            <p id="card-ride-request">
                            </p><a href="#" class="btn-btn-outline-info approve">Approved Users</a>
                        </div>
                        <div class="tiles text-centre">
                            <p>All Users</p><p>
                                <?php
                                if($resultalluser!=false){
                                if ($resultalluser->num_rows >= 0) {
                                    echo $resultalluser->num_rows;
                                }
                            }else{
                                    echo "0";
                                }
                                 ?>
                                     
                                 </p>
                            <p id="card-ride-request"></p>
                            <a href="#" class="btn-btn-outline-info alluser">All Users</a>
                        </div>
                        <div class="tiles text-centre">
                            <p>Servicable Locations</p><p>
                                <?php
                                if($resultloc!=false){
                                if ($resultloc->num_rows >= 0) {
                                    echo $resultloc->num_rows;
                                }
                            }else{
                                    echo "0";
                                }
                                 ?>
                                     
                                 </p>
                            <p id="card-ride-request"></p>
                            <a href="#" class="btn-btn-outline-info loc">Servicable Locations</a>
                        </div>
                         
                    </div>






        		

        	 	
        		
        		</div>
    		</div>

	    <footer class="page-footer xc">
		  <div class="footer-copyright text-center py-3 xz"><h4>CEDCABS</h4></div>
		</footer>


<script>
	$('.pend').click(function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    pend:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html='<li class="nav-item dropdown">\
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:black">\
                  All\
                </a>\
	                <div class="dropdown-menu" aria-labelledby="navbarDropdown">\
	                  <a class="dropdown-item" id="mic" href="#">CedMicro</a>\
	                  <a class="dropdown-item" id="min" href="#">CedMini</a>\
	                  <a class="dropdown-item" id="roy" href="#">CedRoyal</a>\
	                  <a class="dropdown-item" id="su" href="#">CedSUV</a>\
	                </div>\
                </li>';


                html+="<table id='tabledecorate'><tr><th>RideDate</th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare</th><th>Status</th><th>Ctype</th><th>Action</th></tr>";
                for(var i=0;i<row.length;i++){
                    html+="<tr><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td><td><a id='reject' data-id="+row[i]['ride_id']+" href='#'>Remove</a>||<a id='approv' data-id="+row[i]['ride_id']+" href='#'>Approve</a></td></tr>";
                } 
                html+="</table>";
                $('#disp').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
       
       
        });

	$('.compl').click(function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    compl:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<table id='tabledecorate'><tr><th>RideDate<a class='icon' id='complete-adm-asc' href='#'>&#8593;</a><a class='icon' id='complete-adm-desc'  href='#'>&#8595;</a></th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare<a class='icon' id='complete-adm-fare-asc' href='#'>&#8593;</a><a class='icon' id='complete-adm-fare-desc'  href='#'>&#8595;</a></th><th>Status</th><th>Ctype</th></tr>";
                for(var i=0;i<row.length;i++){
                    html+="<tr id='tabledecorate'><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td></tr>";
                } 
                html+="</table>";
                $('#disp').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
       
       
        });

	$('.cancel').click(function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    cancel:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<table id='tabledecorate'><tr><th>RideDate</th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare</th><th>Status</th><th>Ctype</th></tr>";
                for(var i=0;i<row.length;i++){
                    html+="<tr id='tabledecorate'><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td></tr>";
                } 

                $('#disp').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
       
       
        });

		$('.allr').click(function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    allrides:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html='<li class="nav-item dropdown">\
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:black">\
                  All\
                </a>\
	                <div class="dropdown-menu" aria-labelledby="navbarDropdown">\
	                  <a class="dropdown-item" id="amicro" href="#">CedMicro</a>\
	                  <a class="dropdown-item" id="amini" href="#">CedMini</a>\
	                  <a class="dropdown-item" id="aroyal" href="#">CedRoyal</a>\
	                  <a class="dropdown-item" id="asuv" href="#">CedSUV</a>\
	                </div>\
                </li>';


                html+="<table id='tabledecorate'><tr><th>RideDate<a class='icon' id='allr-adm-asc' href='#'>&#8593;</a><a class='icon' id='allr-adm-desc'  href='#'>&#8595;</a></th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare<a class='icon' id='all-adm-fare-asc' href='#'>&#8593;</a><a class='icon' id='all-adm-fare-desc'  href='#'>&#8595;</a></th><th>Status</th><th>Ctype</th><th>Action</th></tr>";
                for(var i=0;i<row.length;i++){
                    html+="<tr><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td><td><a id='invoice' data-id="+row[i]['ride_id']+" href='#'>Invoice</a></td></tr>";
                } 
                $('#disp').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
       
       
        });


        $('.userreq').click(function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    userreq:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<table id='tabledecorate'><tr><th>Username</th><th>Name</th><th>Date<a class='icon' id='all-adm-user-asc' href='#'>&#8593;</a><a class='icon' id='all-adm-user-desc'  href='#'>&#8595;</a></th><th>Mobile</th><th>IsBlock</th><th>Action</th></tr>";
                for(var i=0;i<row.length;i++){
                    html+="<tr id='tabledecorate'><td>"+row[i]['user_name']+"</td><td>"+row[i]['name']+"</td><td>"+row[i]['date_of_signup']+"</td><td>"+row[i]['mobile']+"</td><td>"+row[i]['is_block']+"</td><td><a id='reqreject' data-id="+row[i]['user_id']+" href='#'>Remove</a>||<a id='reqapprov' data-id="+row[i]['user_id']+" href='#'>Approve</a></td></tr>";
                } 
                $('#disp').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
       
       
        });

        $('.approve').click(function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    approve:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<table id='tabledecorate'><tr><th>Username</th><th>Name</th><th>Date<a class='icon' id='all-adm-user-asc' href='#'>&#8593;</a><a class='icon' id='all-adm-user-desc'  href='#'>&#8595;</a></th><th>Mobile</th><th>IsBlock</th></tr>";
                for(var i=0;i<row.length;i++){
                    html+="<tr id='tabledecorate'><td>"+row[i]['user_name']+"</td><td>"+row[i]['name']+"</td><td>"+row[i]['date_of_signup']+"</td><td>"+row[i]['mobile']+"</td><td>"+row[i]['is_block']+"</td></tr>";
                } 
                $('#disp').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
       
       
        });

        $('.alluser').click(function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    alluser:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<table id='tabledecorate'><tr><th>Username</th><th>Name</th><th>Date<a class='icon' id='all-admin-user-asc' href='#'>&#8593;</a><a class='icon' id='all-adm-user-desc'  href='#'>&#8595;</a></th><th>Mobile</th><th>IsBlock</th></tr>";
                for(var i=0;i<row.length;i++){
                    html+="<tr><td>"+row[i]['user_name']+"</td><td>"+row[i]['name']+"</td><td>"+row[i]['date_of_signup']+"</td><td>"+row[i]['mobile']+"</td><td>"+row[i]['is_block']+"</td></tr>";
                } 
                $('#disp').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
       
       
        });

        $('.loc').click(function(){
        	locationlist();
       
        });
        
        function locationlist(){
        	$.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    loc:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<table id='tabledecorate'><tr><th>Id</th><th>Location</th><th>Distance</th><th>IsAvailable</th></tr>";
                for(var i=0;i<row.length;i++){
                    html+="<tr><td>"+row[i]['id']+"</td><td>"+row[i]['name']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['is_available']+"</td></tr>";
                } 

                $('#disp').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
        }

        $('#addloc').click(function(){

            var html='<div>\
					  <label for="loc">Location:</label>\
					  <input type="text" id="loca" name="loca" required><br>\
					  <br>\
					  <label for="dist">Distance:</label>\
					  <input type="text" id="dist" name="dist" required><br><br>\
					  <input type="submit" value="Add Location" id="addloct">\
					</div>';
       		$('#disp').html(html);
       
        });

        $('#disp').on('click','#addloct',function(){
        var loca= $('#loca').val();
        var dist= $('#dist').val();
        
        $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                	loca:loca,
                	dist:dist,
                    addloct:true
               
                },              
                success:function(row) {
	                	if(row!='false')
	                	{
	                		locationlist();
	                	}
				},
                error:function(){
                    alert("error");
                }
            }); 

        });

        $('#disp').on('click','#mic',function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    mic:true

               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr><th>RideDate<a class='icon' id='allr-adm-asc' href='#'>&#8593;</a><a class='icon' id='allr-adm-desc'  href='#'>&#8595;</a></th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare<a class='icon' id='all-adm-fare-asc' href='#'>&#8593;</a><a class='icon' id='all-adm-fare-desc'  href='#'>&#8595;</a></th><th>Status</th><th>Ctype</th></tr>";
                for(var i=0;i<row.length;i++){
                    html+="<table id='tabledecorate'><tr><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td></tr>";
                } 
                $('#tabledecorate').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
       
       
        });

        $('#disp').on('click','#min',function(){
            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    min:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr><th>RideDate<a class='icon' id='allr-adm-asc' href='#'>&#8593;</a><a class='icon' id='allr-adm-desc'  href='#'>&#8595;</a></th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare<a class='icon' id='all-adm-fare-asc' href='#'>&#8593;</a><a class='icon' id='all-adm-fare-desc'  href='#'>&#8595;</a></th><th>Status</th><th>Ctype</th></tr>";
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
        $('#disp').on('click','#roy',function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    roy:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr><th>RideDate<a class='icon' id='allr-adm-asc' href='#'>&#8593;</a><a class='icon' id='allr-adm-desc'  href='#'>&#8595;</a></th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare<a class='icon' id='all-adm-fare-asc' href='#'>&#8593;</a><a class='icon' id='all-adm-fare-desc'  href='#'>&#8595;</a></th><th>Status</th><th>Ctype</th></tr>";
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
        $('#disp').on('click','#su',function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    su:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr><th>RideDate<a class='icon' id='allr-adm-asc' href='#'>&#8593;</a><a class='icon' id='allr-adm-desc'  href='#'>&#8595;</a></th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare<a class='icon' id='all-adm-fare-asc' href='#'>&#8593;</a><a class='icon' id='all-adm-fare-desc'  href='#'>&#8595;</a></th><th>Status</th><th>Ctype</th></tr>";
                for(var i=0;i<row.length;i++){
                    html+="<tr id='tabledecorate'><td>"+row[i]['ride_date']+"</td><td>"+row[i]['from']+"</td><td>"+row[i]['to']+"</td><td>"+row[i]['distance']+"</td><td>"+row[i]['luggage']+"</td><td>"+row[i]['total_fare']+"</td><td>"+row[i]['status']+"</td><td>"+row[i]['ctype']+"</td></tr>";
                } 
                html+="</table>";
                $('#tabledecorate').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
       
       
        });
        $('#disp').on('click','#amicro',function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    amicro:true

               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr><th>RideDate<a class='icon' id='allr-adm-asc' href='#'>&#8593;</a><a class='icon' id='allr-adm-desc'  href='#'>&#8595;</a></th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare<a class='icon' id='all-adm-fare-asc' href='#'>&#8593;</a><a class='icon' id='all-adm-fare-desc'  href='#'>&#8595;</a></th><th>Status</th><th>Ctype</th></tr>";
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
        $('#disp').on('click','#amini',function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    amini:true

               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr><th>RideDate<a class='icon' id='allr-adm-asc' href='#'>&#8593;</a><a class='icon' id='allr-adm-desc'  href='#'>&#8595;</a></th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare<a class='icon' id='all-adm-fare-asc' href='#'>&#8593;</a><a class='icon' id='all-adm-fare-desc'  href='#'>&#8595;</a></th><th>Status</th><th>Ctype</th></tr>";
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
        $('#disp').on('click','#aroyal',function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    aroyal:true

               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr><th>RideDate<a class='icon' id='allr-adm-asc' href='#'>&#8593;</a><a class='icon' id='allr-adm-desc'  href='#'>&#8595;</a></th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare<a class='icon' id='all-adm-fare-asc' href='#'>&#8593;</a><a class='icon' id='all-adm-fare-desc'  href='#'>&#8595;</a></th><th>Status</th><th>Ctype</th></tr>";
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
        $('#disp').on('click','#asuv',function(){

            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    asuv:true

               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr><th>RideDate<a class='icon' id='allr-adm-asc' href='#'>&#8593;</a><a class='icon' id='allr-adm-desc'  href='#'>&#8595;</a></th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare<a class='icon' id='all-adm-fare-asc' href='#'>&#8593;</a><a class='icon' id='all-adm-fare-desc'  href='#'>&#8595;</a></th><th>Status</th><th>Ctype</th></tr>";
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
        	$('#disp').on('click','#complete-adm-asc',function(){
                var sort="asc";
                adminbydate(sort);
            });
            $('#disp').on('click','#complete-adm-desc',function(){
                var sort="desc";
                adminbydate(sort);
            });
            function adminbydate(sort){
            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    sort:sort,
                    adminbydate:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr><th>RideDate<a class='icon' id='complete-adm-asc' href='#'>&#8593;</a><a class='icon' id='complete-adm-desc'  href='#'>&#8595;</a></th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare<a class='icon' id='complete-adm-fare-asc' href='#'>&#8593;</a><a class='icon' id='complete-adm-fare-desc'  href='#'>&#8595;</a></th><th>Status</th><th>Ctype</th></tr>";
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
        	$('#disp').on('click','#complete-adm-fare-asc',function(){
                var sort="asc";
                adminbyfare(sort);
            });
            $('#disp').on('click','#complete-adm-fare-desc',function(){
                var sort="desc";
                adminbyfare(sort);
            });
            function adminbyfare(sort){
            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    sort:sort,
                    adminbyfare:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr><th>RideDate<a class='icon' id='complete-adm-asc' href='#'>&#8593;</a><a class='icon' id='complete-adm-desc'  href='#'>&#8595;</a></th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare<a class='icon' id='complete-adm-fare-asc' href='#'>&#8593;</a><a class='icon' id='complete-adm-fare-desc'  href='#'>&#8595;</a></th><th>Status</th><th>Ctype</th></tr>";
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
        $('#disp').on('click','#allr-adm-asc',function(){
                var sort="asc";
                allradminbydate(sort);
            });
            $('#disp').on('click','#allr-adm-desc',function(){
                var sort="desc";
                allradminbydate(sort);
            });
            function allradminbydate(sort){
            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    sort:sort,
                    allradminbydate:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr><th>RideDate<a class='icon' id='allr-adm-asc' href='#'>&#8593;</a><a class='icon' id='allr-adm-desc'  href='#'>&#8595;</a></th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare<a class='icon' id='all-adm-fare-asc' href='#'>&#8593;</a><a class='icon' id='all-adm-fare-desc'  href='#'>&#8595;</a></th><th>Status</th><th>Ctype</th></tr>";
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

        $('#disp').on('click','#all-adm-fare-asc',function(){
                var sort="asc";
                alladminbyfare(sort);
            });
            $('#disp').on('click','#all-adm-fare-desc',function(){
                var sort="desc";
                alladminbyfare(sort);
            });
            function alladminbyfare(sort){
            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    sort:sort,
                    alladminbyfare:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<tr><th>RideDate<a class='icon' id='allr-adm-asc' href='#'>&#8593;</a><a class='icon' id='allr-adm-desc'  href='#'>&#8595;</a></th><th>From</th><th>To</th><th>Distance</th><th>Luggage</th><th>Fare<a class='icon' id='all-adm-fare-asc' href='#'>&#8593;</a><a class='icon' id='all-adm-fare-desc'  href='#'>&#8595;</a></th><th>Status</th><th>Ctype</th></tr>";
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
         	$('#disp').on('click','#all-adm-user-asc',function(){
                var sort="asc";
                alladminuserbydate(sort);
            });
            $('#disp').on('click','#all-adm-user-desc',function(){
                var sort="desc";
                alladminuserbydate(sort);
            });
            function alladminuserbydate(sort){
            $.ajax({
                url: 'midd.php',
                method:'GET',
                dataType:'json',
                data:{
                    sort:sort,
                    alladminuserbydate:true
               
                },              
                success:function(row) {
                    //console.log(row);
                var html="<table id='tabledecorate'><tr><th>Username</th><th>Name</th><th>Date<a class='icon' id='all-adm-user-asc' href='#'>&#8593;</a><a class='icon' id='all-adm-user-desc'  href='#'>&#8595;</a></th><th>Mobile</th><th>IsBlock</th></tr>";
                for(var i=0;i<row.length;i++){
                     html+="<tr id='tabledecorate'><td>"+row[i]['user_name']+"</td><td>"+row[i]['name']+"</td><td>"+row[i]['date_of_signup']+"</td><td>"+row[i]['mobile']+"</td><td>"+row[i]['is_block']+"</td></tr>";
                } 
                $('#tabledecorate').html(html);       
                       },
                error:function(){
                    alert("error");
                }
            }); 
        }

        $('#disp').on('click','#reject',function(){
            var id=$(this).data('id');
            $.ajax({
                url: 'midd.php',
                method:'GET',
                data:{
                    id:id,
                    reject:true
               
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
        $('#disp').on('click','#approv',function(){
            var id=$(this).data('id');
            $.ajax({
                url: 'midd.php',
                method:'GET',
                data:{
                    id:id,
                    approv:true
               
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
        $('#disp').on('click','#reqapprov',function(){
            var id=$(this).data('id');
            $.ajax({
                url: 'midd.php',
                method:'GET',
                data:{
                    id:id,
                    reqapprov:true
               
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

         $('#disp').on('click','#reqreject',function(){
            var id=$(this).data('id');
            $.ajax({
                url: 'midd.php',
                method:'GET',
                data:{
                    id:id,
                    reqreject:true
               
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
         $('#disp').on('click','#allreqreject',function(){
            var id=$(this).data('id');
            $.ajax({
                url: 'midd.php',
                method:'GET',
                data:{
                    id:id,
                    allreqreject:true
               
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
          $('#disp').on('click','#allreqapprov',function(){
            var id=$(this).data('id');
            $.ajax({
                url: 'midd.php',
                method:'GET',
                data:{
                    id:id,
                    allreqapprov:true
               
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

           $('#disp').on('click','#invoice',function(){
            var id=$(this).data('id');
            //console.log(id);
         $.ajax({
                url: 'midd.php',
                method:'GET',
                data:{
                    id:id,
                    invoice:true
               
                },           
                dataType:'json',   
                success:function(row) {
                var html="<div class='invoice'>";
                for(var i=0;i<row.length;i++){
                     html+="<p>Ride Date: "+row[i]['ride_date']+"</p>"+
                     "<p>From: "+row[i]['from']+"</p>"+
                     "<p>To: "+row[i]['to']+"</p>"+
                     "<p>Distance: "+row[i]['distance']+"</p>"+
                     "<p>Luggage: "+row[i]['luggage']+"</p>"+
                     "<p>Total Fare: "+row[i]['total_fare']+"</p>"+
                     "<p>Status: "+row[i]['status']+"</p>"+
                     "<p>Cab Type: "+row[i]['ctype']+"</p><button onclick='window.print()'>Print Receipt</button>";
                }

                //window.location.reload();
                $('#disp').html(html);
                }, 
                 
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

