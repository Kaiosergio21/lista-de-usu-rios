<?php
$servidor = "127.0.0.1";
$usuario = "";
$senha = "";
$banco = "";

$conn = new mysqli($servidor, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$sql = "SELECT id, nome, email, senha, data_cadastro FROM usuarios";
$resultado = $conn->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Data de Cadastro</th>
          </tr>";

    while ($linha = $resultado->fetch_assoc()) {
        echo "<tr>
                <td>{$linha['id']}</td>
                <td>{$linha['nome']}</td>
                <td>{$linha['email']}</td>
                <td>{$linha['data_cadastro']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nenhum dado encontrado.</p>";
}

$conn->close();
?>
