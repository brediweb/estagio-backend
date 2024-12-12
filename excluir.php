<?php
include 'db.php';

$id = $_GET['id'];

$queryResult = $pdo->prepare('DELETE FROM produtos WHERE id = ?');
$queryResult->execute([$id]);

header('Location: index.php');
exit;
