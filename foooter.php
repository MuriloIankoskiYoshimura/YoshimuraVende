<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Header e Footer Simples e Elegante</title>
  <style>
    /* Seus estilos permanecem os mesmos */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    footer {
      background-color: #000;
      color: #fff;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 20px;
      box-shadow: 0px -4px 8px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    @media (min-width: 768px) {
      footer {
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
      }
    }

    .footer-logo img {
      height: 50px;
    }

    .footer-links {
      display: flex;
      flex-direction: column;
      gap: 10px;
      align-items: center;
    }

    @media (min-width: 768px) {
      .footer-links {
        flex-direction: row;
        flex-wrap: wrap;
        gap: 20px;
        align-items: flex-start;
      }
    }

    .footer-links a {
      color: #fff;
      text-decoration: none;
      transition: color 0.3s;
    }

    .footer-links a:hover {
      color: #bbb;
    }

    .footer-icons {
      display: flex;
      gap: 15px;
      justify-content: center;
    }

    .footer-icons img {
      width: 25px;
      height: 25px;
      cursor: pointer;
    }

    .contact-form {
      margin: 40px;
      background-color: #f9f9f9;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .contact-form h2 {
      margin-bottom: 20px;
    }

    .contact-form label {
      display: block;
      margin-bottom: 5px;
    }

    .contact-form input,
    .contact-form textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .contact-form button {
      background-color: #000;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .contact-form button:hover {
      background-color: #444;
    }

    .success-message {
      background-color: #dff0d8;
      color: #3c763d;
      padding: 10px;
      border-radius: 5px;
      margin-top: 20px;
      text-align: center;
    }
  </style>
</head>
<body>

  <?php
  // Variável para a mensagem de sucesso
  $successMessage = "";

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
      $nome = $conn->real_escape_string($_POST['name']);
      $email = $conn->real_escape_string($_POST['email']);
      $mensagem = $conn->real_escape_string($_POST['message']);

      // Insere os dados na tabela
      $sql = "INSERT INTO mensagens_contato (nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')";

      if ($conn->query($sql) === TRUE) {
          $successMessage = "Sua mensagem foi enviada com sucesso!";
      } else {
          $successMessage = "Erro ao enviar sua mensagem: " . $conn->error;
      }

      // Fecha a conexão
      $conn->close();
  }
  ?>

  <div class="contact-form">
    <h2>Formulário de Contato</h2>
    <?php if (!empty($successMessage)) : ?>
      <div class="success-message">
        <?php echo $successMessage; ?>
      </div>
    <?php endif; ?>
    <form action="" method="post">
      <label for="name">Nome:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="message">Mensagem:</label>
      <textarea id="message" name="message" rows="5" required></textarea>

      <button type="submit">Enviar</button>
    </form>
  </div>

  <footer>
    <div class="footer-logo">
      <img src="img/log.png" alt="Logo">
    </div>
    <div class="footer-links">
        <a href="index.php">Página Inicial</a>
        <a href="sobrenós.php">Sobre Nós</a>
        <a href="seuimóvel.php">Anúncie seu Imóvel</a>
        <a href="lançamentos.php">Lançamentos</a>
        <a href="blog.php">Blog</a>
        <a href="depoimentos.php">Depoimentos</a>
        <a href="https://wa.me/5551981241770?text=Olá, vim do site Imobiliaria Yoshimura!">Contato</a>
        <a href="faq.php">FAQ</a>
        <a href="politica.php">Política de Privacidade</a>
      </div>
    </div>
    <div class="footer-icons">
      <a href="https://wa.me/5551981241770" target="_blank" style="text-decoration: none;"> 
    <img src="https://img.icons8.com/ios-filled/50/ffffff/whatsapp.png" alt="WhatsApp" />
</a>

      <a href="wel2003@terra.com.br" style="text-decoration: none;">
    <img src="https://img.icons8.com/ios-filled/50/ffffff/email.png" alt="Email" />
</a>

    </div>
  </footer>

</body>
</html>
