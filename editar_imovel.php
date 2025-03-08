<?php
session_start();
$host = 'localhost';
$dbname = 'u268764721_IW';
$username = 'u268764721_IW';
$password = 'Murilo_132';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}

// Verifica se um imóvel foi selecionado
if (!isset($_GET['id'])) {
    die("ID do imóvel não informado.");
}

$id = $_GET['id'];

// Busca os dados do imóvel
$stmt = $pdo->prepare("SELECT * FROM imoveis WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$imovel = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$imovel) {
    die("Imóvel não encontrado.");
}

// Processa o formulário de edição
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $seo = $_POST['seo'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $tipo = $_POST['tipo'];
    $quartos = $_POST['quartos'];
    $banheiros = $_POST['banheiros'];
    $metros_quadrados = $_POST['metros_quadrados'];
    $garagem = $_POST['garagem'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $contato = $_POST['contato'];

    // Atualiza os dados no banco
    $update = $pdo->prepare("UPDATE imoveis SET 
        titulo = :titulo, seo = :seo, cidade = :cidade, bairro = :bairro, rua = :rua, 
        tipo = :tipo, quartos = :quartos, banheiros = :banheiros, metros_quadrados = :metros_quadrados, 
        garagem = :garagem, preco = :preco, descricao = :descricao, contato = :contato WHERE id = :id");

    $update->execute([
        ':titulo' => $titulo,
        ':seo' => $seo,
        ':cidade' => $cidade,
        ':bairro' => $bairro,
        ':rua' => $rua,
        ':tipo' => $tipo,
        ':quartos' => $quartos,
        ':banheiros' => $banheiros,
        ':metros_quadrados' => $metros_quadrados,
        ':garagem' => $garagem,
        ':preco' => $preco,
        ':descricao' => $descricao,
        ':contato' => $contato,
        ':id' => $id
    ]);

    echo "<script>alert('Dados atualizados com sucesso!'); window.location.href='editar_imovel.php?id=$id';</script>";
}

// Processa o upload da imagem de capa
if (isset($_FILES['capa']) && $_FILES['capa']['size'] > 0) {
    $extensao = pathinfo($_FILES['capa']['name'], PATHINFO_EXTENSION);
    $novoNome = "capa_$id." . $extensao;
    $caminho = "uploads/" . $novoNome;

    if (move_uploaded_file($_FILES['capa']['tmp_name'], $caminho)) {
        $pdo->prepare("UPDATE imoveis SET capa = :capa WHERE id = :id")
            ->execute([':capa' => $caminho, ':id' => $id]);

        echo "<script>alert('Capa atualizada!'); window.location.href='editar_imovel.php?id=$id';</script>";
    }
}

// Remover imagens individuais
if (isset($_GET['remover_imagem'])) {
    $imagem = $_GET['remover_imagem'];

    // Deleta a imagem do diretório
    if (file_exists($imagem)) {
        unlink($imagem);
    }

    // Remove do banco de dados
    $stmt = $pdo->prepare("UPDATE imoveis SET imagens = REPLACE(imagens, :imagem, '') WHERE id = :id");
    $stmt->execute([':imagem' => $imagem, ':id' => $id]);

    echo "<script>alert('Imagem removida!'); window.location.href='editar_imovel.php?id=$id';</script>";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Imóvel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            text-align: center;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin: auto;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Editar Imóvel</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="titulo" value="<?= $imovel['titulo'] ?>" placeholder="Título" required>
            <input type="text" name="seo" value="<?= $imovel['seo'] ?>" placeholder="SEO">
            <input type="text" name="cidade" value="<?= $imovel['cidade'] ?>" placeholder="Cidade">
            <input type="text" name="bairro" value="<?= $imovel['bairro'] ?>" placeholder="Bairro">
            <input type="text" name="rua" value="<?= $imovel['rua'] ?>" placeholder="Rua">
            <input type="text" name="tipo" value="<?= $imovel['tipo'] ?>" placeholder="Tipo">
            <input type="number" name="quartos" value="<?= $imovel['quartos'] ?>" placeholder="Quartos">
            <input type="number" name="banheiros" value="<?= $imovel['banheiros'] ?>" placeholder="Banheiros">
            <input type="number" name="metros_quadrados" value="<?= $imovel['metros_quadrados'] ?>" placeholder="M²">
            <input type="number" name="garagem" value="<?= $imovel['garagem'] ?>" placeholder="Garagem">
            <input type="number" name="preco" value="<?= $imovel['preco'] ?>" placeholder="Preço">
            <textarea name="descricao" placeholder="Descrição"><?= $imovel['descricao'] ?></textarea>
            <input type="file" name="capa">
            <button type="submit">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>
