<?php
include("config.php");
session_start();

// All parameters were not set
    if(!(isset($_POST['email']) && isset($_POST['newEmail']))) {
        http_response_code(400); // Bad request http status
        $db->close();
        exit();
    }

$currentEmail = strtolower(mysqli_real_escape_string($db, $_POST['email']));
$newEmail = strtolower(mysqli_real_escape_string($db, $_POST['newEmail']));

$sql = "UPDATE Users SET email = '$newEmail' WHERE email = '$currentEmail'";

if($db->query($sql)){
    $_SESSION['email'] = $newEmail;
    //Update calendar table to reflect email change.
    $sql = "UPDATE Calendar SET email = '$newEmail' WHERE email = '$currentEmail'";
    $db->query($sql);
}


$db->close();
?>