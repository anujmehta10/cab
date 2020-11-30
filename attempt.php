<?php

include('config.php');
$obj=new DB_con();
$message = '';
$errors = array();

if (isset($_POST['submit'])) {
   $user_name = isset($_POST['user_name'])?$_POST['user_name']:'';
    $name = isset($_POST['name'])?$_POST['name']:'';
   $password = isset($_POST['password'])?$_POST['password']:'';
    $repassword = isset($_POST['repassword'])?$_POST['repassword']:'';
$mobile = isset($_POST['mobile'])?$_POST['mobile']:'';
   $isblock = isset($_POST['isblock'])?$_POST['isblock']:'';
   $isadmin = isset($_POST['isadmin'])?$_POST['isadmin']:'';

     /*if ($password != $repassword) {
   $errors[] = array('input'=>'password','msg'=>'password not match');
  //echo "Password doesn't Match";
    }

    $sql = "SELECT  `user_name`,  `name`,`mobile` from user";
    $result = $conn->query($sql);
   while ($row = $result->fetch_assoc()) {
        if ($row["name"]== $name) {
            $errors[] = array('input'=>'form','msg'=>'name already exists');
        } elseif ($row["mobile"]== $mobile) {
            $errors[] = array('input'=>'form','msg'=>'mb no already exists');
        }
      }*/
        $obj->insert($name,$user_name,$password,$repassword, $mobile,$isblock,  $isadmin);    
    }
 



?>


<html>
<head>
<title>
Register
</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="wrapper">
<div id="signup-form">
<div id="message">
<?php echo $message; ?>
</div>
<div id="errors">
<?php if (sizeof($errors)>0) : ?>
<ul>
<?php foreach($errors as $error) : ?>
<li><?php echo $error['msg'];?> </li>
<?php endforeach; ?>
</ul>
<?php endif; ?>

 <h1 id="ad">Welcome users</h1>
    <div class="topnav">
    <a href="login.php" >Login</a>
    <a href="home.php">Home</a>
</div>


<table id="a4">
<tr><td colspan="4"><h2> Cedcab Sign Up</h2></td></tr>


<form  action="" method="POST">

 
<tr>
 <td><label for="user_name" >user_name:</td> <td><input type="text"  name="user_name" required></label></td>
</tr>

<tr>
 <td><label for="name" >name:</td> <td><input type="text"  name="name" required></label></td>
</tr>
<tr>
   <td><label for="password">Password:</td> <td> <input type="password" name="password" required></label></td>
 </tr>
<tr>
  <td><label for="repassword">Re-Password:</td> <td> <input type="password" name="repassword" required></label></td>
</tr>
<tr>
 <td><label for="mobile">mobile:</td> <td><input type="text" name="mobile" required></label></td>
</tr>
<tr>
  <td><input type="submit" id="sub" name="submit" value="Submit"></td>
   
</tr>
</table>
</form>

</div>
</div>
</body>
</html>