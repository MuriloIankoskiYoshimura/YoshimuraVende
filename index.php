<!DOCTYPE html> 
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imobiliaria Yoshimura</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #FAFAFA;
        color: #333;
        text-align: center;
    }

    .banner {
        width: 100%;
        height: 100vh;
        background: url('img/francesca-tosolini-tHkJAMcO3QE-unsplash.jpg') no-repeat center center/cover;
        position: relative;
    }

    header {
        position: absolute;
        top: 0;
        width: 100%;
        background: transparent;
        padding: 20px 0;
        z-index: 1000;
    }

    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
    }

    /* Estilo para a div da logo */
.logo {
    display: flex;
    align-items: center; /* Centraliza verticalmente o conteúdo */
    justify-content: center; /* Centraliza horizontalmente o conteúdo */
    height: auto; /* Ajuste automático da altura */
    padding: 10px; /* Pequeno espaço ao redor para evitar que fique colada em elementos adjacentes */
}

/* Estilo para a imagem da logo */
.logo img {
    max-width: 70%; /* Impede que a logo ultrapasse os limites da div */
    height: auto; /* Ajusta a altura proporcionalmente à largura */
    width: auto; /* Mantém a proporção correta */
    filter: drop-shadow(0px 2px 5px rgba(0, 0, 0, 0.8)); /* Adiciona sombra à logo */
}

/* Responsividade para diferentes tamanhos de tela */
@media (min-width: 768px) {
    .logo img {
        width: 250px; /* Logo maior em telas médias e maiores */
    }
}

@media (max-width: 767px) {
    .logo img {
        width: 150px; /* Ajusta a logo para dispositivos móveis menores */
    }
}

