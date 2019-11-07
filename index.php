
   
    <?php include('header.php')  ?>
    
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

      <?php if($_SESSION['tipo'] == 'a'){ ?>
         <div class="col d-flex justify-content-center" id="cards">
        <a href='dashboard.php'>
           <div class="card " style="width: 18rem;" id="imgs3">

              <img class="card-img-top" src="imagens/graficos.png" alt="Card image cap">

              <div class="card-body">
                
              <p class="nav-link">Gráficos</p>

              </div>

           </div>
       </a>
         </div>
      <?php }?>

        </div>
      </div>

     
      
      

    </main>
    <?php include('footer.html') ?>
    

  