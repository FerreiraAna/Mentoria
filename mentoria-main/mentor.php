<?php
include 'conexao.php';
// Consulta SQL para selecionar os mentores
$query = "SELECT * FROM Mentor";
$result = $conn->query($query);

// Verificar se a consulta retornou algum resultado
if ($result->num_rows > 0) {
    // Exibir os mentores dinamicamente
    while ($row = $result->fetch_assoc()) {
        echo "<div class='card-container' onclick='centerMentor(this)'>";
        echo "<div class='mini-card'>";
        echo "<h3 class='mentor-name'>" . $row['Name2'] . "</h3>";
        echo "<p class='mentor-description'>" . $row['Work_avaible'] . "</p>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "Nenhum mentor disponível no momento.";
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
