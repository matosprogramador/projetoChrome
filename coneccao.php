<?php

/**
 *
 * @return \PDO
 */

function getConnection(){

	$dsn='mysql:host=localhost;dbname=chrome';
	$user ='root';
	$pass= '';

	try{

		$pdo = new PDO($dsn, $user, $pass);
		return $pdo;


	}catch(PDOException $ex){
		echo 'Erro: ' . $ex->getMessage;
	}

}



