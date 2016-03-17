<?php
require "../config/db.php";
error_reporting(E_ALL);
define("MAXSIZE", 100);

Class  UserModel    {

	private $database;

	public function __CONSTRUCT(){
        $this->database = Database::getInstance();
    }
	
	public function GetUser(){
		// $db = Database::getInstance();
	    $mysqli = $this->database->getConnection(); 
	    $sql_query = "SELECT * FROM users";
	    $getResult = $this->database->getQuery($sql_query);
        if(isset($getResult) && count($getResult) >= 0){
              return $getResult;
        }
	   	// $result = $mysqli->query($sql_query);
	    // if ($result = $mysqli->query($sql_query)) {
	    //      while ($obj = $result->fetch_object()) {
	    //         return $obj;
	    //     }
	    // }
	     return false;
    }


    public function showCountries(){
       $sql = "SELECT * from country";
       $GetUser = self::GetUserFormat($sql);
       if(isset($GetUser)){
           return $GetUser;
        }else{
           return false;
        }
    }



    public function showUser($id){
       $sql = "SELECT * from users where id_user = $id";
       $GetUser = self::GetUserFormat($sql);
       if(isset($GetUser)){
           return $GetUser;
        }else{
           return false;
        }
    }

    public function GetUserFormat($sql){
      $mysqli = $this->database->getConnection(); 
      $getResult = $this->database->getQuery($sql);
        if(isset($getResult) && count($getResult) >= 0){
              return $getResult;
        }
       return false;
    }
    public function getJsonUser($jsonUser){
      $mysqli = $this->database->getConnection(); 
      $password= crypt($jsonUser['password']);
	    $sql_query = "INSERT INTO users (name, email, password, city, comment) VALUES ('$jsonUser[name]', '$jsonUser[email]', '$password', '$jsonUser[city]', '$jsonUser[comment]')";
         $result = $mysqli->query($sql_query);
        if( $result  !== false ) { 
             return true;
        } else {
            return false;
        }
    }


    public function getJsonUserWalk($jsonUser){
      $jsonUser['password'] = crypt($jsonUser['password']);
      foreach( $jsonUser as $key => $json){ 
          $arrayIndex[] = $key;
          $arrayValues[] = "'".$json. "'";
        }
      $Index = implode(",", $arrayIndex);
      $Values = implode(",", $arrayValues);
      $mysqli = $this->database->getConnection(); 
      $sql_query = "INSERT INTO users ($Index) VALUES ($Values)";
         $result = $mysqli->query($sql_query);
        if( $result  !== false ) { 
             return true;
        } else {
            return false;
        }
    }





    	
}

	// $objeto = new UserModel();
 //  	echo print_r($objeto->GetUser());


  	// echo MAXSIZE;


?>
 