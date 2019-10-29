<?php 
  include("verificar_login.php");
?>

    <?php include ('header.html') ?>
    <main>
    


    <div class="container-fluid">
            
            <div class="form-groub row align-items-center">
                <div class="col"> 
                    <p class="col-form-label"  ><h5 style="text-align: center;">Data do Evento</h5></p>
                </div>
            </div>
            
    
    


    
    
        <div class=" row  " align="center">
            <div class="col "> 
                <input style= "width: 192px;" type="Date" class="form-control" id="input">
            </div>
        </div>
   

    

        <div class=" row " align="center">
            <div class="col">                                 
                <button style= "width: 192px; margin-top:10px;" class="form-control  btn-primary btnPadrao" href="#" onclick='listar_usuario(1, 5)' > consultar</button>                                           
            </div>
        </div>



    


        <div class="form-groub row">
            <div id="dados" class="col"> 

       
            </div>
        </div>

    </div>
    

    </main>
    
    <?php include ('footer.html') ?>

