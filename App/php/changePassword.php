<?php
include("config.php");
session_start();

// All parameters were not set
    if(!(isset($_POST['password']) && isset($_POST['newPassword']))) {
        http_response_code(400); // Bad request http status
        $db->close();
        exit();
    }

$email = $_SESSION['email'];
$currentPassword = mysqli_real_escape_string($db, $_POST['password']);
$newPassword = mysqli_real_escape_string($db, $_POST['newPassword']);
$newHash = password_hash($newPassword, PASSWORD_BCRYPT);

$sql = "SELECT password From Users WHERE email = '$email'";
$result = mysqli_query($db, $sql);
$results = mysqli_fetch_object($result);
$passwordHash = $results->password;

//Incorrect password
if(!password_verify($currentPassword, $passwordHash)) {
        http_response_code(401); // Conflict error http status
        $db->close();
        exit();
    }

$sql = "UPDATE Users SET password = '$newHash' WHERE email = '$email'";
$db->query($sql);

$db->close();
?>