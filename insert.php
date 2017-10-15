<?php
session_start();
$connection=mysqli_connect('localhost','root','','chat1');
if(!isset($_SESSION['Friend'])){
}else{
$friend=$_SESSION['Friend'];
$us=$_SESSION['uname'];
$msg = mysqli_query($connection,"SELECT * from messages inner join user on messages.Username=user.Username where Friend in ('$friend', '$us') and messages.Username in ('$friend', '$us') order by POST_TIME ");
while($row=mysqli_fetch_array($msg)){
	$Name=$row['Name'];
	$username=$row['Username'];
	$message=$row['Message'];
	$time=$row['Post_Time'];
?>
<div class="Message_Userame" style="color:white;position:relative;font-size:20px;font-style:italic;font-family:Times_New_Roman; font-weight:bold;"><?=$Name?></div>
<span style="position:static;float:left;color:white;"><?=date("j/m/Y g:i:sa", strtotime($time))?></span></br></br>
<div style="background-color:white;position:relative;font-size:20px;padding:5px;width:80%;border-radius:15px;font-weight:bold;font-style:italic;color:black;font-family:Times_New_Roman;word-wrap: break-word;margin-left:10	px;"><?=$message?></div>
</br>
<?php
}}
?>
