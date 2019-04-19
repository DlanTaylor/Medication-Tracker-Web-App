<?php
include("config.php");
if (!isset($_SESSION)) {session_start();}

// All parameters were not set
if(!(isset($_POST['id']) && isset($_POST['email']) && isset($_POST['prescription']) && isset($_POST['instruction']) && isset($_POST['dosage']) && isset($_POST['doctor']))) {
    http_response_code(400); // Bad request http status
    $db->close();
    exit();
}

$id = mysqli_real_escape_string($db, $_POST['id']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$prescription = mysqli_real_escape_string($db, $_POST['prescription']);
$instruction = mysqli_real_escape_string($db, $_POST['instruction']);
$dosage = mysqli_real_escape_string($db, $_POST['dosage']);
$doctor = mysqli_real_escape_string($db, $_POST['doctor']);

//update doctor in case doctor changes
$sql = "UPDATE Medication SET prescription = '$prescription', instruction = $instruction, dosage = '$dosage', doctor = '$doctor'
  WHERE id = '$id' AND email = '$email'";

if ($db->query($sql) != TRUE) {
    http_response_code(500); // Server error
    $db->close();
    exit();
}

$db->close();
?>