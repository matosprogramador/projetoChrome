<?php
session_start();
include './conexao.php';

if(empty($_POST['login']) || empty($_POST['senha'])){
	header('location: login.php');
	exit();
}

$login=$_POST['login'];
$senha=$_POST['senha'];

$conn = getConnection();

$sql = "SELECT * FROM usuario where login = :log and senha = md5(:sen)";

$stmt = $conn->prepare($sql);
$stmt->bindValue(":log",$login);
$stmt->bindValue(":sen",$senha);
$stmt->execute();

$result = $stmt->fetchAll();
$total = count($result);

if($total == 1 && $result[0]['tipo'] == 'a' ){
	
	$_SESSION['usuario'] =$login;
	$_SESSION['tipo']="a";
	header('location: index.php');
	exit();
}
else if ($total == 1 &&   $result[0]['tipo'] == 'b'){

	$_SESSION['usuario'] = $login;
	$_SESSION['tipo']="b";
	header('location: index.php');
	exit();
}else{
	$_SESSION['nao_autent'] = true;
	header('location: login.php');
	exit();
}
