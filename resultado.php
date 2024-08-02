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
            background-color: #2e7d32;
            color: #fff;
        }

        .content .button {
            display: inline-block;
            padding: 15px 30px;
            background-color: #66bb6a;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
            transition: background-color 0.3s ease;
        }

        .content .button:hover {
            background-color: #4caf50;
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
        <h1>Resultados das Amostras</h1>
        <table>
            <thead>
                <tr>
                    <th>Identificador da Amostra</th>
                    <th>Resultado</th>
                    <th>Observações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Recupera os dados da tabela amostras
                $sql = "SELECT sample_id, result, result_notes FROM amostras WHERE result IS NOT NULL";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Exibe os dados de cada linha
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row["sample_id"]) . "</td>
                                <td>" . htmlspecialchars($row["result"]) . "</td>
                                <td>" . htmlspecialchars($row["result_notes"]) . "</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Nenhum resultado encontrado</td></tr>";
                }

                // Fecha a conexão
                $conn->close();
                ?>
            </tbody>
        </table>
        <a class="button" href="inclusaodosresultados.php">Incluir Novo Resultado</a>
    </div>
</div>

</body>
</html>
