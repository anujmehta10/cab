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

        $this->conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

        if ($this
            ->conn
            ->connect_error)
        {
            die("Connection failed: " . $this
                ->conn
                ->connect_error);
        }
        else
        {
            //echo "Connected successfully";
            
        }

    }
    public function insert($user_name, $name, $password, $repassword, $mobile)
    {
        $sql = "INSERT INTO tbl_user(`user_name`, `name`,`date_of_signup`,`password`,`is_block`,`mobile`,`is_admin`)
            VALUES('" . $user_name . "', '" . $name . "',NOW(),'" . $password . "','1','" .$mobile . "','0')";

        if ($this
            ->conn
            ->query($sql) === true)
        {
            echo "signup created successfully";
            header('location:login.php');

        }
        else
        {
            $errors[] = array(
                'input' => 'form',
                'msg' => $this
                    ->conn
                    ->error
            );
            //echo "Error: " . $sql . "<br>" . $conn->error;
            
        }

        $this
            ->conn
            ->close();
        
    }

    public function login($user_name,$password)
    {

             $sql = "SELECT * FROM tbl_user WHERE
            `user_name`='".$user_name."' AND `password`='".$password."'";
            $result = $this->conn->query($sql);
         
           
           if ($result->num_rows > 0) 
        {
        // output data of each row
           while ($row = $result->fetch_assoc()) 
        {

            $_SESSION['userdata'] = array('user_name'=>$row['user_name'],'user_id'=>$row['user_id']);
            
        header('location:dashboard.php');

        }
         
        } 
         else 
        {
        $errors[] = array('input'=>'form','msg'=>'invalid details');
         
        }
                $this->conn->close();
           //}
                  /*   if($user_name==$user_name &&$password==$password){
                     if($isadmin==0 && $isblock==1){
                     echo "login successfully";
                     header('location:index2.html');
        			if($result=$mysqli->query($query)){
        			
           }
        }*/

    }

        public function pass($pick, $drop, $distance, $luggage, $fare)
    {
            //echo($luggage);     
	        $insert = "INSERT INTO tbl_ride(`ride_date`, `from`,`to`,`total_distance`,`luggage`,`total_fare`,`status`,`customer_user_id`)
	            VALUES(NOW(),'$pick','$drop','$distance','$luggage','$fare','1',42)";
	            $mysqli->query($insert);
	    
	    if ($this ->conn ->query($insert) === true)

	        {
	           echo "$fare";
	           //header('location:login.php');

	        }
        $this ->conn->close();
   }

}

?>
