<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Imóvel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

       <style>

body {
    font-family: 'kanit', sans-serif;
    background-color: #FFFFFF;
    color: #000000;
    margin: 0;
    padding: 0;
}
.reference {
    text-align: center;
    margin-top: 10px;
    margin-bottom: 20px;
    font-size: 0.8rem;
    color: #555; /* Cinza claro para menor destaque */
    font-style: italic;
}

.container {
    max-width: 1200px;
    margin: 50px auto;
    padding: 20px;
    background: #FFFFFF;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.title {
    text-align: center;
    margin-bottom: 20px;
}

.title h2 {
    font-size: 2.5rem;
    margin-bottom: 10px;
    color: #000000;
    font-weight: 600;
}

.main-content {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

.image-block {
    flex: 2;
    cursor: pointer;
    border-radius: 8px;
    overflow: hidden;
    min-width: 300px;
}

.image-block img {
    width: 100%;
    max-height: 500px;
    object-fit: cover;
    border: 1px solid #000000;
}

.info-container {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 15px;
    min-width: 300px;
}

.price-block {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.price-block h3 {
    font-size: 1rem;
    color: #000000;
    margin-bottom: 5px;
}

.price-block .price {
    font-size: 1.5rem;
    color: #000000;
    font-weight: bold;
    background: #FFFFFF;
    border: 2px solid #000000;
    border-radius: 20%;
    padding: 10px 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.minimal-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 20px 45px;
    font-size: 1rem;
    font-weight: bold;
    color: #000000;
    background: #FFFFFF;
    border: 2px solid #000000;
    border-radius: 25px;
    text-decoration: none;
    transition: background 0.3s, color 0.3s;
    gap: 8px;
}

.minimal-button i {
    font-size: 1.2rem;
}

.minimal-button:hover {
    background: #000000;
    color: #FFFFFF;
}


.actions {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-top: 10px;
    flex-wrap: wrap;
}

.actions a {
    display: inline-block;
    padding: 10px 20px;
    background: #000000;
    color: #FFFFFF;
    border-radius: 25px;
    text-decoration: none;
    font-size: 1rem;
    font-weight: bold;
    text-align: center;
    transition: 0.3s ease-in-out;
}

.actions a:hover {
    background: #333333;
}

.info-block {
    display: flex;
    flex-direction: column;
    gap: 10px;
    background: #F5F5F5;
    padding: 15px;
    border-radius: 8px;
    border: 1px solid #000000;
}

.info-item {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 1.1rem;
}

/* Contêiner para localização e descrição */
.info-description-container {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 20px;
    margin-top: 20px;
}

/* Bloco de localização */
.location-block {
    flex: 1;
    padding: 15px;
    background-color: #F5F5F5; /* Cor de fundo */
    border: 1px solid #DDD;
    border-radius: 8px;
}

.location-block h3 {
    font-size: 1.5rem;
    color: #000;
    margin-bottom: 15px;
    font-weight: bold;
}

.location-item {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 1.1rem;
    color: #333;
    margin-bottom: 10px;
}

.location-item i {
    font-size: 1.2rem;
    color: #666;
}

/* Botão para ver localização */
.location-button {
    display: inline-block;
    padding: 10px 20px;
    font-size: 1rem;
    font-weight: bold;
    color: #FFFFFF;
    background-color: #000000;
    border: none;
    border-radius: 8px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.location-button:hover {
    background-color: #333333;
    color: #FFFFFF;
}

/* Bloco de descrição */
.description-block {
    flex: 2;
    padding: 15px;
    background-color: #FFFFFF;
    border: 1px solid #DDD;
    border-radius: 8px;
}

.description-block h3 {
    font-size: 1.5rem;
    color: #000;
    margin-bottom: 15px;
    font-weight: bold;
}

.description-block p {
    font-size: 1.1rem;
    color: #333;
    line-height: 1.6;
}

/* Responsividade */
@media (max-width: 768px) {
    .info-description-container {
        flex-direction: column; /* Empilha os blocos em telas menores */
    }
}

/* Grupo de botões alinhado à esquerda */
.button-group {
    display: flex;
    flex-direction: column;
    align-items: flex-start; /* Alinhados à esquerda */
    gap: 15px;
    margin-top: 20px;
}

/* Botão preto com ícone e brilho no hover */
.black-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 12px 30px;
    font-size: 1.2rem;
    font-weight: bold;
    color: #FFFFFF;
    background-color: #000000;
    border: 2px solid #000000;
    border-radius: 30px;
    text-decoration: none;
    gap: 10px; /* Espaço entre texto e ícone */
    text-align: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease, box-shadow 0.3s ease;
}

.black-button:hover {
    background-color: #000000;
    color: #FFFFFF;
    box-shadow: 0 0 15px rgba(255, 255, 255, 0.7); /* Brilho minimalista */
}

/* Botão branco com borda preta */
.minimal-button {
    display: inline-block;
    padding: 10px 25px;
    font-size: 1.1rem;
    font-weight: bold;
    color: #000000;
    background-color: #FFFFFF;
    border: 1px solid #000000; /* Borda fina */
    border-radius: 30px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.minimal-button:hover {
    background-color: #000000;
    color: #FFFFFF;
}

/* Botões horizontais */
.horizontal-buttons {
    display: flex;
    align-items: center;
    gap: 15px; /* Espaço entre botões */
}

/* Ícone de WhatsApp */
.whatsapp-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 45px;
    height: 45px;
    background-color: #25D366;
    color: #FFFFFF;
    font-size: 1.5rem;
    border-radius: 50%;
    text-decoration: none;
    transition: transform 0.3s ease;
}

.whatsapp-icon:hover {
    transform: scale(1.1);
}

.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.modal.active {
    display: flex;
}

.modal-content {
    position: relative;
    max-width: 90%;
    max-height: 90%;
}

.modal-content img {
    width: 100%;
    height: auto;
    border-radius: 8px;
}

.navigation {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    display: flex;
    justify-content: space-between;
    width: 100%;
    padding: 0 20px;
}

.navigation button {
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid #000000;
    color: #000000;
    padding: 10px 20px;
    font-size: 1.2rem;
    border-radius: 50%;
    cursor: pointer;
    transition: 0.3s;
}

.navigation button:hover {
    background: #000000;
    color: #FFFFFF;
}

.close {
    position: absolute;
    top: 20px;
    right: 20px;
    color: #FFFFFF;
    font-size: 2rem;
    cursor: pointer;
}

@media (max-width: 768px) {
    .title h2 {
        font-size: 2rem;
    }

    .main-content {
        flex-direction: column;
    }

    .price-block h3 {
        font-size: 1rem;
    }

    .price-block .price {
        font-size: 1.2rem;
    }

    .info-item {
        font-size: 1rem;
    }

    .description h3 {
        font-size: 1.5rem;
    }

    .description p {
        font-size: 1rem;
    }

    .actions a {
        padding: 8px 15px;
        font-size: 0.9rem;
    }
}
body {
    font-family: 'Inter', sans-serif; /* Fonte moderna e limpa */
    margin: 0;
    padding: 0;
    background-color: #FFFFFF; /* Fundo branco */
    color: #000; /* Texto preto */
}

.contact-section {
    text-align: center;
    padding: 30px 20px; /* Espaçamento interno */
    background: #FFFFFF; /* Fundo branco */
}

.section-title {
    font-size: 1.8rem; /* Tamanho da fonte do título */
    margin-bottom: 20px;
    color: #000; /* Texto preto */
}

.section-title span {
    font-weight: bold; /* Destaca o texto com negrito */
}

.contact-options {
    display: flex; /* Usa o Flexbox para alinhar os cartões */
    justify-content: center; /* Centraliza horizontalmente */
    align-items: center; /* Centraliza verticalmente */
    gap: 15px; /* Espaçamento entre os cartões */
    flex-wrap: nowrap; /* Garante que os cartões fiquem em uma linha */
}

.contact-card {
    flex: 0 0 auto; /* Garante tamanho fixo no Flexbox */
    text-align: center;
    padding: 15px;
    border: 1px solid #000; /* Borda preta */
    border-radius: 8px; /* Borda arredondada */
    background: #fff; /* Fundo branco */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Animações suaves */
    cursor: pointer; /* Indica que o elemento é clicável */
    min-width: 100px; /* Define um tamanho mínimo */
}

.contact-card:hover {
    transform: translateY(-3px); /* Eleva o cartão ao passar o mouse */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15); /* Adiciona sombra suave */
}

.contact-card i {
    font-size: 1.5rem; /* Tamanho do ícone */
    margin-bottom: 5px;
    display: block; /* Garante que o ícone fique acima do texto */
    color: #000; /* Ícone preto */
}

.contact-card p {
    font-size: 0.9rem; /* Texto menor */
    font-weight: 500; /* Peso médio do texto */
    margin: 0;
}

/* Estilo adicional para itens informativos (opcional) */
.info-item i {
    color: black; /* Ícones pretos */
    margin-right: 5px; /* Espaçamento entre ícone e texto */
}
.contact-card {
    text-decoration: none; /* Remove o sublinhado */
    color: inherit; /* Usa a cor definida para o elemento pai */
}

.contact-card:hover {
    text-decoration: none; /* Garante que o texto não fique sublinhado no hover */
    color: #000; /* Define uma cor no hover, se necessário */
}


/* Para telas menores (responsivo) */
@media (max-width: 768px) {
    .contact-options {
        overflow-x: auto; /* Permite rolagem horizontal */
        padding: 10px;
    }

    .contact-card {
        min-width: 90px; /* Tamanho mínimo reduzido para caber melhor */
    }
}

/* Separador com Pontinhos */
.dots-separator {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 20px;
    margin: 30px 0;
    position: relative;
}

.dots-separator::before,
.dots-separator::after {
    content: '';
    flex: 1;
    height: 1px;
    background: #000; /* Cor da linha */
    opacity: 0.5; /* Transparência para suavidade */
}

.dots-separator::before {
    margin-right: 10px; /* Espaçamento entre linha e ponto */
}

.dots-separator::after {
    margin-left: 10px; /* Espaçamento entre linha e ponto */
}

.dots-separator span {
    width: 6px;
    height: 6px;
    background: #000; /* Cor do ponto */
    border-radius: 50%;
}


/* Responsividade */
@media (max-width: 768px) {
    .contact-options {
        flex-direction: column;
        gap: 20px;
    }
}
.gallery-container {
            margin-top: 30px;
            padding: 20px;
            background: #FFFFFF;
            border-radius: 12px;
            border: 1px solid #DDD;
            text-align: center;
        }

        .gallery-container h3 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #000;
            font-weight: bold;
        }

        .gallery {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .gallery-item {
            flex: 1 1 calc(25% - 20px);
            max-width: 200px;
            max-height: 200px;
            height: 200px;
            width: 200px;
            cursor: pointer;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #F9F9F9;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 12px;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .gallery-item {
                flex: 1 1 calc(50% - 20px);
                max-width: calc(50% - 20px);
            }
        }

        @media (max-width: 480px) {
            .gallery-item {
                flex: 1 1 calc(100% - 20px);
                max-width: calc(100% - 20px);
            }
        }

       </style>

 
