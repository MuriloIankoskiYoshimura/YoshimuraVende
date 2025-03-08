<?php
if (!isset($_SESSION['logged_in'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $senha = $_POST['senha'];
        $senha_correta = "welson123"; 
        if ($senha == $senha_correta) {
            $_SESSION['logged_in'] = true;
        } else {
            $erro = "Senha incorreta!";
        }
    }

    if (!isset($_SESSION['logged_in'])) {
        // Formulário para inserção da senha
        echo '
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Proteção com Senha</title>
            <style>
                body {
                    font-family: "Poppins", sans-serif;
                    margin: 0;
                    height: 100vh;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    overflow: hidden;
                    background: #000;
                    color: #fff;
                }

                /* Fundo com animação surreal em preto e branco */
                body::before {
                    content: "";
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: radial-gradient(circle, #ffffff 1%, transparent 1%) center/150px 150px,
                                radial-gradient(circle, #ffffff 1%, transparent 1%) center/300px 300px;
                    background-blend-mode: difference;
                    animation: bg-animation 8s infinite linear alternate;
                    z-index: -1;
                }

                @keyframes bg-animation {
                    0% { transform: scale(1); }
                    50% { transform: scale(1.2) rotate(15deg); }
                    100% { transform: scale(1); }
                }

                .login-container {
                    position: relative;
                    background: rgba(255, 255, 255, 0.1);
                    padding: 40px;
                    border-radius: 15px;
                    box-shadow: 0px 10px 20px rgba(255, 255, 255, 0.2);
                    width: 100%;
                    max-width: 400px;
                    text-align: center;
                    backdrop-filter: blur(10px);
                    transition: transform 0.3s ease-in-out;
                }

                .login-container:hover {
                    transform: translateY(-10px);
                }

                h2 {
                    color: #fff;
                    margin-bottom: 20px;
                    font-weight: bold;
                }

                input[type="password"] {
                    width: calc(100% - 20px);
                    padding: 15px 10px;
                    margin-bottom: 20px;
                    border-radius: 8px;
                    border: 1px solid #fff;
                    font-size: 1rem;
                    background: rgba(255, 255, 255, 0.1);
                    color: #fff;
                    box-shadow: inset 0px 2px 5px rgba(0, 0, 0, 0.3);
                    transition: all 0.3s ease;
                }

                input[type="password"]:focus {
                    box-shadow: 0px 0px 8px 2px rgba(255, 255, 255, 0.5);
                    outline: none;
                    border-color: #fff;
                    background: rgba(255, 255, 255, 0.2);
                }

                button {
                    background-color: #fff;
                    color: #000;
                    padding: 15px 20px;
                    border: none;
                    border-radius: 50px;
                    cursor: pointer;
                    width: 100%;
                    font-size: 1rem;
                    transition: background-color 0.3s ease, transform 0.2s ease;
                    box-shadow: 0px 8px 15px rgba(255, 255, 255, 0.2);
                }

                button:hover {
                    background-color: #ccc;
                    transform: translateY(-3px);
                    box-shadow: 0px 12px 20px rgba(255, 255, 255, 0.3);
                }

                .error {
                    color: #e60000;
                    margin-bottom: 15px;
                    font-weight: bold;
                    background-color: rgba(255, 0, 0, 0.1);
                    padding: 10px;
                    border-radius: 8px;
                }

                @media (max-width: 480px) {
                    .login-container {
                        padding: 20px;
                    }

                    h2 {
                        font-size: 1.5rem;
                    }

                    input[type="password"], button {
                        padding: 10px;
                    }
                }
            </style>
        </head>
        <body>
            <div class="login-container">
                <h2>Proteção com Senha</h2>
                '. (isset($erro) ? "<div class='error'>$erro</div>" : "") .'
                <form method="post">
                    <input type="password" name="senha" placeholder="Digite sua senha" required>
                    <button type="submit">Entrar</button>
                </form>
            </div>
        </body>
        </html>';
        exit();
    }
}



// Conexão com o banco de dados
$host = 'localhost';
$dbname = 'u268764721_IW';
$username = 'u268764721_IW';
$password = 'Murilo_132';

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consultas para o banco de dados
$sqlImoveis = "SELECT id, titulo, cidade, bairro, rua, tipo, quartos, banheiros, metros_quadrados, garagem, preco, capa, data_cadastro FROM imoveis";
$resultImoveis = $conn->query($sqlImoveis);

$sqlMensagens = "SELECT id, nome, email, mensagem, data_envio FROM mensagens_contato ORDER BY data_envio DESC";
$resultMensagens = $conn->query($sqlMensagens);

$sqlInteressados = "SELECT id, nome, email, telefone, descricao, data_envio FROM interessados_imovel ORDER BY data_envio DESC";
$resultInteressados = $conn->query($sqlInteressados);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
      include 'header.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard da Imobiliária</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

nav {
    background-color: #333; /* Preto */
    padding: 15px;
    text-align: center;
    margin-bottom: 30px;
    border-radius: 8px; /* Bordas arredondadas para dar um aspecto moderno */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Sombra suave para destacar o menu */
}

nav a {
    color: #fff; /* Cor branca para o texto */
    text-decoration: none;
    margin: 0 15px;
    font-weight: bold;
    transition: all 0.3s ease-in-out; /* Transição suave ao passar o mouse */
    padding: 10px 20px; /* Adiciona um pouco de espaço ao redor do texto */
    background-color: #444; /* Cinza escuro para os botões */
    border-radius: 50px; /* Bordas arredondadas que criam um efeito de botão circular */
    box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.2); /* Sombra para destacar os botões */
}

nav a:hover {
    background-color: #222; /* Altera para um cinza ainda mais escuro quando o mouse está sobre o link */
    color: #ccc; /* Muda a cor do texto para cinza claro ao passar o mouse */
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.3); /* Aumenta a sombra ao passar o mouse */
    transform: translateY(-3px); /* Levanta o botão um pouco ao passar o mouse */
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #000; /* Preto */
}

.section {
    background: #fff; /* Branco */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
}

.section h2 {
    margin-bottom: 15px;
    color: #000; /* Preto */
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.table th, .table td {
    border: 1px solid #ddd; /* Bordas em cinza claro */
    padding: 10px;
    text-align: left;
    color: #000; /* Preto */
}

.table th {
    background-color: #e0e0e0; /* Cinza muito claro para diferenciar os cabeçalhos */
}

.recent-message {
    background-color: #f4f4f4; /* Cinza claro para destacar mensagens recentes */
}

.property-img {
    max-width: 100px;
    height: auto;
    filter: grayscale(100%); /* Aplica um filtro para garantir que as imagens fiquem em preto e branco */
}


        /* Responsividade */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            nav {
                padding: 10px;
            }

            nav a {
                display: block;
                margin: 10px 0;
                padding: 10px;
            }

            .table th, .table td {
                padding: 5px;
            }

            .property-img {
                max-width: 80px;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.5rem;
            }

            .section {
                padding: 10px;
            }

            nav {
                text-align: left;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dashboard da Imobiliária</h1>

        <!-- Menu de Navegação -->
        <nav>
            <a href="#mensagens-contato">Mensagens de Contato</a>
            <a href="#lista-imoveis">Lista de Imóveis</a>
            <a href="#interessados-imoveis">Interessados em Adicionar Imóveis</a>
             <a href="cadastro.php" class="botao-personalizado">Página de cadastro</a>
        </nav>
        

        <!-- Seção de Mensagens de Contato Recentes -->
        <div id="mensagens-contato" class="section">
            <h2>Mensagens de Contato Recentes</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Mensagem</th>
                        <th>Data de Envio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($resultMensagens->num_rows > 0) {
                        while ($mensagem = $resultMensagens->fetch_assoc()) {
                            echo "<tr class='recent-message'>
                                <td>{$mensagem['id']}</td>
                                <td>{$mensagem['nome']}</td>
                                <td>{$mensagem['email']}</td>
                                <td>{$mensagem['mensagem']}</td>
                                <td>{$mensagem['data_envio']}</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Nenhuma mensagem encontrada.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Seção de Imóveis -->
        <div id="lista-imoveis" class="section">
            <h2>Lista de Imóveis</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Cidade</th>
                        <th>Bairro</th>
                        <th>Rua</th>
                        <th>Tipo</th>
                        <th>Quartos</th>
                        <th>Banheiros</th>
                        <th>Área (m²)</th>
                        <th>Garagem</th>
                        <th>Preço (R$)</th>
                        <th>Imagem</th>
                        <th>Data de Cadastro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($resultImoveis->num_rows > 0) {
                        while ($imovel = $resultImoveis->fetch_assoc()) {
                            echo "<tr>
                                <td>{$imovel['id']}</td>
                                <td>{$imovel['titulo']}</td>
                                <td>{$imovel['cidade']}</td>
                                <td>{$imovel['bairro']}</td>
                                <td>{$imovel['rua']}</td>
                                <td>{$imovel['tipo']}</td>
                                <td>{$imovel['quartos']}</td>
                                <td>{$imovel['banheiros']}</td>
                                <td>{$imovel['metros_quadrados']}</td>
                                <td>{$imovel['garagem']}</td>
                                <td>R$ {$imovel['preco']}</td>
                                <td><img src='{$imovel['capa']}' alt='Imagem do imóvel' class='property-img'></td>
                                <td>{$imovel['data_cadastro']}</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='13'>Nenhum imóvel encontrado.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Seção de Interessados em Adicionar Imóveis -->
        <div id="interessados-imoveis" class="section">
            <h2>Pessoas Interessadas em Adicionar Imóveis</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Descrição</th>
                        <th>Data de Envio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($resultInteressados->num_rows > 0) {
                        while ($interessado = $resultInteressados->fetch_assoc()) {
                            echo "<tr>
                                <td>{$interessado['id']}</td>
                                <td>{$interessado['nome']}</td>
                                <td>{$interessado['email']}</td>
                                <td>{$interessado['telefone']}</td>
                                <td>{$interessado['descricao']}</td>
                                <td>{$interessado['data_envio']}</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Nenhum interessado encontrado.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
// Fecha a conexão com o banco de dados
$conn->close();
?>
