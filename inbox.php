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
              <form action="trendingpage.php" class="w-100" method="post">
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

    <div class="flex mt4 justify-center">  
      <div class="flex w-90 yellowbackground">
        <div class="w-30">hello</div>
        <div class="w-40">hello</div>
        <div class="w-30">hello</div>
      </div>
    </div>  
  </body>
</html>