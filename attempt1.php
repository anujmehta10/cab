<?php
class DB_con
{
public $conn;
public $dbhost;
public $dbuser;
public $dbpass;
public $dbname;
function __construct()
{

  $siteurl = "http://localhost/cab/";
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "cab";

  // Create connection
 $this->conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname );

// Check connection
if ($this->conn->connect_error) {
  die("Connection failed: " . $this->conn->connect_error);
}
else
{
//echo "Connected successfully";
}

}

public function insert($user_name,$name,$password,$repassword,$mobile,$isblock, $isadmin){
//if (sizeof($errors)==0) {
       $sql = "INSERT INTO user( `user_name`, `name`, `date`,  `password`, `mobile`, `isblock`,`is_admin`) VALUES( '".$user_name."', '".$name."',NOW(), '".$password."', '".$mobile."','1', '0'  )";

        if ($this->conn->query($sql) === true) {
        echo "signup created successfully";
        } else {
       $errors[] = array('input'=>'form','msg'=>$this->conn->error);
           //echo "Error: " . $sql . "<br>" . $conn->error;
        }

       $this->conn->close();
    }

//}


public function login($user_name,$password){

 $sql = "SELECT * FROM user WHERE
`user_name`='".$user_name."' AND `password`='".$password."'";
$result = $this->conn->query($sql);
 
   
   if ($result->num_rows > 0) {
// output data of each row
   while ($row = $result->fetch_assoc()) {

    $_SESSION['userdata'] = array('user_name'=>$row['user_name'],'user_id'=>$row['user_id']);
//header('location:index2.html');

 }
 } else {
 $errors[] = array('input'=>'form','msg'=>'invalid details');
 
}
        $this->conn->close();
   //}

      if($user_name==$user_name &&$password==$password){
      if($isadmin==0 && $isblock==1){
     echo "login successfully";
     header('location:index2.html');
   }
}



}
}

?>