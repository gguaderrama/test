<?php
require "../model/UserModel.php";
Class UserController  {

	private $model;
  public static $_instance; //The single instance

	 public function __CONSTRUCT(){
        $this->model = new UserModel();
    }

  public static function getUserController() {
    if(!self::$_instance) { // If no instance then make one
      self::$_instance = new self();
    }
    return self::$_instance;
  }

  public function getCountries() {
    $objeto =  $this->model;
    $showCountries = $objeto->showCountries();
       return  $showCountries;
  }
      

	public function setUser() {
    $objeto =  $this->model;
  	$GetUser = $objeto->GetUser();
       return  $GetUser;
  }

  public function getUserEdit($id) {
    $objeto =  $this->model;
    $GetUser = $objeto->showUser($id);
       return  $GetUser;
  }



  function setFlashValue($value=false){
    isset($value)?  $value : $value='';   
        return $value;
  }




}
	// $objeto = new UserController();
 //  	echo print_r($objeto->GetUser());



  // $objeto = new UserModel();
  //  echo print_r($objeto->GetUser());



?>