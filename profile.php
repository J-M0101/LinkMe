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
              <div class="mt2 mb2" style="text-align: left; font-size: 16px;">
                <svg width="24" height="24" viewBox="0 0 24 24" style="margin-right: 10px;">
                <path d="M21.6 7.6c-.2-.8-.8-1.4-1.5-1.5C18.5 6 12 6 12 6s-6.5 0-7.1.1C4.2 6.2 3.6 6.8 3.4 7.6 3 9 3 12 3 12s0 3 .4 4.4c.2.8.8 1.4 1.5 1.5.6.1 6.1.1 6.1.1s6.5 0 7.1-.1c.7-.1 1.3-.7 1.5-1.5.4-1.2.4-2.2.4-2.2s0-1-.4-2.4zm-12.6 6.2V8.2l5.8 2.8-5.8 2.8z" fill="#ff0000"/>
                </svg>
                <svg width="24" height="24" viewBox="0 0 24 24" style="margin-right: 10px;">
                  <path fill="#1877f2" d="M20.66 2H3.34A1.34 1.34 0 0 0 2 3.34v17.32A1.34 1.34 0 0 0 3.34 22h9.89v-7.06H9.56v-2.73h3.67V9.94c0-3.63 2.22-5.61 5.44-5.61a29.43 29.43 0 0 1 3.28.17v3.78l-2.24.01c-1.76 0-2.1.84-2.1 2.06v2.71h4.19l-.55 2.73h-3.64V22h7.12A1.34 1.34 0 0 0 22 20.66V3.34A1.34 1.34 0 0 0 20.66 2z"/>
                </svg>
                <svg width="24" height="24" viewBox="0 0 24 24" style="margin-right: 10px;">
                  <path d="M22.046 5.592c-.807.36-1.677.602-2.59.71a4.526 4.526 0 0 0 1.987-2.49 9.045 9.045 0 0 1-2.868 1.096 4.522 4.522 0 0 0-7.738 4.117 12.81 12.81 0 0 1-9.3-4.715 4.523 4.523 0 0 0 1.397 6.025 4.494 4.494 0 0 1-2.044-.56v.056a4.523 4.523 0 0 0 3.626 4.417 4.548 4.548 0 0 1-2.04.077 4.525 4.525 0 0 0 4.223 3.136 9.073 9.073 0 0 1-5.611 1.936c-.364 0-.718-.02-1.07-.06a12.73 12.73 0 0 0 6.912 2.026c8.322 0 12.874-6.907 12.874-12.906 0-.196-.004-.392-.013-.586a9.198 9.198 0 0 0 2.25-2.345l-.049-.02z" fill="#1DA1F2"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <path d="M22.4,4.2H1.6C0.7,4.2,0,4.9,0,5.8v12.4c0,0.9,0.7,1.6,1.6,1.6h20.8c0.9,0,1.6-0.7,1.6-1.6V5.8C24,4.9,23.3,4.2,22.4,4.2z M12,14.6L1.9,7.4v9.4L12,19.4l10.1-2.6V7.4L12,14.6z" fill="#D14836"/>
                  <path d="M12,16.2l8-2.1V5.8H4v8.3L12,16.2z M12,14.6L1.9,7.4v9.4L12,19.4l10.1-2.6V7.4L12,14.6z" fill="#FFFFFF"/>
                </svg>
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