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

            

        if ($this ->conn ->query($sql) === true)
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

            if($row['is_admin']==1)
            {            
                $_SESSION['admindata'] = array('user_name'=>$row['user_name'],'user_id'=>$row['user_id']);
            // echo ($row['user_name']);
                header('location:admin_dashboard.php');
            }
            else {
                $_SESSION['userdata'] = array('user_name'=>$row['user_name'],'user_id'=>$row['user_id']);
            // echo ($row['user_name']
                header('location:dashboard.php');
            }

        }
         
        } 
         else 
        {
        $errors[] = array('input'=>'form','msg'=>'invalid details');
         
        }
                $this->conn->close();

    }



    public function allr($user_id)
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='".$user_id."'";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }

    public function pending($user_id)
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='".$user_id."' AND `status`='1'";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }

    public function comp($user_id)
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='".$user_id."' AND `status`='0'";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }

    public function pend()
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `status`='1'";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }

    public function compl()
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `status`='0'";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }

    public function cancel()
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `status`='2'";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }

    public function allrides()
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride`";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }

    public function userreq()
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_user` WHERE `is_block`='1'";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }

    public function approve()
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_user` WHERE `is_block`='0'";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }

    public function alluser()
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_user`";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }

    public function loc()
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_location`";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }
    
    public function addloct($loca,$dist)
    {
        //echo $user_id;
        $sql="INSERT INTO tbl_location(`name`, `distance`,`is_available`)
            VALUES('$loca', '$dist','1')";
        $result = $this->conn->query($sql);
        return true;
    }

    public function micro($user_id)
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='".$user_id."' AND `ctype`='CedMicro' AND `status`='1'";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }
    public function usermicro($user_id)
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='".$user_id."' AND `ctype`='CedMicro'";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }

    public function mini($user_id)
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='".$user_id."' AND `ctype`='CedMini' AND `status`='1'";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }
    public function usermini($user_id)
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='".$user_id."' AND `ctype`='CedMini'";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }

    public function royal($user_id)
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='".$user_id."' AND `ctype`='CedRoyal' AND `status`='1'";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }
    public function userroyal($user_id)
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='".$user_id."' AND `ctype`='CedRoyal'";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }
    public function suv($user_id)
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='".$user_id."' AND `ctype`='CedSUV' AND `status`='1'";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }
    public function usersuv($user_id)
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='".$user_id."' AND `ctype`='CedSUV'";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }

    public function mic()
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `ctype`='CedMicro' AND `status`='1'";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }
    public function min()
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `ctype`='CedMini' AND `status`='1'";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }
    public function roy()
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `ctype`='CedRoyal' AND `status`='1'";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }
    public function su()
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `ctype`='CedSUV' AND `status`='1'";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }
    public function amicro()
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `ctype`='CedMicro' ";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }
    public function amini()
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `ctype`='CedMini' ";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }
    public function aroyal()
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `ctype`='CedRoyal' ";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }
    public function asuv()
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `ctype`='CedSUV' ";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }
    public function umicro($user_id)
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='".$user_id."' AND `ctype`='CedMicro'";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }
    public function umini($user_id)
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='".$user_id."' AND `ctype`='CedMini'";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }
    public function uroyal($user_id)
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='".$user_id."' AND `ctype`='CedRoyal'";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }
    public function usuv($user_id)
    {
        //echo $user_id;
        $sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='".$user_id."' AND `ctype`='CedSUV'";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }
    public function allridesortbydate($user_id,$sort)
    {
        //echo $user_id;
        if($sort=='asc')
        {
        $sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='".$user_id."' ORDER BY `ride_date` ASC";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
    }
        else if($sort=='desc')
        {
        $sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='".$user_id."' ORDER BY `ride_date` DESC";   
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
       
        }
    }

    }

    public function allbyfare($user_id,$sort)
    {
        //echo $user_id;
        if($sort=='asc')
        {
        $sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='".$user_id."' ORDER BY `total_fare` ASC";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
    }
        else if($sort=='desc')
        {
        $sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='".$user_id."' ORDER BY `total_fare` DESC";   
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
       
        }
    }

    }
    public function completeuserbydate($user_id,$sort)
    {
        //echo $user_id;
        if($sort=='asc')
        {
        $sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$user_id' AND `status`='0' ORDER BY `ride_date` ASC";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
    }
        else if($sort=='desc')
        {
        $sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$user_id' AND `status`='0' ORDER BY `ride_date` DESC";   
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
       
        }
    }

    }
    public function userbyfare($user_id,$sort)
    {
        //echo $user_id;
        if($sort=='asc')
        {
        $sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$user_id' AND `status`='0' ORDER BY `total_fare` ASC";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
    }
        else if($sort=='desc')
        {
        $sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$user_id' AND `status`='0' ORDER BY `total_fare` DESC";   
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
       
        }
    }

    }
     public function adminbydate($sort)
    {
        //echo $user_id;
        if($sort=='asc')
        {
        $sql="SELECT * FROM `tbl_ride` WHERE `status`='0' ORDER BY `ride_date` ASC";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
    }
        else if($sort=='desc')
        {
        $sql="SELECT * FROM `tbl_ride` WHERE `status`='0' ORDER BY `ride_date` DESC";   
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
       
        }
    }

    }
    public function adminbyfare($sort)
    {
        //echo $user_id;
        if($sort=='asc')
        {
        $sql="SELECT * FROM `tbl_ride` WHERE `status`='0' ORDER BY `total_fare` ASC";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
    }
        else if($sort=='desc')
        {
        $sql="SELECT * FROM `tbl_ride` WHERE `status`='0' ORDER BY `total_fare` DESC";   
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
       
        }
    }

    }
    public function allradminbydate($sort)
    {
        //echo $user_id;
        if($sort=='asc')
        {
        $sql="SELECT * FROM `tbl_ride`  ORDER BY `ride_date` ASC";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
    }
        else if($sort=='desc')
        {
        $sql="SELECT * FROM `tbl_ride` ORDER BY `ride_date` DESC";   
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
       
        }
    }

    }
    public function alladminbyfare($sort)
    {
        //echo $user_id;
        if($sort=='asc')
        {
        $sql="SELECT * FROM `tbl_ride` ORDER BY `total_fare` ASC";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
    }
        else if($sort=='desc')
        {
        $sql="SELECT * FROM `tbl_ride` ORDER BY `total_fare` DESC";   
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
       
        }
    }

    }
    public function alladminuserbydate($sort)
    {
        //echo $user_id;
        if($sort=='asc')
        {
        $sql="SELECT * FROM `tbl_user` ORDER BY `date_of_signup` ASC";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
    }
        else if($sort=='desc')
        {
        $sql="SELECT * FROM `tbl_user` ORDER BY `date_of_signup` DESC";   
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
       
        }
    }

    }

    public function pendingreq($user_id)
    {
       
        $sql="SELECT * FROM `tbl_ride` WHERE `user_id`='$user_id' AND `status`='1'";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function completedreq($user_id)
    {
        $sql="SELECT * FROM `tbl_ride` WHERE `user_id`='$user_id' AND `status`='0'";
        $result = $this->conn->query($sql);
        
           return $result;
        
       
    }
    public function allride($user_id)
    {
        $sql="SELECT * FROM `tbl_ride` WHERE `user_id`='$user_id' ";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        else{
            return false;
        }
    }
    public function totalfare($user_id)
    {
        $sql="SELECT * FROM `tbl_ride` WHERE `user_id`='$user_id' AND `status`='0' ";
        $result = $this->conn->query($sql);
        $total=0;
        if($result->num_rows>0)
        {
           while($row=$result->fetch_assoc()){
            $total+=(int)$row['total_fare'];
           } 
           return $total;
        }
        else{
            return false;
        }
    }
    public function up($id,$user_id)
    {
        $sql="UPDATE `tbl_ride` SET `status`='2'  WHERE `ride_id`='$id' AND `customer_user_id`='$user_id'";
        $result = $this->conn->query($sql);
        // if ($result->affected_rows > 0){
        if ($result) {
           return true;
        
        }
        return false;
        // if (mysqli_query($conn, $sql) ) {
        //     return true;
        // }
    }
    public function reject($id)
    {
        $sql="UPDATE `tbl_ride` SET `status`='2'  WHERE `ride_id`='$id' AND `status`='1'";
        $result = $this->conn->query($sql);
        // if ($result->affected_rows > 0){
        if ($result) {
           return true;
        
        }
        return false;
        // if (mysqli_query($conn, $sql) ) {
        //     return true;
        // }
    }
     public function approv($id)
    {
        $sql="UPDATE `tbl_ride` SET `status`='0'  WHERE `ride_id`='$id' AND `status`='1'";
        $result = $this->conn->query($sql);
        // if ($result->affected_rows > 0){
        if ($result) {
           return true;
        
        }
        return false;
        // if (mysqli_query($conn, $sql) ) {
        //     return true;
        // }
    }
     public function reqapprov($id)
    {
        $sql="UPDATE `tbl_user` SET `is_block`='0'  WHERE `user_id`='$id' AND `is_block`='1'";
        $result = $this->conn->query($sql);
        // if ($result->affected_rows > 0){
        if ($result) {
           return true;
        
        }
        return false;
        // if (mysqli_query($conn, $sql) ) {
        //     return true;
        // }
    }
    public function reqreject($id)
    {
        $sql="UPDATE `tbl_user` SET `is_block`='1'  WHERE `user_id`='$id' AND `is_block`='0'";
        $result = $this->conn->query($sql);
        // if ($result->affected_rows > 0){
        if ($result) {
           return true;
        
        }
        return false;
        // if (mysqli_query($conn, $sql) ) {
        //     return true;
        // }
    }
    public function allreqreject($id)
    {
        $sql="UPDATE `tbl_user` SET `is_block`='1'  WHERE `user_id`='$id' AND `is_block`='0'";
        $result = $this->conn->query($sql);
        // if ($result->affected_rows > 0){
        if ($result) {
           return true;
        
        }
        return false;
        // if (mysqli_query($conn, $sql) ) {
        //     return true;
        // }
    }
    public function allreqapprov($id)
    {
        $sql="UPDATE `tbl_user` SET `is_block`='0'  WHERE `user_id`='$id' AND `is_block`='1'";
        $result = $this->conn->query($sql);
        // if ($result->affected_rows > 0){
        if ($result) {
           return true;
        
        }
        return false;
        // if (mysqli_query($conn, $sql) ) {
        //     return true;
        // }
    }
    public function invoice($id)
    {
        $sql="SELECT * FROM `tbl_ride` WHERE `ride_id`='$id'"; 
        $result = $this->conn->query($sql);
        if ($result->num_rows>0){
           return $result;
        }
        return false;
    }
    




    












        public function pass($pick, $drop, $distance, $luggage, $fare,$ctype,$user_id)
    {
            
            { 
            //echo($luggage);     
            $insert = "INSERT INTO tbl_ride(`ride_date`, `from`,`to`,`distance`,`luggage`,`total_fare`,`status`,`ctype`,`customer_user_id`)
                VALUES(NOW(),'$pick','$drop','$distance','$luggage','$fare','1','$ctype',$user_id)";
                //$mysqli->query($insert);
        
                if($this ->conn ->query($insert) === true)
                    {

                        //alert("data added successfully");
                        //header("Location:login.php");
                        
                    }
            }

   }


   public function fetch_data()
    {
        $query="SELECT * FROM tbl_ride ORDER BY user_id DESC";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            $row=mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $row;
        }else {
            return $row=[];
        }
        

            $fetchData=fetch_data();
            show_data($fetchData);


    }

    public function update($user_id,$name, $mobile, $oldpassword, $newpassword)
    {
        $success = "";
        $error= "";
        $sql = "SELECT * FROM `tbl_user` WHERE `user_id`='$user_id' AND `password`='$oldpassword'";
        $result = $this->conn->query($sql);
        if ($result->num_rows>0)
        {
            while($row = $result->fetch_assoc()) {
                  $update="UPDATE `tbl_user` SET `name`='$name',`mobile`='$mobile',`password`='$newpassword' WHERE `user_id`='$user_id'";
                    if ($this->conn->query($update) === true)
                    {
                       $success = "update";
                    }
                     else
                {
                  $error = "error";
               
                 }
    
            }
            $arr  = array('success' => $success ,"error"=> $error);
            return $arr;
        }
        else {
            echo "0 results";
        }

    }
}
?>
