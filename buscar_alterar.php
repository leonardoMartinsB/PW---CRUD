<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Buscar Funcionário para Alterar">
        <meta name="keywords" content="HTML, CSS, PHP">
        <meta name="author" content="Seu Nome">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="conf/css_bootstrap/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="estilo/alterar.css">
        <link rel="shortcut icon" href="assets/imagens/funcionarios.png" type="image/funcionario-icon">
        
        <title>Buscar para Alterar Funcionário | Funcionários EmpresaS</title>
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
                    <h2 class="card-title mb-4 text-decoration-underline">Buscar Funcionário para Alterar</h2>
                    <hr>
                    <form action="alterar.php" method="GET">
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