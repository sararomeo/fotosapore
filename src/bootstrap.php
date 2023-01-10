<?php
session_start();
require_once("utils/functions.php");
require_once("db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "fotosapore", 3306);
?>