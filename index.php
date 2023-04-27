<?php
    session_start();

    include "DataBaseActions.php";
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    error_reporting(E_ALL ^ E_WARNING);
    //checks if user is logged on
    $db = new DataBaseActions();
    if (isset($_SESSION['user_id'])) {

      header('Location: companyinfo.php');
      exit();
    }
?>
<html>
  <head>
  <title>Home Page</title>
  <?php
    include "head.php";
?>

  </head>
  <body>
    <div class="page items-center justify-center flex-column"> <!-- Used for display flex. helps to align boxes on pages to parent -->
      <div class="flex align-column statusmessage">
        <?php
          if(isset($_POST["submit"])){
            if(!empty($_POST['email']) && !empty($_POST['password'])) {
              $email = $_POST['email'];
              $password = $_POST['password'];
              $user_info = $db->login($email, $password);
              if ($user_info == null) {
                echo "Login Failed";
              } else {
                header("Location: homepage.php", true, 301);
                exit();
              }
            }
          }
        ?>
      </div>
      <div class="flex items-center ml7">
        <div class="mb6 mr6"> <!--sets a display box for all company name and title-->
          <a href = "index.php" class ="intro ma0 grow dib f3-ns no-underline">LinkMe</a>
          <p class ="bar ma0"></p>
          <p class ="tagLine ma1">Linking Company and Creator</p>
        </div>
        <div class="flex"> <!--display box that holds the email password and submit button-->
          <form action="" method="POST" class="ml3 mr5 pt3 w-100">
            <div class="flex items-center button mw9 pv2 ph3"><!--display box holds email input-->
                <label class="sizeOf" for="email"> Email:</label>
                <input class="w-100" type="text" name="email">
            </div>
            <div class="flex items-center button mw9 mt4 pv2 ph3"><!--display box holds password input-->
                <label class="sizeOf" for="password"> password:</label>
                <input class="pr6 w-100" type="password" name="password">
            </div>
            <div class="mt4 flex justify-center"><!--display box holds login button-->
                <input class=" w-100 pv3 ma0 bckColor grow dib f3-ns no-underline black pv2 db bg-animate hover-bg-yellow" type="submit" value="Login" name="submit">
            </div>

            <div>
            <p class ="bar1 mt3"></p>
            </div>

            <div class="flex justify-center"><!-- display box holds Create account button-->
                <a href = "creatorcompany.php" class=" button ph5 pv3 ma0 bckColorCreateAccount grow dib f3-ns no-underline black pv2 db bg-animate hover-bg-yellow buttoncolor">Create Accout</a>
            </div>

            <div class="flex justify-center pt3"><!-- display box holds Forgot Password button-->
                <a href = "passwordreset.php" class="bn bluebutton grow dib f3-ns no-underline">Forgot Password?</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="page justify-around">
      <div class="greybackground flex w-50 pa5 mr6 mb7 grow dib f3-ns no-underline black pv2 db bg-animate hover-bg-yellow" style="text-align: left; font-size: 24px; font-family: Arial;">
          <p class = "w-100">Welcome to our platform, the premier community-driven marketplace that connects content creators with brands for sponsored opportunities. Our platform was designed to simplify the process of finding and collaborating with the perfect creator for your brand, and to empower content creators to monetize their content creation. We believe in fostering strong relationships between brands and creators and are committed to making the process more efficient, authentic, and impactful.</p>
      </div>
      <div class="yellowbackground flex w-50 pa5 ml6 mt7 grow dib f3-ns no-underline black pv2 db bg-animate hover-bg-yellow" style="text-align: left; font-size: 24px; font-family: Arial;">
          <p class = "w-100">Our platform provides a variety of tools and features to help creators find partnerships. We connect creators with sponsored opportunities from many brands, and provide discoverability for their unique talents and voice. Brands can find and collaborate with carefully vetted creators to create authentic and impactful content collaborations. Our platform values creativity, transparency, and inclusivity, and we believe that empowering these authentic partnerships is essential to creating meaningful content that resonates with audiences.</p>
      </div>
    </div>
    <div class="page w-100 justify-center pt6 mb6">
      <div class="flex ba align-center items-center justify-center w-50 pa5 ml6 round" style="text-align: left; font-size: 24px; font-family: Arial;">
      <p class = "w-100">We believe that by fostering a community of creators and brands, we can create a positive impact on the content creation industry. We believe that every creator has the potential to create unique and impactful content, and every brand can find the right creator to work with. Join our community today and start creating meaningful content collaborations!</p>
      </div>
    </div>
    <footer class ="w-100 footer">
      <div class ="pa4 pb7">
        check
      </div>
    </footer>
  </body>
</html>
