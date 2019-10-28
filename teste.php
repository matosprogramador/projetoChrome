<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <form id="form-ajax" method="post"> 
      <label> Nome </label>
      <input name="nome" > </br>
      <button type="submit">
        dados
      </button>


    </form>

  <div aria-live="polite" aria-atomic="true" class="position-relative">
    <div class="position-absolute" id="toast-place" style="top:0px; right:20px;">
  
    </div>
  </div>

    <button onclick="teste();"> oi </button>
    <h1>Hello, world!</h1>

    <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
    </div>
    
                                          <!-- notify -->
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false" id="toast">
        <div class="toast-header">
            <strong class="mr-auto">Bootstrap</strong>
            <small>11 mins ago</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            Hello, world! This is a toast message.
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
    <script>
       $(document).ready(function(){
        $('#form-ajax').on('submit', function (e){
          e.preventDefault();
          var data = $(this).serialize();
          $.ajax({
            url:'testeee.php',
            method:'post',
            data:data,
            success:function(nome){
              $('#toast-place').append(` 
            <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-delay="3000">
              <div class="toast-header bg-success">
                <strong class="mr-auto text-white" >Parabéns</strong>
                <small class="text-white">Agora</small>
                <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="toast-body">`+
            nome + `
            </div>
          </div>`)}

          
            
          

          })
          $('.toast').toast('show');
          console.log('show');
          $('.toast').on('hidden.bs.toast', e=> {
            $(e.currentTarget).remove();
            console.log('hide')
            }) 
        })
       })
      
  
        function teste(){
        //adicionar o toast no local definido
          $('#toast-place').append(` 
          <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-delay="3000">
            <div class="toast-header bg-success">
              <strong class="mr-auto text-white" >Parabéns</strong>
              <small class="text-white">Agora</small>
              <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <div class="toast-body">
            Evento(s) apagado(s) com sucesso!
          </div>
        </div>
                `)
          
          $('.toast').toast('show');

          console.log("show");

          //remover o toast
          $('.toast').on('hidden.bs.toast', e=> {
            $(e.currentTarget).remove();
            console.log('hide')
          })
        }
    
    
    </script>
  </body>
</html>