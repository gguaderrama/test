<?php
require dirname(__file__).'/../controller/UserController.php';
$UserController =  UserController::getUserController();

if(isset($_GET['user_id'])){
   $GetUser = $UserController->getUserEdit($_GET['user_id']);
}

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
    <div class="row">
<!--  <div class="alert alert-danger fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>Danger!</strong> This alert box indicates a dangerous or potentially negative action.
    </div> -->
    </div>
    <div class="row">
     <div class="col-md-3"></div>
      <div class="col-md-6">
    <div class="bd-example">
      <form id="formulario" method="get" action="" url="<?php if(isset($GetUser[0]->id_user)) echo 'userAjax.php?edit=true'; else echo 'userAjax.php';  ?>">
      <input type="hidden" name="form" value="<?php if(isset($GetUser[0]->id_user)) echo 'edit'; else echo 'insert';  ?>">
  <fieldset class="form-group">
    <label for="texto">firstname</label>
    <input type="text" class="form-control" id="name"  class="name required" placeholder="Enter name" name="firstname" value="<?php isset($GetUser[0]->firstname)?  $GetUser[0]->firstname : $GetUser[0]->firstname='';   echo $GetUser[0]->firstname;?>">
  </fieldset>
   <fieldset class="form-group">
    <label for="texto">lastname</label>
    <input type="text" class="form-control" id="name"  class="name required" placeholder="Enter name" name="lastname" value="<?php echo $UserController->setFlashValue($GetUser[0]->lastname); ?>">
  </fieldset>
  <fieldset class="form-group">
    <label for="exampleInputEmail1" >Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"  name="email" value="<?php echo $UserController->setFlashValue($GetUser[0]->email);?>">
    <small class="text-muted">We'll never share your email with anyone else.</small>
  </fieldset>
  <fieldset class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </fieldset>
  <fieldset class="form-group">
    <label for="exampleSelect1">Ciudad</label>
    <select class="form-control" id="exampleSelect1" name="country_id" class="required">
      <?php foreach($UserController->getCountries() as $countries) {  ?>
        <option value="<?php echo $countries->id; ?>"<?php (($countries->id == $GetUser[0]->country_id) ? 'selected="selected"' : null) ?>><?php echo $countries->name ?></option>
      <?php } ?>
    </select><?php if($countries->id == $GetUser[0]->country_id) echo " selected" ?>
  </fieldset>
   <fieldset class="form-group">
    <label for="Fecha de Nacimiento">Fecha de Nacimiento</label>
    <input type="text" class="form-control" id="date_birth" placeholder="Date" name="date_birth" value="<?php echo  $UserController->setFlashValue($GetUser[0]->date_birth);?>">
  </fieldset>
     <fieldset class="form-group">
    <label for="Fecha de Nacimiento">rfc</label>
    <input type="text" class="form-control" id="rfc" placeholder="rfc" name="rol_id"  value="<?php echo  $UserController->setFlashValue($GetUser[0]->rfc);?>">
  </fieldset>
  <fieldset class="form-group">
    <label for="exampleTextarea">Escribe tu comentario</label>
    <textarea class="form-control" id="exampleTextarea" rows="3"  name="comment" class="required" ><?php echo $UserController->setFlashValue($GetUser[0]->comment); ?></textarea>
  </fieldset>
  <button type="button" class="btn btn-primary button-submit">Submit</button>
</form>
</div>
</div>
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

var Url = $('form').attr('url');
 
$( ".button-submit" ).on( "click", function() {
      $("#formulario").valid(); 
       $.post( "../controller/"+Url,$( "#formulario" ).serialize(), function(data){
          var data = JSON.parse(data);
          if(data.response == 'success'){
              window.location.href="table.php?success="+data.response;
          }
       });
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
