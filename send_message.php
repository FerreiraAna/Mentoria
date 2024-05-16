<?php
include 'conexão.php';

// Verificar se o formulário de envio de mensagem foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se os campos necessários estão presentes no formulário
    if (!empty($_POST['sender']) && !empty($_POST['recipient']) && !empty($_POST['content'])) {
        // Escapar caracteres especiais para evitar injeção de SQL
        $sender = mysqli_real_escape_string($conn, $_POST['sender']);
        $recipient = mysqli_real_escape_string($conn, $_POST['recipient']);
        $content = mysqli_real_escape_string($conn, $_POST['content']);

        // Inserir a mensagem na tabela Messages
        $query = "INSERT INTO Messages (Sender, Recipient, Content) VALUES ('$sender', '$recipient', '$content')";
        if ($conn->query($query) === TRUE) {
            echo "Mensagem enviada com sucesso.";
        } else {
            echo "Erro ao enviar mensagem: " . $conn->error;
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>
