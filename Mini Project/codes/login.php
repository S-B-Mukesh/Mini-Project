<?php
session_start();
$l1 = isset($_POST['login1']) ? $_POST['login1'] : "";
$l2 = isset($_POST['login2']) ? $_POST['login2'] : "";
if($l1){
  if($_POST['username1'] =='' and $_POST['password1'] ==''){
    echo "<script>alert('Invalid Credentials')</script>";
  }
  elseif($_POST['username1'] !='' and $_POST['password1'] !=''){
    $con=mysqli_connect("localhost","root","","airport_authority_of_india");
    if($con==false){
      echo "<script>alert('Connection Failed')</script>";
    }
    else{
      $u=$_POST['username1'];
      $p=$_POST['password1'];
      $q="SELECT airport FROM login where username='$u'  AND password='$p'";
      $res=mysqli_query($con,$q);
      $temp1=mysqli_fetch_array($res);
      $r=$temp1[0] ?? NULL;
      if($r){
        $_SESSION['temp']=$r;
				echo "<script>window.location.assign('Display1.php')</script>";
      }
      else{
        echo "<script>alert('Invalid Credentials')</script>";
      }
    }
  }
}
elseif ($l2) {
  if($_POST['username2'] =='' and $_POST['password2'] ==''){
    echo "<script>alert('Invalid Credentials')</script>";
  }
  elseif($_POST['username2'] !='' and $_POST['password2'] !=''){
    $con=mysqli_connect("localhost","root","","airport_authority_of_india");
    if($con==false){
      echo "<script>alert('Connection Failed')</script>";
    }
    else{
      $u=$_POST['username2'];
      $p=$_POST['password2'];
      $q="SELECT * FROM login where username='$u'  AND password='$p'";
      $res=mysqli_query($con,$q);
      $temp1=mysqli_fetch_array($res);
      $r=$temp1[0] ?? NULL;
      if($r){
        header("Location: Display2.php");
      }
      else{
        echo "<script>alert('Invalid Credentials')</script>";
      }
    }
  }
}
?>



<html>
<head>

<link rel="stylesheet" type="text/css" href="style1.css">
<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<title>LOG IN</title>
<style >
    input {
    border-radius: 0.75rem;
    }
    table, td, th{
    padding: 10px;
    }
    .header{
      padding: 35px 35px 35px 35px;
      border-style: solid;
      border-radius: 40px;
      border-color: green;
      margin: 35px;
      background-clip: padding-box;
      bgcolor : skyblue;
    }
    .container_register{
      background-color: lightgreen;
      border-radius: 40px;
      width: 40%;
      height: 40%;
    }
</style>
</head>
<body>
  <center>
    <div class="header" style = "background-color : skyblue">
    <table align = "center" width="100%">
    <tr>
       <th><img src = "airport  logo.jpg" alt = "Logo" width = "300" height = "150"></th>
       <th><center><h1><font size="14">INDIAN AIRPORT AUTHORISATION</h1></font></center></th>
    <tr>
    </table>
  </div>
  <div class="container_register" style="font-family: 'IBM Plex Sans', sans-serif;">
          <div class="row">
            <div class="col-md-9 register-right" style="margin-top: 40px;left: 80px;">
              <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist" style="width: 40%;">
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="profile" aria-selected="false">Admin</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#superadmin" role="tab" aria-controls="admin" aria-selected="false">Super Admin</a>
                </li>
              </ul>
          <div class="tab-content" id="myTabContent">
              <div class="tab-pane show active" id="admin" role="tabpanel" aria-labelledby="profile-tab" >
                <table>
                  <tr>
                    <th colspan="2" align="center"><h3>Login as Admin</h3></th>
                  </tr>
                  <tr>
                    <form method="post" action="valid.php">
                    <td>Username:</td>
                    <td><input type="text" placeholder="User Name *" name="username1" required autofocus/></td>
                    </tr>
                    <tr>
                    <td>Password:</td>
                    <td><input type="password" placeholder="Password *" name="password1" required/></td>
                    </tr>
                    <tr>
                    <td colspan="2" align="Center"><input type="submit" name="login1" value="Login"/></td>
                    </form>
                  </tr>
                </table>
              </div>
              <div class="tab-pane fade show" id="superadmin" role="tabpanel" aria-labelledby="profile-tab">
                <table>
                  <tr>
                    <th colspan="2" align="center"><h3>Login as Super Admin</h3></th>
                  </tr>
                  <tr>
                  <form method="post" action="valid.php">
                  <td>Username:</td>
                  <td><input type="text" placeholder="User Name *" name="username2" required autofocus/></td>
                  </tr>
                  <tr>
                  <td>Password:</td>
                  <td><input type="password" placeholder="Password *" name="password2" required/></td>
                  </tr>
                  <tr>
                  <td colspan="2" align="Center"><input type="submit" name="login2" value="Login"/></td>
                  </form>
                </tr>
              </table>
              </div>
          </div>
        </div>
      </div>
    </div>
    </center>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

</html>
