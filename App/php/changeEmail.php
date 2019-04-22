<?php
include("config.php");
session_start();

$currentEmail = strtolower(mysqli_real_escape_string($db, $_POST['email']));
$newEmail = strtolower(mysqli_real_escape_string($db, $_POST['newEmail']));

$sql = "UPDATE Users SET email = '$newEmail' WHERE email = '$currentEmail'";

if($db->query($sql)){
    $_SESSION['email'] = $newEmail;
    //Update medication and calendar tables to reflect email change.
    $sql = "UPDATE Medication SET email = '$newEmail' WHERE email = '$currentEmail'";
    $db->query($sql);
    $sql = "UPDATE Calendar SET email = '$newEmail' WHERE email = '$currentEmail'";
    $db->query($sql);
}


$db->close();
?>