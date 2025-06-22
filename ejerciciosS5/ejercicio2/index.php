<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Encontrar el menor número</title>
<style>
    body {
        background: linear-gradient(135deg, #ffb347, #ffcc33);
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }
    .container {
        background: white;
        padding: 24px 28px;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.2);
        text-align: center;
        width: 340px;
        animation: fadeIn 0.6s ease;
    }
    h1 {
        color: #ff9800;
        font-size: 1.4rem;
    }
    input {
        width: 100%;
        padding: 10px;
        margin: 16px 0;
        border: 2px solid #ff9800;
        border-radius: 8px;
        text-align: center;
        font-size: 1rem;
        outline: none;
        transition: border 0.3s;
    }
    input:focus {
        border-color: #e65100;
    }
    button {
        background: #ff9800;
        color: white;
        border: none;
        padding: 12px;
        border-radius: 8px;
        cursor: pointer;
        width: 100%;
        font-size: 1rem;
        transition: background 0.3s;
    }
    button:hover {
        background: #e65100;
    }
    p {
        margin-top: 20px;
        padding: 10px;
        border-radius: 8px;
        font-size: 1.1rem;
        background: #fff3e0;
        color: #e65100;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.9); }
        to { opacity: 1; transform: scale(1); }
    }
</style>
</head>
<body>
    <div class="container">
        <h1>Busca el número menor</h1>
        <input id="numbersInput" type="text" placeholder="Ej: 8 5 12 3" />
        <button onclick="encontrarMenor()">Encontrar menor</button>
        <div id="result"></div>
    </div>

    <script>
        function encontrarMenor() {
            const input = document.getElementById('numbersInput').value.trim();
            const result = document.getElementById('result');
            result.innerHTML = '';
            
            if (input) {
                const numeros = input.split(' ').map(Number).filter(n => !isNaN(n));
                if (numeros.length > 0) {
                    const menor = Math.min(...numeros);
                    result.innerHTML = `<p>✅ El menor número es ${menor}</p>`;
                } else {
                    result.innerHTML = '<p>⚠️ Por favor ingresa solo números válidos.</p>';
                }
            } else {
                result.innerHTML = '<p>⚠️ Por favor ingresa algún número.</p>';
            }
        }
    </script>
</body>
</html>
