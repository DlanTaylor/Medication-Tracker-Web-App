<?php
require_once "db.php";
session_start();

$id = $_POST['id'];
$sqlDelete = "DELETE from Calendar WHERE id=".$id;

mysqli_query($conn, $sqlDelete);
echo mysqli_affected_rows($conn);

mysqli_close($conn);
?>