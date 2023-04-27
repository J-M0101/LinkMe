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
        <div class="flex h-50 mt4 justify-center">  
          <div class="flex w-90 yellowbackground">
            <!-- Username -->
            <div class="mt4 mb4 ml4 mr4">
              <div class="" style="text-align: left; font-size: 36px;">
                John Doe
              </div>
              <!-- Icons -->
              <div class="mt2 mb2" style="text-align: left; font-size: 16px; font-family: Arial;">
                Insert icons here
              </div>
              <!-- Line divider -->
              <hr style="border: 2px solid black; margin: 0; width: 100%;">
              <!-- About me -->
              <div class="mt2 mb2" style="text-align: left; font-size: 22px; font-family: Arial;">
                About Me
              </div>
              <div class="mt2 mb4" style="text-align: left; font-size: 16px; font-family: Arial;">
                I'm a passionate adventurer who loves exploring the great outdoors through mountain climbing, biking, and hiking. With his unwavering enthusiasm and a strong love for nature, John has climbed some of the highest peaks and biked through some of the most challenging trails around the world. When he's not out in the wilderness, John can be found sharing his experiences and knowledge with others, inspiring them to explore and appreciate the beauty of our planet.
              </div>
              <!-- Tags -->
              <div class="mt2 mb4" style="text-align: left; font-size: 16px; font-family: Arial;">
                Tags: Mountain Climbing, Biking, Hiking
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