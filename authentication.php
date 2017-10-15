<?php
include("connection.php");
session_start();

$uName = $_POST['Username'];
$pWord = $_POST['Password'];

$qry = "SELECT * FROM user WHERE Username='$uName' and Password='$pWord'";
$res = mysqli_query($connection,$qry);
$num_row = mysqli_num_rows($res);
$row=mysqli_fetch_assoc($res);

if( $num_row >0 ) {
	echo 'true';
	$_SESSION['name']=$row['Name'];
	$_SESSION['uname']=$row['Username'];
	header('location:chat.php');
}
else {
  header('location:index.php');
	echo 'false';
}
?>
