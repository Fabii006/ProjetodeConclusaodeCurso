<?php

class alerta
{
    private $titulo;
    private $tipo;
    private $estado;
    private $cidade;
    private $contato;
    private $registro;
    private $profissao;
    private $descricao;

    public function set($name, $value)
    {
        $this->$name = $value;
    }
    public function get($name)
    {
        return $this->$name;
    }
    public function getTempo()
    {
        $data = new DateTime();
        return $data->format("d/m/Y");
    }
    public function getEstatus()
    {
        $ativo = 'ATIVO';
        return $ativo;
    }
    public function criar_alerta()
    {
        $conex = mysqli_connect("localhost", "root", "", "alerte");
        $id_user = $_COOKIE['ID'];
        $cadastrar_alerta = "INSERT INTO alerta(Titulo, Tipo, Estado, Cidade, Contato, Registro, Profissao, Descricao, Estatus, Tempo, ID_usuario) 
        VALUES ('$this->titulo', '$this->tipo', '$this->estado', '$this->cidade', '$this->contato', '$this->registro', '$this->profissao', '$this->descricao', '{$this->getEstatus()}', '{$this->getTempo()}', '$id_user')";
        mysqli_query($conex, $cadastrar_alerta);
    }

    public function excluir_alerta()
    {
        $conex = mysqli_connect("localhost", "root", "", "alerte");
        $idalerta = $_GET['id_alerta'];
        $query = "SELECT * FROM alerta";
        if (!empty($query)) {
            $query = mysqli_query($conex, "UPDATE alerta SET Estatus = 'INATIVO' WHERE ID = '$idalerta'");
            header('location: ../index.php');
        }
    }
}