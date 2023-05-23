<?php
require_once('init.php');
require('helpers.php');

check_admin();
$user = $_SESSION['user'];

$table_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = 'DELETE FROM tables WHERE id = ?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $table_id);
    $res = mysqli_stmt_execute($stmt);

    if ($res) {
        header("Location: tables.php");
        exit();
    } else {
        $content = include_template('error.php', ['error' => mysqli_error($link)]);
    }
} else {
    $sql = "SELECT * FROM tables WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $table_id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $table = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $content = include_template("table_delete.php", ["table" => $table]);
}

print include_template('layout.php', [
	'user' => $user,
	'content' => $content
]);
