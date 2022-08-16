<?php
	$con=mysqli_connect("localhost","root","","airport_authority_of_india");
	if($con==false){
		die("Connection Failed");
	}
	else{
		$pass_id=$_POST['t1'];
		$c='SELECT * FROM Passport_Details where Passport_Id ='.$pass_id;
		$result=mysqli_query($con,$c);	
		if($result){
			$q='INSERT INTO vizag_airport(Entry,Trolly,Lagauge_Wrapping,Wheelchairs) VALUES ('.date('Y-m-d H:i:s').',1,0,0)';
		
		#we will be able to viswalize the usage of services in a particular airport
		
		}
		else{
			echo "Invalid Passport Number";
		}
	}
?>