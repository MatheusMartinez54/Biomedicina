<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Amostra - Biomedicina</title>
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

        /* Estilo para checkboxes lado a lado */
        .checkbox-group {
            margin-bottom: 15px;
        }

        .checkbox-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        .checkbox-group input[type="checkbox"] {
            display: inline-block;
            margin-right: 10px;
        }

        .checkbox-group input[type="text"] {
            width: calc(100% - 40px);
            display: inline-block;
            margin-left: 10px;
            box-sizing: border-box;
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
        <h1>Cadastro de Amostra</h1>

        <?php
            // Verifica se o formulário foi submetido
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Recupera os dados do formulário
                $sample_id = $_POST["sample_id"];
                $sample_type = $_POST["sample_type"];
                $collection_datetime = $_POST["collection_datetime"];
                $collection_location = $_POST["collection_location"];
                $patient_name = $_POST["patient_name"];
                $birthdate = $_POST["birthdate"];
                $gender = $_POST["gender"];
                $contact_info = $_POST["contact_info"];
                $requester_name = $_POST["requester_name"];
                $requester_council = implode(", ", $_POST["requester_council"]); // Se usar checkboxes múltiplas, pode precisar ajustar como os conselhos são salvos
                $requester_council_number = $_POST["requester_council_number"];
                $requester_institution = $_POST["requester_institution"];
                $analysis_type = $_POST["analysis_type"];
                $request_datetime = $_POST["request_datetime"];
                $responsible_lab = $_POST["responsible_lab"];
                $analysis_status = $_POST["analysis_status"];
                $additional_notes = $_POST["additional_notes"];

                // Prepara a declaração SQL para inserir os dados na tabela
                $sql = "INSERT INTO amostras (sample_id, sample_type, collection_datetime, collection_location, patient_name, birthdate, gender, contact_info, requester_name, requester_council, requester_council_number, requester_institution, analysis_type, request_datetime, responsible_lab, analysis_status, additional_notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                if ($stmt = $conn->prepare($sql)) {
                    // Vincula parâmetros à declaração
                    $stmt->bind_param("sssssssssssssssss", $sample_id, $sample_type, $collection_datetime, $collection_location, $patient_name, $birthdate, $gender, $contact_info, $requester_name, $requester_council, $requester_council_number, $requester_institution, $analysis_type, $request_datetime, $responsible_lab, $analysis_status, $additional_notes);

                    // Executa a declaração
                    if ($stmt->execute()) {
                        echo "Dados inseridos com sucesso!";
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
                <!-- Campos do formulário -->

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <h2>Informações da Amostra</h2>
            <label for="sample_id">Identificador da Amostra:</label>
            <input type="text" id="sample_id" name="sample_id" placeholder="Código único para identificar a amostra" required>

            <label for="sample_type">Tipo de Amostra:</label>
            <select id="sample_type" name="sample_type" required>
                <option value="">Selecione o tipo de amostra</option>
                <option value="Sangue">Sangue</option>
                <option value="Urina">Urina</option>
                <option value="Tecido">Tecido</option>
                <option value="Saliva">Saliva</option>
                <option value="Outro">Outro</option>
            </select>

            <label for="collection_datetime">Data e Hora da Coleta:</label>
            <input type="datetime-local" id="collection_datetime" name="collection_datetime" required>

            <label for="collection_location">Local de Coleta:</label>
            <input type="text" id="collection_location" name="collection_location" placeholder="(hospital, clínica, laboratório)" required>

            <h2>Informações do Paciente</h2>
            <label for="patient_name">Nome do Paciente:</label>
            <input type="text" id="patient_name" name="patient_name" placeholder="Nome completo do paciente" required>

            <label for="birthdate">Data de Nascimento:</label>
            <input type="date" id="birthdate" name="birthdate" required>

            <label for="gender">Sexo:</label>
            <select id="gender" name="gender" required>
                <option value="">Selecione o sexo</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                <option value="Outro">Outro</option>
            </select>

            <label for="contact_info">Contato do Paciente:</label>
            <input type="text" id="contact_info" name="contact_info" placeholder="Email do Paciente" required>

            <h2>Informações do Solicitante</h2>
            <label for="requester_name">Nome do Solicitante:</label>
            <input type="text" id="requester_name" name="requester_name" placeholder="Nome do médico ou profissional de saúde que solicitou a análise" required>

            <div class="checkbox-group">
                <h3>Conselho do Profissional:</h3>
                <label><input type="checkbox" name="requester_council[]" value="CRM"> CRM</label>
                <label><input type="checkbox" name="requester_council[]" value="COREN"> COREN</label>
                <label><input type="checkbox" name="requester_council[]" value="CRF"> CRF</label>
            </div>

            <label for="requester_council_number">Número do Conselho:</label>
            <input type="text" id="requester_council_number" name="requester_council_number" placeholder="Número do conselho profissional" required>

            <label for="requester_institution">Instituição Solicitante:</label>
            <input type="text" id="requester_institution" name="requester_institution" placeholder="Nome da instituição onde o solicitante trabalha" required>

            <h2>Informações de Análise</h2>
            <label for="analysis_type">Tipo de Análise Solicitada:</label>
            <input type="text" id="analysis_type" name="analysis_type" placeholder="Tipo de exame ou teste solicitado" required>

            <label for="request_datetime">Data e Hora da Solicitação:</label>
            <input type="datetime-local" id="request_datetime" name="request_datetime" required>

            <label for="responsible_lab">Laboratório Responsável:</label>
            <input type="text" id="responsible_lab" name="responsible_lab" placeholder="Nome do laboratório que realizará a análise" required>

            <label for="analysis_status">Status da Análise:</label>
            <select id="analysis_status" name="analysis_status" required>
                <option value="">Selecione o status da análise</option>
                <option value="Pendente">Pendente</option>
                <option value="Em andamento">Em andamento</option>
                <option value="Concluída">Concluída</option>
                <option value="Cancelada">Cancelada</option>
            </select>

            <h2>Outras Informações</h2>
            <label for="additional_notes">Notas Adicionais:</label>
            <textarea id="additional_notes" name="additional_notes" placeholder="Qualquer informação adicional relevante"></textarea>

            <input  type="submit" value="Enviar"> 
        </form>

        <svg class="stethoscope" viewBox="0 0 100 100">
            <path d="M50,10 C70,10 80,20 80,30 L80,60 C80,70 70,80 50,80 L20,80 C10,80 10,70 10,60 L10,30 C10,20 20,10 50,10 Z" />
            <path d="M60,20 C70,20 70,30 60,30 C50,30 50,20 60,20 Z" />
            <path d="M40,20 C30,20 30,30 40,30 C50,30 50,20 40,20 Z" />
        </svg>
    </div>
</div>

</body>
</html>
<?php $conn->close(); ?>


