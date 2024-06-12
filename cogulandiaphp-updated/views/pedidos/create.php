<!DOCTYPE html>
<html>
<head>
    <title>Criar Pedido</title>
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
            <h1>Criar Pedido</h1>

            <form action="../../controllers/pedidoController.php" method="POST">
                <input type="hidden" name="acao" value="criar">
                <label for="cliente_id">Cliente ID:</label>
                <input type="number" name="cliente_id" required>
                <label for="produto_id">Produto ID:</label>
                <input type="number" name="produto_id" required>
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" required>
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
