<!DOCTYPE html>
<html>
  <head>
    <title>Inbox</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></link>
    <link rel="stylesheet" href="chat.css"></link>
    <?php
      include('connection.php');
      session_start();
      if(isset($_SESSION['uname'])) {}
        else{
	             echo "Failed";
	           }
      ?>
      <script
  src="http://code.jquery.com/jquery-1.12.0.min.js"
  integrity="sha256-Xxq2X+KtazgaGuA2cWR1v3jJsuMJUozyIXDB3e793L8="
  crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
      <?php $u=$_SESSION['uname'];?>
      <?php $result1=mysqli_query($connection,"SELECT * from friends where Receiver='$u'");?>
  </head>
  <body>
    <div class="Chatpage_Outer_Boundry">
      <div class="Chatpage_Header">
        <form action="chat.php" method="POST">
          <input type="text" name="User" value="<?= $_SESSION['uname'] ?>" style="display:none;">
          <input type="Submit" value="Go Back"></input>
        </form>
        <div class="My_Name_Block"><div class="My_Name"><?= $_SESSION['name'] ?></div></div>
        <button class="Log_Out_Button" href="logout.php">Log Out</button>
      </div>
      <div class="Mid_Content">
        <div class="Chatbox_Outer_Boundry">
          <form method="POST" id="Friend_list" action="chat.php">
            <input type="text" name="User" value="<?= $_SESSION['uname'] ?>" style="display:none;">
          <select id="Friend" name="Friend">
            <?php while($row1=mysqli_fetch_array($result1)):;?>
            <option selected="selected" value="<?=$row1['Sender']?>"><?php echo $row1['Sender'];?></option>
          <?php endwhile;
          ?>
          </select>
          <input type="submit"></input>
        </div>
      </div>
      <div class="Chatpage_footer">
      </div>
    </div>
  </body>
</html>
