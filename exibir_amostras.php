<?php
include 'config.php'; // Arquivo de configuração para conexão com o banco de dados
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir Amostras - Biomedicina</title>
    <style>
        body {
            background-color: #e8f5e9;
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            height: 100vh;
        }

        .container {
            display: flex;
            flex: 1;
        }

        .sidebar {
            width: 250px;
            background-color: #ffffff;
            padding: 20px;
            border-right: 1px solid #ddd;
        }

        .sidebar h2 {
            margin-top: 0;
            font-size: 1.8rem;
            color: #2e7d32;
        }

        .sidebar .user {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .sidebar .user .button {
            background-color: #66bb6a;
            color: #fff;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .sidebar .user p {
            margin: 0;
            color: #2e7d32;
        }

        .sidebar a {
            display: block;
            padding: 10px;
            color: #2e7d32;
            text-decoration: none;
            border-bottom: 1px solid #eee;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #e0f2f1;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        .content h1 {
            margin-top: 0;
            font-size: 2rem;
            color: #2e7d32;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #2e7d32;
        }

        tr:hover {
            background-color: #e0f2f1;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <h2>Biomedicina</h2>
        <div class="user">
            <div class="button">J</div>
            <div>
                <p>Julia Alves</p>
                <p>Médico</p>
            </div>
        </div>
        
        <a href="pagprofissional.html">Voltar</a>
    </div>
    <div class="content">
        <h1>Dados do Paciente</h1>
        
        <?php
        // Consulta SQL para obter os dados da tabela amostras
        $sql = "SELECT patient_name, birthdate, gender, sample_type, analysis_status FROM amostras";
        
        if ($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>Nome do Paciente</th><th>Data de Nascimento</th><th>Sexo</th><th>Tipo de Amostra</th><th>Status da Análise</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["patient_name"] . "</td><td>" . $row["birthdate"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["sample_type"] . "</td><td>" . $row["analysis_status"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Nenhuma amostra encontrada.</p>";
            }
            $result->free();
        } else {
            echo "Erro ao executar a consulta: " . $conn->error;
        }

        $conn->close();
        ?>
    </div>
</div>

</body>
</html>

