<?php
    session_start();

    // if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //     if(isset($_POST[""]))
    // }
?>
<html>
  <head>
  <title>Index.html</title>
  <?php
    include "head.php";
?>
  </head>
  <body>
    <div class="parentBox">
      <div class="brandName">
        <div class="mt7 ml7 pl6">
          <p class ="intro ma0">LinkMe</p>
          <p class ="bar mt0 ma0"></p>
          <p class ="tagLine ma0">Linking Company and Creator</p>
        </div>
      <div class="login mt6 pt5 pl3 mh6">
        <div class = "button mw9">
          <form action="" method="post" class="ml3 mr5 pt3 pb2">
            <label for="email"> Email:</label>
            <input class="bt-0-l br-0-l bl-0-l" type="text" name="email">
          </form>
        </div>
        <div class = "button mw9 mt4">
          <form action="" method="post" class="ml3 mr5 pt3 pb2">
            <label for="password"> password:</label>
            <input class="bt-0-l br-0-l bl-0-l" type="text" name="password">
          </form>
        </div>
        <div class = "button mw9 mt4">
          <form action="" method="post" class="ml3 mr5 pt3 pb2">
            <label for="password"> password:</label>
            <button class="bt-0-l br-0-l bl-0-l" type="text" name="password">
          </form>
        </div>
      </div>
      </div>
    </div>
  </body>
</html>
