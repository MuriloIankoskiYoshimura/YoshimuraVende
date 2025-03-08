<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Seu Imóvel - Formulário de Contato</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        button:hover {
            background-color: #444;
        }

        .success-message {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<?php
  include 'header.php';
?>


    <div class="container">
        <h1>Adicione Seu Imóvel</h1>

        <?php
        // Mensagem de sucesso ou erro
        $message = "";

        // Verifica se o formulário foi enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Conecta ao banco de dados
            $host = 'localhost';
            $dbname = 'u268764721_IW';
            $username = 'u268764721_IW';
            $password = 'Murilo_132';
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verifica a conexão
            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }

            // Captura os dados do formulário
            $nome = $conn->real_escape_string($_POST['nome']);
            $email = $conn->real_escape_string($_POST['email']);
            $telefone = $conn->real_escape_string($_POST['telefone']);
            $descricao = $conn->real_escape_string($_POST['descricao']);

            // Insere os dados na tabela de contatos interessados
            $sql = "INSERT INTO interessados_imovel (nome, email, telefone, descricao) VALUES ('$nome', '$email', '$telefone', '$descricao')";

            if ($conn->query($sql) === TRUE) {
                $message = "<div class='success-message'>Seu interesse foi registrado com sucesso! Entraremos em contato em breve.</div>";
            } else {
                $message = "<div class='error-message'>Erro ao registrar seu interesse: " . $conn->error . "</div>";
            }

            // Fecha a conexão
            $conn->close();
        }
        ?>

        <?php if (!empty($message)) echo $message; ?>

        <form action="" method="post">
            <label for="nome">Nome Completo:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" required>

            <label for="descricao">Descrição do Imóvel:</label>
            <textarea id="descricao" name="descricao" rows="5" placeholder="Descreva brevemente o imóvel que deseja adicionar." required></textarea>

            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
