<?php
require_once ('header.php');

// Include config file
require_once "connect.php";
$password = trim($_POST["password"]);
$confirm_password = trim($_POST["confirm_password"]);
$username = trim($_POST["username"]);
 

    
    if(!empty($username) && !empty($password) && $confirm_password == $password){
        
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
         
        if($stmt = $db->prepare($sql)){
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            
            if($stmt->execute()){
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
    }
    else {
        echo "<p> Please provide login name and password! </p>";
    }
    
    // Close connection
    $stmt->closeCursor(); 


require_once ('footer.php');
?>
