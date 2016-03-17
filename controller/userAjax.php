<?php
require "../model/UserModel.php";

$model = new UserModel();

$product_id=isset($_POST['firstname']) ? $_POST['firstname'] : die('ERROR: Product ID not found.');
	echo json_encode('holaa');
if(isset($_GET['edit'])){
	echo json_encode('nfjsanfjnsajfn');
	}


if(isset($_POST['firstname']) && !isset($_GET['edit'])){
    $valueForm = $_POST;
	$modelTest = $model->getJsonUserWalk($valueForm);
	$response = array();
  		if($modelTest){
     		$response = array('response' => 'success', 'message' => 'Se ha Cargado el formulario correctamente');
		}else{
			$response = array('response' => 'failed', 'message' => 'Ha ocurrido un error intente nuevamente');	
		}
    echo json_encode($response);

}

if(isset($_GET['edit'])){
	$valueForm = $_POST;
	$modelTest = $model->getJsonUserWalk($valueForm);
	$response = array();
  		if($modelTest){
     		$response = array('response' => 'success', 'message' => 'Se ha Cargado el formulario correctamente');
		}else{
			$response = array('response' => 'failed', 'message' => 'Ha ocurrido un error intente nuevamente');	
		}
    echo json_encode($response);
}




?>