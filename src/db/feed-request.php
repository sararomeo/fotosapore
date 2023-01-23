<?php
    require_once("database.php");
    $args = json_decode($_POST["args"], false);
    $dbh = new DatabaseHelper("localhost", "root", "", "fotosapore", 3306);
    
    $result = $dbh->requestAllPosts()[$args->value];

    echo json_encode($result);
?>