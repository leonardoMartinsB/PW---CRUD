<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Visualizar Funcionário">
        <meta name="keywords" content="HTML, CSS, PHP">
        <meta name="author" content="Seu Nome">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="conf/css_bootstrap/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="estilo/verfuncionarios.css">
        <link rel="shortcut icon" href="assets/imagens/funcionarios.png" type="image/funcionario-icon">
        
        <title>Visualizar Funcionário | Funcionários Empresa</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">XPTO</a>
            </div>
        </nav>
        <div class="container my-4">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card shadow-lg">
                        <div class="card-header bg-dark text-white">
                            <h5 class="card-title mb-0">Detalhes do Funcionário</h5>
                        </div>
                        <div class="card-body">
                            <?php
                            require_once 'conexao.php';

                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];

                                $sql = "SELECT * FROM funcionarios WHERE id = $id";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    echo "<div class='mb-3'><strong>ID:</strong> " . $row['id'] . "</div><hr>";
                                    echo "<div class='mb-3'><strong>Nome:</strong> " . $row['nome'] . "</div><hr>";
                                    echo "<div class='mb-3'><strong>Endereço:</strong> " . $row['endereco'] . "</div><hr>";
                                    echo "<div class='mb-3'><strong>Idade:</strong> " . $row['idade'] . " anos</div><hr>";
                                    echo "<div class='mb-3'><strong>Data de Nascimento:</strong> " . $row['data_nascimento'] . "</div><hr>";
                                    echo "<center><div class='mb-4'><strong>Foto:</strong><br><img src='data:image/jpeg;base64," . base64_encode($row['foto_blob']) . "' class='img-thumbnail' width='155'></div></center><hr>";
                                } else {
                                    echo "<div class='alert alert-warning'>Funcionário não encontrado.</div>";
                                }

                                $conn->close();
                            } else {
                                echo "<div class='alert alert-danger'>ID do funcionário não especificado.</div>";
                            }
                            ?>
                            <center>
                                <div class="mt-4">
                                    <a href="verfuncionarios.php" class="btn btn-danger">Voltar</a>
                                </div>
                            </center>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="conf/js_bootstrap/bootstrap.bundle.min.js"></script>
    </body>
</html>