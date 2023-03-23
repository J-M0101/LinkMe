<html style="background-color:#36413D">
  <head>
  <title>Home Page</title>
  <?php
    include "head.php";
?>
  </head>
  <body style="background-color:#36413D">
  <!-- Titlebar -->
    <div class="titlebar">
      <div class="flex justify-between" >
        <div class="pl2 pt2 logoText" style="witdth: 300px; text-align: center">
          <span class = "pl2">LinkMe </span><br>
          <span class="tagline">Linking Company and Creator<span>
        </div>
      
        <div class="pt4 w-40" >
          <div class="titletext w-100 flex justify-between">
            <div class="w-30">
              <form action="profile.php" class="w-100" method="post">
                <input class="w-100 bluebackground link grow bg-animate" type="submit" value="Profile">
              </form>
            </div>
            <div class="w-30">
              <form action="trending.php" class="w-100" method="post">
                  <input class="w-100 bluebackground link grow bg-animate" type="submit" value="Trending">
              </form>
            </div>
            <div class="w-30">
              <form action="inbox.php" class="w-100" method="post">
                  <input class="w-100 bluebackground link grow bg-animate" type="submit" value="Inbox">
              </form>
            </div>
          </div>
        </div>
        <div style="width: 300px"></div>

      </div>
    </div>
  <!-- Body -->
    <div class="flex justify-between">
      <!--Left Profile box-->
      <div class="flex mt4 w-30 justify-center">
        <div class="w-70 profile yellowbackground">
          text
        </div>
      </div>
      <!-- middle column -->
      <div class="w-40">
        <!-- search -->
        <div>
          <div class="mt4 mb4 " style="text-align: center">
            <form action="smconnect.php" method="post">
            <label class="pt1" for="search"></label>
            <input class="w-50 pv3 centertext round" type="text" name="search" value="search">
            </form>
          </div>
          <!-- profile summary -->
          <div class="pv6  yellowbackground">
            Home Page
          </div>
          <div class=" pv6 mt5 yellowbackground">
            Home Page
          </div>
          <div class=" pv6 mt5 yellowbackground">
            Home Page
          </div>
          <div class=" pv6 mt5 yellowbackground">
            Home Page
          </div>
        </div>  
      </div>
      <!-- Right side of page -->
      <div class="w-30"></div>  
    </div>
  </body>
</html>