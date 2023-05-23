<?php
require_once('init.php');
require('helpers.php');

check_auth();
$user = $_SESSION['user'];

$sql = 'SELECT bookings.id, start_time, end_time, guest_name, guest_phone_number, tables.name as table_name ' .
    'FROM bookings INNER JOIN tables ON tables.id = table_id ' .
    'WHERE start_time > CURDATE() ' .
    'ORDER BY start_time';
$res = mysqli_query($conn, $sql);
$bookings = mysqli_fetch_all($res, MYSQLI_ASSOC);

$content = include_template('bookings.php', [
  'user' => $user,
  'bookings' => $bookings
]);

print include_template('layout.php', [
	'user' => $user,
	'content' => $content
]);
