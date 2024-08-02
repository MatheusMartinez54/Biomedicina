<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inclusão de Resultados - Biomedicina</title>
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

        .stethoscope {
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: 100px;
            height: 100px;
            opacity: 0.3;
            transition: opacity 0.3s ease;
        }

        .stethoscope:hover {
            opacity: 1;
        }

        .stethoscope path {
            stroke: #66bb6a;
            stroke-width: 2px;
            fill: none;
        }

        /* Estilo adicional para formulário */
        form {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form h2 {
            font-size: 1.8rem;
            color: #2e7d32;
            margin-bottom: 10px;
        }

        form label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        form input[type="text"],
        form input[type="datetime-local"],
        form select,
        form textarea {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        form textarea {
            resize: vertical;
            min-height: 100px;
        }

        form input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 15px 30px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
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
        <h1>Inclusão de Resultados</h1>

        <?php
        // Verifica se o formulário foi submetido
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recupera os dados do formulário
            $sample_id = $_POST["sample_id"];
            $result = $_POST["result"];
            $result_notes = $_POST["result_notes"];

            // Prepara a declaração SQL para atualizar os dados na tabela
            $sql = "UPDATE amostras SET result = ?, result_notes = ? WHERE sample_id = ?";

            if ($stmt = $conn->prepare($sql)) {
                // Vincula parâmetros à declaração
                $stmt->bind_param("sss", $result, $result_notes, $sample_id);

                // Executa a declaração
                if ($stmt->execute()) {
                    echo "Resultados atualizados com sucesso!";
                } else {
                    echo "Erro ao executar a declaração: " . $stmt->error;
                }
            } else {
                echo "Erro ao preparar a declaração: " . $conn->error;
            }

            // Fecha a declaração
            $stmt->close();
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <h2>Informações da Amostra</h2>
            <label for="sample_id">Identificador da Amostra:</label>
            <input type="text" id="sample_id" name="sample_id" placeholder="Código único para identificar a amostra" required>

            <h2>Resultados da Análise</h2>
            <label for="result">Resultado:</label>
            <input type="text" id="result" name="result" placeholder="Resultado da análise" required>

            <label for="result_notes">Observações:</label>
            <textarea id="result_notes" name="result_notes" placeholder="Observações adicionais sobre o resultado"></textarea>

            <input type="submit" value="Enviar Resultado">
        </form>
    </div>
</div>

</body>
</html>
<?php $conn->close(); ?>
