<?php
require_once('init.php');
require('helpers.php');

check_auth();
$user = $_SESSION['user'];

$booking_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = 'DELETE FROM bookings WHERE id = ?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $booking_id);
    $res = mysqli_stmt_execute($stmt);

    if ($res) {
        header("Location: bookings.php");
        exit();
    } else {
        $content = include_template('error.php', ['error' => mysqli_error($link)]);
    }
} else {
    $sql = "SELECT * FROM bookings WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $booking_id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $booking = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $content = include_template("booking_delete.php", ["booking" => $booking]);
}

print include_template('layout.php', [
	'user' => $user,
	'content' => $content
]);
