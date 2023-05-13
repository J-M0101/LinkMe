<?php
require_once("include.php");

class DataBaseActions extends Exception{
    public $conn;
    public static string $dbname = 'LinkMe';

    /**
     * connect to database
     */
    public function __construct()
    {
        $this->conn = mysqli_connect("localhost","root","");
        if (!$this->conn)
        {
            die('Could not connect: ' . mysqli_connect_error());
        }
        if (mysqli_num_rows(mysqli_query($this->conn,"SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '". DataBaseActions::$dbname ."'"))) {
            $this->conn = mysqli_connect("localhost", "root", "", DataBaseActions::$dbname);
        } else {
            $this->createTheDB();
            $this->conn = mysqli_connect("localhost", "root", "", DataBaseActions::$dbname);
            if(!$this->conn){ //check connection
                die("Connection fails: " . mysqli_connect_error());
            }
        }
    }

    /**
     * Creates a database
     */
    public function createTheDB(){
        $this->conn = mysqli_connect("localhost","root","");
        mysqli_query($this->conn,"CREATE DATABASE ". DatabaseActions::$dbname);
        $this->conn = mysqli_connect("localhost", "root", "", DataBaseActions::$dbname);

        $sql = "CREATE TABLE IF NOT EXISTS `niches`
        (`id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(255) NOT NULL, PRIMARY KEY (`id`))";
        $results = mysqli_query($this->conn, $sql);

        $sql = "CREATE TABLE IF NOT EXISTS `YouTube`
        (`youtube_username` varchar(255) NOT NULL,
        `link` varchar(255) NOT NULL,
        `follower_count` varchar(255) NOT NULL)";
        $results = mysqli_query($this->conn, $sql);

        $sql = "CREATE TABLE IF NOT EXISTS `Facebook`
        (`facebook_username` varchar(255) NOT NULL,
        `link` varchar(255) NOT NULL,
        `follower_count` varchar(255) NOT NULL)";
        $results = mysqli_query($this->conn, $sql);

        $sql = "CREATE TABLE IF NOT EXISTS `Twitter`
        (`twitter_username` varchar(255) NOT NULL,
        `link` varchar(255) NOT NULL,
        `follower_count` varchar(255) NOT NULL)";
        $results = mysqli_query($this->conn, $sql);


        //temp deleted niche
        $sql = "CREATE TABLE IF NOT EXISTS `creator_users`
        (`firstname` varchar(255) NOT NULL,
        `lastname` varchar(255) NOT NULL,
        `password` varchar(255) NOT NULL,
        `email` varchar(255) NOT NULL UNIQUE,
        `niche_id` varchar(255),
        `engagement` varchar(255),
        `username` varchar(255) NOT NULL UNIQUE,
        `youtube_username` varchar(255) UNIQUE,
        `facebook_username` varchar(255) UNIQUE,
        `twitter_username` varchar(255) UNIQUE,
        `facebook_follower_count` varchar(255),
        `twitter_follower_count` varchar(255),
        `youtube_follower_count` varchar(255),
        `bio` varchar(1000))
        ";
        $results = mysqli_query($this->conn, $sql);

        $sql = "CREATE TABLE IF NOT EXISTS `business_users`
        (`firstname` varchar(255) NOT NULL,
        `lastname` varchar(255) NOT NULL,
        `company` varchar(255) NOT NULL,
        `role` varchar(255) NOT NULL,
        `password` varchar(255) NOT NULL,
        `email` varchar(255) NOT NULL UNIQUE)
        ";
        $results = mysqli_query($this->conn, $sql);

        if ($result = mysqli_query($this->conn, $sql)) {
            // array of niches to be inserted
            $niches = ['fashion', 'cooking', 'gaming'];

            // loop through each niche and insert it into the niches table
            foreach ($niches as $niche) {
                $sql = "INSERT INTO `niches` (`name`) VALUES ('$niche')";
                $result = mysqli_query($this->conn, $sql);

                if (!$result) {
                    echo "Error inserting niche $niche: " . mysqli_error($this->conn) . "\n";
                }
            }

            //adding user with 3 niche

            $sql = "INSERT INTO `creator_users` (`firstname`, `lastname`, `email`, `password`, `username`, `engagement`, `niche_id`, `youtube_username`, `facebook_username`, `twitter_username`, `facebook_follower_count`, `twitter_follower_count`, `youtube_follower_count`,`bio`)
            VALUES
            ('test1', 'test1', 'test1@gmail.com', '1234', 'name1','7.6',(SELECT `id` FROM `niches` WHERE `name` = 'fashion'), 'youtube1', 'facebook1', 'twitter1', '1102', '1231', '1502', 'This is test1s bio!'),
            ('Megan', 'Bailey', 'megan.bailey1234@example.com', '1234', 'meganb','5.6', 'fitness', 'megan_fit', 'fit_megan', 'megfit', 23456, 89012, 78451, 'Fitness enthusiast and health coach. Passionate about helping others achieve their fitness goals.'),
            ('Samantha', 'Reyes', 'samantha.reyes1234@example.com', '1234', 'samanthar','9.5', 'beauty', 'samantha_beauty', 'beauty_by_sam', 'samsbeauty', 12345, 23456, 56789, 'Makeup artist and beauty blogger. Sharing tips and tricks for achieving flawless looks.'),
            ('Jared', 'Gonzalez', 'jared.gonzalez1234@example.com', '1234', 'jaredg','3.2', 'travel', 'jared_travel', 'globe_trotter', 'jaredeyetravel', 45678, 23456, 98765, 'Travel addict and adventure seeker. Sharing stories and photos from my trips around the world.'),
            ('Isabella', 'Phillips', 'isabella.phillips1234@example.com', '1234', 'isabellap','4.6', 'food', 'isabella_foodie', 'yum_isabella', 'foodie_isa', 23456, 78901, 34567, 'Food lover and recipe developer. Sharing delicious and healthy meals for any occasion.'),
            ('Connor', 'Bryant', 'connor.bryant1234@example.com', '1234', 'connorb','7.2', 'art', 'connor_photos', 'snapconnor', 'bryant_photography', 45678, 12345, 23456, 'Photographer and visual storyteller. Capturing the beauty of the world through my lens.'),
            ('Olivia', 'Price', 'olivia.price1234@example.com', '1234', 'oliviah','5.8', 'fashion', 'olivia_fashion', 'fashionista_olivia', 'oliviastyle', 67890, 12345, 78901, 'Fashion lover and style influencer. Sharing my favorite looks and trends.'),
            ('Brandon', 'Collins', 'brandon.collins1234@example.com', '1234', 'brandonc','2.7', 'music', 'brandon_music', 'musicbybrandon', 'brandon_collins', 12345, 56789, 90123, 'Musician and songwriter. Sharing my original songs and covers of my favorite artists.'),
            ('Natalie', 'Mitchell', 'natalie.mitchell1234@example.com', '1234', 'nataliem','8.3', 'fitness', 'natalie_fitness', 'fitnat', 'mitchell_fit', 89012, 34567, 90123, 'Fitness coach and wellness enthusiast. Helping others live a healthy and balanced lifestyle.'),
            ('David', 'Baker', 'david.baker1234@example.com', '1234', 'davidb','5.5', 'photos', 'david_photography', 'daveyephotography', 'baker_visuals', 45678, 90123, 78901, 'Photographer and videographer. Capturing the beauty of nature and the world around us.'),
            ('Avery', 'Sanchez', 'avery.sanchez1234@example.com', '1234', 'averys','8.9', 'food', 'avery_foodie', 'yum_avery', 'sanchez_kitchen', 56789, 34567, 23440, 'I loveeeee fooood!'),
            ('Jessica', 'Smith', 'jessica.smith5678@example.com', '5678', 'jessicas','6.3', 'videos', 'jessica_films', 'jessicasmith_visuals', 'jess_visuals', 78901, 23456, 12345, 'Cinematographer specializing in wedding and event videography. Bringing your special moments to life on screen.'),
            ('Emily', 'Clark', 'emily.clark1234@example.com', '1234', 'emilyc', '5.5', 'videos', 'emily_films', 'clark_visuals', 'emilyclarkvideography', 45678, 90123, 78901, 'Videographer specializing in event and commercial videography. Capturing the essence of every occasion on film.'),
            ('Jacob', 'Taylor', 'jacob.taylor5678@example.com', '5678', 'jacobt', '6.3', 'photos', 'jacob_photo', 'taylor_visuals', 'jacobtaylorphotography', 78901, 23456, 12345, 'Professional photographer specializing in portrait and fashion photography. Creating timeless images that capture the beauty of the human form.'),
            ('Ava', 'Anderson', 'ava.anderson1234@example.com', '1234', 'avaa', '5.8', 'videos', 'ava_films', 'anderson_visuals', 'avavideography', 45678, 90123, 78901, 'Creative videographer specializing in music videos and short films. Turning dreams into reality, one shot at a time.'),
            ('Ethan', 'Wilson', 'ethan.wilson5678@example.com', '5678', 'ethanw', '6.1', 'photos', 'ethan_photo', 'wilson_visuals', 'ethanwilsonphotography', 78901, 23456, 12345, 'Professional photographer specializing in wedding and engagement photography. Capturing the magic of love in every frame.'),
            ('Olivia', 'Parker', 'olivia.parker1234@example.com', '1234', 'oliviap', '5.5', 'videos', 'olivia_films', 'parker_visuals', 'oliviaparkervideography', 45678, 90123, 78901, 'Talented videographer specializing in promotional videos and commercials. Helping businesses bring their vision to life on screen.'),
            ('William', 'Martin', 'william.martin5678@example.com', '5678', 'willm', '6.3', 'photos', 'william_photo', 'martin_visuals', 'williammartinphotography', 78901, 23456, 12345, 'Professional photographer specializing in sports and action photography. Capturing the excitement and energy of athletes in motion.'),
            ('Sophia', 'Garcia', 'sophia.garcia1234@example.com', '1234', 'sophiag', '5.5', 'videos', 'sophia_films', 'garcia_visuals', 'sophiagarciafilms', 45678, 90123, 78901, 'Experienced videographer specializing in travel and adventure videography. Bringing the world to life on screen.'),
            ('Benjamin', 'Lee', 'benjamin.lee5678@example.com', '5678', 'benl', '6.3', 'photos', 'benjamin_photo', 'lee_visuals', 'benjaminleephotography', 78901, 23456, 12345, 'Professional photographer specializing in commercial and product photography. Helping businesses showcase their products in the best possible light.')";
            $results = mysqli_query($this->conn, $sql);


            $sql = "INSERT INTO `business_users` (`firstname`, `lastname`, `company`, `role`, `password`, `email`)
            VALUES
            ('test1', 'test1','Roku','Marketing Manager','1234', 'Roku@gmail.com'),
            ('John', 'Doe', 'Acme Corporation', 'Marketing Manager', '555-1234', 'johndoe@acmecorp.com'),
            ('Amy', 'Johnson', 'XYZ Inc', 'Sales Manager', '555-5678', 'amyjohnson@xyzinc.com'),
            ('David', 'Chen', 'ABC Company', 'HR Director', '555-4321', 'davidchen@abccompany.com'),
            ('Sarah', 'Lee', 'MNO Enterprises', 'Marketing Coordinator', '555-8765', 'sarahlee@mnoenterprises.com'),
            ('Michael', 'Nguyen', 'PQR Corp', 'IT Manager', '555-9876', 'michaelnguyen@pqrcorp.com'),
            ('Stephanie', 'Kumar', 'LMN Industries', 'Finance Director', '555-5555', 'stephaniekumar@lmnindustries.com'),
            ('Jonathan', 'Wang', 'JKL Co', 'Operations Manager', '555-2468', 'jonathanwang@jklco.com'),
            ('Lauren', 'Tan', 'UVW Solutions', 'Project Coordinator', '555-1357', 'laurentan@uvwsolutions.com'),
            ('William', 'Ng', 'EFG Inc', 'Product Manager', '555-3691', 'williamng@efginc.com'),
            ('Amanda', 'Gupta', 'HIJ Corporation', 'Marketing Analyst', '555-7777', 'amandagupta@hijcorp.com'),
            ('Eric', 'Kim', 'NOP Industries', 'Sales Director', '555-2468', 'erickim@nopindustries.com'),
            ('Jennifer', 'Tran', 'STU Corp', 'Finance Analyst', '555-6789', 'jennifertran@stucorp.com'),
            ('Christopher', 'Liu', 'VWX Enterprises', 'IT Director', '555-3456', 'christopherliu@vwxenterprises.com'),
            ('Melissa', 'Park', 'GHI Co', 'Operations Coordinator', '555-8901', 'melissapark@ghico.com'),
            ('Matthew', 'Kwok', 'DEF Corporation', 'Sales Analyst', '555-2109', 'matthewkwok@defcorp.com'),
            ('Emily', 'Garcia', 'QRS Solutions', 'Marketing Director', '555-4444', 'emilygarcia@qrssolutions.com'),
            ('Joshua', 'Wu', 'BCD Industries', 'Project Manager', '555-9632', 'joshuawu@bcdindustries.com'),
            ('Megan', 'Huang', 'PQR Enterprises', 'HR Coordinator', '555-7890', 'meganhuang@pqrenterprises.com'),
            ('Kevin', 'Chang', 'XYZ Corp', 'Product Analyst', '555-1470', 'kevinchang@xyzcorp.com'),
            ('Sophia', 'Zhang', 'LMN Co', 'Marketing Coordinator', '555-3210', 'sophiazhang@lmnco.com'),
            ('Daniel', 'Lau', 'JKL Enterprises', 'Operations Analyst', '555-7539', 'daniellau@jklenterprises.com')";
            $results = mysqli_query($this->conn, $sql);

        }
    }

    /**
     * Add business user
     */
    public function addBusiness($firstname, $lastname, $company, $role, $password, $email){
        $sql = "INSERT INTO business_users (firstname, lastname, company, role, password, email)
        VALUES('$firstname','$lastname', '$company', '$role', '$password','$email')";

        $results = mysqli_query($this->conn, $sql);

        //checking for error
        if (!$results) {
            die('Error executing query: ' . mysqli_error($this->conn));
        }

        if ($results) {
            $userId = mysqli_insert_id($this->conn);
            return $userId;
          } else {
            return false;
          }
    }
    //get business user

    /**
     * Add creator
     */
    public function addCreator($firstName, $lastName, $password,  $email, $username){
        $sql = "INSERT INTO creator_users (firstname, lastname, password, email, username)
        VALUES ('$firstName', '$lastName', '$password', '$email', '$username')";

        $results = mysqli_query($this->conn, $sql);

        if ($results) {
            $userId = mysqli_insert_id($this->conn);
            return $userId;
          } else {
            return false;
          }
    }

    /**
     * Get creator user using niche
     */
    public function getCreatorNiche($niche){
        $sql = "SELECT * FROM creator_users WHERE niche_id = (SELECT id FROM niches WHERE name = '$niche')";
        $results = mysqli_query($this->conn, $sql);

        if(mysqli_num_rows($results) > 0){
            $users = array();
            while($row = mysqli_fetch_assoc($results)){
                $users[] = $row;
            }
            return $users;
        }
        else{
            return false;
        }
    }

    /**
     *  log in with email and password
     */
    public function login($email, $password){
        $sql = "SELECT * FROM `business_users` WHERE `email` = '$email' AND `password` = '$password'";
        $result = mysqli_query($this->conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return array("user_type" => "business", "user_id" => $row["user_id"]);
        } else {
            $sql = "SELECT * FROM `creator_users` WHERE `email` = '$email' AND `password` = '$password'";
            $result = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                return array("user_type" => "creator", "user_id" => $row["user_id"]);
            }
        }
        return null;
    }

    /**
     * Checks if email is unique
     */
    public function emailIsUnique($email){
        $sql = "SELECT * FROM business_users WHERE email = '$email' ";
        $result = mysqli_query($this->conn, $sql);
        //checking for error
        if (!$result) {
            die('Error executing query: ' . mysqli_error($this->conn));
        }

        if(mysqli_num_rows($result) > 0) {
            return false;
        }else{
            $sql = "SELECT * FROM creator_users WHERE email = '$email' ";
            $result = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($result) > 0) {
                return false;
            }
        }
        return true;
    }

    public function getUser($username){
        $sql = $sql = "SELECT * FROM creator_users WHERE username = '$username' ";
        $result = mysqli_query($this->conn, $sql);
        //checking for error
        if (!$result) {
            die('Error executing query: ' . mysqli_error($this->conn));
        }
        return $result;
    }

    public function getYoutube($username){
        $sql = $sql = "SELECT * FROM YouTube WHERE youtube_username = '$username' ";
        $result = mysqli_query($this->conn, $sql);
        //checking for error
        if (!$result) {
            die('Error executing query: ' . mysqli_error($this->conn));
        }
        return $result;
    }

    public function getUsers(){
        $sql = "SELECT * FROM creator_users";
        $result = mysqli_query($this->conn, $sql);
        //checking for error
        if (!$result) {
            die('Error executing query: ' . mysqli_error($this->conn));
        }
        return $result;
    }



    /**
     * Checks if creator's username is unique
     */
    public function usernameIsUnique($username){
        $sql = "SELECT * FROM creator_users WHERE username = '$username' ";
        $result = mysqli_query($this->conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            return false;
        }
        return true;
    }

    public function search($search_query){
      $sql = "SELECT * FROM creator_users WHERE username = '$search_query' ";
      $result = mysqli_query($this->conn, $sql);
      if(mysqli_num_rows($result) == 1) {
          return true;
      }
      return false;
    }

    public function socialMediaButton($email,$social_media){
        //generate random numbers of followers
        $follower_count = rand(1000, 500000);

        //make link
        $link = $social_media . ".com";

        // Define an array of random names
        $names = array("John", "Mary", "Peter", "Alice", "Bob");

        // Choose a random name from the array
        $username = $names[array_rand($names)];


        //email -> find all info --> update the user


        if ($social_media == "Youtube") {
            //update creator_user
            //add to table
            $sql = "INSERT INTO Youtube (youtube_username, link, follower_count)
            VALUES ('$username', '$link', '$follower_count')";
        }elseif ($social_media == "Instagram"){
            $sql = "INSERT INTO Youtube (instagram_username, link, follower_count)
            VALUES ('$username', '$link', '$follower_count')";
        }elseif ($social_media == "Twitter"){
            $sql = "INSERT INTO Twitter (twitter_username, link, follower_count)
            VALUES ('$username', '$link', '$follower_count')";
        }


        $results = mysqli_query($this->conn, $sql);

    }



}
?>