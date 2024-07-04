<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $idade = $_POST['idade'];
    $data_nascimento = $_POST['data_nascimento'];
    $foto_blob = NULL;

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $foto_blob = file_get_contents($_FILES['foto']['tmp_name']);
    }

    require_once 'conexao.php';

    $sql_verifica = "SELECT id FROM funcionarios WHERE id = ?";
    $stmt_verifica = $conn->prepare($sql_verifica);
    $stmt_verifica->bind_param("i", $id);
    $stmt_verifica->execute();
    $stmt_verifica->store_result();

    if ($stmt_verifica->num_rows > 0) {

        header("Location: adicionar.php?erro=id_duplicado");
        exit();
    }

    $stmt_verifica->close();

    $sql = "INSERT INTO funcionarios (id, nome, endereco, idade, data_nascimento, foto_blob) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ississ", $id, $nome, $endereco, $idade, $data_nascimento, $foto_blob);

    if ($stmt->execute()) {
?>

<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">
      <meta name="description" content="Funcionário Adicionado">
      <meta name="keywords" content="HTML, CSS, PHP">
      <meta name="author" content="Leo - Pedro">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link rel="stylesheet" href="conf/css_bootstrap/bootstrap/bootstrap.min.css">
      <link rel="stylesheet" href="estilo/add.css">
      <link rel="stylesheet" href="estilo/processaradd.css">

      <link rel="shortcut icon" href="assets/imagens/funcionarios.png" type="image/funcionario-icon">

      <title>Adicionado Funcionário | Funcionários Empresa</title>
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         <div class="container-fluid">
               <a class="navbar-brand" href="index.php">XPTO</a>
         </div>
      </nav>
      <div class="container-center">
         <div class="card shadow">
               <div class="card-body text-center">
                  <h2 class="card-title mb-4">Funcionário Adicionado com Sucesso</h2>
                  <p class="card-text">Funcionário(a) <?php echo $nome; ?> foi adicionado com sucesso ao sistema.</p>
                  <hr>
                  <div class="mt-4">
                     <a href="adicionar.php" class="btn btn-primary mb-2">Fazer Novo Cadastro</a><br>
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
        echo "Erro ao adicionar funcionário(a): " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
   } else {
      header("Location: adicionar.php");
      exit();
   }
?>
