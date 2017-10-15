<?php
session_start();
$connection=mysqli_connect('localhost','root','','chat1');
  if(isset($_POST['Search_Username']) && isset($_POST['Self']) && isset($_POST['result']))
  {
    $Sender=$_POST['Self'];
    $Receiver=$_POST['Search_Username'];
    $q="SELECT req from request where Sender='$Sender' and Receiver='$Receiver'";
    $r=mysqli_query($connection,$q);
    $num_row = mysqli_num_rows($r);
    if($num_row>0)
    {
      $q2=mysqli_query($connection,"DELETE from request where Sender='$Sender' and Receiver='$Receiver'");
      $_SESSION['User']=$_POST['Self'];
      $_SESSION['Search_Content']=$_POST['result'];
      header('location:Search.php');
    }
    else {
    $query="INSERT into request(Sender, Receiver,Req) select '$Sender', '$Receiver', 1 from dual where not exists(select Sender, Receiver from request where Sender='$Receiver' and Receiver='$Sender')";
    $res=mysqli_query($connection,$query);
    $_SESSION['User']=$_POST['Self'];
    $_SESSION['Search_Content']=$_POST['result'];
    header('location:Search.php');
  }
}
 ?>
