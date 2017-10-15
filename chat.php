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
  <script>
    $(document).ready(function()
    {
        $(document).bind('keypress', function(e) {
            if(e.keyCode==13){
                 $('#User_Control').submit();
				 $('#Type_Message').val("");
             }
        });
	});
  </script>
      <script type="text/javascript">
      function post()
      {
        var comment = document.getElementById("Type_Message").value;
        var name = document.getElementById("username").value;
        var Friend = document.getElementById("Friend").value;
        if(comment && name && Friend)
        {
          $.ajax
          ({
            type: 'POST',
            url: 'message.php',
            data:
            {
              user_msg:comment,
	             user_name:name,
               Friend:Friend
             },
             success: function (response)
             {
	              document.getElementById("Type_Message").value="";
              }
          });
        }
        return false;
      }
      </script>
      <script>
       function autoRefresh_div()
       {
                  $("#Message_Box").load("insert.php").show();
      }
        setInterval('autoRefresh_div()', 500);

      </script>
  </head>
  <body>
    <div class="Chatpage_Outer_Boundry">
      <div class="Chatpage_Header">
        <form action="Requestlist.php" method="POST">
          <input type="text" name="User" value="<?= $_SESSION['uname'] ?>" style="display:none;">
          <input type="Submit" value="Notification"></input>
        </form>
        <form action="chatlist.php" method="POST">
          <input type="text" name="User" value="<?= $_SESSION['uname'] ?>" style="display:none;">
          <input type="Submit" value="Select Friend"></input>
        </form>
        <form class="Friend_Search" method="post" action="Search.php">
          <input type="text" name="Username" value="<?= $_SESSION['uname'] ?>" style="display:none;">
          <input class="Search_bar" id="Search" placeholder="Search People" name="Search_Content">
          <input class="Search" type="submit"  value="Search" Name="Search">
        </form>
        <div class="My_Name_Block"><div class="My_Name"><?= $_SESSION['name'] ?></div></div>
        <a href="Logout.php"><button class="Log_Out_Button">Log Out</button></a>
      </div>
      <div class="Mid_Content">
        <div class="Chatbox_Outer_Boundry">
          <div class="Message_Box" id="Message_Box">
            <?php
            if(isset($_POST['Friend']))
              $_SESSION['Friend']=$_POST['Friend'];

            ?>
          </div>
           <form id="User_Control" method="POST" action="#" onsubmit="return post();">
             <input id="Friend" type="text" value='<?=$_SESSION['Friend']?>'>
            <input type="text" name="Uname" style="display:none" id="username" value="<?= $_SESSION['uname'] ?>" >
            <textarea id="Type_Message" ></textarea>
            <input type="submit" value="Send" id="Send" class="Send" name="Send"></input>
          </form>
        </div>
      </div>
      <div class="Chatpage_footer">
      </div>
    </div>
  </body>
</html>