</head>
<body>

<?php
  include 'header.php';
?>

<div class="container">
    <?php
$host = 'localhost';
$dbname = 'u268764721_IW';
$username = 'u268764721_IW';
$password = 'Murilo_132';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $stmt = $pdo->prepare("SELECT * FROM imoveis WHERE id = :id");
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $imovel = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($imovel) {
                 $capa = $imovel['capa']; 
                $imagens = json_decode($imovel['imagens'], true);
                $cidade = $imovel['cidade'];
                $bairro = $imovel['bairro'];
                $rua = $imovel['rua'];

                if ($imovel) {
                    echo "<div class='reference'>";
                    echo "<small>Código: {$imovel['id']} | Cidade: {$imovel['cidade']}</small>";
                    echo "</div>";
                }
                
                echo "<div class='title'>";
                echo "<h2>{$imovel['seo']}</h2>";
                echo "</div>";

                echo "<div class='main-content'>";
                echo "<div class='image-block' onclick='openModal(0)'>";
                echo "<img src='{$capa}' alt='{$imovel['titulo']}'>";
                echo "</div>";

                echo "<div class='info-container'>";
                echo "<div class='price-block'>";
                echo "<h3>Valor à Venda</h3>";
                echo "<p class='price'>R$ {$imovel['preco']}</p>";
                echo "</div>";

                echo "<div class='info-block'>";
                echo "<div class='info-item'><i class='fa fa-bed'></i><strong>Quartos:</strong> {$imovel['quartos']}</div>";
                echo "<div class='info-item'><i class='fa fa-bath'></i><strong>Banheiros:</strong> {$imovel['banheiros']}</div>";
                echo "<div class='info-item'><i class='fa fa-car'></i><strong>Garagem:</strong> {$imovel['garagem']}</div>";
                echo "<div class='info-item'><i class='fa fa-ruler-combined'></i><strong>Área:</strong> {$imovel['metros_quadrados']} m²</div>";
                echo "<div class='info-item'><i class='fa fa-map-marker-alt'></i><strong> Localização:</strong> {$imovel['bairro']}</div>";
                echo "<div class='info-item'>
        <i class='fa fa-home'></i> 
        <strong>Tipo:</strong> {$imovel['tipo']}
      </div>";

                echo "</div>";

                echo "<div class='button-group'>";
                echo "<a href='https://wa.me/5551981241770?text=Olá, gostaria de mais informações sobre o imóvel:{$imovel['titulo']}({$imovel['seo']}) ,No Bairro:{$imovel['bairro']}({$imovel['id']})//é um(a)-{$imovel['tipo']}' class='black-button'>";
                echo "<i class='fa fa-info-circle'></i> Mais Informações";
                echo "</a>";
                echo "</div>";
                

 // Botão "Agendar Visita" e ícone WhatsApp
 echo "<div class='horizontal-buttons'>";
 echo "<a href='https://wa.me/5551981241770?text=Olá, gostaria de mais informações sobre o imóvel:{$imovel['titulo']}({$imovel['seo']}) ,No Bairro:{$imovel['bairro']}({$imovel['id']})//é um(a)-{$imovel['tipo']} ' class='minimal-button'>Agendar Visita</a>";
 echo "<a href='https://wa.me/5551981241770?text=Olá, gostaria de mais informações sobre o imóvel:{$imovel['titulo']}({$imovel['seo']}) ,No Bairro:{$imovel['bairro']}({$imovel['id']})//é um(a)-{$imovel['tipo']} , .' target='_blank' class='whatsapp-icon'>";

 echo "<i class='fab fa-whatsapp'></i>";
 echo "</a>";
 echo "</div>";
 

                echo "</div>"; // Fechando .info-container
                echo "</div>"; // Fechando .main-content

                // Bloco de localização e descrição lado a lado
                echo "<div class='info-description-container'>";

                // Bloco de localização
                echo "<div class='location-block'>";
                echo "<h3>Localização</h3>";
                echo "<div class='location-item'><i class='fa fa-map-marker-alt'></i><strong>Cidade:</strong> {$cidade}</div>";
                echo "<div class='location-item'><i class='fa fa-map-marker-alt'></i><strong>Bairro:</strong> {$bairro}</div>";
                echo "<div class='location-item'><i class='fa fa-map-marker-alt'></i><strong>Rua:</strong> {$rua}</div>";
                echo "<a href='https://www.google.com/maps/search/?api=1&query={$rua},+{$bairro},+{$cidade}' target='_blank' class='location-button'>Ver Localização</a>";
                echo "</div>";

                // Bloco de descrição
                echo "<div class='description-block'>";
                echo "<h3> Sobre o Imóvel </h3>";
                echo "<p>{$imovel['descricao']}</p>";
                echo "</div>";

                echo "</div>"; // Fechando info-description-container
            } else {
                echo "<p>Imóvel não encontrado.</p>";
            }
        } else {
            echo "<p>ID do imóvel não especificado.</p>";
        }
    } catch (PDOException $e) {
        echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    }
    ?>
