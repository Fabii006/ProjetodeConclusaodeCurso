<?php
SESSION_start();
class usuario
{
    private $nome;
    private $sobrenome;
    private $nome_social;
    private $usuario;
    private $email;
    private $cpf;
    private $senha;
    private $nascimento;
    private $genero;
    private $imagem_perfil;

    public function set($name, $value)
    {
        $this->$name = $value;
    }
    public function get($name)
    {
        return $this->$name;
    }

    public function getStatus()
    {
        $ativo = 'ATIVO';
        return $ativo;
    }

    public function cadastrar()
    {
        $conex = mysqli_connect("localhost", "root", "", "alerte");
        if (!empty($this->nome) and !empty($this->sobrenome) and !empty($this->usuario) and !empty($this->email) and !empty($this->cpf) and !empty($this->senha) and !empty($this->nascimento) and !empty($this->genero)) {
            //Criptografando a senha
            $this->senha = password_hash($this->senha, PASSWORD_DEFAULT);
            //Inserindo usuário no Banco de dados
            $cadastrar_usuario = "INSERT INTO usuario(Nome, Sobrenome, Nome_social, Usuario, Email, Senha, Nascimento, Genero, Imagem_perfil, CPF, Status) 
            VALUES ('$this->nome', '$this->sobrenome', '$this->nome_social', '$this->usuario', '$this->email', '$this->senha','$this->nascimento', '$this->genero', 'unnamed.png', '$this->cpf', '{$this->getStatus()}')";
            mysqli_query($conex, $cadastrar_usuario);
        } else {
            $_SESSION['msg'] = "<p style='color: red;'>Preencha todos os campos!</p>";
            header('Location: ../index.php');
        }
        if (mysqli_insert_id($conex)) {
            $_SESSION['msg2'] = "<p style='color: green;'>Cadastrado com sucesso!</p>";
            header('location: ../index.php?login=true');
        } else {
            $_SESSION['msg'] = "Erro ao cadastrar o Usuário!";
            header('Location: ../index.php');
        }
    }

    public function logar()
    {
        $conex = mysqli_connect("localhost", "root", "", "alerte");
        if ((!empty($this->usuario)) && (!empty($this->senha))) {
            //Buscando usuário no Banco de Dados
            $busca_usuario = "SELECT * FROM usuario WHERE Usuario='$this->usuario' LIMIT 1";
            $resultado_do_usuario = mysqli_query($conex, $busca_usuario);
            if ($resultado_do_usuario) {
                $row_usuario = mysqli_fetch_assoc($resultado_do_usuario);
                if (password_verify($this->senha, $row_usuario['Senha'])) {
                    if ($row_usuario['Status'] == 'ATIVO') {
                        if ($row_usuario['ID'] == '1') {
                            setcookie('continuar_logado', '1', time() + (60 * 60 * 24), '/');
                            setcookie("ID", "{$row_usuario['ID']}", time() + (60 * 60 * 24), '/');
                            header("Location: ../../MODERADOR/ALERTAS/index.php");
                        } else {
                            setcookie('continuar_logado', '1', time() + (60 * 60 * 24), '/');
                            setcookie("ID", "{$row_usuario['ID']}", time() + (60 * 60 * 24), '/');
                            header("Location: ../../ALERTAS/index.php");
                        }
                    } else {
                        header('Location: ../index.php?login=true');
                        $_SESSION['msg2'] = "Conta inativa!";
                    }
                } else {
                    $_SESSION['msg2'] = "<p style='color: red; padding: 6px 20px;'>Usuário ou senha incorreta!</p>";
                    header('Location: ../index.php?login=true');
                    return false;
                }
            }
        }
    }

    public function editar()
    {
        $conex = mysqli_connect("localhost", "root", "", "alerte");
        //Buscando usuário no Banco de Dados.
        $buscar_user = "SELECT ID FROM usuario WHERE Usuario='$this->usuario'";
        $resultado_user = mysqli_query($conex, $buscar_user);
        if (!empty($this->usuario) or !empty($this->email) or !empty($this->genero)) {
            $id = intval($_COOKIE['ID']);
            $pasta = '../IMAGENS_PERFIL/';
            $this->imagem_perfil = $_FILES['imagem']['name'];
            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $pasta . $this->imagem_perfil)) {
                mysqli_query($conex, "UPDATE usuario SET Imagem_perfil = '$this->imagem_perfil' WHERE ID = '$id'");
                header('location: ../PERFIL/index.php');
            }
            if ($resultado_user->num_rows != 0) {
                $_SESSION['msg'] = "Usuário indisponível!";
                header('location: ../PERFIL/index.php');
            } else {
                mysqli_query($conex, "UPDATE usuario SET Usuario = '$this->usuario' WHERE ID = '$id'");
                header('location: ../PERFIL/index.php');
            }
            if ($this->email) {
                mysqli_query($conex, "UPDATE usuario SET Email = '$this->email' WHERE ID = '$id'");
                header('location: ../PERFIL/index.php');
            }
            if ($this->genero) {
                mysqli_query($conex, "UPDATE usuario SET Genero = '$this->genero' WHERE ID = '$id'");
                header('location: ../PERFIL/index.php');
            }
        }
    }

    public function alterar_senha()
    {
        $conex = mysqli_connect("localhost", "root", "", "alerte");
        $id = intval($_COOKIE['ID']);
        $this->senha = password_hash($this->senha, PASSWORD_DEFAULT);
        mysqli_query($conex, "UPDATE usuario SET Senha = '$this->senha' WHERE ID = '$id'");
        $_SESSION['msg'] = "<p style='color: green;'>Senha alterada com sucesso!</p>";
        header('location: ../index.php');
    }
}

class moderador extends usuario
{

    public function remover_alerta()
    {
        $conex = mysqli_connect("localhost", "root", "", "alerte");
        $id = $_POST['id_alerta'];
        mysqli_query($conex, "UPDATE alerta SET Estatus = 'REMOVIDO' WHERE ID = '$id'");
        header('location: ../index.php');
    }

    public function desativar_user()
    {
        $conex = mysqli_connect("localhost", "root", "", "alerte");
        $id = $_GET['id_user'];
        mysqli_query($conex, "UPDATE Usuario SET Status = 'INATIVO' WHERE ID = '$id'");
        header('location: ../index.php');
    }
}
