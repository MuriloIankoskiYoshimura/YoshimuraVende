<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa de Imóveis</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Lora', sans-serif;
            background-color: #FAFAFA;
            color: #333;
            text-align: center;
        }
        * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
    }

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

.container {
    max-width: 1200px;
    margin: 30px auto 30px auto; /* Reduzi o valor da margem superior para aproximar do header */
    padding: 15px;
}

.filters {
    background: linear-gradient(145deg, #f9f9f9, #ffffff);
    padding: 25px;
    border-radius: 16px;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    margin-bottom: 20px; /* Reduzi o espaço inferior dos filtros */
    transition: transform 0.3s ease-in-out;
    transform: translateY(0);
}

.filters form {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
}

.filters label {
    font-weight: bold;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 10px;
    color: #444;
    font-size: 1rem;
}

.filters input, .filters select, .filters button {
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 10px;
    width: 100%;
    font-size: 1rem;
    transition: box-shadow 0.3s, border-color 0.3s;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
}

.filters input:focus, .filters select:focus {
    border-color: #007bff;
    box-shadow: 0 0 6px rgba(0, 123, 255, 0.5);
    outline: none;
}

.filters button {
    background: #000;
    color: #fff;
    cursor: pointer;
    transition: 0.3s;
    font-weight: bold;
    border: none;
    padding: 12px 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.filters button:hover {
    background: #333;
}

/* Ajustes específicos para dispositivos móveis */
@media (max-width: 768px) {
    .filters {
        padding: 15px; /* Reduz o padding dos filtros */
        box-shadow: none; /* Remove a sombra para tornar mais limpo */
        margin-top: 10px; /* Reduzi ainda mais a margem superior dos filtros */
    }

    .filters form {
        display: grid;
        grid-template-columns: repeat(2, 1fr); /* Mostra os filtros em duas colunas */
        gap: 15px; /* Reduz o espaço entre os filtros */
    }

    .filters label {
        font-size: 0.9rem; /* Reduz o tamanho do texto do label */
        margin-bottom: 5px; /* Menor espaço abaixo do label */
    }

    .filters input, .filters select, .filters button {
        padding: 8px; /* Menor padding nos campos */
        font-size: 0.9rem; /* Reduz o tamanho do texto */
    }

    .filters button {
        padding: 10px; /* Ajusta o tamanho do botão para ser menor */
        border-radius: 8px; /* Reduz o arredondamento */
    }
}



        .catalog {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            justify-content: center;
        }

        .card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s;
            position: relative;
            text-align: center;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .carrossel {
    position: relative;
    overflow: hidden;
    height: 260px; /* Aumentado de 220px para 260px */
}

.carrossel img {
    width: 100%;
    height: 260px; /* Aumentado de 220px para 260px */
    object-fit: cover;
    display: none;
    border-radius: 20px;
}

.carrossel img.active {
    display: block;
}

        .card-body {
            padding: 20px;
            text-align: center;
        }

        .card-title {
    font-family: 'Playfair Display', serif; /* Fonte elegante para títulos */
    font-size: 1.8rem;
    font-weight: bold;
    margin-bottom: 15px;
    color: black;
}


        .card-text {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 10px;
        }

        .card-footer {
            text-align: center;
            padding: 15px;
            background: #f9f9f9;
        }

        .card-footer button {
            padding: 10px 20px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: bold;
        }

        .card-footer button:hover {
            background: #0056b3;
        }

      
.linha-divisao {
    width: 100%;
    height: 1px;
    background: linear-gradient(to right, transparent, #ccc, transparent);
    margin: 40px 0;
    border: none;
}

    </style>
</head>
<body>
<header>
    <div class="menu">
      <button class="button" id="menuButton">&#9776; </button>
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
    <a href="https://wa.me/5551981241770?text=Olá, vim do site Imobiliaria Yoshimura!" target="_blank" title="Enviar mensagem no WhatsApp">
        <img src="https://img.icons8.com/ios-filled/50/ffffff/whatsapp.png" alt="WhatsApp">
    </a>
    <a href="https://wa.me/5551981241770?text=Olá, vim do site Imobiliaria Yoshimura!" target="_blank" title="Enviar um e-mail">
        <img src="https://img.icons8.com/ios-filled/50/ffffff/email.png" alt="Email">
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

    // Clique fora do menu para fechar o dropdown
    window.addEventListener('click', function(e) {
      const dropdownMenu = document.getElementById('dropdownMenu');
      const menuButton = document.getElementById('menuButton');
      if (!menuButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
        dropdownMenu.style.display = 'none';
      }
    });
  </script>

    <script>
        // Código JavaScript para alternar o menu no modo mobile
        document.addEventListener('DOMContentLoaded', function () {
            const menuToggle = document.getElementById('menu-toggle');
            const menu = document.getElementById('menu');

            menuToggle.addEventListener('click', function () {
                menu.classList.toggle('active');
            });

            const filtersToggle = document.querySelector('.filters-toggle');
            const filters = document.querySelector('.filters');

            if (filtersToggle && filters) {
                filtersToggle.addEventListener('click', function () {
                    filters.classList.toggle('active');
                });
            }
        });
    </script>
    <div class="container">
    
        <div class="filters">
            <form method="GET">
                <div>
                    <label for="location"><i class="fas fa-map-marker-alt"></i> Localização</label>
                    <select id="location" name="location">
                    <option value="">Selecione a localização</option>
        <option value="Centro">Centro</option>
        <option value="Panorâmico">Panorâmico</option>
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
                    <button type="submit"><i class="fas fa-search"></i> Filtrar</button>
                </div>
            </form>
        </div>



        <div class="linha-divisao"></div>

        <!-- Resultados -->
        
    <!-- Resultados -->
    <div class="catalog">
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

            // Quantidade de imóveis por página
            $imoveisPorPagina = 12;

            // Página atual
            $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
            if ($paginaAtual < 1) $paginaAtual = 1;

            // Calcula o índice do primeiro imóvel na página
            $inicio = ($paginaAtual - 1) * $imoveisPorPagina;

            // Query base
            $query = "SELECT * FROM imoveis WHERE 1=1";

            // Aplicar filtros
            if (!empty($_GET['location'])) {
                $query .= " AND bairro LIKE :location";
            }
            if (!empty($_GET['type'])) {
                $query .= " AND tipo = :type";
            }
            if (!empty($_GET['min_price'])) {
                $query .= " AND preco >= :min_price";
            }
            if (!empty($_GET['max_price'])) {
                $query .= " AND preco <= :max_price";
            }
            if (!empty($_GET['bedrooms'])) {
                $query .= " AND quartos = :bedrooms";
            }

            // Contagem total de imóveis (para paginação)
            $stmt = $pdo->prepare($query);
            if (!empty($_GET['location'])) {
                $stmt->bindValue(':location', '%' . $_GET['location'] . '%');
            }
            if (!empty($_GET['type'])) {
                $stmt->bindValue(':type', $_GET['type']);
            }
            if (!empty($_GET['min_price'])) {
                $stmt->bindValue(':min_price', $_GET['min_price']);
            }
            if (!empty($_GET['max_price'])) {
                $stmt->bindValue(':max_price', $_GET['max_price']);
            }
            if (!empty($_GET['bedrooms'])) {
                $stmt->bindValue(':bedrooms', $_GET['bedrooms']);
            }
            $stmt->execute();
            $totalImoveis = $stmt->rowCount();

            // Adiciona limite e offset para a paginação
            $query .= " LIMIT :inicio, :imoveisPorPagina";

            $stmt = $pdo->prepare($query);

            // Passar parâmetros dos filtros novamente
            if (!empty($_GET['location'])) {
                $stmt->bindValue(':location', '%' . $_GET['location'] . '%');
            }
            if (!empty($_GET['type'])) {
                $stmt->bindValue(':type', $_GET['type']);
            }
            if (!empty($_GET['min_price'])) {
                $stmt->bindValue(':min_price', $_GET['min_price']);
            }
            if (!empty($_GET['max_price'])) {
                $stmt->bindValue(':max_price', $_GET['max_price']);
            }
            if (!empty($_GET['bedrooms'])) {
                $stmt->bindValue(':bedrooms', $_GET['bedrooms']);
            }

            // Limitar a quantidade de registros por página
            $stmt->bindValue(':inicio', $inicio, PDO::PARAM_INT);
            $stmt->bindValue(':imoveisPorPagina', $imoveisPorPagina, PDO::PARAM_INT);

            $stmt->execute();
            $imoveis = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Exibir resultados
          foreach ($imoveis as $imovel) {
    $capaImagem = $imovel['capa']; // Acessando diretamente o campo 'capa'
    echo "
        <a href='detalhes.php?id={$imovel['id']}' class='card' style='text-decoration: none; color: inherit;'>
            <div class='carrossel'>
                <img src='{$capaImagem}' alt='{$imovel['titulo']}'>
                        </div>
                        <div class='card-body'>
                            <h3 class='card-title'>{$imovel['bairro']}</h3>
                           
                            <div class='card-details' style='display: flex; justify-content: center; align-items: center; gap: 15px; flex-wrap: wrap;'>
                                <p class='card-text'><i class='fa fa-bath'></i> {$imovel['banheiros']}</p>
                                <p class='card-text'><i class='fa fa-car'></i> {$imovel['garagem']}</p>
                                <p class='card-text'><i class='fa fa-bed'></i> {$imovel['quartos']}</p>
                                <p class='card-text'><i class='fa fa-ruler-combined'></i> {$imovel['metros_quadrados']} m&sup2;</p>
                            </div>
                          <div class='linha-divisao'></div>
                            <p class='favorite-card-text'><strong>Preço:</strong> <strong>R$ {$imovel['preco']}</strong></p>
                        </div>
                    </a>
                ";
            }

            // Cálculo de páginas
            $totalPaginas = ceil($totalImoveis / $imoveisPorPagina);
        } catch (PDOException $e) {
            echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
        }
        ?>
    </div>

    <!-- Paginação -->
<div class="pagination" style="margin-top: 20px; display: flex; justify-content: center; gap: 10px;">
    <?php if ($paginaAtual > 1): ?>
        <a href="?pagina=<?php echo $paginaAtual - 1; ?>" class="button" style="padding: 10px 15px; background: #000; color: #fff; border-radius: 8px; text-decoration: none;">Anterior</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
        <a href="?pagina=<?php echo $i; ?>" class="button" style="padding: 10px 15px; border-radius: 8px; text-decoration: none; 
            <?php if ($i == $paginaAtual) {
                echo 'background: #fff; color: #000; font-weight: bold;';
            } else {
                echo 'background: #000; color: #fff;';
            } ?>">
            <?php echo $i; ?>
        </a>
    <?php endfor; ?>

    <?php if ($paginaAtual < $totalPaginas): ?>
        <a href="?pagina=<?php echo $paginaAtual + 1; ?>" class="button" style="padding: 10px 15px; background: #000; color: #fff; border-radius: 8px; text-decoration: none;">Próximo</a>
    <?php endif; ?>
</div>
</div>
</body>
</html>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const carrossels = document.querySelectorAll('.carrossel');

            carrossels.forEach(carrossel => {
                const images = carrossel.querySelectorAll('img');
                let currentIndex = 0;

                if (images.length > 0) images[currentIndex].classList.add('active');

                setInterval(() => {
                    images[currentIndex].classList.remove('active');
                    currentIndex = (currentIndex + 1) % images.length;
                    images[currentIndex].classList.add('active');
                }, 3000); // Troca a imagem a cada 3 segundos
            });
        });
    </script>

<div class="linha-divisao"></div>
    
    <?php
  include 'foooter.php';
?>

</body>
</html>
