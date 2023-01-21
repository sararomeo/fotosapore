<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "FotoSapore | Logout";
closeSession();

require("template/base-index.php");
?>
