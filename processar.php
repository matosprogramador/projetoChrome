<?php 

session_start();
include './conexao.php';


$ano = $_POST['select'];
$data = $_POST['data1'];
$data2 = $_POST['data2'];
$hora = $_POST['hora'];
$hora2 = $_POST['hora2'];
$quantidade = $_POST['quantidade'];


if($data > $data2){

$reposta_json["mensagem"] = "A segunda data não pode ser inferior a primeira!";
$reposta_json["color"] = "danger";
 
echo json_encode($reposta_json);
 
   
	exit();
}


if ($data < date('Y-m-d')) {
	$reposta_json = '{"mensagem":"A segunda data não pode ser inferior a primeira!", "color":"danger"}'
 echo jason_decode($reposta_json);
    
   $mensagem = "Você não pode marcar para <br> uma data inferior ao dia de hoje!";
   $color = 'danger';
   
	exit();
}

if ($hora > $hora2) {
	$mensagem = "O primeiro horario não <br> pode ser maior que o segundo";
    $color = 'danger';
	exit();
}

if ($quantidade > 80) {
$mensagem = "Quantidade de chromes <br> muito alta para um unico horario!";
$color = 'danger';
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

   echo"Quantidade de chrome books indiponivel para esse horario ";
    
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
           echo"Salvo com sucesso!";
           
          exit();
        }
	
	}else{
		echo 'Erro ao salvar!';
	}	

	


}









?>