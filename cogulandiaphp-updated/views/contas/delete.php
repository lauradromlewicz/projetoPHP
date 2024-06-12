<div class="content">
        <h1>Deletar Usuário</h1>
        <?php
        include_once __DIR__ . '/../../controllers/UsuarioController.php';

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
                <p>ID: <?php echo $usuario['id']; ?></p>
                <p>Nome: <?php echo $usuario['nome']; ?></p>
                <p>Email: <?php echo $usuario['email']; ?></p>
                <form action="../../controllers/UsuarioController.php" method="POST">
                    <input type="hidden" name="acao" value="deletar">
                    <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                    <button type="submit">Confirmar Deleção</button>
                </form>
                <a href="read.php">Cancelar</a>
        <?php
            else:
                echo "<p>Usuário não encontrado.</p>";
            endif;
        } else {
            echo "<p>ID inválido.</p>";
        }
        ?>
    </div>