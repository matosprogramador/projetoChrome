<?php 
session_start();

$usuario = $_SESSION['usuario'];

include './coneccao.php';

$id= $_POST['idEvento'];

$conn = getConnection();

$sql = "DELETE FROM `hora` WHERE idEvento in (:id)";

$stmt = $conn->prepare($sql);
$stmt->bindValue(":id",$id);
$stmt->execute();

$sql2 = 'INSERT INTO teste (oque) VALUES(?)';
$stmt2 = $conn->prepare($sql2);
$stmt2-> bindValue(1,$id);
$stmt2-> execute();







 