<?php
    session_start();

    // if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //     if(isset($_POST[""]))
    // }
?>
<html>
  <head>
  <title>Index.html</title>
  <?php
    include "head.php";
?>
  </head>
  <body>
    <div class="page items-center justify-center "> <!-- Used for display flex. helps to align boxes on pages to parent -->
      <div class="flex items-center ml6">
        <div class="mb6 mr5"> <!--sets a display box for all company name and title-->
          <p class ="intro ma0 grow dib f3-ns no-underline">LinkMe</p>
          <p class ="bar ma0"></p>
          <p class ="tagLine ma1">Linking Company and Creator</p>
        </div>
        <div class="login ml6 "> <!--display box that holds the email password and submit button-->
          <form action="profile.php" method="post" class="ml3 mr5 pt3 pb2">
            <div class="flex items-center button mw9 pv2 ph3"><!--display box holds email input-->
                <label for="email"> Email:</label>
                <input class="mw7 w-100" type="text" name="email">
            </div>
            <div class="flex items-center button mw9 mt4 pv2 ph3"><!--display box holds password input-->
                <label for="password"> password:</label>
                <input class=" w-100" type="text" name="password">
            </div>
            <div class="mt4 flex justify-center"><!--display box holds login button-->
                <input class="ph6 pv3 ma0 bckColor grow dib f3-ns no-underline black pv2 db bg-animate hover-bg-yellow" type="submit" value="Login">
            </div>

            <div>
            <p class ="bar1 mt3"></p>
            </div>

            <div class="flex justify-center"><!-- display box holds Create account button-->
                <input class="ph6 pv3 ma0 bckColorCreateAccount grow dib f3-ns no-underline black pv2 db bg-animate hover-bg-yellow" type="submit" value="Create Account">
            </div>
            
            <div class="flex justify-center pt3"><!-- display box holds Forgot Password button-->
                <input class="bn bluebutton grow dib f3-ns no-underline" type="submit" value="forgot Password?">
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="page">
      <div class="boxLeft">
          <p>next page</p>
      </div>
    </div>
  </body>
</html>
