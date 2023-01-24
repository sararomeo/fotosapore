<?php
    require_once("database.php");
    require_once("../bootstrap.php");
    $args = json_decode($_POST["args"], false);
    
    if($args->pageName == "home.php") {
        $postArray = $dbh->getFeedPosts();
        $postNum = count($postArray);
    } else if($args->pageName == "discovery.php") {
        $postArray = $dbh->getDiscoveryPosts();
        $postNum = count($postArray);
    }

    $requestObj = new stdClass();
    $requestObj->postNum = $postNum;
    if($args->value >= $postNum){
        $requestObj->postArray = null;
    } else {
        $requestObj->postArray = $postArray[$args->value];
    }

    echo json_encode($requestObj);
?>