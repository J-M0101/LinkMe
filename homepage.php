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
          <div class="pt2 logoText" style="width: 300px; text-align: center">
            <span class = "pl2"><button class="bluebackground homebutton link grow bg-animate" type="button"><a href="homepage.php">LinkMe</a></button> </span><br>
            <span class="tagline">Linking Company and Creator<span>
          </div>
        </div> 
        <div class="flex pt4 w-70">
          <div class="titletext w-100 flex" style="justify-content: center;">
            <div class="w-20">
              <form action="profile.php" class="w-100" method="post">
                <input class="w-100 bluebackground link grow bg-animate" type="submit" value="Profile">
              </form>
            </div>
            <div class="mr6 pr4">
              <form action="trendingpage.php" class="w-100" method="post">
                  <input class="w-100 bluebackground link grow bg-animate" type="submit" value="Trending">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- Body -->
    <div class="flex">
      <!--Left Profile box-->
      <div class="flex mt4 w-30 justify-center">
        <div class="w-70 profile yellowbackground">
          text
        </div>
      </div>
      <!-- middle column -->
      <div class="w-60">
        <!-- search -->
        <div class="mt4 mb4 " style="text-align: center">
          <form action="smconnect.php" method="post">
          <label class="pt1" for="search"></label>
          <input class="w-70 pv3 centertext round" type="text" name="search" onfocus="this.value=''" value="search">
          </form>
        </div>
        <!-- profile summary -->
        <div class="container">
          <p class="pv6  yellowbackground">
            Home Page
          </p>
          <p class=" pv6 mt5 yellowbackground">
            Home Page
          </p>
          <p class=" pv6 mt5 yellowbackground">
            Home Page
          </p>
          <p class=" pv6 mt5 yellowbackground">
            Home Page
          </p>
          <p class=" pv6 mt5 yellowbackground">
            Home Page
          </p>
          <p class=" pv6 mt5 yellowbackground">
            Home Page
          </p>
          <p class=" pv6 mt5 yellowbackground">
            Home Page
          </p>
          <p class=" pv6 mt5 yellowbackground">
            Home Page
          </p>
        <div>
      </div>
      <!-- Right side of page -->
      <div class="w-30"></div>  
    </div>
  </body>
</html>