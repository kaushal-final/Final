<?php 

require_once('connect.php');

//define a flag variable 
$ok = true; 

// grab the information from the form and also validate 

$uname = trim(filter_input(INPUT_POST, 'username')); 
$upassword = trim(filter_input(INPUT_POST, 'password'));

if(empty($uname)) {
    echo "<p> Please provide your username! </p>"; 
    $ok = false; 
}
if(empty ($upassword)){
    echo "<p> Please provide your password! </p>"; 
    $ok = false; 
}

if($ok === true ) {
    $sql = "SELECT id, username, password FROM users WHERE username = :username";  
    $stmt = $db->prepare($sql); 
    $stmt->bindParam(":username", $uname); 
    $stmt->execute(); 
    if($stmt->rowCount() == 1){
        if($row = $stmt->fetch()) { 
            if(password_verify($upassword, $row["password"])) {
                session_start();  
                $_SESSION["id"] = $row["id"];
                $_SESSION["username"] = $row["username"];  
                header("location:view.php"); 
            }
            else {
                echo "<p> Problem validating your password!</p>"; 
            }
        }
        else {
            echo "<p> Error accessing your data!</p>";  
        }
    }
    else {
        echo "<p> No user found!</p>"; 
    } 
}
else {
    echo "<p> Sorry something went wrong! </p>"; 
}
//close database connection
$stmt->closeCursor();
?>
