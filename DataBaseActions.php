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

<<<<<<< HEAD
=======
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
>>>>>>> d82336d8d83a7bbfe56711677ed4e4c1c63855cf


        //temp deleted niche
        $sql = "CREATE TABLE IF NOT EXISTS `creator_users`
        (`firstname` varchar(255) NOT NULL,
        `lastname` varchar(255) NOT NULL,
        `password` varchar(255) NOT NULL,
        `email` varchar(255) NOT NULL UNIQUE,
        `niche_id` varchar(255),
        `username` varchar(255) NOT NULL UNIQUE,
        `youtube_username` varchar(255) UNIQUE,
        `facebook_username` varchar(255) UNIQUE,
        `twitter_username` varchar(255) UNIQUE,
<<<<<<< HEAD
        `youtube_link` varchar(255),
        `youtube_count` varchar(255)),
        `instagram_link` varchar(255),
        `instagram_count` varchar(255),
        `twitter_link` varchar(255),
        `twitter_count` varchar(255))
=======
        `facebook_follower_count` varchar(255),
        `twitter_follower_count` varchar(255),
        `youtube_follower_count` varchar(255),
        `bio` varchar(1000))
>>>>>>> d82336d8d83a7bbfe56711677ed4e4c1c63855cf
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

            $sql = "INSERT INTO `creator_users` (`firstname`, `lastname`, `email`, `password`, `username`, `niche_id`, `youtube_username`, `facebook_username`, `twitter_username`, `facebook_follower_count`, `twitter_follower_count`, `youtube_follower_count`,`bio`)
            VALUES
<<<<<<< HEAD
            ('test1', 'test1', 'test1@gmail.com', 'asd', 'name1',(SELECT `id` FROM `niches` WHERE `name` = 'fashion'), 'youtube1', 'facebook1', 'twitter1', NULL, NULL, NULL, NULL,NULL,NULL),
            ('test2', 'test2', 'test2@gmail.com', 'asd', 'name2',(SELECT `id` FROM `niches` WHERE `name` = 'cooking'), 'youtube2', 'facebook2', 'twitter2',NULL, NULL, NULL, NULL,NULL,NULL),
            ('test3', 'test3', 'test3@gmail.com', 'asd', 'name3', (SELECT `id` FROM `niches` WHERE `name` = 'gaming'), 'youtube3', 'facebook3', 'twitter3',NULL, NULL, NULL, NULL,NULL,NULL)";
=======
            ('test1', 'test1', 'test1@gmail.com', '1234', 'name1',(SELECT `id` FROM `niches` WHERE `name` = 'fashion'), 'youtube1', 'facebook1', 'twitter1', '1102', '1231', '1502', 'This is test1s bio!'),
            ('Megan', 'Bailey', 'megan.bailey1234@example.com', '1234', 'meganb', 'fitness', 'megan_fit', 'fit_megan', 'megfit', 23456, 89012, 78451, 'Fitness enthusiast and health coach. Passionate about helping others achieve their fitness goals.'),
('Samantha', 'Reyes', 'samantha.reyes1234@example.com', '1234', 'samanthar', 'beauty', 'samantha_beauty', 'beauty_by_sam', 'samsbeauty', 12345, 23456, 56789, 'Makeup artist and beauty blogger. Sharing tips and tricks for achieving flawless looks.'),
('Jared', 'Gonzalez', 'jared.gonzalez1234@example.com', '1234', 'jaredg', 'travel', 'jared_travel', 'globe_trotter', 'jaredeyetravel', 45678, 23456, 98765, 'Travel addict and adventure seeker. Sharing stories and photos from my trips around the world.'),
('Isabella', 'Phillips', 'isabella.phillips1234@example.com', '1234', 'isabellap', 'food', 'isabella_foodie', 'yum_isabella', 'foodie_isa', 23456, 78901, 34567, 'Food lover and recipe developer. Sharing delicious and healthy meals for any occasion.'),
('Connor', 'Bryant', 'connor.bryant1234@example.com', '1234', 'connorb', 'art', 'connor_photos', 'snapconnor', 'bryant_photography', 45678, 12345, 23456, 'Photographer and visual storyteller. Capturing the beauty of the world through my lens.'),
('Olivia', 'Price', 'olivia.price1234@example.com', '1234', 'oliviap', 'fashion', 'olivia_fashion', 'fashionista_olivia', 'oliviastyle', 67890, 12345, 78901, 'Fashion lover and style influencer. Sharing my favorite looks and trends.'),
('Brandon', 'Collins', 'brandon.collins1234@example.com', '1234', 'brandonc', 'music', 'brandon_music', 'musicbybrandon', 'brandon_collins', 12345, 56789, 90123, 'Musician and songwriter. Sharing my original songs and covers of my favorite artists.'),
('Natalie', 'Mitchell', 'natalie.mitchell1234@example.com', '1234', 'nataliem', 'fitness', 'natalie_fitness', 'fitnat', 'mitchell_fit', 89012, 34567, 90123, 'Fitness coach and wellness enthusiast. Helping others live a healthy and balanced lifestyle.'),
('David', 'Baker', 'david.baker1234@example.com', '1234', 'davidb', 'photos', 'david_photography', 'daveyephotography', 'baker_visuals', 45678, 90123, 78901, 'Photographer and videographer. Capturing the beauty of nature and the world around us.'),
('Avery', 'Sanchez', 'avery.sanchez1234@example.com', '1234', 'averys', 'food', 'avery_foodie', 'yum_avery', 'sanchez_kitchen', 56789, 34567, 23440, 'I loveeeee fooood!')";
>>>>>>> d82336d8d83a7bbfe56711677ed4e4c1c63855cf
            $results = mysqli_query($this->conn, $sql);

        }
    }

    /**
     * Add business user
     */
    public function addBusiness($firstname, $lastname, $company, $role, $password, $email){
        $sql = "INSERT INTO business_users (firstname, lastname, company, role, password, email)
        values ('$firstname','$lastname', '$company', '$role', '$password','$email')";

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
        //what this do
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

<<<<<<< HEAD
    public function socialMediaButton($social_media){
=======
    public function search($search_query){
      $sql = "SELECT * FROM creator_users WHERE username = '$search_query' ";
      $result = mysqli_query($this->conn, $sql);
      if(mysqli_num_rows($result) == 1) {
          return true;
      }
      return false;
    }

    public function socialMediaButton($email,$social_media){
>>>>>>> d82336d8d83a7bbfe56711677ed4e4c1c63855cf
        //generate random numbers of followers
        $follower_count = rand(1000, 500000);

        //make link
        $link = $social_media . ".com";

<<<<<<< HEAD
        if ($social_media == "YouTube") {
            $sql = "UPDATE creator_users SET  youtube_count='$follower_count' WHERE email='test1@gmail.com'";
        }elseif ($social_media == "Facebook"){
            $sql = "UPDATE creator_users SET  facebook_count='$follower_count' WHERE email='test1@gmail.com'";
        }elseif ($social_media == "Twitter"){
            $sql = "UPDATE creator_users SET twitter_count='$follower_count' WHERE email='test1@gmail.com'";
        }
        $results = mysqli_query($this->conn, $sql);

    }
    
    public function getScore(){
        $score = rand(0, 9) . rand(0, 9);
        return $score;
    }
=======
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


>>>>>>> d82336d8d83a7bbfe56711677ed4e4c1c63855cf

}
?>
