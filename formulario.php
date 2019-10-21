<?php 

  include("verificar_login.php");

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>

    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Chrome Book</title>

    <link rel="stylesheet" type="text/css" href="css/style">

    <script src="https://kit.fontawesome.com/827d725b92.js" crossorigin="anonymous"></script>

    
  </head>

  <body>

    <?php include('header.html')  ?>
    
    <main >

      <div class="container" id="logo" >

        <div class="row">

          <div class="col-sm" id="logo" >
            <img src="imagens/chromebook.png" width="300" height="400">
          </div>

        

        </div>

      </div>  

        <div class="container d-flex justify-content-center">

          <form method="post" action="processar.php" >

              <div class="form-group row">

                  <div class="col-sm-3"  >
                    <label for="colFormLabelSm" class="col- col-form-label" >TURMA:</label>
                  </div>

                  <div class="col-sm-9"  >

                    <select class="custom-select mr-sm-2" name="select" required="" > 
                      <option value="" disabled selected >Escolha a Turma</option>
                      <option value="5º Ano">5º Ano</option>
                      <option value="6º Ano">6º Ano</option>
                      <option value="7º Ano">7º Ano</option>
                      <option value="8º Ano">8º Ano</option>
                      <option value="9º Ano">9º Ano</option>
                      <option value="Ensino Médio">Ensino Médio</option>
                    </select>

                  </div>

              </div>

              <div class="form-group row">

                <div class="col-3">
                  <label for="example-date-input" class="col- col-form-label">DATAS:</label>
                </div>
                

                <div class="col-4">   
                    <input class="form-control" type="date"  id="example-date-input" name="data1" required="">
                </div>

                <div class="col-1" id="ate">
                  <label for="example-date-input" class="col- col-form-label"> ATÉ </label>
                </div>

                <div class="col-4">   

                  <input class="form-control" type="date" name="data2" id="example-date-input" required="">

                </div>

              </div>

              <div class="form-group row">

                <div class="col-3">
                  <label for="example-date-input" name="" class="col- col-form-label">HORARIOS:</label>
                </div>
                

                <div class="col-4">   
                    <input class="form-control" type="time"  name="hora" id="example-date-input" required="">
                </div>

                <div class="col-1" id="ate">
                  <label for="example-date-input" class="col- col-form-label"> ÀS </label>
                </div>

                <div class="col-4">   

                  <input class="form-control" type="time" name="hora2"  id="example-date-input" required="">

                </div>

              </div>

              <div class="form-group row">

                <div class="col-auto col-sm-4  col-md-3">
                  <label for="example-date-input" class="col- col-form-label">QUANTIDADE:</label>
                </div>
                

                <div class="col-9">   
                    <input class="form-control" type="numer" min="1" max="80" name="quantidade"  id="example-date-input" required="">
                </div>

              </div>

    
                <div class='container d-flex justify-content-center'>
                        <input class=" btn btn-success" type="submit" value="Agendar" id="bot" >
                </div>

            </form> 
        </div>

    </main>
    <?php include('footer.html') ?>
    
  </body>
</html>