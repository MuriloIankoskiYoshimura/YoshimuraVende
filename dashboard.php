<?php
session_start();

// ===================
// 1. Autenticação
// ===================
$usuario_correto = "welson";
$senha_correta = "37793217";

// Verifica se o usuário NÃO está logado e trata o login
if (!isset($_SESSION['logged_in'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = trim($_POST['usuario']);
        $senha = trim($_POST['senha']);

        if ($usuario === $usuario_correto && $senha === $senha_correta) {
            $_SESSION['logged_in'] = true;
            header("Location: dashboard.php"); // Redireciona após login bem-sucedido
            exit();
        } else {
            $erro = "Usuário ou senha incorretos!";
        }
    }

    // Exibe o formulário de login caso não esteja logado
    if (!isset($_SESSION['logged_in'])) {
        echo '
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login Seguro</title>
            <style>
                @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap");
                
                * {
                    box-sizing: border-box;
                    margin: 0;
                    padding: 0;
                }

                body {
                    font-family: "Poppins", sans-serif;
                    height: 100vh;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    background: linear-gradient(135deg, #1e1e1e, #3a3a3a);
                    color: #fff;
                }

                .login-container {
                    background: rgba(255, 255, 255, 0.1);
                    padding: 40px;
                    border-radius: 15px;
                    box-shadow: 0px 10px 30px rgba(255, 255, 255, 0.15);
                    text-align: center;
                    backdrop-filter: blur(10px);
                    width: 100%;
                    max-width: 400px;
                    animation: fadeIn 0.5s ease-in-out;
                }

                @keyframes fadeIn {
                    from { opacity: 0; transform: translateY(-20px); }
                    to { opacity: 1; transform: translateY(0); }
                }

                h2 {
                    font-size: 1.8rem;
                    margin-bottom: 20px;
                    font-weight: 600;
                }

                input {
                    width: 100%;
                    padding: 12px;
                    margin: 10px 0;
                    border-radius: 8px;
                    border: 1px solid rgba(255, 255, 255, 0.3);
                    font-size: 1rem;
                    background: rgba(255, 255, 255, 0.1);
                    color: #fff;
                    transition: 0.3s ease;
                }

                input:focus {
                    border-color: #fff;
                    outline: none;
                    background: rgba(255, 255, 255, 0.2);
                }

                button {
                    width: 100%;
                    padding: 12px;
                    border-radius: 50px;
                    border: none;
                    cursor: pointer;
                    font-size: 1rem;
                    font-weight: bold;
                    background: #fff;
                    color: #000;
                    transition: all 0.3s ease;
                }

                button:hover {
                    background: #ccc;
                    transform: translateY(-3px);
                    box-shadow: 0px 12px 20px rgba(255, 255, 255, 0.3);
                }

                .error {
                    background: rgba(255, 0, 0, 0.2);
                    color: #ff4d4d;
                    padding: 10px;
                    margin-bottom: 15px;
                    border-radius: 8px;
                    font-weight: bold;
                }
            </style>
        </head>
        <body>
            <div class="login-container">
                <h2>Área Restrita</h2>
                '. (isset($erro) ? "<div class=\'error\'>$erro</div>" : "") .'
                <form method="post">
                    <input type="text" name="usuario" placeholder="Nome de Usuário" required>
                    <input type="password" name="senha" placeholder="Senha" required>
                    <button type="submit">Entrar</button>
                </form>
            </div>
        </body>
        </html>';
        exit();
    }
}

// ======================
// 2. Conexão ao banco
// ======================
$servername = 'localhost';
$dbname = 'u268764721_IW';
$username = 'u268764721_IW';
$password = 'Murilo_132';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// ================================
// 3. Deleção de imóvel (GET)
// ================================
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']); 
    $sqlDelete = "DELETE FROM imoveis WHERE id = $delete_id";
    $conn->query($sqlDelete);
    header("Location: dashboard.php");
    exit();
}

// ======================
// 4. Consultas no banco
// ======================
$sqlImoveis = "SELECT id, titulo, cidade, bairro, rua, tipo, quartos, banheiros, 
                      metros_quadrados, garagem, preco, capa, data_cadastro 
               FROM imoveis";
$resultImoveis = $conn->query($sqlImoveis);

$sqlMensagens = "SELECT id, nome, email, mensagem, data_envio 
                 FROM mensagens_contato 
                 ORDER BY data_envio DESC";
$resultMensagens = $conn->query($sqlMensagens);

$sqlInteressados = "SELECT id, nome, email, telefone, descricao, data_envio 
                    FROM interessados_imovel 
                    ORDER BY data_envio DESC";
$resultInteressados = $conn->query($sqlInteressados);

// ==============================
// 5. Consulta de Page Views
// ==============================
$sqlPageViews = "
    SELECT 
        date_accessed, 
        COUNT(*) AS total_views, 
        COUNT(DISTINCT ip) AS unique_views
    FROM pageviews
    GROUP BY date_accessed
    ORDER BY date_accessed DESC
";
$resultPageViews = $conn->query($sqlPageViews);

$pageViewDates   = [];
$pageViewTotals  = [];
$pageViewUniques = [];

if ($resultPageViews->num_rows > 0) {
    while ($row = $resultPageViews->fetch_assoc()) {
        $pageViewDates[]   = $row['date_accessed'];
        $pageViewTotals[]  = $row['total_views'];
        $pageViewUniques[] = $row['unique_views'];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Se não tiver 'header.php', remova a linha abaixo -->
    <?php include 'header.php'; ?> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard da Imobiliária</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Chart.js CDN -->

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap");
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #141e30, #243b55);
            color: #fff;
            min-height: 100vh;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            backdrop-filter: blur(8px);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
            font-size: 2rem;
            font-weight: 600;
        }
        nav {
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            text-align: center;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
        }

        /* Botões do menu com gradiente chamativo */
        nav a {
            position: relative;
            display: inline-block;
            margin: 0 15px;
            padding: 10px 20px;
            font-weight: bold;
            color: #fff;
            text-decoration: none;
            border-radius: 50px;
            background: linear-gradient(90deg, #ED213A 0%, #93291E 50%, #f12711 100%);
            box-shadow: 0 4px 10px rgba(237, 33, 58, 0.4);
            transition: all 0.4s ease-in-out;
            overflow: hidden;
        }
        nav a::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255,255,255,0.3);
            transform: skewX(-20deg);
            transition: 0.5s;
        }
        nav a:hover::before {
            left: 100%;
        }
        nav a:hover {
            transform: scale(1.08) translateY(-3px) rotate(1deg);
            box-shadow: 0 8px 20px rgba(237, 33, 58, 0.6);
        }

        .section {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            margin-bottom: 30px;
        }
        .section h2 {
            margin-bottom: 15px;
            color: #fff;
            font-size: 1.5rem;
            font-weight: 500;
        }
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            overflow-y: hidden; 
            margin-bottom: 20px;
        }
        .table {
            width: 100%;
            min-width: 900px;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table thead {
            background: rgba(255, 255, 255, 0.15);
        }
        .table th, .table td {
            padding: 12px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            text-align: left;
            color: #fff;
        }
        .table th {
            font-weight: 600;
            white-space: nowrap;
        }
        .recent-message {
            background-color: rgba(255, 255, 255, 0.05);
        }
        .property-img {
            max-width: 100px;
            height: auto;
            filter: grayscale(80%);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }
        .btn-deletar {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            border: none;
            background-color: #ff4f4f;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            transition: 0.3s ease;
        }
        .btn-deletar:hover {
            background-color: #ff1f1f;
            box-shadow: 0px 0px 10px rgba(255, 0, 0, 0.5);
            transform: translateY(-3px);
        }
        @media (max-width: 768px) {
            nav a {
                margin: 5px 10px;
            }
            .section h2 {
                font-size: 1.3rem;
            }
            .table th, .table td {
                font-size: 0.9rem;
                padding: 8px;
            }
        }
        @media (max-width: 480px) {
            nav a {
                display: block;
                margin: 8px 0;
            }
            h1 {
                font-size: 1.6rem;
            }
            .section {
                padding: 15px;
            }
        }
    </style>

    <script>
    // Função para confirmar deleção
    function confirmarDelecao(idImovel) {
        let confirma = confirm("Deseja realmente deletar o imóvel de ID " + idImovel + "?");
        if (confirma) {
            window.location.href = "?delete_id=" + idImovel;
        }
    }
    </script>
</head>
<body>
    <div class="container">
        <h1>Dashboard da Imobiliária</h1>

        <!-- Menu de Navegação -->
        <nav>
            <a href="#mensagens-contato">Mensagens de Contato</a>
            <a href="#lista-imoveis">Lista de Imóveis</a>
            <a href="#interessados-imoveis">Interessados em Adicionar Imóveis</a>
            <a href="cadastro.php">Cadastrar Imóveis</a>
            <a href="lista-imoveis.php">Editar Imóveis</a>
        </nav>

        <!-- Seção de Mensagens de Contato Recentes -->
        <div id="mensagens-contato" class="section">
            <h2>Mensagens de Contato Recentes</h2>
            <div class="table-wrapper">
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
                    <?php if ($resultMensagens->num_rows > 0) : ?>
                        <?php while ($mensagem = $resultMensagens->fetch_assoc()) : ?>
                            <tr class="recent-message">
                                <td><?php echo $mensagem['id']; ?></td>
                                <td><?php echo $mensagem['nome']; ?></td>
                                <td><?php echo $mensagem['email']; ?></td>
                                <td><?php echo $mensagem['mensagem']; ?></td>
                                <td><?php echo $mensagem['data_envio']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <tr><td colspan="5">Nenhuma mensagem encontrada.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Seção de Imóveis -->
        <div id="lista-imoveis" class="section">
            <h2>Lista de Imóveis</h2>
            <div class="table-wrapper">
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
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if ($resultImoveis->num_rows > 0) : ?>
                        <?php while ($imovel = $resultImoveis->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo $imovel['id']; ?></td>
                                <td><?php echo $imovel['titulo']; ?></td>
                                <td><?php echo $imovel['cidade']; ?></td>
                                <td><?php echo $imovel['bairro']; ?></td>
                                <td><?php echo $imovel['rua']; ?></td>
                                <td><?php echo $imovel['tipo']; ?></td>
                                <td><?php echo $imovel['quartos']; ?></td>
                                <td><?php echo $imovel['banheiros']; ?></td>
                                <td><?php echo $imovel['metros_quadrados']; ?></td>
                                <td><?php echo $imovel['garagem']; ?></td>
                                <td>R$ <?php echo $imovel['preco']; ?></td>
                                <td><img src="<?php echo $imovel['capa']; ?>" alt="Imagem do imóvel" class="property-img"></td>
                                <td><?php echo $imovel['data_cadastro']; ?></td>
                                <td>
                                    <button class="btn-deletar" 
                                            onclick="confirmarDelecao(<?php echo $imovel['id']; ?>)">
                                        Deletar
                                    </button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <tr><td colspan="14">Nenhum imóvel encontrado.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Seção de Interessados em Adicionar Imóveis -->
        <div id="interessados-imoveis" class="section">
            <h2>Pessoas Interessadas em Adicionar Imóveis</h2>
            <div class="table-wrapper">
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
                    <?php if ($resultInteressados->num_rows > 0) : ?>
                        <?php while ($interessado = $resultInteressados->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo $interessado['id']; ?></td>
                                <td><?php echo $interessado['nome']; ?></td>
                                <td><?php echo $interessado['email']; ?></td>
                                <td><?php echo $interessado['telefone']; ?></td>
                                <td><?php echo $interessado['descricao']; ?></td>
                                <td><?php echo $interessado['data_envio']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <tr><td colspan="6">Nenhum interessado encontrado.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Seção de Análise de Page Views (TABELA) -->
        <div id="analise-pageviews" class="section">
            <h2>Análise de Page Views</h2>
            <div class="table-wrapper">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Page Views Totais</th>
                            <th>Page Views Únicas</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($pageViewDates)) : ?>
                        <?php for($i = 0; $i < count($pageViewDates); $i++): ?>
                            <tr>
                                <td><?php echo $pageViewDates[$i]; ?></td>
                                <td><?php echo $pageViewTotals[$i]; ?></td>
                                <td><?php echo $pageViewUniques[$i]; ?></td>
                            </tr>
                        <?php endfor; ?>
                    <?php else : ?>
                        <tr><td colspan="3">Nenhuma visita registrada ainda.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Seção de Gráfico de Page Views -->
        <div id="grafico-pageviews" class="section">
            <h2>Gráfico de Page Views</h2>
            <canvas id="myChart" width="400" height="150"></canvas>
        </div>

    </div>

    <?php
    // Fecha a conexão com o banco
    $conn->close();
    ?>

    <!-- Script para criar o gráfico com Chart.js (melhorado) -->
    <script>
        // Arrays em JavaScript vindos do PHP
        let pageViewDates   = <?php echo json_encode($pageViewDates); ?>;
        let pageViewTotals  = <?php echo json_encode($pageViewTotals); ?>;
        let pageViewUniques = <?php echo json_encode($pageViewUniques); ?>;

        const ctx = document.getElementById('myChart').getContext('2d');

        new Chart(ctx, {
            type: 'line', // Gráfico de linha
            data: {
                labels: pageViewDates, // Datas
                datasets: [
                    {
                        label: 'Visitas Totais',
                        data: pageViewTotals,
                        tension: 0.3,   // Curva suave
                        fill: true,     // Preenche a área sob a linha
                    },
                    {
                        label: 'Visitas Únicas',
                        data: pageViewUniques,
                        tension: 0.3,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                interaction: {
                    mode: 'index',
                    intersect: false
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    title: {
                        display: true,
                        text: 'Histórico de Page Views (Totais e Únicos)'
                    },
                    tooltip: {
                        enabled: true,
                        mode: 'index'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    },
                    x: {
                        // Exibe os labels (datas) de forma legível 
                        ticks: {
                            autoSkip: false,
                            maxRotation: 50,
                            minRotation: 0
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
