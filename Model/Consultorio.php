<?php
require_once "../Config/conexionpoo.php";

class Consultorio extends Conectar{
	protected $Numconsul;
	protected $Nombreconsul;
	public function _construct(){
	parent::_construct();
}
	public function registroconsultorio($Numconsul,$Nombreconsul){
		$sql1 = "SELECT * FROM consultorios WHERE NumeroC = '$Numconsul";
		$resultado=$this->_bd->query($sql);
		$fila = mysqli_num_rows($resultado);
		if($fila >0){
			echo "<script>alert('Consultorio ya esta registrado');window.location = '../View/Fconsultorio.php';</script>";
		}
		else{
			$sql = "INSERT INTO consultorios(NumeroC,NombreC)VALUES('".$Numconsul."','".$Nombreconsul."')";
			$resultado=$this->_bd->query($sql);
			if(!$resultado){
				print "<script>alert('\"fallo al ingresar los datos.\"');window.location = '../View/Fconsultorio.php';</script>";
			}
			else{
				return $resultado;
				print "<script>alert('\"consultorio registrado.\"');window.location = '../View/Fconsultorio.php';</script>";
				$resultado->close();
				$this->_bd->close();
			}
		}
	}
	public function listarconsultorios(){
	$sql1="SELECT * FROM consultorios ORDER BY NumeroC";
	$Resul=$this->_bd->query($sql1);
	if($Resul->num_rowa > 0){
		while($row = $Resul->fetch_assoc()){
			$resultset[]=$row;
		}
	}
	return $resultset;
}
public function eliminarconsultorio(){
	$query="DELETE FROM consultorios WHERE NumeroC='$id'";
	$Resul=$this->_bd->query($query);
	if(!$Resul){
		print "<script>aletr(\"Registro eliminado\"); window.location='../View/Fconsultorios.php';</script>";
	}
	else{
		print "<script>aletr(\"No se puede eliminar\"); window.location='../View/Fconsultorios.php';</script>";
	}
}
}

?>