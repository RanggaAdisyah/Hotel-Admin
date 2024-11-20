<?php
include 'db.php';

function getReservations() {
    global $conn;
    $query = "SELECT * FROM reservations";
    return mysqli_query($conn, $query);
}

function addReservation($name, $check_in, $check_out, $room_type) {
    global $conn;
    $query = "INSERT INTO reservations (name, check_in, check_out, room_type) 
              VALUES ('$name', '$check_in', '$check_out', '$room_type')";
    return mysqli_query($conn, $query);
}

function updateReservation($id, $status) {
    global $conn;
    $query = "UPDATE reservations SET status = '$status' WHERE id = $id";
    return mysqli_query($conn, $query);
}

function deleteReservation($id) {
    global $conn;
    $query = "DELETE FROM reservations WHERE id = $id";
    return mysqli_query($conn, $query);
}
?>
