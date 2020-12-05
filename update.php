<?php session_start();
include('config.php');
$obj=new DB_con();
$message = '';
$errors = array();


 ?>

<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="update.css">
        <title>
            Update Info
        </title>
    </head>

    <body>
        <body>
        <div class="topnav">
        <span>Update</span>
        <a href="#">Login</a>
        <a href="#">SignUp</a>
        <a href="logout.php">logout</a>
        </div>
        <form method="GET" action="update.php">
        <div class="back">
            <div class=cover>
        <table style="font-size: 26px; padding-left: 12px;">
            
            <tr>
                <td>Username:</td>
                <td><input type="text" name="user_name" placeholder="You Cant change the username..!!" readonly></td>
            </tr>
            <tr>
                <td>Name:</td>
                <td><input type="text" id="name" name="name" placeholder="Enter Name.."></td>
            </tr>
            <tr>
                <td>Mobile No:</td>
                <td><input type="number" id="mobile" name="mobile" placeholder="Enter Mobile Number.."></td>
            </tr>
            <tr>
                <td>Old Password:</td>
                <td><input type="password" id="oldpassword" name="oldpassword" placeholder="Enter Password.." required></td>
            </tr>
            <tr>
                <td>New Password:</td>
                <td><input type="password" id="newpassword" name="newpassword" placeholder="Enter Password Again.." required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="button" name="butt" id="butt" value="submit"></td>
            </tr>
                  
        </table>
    </div>
    </div>
    </form>
        <div class="navbar xc">
         <h2>CEDCABS</h2>
        </div>

<script>

    $('#butt').click(function(){
        var name= $('#name').val();
        var mobile= $('#mobile').val();
        var oldpassword= $('#oldpassword').val();
        var newpassword= $('#newpassword').val();
        
             $.ajax({
                url: 'midd.php',
                dataType:'json',
                method:'GET',
                data:{
                    button:true,
                    name: name,
                    mobile: mobile,
                    oldpassword: oldpassword,
                    newpassword: newpassword    
                },
               success: function(result)
                {
                    if(result.success != ""){
                    alert(result.success);
                }
                else{
                    console.log("failed");
                }

                               
                },
                error:function()
                {
                    alert("error");
                }
            }); 
        
       
    });






</script>
</body>
</html>
