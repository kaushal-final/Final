<?php
     $dsn = 'mysql:host=localhost;dbname=Kaushal200449270';
    $username = '';
    $password = ''; 
    $db = new PDO($dsn, $username, $password);
    //set error mode to exception 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>