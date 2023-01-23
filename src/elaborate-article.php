<?php
require("bootstrap.php");

if (!isSessionOpen()) {
    header("location: index.php");
}

$title = $_POST["title"];
$caption = $_POST["caption"];
$recipe = $_POST["recipe"];
$tagString = $_POST["tags"];
$autor = $_SESSION["userID"];

//check if all the data are set
if (!isset($_FILES["imgarticle"]) || !isset($_POST["title"]) || !isset($_POST["caption"]) || !isset($_POST["recipe"]) || !isset($_POST["tags"])) {
    $result = 0;
    $msg = "Fill all the field in the form before submitting!"; 
} else {
    //create an array of tags using the provided string
    $tags = explode(" ", $tagString);

    list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["imgarticle"]);
    //check if the imageUpload was sucsessfull
    if ($result == 1) {
        $imgarticolo = $msg;
        $postID = $dbh->insertNewPost($title, $caption, $recipe, $imgarticolo, $autor);

        //check if the article was insert correctly
        if ($postID != false) {
            //insert tags into the table 
            foreach ($tags as $tag) {
                $dbh->insertPostTags($postID, $tag);
            }
        } else {
            $msg = "Error during post insertion";
            $result = 0;
        }
    }
}
if ($result == 1) {
    header("location: home.php");
} else {
    header("location: create-post.php?msg=" . $msg . "&postTitle=" . $title . "&caption=" . $caption . "&recipe=" . $recipe . "&tagString=" . $tagString);
}
?>