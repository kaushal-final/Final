<?php ob_start();

try { 
    $id = filter_input(INPUT_GET, 'id');  
    require_once('connect.php');
    $sql = "DELETE FROM player WHERE player_id = :player_id;"; 
    $statement = $db->prepare($sql); 
    $statement->bindParam(':player_id', $id ); 
    $statement->execute(); 
    $statement->closeCursor();  
    header('location:view.php'); 
}
catch(PDOException $e) {
    $error_message = $e->getMessage(); 
    echo "<p> $errormessage </p>"; 
}
ob_flush(); 
?>