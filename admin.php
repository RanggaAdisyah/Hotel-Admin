<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        addReservation($_POST['name'], $_POST['check_in'], $_POST['check_out'], $_POST['room_type']);
    } elseif (isset($_POST['update'])) {
        updateReservation($_POST['id'], $_POST['status']);
    } elseif (isset($_POST['delete'])) {
        deleteReservation($_POST['id']);
    }
}

$reservations = getReservations();
?>

<h1>Admin Panel</h1>
<form method="post">
    <input type="text" name="name" placeholder="Nama">
    <input type="date" name="check_in">
    <input type="date" name="check_out">
    <input type="text" name="room_type" placeholder="Room Type">
    <button type="submit" name="add">Tambah</button>
</form>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Check-In</th>
        <th>Check-Out</th>
        <th>Room Type</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($reservations)) : ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['check_in'] ?></td>
        <td><?= $row['check_out'] ?></td>
        <td><?= $row['room_type'] ?></td>
        <td><?= $row['status'] ?></td>
        <td>
            <form method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <select name="status">
                    <option value="confirmed">Confirmed</option>
                    <option value="pending">Pending</option>
                    <option value="cancelled">Cancelled</option>
                </select>
                <button type="submit" name="update">Update</button>
            </form>
            <form method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <button type="submit" name="delete">Delete</button>
            </form>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
