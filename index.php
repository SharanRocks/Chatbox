<!DOCTYPE html>
<html>
  <head>
    <?php?>
    <title>Matenick</title>
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />
    <link rel="stylesheet" href="Main_Page.css"></link>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script
  src="http://code.jquery.com/jquery-1.11.3.min.js"
  integrity="sha256-7LkWEzqTdpEfELxcZZlS6wAx5Ff13zZ83lYO2/ujj7g="
  crossorigin="anonymous"></script>
  <script type="text/javascript"></script>
    <script>
      $(document).ready(function(){
        $("#F2").hide();
        $("#LSignup").click(function(){
          $("#F1").fadeOut(500);
          $("#F2").fadeIn(500);
        });
        $("#LSignin").click(function(){
          $("#F1").fadeIn(200);
          $("#F2").fadeOut(500);
        })
      });
      </script>
</script>
  </head>
  <body>
    <div class="Main_Outer_Boundry">
    <div class="Outer_Boundry">
      <!-- Login Form -->
      <div class="Login_Form_Outer_Boundry" id="F1">
        <div class="Login_Form_Inner_Boundry1">
          <div class="Login_Form_Header">
            <img class="Avtar" src="boy-512.png" alt="Image" height="150px" width="150px"/>
            <div class="Login_text">Login</div>
          </div>
            <div class="Login_Form_Inner_Boundry2">
              <form class="Login_Form" id="Login_Form" method="POST" action="authentication.php">
                <input type="text" name="Username" class="Username" id="Username" placeholder="Username" autofocus></input></br>
                <input type="password" name="Password" class="Password" id="Password" placeholder="Password"></input></br>
                <input type="submit" class="Login_Button" id="Login_Button" value="Login"></input>
              </form>
            </div>
            <div class="Form_Footer">
              <div class="Footer_Signup_text">Not Yet Registered?    <span class="Create_An_Account" id="LSignup">Create an Account</span></div>
            </div>
            </div>
          </div>
        <!-- End -->

        <!-- SignUp form -->
        <div class="Register_Form_Outer_Boundry" id="F2">
          <div class="Register_Form_Inner_Boundry1">
            <div class="Register_Form_Header">
              <img class="Register_Avtar" src="reg.png" alt="Image" height="150px" width="150px"/>
              <div class="Register_text">Register</div>
            </div>
              <div class="Register_Form_Inner_Boundry2">
                <form class="Register_Form" id="Register_Form" method="POST" action="authentication2.php">
                  <input type="email" name="Email" class="Email" id="Email" placeholder="Email" autofocus></input></br>
                  <input type="text" name="Name" class="Name" id="Name" placeholder="Name"></input></br>
                  <input type="text" name="RUsername" class="RUsername" id="RUsername" placeholder="Username"></input></br>
                  <input type="password" name="RPassword" class="RPassword" id="RPassword" placeholder="Password"></input></br>
                  <input type="submit" name="Register_Button"class="Register_Button" id="Register_Button" value="Register" style="color:white;" ></input>
                </form>
              </div>
              <div class="Register_Form_Footer">
                <div class="Footer_Signup_text">Already Registered? <span href="" class="Log_into_Account" id="LSignin">Login</span></div>
              </div>
              </div>
            </div>
            <!-- End -->
          </div>
        </div>
  </body>
</html>
