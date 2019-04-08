<?php
    require_once "db.php";
    session_start();

    $id = $_SESSION['id'];

    $json = array();
    $sqlQuery = "SELECT * FROM Calendar WHERE u_id = '$id' ORDER BY id";

    $result = mysqli_query($conn, $sqlQuery);
    $eventArray = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($eventArray, $row);
    }
    mysqli_free_result($result);

    mysqli_close($conn);
    echo json_encode($eventArray);
?>