<?php
session_start();
include_once __DIR__ . '/../models/usuario.php';
require_once __DIR__ . '/../config/conexao.php';

class UsuarioController {
    public function criar($nome, $email, $senha) {
        Usuario::criar($nome, $email, $senha);
        header('Location: ../views/dashboard.php');
    }

    public function listar() {
        return Usuario::listar();
    }

    public function atualizar($id, $nome, $email, $senha) {
        Usuario::atualizar($id, $nome, $email, $senha);
        header('Location: ../views/dashboard.php');
    }

    public function deletar($id) {
        Usuario::deletar($id);
        header('Location: ../views/dashboard.php');
    }

    public function registrar($nome, $email, $senha) {
        Usuario::criar($nome, $email, $senha);
        $_SESSION['email'] = $email;
        header('Location: ../views/dashboard.php');
    }

    public function autenticar($email, $senha) {
        $usuario = Usuario::autenticar($email, $senha);
        if ($usuario) {
            $_SESSION['usuario'] = $usuario;
            
            if (isset($_POST['lembrar'])) {
                setcookie('email', $email, time() + (86400 * 30), "/");
            } else {
                setcookie('email', '', time() - 3600, "/");
            }

            header('Location: ../views/dashboard.php');
        } else {
            header('Location: ../views/auth/login.php?erro=1');
        }
    }
}

// Roteamento
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new UsuarioController();
    $acao = $_POST['acao'];
    
    switch ($acao) {
        case 'criar':
            $controller->criar($_POST['nome'], $_POST['email'], $_POST['senha']);
            break;
        case 'atualizar':
            $controller->atualizar($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['senha']);
            break;
        case 'deletar':
            $controller->deletar($_POST['id']);
            break;
        case 'registrar':
            $controller->registrar($_POST['nome'], $_POST['email'], $_POST['senha']);
            break;
        case 'autenticar':
            $controller->autenticar($_POST['email'], $_POST['senha']);
            break;
    }
}