<?php
    require_once("include.php");
    require_once("DataBaseActions.php");
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    error_reporting(E_ALL ^ E_WARNING);
    
     //checks if fields are empty
    if($_POST&&
    $_POST["firstname"] && $_POST["lastname"] && $_POST["password"] && $_POST["email"]
     && $_POST["Role"] && $_POST["company"]&& $_POST["password"] ==$_POST["Confirm"]) {
        
        $firstname =  $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $role = $_POST["Role"];
        $company = $_POST["company"];

        $db = new DataBaseActions();
        if (!$db->emailIsUnique($email)){
            echo "email already in use";
            header("location:companyinfo.php");
            die();
        }
        

        echo "trying to add user";
        $db->addBusiness($firstname, $lastname, $company, $role, $password, $email);
        echo "user added";
        //move on to next page?
        header("location:smconnect.php");
        die();
    }
?>
<html>
  <head>
  <title>Company Info</title>
  <?php
    include "head.php";
?>
  </head>
  <body>
    <div class="flex-column page items-center justify-center">
      <a href = "index.php" class ="introTwo pb2 flex">LinkMe</a>
      <form action="companyinfo.php" method="post">
            <div class="flex mw9 pv2 ph3"><!--display box holds email input-->
                <label class="infocolor" for="email"> Email:</label>
                <input class="w-100 inputbckcolor" type="text" name="email">
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
                <div class="flex button mt3 pv1 w-50 ph3 mr2"><!--display box holds password input-->
                    <label class="infosize pt1 pb1" for="firstname"> First Name:</label>
                    <input class="pr4 w-70" type="text" name="firstname">
                </div>
                <div class="flex button mt3 pv1 w-50 ph3 ml2"><!--display box holds password input-->
                    <label class="infosize pt1 pb1" for="lastname"> Last Name:</label>
                    <input class="pr4 w-70" type="text" name="lastname">
                </div>
            </div>
            <div class = "flex justify-center">
                <div class="flex button mt3 pv1 w-50 ph3 mr2"><!--display box holds password input-->
                    <label class="infosize pt2 pb1" for="Role"> Role:</label>
                    <input class="w-90 pt2" type="text" name="Role">
                </div>
                <div class="flex button mt3 pv1 w-50 ph3 ml2"><!--display box holds password input-->
                    <label class="infosize pt2 pb1" for="company">Company Name:</label>
                    <input class="w-60 pt2" type="text" name="company">
                </div>
            </div>
            <div class="mt4 flex justify-center"><!--display box holds login button-->
                    <input class="w-100 pv3 ma0 bckColor grow dib f3-ns no-underline black pv2 db bg-animate hover-bg-yellow" type="submit" value="Create Account">
                </div>
          </form>
    </div>
  </body>
</html>