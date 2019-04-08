<?php
require_once "db.php";
session_start();

$title = isset($_POST['title']) ? $_POST['title'] : "";
$start = isset($_POST['start']) ? $_POST['start'] : "";
$end = isset($_POST['end']) ? $_POST['end'] : "";
$user_id = $_SESSION['id'];

$sqlInsert = "INSERT INTO Calendar (title,start,end,u_id) VALUES ('".$title."','".$start."','".$end ."','".$user_id."')";

$result = mysqli_query($conn, $sqlInsert);

if (! $result) {
    $result = mysqli_error($conn);
}
?>