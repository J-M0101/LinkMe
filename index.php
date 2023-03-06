<?php
    session_start();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (isset($_POST["email"]) && isset($_POST["password"])) 
      {   
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Create connection
        $conn = mysqli_connect("localhost", "root", "", "linkme");
        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT password from user WHERE email = '$email'";
        try{
            $results = mysqli_query($conn, $sql);

            if ($results) { 
              $row = mysqli_fetch_assoc($results);

              if ( $row["password"] === $password ) 
              {
                  $_SESSION['logged_in'] = true;
                  $_SESSION['email'] = $_POST["email"];
                  // TODO: cache username so you don't have to make hella subquries
                  // $_SESSION['username'] = $row['username'];
                  // echo "Successful login";
                  header("Location: homepage.php");
              }
              else
              {
                  $error_message = 'Incorrect Password';
              }
            } 
          else {
              $error_message = "Failed Login";
          }
        }
        catch (Exception $e) {
            $error_message = "Failed query of creditCardNumber and pin";
        }
      }
      else
      {
          $error_message = "Missing input";
      }
    }
?>
<html>
  <head>
  <title>Home Page</title>
  <?php
    include "head.php";
?>
  </head>
  <body>
    <div class="page items-center justify-center "> <!-- Used for display flex. helps to align boxes on pages to parent -->
      <div class="flex items-center ml7">
        <div class="mb6 mr6"> <!--sets a display box for all company name and title-->
          <p class ="intro ma0 grow dib f3-ns no-underline">LinkMe</p>
          <p class ="bar ma0"></p>
          <p class ="tagLine ma1">Linking Company and Creator</p>
        </div>
        <div class="flex"> <!--display box that holds the email password and submit button-->
          <form action="index.php" method="post" class="ml3 mr5 pt3 w-100">
            <div class="flex items-center button mw9 pv2 ph3"><!--display box holds email input-->
                <label class="sizeOf" for="email"> Email:</label>
                <input class="w-100" type="text" name="email">
            </div>
            <div class="flex items-center button mw9 mt4 pv2 ph3"><!--display box holds password input-->
                <label class="sizeOf" for="password"> password:</label>
                <input class="pr6 w-100" type="password" name="password">
            </div>
            <div class="mt4 flex justify-center"><!--display box holds login button-->
                <input class=" w-100 pv3 ma0 bckColor grow dib f3-ns no-underline black pv2 db bg-animate hover-bg-yellow" type="submit" value="Login">
            </div>

            <div>
            <p class ="bar1 mt3"></p>
            </div>

            <div class="flex justify-center"><!-- display box holds Create account button-->
                <a href = "createcompany.php" class=" button ph5 pv3 ma0 bckColorCreateAccount grow dib f3-ns no-underline black pv2 db bg-animate hover-bg-yellow buttoncolor">Create Accout</a>
            </div>
            
            <div class="flex justify-center pt3"><!-- display box holds Forgot Password button-->
                <a href = "passwordreset.php" class="bn bluebutton grow dib f3-ns no-underline">Forgot Password?</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="page justify-around">
      <div class="greybackground flex w-50 pa5 mr6 mb7 grow dib f3-ns no-underline black pv2 db bg-animate hover-bg-yellow">
          <p class = "w-100">Test message</p>
      </div>
      <div class="yellowbackground flex w-50 pa5 ml6 mt7 grow dib f3-ns no-underline black pv2 db bg-animate hover-bg-yellow">
          <p class = "w-100">Test message</p>
      </div>
    </div>
    <div class="page w-100 justify-center pt6">
      <div class="flex ba align-center items-center justify-center w-50 mb5 round">
          test
      </div>
    </div>  

    <footer class ="w-100 footer">
      <div class ="pa4 pb7">
        check
      </div>
    </footer>
  </body>
</html>
