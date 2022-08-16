<?php
session_start();
$l1 = isset($_POST['login1']) ? $_POST['login1'] : "";
$l2 = isset($_POST['login2']) ? $_POST['login2'] : "";
if($l1){
  if($_POST['username1'] =='' and $_POST['password1'] ==''){
    echo "<script>alert('Invalid Credentials')</script>";
    echo "<script>window.location.assign('login.php')</script>";
  }
  elseif($_POST['username1'] !='' and $_POST['password1'] !=''){
    $con=mysqli_connect("localhost","root","","airport_authority_of_india");
    if($con==false){
      echo "<script>alert('Connection Failed')</script>";
      echo "<script>window.location.assign('login.php')</script>";
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
        #echo $l1,$l2,$_POST['username1'],$_POST['password1'],$_POST['username2'],$_POST['password2'];
				echo "<script>window.location.assign('Display1.php')</script>";
      }
      else{
        echo "<script>alert('Invalid Credentials')</script>";
        echo "<script>window.location.assign('login.php')</script>";
      }
    }
  }
}
elseif ($l2) {
  if($_POST['username2'] =='' and $_POST['password2'] ==''){
    echo "<script>alert('Invalid Credentials')</script>";
    echo "<script>window.location.assign('login.php')</script>";
  }
  elseif($_POST['username2'] !='' and $_POST['password2'] !=''){
    $con=mysqli_connect("localhost","root","","airport_authority_of_india");
    if($con==false){
      echo "<script>alert('Connection Failed')</script>";
      echo "<script>window.location.assign('login.php')</script>";
    }
    else{
      $u=$_POST['username2'];
      $p=$_POST['password2'];
      $q="SELECT airport FROM login where username='$u'  AND password='$p'";
      $res=mysqli_query($con,$q);
      $temp1=mysqli_fetch_array($res);
      $r=$temp1[0] ?? NULL;
      if($r){
        echo "<script>window.location.assign('Display2.php')</script>";
      }
      else{
        echo "<script>alert('Invalid Credentials')</script>";
        echo "<script>window.location.assign('login.php')</script>";
      }
    }
  }
}
?>
