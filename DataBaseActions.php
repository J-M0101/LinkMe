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

        $sql = "CREATE TABLE IF NOT EXISTS `niches` (`id` int(11) NOT NULL AUTO_INCREMENT,`name` varchar(255) NOT NULL, PRIMARY KEY (`id`))";
        $results = mysqli_query($this->conn, $sql);

        $sql = "CREATE TABLE IF NOT EXISTS `creator_users` (`user_id` INT NOT NULL AUTO_INCREMENT,`firstname` varchar(255) NOT NULL,`lastname` varchar(255) NOT NULL,`password` varchar(255) NOT NULL,`email` varchar(255) NOT NULL, `niche_id` INT NOT NULL,CONSTRAINT `fk_creator_users_niches` FOREIGN KEY (`niche_id`) REFERENCES `niches` (`id`), PRIMARY KEY (`user_id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
        $results = mysqli_query($this->conn, $sql);

        $sql = "CREATE TABLE IF NOT EXISTS `business_users` (`user_id` INT NOT NULL AUTO_INCREMENT,`firstname` varchar(255) NOT NULL, `lastname` varchar(255) NOT NULL, `businessName` varchar(255) NOT NULL,`role` varchar(255) NOT NULL,`password` varchar(255) NOT NULL,`email` varchar(255) NOT NULL,`niche_id` INT NOT NULL,CONSTRAINT `fk_business_users_niches` FOREIGN KEY (`niche_id`) REFERENCES `niches` (`id`), PRIMARY KEY (`user_id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
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
            $sql = "INSERT INTO `creator_users` (`firstname`, `lastname`, `email`, `password`, `niche_id`)
            VALUES
            ('test', 'test', 'test@gmail.com', 'asd', (SELECT `id` FROM `niches` WHERE `name` = 'fashion')),
            ('test', 'test', 'test@gmail.com', 'asd', (SELECT `id` FROM `niches` WHERE `name` = 'cooking')),
            ('test', 'test', 'test@gmail.com', 'asd', (SELECT `id` FROM `niches` WHERE `name` = 'gaming'))";
            $results = mysqli_query($this->conn, $sql);

        }
    }

    /**
     * Add business user
     */
    public function addBusiness($firstName, $lastName, $businessName, $role, $password,  $email, $niche){
        $sql = "INSERT INTO business_users (firstname, lastname, businessName, role, password, email, niche)
        values ('$firstName','$lastName', '$businessName', '$role', '$password','$email',  (SELECT id FROM niches WHERE name = '$niche'))";
        $results = mysqli_query($this->conn, $sql);

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
    public function addCreator($firstName, $lastName, $password,  $email, $niche){
        $sql = "INSERT INTO creator_users (firstname, lastname, password, email, niche_id)
            VALUES ('$firstName', '$lastName', '$password', '$email', (SELECT id FROM niches WHERE name = '$niche'))";
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
            return array("user_type" => "business", "user_id" => $row["id"]);
        } else {
            $sql = "SELECT * FROM `creator_users` WHERE `email` = '$email' AND `password` = '$password'";
            $result = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                return array("user_type" => "creator", "user_id" => $row["id"]);
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
       

}
?>
