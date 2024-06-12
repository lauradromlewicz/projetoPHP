<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Cogulandia</title>
    <link rel="stylesheet" href="../../style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="../Imgs/cogulogos.jpg"><img src="../Imgs/cogulogos.jpg" alt="Minha Logo"></a>
            </div>
            <ul class="nav-links">
                <li><a href="../auth/logout.php" class="btn-login">Sair</a></li>
                <li><a href="../../views/dashboard.php" class="btn-login">Voltar ao Dashboard</a></li>
            </ul>
        </nav>
    </header>
    <div class="dashboard-wrapper">
        <div class="dashboard">
            <h1>Sua Conta </h1><br><br>
            <div class="crud-section">
                <ul>
                    
                    <li><a href="../contas/update.php?id=<?php echo $usuario['id']; ?>">Atualizar Dados de Login</a></li>
                    <li><a href="../contas/delete.php?id=<?php echo $usuario['id']; ?>">Excluir Conta</a></li>

                </ul>
            </div><br><br>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-bottom">
            <p>&copy; 2024 Cogulandia. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
