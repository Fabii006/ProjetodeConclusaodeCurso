<?php
$Buscar_usuario = "SELECT * FROM usuario";
$resultado_usuario = mysqli_query($conex, $Buscar_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

function getMyAlert($conex){
	$id = $_COOKIE['ID'];

	$query = "SELECT * FROM alerta WHERE ID_usuario = '$id' ORDER BY id";
	$result = $conex->query($query);

	$dados = [];
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$dados[] = $row;
		}
	}
	return $dados;

}