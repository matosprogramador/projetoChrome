

    <?php include('header.php')  ?>
    
    <main >
   
      <div class="container" id="logo" >

        <div class="row">

          <div class="col-sm" id="logo" >
            <img src="imagens/chromebook.png" width="200" height="300">
          </div>

        

        </div>

      </div>  

        <div class="container d-flex justify-content-center">

          <form method="post"  id='chrome' >

              <div class="form-group row">

                  <div class="col-sm-3"  >
                    <label for="colFormLabelSm" class="col- col-form-label" >TURMA:</label>
                  </div>

                  <div class="col-sm-9"  >

                    <select class="custom-select mr-sm-2" name="select" required="" id="slc"  onBlur="valida_campo(this.id)"> 
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
              <div id="slc1"> </div>
              <div class="form-group row">

                <div class="col-3">
                  <label for="example-date-input" class="col- col-form-label">DATAS:</label>
                </div>
                

                <div class="col-4">   
                    <input class="form-control" type="date" id='data'   name="data1" required="">
                </div>

                <div class="col-1" id="ate">
                  <label for="example-date-input" class="col- col-form-label"> ATÉ </label>
                </div>

                <div class="col-4">   

                  <input class="form-control" type="date" id='data2' name="data2"  required="" onBlur="valida_campo(this.id)">

                </div>
                
              </div>
              <div id="data21"> </div>
              <div class="form-group row">

                <div class="col-3">
                  <label for="example-date-input" name="" class="col- col-form-label">HORARIOS:</label>
                </div>
                

                <div class="col-4">   
                    <input class="form-control" type="time" id='hora' name="hora"  required="">
                </div>

                <div class="col-1" id="ate">
                  <label for="example-date-input" class="col- col-form-label"> ÀS </label>
                </div>

                <div class="col-4">   

                  <input class="form-control" type="time" id='hora2' name="hora2"   required="" onBlur="valida_campo(this.id)">

                </div>
                
              </div>
            <div id="hora21"> </div>
              <div class="form-group row">

                <div class="col-4 col-sm-3  col-md-3">
                  <label for="example-date-input" class="col- col-form-label">QUANTIDADE:</label>
                </div>
                

                <div class="col-12 col-sm-9 col-md-9 ">   
                    <input class="form-control" type="numer" min="1" max="80" name="quantidade"  id="example-date-input" required="" onBlur="valida_campo(this.id)">
                </div>
                
              </div>
              <div><input value='1' id='check' name='check' style="width:15px; height:15px ;" type='checkbox'> CONFIRMAR</div>
              <div id="example-date-input1"> </div>
                  <div class='row'> 
                    <div class='col'> 
                      <input style='width: 100%;' class=" btn btn-primary btnPadrao" type="submit" value="Agendar" id="bot" disabled >
                    </div>
                </div>

            </form> 
          
        </div>
    
    </main>
    
    <?php include('footer.html') ?>
    
  