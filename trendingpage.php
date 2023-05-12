<html style="background-color:#36413D">
  <head>
  <title>Home Page</title>
  <?php
    include "head.php";
?>
  </head>
  <body style="background-color:#36413D">
  <!-- Titlebar -->
  <div class="flex justify-around titlebar">
      <!-- left title -->
      <div class="pt2 logoText w-40" style="width: 300px; text-align: center">
        <span class = "pl2"><button class="bluebackground homebutton link grow bg-animate" type="button"><a href="homepage.php">LinkMe</a></button> </span><br>
        <span class="tagline">Linking Company and Creator<span>
      </div>
      <!-- middle title -->
      <div class="flex ml7  w-30"></div>
      <!-- Right title -->
      <div class="flex pt4 ml5 w-30">
        <div class="titletext w-100 flex" style="justify-around">
          <div class="mr3">
            <form action="profile.php" class="w-100" method="post">
              <input class="w-100 bluebackground link grow bg-animate" type="submit" value="Profile">
            </form>
          </div>
          <div class="mr3">
            <form action="trendingpage.php" class="w-100" method="post">
              <input class="w-100 bluebackground link grow bg-animate" type="submit" value="Trending">
            </form>
          </div>
          <div>
            <form action="index.php" class="w-100" method="post">
              <input class="w-100 bluebackground link grow bg-animate" type="submit" value="Logout">
            </form>
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
            <div class="w-25 flex-column">
              <div class="bb bw1">For You</div>
                <div class="pt3 containerOne">
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                </div>
            </div>
            <div class="w-25 flex-column">
              <div class="bb bw1">Trending</div>
                <div class="pt3 containerOne">
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                </div>
            </div>
            <div class="w-25 flex-column">
              <div class="bb bw1">Top engagement</div>
                <div class="pt3 containerOne">
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                </div>
            </div>
            <div class="w-25 flex-column">
              <div class="bb bw1">Filter By</div>
                <div class="pt3 containerOne">
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                  <div>test</div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class ="w-100 footer">
      <div class ="pa4 pb6">
        check
      </div>
    </footer>
  </body>
</html>