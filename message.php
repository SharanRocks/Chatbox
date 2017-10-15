<?php

$connection=mysqli_connect('localhost','root','','chat1');
if(isset($_POST['user_msg']) && isset($_POST['user_name']) && isset($_POST['Friend']))
{
  $msg=$_POST['user_msg'];
  $name=$_POST['user_name'];
  $friend=$_POST['Friend'];
  $insert=mysqli_query($connection,"INSERT INTO messages (Username,Message,Post_Time,Friend) VALUES ('$name','$msg',CURRENT_TIMESTAMP,'$friend')");

}
?>
