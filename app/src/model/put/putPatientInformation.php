<?php
  //TODO: ALEX HACER QUE NO SE CREE U PACIENTE QUE YA SE CARGO PREVIAMENTE;
  include("./../connection.php");
  $_PUT = getPutRequestParameters();
  $id = $_PUT['id'];
  $dni = $_PUT['dni']; 
  $cuil = $_PUT['tramitNumber'];
  $name = $_PUT['name'];
  $surname = $_PUT['surname'];
  $dateBirth = $_PUT['dateBirth'];
  $gender =  $_PUT['gender'] ;
  $phone = $_PUT['phone'];
  $email = $_PUT['email'];
  $address = $_PUT['address'];
  $addressNumber = $_PUT['addressNumber'];
  $location = $_PUT['location'];

  if ( strcmp($location, "default" ) == 0 ) {
    $location = null;
  }

  if ( strcmp($gender, "default" ) == 0 ){
    $gender = null;
  }

  $sql = "UPDATE PERSONAL_INFORMATION SET dni = ?, tramit_nume= ? , name= ? , surname= ?, gender = ? , date_birth = ? , phone = ? , email = ? , address = ? , address_number = ? , PK_ID_LOCATION = ? WHERE ID_DNI = ? ";
  $typeOfParameters = "iissisissiis";
  $parameters = array($dni,$cuil,$name,$surname,$gender,$dateBirth,$phone,$email,$address,$addressNumber,$location,$id);
  $result= getPreparedStatement($sql,$typeOfParameters, $parameters);
  sendJson(null, $msg, null, null);