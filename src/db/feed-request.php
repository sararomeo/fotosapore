<?php
    require_once("database.php");
    $args = json_decode($_POST["args"], false);
    $dbh = new DatabaseHelper("localhost", "root", "", "fotosapore", 3306);
    
    $postArray = $dbh->requestAllPosts();
    $postNum = count($postArray);

    $requestObj = new stdClass();
    $requestObj->postNum = $postNum;
    $requestObj->postArray = $postArray[$args->value];

    echo json_encode($requestObj);
?>