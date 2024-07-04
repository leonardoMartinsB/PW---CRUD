<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Excluir Funcionário">
        <meta name="keywords" content="HTML, CSS, PHP">
        <meta name="author" content="Leo - Pedro">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="conf/css_bootstrap/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="estilo/delete.css">
        <link rel="shortcut icon" href="assets/imagens/funcionarios.png" type="image/funcionario-icon">

        <title>Excluir Funcionário| Funcionários Empresa</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">XPTO</a>
            </div>
        </nav>
        <div class="d-flex justify-content-center align-items-center" style="height: calc(100vh - 60px);">
            <div class="card shadow" style="max-width: 600px; width: 100%;">
                <div class="card-body text-center">
                    <h2 class="card-title mb-4 text-decoration-underline">Buscar Funcionário para Deletar</h2>
                    <hr>
                    <form action="excluir_info.php" method="GET">
                        <div class="mb-3">
                            <label for="id" class="form-label">Digite o ID do Funcionário:</label>
                            <input type="text" class="form-control" id="id" name="id" required>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary me-2">Buscar Funcionário</button>
                            <a href="index.php" class="btn btn-danger">Voltar ao Menu Principal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="conf/js_bootstrap/bootstrap.bundle.min.js"></script>
    </body>
</html>