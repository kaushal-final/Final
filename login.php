<?php 
require('header.php');
?>
<main class="container login">
<?php require('navigation.php'); ?>
    <h1> Log In! </h1> 
    <form action="validate.php" method="post">
        <fieldset class="form-group">
			<label for="username" class="col-sm-2">User Name:</label>
			<input name="username" type="text" class="form-control" id="username" required>
		</fieldset>
		<fieldset class="form-group">
			<label for="password" class="col-sm-2">Password:</label>
			<input name="password" required type="password" class="form-control" >
		</fieldset>
        <input type="submit" value="Log In!" name="submit" class="btn btn-success">
    </form>
    <a href="register.php"> Not a Member Yet? Sign Up Now </a>
</main>
<?php require("footer.php") ?>

