<?php require_once('header.php'); ?>
<body class="add">
<div class="container inner saved">
<?php require_once('navigation.php'); ?>
<h1> Cricket Team - Share your Details </h1>
<main>
    <?php

    $first_name = filter_input(INPUT_POST, 'fname');
    $last_name = filter_input(INPUT_POST, 'lname');
    $position = filter_input(INPUT_POST, 'position');
    $fav_game = filter_input(INPUT_POST, 'favgame');
    $email = filter_input(INPUT_POST, 'email');
    $link = filter_input(INPUT_POST, 'link');
    $photo = $_FILES['photo']['name'];
    $photo_type = $_FILES['photo']['type'];
    $photo_size = $_FILES['photo']['size'];
    $id = null;
    $id = filter_input(INPUT_POST, 'player_id');
    $ok = true;

    //define image constants
    define('UPLOADPATH', 'images/');
    define('MAXFILESIZE', 32786); 

    if (empty($first_name) || empty($last_name)) {
        echo "<p class='error'>Please provide both first and last name! </p>";
        $ok = false;
    }

    if (empty($position)) {
        echo "<p class='error'>Please tell us where you are located!!</p>";
        $ok = false;
    }

    if (empty($fav_game)) {
        echo "<p class='error'>Please tell us what you are listening to!</p>";
        $ok = false;
    }

    if (empty($email) || $email === false) {
        echo "<p class='error'>Please include your email in the proper format!</p>";
        $ok = false;
    }
 
    if ((($photo_type !== 'image/gif') || ($photo_type !== 'image/jpeg') || ($photo_type !== 'image/jpg') || ($photo_type !== 'image/png')) && ($photo_size < 0) && ($photo_size >= MAXFILESIZE)) {
        //making sure no upload errors 
        if ($_FILES['photo']['error'] !== 0) {
            $ok = false;
            echo "Please submit a photo that is a jpg, png or gif and less than 32kb";
        }
    }

    if ($ok === true) {
        try {
            $target = UPLOADPATH . $photo;
            move_uploaded_file($_FILES['photo']['tmp_name'], $target);
            // connecting to the database
            require_once('connect.php');
            if (!empty($id)) {
                $sql = "UPDATE player SET first_name = :firstname, last_name = :lastname, position = :position, email = :email, favgame = :favgame, link = :link,  photo = :photo WHERE player_id = :player_id;";
            } else {
                $sql = "INSERT INTO player (first_name, last_name, position, email, favgame, link, photo) VALUES (:firstname, :lastname, :position, :email, :age, :favgame,:link, :photo)";
            }
            // Call the prepare method of the PDO object to prepare the query and return a PDOstatement object
            $statement = $db->prepare($sql);

            $statement->bindParam(':firstname', $first_name);
            $statement->bindParam(':lastname', $last_name);
            $statement->bindParam(':position', $position);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':favgame', $fav_game);
            $statement->bindParam(':photo', $photo);
            $statement->bindParam(':link', $link);

            if (!empty($id)) {
                $statement->bindParam(':player_id', $id);
            }

            $statement->execute();

            echo "<p> information added! Thanks for sharing! </p>";

            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p> Sorry! We weren't able to process your submission at this time. We've alerted our admins and will let you know when things are fixed! </p> ";
            echo $error_message;
            echo " $id $first_name $last_name $position $email $fav_game $photo";
            //email app admin with error
            mail('kaushal7031@gmail.com', 'TuneShare Error', 'Error :' . $error_message);
        }
    }
    ?>
    <a href="index.php" class="btn btn-lg btn-secondary orange"> Back to Form </a>
</main>
<?php require_once('footer.php'); ?>
