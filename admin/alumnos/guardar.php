<?php
include('../../conexion.php');
include('../../Login/iniciar.php');
	
	//recuperar las variables
	$cif=$_POST['cif'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$carrera=$_POST['carrera'];

	//Recuperamos el idcarrera, ya que el usuario ingresa el nombre de la carrera
	$recuperarID="SELECT idcarrera as idcarrera from oferta_academica where nombre='$carrera'";
	$consulta = mysqli_query($conexion, $recuperarID);
	$array = mysqli_fetch_array($consulta);
	$idcarrera= $array['idcarrera'];

	//hacemos la sentencia de sql
	$sql="INSERT into alumnos VALUES('$cif','$nombre','$apellido')";
	$sqk="INSERT into oferta_alumnos VALUES ('$idcarrera','$cif')";
	//verificamos la ejecucion

	if(mysqli_query($conexion, $sql) && mysqli_query($conexion, $sqk)){
		header("Location: https://universidad-class-test.herokuapp.com/admin/alumnos/alumnos.php");
	}
	else{
		echo "Ya existe un alumno con ese numero de carnet";
	
		
	}
	

?>

