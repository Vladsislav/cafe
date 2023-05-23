<?php
require_once('init.php');
require('helpers.php');

check_auth();
$user = $_SESSION['user'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $booking = $_POST;
    $date = date_create($booking['date']);
    $time = $booking['time'];
    $interval = date_interval_create_from_date_string(substr($time, 0, 2) . ' hours + ' . substr($time, 2, 4) . ' minutes');
    $start_date = date_add($date, $interval);

    $duration_hours = $booking['duration_hours'];
    $interval = date_interval_create_from_date_string($duration_hours . ' hours');
    $end_date = date_add((clone $start_date), $interval);

    $start_date_str = $start_date->format('Y-m-d H:i:s');
    $end_date_str = $end_date->format('Y-m-d H:i:s');

    if (isset($booking['table_id'])) {
        $sql = 'INSERT INTO bookings (start_time, end_time, table_id, guest_name, guest_phone_number) VALUES (?, ?, ?, ?, ?)';
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ssiss',
            $start_date_str,
            $end_date_str,
            $booking['table_id'], $booking['guest_name'], $booking['guest_phone_number']);
        $res = mysqli_stmt_execute($stmt);

        if ($res) {
            header("Location: bookings.php");
            exit();
        } else {
            $content = include_template('error.php', ['error' => mysqli_error($conn)]);
        }
    } else {
        $booking = $_POST;
        $date = $booking['date'];
        $time = $booking['time'];
        $duration_hours = $booking['duration_hours'];
        $people_count = intval($booking['people_count']);
        if ($booking['date'] == '') {
            $booking['date'] = null;
        }
        $topics_count = intval($booking['topics_count']);

        $sql = 'SELECT * FROM tables ' .
            'WHERE max_people >= ? ' .
            'AND NOT EXISTS (SELECT true FROM bookings WHERE NOT (end_time <= ? OR start_time >= ?) AND table_id = tables.id) ' .
            'ORDER BY name';
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'iss', $people_count, $start_date_str, $end_date_str);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $tables = mysqli_fetch_all($res, MYSQLI_ASSOC);

        $content = include_template("booking_new.php", [
          "user" => $user,
          "booking" => $booking,
          "tables" => $tables
        ]);
    }
} else {
    $content = include_template("booking_find_table.php");
}

print include_template('layout.php', [
	'user' => $user,
	'content' => $content
]);