@media (max-width: 480px) {
    .logo img {
        width: 120px; /* Menor tamanho para telas muito pequenas */
    }
}


    .menu {
        list-style: none;
        display: flex;
        gap: 20px;
    }

    .menu li a {
        text-decoration: none;
        color: #fff;
        font-size: 1rem;
        text-shadow: 0px 2px 5px rgba(0, 0, 0, 0.8);
    }

    .menu-toggle {
        display: none;
        font-size: 1.8rem;
        cursor: pointer;
        color: #fff;
    }

    .overlay {
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-align: center;
        color: #fff;
        padding: 20px;
    }

    .overlay p {
        font-size: 1rem;
        margin-bottom: 8px;
    }

    .overlay h1 {
        font-size: 2.5rem;
        font-weight: bold;
    }

    .overlay h2 {
        font-size: 1.2rem;
        margin: 8px 0;
    }

    .filters {
        background: rgba(255, 255, 255, 0.8);
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        margin-top: 15px;
        width: 100%;
        max-width: 500px;
    }

    .filters form {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
        gap: 8px;
    }

    .filters label {
        font-weight: bold;
        margin-bottom: 5px;
        display: flex;
        align-items: center;
        gap: 8px;
        color: #555;
    }

    .filters input, .filters select, .filters button {
        padding: 6px;
        border: 1px solid #ddd;
        border-radius: 8px;
        width: 100%;
        font-size: 0.9rem;
    }

    .filters button {
        background: #007bff;
        color: #fff;
        cursor: pointer;
        transition: 0.3s;
        font-weight: bold;
    }

    .filters button:hover {
        background: #0056b3;
    }

    @media (max-width: 768px) {
        .menu {
            display: none;
            flex-direction: column;
            gap: 10px;
            background: rgba(0, 0, 0, 0.8);
            position: absolute;
            top: 60px;
            right: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .menu.active {
            display: flex;
        }

        .menu-toggle {
            display: block;
        }
    }
    </style>
</head>
<body>
    <section class="banner">
        <header>
            <nav>
            <div class="logo">
    <img src="img/log.png" alt="Logo da Imobiliária Yoshimura">
</div>

                <div class="menu-toggle" id="menu-toggle">☰</div>
                <ul class="menu" id="menu">
                    <li><a href="procurar.php">Procurar Casa</a></li>
                    <li><a href="seuimóvel.php">Anunciar Meu Imóvel</a></li>
                    <li><a href="dashboard.php">Sou Parceiro</a></li>
                </ul>
            </nav>
        </header>
        <div class="overlay">
            <p>BEM-VINDO</p>
            <h1>Realize seus Sonhos</h1>
            <h2>Imobiliária Yoshimura</h2>
            <!-- Filtros -->
            <div class="filters">
                <form method="GET" action="procurar.php">
                    <div>
                        <label for="location"><i class="fas fa-map-marker-alt"></i> Localização</label>
                        <select id="location" name="location">
                            <option value="">Selecione a localização</option>
                            <option value="Centro">Centro</option>
                            <option value="Panorãmico">Panorâmico</option>
                            <option value="Morrinhos">Morrinhos</option>
                            <option value="Ferraz">Ferraz</option>
                            <option value="Ambrósio">Ambrósio</option>
                            <option value="Pinguirito">Pinguirito</option>
                            <option value="Areias de Palhocinha">Areias de Palhocinha</option>
                            <option value="Campo D’una">Campo D’una</option>
                            <option value="Encantada">Encantada</option>
                            <option value="Barrinha">Barrinha</option>
                            <option value="Vigia">Praia da Vigia</option>
                            <option value="Gamboa">Gamboa</option>
                            <option value="Praia da Ferrugem">Praia da Ferrugem</option>
                            <option value="Praia do Silveira">Praia do Silveira</option>
                            <option value="Praia do Rosa">Praia do Rosa</option>
                            <option value="Ouvidor">Praia do Ouvidor</option>
                            <option value="Praia da Barra">Praia da Barra</option>
                            <option value="Macacu">Macacu</option>
                            <option value="Limpa">Limpa</option>
                            <option value="Garopaba Sul">Garopaba Sul</option>
                            <option value="Siriú">Siriú</option>
                            <option value="Cova Triste">Cova Triste</option>
                        </select>
                    </div>
                    <div>
                        <label for="type"><i class="fas fa-home"></i> Tipo</label>
                        <select id="type" name="type">
                            <option value="">Todos</option>
                            <option value="Casa">Casa</option>
                            <option value="Apartamento">Apartamento</option>
                            <option value="Terreno">Terreno</option>
                        </select>
                    </div>
                    <div>
                        <label for="min_price"><i class="fas fa-dollar-sign"></i> Preço Mínimo</label>
                        <input type="number" id="min_price" name="min_price" placeholder="R$">
                    </div>
                    <div>
                        <label for="max_price"><i class="fas fa-dollar-sign"></i> Preço Máximo</label>
                        <input type="number" id="max_price" name="max_price" placeholder="R$">
                    </div>
                    <div>
                        <label for="bedrooms"><i class="fas fa-bed"></i> Quartos</label>
                        <input type="number" id="bedrooms" name="bedrooms" placeholder="Digite o número">
                    </div>
                    <div>
                        <button type="submit"><i class="fas fa-search"></i> Procurar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('menu');

        menuToggle.addEventListener('click', () => {
            menu.classList.toggle('active');
        });
    </script>
    
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imobiliaria Yoshimura - Garopaba</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .section-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
            padding: 40px;
            max-width: 1200px;
            margin: auto;
            gap: 20px;
        }

        .text-container {
            flex: 1;
            min-width: 300px;
            max-width: 600px;
        }

        .text-container h5 {
            font-size: 1rem;
            font-weight: normal;
            margin-bottom: 10px;
        }

        .text-container h1 {
            font-size: 2.5rem;
            font-weight: 300;
            line-height: 1.2;
            margin-bottom: 10px;
        }

        .text-container h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-top: 20px;
        }

        .navigation-container {
            flex: 1;
            min-width: 300px;
            max-width: 600px;
            display: flex;
            gap: 20px;
            align-items: flex-start;
        }

        .image-container {
            flex-shrink: 0;
            width: 150px;
        }

        .image-container img {
            width: 100%;
            height: auto;
            border-radius: 12px;
        }

        .navigation-links {
            flex: 1;
        }

        .navigation-links h5 {
            font-size: 1rem;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .navigation-links ul {
            list-style: none;
            padding: 0;
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* Divide a lista em duas colunas */
            gap: 10px;
        }

        .navigation-links li {
            margin-bottom: 8px;
        }

        .navigation-links a {
            text-decoration: none;
            color: #000;
            font-size: 1rem;
        }

        .navigation-links a:hover {
            text-decoration: underline;
            color: #7b467b; /* cor de destaque */
        }

        @media (max-width: 768px) {
            .section-container {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .text-container, .navigation-container {
                max-width: 100%;
            }

            .navigation-container {
                flex-direction: column;
                align-items: center;
            }

            .navigation-links ul {
                grid-template-columns: 1fr; /* Em telas menores, exibe a lista em uma coluna */
            }
        }
    </style>
</head>
<body>

    <div class="section-container">
        <div class="text-container">
            <h5>Imobiliaria Yoshimura – Garopaba</h5>
            <h1>Imóveis impecáveis em<br>localizações privilegiadas.</h1>
            <h2>Esse é o nosso estilo.</h2>
        </div>
        <div class="navigation-container">
            <div class="image-container">
                <img src="img/francesca-tosolini-tHkJAMcO3QE-unsplash.jpg" alt="Imagem de um interior sofisticado">
            </div>
            <div class="navigation-links">
                <h5>Navegue por bairros nobres de Garopaba</h5>
                <ul>
                    <li><a href="#">Praia Do Rosa</a></li>
                    <li><a href="#">Panorâmico</a></li>
                    <li><a href="#">Morrinhos</a></li>
                    <li><a href="#">Praia do Silveira</a></li>
                    <li><a href="#">Praia da Gamboa</a></li>
                    <li><a href="#">Praia da Vigia</a></li>
                    <li><a href="#">Praia da Ferrugem</a></li>
                    <li><a href="#">Praia do Siriú</a></li>
                    <li><a href="#">Praia da Barra</a></li>
                    <li><a href="#">Ver mais</a></li>
                </ul>
            </div>
        </div>
    </div>

    

</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casas Favoritas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .favoritas-container {
            max-width: 1200px;
            margin: auto;
            padding: 40px 20px;
        }

        .favoritas-titulo {
            font-size: 2rem;
            text-align: center;
            margin-bottom: 40px;
        }

        .card-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 30px;
        }

        .card {
            width: 30%;
            text-decoration: none;
            color: inherit;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .carrossel img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .card-details {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            font-size: 1rem;
        }

        .card-text {
            margin: 5px 0;
        }

        .linha-divisao {
            width: 100%;
            height: 1px;
            background-color: #ddd;
            margin: 20px 0;
        }
    </style>
</head>
<body>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa de Imóveis</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
       /* Casas Favoritas */
.favorite-container {
    margin: 50px auto;
    max-width: 1200px;
}

.favorite-title {
    font-size: 2rem;
    margin-bottom: 20px;
    text-align: center;
    font-family: 'Playfair Display', serif;
}

.favorite-catalog {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 25px;
    justify-content: center;
}

.favorite-card {
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s;
    position: relative;
    text-align: center;
}

.favorite-card:hover {
    transform: translateY(-10px);
}

.favorite-card img {
    width: 100%;
    height: 260px;
    object-fit: cover;
    border-radius: 20px;
}

.favorite-card-body {
    padding: 20px;
    text-align: center;
}

/* Atualizar a fonte do título das casas */
.favorite-card-title {
    font-size: 1.8rem;
    font-weight: bold;
    margin-bottom: 15px;
    color: black;
    font-family: 'Playfair Display', serif; /* Aplicando a mesma fonte dos favoritos */
}

.favorite-card-text {
    font-size: 1.1rem;
    color: #666;
    margin-bottom: 10px;
}

.favorite-card-footer {
    text-align: center;
    padding: 15px;
    background: #f9f9f9;
}

.linha-divisao {
    width: 100%;
    height: 1px;
    background: linear-gradient(to right, transparent, #ccc, transparent);
    margin: 40px 0;
    border: none;
}

        .linha-divisao {
    width: 100%;
    height: 1px;
    background: linear-gradient(to right, transparent, #ccc, transparent);
    margin: 40px 0;
    border: none;
}
.favorite-container {
    margin: 50px auto; /* Espaço vertical acima e abaixo */
    max-width: 1200px; /* Define uma largura máxima */
    padding: 0 0px; /* Adiciona espaçamento nas laterais */
    box-sizing: border-box; /* Inclui padding dentro do tamanho do box */
}

.favorite-catalog {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 25px;
    justify-content: center;
    padding: 20px; /* Adiciona espaço interno ao catálogo */
}

    </style>
</head>
<body>
<div class="linha-divisao"></div>
    <!-- Código anterior... -->

    <!-- Seção Casas Favoritas -->
    <div class="favorite-container">
        <h2 class="favorite-title">Casas Favoritas</h2>
        <div class="favorite-catalog">
            <?php
            // Configuração do banco de dados
            $host = 'localhost';
            $dbname = 'u268764721_IW';
            $username = 'u268764721_IW';
            $password = 'Murilo_132';

            try {
                // Conexão com o banco de dados
                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Definir IDs das casas favoritas
                $favoriteIds = [9, 10, 11]; // Altere aqui os IDs das casas favoritas

                // Query para selecionar as casas favoritas
                $placeholders = implode(',', array_fill(0, count($favoriteIds), '?'));
                $query = "SELECT * FROM imoveis WHERE id IN ($placeholders)";
                $stmt = $pdo->prepare($query);
                $stmt->execute($favoriteIds);
                $casasFavoritas = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Exibir resultados
               foreach ($casasFavoritas as $casa) {
    // Verifica se o campo "capa" está presente e utiliza essa imagem
    $imagemCapa = $casa['capa']; // A imagem principal definida no banco de dados
    
    echo "
        <a href='detalhes.php?id={$casa['id']}' class='favorite-card' style='text-decoration: none; color: inherit;'>
            <img src='{$imagemCapa}' alt='{$casa['titulo']}'>
            <div class='favorite-card-body'>
                <h3 class='favorite-card-title'>{$casa['bairro']}</h3>
                <div class='favorite-card-details' style='display: flex; justify-content: center; align-items: center; gap: 15px; flex-wrap: wrap;'>
                    <p class='favorite-card-text'><i class='fa fa-bath'></i> {$casa['banheiros']}</p>
                    <p class='favorite-card-text'><i class='fa fa-car'></i> {$casa['garagem']}</p>
                    <p class='favorite-card-text'><i class='fa fa-bed'></i> {$casa['quartos']}</p>
                    <p class='favorite-card-text'><i class='fa fa-ruler-combined'></i> {$casa['metros_quadrados']} m&sup2;</p>
                    <div class='linha-divisao'></div>
                    <p class='favorite-card-text'><strong>Preço:</strong> <strong>R$ {$casa['preco']}</strong></p>
                </div>
            </div>
        </a>";
}
            } catch (PDOException $e) {
                echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
            }
            ?>
        </div>
    </div>

    <div class="linha-divisao"></div>


    <div class="favorite-container">
        <h2 class="favorite-title">Ofertas 2025</h2>
        <div class="favorite-catalog">
            <?php
            // Configuração do banco de dados
            $host = 'localhost';
            $dbname = 'u268764721_IW';
            $username = 'u268764721_IW';
            $password = 'Murilo_132';

            try {
                // Conexão com o banco de dados
                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Definir IDs das casas favoritas
                $favoriteIds = [14, 17, 18]; // Altere aqui os IDs das casas favoritas

                // Query para selecionar as casas favoritas
                $placeholders = implode(',', array_fill(0, count($favoriteIds), '?'));
                $query = "SELECT * FROM imoveis WHERE id IN ($placeholders)";
                $stmt = $pdo->prepare($query);
                $stmt->execute($favoriteIds);
                $casasFavoritas = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Exibir resultados
               foreach ($casasFavoritas as $casa) {
    // Verifica se o campo "capa" está presente e utiliza essa imagem
    $imagemCapa = $casa['capa']; // A imagem principal definida no banco de dados
    
    echo "
        <a href='detalhes.php?id={$casa['id']}' class='favorite-card' style='text-decoration: none; color: inherit;'>
            <img src='{$imagemCapa}' alt='{$casa['titulo']}'>
            <div class='favorite-card-body'>
                <h3 class='favorite-card-title'>{$casa['bairro']}</h3>
                <div class='favorite-card-details' style='display: flex; justify-content: center; align-items: center; gap: 15px; flex-wrap: wrap;'>
                    <p class='favorite-card-text'><i class='fa fa-bath'></i> {$casa['banheiros']}</p>
                    <p class='favorite-card-text'><i class='fa fa-car'></i> {$casa['garagem']}</p>
                    <p class='favorite-card-text'><i class='fa fa-bed'></i> {$casa['quartos']}</p>
                    <p class='favorite-card-text'><i class='fa fa-ruler-combined'></i> {$casa['metros_quadrados']} m&sup2;</p>
                    <div class='linha-divisao'></div>
                    <p class='favorite-card-text'><strong>Preço:</strong> <strong>R$ {$casa['preco']}</strong></p>
                </div>
            </div>
        </a>";
}
            } catch (PDOException $e) {
                echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
            }
            ?>
        </div>
    </div>

    <!-- Código posterior... -->

</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seção Minimalista com Imagem</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            overflow-x: hidden;
        }

        .cta-section {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 60vh; /* Altura reduzida */
            color: #fff;
            text-align: center;
            overflow: hidden;
        }

        /* Imagem de fundo */
        .cta-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('img/dominik-lange-JpWtmyjMI30-unsplash.jpg') no-repeat center center/cover;
            z-index: -1;
            filter: brightness(50%); /* Suaviza o contraste */
        }

        .cta-content {
            z-index: 2;
            max-width: 700px;
            animation: fadeInUp 1.2s ease-in-out;
        }

        .cta-content h1 {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .cta-content p {
            font-size: 1rem;
            line-height: 1.5;
            margin-bottom: 1.5rem;
            color: #eaeaea;
        }

        .cta-content a {
            padding: 0.8rem 1.5rem;
            font-size: 1rem;
            font-weight: bold;
            background-color: #ffffff; /* Fundo branco */
            color: #000; /* Texto preto */
            text-decoration: none;
            border: 2px solid #000; /* Borda preta */
            border-radius: 50px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease-in-out;
        }

        .cta-content a:hover {
            background-color: #ff6600; /* Fundo laranja ao passar o mouse */
            color: #fff; /* Texto branco ao passar o mouse */
            transform: scale(1.05); /* Efeito de zoom */
        }

        @keyframes fadeInUp {
            0% {
                transform: translateY(20px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <section class="cta-section">
        <!-- Conteúdo -->
        <div class="cta-content">
            <h1>Pronto para Avançar?</h1>
            <p>Explore novas possibilidades e transforme seus resultados com estratégias modernas.</p>
            <a href="procurar.php">Saiba Mais</a>
        </div>
    </section>

    <div class="dots-separator">
        <span></span>
    </div>
    <?php
// Exemplo simples de registro de IP
$ip = $_SERVER['REMOTE_ADDR'];

// Se estiver atrás de Cloudflare ou outro proxy, você pode usar:
 // $ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];

$date = date('Y-m-d');

// Conexão ao BD (ajuste se necessário)
$servername = 'localhost';
$username   = 'root';
$password   = '';
$dbname     = 'minha_base';

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn->connect_error) {
    // Insere a cada page view
    $sqlInsert = "INSERT INTO pageviews (ip, date_accessed) VALUES ('$ip', '$date')";
    $conn->query($sqlInsert);
}

// ... o restante do seu header ...
?>

    <?php
        include 'foooter.php';
    ?>
</body>
</html>

