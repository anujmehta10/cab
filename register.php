<?php include('config.php');

session_start();
$obj=new DB_con();
$message = '';
$errors = array();

if(isset($_POST['submit']))
	{
        //session_start();
		
		$user_name = isset($_POST['user_name']) ? ($_POST['user_name']) : '';
		$name = isset($_POST['name']) ? ($_POST['name']) : '';
        $password = isset($_POST['password']) ? ($_POST['password']) : '';
        $repassword = isset($_POST['repassword']) ? ($_POST['repassword']) : '';
        $mobile=isset($_POST['mobile']) ? ($_POST['mobile']) : '';
             if ($password == $repassword)
             {
            /*$insert = "INSERT INTO tbl_user(`user_name`, `name`,`date_of_signup`,`mobile`,`is_block`,`password`,`is_admin`)
            VALUES('$user_name', '$name','$date_of_signup','$mobile','$is_block','".md5('$password')."','$is_admin')";
            mysqli_query($conn, $insert); 
            header("location: login.php");
             }
        else
        {
            $_SESSION['message'] = "Password Not Match";
        }*/
        $obj->insert($user_name, $name, $password, $repassword,$mobile);
    }
        
  
	}

?>
<!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="rstyle.css">
    </head>

    <body>
        <div class="topnav">
        <span>Register</span>
        <a href="login.php">Login</a>
        <a href="register.php">SignUp</a>
        <a href="trial.html">Home</a>
        </div>
        <form method="post" action="register.php">
        <div class="back">
            <div class=cover>
        <table style="font-size: 26px; padding-left: 12px;">
            
            <tr>
                <td>Username:</td>
                <td><input type="text" name="user_name" class="textInput"></td>
            </tr>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" class="textInput"></td>
            </tr>
            <tr>
                <td>Mobile No:</td>
                <td><input type="text" name="mobile" class="textInput"></td>
            </tr>
            <tr>
                <td>password:</td>
                <td><input type="password" name="password" class="textInput"></td>
            </tr>
            <tr>
                <td>Re password:</td>
                <td><input type="password" name="repassword" class="textInput"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="submit"></td>
            </tr>
                  
        </table>
    </div>
    </div>
    </form>
        <div class="navbar xc">
         <h2>CEDCABS</h2>
        </div>
    </body>
    </html>