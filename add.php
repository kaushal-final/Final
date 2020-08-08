<?php require('header.php'); ?>
<body class="add">
<?php require('navigation.php'); ?>
<div class="container inner">
    <?php
    //initialize variables 
    $id = null;
    $firstname = null;
    $lastname = null;
    $position = null;
    $email = null;
    $favgame = null;
    $profile = null; 
    $link = null;

    if(!empty($_GET['id']) && (is_numeric($_GET['id']))) {
      $id = filter_input(INPUT_GET, 'id');
      require_once('connect.php'); 
      $sql = "SELECT * FROM player WHERE player_id = :player_id;"; 
      $statement = $db->prepare($sql);  
      $statement->bindParam(':player_id', $id); 
      $statement->execute(); 
      $records = $statement->fetchAll(); 
      foreach($records as $record) : 
      $firstname = $record['first_name']; 
      $lastname = $record['last_name'];  
      $position = $record['position'];
      $favgame = $record['favgame']; 
      $email = $record['email'];  
      $profile = $record['profile'];
      $link = $record['link'];
      endforeach; 
      $statement->closeCursor(); 
    }
    ?>
    <main>
    <h1>Share Your Information</h1>
      <form action="process.php" method="post" enctype="multipart/form-data" class="form">
        <!-- add hidden input with user id if editing -->
        <input type="hidden" name="user_id" value="<?php echo $id;?>">
        <div class="form-group">
          <label for="fname"> Your First Name  </label>
          <input type="text" name="fname" class="form-control" id="fname" value="<?php echo $firstname; ?>">
        </div>
        <div class="form-group">
          <label for="lname"> Your Last Name  </label>
          <input type="text" name="lname" class="form-control" id="lname" value="<?php echo $lastname; ?>">
        </div>
        <div>
          <label for="position"> Your position </label>
          <input type="text" name="position" class="form-control" id="position" value="<?php echo $position; ?>">
        </div>
        <div class="form-group">
          <label for="email"> Your Email </label>
          <input type="text" name="email" class="form-control" id="email" value="<?php echo $email; ?>">
        </div>
        <div class="form-group">
          <label for="favgame"> What is your favourite game?  </label>
          <input type="text" name="favgame" class="form-control" id="favgame" value="<?php echo $favgame;?>">
        </div>
        <div class="form-group">
          <label for="link"> Social Media Link </label>
          <input type="url" name="link" class="form-control" id="link" value="<?php echo $link;?>">
        </div>
        <div class="form-group">
          <label for="profile"> Profile Pic </label>
          <input type="file" name="photo" id="profilepic" value="<?php echo $profile;?>">
        </div>
        <input type="submit" name="submit" value="Submit" class="btn">
      </form>
    </main>
<?php require('footer.php'); ?>