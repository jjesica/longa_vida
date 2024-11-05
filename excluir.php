<?php
include 'conexao.php'; // Inclui a conexão ao banco

// Verifica se o ID foi passado na URL
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Cria a query para excluir o registro
    $sql = "DELETE FROM bd WHERE Plano_codigo='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Registro excluído com sucesso!";
    } else {
        echo "Erro ao excluir o registro: " . mysqli_error($conn);
    }

    // Redireciona de volta após exclusão
    header("Location: cadastro.php");
    exit;
} else {
    echo "ID não foi passado na URL.";
}

// Fecha a conexão
mysqli_close($conn);
?>
