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

// Busca todos os imóveis
$stmt = $pdo->prepare("SELECT id, titulo FROM imoveis ORDER BY id DESC");
$stmt->execute();
$imoveis = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Imóveis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            text-align: center;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #333;
            color: white;
        }
        tr:hover {
            background: #f0f0f0;
        }
        a {
            text-decoration: none;
            background: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }
        a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Lista de Imóveis</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($imoveis as $imovel) : ?>
            <tr>
                <td><?= $imovel['id'] ?></td>
                <td><?= htmlspecialchars($imovel['titulo']) ?></td>
                <td><a href="editar_imovel.php?id=<?= $imovel['id'] ?>">Editar</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
