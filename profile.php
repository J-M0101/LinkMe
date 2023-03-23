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
        <div class="w-30">
          <div class="pt2 logoText" style="witdth: 300px; text-align: center">
            <span class = "pl2"><button class="bluebackground homebutton link grow bg-animate" type="button"><a href="homepage.php">LinkMe</a></button> </span><br>
            <span class="tagline">Linking Company and Creator<span>
          </div>
        </div> 
        <div class="pt4 w-40">
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
        <div class="w-30"></div>

      </div>
    </div>
    <!-- Body -->
    <div class="flex flex-column">
        <!-- search -->
        <div>
          <div class="mt3 mb3" style="text-align: center">
            <form action="smconnect.php" method="post">
            <label class="pt1" for="search"></label>
            <input class="w-20 pv3 centertext round" type="text" name="search" value="search">
            </form>
          </div>
  
  <!-- Body -->
    <div class="flex justify-between">
      <!--Left Profile box-->
      <div class="flex w-30 h-300 justify-center">
        <div class="pv6 w-90 profile yellowbackground">
        </div>
      </div>
      <!-- Middle Column -->
          <!-- Profile Summary -->
          <div class="pv6 yellowbackground flex-grow-1">
          </div>
      <!-- Right Side of Page -->
      <div style="padding-right: 5%;"></div>  
    </div>
  </body>
</html>