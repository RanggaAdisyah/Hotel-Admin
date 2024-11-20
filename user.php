<?php
session_start();
if ($_SESSION['role'] !== 'user') {
    header("Location: index.php");
    exit();
}
include 'functions.php';

$reservations = getReservations();
?>

<h1>Reservasi Hotel</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Check-In</th>
        <th>Check-Out</th>
        <th>Room Type</th>
        <th>Status</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($reservations)) : ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['check_in'] ?></td>
        <td><?= $row['check_out'] ?></td>
        <td><?= $row['room_type'] ?></td>
        <td><?= $row['status'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>
