<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados da Pesquisa</title>
    <style>
        body {
            background-color: #e8f5e9;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1200px;
        }

        h1 {
            font-size: 2rem;
            color: #2e7d32;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #66bb6a;
            color: #fff;
            font-weight: bold;
        }

        .no-results {
            font-size: 1.2rem;
            color: #d32f2f;
            margin-top: 20px;
            text-align: center;
        }

        .back-button {
            position: fixed;
            bottom: 10px;
            left: 10px;
            padding: 10px 20px;
            background-color: #2e7d32;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-button:hover {
            background-color: #4caf50;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Resultados da Pesquisa</h1>
        
        <?php
        // Recupera o nome do paciente da URL
        if (isset($_GET['patient_name'])) {
            $patient_name = $_GET['patient_name'];

            // Prepara a consulta SQL para buscar dados do paciente
            $sql = "SELECT * FROM amostras WHERE patient_name LIKE ?";
            if ($stmt = $conn->prepare($sql)) {
                $like_patient_name = "%" . $patient_name . "%";
                $stmt->bind_param("s", $like_patient_name);

                if ($stmt->execute()) {
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        echo "<table>";
                        echo "<tr><th>ID da Amostra</th><th>Tipo de Amostra</th><th>Data e Hora da Coleta</th><th>Local de Coleta</th><th>Nome do Paciente</th><th>Data de Nascimento</th><th>Sexo</th><th>Contato</th><th>Solicitante</th><th>Conselho</th><th>Número do Conselho</th><th>Instituição</th><th>Tipo de Análise</th><th>Data e Hora da Solicitação</th><th>Laboratório</th><th>Status</th><th>Notas</th></tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['sample_id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['sample_type']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['collection_datetime']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['collection_location']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['patient_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['birthdate']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['contact_info']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['requester_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['requester_council']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['requester_council_number']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['requester_institution']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['analysis_type']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['request_datetime']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['responsible_lab']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['analysis_status']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['additional_notes']) . "</td>";
                            echo "</tr>";
                        }
                        
                        echo "</table>";
                    } else {
                        echo "<p class='no-results'>Nenhum resultado encontrado para o nome '$patient_name'.</p>";
                    }
                } else {
                    echo "Erro ao executar a consulta: " . $stmt->error;
                }
            } else {
                echo "Erro ao preparar a consulta: " . $conn->error;
            }
            

            // Fecha a declaração
            $stmt->close();
        } else {
            echo "<p class='no-results'>Por favor, insira um nome para pesquisar.</p>";
        }
        ?>
        
        <!-- Botão de voltar -->
        <a href="pagcoordenador.html" class="back-button">Voltar</a>
    </div>
    
</body>
</html>

<?php $conn->close(); ?>
