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
        $titulo = $_POST['title']       ?? '';
        $seo = $_POST['seo']            ?? '';
        $cidade = $_POST['cidade']      ?? '';
        $bairro = $_POST['bairro']      ?? '';
        $rua = $_POST['rua']            ?? '';
        $tipo = $_POST['type']          ?? '';
        $quartos = $_POST['bedrooms']   ?? '';
        $banheiros = $_POST['bathrooms']?? '';
        $metrosQuadrados = $_POST['m2'] ?? '';
        $garagem = $_POST['garage']     ?? '';
        $preco = $_POST['price']        ?? '';
        $descricao = $_POST['description'] ?? '';
        $contato = $_POST['contact']    ?? '';
        $dataCadastro = date('Y-m-d H:i:s');

        // 1) Validação simples
        if (
            empty($titulo) || empty($seo) || empty($cidade) ||
            empty($bairro) || empty($rua) || empty($tipo) ||
            empty($quartos) || empty($banheiros) || empty($metrosQuadrados) ||
            empty($preco) || empty($contato)
        ) {
            $msg = urlencode("Preencha todos os campos obrigatórios!");
            header("Location: erro.php?msg=$msg");
            exit;
        }

        // Diretório para upload de imagens
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Cria a pasta se ela não existir
        }

        // 2) Processar imagem de capa (opcional)
        $capaPath = null; 
        if (isset($_FILES['coverImage']) && is_uploaded_file($_FILES['coverImage']['tmp_name'])) {
            $coverFileName = uniqid() . '-' . basename($_FILES['coverImage']['name']);
            $capaPath = $uploadDir . $coverFileName;

            if (!move_uploaded_file($_FILES['coverImage']['tmp_name'], $capaPath)) {
                $msg = urlencode("Erro ao fazer upload da imagem de capa.");
                header("Location: erro.php?msg=$msg");
                exit;
            }
        }

        // 3) Processar outras imagens enviadas
        $imagePaths = []; // Array para armazenar caminhos das imagens
        if (isset($_FILES['images']) && !empty($_FILES['images']['tmp_name'][0])) {
            foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
                if (is_uploaded_file($tmpName)) {
                    $fileName = uniqid() . '-' . basename($_FILES['images']['name'][$key]);
                    $filePath = $uploadDir . $fileName;

                    if (!move_uploaded_file($tmpName, $filePath)) {
                        $msg = urlencode("Erro ao fazer upload da imagem: " . $_FILES['images']['name'][$key]);
                        header("Location: erro.php?msg=$msg");
                        exit;
                    }
                    // Se deu certo, adiciona ao array
                    $imagePaths[] = $filePath;
                }
            }
        } else {
            $msg = urlencode("Nenhuma imagem para o imóvel foi selecionada!");
            header("Location: erro.php?msg=$msg");
            exit;
        }

        // Serializa os caminhos das imagens em JSON para salvar no banco de dados
        $imagePathsJson = json_encode($imagePaths);

        // 4) Inserção dos dados no banco de dados
        $sql = "INSERT INTO imoveis (
                    titulo, seo, cidade, bairro, rua, tipo, quartos, banheiros, metros_quadrados,
                    garagem, preco, descricao, capa, imagens, contato, data_cadastro
                ) VALUES (
                    :titulo, :seo, :cidade, :bairro, :rua, :tipo, :quartos, :banheiros, :metros_quadrados,
                    :garagem, :preco, :descricao, :capa, :imagens, :contato, :data_cadastro
                )";

        $stmt = $pdo->prepare($sql);

        // Tenta executar
        $result = $stmt->execute([
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
            ':capa' => $capaPath,
            ':imagens' => $imagePathsJson,
            ':contato' => $contato,
            ':data_cadastro' => $dataCadastro
        ]);

        if ($result) {
            // Sucesso: redirecionar para obrigado.php
            header("Location: obrigado.php");
            exit;
        } else {
            // Falha no INSERT
            $msg = urlencode("Erro ao inserir no banco!");
            header("Location: erro.php?msg=$msg");
            exit;
        }
    }
} catch (PDOException $e) {
    $msg = urlencode("Erro ao conectar ao banco de dados: " . $e->getMessage());
    header("Location: erro.php?msg=$msg");
    exit;
}
?>
