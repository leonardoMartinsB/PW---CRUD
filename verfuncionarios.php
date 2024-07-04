<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Ver Funcionários">
        <meta name="keywords" content="HTML, CSS, PHP">
        <meta name="author" content="Seu Nome">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="conf/css_bootstrap/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="estilo/ver_funcionarios.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="shortcut icon" href="assets/imagens/funcionarios.png" type="image/funcionario-icon">
        
        <title>Ver Funcionários | Funcionários Empresa</title>

        <style>
            body {
                font-family: 'Roboto', sans-serif;
                background-color: #d6ccc2;
                overflow-x: hidden;
            }

            .table th, .table td {
                vertical-align: middle;
            }

            .navbar-brand {
                font-size: 1.5rem;
                font-weight: bold;
            }

            .btn-visualizar {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                color: inherit; 
                background-color: transparent;
                border: none;
                padding: 0;
                cursor: pointer;
                font-size: 1.5rem; 
                width: 100%;
                height: 100%;
                text-align: center; 
                line-height: 1; 
                vertical-align: middle; 
            }
            .btn-visualizar .icon {
                margin-right: 5px; 
            }

            .btn-visualizar:hover, .btn-visualizar:focus {
                background-color: transparent;
            }

            .btn-voltar {
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">XPTO</a>
            </div>
        </nav>
        <div class="container my-4">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card shadow-lg">
                        <div class="card-header bg-dark text-white">
                            <h4 class="card-title mb-0">Ver Funcionários</h4s>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET" class="mb-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Pesquisar funcionários..." name="pesquisa" style="width: 300px;">
                                    <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
                                    <a href="verfuncionarios.php" class="btn btn-outline-secondary ms-1">Atualizar</a>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Endereço</th>
                                            <th>Idade</th>
                                            <th>Data de Nascimento</th>
                                            <th>Foto</th>
                                            <th>Visualização</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once 'conexao.php';

                                        $pesquisa = "";

                                        if (isset($_GET['pesquisa'])) {
                                            $pesquisa = $_GET['pesquisa'];
                                            
                                            $sql = "SELECT * FROM funcionarios WHERE nome LIKE '%$pesquisa%'";
                                        } else {

                                            $sql = "SELECT * FROM funcionarios";
                                        }

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row['id'] . "</td>";
                                                echo "<td>" . $row['nome'] . "</td>";
                                                echo "<td>" . $row['endereco'] . "</td>";
                                                echo "<td>" . $row['idade'] . "</td>";
                                                echo "<td>" . $row['data_nascimento'] . "</td>";
                                                echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['foto_blob']) . "' class='img-thumbnail' width='100'></td>";
                                                echo "<td style='width: 100px; text-align: center;'><a href='visualizar_funcionario.php?id=" . $row['id'] . "' class='btn btn-info btn-sm btn-visualizar'><i class='far fa-eye'></i></a></td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='7' class='text-center'>Nenhum funcionário encontrado.</td></tr>";
                                        }

                                        $conn->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <center>
                                <a href="index.php" class="btn btn-danger btn-voltar">Voltar ao Menu</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="conf/js_bootstrap/bootstrap.bundle.min.js"></script>
    </body>
</html>