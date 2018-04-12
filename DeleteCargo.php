<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM cargo WHERE ID=:ID';
$statement = $connection->prepare($sql);
if ($statement->execute([':ID' => $id])) {
    header("Location: Cargo.php");
}
?>