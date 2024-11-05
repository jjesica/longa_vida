<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Longa Vida</title>
    <style>
        /* Estilos aqui */
    </style>
</head>
<body>
    <header>
        <h1>Longa Vida</h1>
    </header>

    <div class="formContainer">
        <h2>Cadastro:</h2>
        <form method="POST" action="">
            <fieldset>
                <legend style="font-size: 18.7px">Insira os dados:</legend>
                <label for="nome"> Nome:</label>
                <input type="text" id="nome" name="nome" placeholder="Digite o Nome..." required>
                
                <label for="endereco"> Endereço:</label>
                <input type="text" id="endereco" name="endereco" placeholder="Digite o Endereço..." required>

                <label for="cidade"> Cidade:</label>
                <input type="text" id="cidade" name="cidade" placeholder="Digite o nome da Cidade..." required>

                <label for="estado"> Estado:</label>
                <input type="text" id="estado" name="estado" placeholder="Digite o nome do Estado..." required>

                <label for="cep"> CEP:</label>
                <input type="number" id="cep" name="cep" placeholder="Digite o CEP..." required>

                <input type="submit" value="Cadastrar" class="btn" style="font-size: 16px">
            </fieldset>
        </form>
    </div>

    <div class="formContainer">
        <h2>Manutenção:</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>CEP</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'conexao.php';

                // Verifica se há envio de dados do formulário
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Coleta os dados do formulário
                    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
                    $endereco = mysqli_real_escape_string($conn, $_POST['endereco']);
                    $cidade = mysqli_real_escape_string($conn, $_POST['cidade']);
                    $estado = mysqli_real_escape_string($conn, $_POST['estado']);
                    $cep = mysqli_real_escape_string($conn, $_POST['cep']);

                    // Cria a query para inserir os dados
                    $sql = "INSERT INTO bd (nome, endereço, cidade, estado, cep) VALUES ('$nome', '$endereco', '$cidade', '$estado', '$cep')";
                    if (mysqli_query($conn, $sql)) {
                        echo "<p>Cadastro realizado com sucesso!</p>";
                    } else {
                        echo "Erro: " . mysqli_error($conn);
                    }
                }

                // Consulta os dados para exibir
                $sql = "SELECT * FROM bd"; 
                $result = mysqli_query($conn, $sql);

                // Exibe os registros
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['endereço']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['cidade']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['estado']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['cep']) . "</td>";
                        echo "<td>
                            <a href='editar.php?id=" . $row['Plano_codigo'] . "'>Editar</a> | 
                            <a href='excluir.php?id=" . $row['Plano_codigo'] . "' onclick='return confirm(\"Tem certeza que deseja excluir este registro?\");'>Excluir</a>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Nenhum registro encontrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <footer>
        <p>&copy; 2024 Longa Vida</p>
    </footer>
</body>
</html>
