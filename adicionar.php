<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Adicionar Funcionário">
        <meta name="keywords" content="HTML, CSS, JavaScript, PHP">
        <meta name="author" content="Leo - Pedro">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="conf/css_bootstrap/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="estilo/add.css">
        <link rel="shortcut icon" href="assets/imagens/funcionarios.png" type="image/funcionario-icon">
        
        <title>Adicionar Funcionário | Funcionários Empresa</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">XPTO</a>
            </div>
        </nav>
        <div class="container my-2 d-flex align-items-center justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-white text-center">
                        <h2 class="card-title mb-0">Adicionar Funcionário</h2>
                    </div>
                    <div class="card-body p-4">
                        <form action="processar_adicao.php" method="POST" enctype="multipart/form-data">
                            <?php
                            if (isset($_GET['erro']) && $_GET['erro'] == 'id_duplicado') {
                                echo '<div class="alert alert-danger" role="alert">Erro: ID já registrado!</div>';
                            }
                            ?>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="id" class="form-label">ID</label>
                                    <input type="text" class="form-control" id="id" name="id" required maxlength="5">
                                </div>
                                <div class="col-md-6">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="endereco" class="form-label">Endereço</label>
                                    <input type="text" class="form-control" id="endereco" name="endereco" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="idade" class="form-label">Idade</label>
                                    <input type="number" class="form-control" id="idade" name="idade" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*" onchange="previewImage()" required>
                                </div>
                            </div>
                            <div class="image-preview-container">
                                <img id="imagePreview" class="image-preview" src="assets/imagens/sem-foto.png" alt="Pré-visualização da imagem">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success btn-block mt-3">Adicionar Dados</button>
                            </div>
                        </form>
                        <div class="mt-3 text-center">
                            <a href="index.php" class="btn btn-danger">Voltar para o Menu Principal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="conf/js_bootstrap/bootstrap/bootstrap.bundle.min.js"></script>
        <script src="assets/javascript/add.js"></script>
    </body>
</html>