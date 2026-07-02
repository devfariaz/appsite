<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Redireciona para o admin após 5 segundos -->
    <meta http-equiv="refresh" content="5;url=/admin">
    <title>Acesso Restrito</title>
    <style>
        body { 
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, sans-serif; 
            background-color: #f9fafb; 
            display: flex; align-items: center; justify-content: center; 
            height: 100vh; margin: 0; color: #111827; 
        }
        .container { 
            background: #ffffff; padding: 2rem; border-radius: 0.75rem; 
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); 
            text-align: center; max-width: 24rem; width: 100%; border: 1px solid #e5e7eb; 
        }
        .icon { font-size: 3rem; margin-bottom: 1rem; }
        h1 { font-size: 1.25rem; font-weight: 600; margin: 0 0 0.5rem 0; }
        p { color: #4b5563; font-size: 0.9rem; margin: 0 0 1.5rem 0; line-height: 1.5; }
        .countdown { font-weight: bold; color: #3b82f6; font-size: 1.1rem; }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">🛑</div>
        <h1>Acesso Restrito</h1>
        <p>Você não tem permissão para acessar esta área.</p>
        <p>Redirecionando para o início em <span id="timer" class="countdown">5</span> segundos...</p>
    </div>
    
    <script>
        let tempo = 5;
        setInterval(() => {
            tempo--;
            if (tempo > 0) {
                document.getElementById("timer").innerText = tempo;
            }
        }, 1000);
    </script>
</body>
</html>