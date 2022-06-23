<?php

function solicitar($conex)
{
	$query = "SELECT * FROM usuario INNER JOIN alerta  ON alerta.ID_usuario = usuario.ID WHERE Estatus = 'ATIVO' AND Tipo = 'Solicitar ajuda' ORDER BY alerta.ID DESC";
	$result = $conex->query($query);
	$dados = [];
	while ($row = $result->fetch_assoc()) {
		$dados[] = $row;
	}
	return $dados;
}

function fornecer($conex)
{
	$query = "SELECT * FROM usuario INNER JOIN alerta  ON alerta.ID_usuario = usuario.ID WHERE Estatus = 'ATIVO' AND Tipo = 'Fornecer ajuda' ORDER BY alerta.ID DESC";
	$result = $conex->query($query);
	$dados = [];
	while ($row = $result->fetch_assoc()) {
		$dados[] = $row;
	}
	return $dados;
}