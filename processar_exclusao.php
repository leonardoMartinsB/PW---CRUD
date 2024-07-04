<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmar'])) {
    $id = $_POST['id'];

    require_once 'conexao.php';

    $sql = "DELETE FROM funcionarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Funcionário Excluído">
        <meta name="keywords" content="HTML, CSS, PHP">
        <meta name="author" content="Leo - Pedro">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="conf/css_bootstrap/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="estilo/delete.css">
        <link rel="shortcut icon" href="assets/imagens/funcionarios.png" type="image/funcionario-icon">

        <title>Funcionário Excluído | Funcionário</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">XPTO</a>
            </div>
        </nav>
        <div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h2 class="card-title mb-4">Funcionário Excluído com Sucesso</h2>
                    <p class="card-text">O funcionário com ID '<?php echo $id; ?>' foi deletado do sistema.</p>
                    <hr>
                    <div class="mt-4">
                        <a href="deletar.php" class="btn btn-primary mb-2">Deletar Novo Funcionário</a><br>
                        <a href="index.php" class="btn btn-danger">Voltar ao Menu Principal</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="conf/js_bootstrap/bootstrap.bundle.min.js"></script>
    </body>
</html>

<?php
    } else {
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Erro ao Excluir Funcionário">
        <meta name="keywords" content="HTML, CSS, PHP">
        <meta name="author" content="Leo - Pedro">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="conf/css_bootstrap/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="estilo/delete.css">
        <link rel="shortcut icon" href="assets/imagens/funcionarios.png" type="image/funcionario-icon">

        <title>Erro ao Excluir Funcionário | Funcionários Empresa</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">XPTO</a>
            </div>
        </nav>
        <div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h2 class="card-title mb-4">Erro ao Excluir Funcionário</h2>
                    <p class="card-text">Ocorreu um erro ao tentar excluir o funcionário com ID '<?php echo $id; ?>'.</p>
                    <div class="mt-4">
                        <a href="deletar.php" class="btn btn-danger">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="conf/js_bootstrap/bootstrap.bundle.min.js"></script>
    </body>
</html>

<?php
    }
    $stmt->close();
    $conn->close();
    
    } else {
     header("Location: deletar.php");
     exit();
    }
?>