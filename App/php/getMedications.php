<?php
include("config.php");
if (!isset($_SESSION)) {session_start();}

$email = $_SESSION['email'];
$isDoc = $_SESSION['isDoc'];
$doctor = $_SESSION['lastName'];

if($isDoc == 0){
    $sql = "SELECT email, prescription, instruction, dosage, doctor FROM Medication WHERE email = '$email' ORDER BY prescription DESC";
}
else {
    $sql = "SELECT email, prescription, instruction, dosage, doctor FROM Medication WHERE doctor = '$doctor' ORDER BY prescription DESC";
}

$result = mysqli_query($db, $sql);
$rows = array();


if (mysqli_num_rows($result) == 0) {
    // No rows returned
    http_response_code(204); // No content
    $db->close();
    exit();
}

while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}

echo json_encode($rows, JSON_PRETTY_PRINT);
http_response_code(200); // OK

$db->close();
?>