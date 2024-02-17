<?php
// Conexão com o Banco de Dados
$hostname = "localhost";
$database = "academy";
$username = "root";
$password = "";

$conn = new mysqli($hostname, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha ao conectar: " . $conn->connect_error);
}

// Verifica se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepara os dados do formulário
    $name_user = $_POST['name'];
    $email_user = $_POST['email'];
    $genrer_user = $_POST['sexo'];
    $phone_user = $_POST['phone'];

    // Prepara a declaração SQL usando um prepared statement
    $sql = "INSERT INTO cliente (Nome, Email, Genero, Telefone) VALUES (?, ?, ?, ?)";

    // Prepara a declaração
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Associa os parâmetros
        $stmt->bind_param("ssss", $name_user, $email_user, $genrer_user, $phone_user);

        // Executa a declaração
        if ($stmt->execute()) {
            echo "Registro inserido com sucesso.";
        } else {
            echo "Erro ao inserir registro: " . $stmt->error;
        }

        // Fecha a declaração
        $stmt->close();
    } else {
        echo "Erro na preparação da declaração: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>
