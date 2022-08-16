<?php
	$con=mysqli_connect("localhost","root","","airport_authority_of_india");
	if($con==false){
		echo "<script>alert('Connection Failed')</script>";
	}
	else{
     if(isset($_POST['submit'])){
		    $pass_id=$_POST['t1'];
		    $c='SELECT * FROM passport_details where passport_id ="'.$pass_id.'"';
		    $result=mysqli_query($con,$c);
		    $temp=mysqli_fetch_array($result);
		    $r=$temp[0] ?? NULL;
		    if($r){
			       $q="INSERT INTO vizag(passport_id,Name,Trolly,Laggage_Wrapping,Wheelchairs) VALUES ('$temp[0]','$temp[1]',1,0,0)";
			       $result=mysqli_query($con,$q);
						 echo "<script>alert('You can utilize the service')</script>";
		    }
		    else{
			       echo "<script>alert('Invalid Passport Number')</script>";
		    }
    }
	}
?>


<!DOCTYPE html>
<html>
<head>
    <style media="screen">
      .header{
        padding: 35px 35px 35px 35px;
        border-style: solid;
        border-radius: 40px;
        border-color: green;
        margin: 35px;
        background-clip: padding-box;
        background-color : skyblue;
    }
    </style>
    <title>Resource Utilisation Using Iot Analytics</title>
</head>
<body>
	<div align="right"><button style = "background-color : lightgreen; font-size : 27px; border-radius: 10px;" height=16px ><a href="login.php"><i>Login</i></a></button></div>
 	<div class = "header" style = "background-color : skyblue">
	   <br>
	   <br>
	     <table align = "center" width="100%">
	        <tr>
	           <th><img src = "airport  logo.jpg" alt = "Logo" width = "300" height = "180"></th>
	           <th><center><h1><font size="14">INDIAN AIRPORT AUTHORISATION</h1></font></center></th>
	        </tr>
	     </table>
  </div>
	<div align="center" class = "welcome">
    <form action="Project.php" method="POST">
        <input type="text"  style = "font-size : 26pt;"height=15px name="t1" autofocus>
        <button name = "submit" style = "font-size : 27px; color : green" height=16px>Submit</button>
    </form>
  </div>
</body>
</html>
