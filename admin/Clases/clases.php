<?php 

include('../../conexion.php');
include('../../Login/iniciar.php');
 
 ?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../../alumnos.css">
	<link rel="stylesheet" type="text/css" href="../../pop-up.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
	
	<title>Matricula</title>
</head>
<body>
<div id="container">
			<?php include ('../../sidebar.php')?>

		<div id="main">
				<div class="contenedor-tabla"> 
					<h2>Matricula de clases </h2>
					<input type="text" name="search" id="search" class="form-control" placeholder="Buscar en tabla" />  
					<br>
					<table class="tabla" id="buscador">
						<thead>
                            <tr>
                                <td>ID Clase</td>
                                <td>Codigo</td>
                                <td>Nombre</td>
								<td>Acciones</td>
                            
                            </tr>
						</thead>
                        <?php 
                        $sql="SELECT * from materias";
                        $result=mysqli_query($conexion,$sql);

                        while($mostrar=mysqli_fetch_array($result)){
							echo "
							<tbody>
							<tr>
                            <td>".$mostrar['idmateria']."</td>
                            <td>".$mostrar['codigo']."</td>
                            <td>".$mostrar['nombre']."</td>
						
							<td>
							

							<button class='pop-up-del'>
							<a>Borrar</a>
							</button>
							</td>
                        
							</tr>
							</tbody>
							<div class='pop-up-borrar'>
										<div>
											<p>¿Esta seguro?</p>
											<button class='pop-up-del'>
												<a href='deleteclases.php?pn=$mostrar[idmateria]&sc=$mostrar[codigo]'>Borrar</a>
											</button>
											<br>
											<br>
											<input class= 'pop-up-cancel' type='button' value='Cancelar'>
										</div>
									</div>";
                                
                        ?>
                        
                    <?php 
                    }
                    ?>
                    </table>
				
				</div>
			
			<div class="form col">
			<h2>Registrar Materia</h2>	
				<form action="insertclases.php" method="POST" autocomplete="off">
                <br>
					<p>Codigo</p>
					
					<br>
					<input type="text" name="codigo" placeholder="Codigo de Clase" maxlength="5" required >
                    <br>
                    <br>

					<p>Nombre de la Materia</p>
                    <br>
					<input type="text" name="nombre" placeholder="Nombre de la clase" maxlength="45"  required >
					
					
		
					<br>
					<br>
					
					<div class="pop-up">
						<div >
							<p>¿Esta seguro?</p>
							<input href='insertcarrera.php' type="submit" value="Confirmar">
							<br>
							<br>
							<input class= "pop-up-cancel" type="button" value="Cancelar">
						</div>
					</div>
				</form>
				<button class="pop-up-activate">Enviar</button>
			</div>
	</div>
	</div>


	</body>
	<script src="../../pop-up.js"></script>
	</html>
	<?php include ('../main/searchbar.php')?>