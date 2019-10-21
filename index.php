<?php 
  include("verificar_login.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>

    
  </head>

  <body>
   
    <?php include('header.html')  ?>
    
    <main id=""> 

     <div class="container d-flex justify-content-center ">

      <div class="row">

        <div class="col d-flex justify-content-center" id="cards">

           <div class="card " style="width: 18rem;" id="imgs1">

              <img class="card-img-top" src="imagens/chromebook1.png" alt="Card image cap">

              <div class="card-body">
                
                <a href="formulario.php" class="btn btn-primary">Agendar</a>

              </div>

           </div>

         </div>

         <div class="col d-flex justify-content-center" id="cards">

            <div class="card " style="width: 18rem;" id="imgs2">

                <img class="card-img-top" src="imagens/buscar.png" alt="Card image cap" >

                <div class="card-body">

                  
                  <a href="consulta.php" class="btn btn-primary">Consultar</a>

                </div>

            </div> 
         </div>

        </div>
      </div>

     
      
      

    </main>
    <?php include('footer.html') ?>
    

  </div>
  </body>
</html>