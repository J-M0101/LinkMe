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
      <form action="smconnect.php" method="post">
            <div class="mt4 flex justify-center"><!--display box holds YouTube connect-->
                    <input class="w10 pv3 ma0 bckColor grow dib f3-ns no-underline black pv2 db bg-animate hover-bg-yellow br-pill" type="submit" value="YouTube" style="width: 300px;">
                </div>
            <div class="mt4 flex justify-center"><!--display box holds Instagram connect-->
                    <input class="w-100 pv3 ma0 bckColor grow dib f3-ns no-underline black pv2 db bg-animate hover-bg-yellow br-pill" type="submit" value="Instagram">
                </div>
            <div class="mt4 flex justify-center"><!--display box holds SnapChat connect-->
                    <input class="w-100 pv3 ma0 bckColor grow dib f3-ns no-underline black pv2 db bg-animate hover-bg-yellow br-pill" type="submit" value="Snapchat">
                </div>
            <div class="mt4 flex justify-center"><!--display box holds Facebook connect-->
                    <input class="w-100 pv3 ma0 bckColor grow dib f3-ns no-underline black pv2 db bg-animate hover-bg-yellow br-pill" type="submit" value="Facebook">
                </div>
            <div class="mt4 flex justify-center"><!--display box holds Twitch connect-->
                    <input class="w-100 pv3 ma0 bckColor grow dib f3-ns no-underline black pv2 db bg-animate hover-bg-yellow br-pill" type="submit" value="Twitch">
                </div>
          </form>
    </div>
  </body>
</html>