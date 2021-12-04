<?php

/** @var $pdo \PDO  */
include_once('config/database.php');
$id = $_POST['id'];

if (!$id) {
    header('Location: index.php');
    exit;
}


$stmt = $pdo->prepare('DELETE FROM products WHERE id = :id');
$stmt->bindValue(':id', $id);
$stmt->execute();

header('Location: index.php');

?>