<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados das Amostras - Biomedicina</title>
    <style>
        body {
            background-color: #e8f5e9;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            position: relative;
            min-height: 100vh;
        }

        h1 {
            color: #2e7d32;
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
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #66bb6a;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .back-button {
            position: absolute;
            bottom: 80px;
            right: 20px;
            padding: 10px 20px;
            background-color: #2e7d32;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-transform: uppercase;
        }

        .back-button:hover {
            background-color: #1b5e20;
        }
    </style>
</head>
<body>
    <h1> Amostras Cadastrada</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Tipo de Amostra</th>
            <th>Data e Hora da Coleta</th>
            <th>Local de Coleta</th>
            <th>Nome do Paciente</th>
            <th>Data de Nascimento</th>
            <th>Sexo</th>
            <th>Contato</th>
            <th>Solicitante</th>
            <th>Conselho</th>
            <th>Número do Conselho</th>
            <th>Instituição Solicitante</th>
            <th>Tipo de Análise</th>
            <th>Data e Hora da Solicitação</th>
            <th>Laboratório Responsável</th>
            <th>Status da Análise</th>
            <th>Notas Adicionais</th>
        </tr>

        <?php
        $sql = "SELECT * FROM amostras";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['sample_id']}</td>
                        <td>{$row['sample_type']}</td>
                        <td>{$row['collection_datetime']}</td>
                        <td>{$row['collection_location']}</td>
                        <td>{$row['patient_name']}</td>
                        <td>{$row['birthdate']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['contact_info']}</td>
                        <td>{$row['requester_name']}</td>
                        <td>{$row['requester_council']}</td>
                        <td>{$row['requester_council_number']}</td>
                        <td>{$row['requester_institution']}</td>
                        <td>{$row['analysis_type']}</td>
                        <td>{$row['request_datetime']}</td>
                        <td>{$row['responsible_lab']}</td>
                        <td>{$row['analysis_status']}</td>
                        <td>{$row['additional_notes']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='17'>Nenhuma amostra cadastrada.</td></tr>";
        }

        $conn->close();
        ?>
    </table>

    <button class="back-button" onclick="window.history.back();">Voltar</button>
    
</body>
</html>
