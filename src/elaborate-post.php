<?php
require_once("bootstrap.php");

if (!isSessionOpen()) {
    header("location: index.php");
}

$title = $_POST["title"];
$caption = $_POST["caption"];
$recipe = $_POST["recipe"];
$tagString = $_POST["tags"];
$autor = $_SESSION["userID"];

// Check if all the data are set
if (!isset($_FILES["imgarticle"]) || !isset($_POST["title"]) || !isset($_POST["caption"]) || !isset($_POST["recipe"]) || !isset($_POST["tags"])) {
    $result = 0;
    $msg = "Fill all the field in the form before submitting!";
} else {
    // Create an array of tags using the provided string
    $tags = explode(" ", $tagString);
    $tags = array_unique($tags);
    $tags = \array_diff($tags, ["", " "]);

    list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["imgarticle"]);
    // Check if the imageUpload was sucsessfull
    if ($result == 1) {
        $imgarticolo = $msg;
        $postID = $dbh->insertNewPost($title, $caption, $recipe, $imgarticolo, $autor);

        // Check if the article was insert correctly
        if ($postID != false) {
            // Insert tags into the table 
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
    $dbh->insertPostNotifications($autor);
    header("location: home.php");
} else {
    header("location: create-post.php?msg=" . $msg . "&postTitle=" . $title . "&caption=" . $caption . "&recipe=" . $recipe . "&tagString=" . $tagString);
}
?>