</div>





    </div>

    <div class="modal" id="modal">
        <div class="modal-content">
            <img id="modal-image" src="" alt="">
            <div class="navigation">
                <button onclick="prevImage()"><i class="fa fa-chevron-left"></i></button>
                <button onclick="nextImage()"><i class="fa fa-chevron-right"></i></button>
            </div>
            <span class="close" onclick="closeModal()">&times;</span>
        </div>
    </div>

    <script>
        const images = <?php echo json_encode($imagens); ?>;
        let currentIndex = 0;

        function openModal(index) {
            currentIndex = index;
            updateModalImage();
            document.getElementById('modal').classList.add('active');
        }

        function closeModal() {
            document.getElementById('modal').classList.remove('active');
        }

        function nextImage() {
            currentIndex = (currentIndex + 1) % images.length;
            updateModalImage();
        }

        function prevImage() {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            updateModalImage();
        }

        function updateModalImage() {
            document.getElementById('modal-image').src = images[currentIndex];
        }
    </script>
<div class="dots-separator"></div>

<?php
// Conexão com o banco de dados
$$host = 'localhost';
$dbname = 'u268764721_IW';
$username = 'u268764721_IW';
$password = 'Murilo_132';

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Captura o ID da URL
$id_imovel = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Se o ID for válido, faz a consulta ao banco de dados
if ($id_imovel > 0) {
    $sql = "SELECT id, titulo, seo, bairro, tipo FROM imoveis WHERE id = $id_imovel";
    $result = $conn->query($sql);
?>

<div class="contact-container">
    <section class="contact-section">
        <h2 class="section-title">Entre em <span>Contato</span></h2>
        <div class="contact-options">
            <?php
            if ($result->num_rows > 0) {
                // Puxa os dados do imóvel específico
                $imovel = $result->fetch_assoc();

                echo "
                <a href='https://wa.me/5551981241770?text=Olá, gostaria de agendar uma visita para o imóvel: {$imovel['titulo']} ({$imovel['seo']}) no bairro {$imovel['bairro']} (ID: {$imovel['id']}), que é um(a) {$imovel['tipo']}.' 
                   target='_blank' class='contact-card'>
                    <i class='fas fa-calendar-alt'></i>
                    <p>Agendar Visita</p>
                </a>
                <a href='https://wa.me/5551981241770?text=Olá, gostaria de mais informações sobre o imóvel: {$imovel['titulo']} ({$imovel['seo']}) no bairro {$imovel['bairro']} (ID: {$imovel['id']}), que é um(a) {$imovel['tipo']}.' 
                   target='_blank' class='contact-card'>
                    <i class='fas fa-info-circle'></i>
                    <p>Mais Informações</p>
                </a>
                <a href='https://wa.me/5551981241770?text=Olá, gostaria de simular o financiamento para o imóvel: {$imovel['titulo']} ({$imovel['seo']}) no bairro {$imovel['bairro']} (ID: {$imovel['id']}), que é um(a) {$imovel['tipo']}.' 
                   target='_blank' class='contact-card'>
                    <i class='fas fa-calculator'></i>
                    <p>Simular Financiamento</p>
                </a>
                <a href='https://wa.me/5551981241770?text=Olá, gostaria de entrar em contato sobre o imóvel: {$imovel['titulo']} ({$imovel['seo']}) no bairro {$imovel['bairro']} (ID: {$imovel['id']}), que é um(a) {$imovel['tipo']}.' 
                   target='_blank' class='contact-card'>
                    <i class='fab fa-whatsapp'></i>
                    <p>Enviar WhatsApp</p>
                </a>
                ";
            } else {
                echo "<p>Imóvel não encontrado.</p>";
            }
            $conn->close();
            ?>
        </div>
    </section>
    <div class="dots-separator"></div>
</div>

<?php
} else {
    echo "<p>ID inválido ou não fornecido.</p>";
}
?>



