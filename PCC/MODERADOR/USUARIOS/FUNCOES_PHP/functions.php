<?php

function user_ativo($conex)
{
    $query = "SELECT * FROM usuario WHERE Status = 'ATIVO'";
    $result = $conex->query($query);
    $dados = [];
    while ($row = $result->fetch_assoc()) {
        $dados[] = $row;
    }
    return $dados;
}

function user_inativo($conex)
{
    $query = "SELECT * FROM usuario WHERE Status = 'INATIVO'";
    $result = $conex->query($query);
    $dados = [];
    while ($row = $result->fetch_assoc()) {
        $dados[] = $row;
    }
    return $dados;
}
