<?php
require_once('init.php');
require('helpers.php');

check_admin();
$user = $_SESSION['user'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $table = $_POST;

    $sql = 'INSERT INTO tables (name, max_people) VALUES (?, ?)';
    $stmt = db_get_prepare_stmt($conn, $sql, $table);
    $res = mysqli_stmt_execute($stmt);

    if ($res) {
        $table_id = mysqli_insert_id($conn);
        header("Location: tables.php");
        exit();
    } else {
        $content = include_template('error.php', ['error' => mysqli_error($conn)]);
    }
} else {
    $content = include_template("table_new.php");
}

print include_template('layout.php', [
	'user' => $user,
	'content' => $content
]);
