<?php
session_start();
include_once __DIR__ . '/../models/pedido.php';
include_once __DIR__ . '/../models/cliente.php';
include_once __DIR__ . '/../models/produto.php';
require_once __DIR__ . '/../config/conexao.php';

class PedidoController {
    public function criar($cliente_id, $produto_id, $quantidade) {
        if (Cliente::clienteExiste($cliente_id) && Produto::produtoExiste($produto_id)) {
            Pedido::criar($cliente_id, $produto_id, $quantidade);
            header('Location: ../views/pedidos/read.php');
        } else if (Cliente::clienteExiste($cliente_id) && !Produto::produtoExiste($produto_id)){
            ?>
            <link rel="stylesheet" href="../style/style.css">
            <br><br>
            <header>
                <nav class="navbar">
                    <div class="logo">
                        <a href="../Imgs/cogulogos.jpg"><img src="../views/Imgs/cogulogos.jpg"></a>
                    </div>
                </nav>
            </header>
            <section>
                <h1>O produto com o ID especificado não existe.</h1><br><br>
                <ul>
                    <a href="../views/pedidos/create.php" class="btn">Criar Pedido Novamente</a>
                </ul>
            </section>
        <?php } else if (!Cliente::clienteExiste($cliente_id) && Produto::produtoExiste($produto_id)){
            ?> 
            <link rel="stylesheet" href="../style/style.css">
            <br><br>
            <header>
                <nav class="navbar">
                    <div class="logo">
                        <a href="../Imgs/cogulogos.jpg"><img src="../views/Imgs/cogulogos.jpg"></a>
                    </div>
                </nav>
            </header>
            <section>
                <h1>O cliente com o ID especificado não existe.</h1><br><br>
                <ul>
                    <a href="../views/pedidos/create.php" class="btn">Criar Pedido Novamente</a>
                </ul>
            </section>
        <?php } else {
            ?>
            <link rel="stylesheet" href="../style/style.css">
            <br><br>
            <header>
                <nav class ="navbar">
                    <div class="logo">
                        <a href="../Imgs/cogulogos.jpg"><img src="../views/Imgs/cogulogos.jpg"></a>
                    </div>
                </nav>
            </header>
            <section>
                <h1>O produto e o cliente com o IDs especificados não existem.</h1><br><br>
                <ul>
                    <a href="../views/pedidos/create.php" class="btn">Criar Pedido Novamente</a>
                </ul>
            </section>
        <?php 
        }
    }

    public function listar() {
        return Pedido::listar();
    }

    public function atualizar($id, $cliente_id, $produto_id, $quantidade) {
        if (Cliente::clienteExiste($cliente_id) && Produto::produtoExiste($produto_id)) {
            Pedido::atualizar($id, $cliente_id, $produto_id, $quantidade);
            header('Location: ../views/pedidos/read.php');
        } else if (Cliente::clienteExiste($cliente_id) && !Produto::produtoExiste($produto_id)){
            ?>
            <link rel="stylesheet" href="../style/style.css">
            <br><br>
            <header>
                <nav class="navbar">
                    <div class="logo">
                        <a href="../Imgs/cogulogos.jpg"><img src="../views/Imgs/cogulogos.jpg"></a>
                    </div>
                </nav>
            </header>
            <section>
                <h1>O produto com o ID especificado não existe.</h1><br><br>
                <ul>
                    <a href="../views/pedidos/read.php" class="btn">Voltar a tela de listagem</a>
                </ul>
            </section>
        <?php } else if (!Cliente::clienteExiste($cliente_id) && Produto::produtoExiste($produto_id)){
            ?> 
            <link rel="stylesheet" href="../style/style.css">
            <br><br>
            <header>
                <nav class="navbar">
                    <div class="logo">
                        <a href="../Imgs/cogulogos.jpg"><img src="../views/Imgs/cogulogos.jpg"></a>
                    </div>
                </nav>
            </header>
            <section>
                <h1>O cliente com o ID especificado não existe.</h1><br><br>
                <ul>
                    <a href="../views/pedidos/read.php" class="btn">Voltar a tela de listagem</a>   
                </ul>
            </section>
        <?php } else {
            ?>
            <link rel="stylesheet" href="../style/style.css">
            <br><br>
            <header>
                <nav class ="navbar">
                    <div class="logo">
                        <a href="../Imgs/cogulogos.jpg"><img src="../views/Imgs/cogulogos.jpg"></a>
                    </div>
                </nav>
            </header>
            <section>
                <h1>O produto e o cliente com o IDs especificados não existem.</h1><br><br>
                <ul>
                    <a href="../views/pedidos/read.php" class="btn">Voltar a tela de listagem</a>
                </ul>
            </section>
        <?php 
        }
    }

    public function deletar($id) {
        Pedido::deletar($id);
        header('Location: ../views/pedidos/read.php');
    }
}

// Roteamento
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new PedidoController();
    $acao = $_POST['acao'];
    
    switch ($acao) {
        case 'criar':
            $controller->criar($_POST['cliente_id'], $_POST['produto_id'], $_POST['quantidade']);
            break;
        case 'atualizar':
            $controller->atualizar($_POST['id'], $_POST['cliente_id'], $_POST['produto_id'], $_POST['quantidade']);
            break;
        case 'deletar':
            $controller->deletar($_POST['id']);
            break;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['acao'])) {
    $controller = new PedidoController();
    $acao = $_GET['acao'];
    
    switch ($acao) {
        case 'deletar':
            $controller->deletar($_GET['id']);
            break;
    }
}
?>
