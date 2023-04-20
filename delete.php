<?php
     $sql = "CREATE TABLE IF NOT EXISTS `creator_users` 
     (firstname` varchar(255) NOT NULL,
     `lastname` varchar(255) NOT NULL,
     'username' varchar(255) NOT NULL,
     `password` varchar(255) NOT NULL,`email` varchar(255) NOT NULL)";
     $results = mysqli_query($this->conn, $sql);

     $sql = "CREATE TABLE IF NOT EXISTS `business_users` 
     (`firstname` varchar(255) NOT NULL, 
     `lastname` varchar(255) NOT NULL, 
     `businessName` varchar(255) NOT NULL,
     `role` varchar(255) NOT NULL,
     `password` varchar(255) NOT NULL,
     `email` varchar(255) NOT NULL)";
     $results = mysqli_query($this->conn, $sql);

     $sql = "CREATE TABLE IF NOT EXISTS `creator_users` (`user_id` INT NOT NULL AUTO_INCREMENT,`firstname` varchar(255) NOT NULL,`lastname` varchar(255) NOT NULL,`password` varchar(255) NOT NULL,`email` varchar(255) NOT NULL, `niche_id` INT NOT NULL,CONSTRAINT `fk_creator_users_niches` FOREIGN KEY (`niche_id`) REFERENCES `niches` (`id`), PRIMARY KEY (`user_id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
     $results = mysqli_query($this->conn, $sql);

     $sql = "CREATE TABLE IF NOT EXISTS `business_users` (`user_id` INT NOT NULL AUTO_INCREMENT,`firstname` varchar(255) NOT NULL, `lastname` varchar(255) NOT NULL, `businessName` varchar(255) NOT NULL,`role` varchar(255) NOT NULL,`password` varchar(255) NOT NULL,`email` varchar(255) NOT NULL,`niche_id` INT NOT NULL,CONSTRAINT `fk_business_users_niches` FOREIGN KEY (`niche_id`) REFERENCES `niches` (`id`), PRIMARY KEY (`user_id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
     $results = mysqli_query($this->conn, $sql);

     $sql = "INSERT INTO business_users (firstname, lastname, businessName, role, password, email)
        values ('$firstName','$lastName', '$businessName', '$role', '$password','$email', 
        (SELECT id FROM niches WHERE name = '$niche'))";
    $sql = "INSERT INTO creator_users (firstname, lastname, password, email, niche_id)
    VALUES ('$firstName', '$lastName', '$password', '$email', 
    (SELECT id FROM niches WHERE name = '$niche'))";


nclude "DataBaseActions.php";
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