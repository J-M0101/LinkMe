<?php
    require_once("include.php");
    require_once("DataBaseActions.php");
    
     //checks if fields are empty
    if($_POST&&
    $_POST["firstname"] && $_POST["lastname"] && $_POST["password"]
     && $_POST["email"]&& $_POST["username"]&& $_POST["password"] ==$_POST["Confirm"]) {
        
        $firstname =  $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $username = $_POST["username"];

        $db = new DataBaseActions();
        if (!$db->emailIsUnique($email)){
            //add this
            echo "email already in use";
            header("location:creatorinfo.php");

            die();
        }

        if (!$db->usernameIsUnique($username)){
            //add this
            echo "username already in use";
            header("location:creatorinfo.php");

            die();
        }

        echo "trying to add user";
        $db->addCreator($firstname, $lastname, $password,  $email, $username);
        echo "user added";

        header("location:smconnect.php");
        die();
    }
?>
<html>
  <head>
  <?php
    include "head.php";
?>
  </head>
  <body>
    <div class="flex-column page items-center justify-center">
      <a href = "index.php" class ="introTwo pb2 flex">LinkMe</a>
      <form action="creatorinfo.php" method="post">
            <div class="flex button mt2 pv2 ph3"><!--display box holds email input-->
                    <label class="infosize pt1" for="email"> email:</label>
                    <input class="pr4 w-80" type="email" name="email">
                </div>
            <div>
                <div class="flex button mt2 pv2 ph3"><!--display box holds password input-->
                    <label class="infosize pt1" for="password"> password:</label>
                    <input class="pr4 w-80" type="password" name="password">
                </div>
                <div class="flex button mt3 pv2 ph3"><!--display box holds password input-->
                    <label class="infosize pt1" for="Confirm"> Confirm password:</label>
                    <input class="w-70" type="password" name="Confirm">
                </div>
            </div>
            <div class = "bar mt4"></div>
            <div class = "flex justify-center">
                <div class="flex button mt3 pv1 w-50 ph3 mr2"><!--display box holds creator first name-->
                    <label class="infosize pt1 pb1" for="firstname"> First Name:</label>
                    <input class="pr4 w-70" type="text" name="firstname">
                </div>
                <div class="flex button mt3 pv1 w-50 ph3 ml2"><!--display box holds creator last name-->
                    <label class="infosize pt1 pb1" for="lastname"> Last Name:</label>
                    <input class="pr4 w-70" type="text" name="lastname">
                </div>
            </div>
            <div class = "flex justify-center">
                <div class="flex button mt3 pv1 w-100 ph3 ml0"><!--display box holds creator username-->
                    <label class="infosize pt2 pb1" for="username">Creator Username</label>
                    <input class="w-60 pt2" type="text" name="username">
                </div>
            </div>
            <div class="mt4 flex justify-center"><!--display box holds create account-->
                    <input class="w-100 pv3 ma0 bckColor grow dib f3-ns no-underline black pv2 db bg-animate hover-bg-yellow" type="submit" value="Create Account">
                </div>
          </form>
    </div>
  </body>
</html>