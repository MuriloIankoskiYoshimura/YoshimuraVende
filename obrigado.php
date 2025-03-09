<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obrigado!</title>
    <style>
        /* Estilos gerais */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            background: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            animation: fadeIn 0.8s ease-in-out;
        }
        h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }
        p {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }
        .icon {
            font-size: 50px;
            color: #28a745;
            margin-bottom: 20px;
            animation: pop 0.6s ease-out;
        }
        .btn {
            display: inline-block;
            padding: 12px 25px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #0056b3;
        }
        .countdown {
            margin-top: 10px;
            font-size: 14px;
            color: #777;
        }

        /* Animações */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes pop {
            0% { transform: scale(0.8); opacity: 0; }
            80% { transform: scale(1.1); opacity: 1; }
            100% { transform: scale(1); }
        }
    </style>
    <script>
        let countdown = 5;
        function updateCountdown() {
            document.getElementById("countdown").innerText = countdown;
            if (countdown > 0) {
                countdown--;
                setTimeout(updateCountdown, 1000);
            } else {
                window.location.href = "index.php";
            }
        }
        window.onload = function() {
            setTimeout(() => { window.location.href = "index.php"; }, 5000);
            updateCountdown();
        };
    </script>
</head>
<body>
    <div class="container">
        <div class="icon">✅</div>
        <h2>Alterações Salvas!</h2>
        <p>As informações foram atualizadas com sucesso.</p>
        <p class="countdown">Redirecionando em <span id="countdown">5</span> segundos...</p>
        <a href="index.php" class="btn">Ir agora</a>
    </div>
</body>
</html>
