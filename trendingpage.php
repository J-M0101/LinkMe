<html style="background-color:#36413D">
  <head>
  <title>Trending Page</title>
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
<div class="flex justify-center">

  <!-- Middle Column -->
  <div class="w-40">
    <!-- Profile Summary -->
    <div class="pv6 yellowbackground w-100 relative">
      
      <!-- Profile Header -->
      <div class="profile-header absolute top-1 left-2 w-90 flex justify-between items-center pv1">
        <div>For You</div>
        <div>Trending</div>
        <div>Top Engagement</div>
        <div>Filter By</div>
        <!-- Line below the header -->
        <div class="bt b--black absolute bottom-0 left-0 w-100"></div>
      </div>
    </div>
  </div>
</div>
  </body>
</html>