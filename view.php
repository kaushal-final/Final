<?php require_once('auth.php'); ?>
<?php require_once('header.php'); ?>
<body class="view">
<div class="container inner">
<?php require_once('navigation.php'); ?>
    <?php
    try {
    //connect to our db 
    require_once('connect.php'); 

    //set up SQL statement 
    $sql = "SELECT * FROM player;"; 

    //prepare the query 
    $statement = $db->prepare($sql);

    //execute 
    $statement->execute(); 

    $records = $statement->fetchAll(); 

    echo "<table class='table'>";

    foreach ($records as $record) {
        echo "<tr><td><img src='images/". $record['photo']. "' alt='" . $record['photo'] . "'></td><td>"
        . $record['first_name'] . "</td><td>" . $record['last_name'] . "</td><td>" . $record['position'] . "</td><td>" . $record['email'] . "</td><td>" . $record['favgame']. "</td><td><a href='" . $record['link']. "' target='_blank'> Listen Now </a></td><td><a href='delete.php?id=" . $record['player_id'] . "'> Delete </a></td><td><a href='add.php?id=" . $record['player_id'] . "'>Edit </a></td></tr>";
        }
     echo "</tbody></table>"; 

     $statement->closeCursor(); 
    }
    catch(PDOException $e) {
        $error_message = $e->getMessage(); 
        echo "<p> $error message </p>"; 
    }
    ?>
    </main>
    <?php require_once('footer.php'); ?>