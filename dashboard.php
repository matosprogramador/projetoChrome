<?php 
include('header.php');


?>


<main> 

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="./code/highcharts.js"></script>
<script src="./code/modules/exporting.js"></script>
<script src="./code/modules/export-data.js"></script>


<div class='container-fluid'>

    <div class='row' style='margin-top:30px; ' >


    <div class='col-12 col-sm-12 col-md-4 col-lg-4'> 
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Rank por periodo</h3>
                    <div class="card-tools">
                        <span class="badge badge-primary">Label</span>
                    </div>        
                </div>

                <div class="card-body">
                
                <div id="container2" ></div>
       
                </div>

                <div class="card-footer">
                    The footer of the card
                </div>

            </div>
        </div>



        <div class='col-12 col-sm-12 col-md-4 col-lg-4'> 
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Agendamento por turma</h3>
                    <div class="card-tools">
                        <span class="badge badge-primary">Label</span>
                    </div>        
                </div>

                <div class="card-body">
                
                    <div id="container" ></div>
       
                </div>

                <div class="card-footer">
                    The footer of the card
                </div>

            </div>
        </div>


        <div class='col-12 col-sm-12 col-md-4 col-lg-4'>

            <div class="card">

                <div class="card-header">
                    <h5 class="card-title">Média de quantidade por agendamento</h5>
                    <div class="card-tools">
                        <span class="badge badge-primary">Label</span>
                    </div>        
                </div>

                <div class="card-body">
                    <p class="card-text media"  > </p>
                </div>

                <div class="card-footer">
                    The footer of the card
                </div>

            </div>
        </div>
    </div>
</div>

        <script type="text/javascript" src="js/graficos.js"></script>
</main>

<?php include('footer.html')  ?>
