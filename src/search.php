<?php
require_once("bootstrap.php");

if (!isSessionOpen()) {
    header("location: index.php");
}

if (isset($_POST['inputTag'])) {
    $tagsString = $_POST['inputTag'];
} else if (isset($_GET['inputTag'])) {
    $tagsString = $_GET['inputTag'];
} else {
    header("location: index.php");
}

$templateParams["title"] = "Foto Sapore | Search";
$templateParams["page"] = "search-tmpl.php";

require_once("template/base.php");
?>