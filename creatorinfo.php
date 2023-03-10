<html>
  <head>
  <title>Creator Info</title>
  <?php
    include "head.php";
?>
  </head>
  <body>
    <div class="flex-column page items-center justify-center">
      <a href = "index.php" class ="introTwo pb2 flex">LinkMe</a>
      <form action="smconnect.php" method="post">
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
                    <label class="infosize pt1" for="password"> Confirm password:</label>
                    <input class="w-70" type="password" name="Confirm">
                </div>
            </div>
            <div class = "bar mt4"></div>
            <div class = "flex justify-center">
                <div class="flex button mt3 pv1 w-50 ph3 mr2"><!--display box holds creator first name-->
                    <label class="infosize pt1 pb1" for="password"> First Name:</label>
                    <input class="pr4 w-70" type="text" name="firstname">
                </div>
                <div class="flex button mt3 pv1 w-50 ph3 ml2"><!--display box holds creator last name-->
                    <label class="infosize pt1 pb1" for="password"> Last Name:</label>
                    <input class="pr4 w-70" type="text" name="lastname">
                </div>
            </div>
            <div class = "flex justify-center">
                <div class="flex button mt3 pv1 w-100 ph3 ml0"><!--display box holds creator username-->
                    <label class="infosize pt2 pb1" for="password">Creator Username</label>
                    <input class="w-60 pt2" type="text" name="company">
                </div>
            </div>
            <div class="mt4 flex justify-center"><!--display box holds create account-->
                    <input class=" w-100 pv3 ma0 bckColor grow dib f3-ns no-underline black pv2 db bg-animate hover-bg-yellow" type="submit" value="Create Account">
                </div>
          </form>
    </div>
  </body>
</html>