<?php
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
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

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script src="https://kit.fontawesome.com/827d725b92.js" crossorigin="anonymous"></script>

    
  </head>

  <body style="background-color:#004179;">

  	<main>
  		<div class="container d-flex justify-content-center" id="teste">

  			<div class="form-group row ">

  			<div class="col  d-flex justify-content-center" id="logo_colegio" >
    			 <img src="imagens/logo_colegio.png" >
  			</div>

			</div>

  		</div>



  		<div class="container d-flex justify-content-center" >

  			<div class="card" style="background-color: white;">
              <?php 
              
              if(isset($_SESSION['nao_autent'])){
              ?>
              <p class="alert alert-danger" role="alert" style="text-align:center;">Usuário ou senha inválidos!</p>
              <?php 
              
              }
              unset($_SESSION['nao_autent']);
              ?>
  				
  				<form method="post" action="consultar_login.php" id="formulario2"  >

          				<div class="form-group row">


                  			<div class="col" >
                    			 <input class="form-control"  name="login" required="" placeholder="USUARIO" style="text-align:center; ">
                  			</div>

 						</div>


              			<div class="form-group row">


                    		<div class="col"  >
                    			 <input class="form-control" type="password"  name="senha" required="" placeholder="SENHA" style="text-align: center;">
                  			</div>
                  			
 						</div>


 						<div class="form-group row">


                    		<div class="col"  >
                    			
                    		<input  class="form-control btn-warning" type="submit"  name="quantidade" required="" value="Entrar">
                    			
                    			 
                  			</div>
                  		</div>


 						
      			 </form>

  			</div>
			 	
      		</div>
  			
      


        

	</main>

  </body>
</html>