<div class="gallery-container">
    <h3>Galeria de Imagens</h3>
    <div class="gallery">
        <?php
        // Exibir apenas os 4 primeiros quadrados
        foreach (array_slice($imagens, 0, 4) as $index => $imagem) {
            echo "<div class='gallery-item' onclick='openModal({$index})'>";
            echo "<img src='{$imagem}' alt='Imagem {$index}' />";
            echo "</div>";
        }
        ?>
    </div>
</div>
<div class="dots-separator">
    <span></span>
</div>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seção Minimalista com Vídeo</title>
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
</body>
</html>


<div class="linha-divisao"></div>
<h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 20px;">Imóveis Semelhantes no Bairro</h2>
<div class="catalog">
    <?php
    try {
        // Conexão com o banco de dados
        $host = 'localhost';
        $dbname = 'u268764721_IW';
        $username = 'u268764721_IW';
        $password = 'Murilo_132';

        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Captura o ID e o bairro do imóvel atual
        $id_imovel_atual = $_GET['id'];
        $stmt_atual = $pdo->prepare("SELECT bairro FROM imoveis WHERE id = :id");
        $stmt_atual->bindParam(':id', $id_imovel_atual);
        $stmt_atual->execute();
        $imovel_atual = $stmt_atual->fetch(PDO::FETCH_ASSOC);

        // Query para buscar imóveis do mesmo bairro
        $query_semelhantes = "
            SELECT * FROM imoveis 
            WHERE bairro = :bairro 
            AND id != :id
            LIMIT 4
        ";

        $stmt_semelhantes = $pdo->prepare($query_semelhantes);
        $stmt_semelhantes->bindValue(':bairro', $imovel_atual['bairro']);
        $stmt_semelhantes->bindValue(':id', $id_imovel_atual);
        $stmt_semelhantes->execute();
        $imoveis_semelhantes = $stmt_semelhantes->fetchAll(PDO::FETCH_ASSOC);

        // Exibir imóveis semelhantes
        foreach ($imoveis_semelhantes as $imovel) {
            $imagens = json_decode($imovel['imagens'], true);
            echo "
                <a href='detalhes.php?id={$imovel['id']}' class='card' style='text-decoration: none; color: inherit;'>
                    <div class='carrossel'>
            ";

            foreach ($imagens as $index => $imagem) {
                $active = $index === 0 ? 'active' : '';
                echo "<img class='$active' src='{$imagem}' alt='{$imovel['titulo']}'>";
            }

            echo "
                    </div>
                    <div class='card-body'>
                        <h3 class='card-title'>{$imovel['bairro']}</h3>
                        <div class='card-details' style='display: flex; justify-content: center; align-items: center; gap: 15px; flex-wrap: wrap;'>
                            <p class='card-text'><i class='fa fa-bed'></i> {$imovel['quartos']} Quartos</p>
                            <p class='card-text'><i class='fa fa-bath'></i> {$imovel['banheiros']} Banheiros</p>
                            <p class='card-text'><i class='fa fa-car'></i> {$imovel['garagem']} Vagas</p>
                            <p class='card-text'><i class='fa fa-ruler-combined'></i> {$imovel['metros_quadrados']} m²</p>
                        </div>
                        <p class='card-text'><strong>R$ {$imovel['preco']}</strong></p>
                    </div>
                </a>
            ";
        }
    } catch (PDOException $e) {
        echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    }
    ?>
