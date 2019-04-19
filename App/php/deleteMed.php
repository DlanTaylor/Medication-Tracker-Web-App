<?php
include("config.php");

// All parameters were not set
if (!isset($_POST['id']) && isset($_POST['email'])) {
    http_response_code(400); // Bad request http status
    $db->close();
    exit();
}

$id = mysqli_real_escape_string($db, $_POST['id']);
$email = mysqli_real_escape_string($db, $_POST['email']);

$sql = "DELETE FROM Medication WHERE id = '$id' AND email = '$email'";

if ($db->query($sql) != TRUE) {
    http_response_code(500); // Server error
    $db->close();
    exit();
}

$db->close();
?>