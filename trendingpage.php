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
    <div class="flex h-100">
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
        <div class="flex h-75 mt4 justify-center">  
          <div class="flex w-90 pt3 yellowbackground">
            <div class="w-25">For You</div>
            <div class="w-25">Trending</div>
            <div class="w-25">Top Engagement</div>
            <div class="w-25">Filter by</div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>