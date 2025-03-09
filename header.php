<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Header Simples e Elegante</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
    }

    header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: #000;
      padding: 10px 20px;
      color: #fff;
      position: fixed; /* Define o header como fixo */
      top: 0; /* Gruda no topo */
      width: 100%; /* Ocupa a largura total */
      z-index: 1000; /* Garante prioridade sobre outros elementos */
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Adiciona uma sombra para destaque */
    }

    .menu {
      position: relative;
      margin-right: 20px;
    }

    .logo {
      text-align: center;
      flex: 1;
    }

    .logo img {
      height: 50px;
    }

    .button {
      border: 2px solid #fff;
      padding: 10px 20px;
      border-radius: 20px;
      color: #fff;
      font-size: 16px;
      text-decoration: none;
      background-color: transparent;
      cursor: pointer;
      transition: all 0.3s;
    }

    .button:hover {
      background-color: #fff;
      color: #000;
    }

    .dropdown-menu {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
      background-color: #000;
      border-radius: 8px;
      padding: 10px;
      width: 200px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
      z-index: 1001; /* Garante que o dropdown apareça sobre outros elementos */
    }

    .dropdown-menu a {
      display: block;
      color: #fff;
      text-decoration: none;
      padding: 10px;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .dropdown-menu a:hover {
      background-color: #444;
    }

    .icons {
      display: flex;
      gap: 15px;
    }

    .icons img {
      width: 25px;
      height: 25px;
      cursor: pointer;
    }

    @media (min-width: 768px) {
      header {
        flex-wrap: nowrap;
      }

      .logo {
        text-align: center;
      }

      .icons {
        flex: initial;
        margin-top: 0;
      }
    }

    /* Espaço para o conteúdo abaixo do header */
    body {
      padding-top: 70px; /* Ajuste o valor conforme a altura do header */
    }
  </style>
</head>
<body>
  <header>
    <div class="menu">
      <button class="button" id="menuButton">&#9776;</button>
      <div class="dropdown-menu" id="dropdownMenu">
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
    <div class="logo">
    <a href="index.php" target="_blank" title="Ir para o site da imobiliária Yoshimura">
        <img src="img/log.png" alt="Logo da Imobiliária Yoshimura">
    </a>
</div>

    <div class="icons">
      <a href="https://wa.me/5551981241770" target="_blank" style="text-decoration: none;">
    <img src="https://img.icons8.com/ios-filled/50/ffffff/whatsapp.png" alt="WhatsApp" />
</a>

<a href="wel2003@terra.com.br" style="text-decoration: none;">
    <img src="https://img.icons8.com/ios-filled/50/ffffff/email.png" alt="Email" />
</a>

    </div>
  </header>

  <script>
    document.getElementById('menuButton').addEventListener('click', function() {
      const dropdownMenu = document.getElementById('dropdownMenu');
      if (dropdownMenu.style.display === 'block') {
        dropdownMenu.style.display = 'none';
      } else {
        dropdownMenu.style.display = 'block';
      }
    });

    window.addEventListener('click', function(e) {
      const dropdownMenu = document.getElementById('dropdownMenu');
      const menuButton = document.getElementById('menuButton');
      if (!menuButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
        dropdownMenu.style.display = 'none';
      }
    });
  </script>
  <?php
// INÍCIO DO header.php EXEMPLO:

session_start();

// Conexão ao banco de dados (ajuste conforme seu ambiente)
$servername = 'localhost';
$username = 'u268764721_IW';
$password = 'Murilo_132';
$dbname   = 'u268764721_IW';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Registra Page View:
$ip = $_SERVER['REMOTE_ADDR']; // IP do visitante
$page = basename($_SERVER['PHP_SELF']); // ou defina manualmente a página
$date = date('Y-m-d');

$sqlInsert = "INSERT INTO pageviews (ip, page, date_accessed)
              VALUES ('$ip', '$page', '$date')";
$conn->query($sqlInsert);

// FIM DO header.php (continue seu código normal)
?>

</body>
</html>
