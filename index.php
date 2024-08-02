<?php
// Arquivo: index.php

// Incluir arquivo de configuração do banco de dados
include 'config.php';

// Inicializar variáveis de erro
$login_err = '';

// Processar dados do formulário quando enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar dados do formulário
    $ra = $_POST['ra'];
    $senha = $_POST['senha'];

    // Prevenir SQL Injection
    $ra = $conn->real_escape_string($ra);
    $senha = $conn->real_escape_string($senha);

    // Consultar o banco de dados para verificar o usuário
    $sql = "SELECT * FROM usuario WHERE USUARIO_MATRICULA = '$ra'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Usuário encontrado, verificar a senha
        $row = $result->fetch_assoc();
        if ($senha == $row['USUARIO_SENHA']) {
            // Senha correta, redirecionar para a página correspondente ao tipo de usuário
            $tipo_usuario = $row['TIPO_USUARIO'];
            switch ($tipo_usuario) {
                case 'profissional':
                    header("Location: pagprofissional.html");
                    break;
                case 'supervisor':
                    header("Location: pagsupervisor.html");
                    break;
                case 'coordenador':
                    header("Location: pagcoordenador.html");
                    break;
                case 'paciente':
                    header("Location: pagpaciente.html");
                    break;
                default:
                    echo "Tipo de usuário não reconhecido";
                    break;
            }
            exit();
        } else {
            // Senha incorreta
            $login_err = "Senha incorreta";
        }
    } else {
        // Usuário não encontrado
        $login_err = "Usuário não encontrado";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap');

        body {
            margin: 0;
            font-family: 'Noto Sans', sans-serif;
        }

        body * {
            box-sizing: border-box;
        }

        .main-login {
            width: 100vw;
            height: 100vh;
            background: #115820;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .left-login {
            width: 50vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .left-login > h1 {
            font-size: 3vw;
            color: #ffffff;
        }

        .left-login-image {
            width: 35vw;
        }

        .right-login {
            width: 50vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card-login {
            width: 60%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 30px 35px;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0px 10px 40px #191a21;
        }

        .card-login > h1 {
            color: #0d7746;
            font-weight: 800;
            margin: 0;
        }

        .textfield {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            margin: 10px 0px;
        }

        .textfield > input {
            width: 100%;
            border: none;
            border-radius: 10px;
            padding: 15px;
            background: #f8f9ff;
            color: #000000;
            font-size: 12pt;
            box-shadow: 0px 10px 40px #b1b2b6;
            outline: none;
            box-sizing: border-box;
        }

        .textfield > label {
            color: #0c0c02;
            margin-bottom: 10px;
        }

        .textfield > input::placeholder {
            color: #0c010194;
        }

        .btn-login {
            width: 100%;
            padding: 16px 0px;
            margin: 25px;
            border: none;
            border-radius: 8px;
            outline: none;
            text-transform: uppercase;
            font-weight: 800;
            letter-spacing: 2px;
            color: #ffffff;
            background: #09472a;
            cursor: pointer;
            box-shadow: 0px 10px 40px -12px #00ff8052;
        }

        @media only screen and (max-width: 950px) {
            .card-login {
                width: 85%;
            }
        }

        @media only screen and (max-width: 600px) {
            .main-login {
                flex-direction: column;
            }

            .left-login > h1 {
                display: none;
            }

            .left-login {
                width: 100%;
                height: auto;
            }

            .right-login {
                width: 100%;
                height: auto;
            }

            .left-login-image {
                width: 50vw;
            }

            .card-login {
                width: 90%;
            }
        }
    </style>
</head>
<body>
  <div class="main-login">
      <div class="left-login">
        <h1>Fasiclin - CPA</h1>
          <img src="assets/medicine-animate.svg" class="left-login-image" alt="Animação">
      </div>
      <div class="right-login">
          <div class="card-login">
              <h1>Login</h1>
              <form action="    " method="post">
                  <div class="textfield">
                      <label for="ra">Usuário:</label>
                      <input type="text" name="ra" id="ra" placeholder="">
                  </div>
                  <div class="textfield">
                      <label for="senha">Senha:</label>
                      <input type="password" name="senha" id="senha" placeholder="">
                  </div>
                  <div class="lembrar-me">
                      <input type="checkbox" id="lembrar-me" name="lembrar-me">
                      <label for="lembrar-me">Lembrar-me</label>
                  </div>
                  <div class="esqueceu-senha">
                      <a href="##">Esqueceu a senha?</a>
                  </div>
                  <input class="btn-login" type="submit" name="submit" value="Login">
              </form>
          </div>
      </div>
  </div>
</body>
</html>


