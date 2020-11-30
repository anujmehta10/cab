<?php
$arr=array(
		'Charbagh'=>0,
		'IndraNagar'=>10,
		'BBD'=>30,
		'Barabanki'=>60,
		'Faizabad'=>100,
		'Basti'=>150,
		'Gorakhpur'=>210
	);
			
	
	if(isset($_GET['click'])){
		
			$pick=$_GET['pick'];
			$drop=$_GET['drop'];
			$ctype=$_GET['ctype'];
			$luggage=$_GET['luggage'];
			$distance=abs($arr[$pick]-$arr[$drop]);
				
	

				if($ctype=='CedMicro'){
					$fixedfare=50;
					$fare=0;
					if($distance>0 && $distance<=10)
					{
						$fare=$fixedfare+$distance*13.50;
					}
					elseif($distance>10 && $distance<=60)
					{
						$fare=$fixedfare+(10*13.50)+($distance-10)*12.00;
					}
					elseif($distance>60 && $distance<=160)
					{
						$fare=$fixedfare+(10*13.50)+(50*12.00)+($distance-50)*10.20;
					}
					elseif($distance>160)
					{
						$fare=$fixedfare+(10*13.50)+(50*12.00)+(100*10.20)+($distance-160)*8.50;
					}
					
					echo $fare;

				}

				elseif($ctype=='CedMini'){
					$fixedfare=150;
					$fare=0;
					if($distance>0 && $distance<=10)
					{
						$fare=$fixedfare+$distance*14.50;
					}
					elseif($distance>10 && $distance<=60)
					{
						$fare=$fixedfare+(10*14.50)+($distance-10)*13.00;
					}
					elseif($distance>60 && $distance<=160)
					{
						$fare=$fixedfare+(10*14.50)+(50*13.00)+($distance-50)*11.20;
					}
					elseif($distance>160)
					{
						$fare=$fixedfare+(10*14.50)+(50*13.00)+(100*11.20)+($distance-160)*9.50;
					}
					if($luggage>0 && $luggage<=10)
					{
						$fare=$fare+50;
					}
					elseif($luggage>10 && $luggage<=20)
					{
						$fare=$fare+100;
					}
					elseif($luggage>20)
					{
						$fare=$fare+200;
					}
					echo $fare;

					
				}


				elseif($ctype=='CedRoyal'){
					$fixedfare=200;
					$fare=0;
					if($distance>0 && $distance<=10)
					{
						$fare=$fixedfare+$distance*15.50;
					}
					elseif($distance>10 && $distance<=60)
					{
						$fare=$fixedfare+(10*15.50)+($distance-10)*14.00;
					}
					elseif($distance>60 && $distance<=160)
					{
						$fare=$fixedfare+(10*15.50)+(50*14.00)+($distance-50)*12.20;
					}
					elseif($distance>160)
					{
						$fare=$fixedfare+(10*15.50)+(50*14.00)+(100*12.20)+($distance-160)*10.50;
					}
					if($luggage>0 && $luggage<=10)
					{
						$fare=$fare+50;
					}
					elseif($luggage>10&&$luggage<=20)
					{
						$fare=$fare+100;
					}
					elseif($luggage>20)
					{
						$fare=$fare+200;
					}
					echo $fare;
				}


				elseif($ctype=='CedSUV')
				{
					$fixedfare=250;
					$fare=0;
					if($distance>0 && $distance<=10)
					{
						$fare=$fixedfare+$distance*16.50;
					}
					elseif($distance>10 && $distance<=60)
					{
						$fare=$fixedfare+(10*16.50)+($distance-10)*15.00;
					}
					elseif($distance>60 && $distance<=160)
					{
						$fare=$fixedfare+(10*16.50)+(50*15.00)+($distance-50)*13.20;
					}
					elseif($distance>160)
					{
						$fare=$fixedfare+(10*16.50)+(50*15.00)+(100*13.20)+($distance-160)*11.50;
					}
					if($luggage>0 && $luggage<=10)
					{
						$fare=$fare+100;
					}
					elseif($luggage>10&&$luggage<=20)
					{
						$fare=$fare+200;
					}
					elseif($luggage>20)
					{
						$fare=$fare+400;
					}
					echo $fare;
				}

	}

?>
	
			
				
	
	