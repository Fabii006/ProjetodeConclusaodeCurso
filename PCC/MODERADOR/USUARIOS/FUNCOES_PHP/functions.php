<?php

function user_ativo($conex)
{
    $query = "SELECT * FROM usuario WHERE Status = 'ATIVO' ORDER BY ID";
    $result = $conex->query($query);
    $dados = [];
    while ($row = $result->fetch_assoc()) {
        $dados[] = $row;
    }
    return $dados;
}

function user_inativo($conex)
{
    $query = "SELECT * FROM usuario WHERE Status = 'INATIVO' ORDER BY ID";
    $result = $conex->query($query);
    $dados = [];
    while ($row = $result->fetch_assoc()) {
        $dados[] = $row;
    }
    return $dados;
}
