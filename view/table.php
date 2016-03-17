<?php
require dirname(__file__).'/../controller/UserController.php';
$UserController =  UserController::getUserController();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script   src="https://code.jquery.com/jquery-2.2.1.min.js"   integrity="sha256-gvQgAFzTH6trSrAWoH1iPo9Xc96QxSZ3feW6kem+O00="   crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
</head>
<body>
<?php include dirname(__file__).'/layout/header.php'; ?>
  <div class="container">
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h3 id="myModalLabel">Delete</h3>
        </div>
    <div class="modal-body">
        <p></p>
    </div>
    <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
      <button data-dismiss="modal" class="btn red" id="btnYes">Confirm</button>
    </div>
    </div>
   <table class="table table-striped table-hover table-users">
          <thead>
            <tr>
              
              <th class="hidden-phone">Username</th>
              <th>Firstname</th>
              <th>Lastname</th>
              <th class="hidden-phone">Email</th>
              <th class="hidden-phone">Province</th>
              <th class="hidden-phone">Member date</th>
              <th>State</th>
              <th></th>
              <th></th>
            </tr>
          </thead>

          <tbody>
              <?php foreach($UserController->setUser() as $key => $user){ ?>
                  <tr>                           
                    <td class="hidden-phone">Username</td>
                    <td><?php isset( $user->name)?  $user->name : $user->name = '';  echo $user->name; ?> </td>
                    <td><?php isset($user->lastname)?  $user->lastname : $user->lastname='';   echo $user->lastname;?></td>
                    <td class="hidden-phone"><?php isset($user->email)?  $user->email :  $user->email= '';  echo $user->email; ?></td>
                    <td class="hidden-phone">active</td>
                    <td class="hidden-phone">10/12/1999</td>                             
                    <td><span class="label label-warning">Not Active</span></td>                                        
                    <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>
                      <td><a href="#" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                  </tr>
                <?php } ?>
            </tbody>

        </table>

  </div>
 

 </body>
</html>
<style>
  
.bd-example {
    position: relative;
    padding: 1rem;
    margin: 1rem -1rem;
    border: solid #f7f7f9;

 /*   border-width: .2rem 0 0;*/
}

body {

/*    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;*/
/*    font-size: 1rem;*/
    line-height: 1.5;
    color: #373a3c;
    background-color: #fff;
}

</style>
<script>
$( document ).ready(function() {

    $("#formulario").validate({
        rules: {
          // nombre : "required",
          nombre: {
            required: true,
            lettersonly: true
          }, 

          email: {
            required: true
          }, 



          password: {
            required: true
          },
           messages: {
 
      nombre: {
        remote: "Email ya está en uso."
      }
    }  

         }  
         
      });




//   jQuery.validator.addMethod("lettersonly", function(value, element) 
// {
// return this.optional(element) || /^[a-z," "]+$/i.test(value);
// }, "Letters and spaces only please"); 



  jQuery.extend(jQuery.validator.messages, {
  required: "Este campo es obligatorio.",
  remote: "Por favor, rellena este campo.",
  email: "Por favor, escribe una dirección de correo válida",
  url: "Por favor, escribe una URL válida.",
  date: "Por favor, escribe una fecha válida.",
  dateISO: "Por favor, escribe una fecha (ISO) válida.",
  number: "Por favor, escribe un número entero válido.",
  digits: "Por favor, escribe sólo dígitos.",
  creditcard: "Por favor, escribe un número de tarjeta válido.",
  equalTo: "Por favor, escribe el mismo valor de nuevo.",
  accept: "Por favor, escribe un valor con una extensión aceptada.",
  maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
  minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
  rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
  range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
  max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
  min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
});
 
  
     $( ".button-submit" ).on( "click", function() {
      console.log('safsaf');
      $("#formulario").valid(); 
       // $.post( "../controller/userAjax.php",$( "#formulario" ).serialize(), function( data ){
       //     console.log(data);
       // });
       jQuery.validator.addMethod("lettersonly", function(value, element) 
{
return this.optional(element) || /^[a-z," "]+$/i.test(value);
}, "Letters and spaces only please"); 


});
     });
 


// override jquery validate plugin defaults
$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }

});


  


</script>
