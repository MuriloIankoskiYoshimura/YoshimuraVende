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

// Busca os dados do imóvel no banco de dados
$stmt = $pdo->prepare("SELECT * FROM imoveis WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$imovel = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$imovel) {
    die("Imóvel não encontrado.");
}

// 🔹 PREÇO COMO TEXTO DIRETAMENTE DO BANCO
$preco = $imovel['preco']; // Sem formatação, como foi salvo no banco

// Atualiza os dados no banco de dados quando o formulário é enviado
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
    $preco = $_POST['preco']; // Mantendo o formato como texto
    $descricao = $_POST['descricao'];
    $contato = $_POST['contato'];

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

    // 🔹 REDIRECIONA PARA A PÁGINA DE OBRIGADO APÓS SALVAR
    header("Location: obrigado.php");
    exit;
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Editar Imóvel</h2>
        <form method="POST">
            <input type="text" name="titulo" value="<?= $imovel['titulo'] ?>" required>
            <input type="text" name="seo" value="<?= $imovel['seo'] ?>">
            <input type="text" name="cidade" value="<?= $imovel['cidade'] ?>" required>
            <input type="text" name="bairro" value="<?= $imovel['bairro'] ?>">
            <input type="text" name="rua" value="<?= $imovel['rua'] ?>">
            <input type="text" name="tipo" value="<?= $imovel['tipo'] ?>">
            <input type="number" name="quartos" value="<?= $imovel['quartos'] ?>">
            <input type="number" name="banheiros" value="<?= $imovel['banheiros'] ?>">
            <input type="number" name="metros_quadrados" value="<?= $imovel['metros_quadrados'] ?>">
            <input type="number" name="garagem" value="<?= $imovel['garagem'] ?>">

            <!-- 🔹 PREÇO EM FORMATO TEXTO (EDITÁVEL) -->
            <input type="text" name="preco" value="<?= $preco ?>" required>

            <textarea name="descricao"><?= $imovel['descricao'] ?></textarea>
            <input type="text" name="contato" value="<?= $imovel['contato'] ?>" required>

            <button type="submit">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>
