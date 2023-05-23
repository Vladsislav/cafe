<?php
require_once('init.php');
require('helpers.php');

check_auth();
$user = $_SESSION['user'];

$sql = "SELECT * FROM tables ORDER BY name";
$res = mysqli_query($conn, $sql);
$tables = mysqli_fetch_all($res, MYSQLI_ASSOC);

$content = include_template("tables.php", [
  "user" => $user,
  "tables" => $tables
]);

print include_template('layout.php', [
	'user' => $user,
	'content' => $content
]);
