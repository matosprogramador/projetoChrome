<?php 
session_start();

include './conexao.php';

$usuario = $_SESSION['usuario'];

$data = $_POST['data'];

$pagina= $_POST['pagina'];

$quant_result_pg= $_POST['quant_result_pg'];

$inicio = ($pagina * $quant_result_pg) - $quant_result_pg;

$dataF= new DateTime($data);

$dataC = $dataF->format('d/m/Y');


$conn = getConnection();

//consulta 1 para obter apenas 5 resultados por pagina
$sql =  "SELECT *, date_format(dataH, '%d/%m/%Y %H:%i') as data_br , date_format(dataH2, '%H:%i') as data_br2 FROM hora where date_format(dataH, '%d/%m/%Y') = :dat and criador = :cria LIMIT $inicio, $quant_result_pg ";
$stmt = $conn->prepare($sql);
$stmt->bindValue(":dat",$dataC);
$stmt->bindValue(":cria",$usuario);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

//consulta 2 para obter o total de resultados e encontrar o total de paginas

$sql2 = "SELECT *, date_format(dataH, '%d/%m/%Y %H:%i') as data_br , date_format(dataH2, '%d/%m/%Y %H:%i') as data_br2 FROM hora where date_format(dataH, '%d/%m/%Y') = :dat and criador = :cria";

$stmt2 = $conn->prepare($sql2);
$stmt2->bindValue(":dat",$dataC);
$stmt2->bindValue(":cria",$usuario);
$stmt2->execute();
$result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
$total = count($result2);
$quantidade_pg = ceil($total / 5 );


if($total > 0) {

    ?>
<html>
	<head>

	</head>
	<body>

    <div class="mask-loading">
        <figure>
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </figure>
    </div>
        
        <main style="margin-top: 20px;">
            <table class="table table-striped table-sm" style="text-align:center;">
                <thead>
                    <tr>
                    <th></th>
                    <th>Evento</th>
                    <th>Turma</th>
                    <th>Quantidade</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($result as $value) {

                        ?>
                    <tr> 
                    <td><input value='<?=$value ['idEvento'];?>' name='eventos' type="checkbox" style="width:35px; height:38px ;"><br><?=$value ['idEvento'];?></td>
                    
                    <th><?=$value ['data_br'];?>h às <?=$value ['data_br2'];?>h </th>
                    <td><?=$value ['turma'];?></td>
                    <td><?=$value ['quantidade'];?></td>
                    <th>
                    <?php echo
                    "<button
                    class='btn btn-danger' id='delete'  onclick='confirmacao("; echo $value['idEvento']; echo ")' > 
                    <b>X</b>
                    </button>"
                    ?>
                    </th> 
                   
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <td>
            <?php echo "<button id='delete_todos'  class='btn btn-danger'  > 
            <b>Excluir</b>
            </button>"; ?>
                    </td>
                </tfoot>
            </table>

    <div class="container d-flex justify-content-center" style="margin-top: 20px;">

        
        
        <?php echo "<button style='margin: 0px 0px 0px 5px;' class='btn btn-primary' id='consultar2' href='#' onclick='listar_usuario( $pagina-1 , $quant_result_pg)' "; if ($pagina <= 1 ){
                echo "disabled"; } echo " > Anterior </button>"; ?>

                    <?php for ($i = $pagina - 2 ; $i <= $pagina -1  ; $i++ ){
                            if ($i >= 1){
                                echo "<button style='margin: 0px 0px 0px 5px;' class='btn btn-secondary' id='consultar2' href='#' onclick='listar_usuario( $i , $quant_result_pg)' "; if ( $i == $pagina  ){
                echo "disabled"; } echo " > $i  </button>";
                            }	

                    }?>

                    <?php echo "<button style='margin: 0px 0px 0px 5px;' id='consultar2' href='#' onclick='listar_usuario( $pagina+1 , $quant_result_pg)' disabled > $pagina </button>"; ?>

                    <?php for ($y = $pagina + 1 ; $y <= $pagina + 2  ; $y++ ){
                            if ($y <= $quantidade_pg){
                                echo "<button style='margin: 0px 0px 0px 5px;' class='btn btn-secondary' id='consultar2' href='#' onclick='listar_usuario( $y , $quant_result_pg)' "; if ( $y == $pagina  ){
                echo "disabled"; } echo " > $y  </button>";
                            }
                            

                    }?>

                    <?php echo "<button style='margin: 0px 0px 0px 5px;' class='btn btn-primary' id='consultar2' href='#' onclick='listar_usuario( $pagina+1 , $quant_result_pg)' "; if ($pagina >= $quantidade_pg ){
                echo "disabled"; } echo " > Próximo </button>"; ?>

            
        
            
    </div>
                                                 <!-- Modal -->
    <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-danger">
            <h5 class="modal-title text-white" id="exampleModalLabel">Confirmação</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id='corpo_modal'>
            Você realmente deseja deletar esse evento?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id='del' data-id="" href="<?php echo $pagina; ?>" html="<?php echo $quant_result_pg; ?>" >Deletar</button>
        </div>
        </div>
    </div>
    </div>

    </main>

        
    
</html>           
<?php

} else{  ?> 

<p class="alert alert-danger"  role="alert" style="margin-top: 20px; text-align:center;">Nenhum registro encontrado!</p>

<?php } ?>
 










 