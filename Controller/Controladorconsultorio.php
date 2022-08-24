<?php
require_once "../Config/conexionpoo.php";
require_once "../Model/Consultorio.php";
require_once "../View/Fconsultorio.php";

if(isset($_POST["registroConsul"])){
	$idconsultorio =$_POST["txtnumconsul"];
	$nomconsultorio =$_POST["txtnomconsul"];

	$consul = new Consultorio() ;
	$reg =$consul->registroconsultorio($idconsultorio,$nomconsultorio);
	if($reg){
		print "<script>alert('\"Consultorio registrado.\"');window.location = '../View/Fconsultorio.php';</script>";
	} 
	else{
		print "<script>alert('\"No se puede registrar consultorio.\"');window.location = '../View/Fconsultorio.php';</script>";
	}
}


?>