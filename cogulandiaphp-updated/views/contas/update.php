<!DOCTYPE html>
<html>
<head>
    <title>Atualizar Pedido</title>
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
            <h1>Atualizar Usuário</h1>
            <?php
            include_once __DIR__ . '/../../controllers/UsuarioController.php';
            
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $id = $_GET['id'];
                // Restante do seu código para atualizar ou deletar o usuário
            } else {
                echo "ID inválido.";
            }
            
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $controller = new UsuarioController();
                $id = $_GET['id'];
                $usuarios = $controller->listar();
                $usuario = null;

                foreach ($usuarios as $u) {
                    if ($u['id'] == $id) {
                        $usuario = $u;
                        break;
                    }
                }

                if ($usuario):
            ?>
                    <form action="<?php echo '../../controllers/UsuarioController.php'; ?>" method="POST">
                        <input type="hidden" name="acao" value="atualizar">
                        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>" required>
                        <label for="email">Email:</label>
                        <input type="email" name="email" value="<?php echo $usuario['email']; ?>" required>
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha">
                        <input type="submit" value="Atualizar">
                    </form>
            <?php
                else:
                    echo "<p>Usuário não encontrado.</p>";
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
