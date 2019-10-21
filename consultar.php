<?php 

include './coneccao.php';

$data = $_POST['data'];

$dataF= new DateTime($data);

$dataC = $dataF->format('d/m/Y');


$conn = getConnection();

$sql = "SELECT *, date_format(dataH, '%d/%m/%Y') as data_br FROM hora where date_format(dataH, '%d/%m/%Y') = :dat";

$stmt = $conn->prepare($sql);
$stmt->bindValue(":dat",$dataC);
$stmt->execute();

$result = $stmt->fetchAll();

foreach ($result as $value) {
	?> <div>
		Data de inicio: '.$value ['data_br'].'<br>';
	</div> '
<?php } ?> 









 
