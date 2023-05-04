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



        //temp deleted niche
        $sql = "CREATE TABLE IF NOT EXISTS `creator_users`
        (`firstname` varchar(255) NOT NULL,
        `lastname` varchar(255) NOT NULL,
        `password` varchar(255) NOT NULL,
        `email` varchar(255) NOT NULL UNIQUE,
        `niche_id` varchar(255) UNIQUE,
        `username` varchar(255) NOT NULL UNIQUE,
        `youtube_username` varchar(255) UNIQUE,
        `facebook_username` varchar(255) UNIQUE,
        `twitter_username` varchar(255) UNIQUE,
        `youtube_link` varchar(255),
        `youtube_count` varchar(255)),
        `instagram_link` varchar(255),
        `instagram_count` varchar(255),
        `twitter_link` varchar(255),
        `twitter_count` varchar(255))
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

            $sql = "INSERT INTO `creator_users` (`firstname`, `lastname`, `email`, `password`, `username`, `niche_id`, `youtube_username`, `facebook_username`, `twitter_username`)
            VALUES
            ('test1', 'test1', 'test1@gmail.com', 'asd', 'name1',(SELECT `id` FROM `niches` WHERE `name` = 'fashion'), 'youtube1', 'facebook1', 'twitter1', NULL, NULL, NULL, NULL,NULL,NULL),
            ('test2', 'test2', 'test2@gmail.com', 'asd', 'name2',(SELECT `id` FROM `niches` WHERE `name` = 'cooking'), 'youtube2', 'facebook2', 'twitter2',NULL, NULL, NULL, NULL,NULL,NULL),
            ('test3', 'test3', 'test3@gmail.com', 'asd', 'name3', (SELECT `id` FROM `niches` WHERE `name` = 'gaming'), 'youtube3', 'facebook3', 'twitter3',NULL, NULL, NULL, NULL,NULL,NULL)";
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

    public function socialMediaButton($social_media){
        //generate random numbers of followers
        $follower_count = rand(1000, 500000);

        //make link
        $link = $social_media . ".com";

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

}
?>
