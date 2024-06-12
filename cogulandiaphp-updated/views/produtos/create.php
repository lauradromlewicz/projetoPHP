<!DOCTYPE html>
<html>
<head>
    <title>Criar Produto</title>
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
            <h1>Criar Produto</h1>
            <form action="../../controllers/produtoController.php" method="POST">
                <input type="hidden" name="acao" value="criar">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" required>
                <label for="descricao">Descrição:</label>
                <input type="text" name="descricao" required>
                <label for="preco">Preço:</label>
                <input type="number" step="0.01" name="preco" required>
                <input type="submit" value="Criar">
            </form>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-bottom">
            <p>&copy; 2024 Cogulandia. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
