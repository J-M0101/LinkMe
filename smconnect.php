<?php
 require_once("include.php");
 require_once("DataBaseActions.php");
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
 error_reporting(E_ALL ^ E_WARNING);
session_start(); // start the session

   $db = new DataBaseActions();
  
  if ($_POST['YouTube']) {
    $db->socialMediaButton("YouTube"); //add youtube username, link, and follower_count
    header("location:homepage.php");
    die();
  }
  
  if ($_POST['Facebook']) {
    $db->socialMediaButton("Facebook"); //add instagram username, link, and follower_count
    header("location:homepage.php");
    die();
  }

  if ($_POST['Twitter']) {
    $db->socialMediaButton("Twitter"); //add twitter username, link, and follower_count
    header("location:homepage.php");
    die();
  }


?>

<html>
  <head>
  <title>SM Connect</title>
  <?php
    include "head.php";
?>
  </head>
  <body>
    <div class="flex-column page items-center justify-center">
      <a href = "index.php" class ="introTwo pb2 flex">LinkMe</a>
      <form action="" class="w-20" method="post">
            <div class="mt4 flex justify-center"><!--display box holds YouTube connect-->
                    <input class="w-100 pv3 ma0 bckColor grow dib f3-ns no-underline black pv2 db bg-animate hover-bg-yellow br-pill" type="submit" name="YouTube" value="YouTube">
                </div>
            <div class="mt4 flex justify-center"><!--display box holds Instagram connect-->
                    <input class="w-100 pv3 ma0 bckColor grow dib f3-ns no-underline black pv2 db bg-animate hover-bg-yellow br-pill" type="submit" name="Instagram" value="Instagram">
                </div>
            <div class="mt4 flex justify-center"><!--display box holds SnapChat connect-->
                    <input class="w-100 pv3 ma0 bckColor grow dib f3-ns no-underline black pv2 db bg-animate hover-bg-yellow br-pill" type="submit" name="Snapchat" value="Snapchat">
                </div>
            <div class="mt4 flex justify-center"><!--display box holds Facebook connect-->
                    <input class="w-100 pv3 ma0 bckColor grow dib f3-ns no-underline black pv2 db bg-animate hover-bg-yellow br-pill" type="submit" name="Facebook" value="Facebook">
                </div>
            <div class="mt4 flex justify-center"><!--display box holds Twitch connect-->
                    <input class="w-100 pv3 ma0 bckColor grow dib f3-ns no-underline black pv2 db bg-animate hover-bg-yellow br-pill" type="submit" name="Twitch" value="Twitch">
                </div>
      </form>
      <form action="homepage.php" class="w-20" method="post">          
            <div class="mt4 flex justify-center"><!--display box holds Twitch connect-->
                <input class="w-100 grey pv3 ma0 bckColor grow dib f3-ns no-underline black pv2 db bg-animate hover-bg-yellow br-pill" type="submit" value="Done">
            </div>
          </form>
    </div>
  </body>
</html>