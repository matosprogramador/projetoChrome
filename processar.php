<?php 

session_start();
include './coneccao.php';


$ano = $_POST['select'];
$data = $_POST['data1'];
$data2 = $_POST['data2'];
$hora = $_POST['hora'];
$hora2 = $_POST['hora2'];
$quantidade = $_POST['quantidade'];

?> <script> alert($ano)</script> <?php

if($data > $data2){
	?> <script>window.location.href = "formulario.php"; 
    
    alert("A segunda data não ser inferior a primeira!");
    
    </script> <?php
   
	exit();
}


if ($data < date('Y-m-d')) {
	?> <script>window.location.href = "formulario.php"; 
    
    alert("Você não pode marcar para uma data inferior ao dia de hoje!");
    
    </script> <?php
   
	exit();
}

if ($hora > $hora2) {
	?> <script>alert("O primeiro horario não pode ser maior que o segundo");
    window.location.href = "formulario.php";
    </script> 
    <?php
    
	exit();
}

if ($quantidade > 80) {
	?> <script>alert("Quantidade de chromes muito alta para um unico horario!");
    window.location.href = "formulario.php";
    </script> 
    
    <?php
   
	exit();
}

$dataY = new DateTime($data);
$dataX = new DateTime($data2);


$resultado = date_diff($dataY, $dataX);
$inter = date_interval_format($resultado, '%a');




$dataI = new DateTime($hora . ' ' . $data);
$dataI2 = $dataI->format('Y-m-d H');

$dataF = new DateTime($hora2 . ' ' . $data2);
$dataF2 = $dataF->format('Y-m-d H');


$conn = getConnection();

$sql = "select * from hora where dataH and dataH2 between( :dat1 ) and ( :dat2 ) and quantidade + :quant > 80";

$stmt = $conn->prepare($sql);
$stmt->bindValue(":dat2",$dataF2);
$stmt->bindValue(":dat1",$dataI2);
$stmt->bindValue(":quant",$quantidade);
$stmt->execute();

$result = $stmt->fetchAll();

$total = count($result);

?> <script> console.log(<?php echo $inter ;?>)</script> <?php

if($total > 0){
    ?> <script>alert("Quantidade de chrome books indiponivel para esse horario ");
    window.location.href = "formulario.php";
    </script> 
    <?php
	exit();
}



for($y = 0 ; $y <= $inter ; $y++){

    
    
    $dataC = new DateTime($data);
	$sub = "+$y days ";
    $coisa2 = $dataC ->format('Y/m/d');
	$intervalo = date('Y/m/d',strtotime($sub, strtotime($coisa2)));
	


	$dataA = new DateTime($hora . ' ' . $intervalo);
	$dataB = new DateTime($hora2 . ' ' . $intervalo);

	$dataQ = $dataA->format('Y-m-d H:i:s');
	$dataQ2 = $dataB->format('Y-m-d H:i:s');
	$usuario = $_SESSION['usuario'];

    

	$sql2 = 'INSERT INTO hora (dataH,dataH2,quantidade,turma,criador) VALUES(?,?,?,?,?)';
	$stmt2 = $conn->prepare($sql2);
	$stmt2-> bindValue(1,$dataQ);
	$stmt2-> bindValue(2,$dataQ2);
	$stmt2-> bindValue(3,$quantidade);
	$stmt2-> bindValue(4,$ano);
	$stmt2-> bindValue(5,$usuario);
    
    if($stmt2->execute()){
        if($y == $inter){
           ?> <script>alert("Salvo com sucesso!");
            window.location.href = "formulario.php";
            </script> 
            <?php
          exit();
        }
	
	}else{
		echo 'Erro ao salvar!';
	}	

	


}









?>