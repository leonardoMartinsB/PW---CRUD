<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Projeto CRUD PW2 PHP-SQL">
        <meta name="keywords" content="HTML, CSS, JavaScript, PHP">
        <meta name="author" content="Leo - Pedro">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="conf/css_bootstrap/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="estilo/style.css">
        <link rel="shortcut icon" href="assets/imagens/funcionarios.png" type="image/x-icon">

        <title>Menu Funcionário | Funcionários Empresa</title>
    </head>
    <body>
        <nav class="navbar bg-dark border-bottom border-body">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">XPTO</a>   
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">EMPRESA XPTO</h5>
            </div>
            <div class="offcanvas-body">
                <ul>
                    <li><a href="#">Sobre Nós</a></li>
                    <li><a href="#">Serviços</a></li>
                    <li><a href="#">Produtos</a></li>
                    <li><a href="#">Contato</a></li>
                    <li><a href="#">Carreiras</a></li>
                </ul>
                <hr>
                <h5>Login</h5>
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
            <div class="d-grid gap-2 col-6 mx-auto" style="border: 1px solid black; padding: 40px; border-radius: 15px; background-color: #f0f0f0;">
                <div class="col-12 text-center">
                    <h1>CADASTRO DE FUNCIONÁRIOS</h1>
                </div>
                <a href="adicionar.php" class="btn btn-outline-dark">Adicionar Funcionário</a>
                <a href="deletar.php" class="btn btn-outline-dark">Deletar Funcionário</a>
                <a href="buscar_alterar.php" class="btn btn-outline-dark">Alterar Funcionário</a>
                <a href="verfuncionarios.php" class="btn btn-outline-dark">Ver Funcionários</a>
            </div>
        </div>
        <script src="conf/js_bootstrap/bootstrap/bootstrap.bundle.min.js"></script>
    </body>
</html>