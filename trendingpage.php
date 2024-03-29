<html style="background-color:#36413D">
  <head>
  <title>Trending Page</title>
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
              <a href="profile.php?username=davidb"> <input class="w-100 bluebackground link grow bg-animate" type="button" value="Profile"></a>
            </form>
          </div>
          <div class="mr2">
            <form action="companyhomepage.php" class="w-100" method="post">
              <input class="w-100 bluebackground link grow bg-animate" type="submit" value="Companies">
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
    <div class="flex mt5 justify-center h-100">
      <!-- middle column -->
      <div class="w-60">
        <!-- profile summary -->
        <div class="flex h-85 mt4 justify-center">  
          <div class="flex w-90 justify-center pt3 pr3 pl3 pb3 yellowbackground">
            <div class="w-33 flex-column">
              <div class="bb bw1">For You</div>
                <div class="pt3 containerOne">
                  <?php
                    // construct SQL query
                    if (isset($_POST['search'])) {
                        $search_query = $_POST['search_query'];

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
                        <div>
                          <div class="pt4 companyname">
                            <a href="profile.php?username=<?php echo $row["username"]; ?>"><?php echo $row["username"];?></a>
                          </div>
                        </div>
                        <?php
                      }
                    } else {
                      echo "0 results";
                    };
                  }
                  ?>
                </div>
            </div>
            <div class="w-33 flex-column">
              <div class="bb bw1">Trending</div>
                <div class="pt3 containerOne">
                <?php

                  // construct SQL query
                  if (isset($_POST['search'])) {
                      $search_query = $_POST['search_query'];

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
                      <div>
                        <div class="pt4 companyname">
                                <?php echo $row["niche_id"];?>
                        </div>
                      </div>
                      <?php
                    }
                  } else {
                    echo "0 results";
                  };
                  }
                ?>
                </div>
            </div>
            <div class="w-40 flex-column">
              <div class="bb bw1">Top engagement</div>
                <div class="pt3 containerOne">
                <?php

                  // construct SQL query
                  if (isset($_POST['search'])) {
                      $search_query = $_POST['search_query'];

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
                      <div>
                        <div class="pt4 companyname">
                          <a href="profile.php?username=<?php echo $row["username"]; ?>"><?php echo $row["twitter_username"];?></a>
                        </div>
                      </div>
                      <?php
                    }
                  } else {
                    echo "0 results";
                  };
                  }
                ?>
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