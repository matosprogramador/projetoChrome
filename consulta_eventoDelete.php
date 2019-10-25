<?php 
session_start();

$usuario = $_SESSION['usuario'];

include './coneccao.php';

$id= $_POST['idEvento'];

$array = explode(",",$id);

$inter = str_repeat('?,',count($array)-1) .'?';


$conn = getConnection();

$sql = "DELETE FROM `hora` WHERE idEvento in ($inter)";

$stmt = $conn->prepare($sql);
$stmt->execute($array);

$sql2 = 'INSERT INTO teste (oque) VALUES(?)';
$stmt2 = $conn->prepare($sql2);
$stmt2-> bindValue(1,$id);
$stmt2-> execute();







 