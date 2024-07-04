<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['alterar'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $idade = $_POST['idade'];
    $data_nascimento = $_POST['data_nascimento'];

    $data_nascimento_formatada = date('Y-m-d', strtotime(str_replace('/', '-', $data_nascimento)));

    require_once 'conexao.php';

    if ($_FILES['foto']['size'] > 0) {
        $foto_blob = file_get_contents($_FILES['foto']['tmp_name']);
        $sql = "UPDATE funcionarios SET nome = ?, endereco = ?, idade = ?, data_nascimento = ?, foto_blob = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssisi", $nome, $endereco, $idade, $data_nascimento_formatada, $foto_blob, $id);
    } else {
        $sql = "UPDATE funcionarios SET nome = ?, endereco = ?, idade = ?, data_nascimento = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssisi", $nome, $endereco, $idade, $data_nascimento_formatada, $id);
    }

    if ($stmt->execute()) {
        header("Location: alteracao_sucesso.php?id=$id");
        exit();
    } else {
        echo "Erro ao atualizar dados: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

} else {
    header("Location: alterar.php");
    exit();
}
?>