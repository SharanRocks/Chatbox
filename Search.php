 <?php
 session_start();
$connection=mysqli_connect('localhost','root','','chat1');
if(isset($_POST['Search_Content']) && isset($_POST['Username']))
{
      $Search=$_POST['Search_Content'];
      $User=$_POST['Username'];
      $insert=mysqli_query($connection,"SELECT Username, Name From user where Name like'%$Search%' and Username<>'$User'"  );
}
else {
    $Search=$_SESSION['Search_Content'];
    $User=$_SESSION['User'];
    $insert=mysqli_query($connection,"SELECT Username, Name From user where Name like'%$Search%' and Username<>'$User'"  );
}
?>
<!doctype html>
<html>
<head>
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
    <form method="POST" style="position:absolute;top:40%;left:40%;" action="Search.php">
      <input type="text" name="Username" value="<?=$User?>" Style="display:none;">
      <input type="text" name="Search_Content" placeholder="Search" class="Search_Bar" style="height:30px;padding:5px;font-size:25px;border-radius:20px;outline:none;">
      <input type="Submit" value="Search" class="Search" style="display:none;">
    </form>
    <form action="chat.php">
    <input type="submit" id="Go_Back" value="Go Back"></input>
  </form>
    <button class="Log_Out_Button" style="position:absolute;top:30%;left:90%;height:40px;width:100px;">Log Out</button>
  </div>
  <div class="mid" style="position:absolute;top:12.5%;height:600px;width:100%;">
  <div class="Search_Block" style="position:absolute;width:40%;height:100%;margin:0% 30%;background-color:#334458;  overflow-y: scroll;">
    <?php
  while($row=mysqli_fetch_assoc($insert)){
    $Name=$row['Name'];
    $Username=$row['Username'];
    $User_Name=$User;
    $q="SELECT * from request where Sender in('$User_Name','$Username') and Receiver in('$User_Name','$Username')";
    $r=mysqli_query($connection,$q);
    $numrow = mysqli_num_rows($r);
    $row=mysqli_fetch_assoc($r);
    if($numrow>0)
    {
      if($row['Req']=='1')
      {
        $flag='Undo';
      }
      else if($row['Req']=='2'){
        $flag='Friend';
      }
    }
    else{
      $flag='Send Request';
    }
    ?>
    <div class="Search-Result" style="background-color:white;position:absolute;height:80px;width:570px;border-radius:20px;text-align:left;margin:10px;padding:5px;">
      <div style="color:#3F3E3E;font-size:30px;font-family:Times_New_Roman;display:inline-block;"><?=$Name?></div>
      <div style="position:absolute;font-style:italic;font-family:Times_New_Roman;color:#3F3E3E;font-size:20px;;left:3%;"><?=$Username?></div></br>
      <form id="Send_Undo" name="myform" method="POST" action="Searchresults.php">
        <input type="text" id="Result" name="result" value="<?=$Search?>"></input>
        <input type="text" id="ReceiverR" name="Search_Username" value="<?=$Username?>"></input>
        <input type="text" id="SenderR" name="Self" value="<?=$User_Name?>" ></input>
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
