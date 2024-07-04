<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Alterar Dados do Funcionário">
        <meta name="keywords" content="HTML, CSS, PHP">
        <meta name="author" content="Seu Nome">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="conf/css_bootstrap/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="estilo/alterar.css">
        <link rel="shortcut icon" href="assets/imagens/funcionarios.png" type="image/funcionario-icon">
        
        <title>Alterar Funcionário | Funcionários Empresa</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">XPTO</a>
            </div>
        </nav>
        <div class="container" style="margin-top: -50px;">
            <div class="row mt-5">
                <div class="col-md-6 offset-md-3">
                    <div class="card shadow">
                        <div class="card-body text-center">
                            <h2 class="card-title mb-4">Alterar Dados do Funcionário</h2>
                            <?php
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                require_once 'conexao.php';
                                $sql = "SELECT * FROM funcionarios WHERE id = ?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("i", $id);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $nome = $row['nome'];
                                    $endereco = $row['endereco'];
                                    $idade = $row['idade'];
                                    $data_nascimento = $row['data_nascimento'];
                                    $foto = $row['foto_blob'];
                            ?>
                                    <form action="processar_alteracao.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="mb-3">
                                            <label for="nome" class="form-label">Nome:</label>
                                            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="endereco" class="form-label">Endereço:</label>
                                            <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $endereco; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="idade" class="form-label">Idade:</label>
                                            <input type="number" class="form-control" id="idade" name="idade" value="<?php echo $idade; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?php echo $data_nascimento; ?>" required>
                                        </div><hr>
                                        <div class="mb-3">
                                            <label for="foto" class="form-label">Foto:</label>
                                            <input type="file" class="form-control" id="foto" name="foto"><br>
                                            <p class="text-muted">Deixe em branco para manter a foto atual.</p><hr>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="alterar">Salvar Alterações</button>
                                        <a href="index.php" class="btn btn-danger">Cancelar</a>
                                    </form>
                            <?php
                                } else {
                                    echo "<p class='card-text'>ID de Funcionário não encontrado.</p>";
                                    echo "<a href='index.php' class='btn btn-danger'>Voltar ao Menu Principal</a>";
                                }
                                $stmt->close();
                                $conn->close();
                            } else {
                                echo "<p class='card-text'>Por favor, especifique o ID do funcionário que deseja alterar.</p>";
                                echo "<a href='index.php' class='btn btn-danger'>Voltar ao Menu Principal</a>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="conf/js_bootstrap/bootstrap.bundle.min.js"></script>
    </body>
</html>