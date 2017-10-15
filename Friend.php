<?php
session_start();
$connection=mysqli_connect('localhost','root','','chat1');
  if(isset($_POST['Sender']) && isset($_POST['Self']))
  {
    $Sender=$_POST['Sender'];
    $Receiver=$_POST['Self'];
    $q1="UPDATE request set req=2 where Sender='$Sender' and Receiver='$Receiver'";
    $r=mysqli_query($connection,$q1);
    $q2=mysqli_query($connection,"INSERT INTO friends(Sender,Receiver) values('$Sender','$Receiver')");
    $q3=mysqli_query($connection,"INSERT INTO friends(Sender,Receiver) values('$Receiver','$Sender')");
      $_SESSION['User']=$_POST['Self'];
      header('location:Requestlist.php');
  }
 ?>
