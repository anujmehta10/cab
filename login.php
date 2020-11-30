<?php include('config.php');

session_start();
$obj=new DB_con();
$message = '';
$errors = array();



if(isset($_POST['login']))
	{
        //session_start();
		$user_name = isset($_POST['user_name']) ? ($_POST['user_name']) : '';
		$password = isset($_POST['password']) ? ($_POST['password']) : '';
        $is_block='0';
        $is_admin='0';
       
	   /*$sql = "SELECT * FROM tbl_user WHERE user_name='$user_name' AND password='".md5('$password')."'";
        $result = mysqli_query($conn,$sql);
		
		if(mysqli_num_rows($result)==1)
		{
			$_SESSION['message']="You are now logged in";
			$_SESSION['user_name'] = $user_name;
			header("location: dashboard.php");
		}
		else
		{
		$_SESSION['message']="Invalid Credintials";	
		}*/
         $obj->login($user_name, $password);
         
	 
	}

?>
<!DOCTYPE html>
    <html>
        <head>
            <title>Login</title>
            <link rel="stylesheet" href="lstyle.css">
        </head>
    </html>
    <body>
        <div class="topnav">
        <span>Login</span>
        <a href="trial.html">Calculate Fare</a>
        <a href="register.php">SignUp</a>
        <a>Home</a>
        <a>Contact</a>
        <a>About</a>
        </div>
        <div class="back">
            <div class=cover>
        <form method="post" action="login.php">
        <table style="font-size: 26px; padding-left: 12px;">
            <tr>
                <td>Username:</td>
                <td><input type="text" name="user_name" class="textInput"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" class="textInput"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="login" value="Login"></td>
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