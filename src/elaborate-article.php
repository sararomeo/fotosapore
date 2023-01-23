<?php
require("bootstrap.php");

if (!isSessionOpen()) {
    header("location: index.php");
}

//Inserisco
$title = $_POST["title"];
$caption = $_POST["caption"];
$recipe = $_POST["recipe"];
$tagString = $_POST["tags"];
$autor = $_SESSION["userID"];

//create an array of tags using the provided string
$tags = explode(" ", $tagString);

list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["imgarticle"]);


if ($result == 1) {
    $imgarticolo = $msg;
    $postID = $dbh->insertNewPost($title, $caption, $recipe, $imgarticolo ,$autor);

    //check if the article was insert correctly
    if ($postID != false) {
        //insert tags into the table 
        foreach ($tags as $tag) {
            $dbh->insertPostTags($postID, $tag); 
        }
        //$msg = "Inserimento avvenuto correttamente";
        header("location: index.php"); 
    }else{ 
        $msg = "Errore inserimento post";
    }
} 

header("location: create-post.php?msg=".$msg."&postTitle=".$title."&caption=".$caption."&recipe=".$recipe."&tagString=".$tagString);

?>