</div>

<div style="text-align: center; margin-top: 20px;">
    <a href="procurar.php" class="back-button">
        <i class="fas fa-arrow-left"></i> Voltar para Pesquisar
    </a>
</div>
<style>

.catalog {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); /* Largura mínima mantida */
    gap: 20px; /* Espaçamento entre os itens */
    justify-content: center;
    padding: 0 100px; /* Espaço interno nas laterais */
}

.card {
    background: #fff;
    border-radius: 15px; /* Tamanho menor */
    box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s;
    position: relative;
    text-align: center;
}

.card:hover {
    transform: translateY(-5px);
}

.carrossel {
    position: relative;
    overflow: hidden;
    height: 180px; /* Altura mantida */
}

.carrossel img {
    width: 100%;
    height: 180px; /* Ajuste proporcional */
    object-fit: cover;
    display: none;
    border-radius: 15px;
}

.carrossel img.active {
    display: block;
}

.card-body {
    padding: 15px;
    text-align: center;
}

.card-title {
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 10px;
    color: black;
}

.card-text {
    font-size: 0.9rem;
    color: #666;
    margin-bottom: 8px;
}

.back-button {
    display: inline-block;
    background-color: #000;
    color: #fff;
    padding: 10px 20px;
    font-size: 1rem;
    font-weight: bold;
    border-radius: 8px;
    text-decoration: none;
    transition: background 0.3s;
    margin-top: 10px;
}

.back-button:hover {
    background-color: #333;
    color: #fff;
}

</style>
<?php
  include 'foooter.php';
?>

</body>
</html>
