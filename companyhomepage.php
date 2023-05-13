<html style="background-color:#36413D">
  <head>
  <title>Company Home Page</title>
  <?php
    include "head.php";
    require_once("include.php");
    require_once("DataBaseActions.php");
    $db = new DataBaseActions();
    // include "DataBaseActions.php";
    // $db = new DataBaseActions();
?>
  </head>
  <body style="background-color:#36413D">
    <!-- Titlebar -->
    <div class="flex justify-between titlebar">
      <!-- left title -->
      <div class="pt2 logoText" style="width: 300px; text-align: center">
        <span class = "pl2"><button class="bluebackground homebutton link grow bg-animate" type="button"><a href="homepage.php">LinkMe</a></button> </span><br>
        <span class="tagline">Linking Company and Creator<span>
      </div>
      <!-- Right title -->
      <div class="flex pt4">
        <div class="titletext w-100 flex" style="justify-between">
          <div class="mr2">
            <form action="userprofile.php" class="w-100" method="post">
              <input class="w-100 bluebackground link grow bg-animate" type="submit" value="Profile">
            </form>
          </div>
          <div class="mr2">
            <form action="trendingpage.php" class="w-100" method="post">
              <input class="w-100 bluebackground link grow bg-animate" type="submit" value="Trending">
            </form>
          </div>
          <div>
            <form action="index.php" class="w-100" method="post">
              <input class="w-100 mr3 bluebackground link grow bg-animate" type="submit" value="Logout">
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Body -->
    <div class="flex">
      <!--Left Profile box-->
      <div class="flex mt4 w-20 justify-center">
      </div>
      <!-- middle column -->
      <div class="w-60">
        <!-- search -->
        <div class="mt4" style="text-align: center">
          <form method="post">
    <input class= "w-70 pv3 centertext round"  type="text" name="search_query" placeholder="Search...">
    <button class="round" type="submit" name="search">Search</button>
</form>

        </div>
        <!-- profile summary -->
        <div class="container">
          <!-- First profile box (margin for first is different than the rest) -->
          <?php

          // Establish a connection to the database
        /*
          $conn = mysqli_connect("localhost", "root", "","LinkMe");
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }
          */
          if (isset($_POST['search'])) {
              $search_query = $_POST['search_query'];

              // construct SQL query

              // execute query
              $result = $db->search($search_query);

              // display results
              if ($result == true) {
                ?>
                <div class="profiletag mt3 flex flex-column yellowbackground">
                  <div class="flex flex-column w-100 h-50 pt3 topbox">
                    <div class="flex flex-row justify-around">
                      <div class="pr6 pt4 username">
                        <a href="profile.php?username=<?php echo   $search_query; ?>"><?php echo   $search_query ;?></a>
                      </div>
                    </div>
                  </div>
                </div>

            <?php
              } else {
                  echo "No results found.";
              }
          } else {

          $result = $db->getUsers();
          if ($result === false) {
                  // query failed, print error message
                  echo "Error: " . mysqli_error($conn);
          }
          if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              // Print the data you want to display
              ?>
              <div class="profiletag mt3 flex flex-column yellowbackground">
                <div class="flex flex-column w-100 h-50 pt3 topbox">
                  <div class="flex flex-row justify-around">
                    <div class="flex circle justify-center">
                      <p class="username">
                        <?php echo $row["engagement"]; ?>
                      </p>
                    </div>
                    <div class="pr6 pt4 username">
                      <a href="profile.php?username=<?php echo $row["username"]; ?>"><?php echo $row["username"];?></a>
                    </div>
                  </div>
                </div>
                <div class="flex flex-column w-100 h-25 pt1">
                  <div class="username">Statistics</div>
                </div>
                <div class="flex  flex-row w-100 h-50 justify-around topbox">
                  <div class="w-100 mediatype">YouTube
                    <div class="pt3 pl3 accountname" style="text-align:left">Username: <?php echo $row["youtube_username"]; ?></div>
                    <div class="pt3 pl3 accountname" style="text-align:left">Subscribers: <?php echo $row["youtube_follower_count"]; ?></div>
                  </div>
                  <div class="w-100 mediatype">Facebook
                    <div class="pt3 pl3 accountname" style="text-align:left">Username: <?php echo $row["facebook_username"]; ?></div>
                    <div class="pt3 pl3 accountname" style="text-align:left">Friends: <?php echo $row["facebook_follower_count"]; ?></div>
                  </div>
                  <div class="w-100 mediatype">Twitter
                    <div class="pt3 pl3 accountname" style="text-align:left">Username: <?php echo $row["twitter_username"]; ?></div>
                    <div class="pt3 pl3 accountname" style="text-align:left">Followers: <?php echo $row["twitter_follower_count"]; ?></div>
                  </div>
                </div>
              </div>
              <?php
            }
          } else {
            echo "0 results";
          }
          die();
          // Close the database connection
          //mysqli_close($conn);
        }
          ?>
        </div>

        <!-- Right side of page -->
        <div class="w-30"></div>
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
