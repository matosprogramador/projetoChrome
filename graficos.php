<?php 
include ('./conexao.php');

$conn = getConnection();

$reposta = $_POST['data'];

if($reposta == 'media' ){
    $sql = "SELECT AVG(quantidade) FROM hora " ;
    
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    
        $result = $stmt->fetchAll();

        echo json_encode($result);
}





if($reposta == 'graficoUM'){

    $turma=['6º Ano','7º Ano','8º Ano','9º Ano','Ensino Médio'];

    $resposta_json=[];
    
    foreach ($turma as $value){
    
        $sql = "SELECT * FROM hora where turma = :turm " ;
    
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":turm",$value);
        $stmt->execute();
    
        $result = $stmt->fetchAll();
        $total = count($result);
          
    
        $resposta_json[] = $total;
        
       
    };
    
    
    
    echo json_encode($resposta_json);
    

}

if($reposta == 'graficoDois'){
    $mes=['01','02','03','04','05','06','07','08','09','10','11','12'];
    $turma=['6º Ano','7º Ano','8º Ano','9º Ano','Ensino Médio'];

   
    $resposta_json=[];

    foreach ($mes as $value){
        foreach($turma as $value2){
            $sql = "SELECT * FROM hora where 
            date_format(dataH, '%m') = :dat and turma = :turm";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":dat",$value);
            $stmt->bindValue(":turm",$value2);
            $stmt->execute();

            $result = $stmt->fetchAll();
            $total = count($result);

          $turmas[]=$total;  
        }
           
        $resposta_json[] = $turmas;
        unset($turmas);
            
    };
    echo json_encode($resposta_json);
}





