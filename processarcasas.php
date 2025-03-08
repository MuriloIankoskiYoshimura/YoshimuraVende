<?php
// Configurações do banco de dados
$host = 'localhost';
$dbname = 'u268764721_IW';
$username = 'u268764721_IW';
$password = 'Murilo_132';

try {
    // Conexão com o banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recebendo os dados do formulário
        $titulo = $_POST['title'];
        $seo = $_POST['seo'];
        $cidade = $_POST['cidade'];
        $bairro = $_POST['bairro'];
        $rua = $_POST['rua'];
        $tipo = $_POST['type'];
        $quartos = $_POST['bedrooms'];
        $banheiros = $_POST['bathrooms'];
        $metrosQuadrados = $_POST['m2'];
        $garagem = $_POST['garage'];
        $preco = $_POST['price']; 
        $descricao = $_POST['description'];
        $contato = $_POST['contact'];
        $dataCadastro = date('Y-m-d H:i:s');

        // Diretório para upload de imagens
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Cria a pasta se ela não existir
        }

        // Processar imagem de capa (opcional)
        $capaPath = null; // Inicializa como nulo
        if (isset($_FILES['coverImage']) && is_uploaded_file($_FILES['coverImage']['tmp_name'])) {
            $coverFileName = uniqid() . '-' . basename($_FILES['coverImage']['name']);
            $capaPath = $uploadDir . $coverFileName;

            if (!move_uploaded_file($_FILES['coverImage']['tmp_name'], $capaPath)) {
                echo "Erro ao fazer upload da imagem de capa.";
                exit;
            }
        }

        // Processar outras imagens enviadas
        $imagePaths = []; // Array para armazenar caminhos das imagens
        if (isset($_FILES['images']) && !empty($_FILES['images']['tmp_name'][0])) {
            foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
                if (is_uploaded_file($tmpName)) {
                    $fileName = uniqid() . '-' . basename($_FILES['images']['name'][$key]);
                    $filePath = $uploadDir . $fileName;

                    if (move_uploaded_file($tmpName, $filePath)) {
                        $imagePaths[] = $filePath; // Armazena o caminho da imagem
                    } else {
                        echo "Erro ao fazer upload da imagem: " . $_FILES['images']['name'][$key];
                        exit;
                    }
                }
            }
        }

        // Serializa os caminhos das imagens para salvar no banco de dados
        $imagePathsJson = json_encode($imagePaths);

        // Inserção dos dados no banco de dados
        $sql = "INSERT INTO imoveis (
                    titulo, seo, cidade, bairro, rua, tipo, quartos, banheiros, metros_quadrados,
                    garagem, preco, descricao, capa, imagens, contato, data_cadastro
                ) VALUES (
                    :titulo, :seo, :cidade, :bairro, :rua, :tipo, :quartos, :banheiros, :metros_quadrados,
                    :garagem, :preco, :descricao, :capa, :imagens, :contato, :data_cadastro
                )";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':titulo' => $titulo,
            ':seo' => $seo,
            ':cidade' => $cidade,
            ':bairro' => $bairro,
            ':rua' => $rua,
            ':tipo' => $tipo,
            ':quartos' => $quartos,
            ':banheiros' => $banheiros,
            ':metros_quadrados' => $metrosQuadrados,
            ':garagem' => $garagem,
            ':preco' => $preco,
            ':descricao' => $descricao,
            ':capa' => $capaPath, // Caminho da imagem de capa (pode ser nulo)
            ':imagens' => $imagePathsJson, // Outras imagens como JSON
            ':contato' => $contato,
            ':data_cadastro' => $dataCadastro
        ]);

        echo "Imóvel cadastrado com sucesso!";
    }
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}
?>
