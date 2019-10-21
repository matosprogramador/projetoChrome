<?php 
  include("verificar_login.php");
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Consultar Agendamento</title>

    </head>
    
    <body>
    <?php include ('header.html') ?>
    <main>

    <div class="container">
    
            <div class="form-groub row align-items-center">
                <div class="col"> 
                    <p class="col-form-label"  ><h5 style="text-align: center;">Data do Evento</h5></p>
                </div>
            </div>

    </div>

    <div class="container d-flex justify-content-center">
    
        <div class=" row ">
            <div class="col"> 
                <input style= "width: 192px;" type="Date" class="form-control" id="input">
            </div>
        </div>

    </div>

    <div class="container d-flex justify-content-center">

        <div class=" row " >
            <div class="col">                                 
                <button style= "width: 192px; margin-top:10px;" class="form-control  btn-primary" href="#" onclick='listar_usuario(1, 5)' > consultar</button>                                           
            </div>
        </div>

    </div>

    <div class="container-fluid" style="margin-top:10px;">
        <div class="form-groub row">
            <div id="dados" class="col"> 

       
            </div>
        </div>
    </div>

    
    </main>
    <?php include ('footer.html') ?>

</body>

</html>