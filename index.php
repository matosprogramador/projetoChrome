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
        <a href='formulario.php'>
           <div class="card " style="width: 18rem;" id="imgs1">

              <img class="card-img-top" src="imagens/chromebook1.png" alt="Card image cap">

              <div class="card-body">
                
              <p class="nav-link">Agendar</p>

              </div>

           </div>
       </a>
         </div>

         <div class="col d-flex justify-content-center" id="cards">
         <a href='consulta.php'>
            <div class="card " style=" width: 18rem;" id="imgs2">

                <img class="card-img-top" src="imagens/buscar.png" alt="Card image cap" >

                <div class="card-body">
                  
                  <p class="nav-link">Consultar</p>

                </div>

            </div>
          </a> 
         </div>

        </div>
      </div>

     
      
      

    </main>
    <?php include('footer.html') ?>
    

  </div>
  </body>
</html>