<?php
// Verificar se o formulário de cadastro foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se todos os campos obrigatórios estão preenchidos
    if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm-password'])) {
        // Verificar se as senhas coincidem
        if ($_POST['password'] === $_POST['confirm-password']) {
            // Dados de conexão com o banco de dados
            $servername = "localhost";
            $username = "seu_usuario";
            $password = "sua_senha";
            $database = "seu_banco_de_dados";

            // Conectar ao banco de dados
            $conn = new mysqli($servername, $username, $password, $database);

            // Verificar a conexão
            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }

            // Escapar caracteres especiais para evitar injeção de SQL
            $nome = mysqli_real_escape_string($conn, $_POST['nome']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']); // Você pode considerar usar funções de hash para armazenar senhas com segurança

            // Consulta SQL para inserir os dados do novo usuário no banco de dados
            $query = "INSERT INTO Users (nome, email, password) VALUES ('$nome', '$email', '$password')";

            if ($conn->query($query) === TRUE) {
                echo "Cadastro realizado com sucesso!";
            } else {
                echo "Erro ao cadastrar usuário: " . $conn->error;
            }

            // Fechar a conexão com o banco de dados
            $conn->close();
        } else {
            echo "As senhas não coincidem. Por favor, tente novamente.";
        }
    } else {
        echo "Por favor, preencha todos os campos obrigatórios.";
    }
}
?>
