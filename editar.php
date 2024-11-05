<?php
include 'conexao.php'; // Inclui a conexão ao banco

// Verifica se o ID foi passado na URL
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Busca os dados do registro
    $sql = "SELECT * FROM bd WHERE Plano_codigo='$id'";
    $result = mysqli_query($conn, $sql);

    // Verifica se algum registro foi encontrado
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        die("Registro não encontrado.");
    }
} else {
    die("ID não foi passado na URL.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Atualiza o registro no banco
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $endereco = mysqli_real_escape_string($conn, $_POST['endereco']);
    $cidade = mysqli_real_escape_string($conn, $_POST['cidade']);
    $estado = mysqli_real_escape_string($conn, $_POST['estado']);
    $cep = mysqli_real_escape_string($conn, $_POST['cep']);

    $sqlUpdate = "UPDATE bd SET nome='$nome', endereço='$endereco', cidade='$cidade', estado='$estado', cep='$cep' WHERE Plano_codigo='$id'";
    if (mysqli_query($conn, $sqlUpdate)) {
        echo "Registro atualizado com sucesso!";
        header("Location: cadastro.php");
        exit;
    } else {
        echo "Erro ao atualizar o registro: " . mysqli_error($conn);
    }
}

// Fecha a conexão
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Registro</title>
</head>
<body>
    <h2>Editar Registro</h2>
    <form method="POST" action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($row['nome']); ?>" required>

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" value="<?php echo htmlspecialchars($row['endereço']); ?>" required>

        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade" value="<?php echo htmlspecialchars($row['cidade']); ?>" required>

        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" value="<?php echo htmlspecialchars($row['estado']); ?>" required>

        <label for="cep">CEP:</label>
        <input type="number" id="cep" name="cep" value="<?php echo htmlspecialchars($row['cep']); ?>" required>

        <input type="submit" value="Atualizar" class="btn" style="font-size: 16px">
    </form>
</body>
</html>
