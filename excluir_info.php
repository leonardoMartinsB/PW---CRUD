<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Confirmar Exclusão de Funcionário">
        <meta name="keywords" content="HTML, CSS, PHP">
        <meta name="author" content="Leo - Pedro">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="conf/css_bootstrap/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="estilo/delete.css">
        <link rel="stylesheet" href="estilo/excluirinfo.css">
        <link rel="shortcut icon" href="assets/imagens/funcionarios.png" type="image/funcionario-icon">
        
        <title>Confirmar Exclusão Funcionário | Funcionários Empresa</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">XPTO</a>
            </div>
        </nav>
        <div class="card shadow">
            <div class="card-body text-center">
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
                        $foto_blob = $row['foto_blob'];

                        echo "<h2 class='card-title mb-4'>Confirmar Exclusão do Funcionário</h2>";
                        echo "<div class='mb-3'><strong>ID:</strong> $id</div><hr>";
                        echo "<div class='mb-3'><strong>Nome:</strong> $nome</div><hr>";
                        echo "<div class='mb-3'><strong>Endereço:</strong> $endereco</div><hr>";
                        echo "<div class='mb-3'><strong>Idade:</strong> $idade anos</div><hr>";
                        echo "<div class='mb-3'><strong>Data de Nascimento:</strong> $data_nascimento</div><hr>";
                        echo "<div class='mb-4'><strong>Foto:</strong><br><img src='data:image/jpeg;base64,".base64_encode($foto_blob)."' class='img-thumbnail custom-img'></div><hr>";

                        echo "<form action='processar_exclusao.php' method='POST'>";
                        echo "<input type='hidden' name='id' value='$id'>";
                        echo "<button type='submit' class='btn btn-danger me-2' name='confirmar'>Confirmar Exclusão</button>";
                        echo "<a href='deletar.php' class='btn btn-secondary'>Cancelar</a>";
                        echo "</form>";
                    } else {
                        echo "<h2 class='card-title mb-4'>ID de Funcionário não Encontrado</h2>";
                        echo "<p class='card-text'>O ID '$id' não corresponde a nenhum funcionário cadastrado.</p>";
                        echo "<a href='deletar.php' class='btn btn-danger'>Voltar</a>";
                    }

                    $stmt->close();
                    $conn->close();
                } else {
                    echo "<h2 class='card-title mb-4'>ID de Funcionário não Especificado</h2>";
                    echo "<p class='card-text'>Por favor, especifique o ID do funcionário que deseja excluir.</p>";
                    echo "<a href='deletar.php' class='btn btn-danger'>Voltar</a>";
                }
                ?>
            </div>
        </div>
        <script src="conf/js_bootstrap/bootstrap.bundle.min.js"></script>
    </body>
</html>