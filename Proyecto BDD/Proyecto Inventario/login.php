<?php
session_start();
// Recuperar datos del formulario
$dni=$_POST['dni'];
$cla=$_POST['clave'];

include("conexion.php");

//Localizar el dni en la tabla usuarios
$sql="SELECT dni FROM usuarios WHERE dni='$dni'";

$registros=mysqli_query($conexion,$sql);
$total=mysqli_num_rows($registros);
if($total==0)
{
	echo "<H2>USUARIO NO EXISTE </H2>Pulse <a href='index.php'>aqu�</a> para continuar.";
}
else
{
	while($linea=mysqli_fetch_array($registros))
	{
		if($linea['clave']==$cla)
		{
			$_SESSION['dni']=$linea['dni'];
			$_SESSION['nombreusuario']=$linea['nombre'];
			if($linea['nif']!='R5000178J')
				header("location:interior.html");		}
		else
		{
			echo "<H2>CLAVE INCORRECTA </H2>Pulse <a href='index.php'>aqu�</a> para continuar.";
		}

	}
}


?>
