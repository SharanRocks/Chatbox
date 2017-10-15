<?php
session_start();
$connection=mysqli_connect('localhost','root','','chat1');
if(isset($_POST['User']))
{
  $User=$_POST['User'];
}
else {
  $User=$_SESSION['User'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Request List</title>
  <script
  src="http://code.jquery.com/jquery-1.12.0.min.js"
  integrity="sha256-Xxq2X+KtazgaGuA2cWR1v3jJsuMJUozyIXDB3e793L8="
  crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>


  <style>
      ::-webkit-scrollbar{
      width:8px;
    }
    ::-webkit-scrollbar-thumb
    {
      border-radius: 8px;
      background-color: grey;
      box-shadow:inset 0 0 6px white;

    }
    </style>
</head>
<body style="margin:auto;background-image:url('bk1.jpg');background-repeat:no-repeat;background-position:top;">
<div class="Outer_Boundry" style="position:relative;;height:90px;position:relative;margin:auto;height:790px;width:1530px;">
  <div class="Header" style="background-color:#334458;position:absolute; height:100px;width:100%;">
    <form action="chat.php">
    <input type="submit" id="Go_Back" value="Go Back"></input>
  </form>
    <button class="Log_Out_Button" style="position:absolute;top:30%;left:90%;height:40px;width:100px;">Log Out</button>
  </div>
  <div class="mid" style="position:absolute;top:12.5%;height:600px;width:100%;">
  <div class="Search_Block" style="position:absolute;width:40%;height:100%;margin:0% 30%;background-color:#334458;  overflow-y: scroll;">
    <?php

    $query=mysqli_query($connection,"SELECT Sender,Name,req from request inner join user on request.Sender=user.Username where req=1 and Receiver='$User'");
    while($row=mysqli_fetch_assoc($query)){
    $Name=$row['Name'];
    $Sender=$row['Sender'];
    $Receiver=$User;
    if($row['req']==1)
    {
      $flag="Accept";
    }
    ?>
    <div class="Search-Result" style="background-color:white;position:absolute;height:80px;width:570px;border-radius:20px;text-align:left;margin:10px;padding:5px;">
      <div style="color:#3F3E3E;font-size:30px;font-family:Times_New_Roman;display:inline-block;"><?=$Name?></div>
      <div style="position:absolute;font-style:italic;font-family:Times_New_Roman;color:#3F3E3E;font-size:20px;;left:3%;display:none;"><?=$Sender?></div></br>
      <form id="Send_Undo" name="myform" method="POST" action="Friend.php">
        <input type="text" id="ReceiverR" name="Sender" value="<?=$Sender?>" style="display:none;"></input>
        <input type="text" id="SenderR" name="Self" value="<?=$Receiver?>" style="display:none;"></input>
        <input type="submit" class="sub" value="<?=$flag?>" id="Request" style="position:absolute;left:75%;top:15%;padding:10px;" ></input>
      </form></br>
    </div></br></br></br></br></br></br>
       <?php
     }
    ?>
  </div>
</div>
<div class="footer" style="position:absolute;top:88%;height:100px;width:100%;background-color:#334458;"></div>
</div>
</body>
</html>
