<?php session_start();
include('config.php');
$obj=new DB_con();


  if(isset($_GET['showall']))
    {

       $user_id=$_SESSION['userdata']['user_id'];
        //echo ($user_id);
        $result=$obj->allr($user_id);
       if($result!=false){
       	$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }

    }
    if(isset($_GET['pending']))
    {
    	$user_id=$_SESSION['userdata']['user_id'];
    	$result=$obj->pending($user_id);
    	if($result!=false){
    		$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }

    }

    if(isset($_GET['completed']))
    {
    	$user_id=$_SESSION['userdata']['user_id'];
    	$result=$obj->comp($user_id);
    	if($result!=false){
    		$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }
    	
    }
    if(isset($_GET['pend']))
    {
    	$result=$obj->pend();
    	if($result!=false){
    		$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }
    	
    }

    if(isset($_GET['compl']))
    {
    	$result=$obj->compl();
    	if($result!=false){
    		$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }
    	
    }
    if(isset($_GET['cancel']))
    {
    	$result=$obj->cancel();
    	if($result!=false){
    		$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }
    	
    }

    if(isset($_GET['allrides']))
    {
    	$result=$obj->allrides();
    	if($result!=false){
    		$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }
    	
    }

    if(isset($_GET['userreq']))
    {
    	$result=$obj->userreq();
    	if($result!=false){
    		$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }
    	
    }
    if(isset($_GET['approve']))
    {
    	$result=$obj->approve();
    	if($result!=false){
    		$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }
    	
    }

    if(isset($_GET['alluser']))
    {
    	$result=$obj->alluser();
    	if($result!=false){
    		$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }
    	
    }

    if(isset($_GET['loc']))
    {
    	$result=$obj->loc();
    	if($result!=false){
    		$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }
    	
    }

    if(isset($_GET['addloct']))
    {
    	$loca=$_GET['loca'];
		$dist=$_GET['dist'];

    	$result=$obj->addloct($loca,$dist);
    	if($result!=false){
    		echo true;
    		}
        else{
        	echo "false";
        }
    	
    }

    if(isset($_GET['micro']))
    {

       $user_id=$_SESSION['userdata']['user_id'];
        //echo ($user_id);
        $result=$obj->micro($user_id);
       if($result!=false){
       	$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }

    }
    if(isset($_GET['usermicro']))
    {

       $user_id=$_SESSION['userdata']['user_id'];
        //echo ($user_id);
        $result=$obj->usermicro($user_id);
       if($result!=false){
       	$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }

    }

    if(isset($_GET['mini']))
    {

       $user_id=$_SESSION['userdata']['user_id'];
        //echo ($user_id);
        $result=$obj->mini($user_id);
       if($result!=false){
       	$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }

    }
    if(isset($_GET['usermini']))
    {

       $user_id=$_SESSION['userdata']['user_id'];
        //echo ($user_id);
        $result=$obj->usermini($user_id);
       if($result!=false){
       	$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }

    }
    if(isset($_GET['royal']))
    {

       $user_id=$_SESSION['userdata']['user_id'];
        //echo ($user_id);
        $result=$obj->royal($user_id);
       if($result!=false){
       	$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }

    }
    if(isset($_GET['userroyal']))
    {

       $user_id=$_SESSION['userdata']['user_id'];
        //echo ($user_id);
        $result=$obj->userroyal($user_id);
       if($result!=false){
       	$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }

    }
    if(isset($_GET['suv']))
    {

       $user_id=$_SESSION['userdata']['user_id'];
        //echo ($user_id);
        $result=$obj->suv($user_id);
       if($result!=false){
       	$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }

    }
    if(isset($_GET['usersuv']))
    {

       $user_id=$_SESSION['userdata']['user_id'];
        //echo ($user_id);
        $result=$obj->usersuv($user_id);
       if($result!=false){
       	$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }

    }
    if(isset($_GET['mic']))
    {
    	$result=$obj->mic();
    	if($result!=false){
    		$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }
    	
    }
    if(isset($_GET['min']))
    {
    	$result=$obj->min();
    	if($result!=false){
    		$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }
    	
    }
    if(isset($_GET['roy']))
    {
    	$result=$obj->roy();
    	if($result!=false){
    		$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }
    	
    }
    if(isset($_GET['su']))
    {
    	$result=$obj->su();
    	if($result!=false){
    		$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }
    	
    }
    if(isset($_GET['amicro']))
    {
    	$result=$obj->amicro();
    	if($result!=false){
    		$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }
    	
    }
    if(isset($_GET['amini']))
    {
    	$result=$obj->amini();
    	if($result!=false){
    		$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }
    	
    }
    if(isset($_GET['aroyal']))
    {
    	$result=$obj->aroyal();
    	if($result!=false){
    		$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }
    	
    }
    if(isset($_GET['asuv']))
    {
    	$result=$obj->asuv();
    	if($result!=false){
    		$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }
    	
    }
    if(isset($_GET['umicro']))
    {

       $user_id=$_SESSION['userdata']['user_id'];
        //echo ($user_id);
        $result=$obj->umicro($user_id);
       if($result!=false){
       	$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }

    }
    if(isset($_GET['umini']))
    {

       $user_id=$_SESSION['userdata']['user_id'];
        //echo ($user_id);
        $result=$obj->umini($user_id);
       if($result!=false){
       	$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }

    }
    if(isset($_GET['uroyal']))
    {

       $user_id=$_SESSION['userdata']['user_id'];
        //echo ($user_id);
        $result=$obj->uroyal($user_id);
       if($result!=false){
       	$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }

    }
    if(isset($_GET['usuv']))
    {

       $user_id=$_SESSION['userdata']['user_id'];
        //echo ($user_id);
        $result=$obj->usuv($user_id);
       if($result!=false){
       	$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }

    }
    if(isset($_GET['allridesortbydate']))
    {
    	$user_id=$_SESSION['userdata']['user_id'];
        $sort=$_GET['sort'];
        //echo ($user_id);
        $result=$obj->allridesortbydate($user_id,$sort);
       if($result!=false){
       	$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }

    }
    if(isset($_GET['allbyfare']))
    {
    	$user_id=$_SESSION['userdata']['user_id'];
        $sort=$_GET['sort'];
        //echo ($user_id);
        $result=$obj->allbyfare($user_id,$sort);
       if($result!=false){
       	$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }

    }
    if(isset($_GET['completeuserbydate']))
    {
    	$user_id=$_SESSION['userdata']['user_id'];
        $sort=$_GET['sort'];
        //echo ($user_id);
        $result=$obj->completeuserbydate($user_id,$sort);
       if($result!=false){
       	$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }

    }
    if(isset($_GET['userbyfare']))
    {
    	$user_id=$_SESSION['userdata']['user_id'];
        $sort=$_GET['sort'];
        //echo ($user_id);
        $result=$obj->userbyfare($user_id,$sort);
       if($result!=false){
       	$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }

    }
    if(isset($_GET['adminbydate']))
    {
        $sort=$_GET['sort'];
        //echo ($user_id);
        $result=$obj->adminbydate($sort);
       if($result!=false){
       	$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }

    }
    if(isset($_GET['adminbyfare']))
    {
        $sort=$_GET['sort'];
        //echo ($user_id);
        $result=$obj->adminbyfare($sort);
       if($result!=false){
       	$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }

    }
    if(isset($_GET['allradminbydate']))
    {
        $sort=$_GET['sort'];
        //echo ($user_id);
        $result=$obj->allradminbydate($sort);
       if($result!=false){
       	$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }

    }
    if(isset($_GET['alladminbyfare']))
    {
        $sort=$_GET['sort'];
        //echo ($user_id);
        $result=$obj->alladminbyfare($sort);
       if($result!=false){
       	$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }

    }
    if(isset($_GET['alladminuserbydate']))
    {
        $sort=$_GET['sort'];
        //echo ($user_id);
        $result=$obj->alladminuserbydate($sort);
       if($result!=false){
       	$row=array();
       	while($arr=$result->fetch_assoc()){
       		$row[]=$arr;
       	}
       	print(json_encode($row));
       }
        else{
        	echo "false";
        }

    }
    if(isset($_GET['button']))
    {
    	$user_id=$_SESSION['userdata']['user_id'];
    	$name=$_GET['name'];
    	$mobile=$_GET['mobile'];
    	$oldpassword=$_GET['oldpassword'];
    	$newpassword=$_GET['newpassword'];
    	$result=$obj->update($user_id,$name,$mobile,$oldpassword,$newpassword);
       	echo json_encode($result);
        
    }

    if(isset($_GET['removeupdate']))
    {
    	$user_id=$_SESSION['userdata']['user_id'];
    	$id=$_GET['id'];
    	$result=$obj->up($id,$user_id);
    	echo $result;
        // else{
        // 	echo "false";
        // }
    }
    if(isset($_GET['reject']))
    {
    	$id=$_GET['id'];
    	$result=$obj->reject($id);
    	echo $result;
        // else{
        // 	echo "false";
        // }
    }
    if(isset($_GET['approv']))
    {
    	$id=$_GET['id'];
    	$result=$obj->approv($id);
    	echo $result;
        // else{
        // 	echo "false";
        // }
    }
    if(isset($_GET['reqapprov']))
    {
    	
    	$id=$_GET['id'];
    	$result=$obj->reqapprov($id);
    	echo $result;
        // else{
        // 	echo "false";
        // }
    }
    if(isset($_GET['reqreject']))
    {
    	
    	$id=$_GET['id'];
    	$result=$obj->reqreject($id);
    	echo $result;
        // else{
        // 	echo "false";
        // }
    }
    if(isset($_GET['allreqreject']))
    {
    	
    	$id=$_GET['id'];
    	$result=$obj->allreqreject($id);
    	echo $result;
        // else{
        // 	echo "false";
        // }
    }
    if(isset($_GET['allreqapprov']))
    {
    	
    	$id=$_GET['id'];
    	$result=$obj->allreqapprov($id);
    	echo $result;
        // else{
        // 	echo "false";
        // }
    }
    if(isset($_GET['invoice']))
    {
    	
    	$id=$_GET['id'];
    	$result=$obj->invoice($id);
    	if($result!=false){
	       	$row=array();
	       	while($arr=$result->fetch_assoc()){
	       		$row[]=$arr;
	       	}
	       	print(json_encode($row));
       }
        else{
        	echo "false";
        }
    }





?>