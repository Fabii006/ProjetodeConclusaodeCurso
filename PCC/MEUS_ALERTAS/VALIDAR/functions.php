<?php

function getMyAlert($conex){
	$id = $_COOKIE['ID'];
	$query = "SELECT * FROM alerta WHERE ID_usuario = '$id' AND Estatus = 'ATIVO' ORDER BY id DESC";
	$result = $conex->query($query);
	$dados = [];
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$dados[] = $row;
		}
	}
	return $dados;

}