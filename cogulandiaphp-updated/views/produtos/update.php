<!DOCTYPE html>
<html>
<head>
    <title>Atualizar Produto</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="../Imgs/cogulogos.jpg"><img src="../Imgs/cogulogos.jpg" alt="Minha Logo"></a>
            </div>
        </nav>
    </header>
    <div class="login-wrapper">
        <div class="login">
            <h1>Atualizar Produto</h1>
            <?php
            include_once __DIR__ . '/../../controllers/ProdutoController.php';

            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $controller = new ProdutoController();
                $id = $_GET['id'];
                $produtos = $controller->listar();
                $produto = null;

                foreach ($produtos as $p) {
                    if ($p['id'] == $id) {
                        $produto = $p;
                        break;
                    }
                }

                if ($produto):
            ?>
                    <form action="<?php echo '../../controllers/ProdutoController.php'; ?>" method="POST">
                        <input type="hidden" name="acao" value="atualizar">
                        <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" value="<?php echo $produto['nome']; ?>" required>
                        <label for="descricao">Descrição:</label>
                        <input type="text" name="descricao" value="<?php echo $produto['descricao']; ?>" required>
                        <label for="preco">Preço:</label>
                        <input type="number" step="0.01" name="preco" value="<?php echo $produto['preco']; ?>" required>
                        <input type="submit" value="Atualizar">
                    </form>
            <?php
                else:
                    echo "<p>Produto não encontrado.</p>";
                endif;
            } else {
                echo "<p>ID inválido.</p>";
            }
            ?>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-bottom">
            <p>&copy; 2024 Cogulandia. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
