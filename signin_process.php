<?php
include 'conexao.php'
// Verificar se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
        // Escapar caracteres especiais para evitar injeção de SQL
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // Consulta SQL para verificar se o usuário existe no banco de dados
        $query = "SELECT * FROM Users WHERE username='$username'";
        $result = $conn->query($query);

        // Verificar se a consulta retornou algum resultado
        if ($result->num_rows > 0) {
            // Verificar a senha
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                // Usuário autenticado com sucesso
                // Redirecionar para a página de perfil, por exemplo
                header("Location: profile.php");
                exit;
            } else {
                // Senha incorreta
                echo "Senha incorreta. Tente novamente.";
            }
        } else {
            // Usuário não encontrado
            echo "Usuário não encontrado. Tente novamente.";
        }

        // Fechar a conexão com o banco de dados
        $conn->close();
    } else {
        // Um ou ambos os campos estão vazios
        echo "Por favor, preencha todos os campos.";
    }

?>
