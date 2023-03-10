<?php
require_once("database.php");
require_once("../bootstrap.php");

$args = json_decode($_POST["args"], false);

if ($args->pageName == "home.php") {
    $postArray = $dbh->getHomePosts();
    $postNum = count($postArray);
} else if ($args->pageName == "discovery.php") {
    $postArray = $dbh->getDiscoveryPosts();
    $postNum = count($postArray);
} else if (str_contains($args->pageName, "profile.php") && $args->pageName != "edit-profile.php") {
    $postArray = $dbh->getProfilePosts($args->profileID);
    $postNum = count($postArray);
} else if (str_contains($args->pageName, "search.php")) {
    $postArray = $dbh->getSearchPosts($args->searchTag);
    $postNum = count($postArray);
} else {
    $postArray = array();
    $postNum = 0;
}

$requestObj = new stdClass();
$requestObj->postNum = $postNum;
if ($args->value >= $postNum) {
    $requestObj->postArray = null;
    $requestObj->isLiked = null;
    $requestObj->likeNum = null;
} else {
    $requestObj->postArray = $postArray[$args->value];
    $requestObj->isLiked = count($dbh->isPostLiked($_SESSION["userID"], $requestObj->postArray["postID"]));
    $requestObj->likeNum = $dbh->likeNumber($requestObj->postArray["postID"]);
}

echo json_encode($requestObj);
?>