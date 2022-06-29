<?php
class alerta
{
    private $titulo;
    private $tipo;
    private $estado;
    private $cidade;
    private $contato;
    private $profissao;
    private $registro;
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
        if ($this->tipo == "Fornecer ajuda") {
            if (!empty($this->titulo) and !empty($this->tipo) and !empty($this->estado) and !empty($this->cidade) and !empty($this->contato) and !empty($this->profissao) and !empty($this->registro) and !empty($this->descricao)) {
                $cadastrar_alerta = "INSERT INTO alerta(Titulo, Tipo, Estado, Cidade, Contato, Registro, Profissao, Descricao, Estatus, Tempo, ID_usuario) VALUES ('$this->titulo', '$this->tipo', '$this->estado', '$this->cidade', 
                '$this->contato', '$this->registro', '$this->profissao', '$this->descricao', '{$this->getEstatus()}', '{$this->getTempo()}', '$id_user')";
                mysqli_query($conex, $cadastrar_alerta);
                header('location: ../index.php');
            }
        } else {
            if (!empty($this->titulo) and !empty($this->tipo) and !empty($this->estado) and !empty($this->cidade) and !empty($this->contato) and !empty($this->descricao)) {
                $cadastrar_alerta = "INSERT INTO alerta(Titulo, Tipo, Estado, Cidade, Contato, Descricao, Estatus, Tempo, ID_usuario) 
                VALUES ('$this->titulo', '$this->tipo', '$this->estado', '$this->cidade', '$this->contato', '$this->descricao', '{$this->getEstatus()}', '{$this->getTempo()}', '$id_user')";
                mysqli_query($conex, $cadastrar_alerta);
                header('location: ../index.php');
            }
        }
    }

    public function excluir_alerta()
    {
        $conex = mysqli_connect("localhost", "root", "", "alerte");
        $idalerta = $_GET['id_alerta'];
        mysqli_query($conex, "UPDATE alerta SET Estatus = 'INATIVO' WHERE ID = '$idalerta'");
        header('location: ../index.php');
    }

    public function denunciado()
    {
        $conex = mysqli_connect("localhost", "root", "", "alerte");
        $idalerta = $_GET['id_alerta'];
        $buscar = "SELECT * FROM alerta WHERE ID='$idalerta'";
        $resultado = mysqli_query($conex, $buscar);
        $row_alerta = mysqli_fetch_assoc($resultado);
        $total = $row_alerta['Denuncias'] + 1;
        mysqli_query($conex, "UPDATE alerta SET Denuncias = '$total' WHERE ID = '$idalerta'");
        header('location: index.php');
    }
}
