<?php 
session_start();

$usuario = $_SESSION['usuario'];

include './coneccao.php';

$idEvento = $_POST['idEvento'];

$conn = getConnection();

$sql =  "DELETE FROM hora WHERE idEvento = :id and criador = :cria ";

$stmt = $conn->prepare($sql);
$stmt->bindValue(":id",$idEvento);
$stmt->bindValue(":cria",$usuario);
$stmt->execute();









 