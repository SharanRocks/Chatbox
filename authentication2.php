<?php
include("connection.php");
session_start();
if(isset($_POST['Email'],$_POST["Name"],$_POST["RUsername"],$_POST["RPassword"]))
{
$rf=$_POST["Email"];
$rn=mysqli_real_escape_string($connection,$_POST['Name']);
$ru=mysqli_real_escape_string($connection,$_POST['RUsername']);
$rp=$_POST["RPassword"];
}
$q= "INSERT INTO user (Email,Name,Username,Password) values ('$rf','$rn','$ru','$rp')";
$res=mysqli_query($connection,$q);
if($res)
{
	echo 'true';
	$_SESSION['name']=$rn;
	$_SESSION['uname']=$ru;
	header('location:chat.php');
}
else {
  header('location:index.php');
	echo 'false';
}
?>
