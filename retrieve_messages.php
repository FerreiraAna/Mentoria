<?php
// Dados de conexão com o banco de dados
include 'conexao.php';

// Recuperar mensagens para o usuário atual
$user_id = 1; // Supondo que o ID do usuário atual seja 1 (você precisa substituir isso)
$query = "SELECT * FROM Messages WHERE Sender = '$user_id' OR Recipient = '$user_id' ORDER BY Date_Time DESC";
$result = $conn->query($query);

// Exibir as mensagens
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sender = $row['Sender'];
        $recipient = $row['Recipient'];
        $content = $row['Content'];
        $date_time = $row['Date_Time'];

        // Exibir a mensagem
        echo "<div>";
        echo "<p>De: $sender</p>";
        echo "<p>Para: $recipient</p>";
        echo "<p>$content</p>";
        echo "<p>$date_time</p>";
        echo "</div>";
    }
} else {
    echo "Nenhuma mensagem encontrada.";
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
