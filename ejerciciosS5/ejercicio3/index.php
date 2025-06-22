<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Suma de Números</title>
<style>
    body {
        background: radial-gradient(circle, #a8edea, #fed6e3);
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }
    .container {
        background: white;
        padding: 28px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        width: 340px;
        text-align: center;
        animation: fadeIn 0.5s ease;
    }
    h1 {
        color: #ff4081;
        font-size: 1.4rem;
        margin-bottom: 16px;
    }
    input {
        width: 100%;
        padding: 10px;
        border: 2px solid #ff4081;
        border-radius: 8px;
        font-size: 1rem;
        text-align: center;
        margin: 14px 0;
        outline: none;
        transition: border 0.3s;
    }
    input:focus {
        border-color: #e91e63;
    }
    button {
        background: #ff4081;
        color: white;
        padding: 12px;
        border: none;
        border-radius: 8px;
        width: 100%;
        cursor: pointer;
        font-size: 1rem;
        transition: background 0.3s;
    }
    button:hover {
        background: #e91e63;
    }
    p {
        margin-top: 18px;
        padding: 10px;
        border-radius: 8px;
        background: #ffeef4;
        color: #c2185b;
        font-size: 1.1rem;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.9); }
        to { opacity: 1; transform: scale(1); }
    }
</style>
</head>
<body>
    <div class="container">
        <h1>Calcula la suma</h1>
        <input id="numbersInput" type="text" placeholder="Ej: 10 5 7.5 3">
        <button onclick="calcularSuma()">Sumar números</button>
        <div id="result"></div>
    </div>

    <script>
        function calcularSuma() {
            const input = document.getElementById('numbersInput').value.trim();
            const result = document.getElementById('result');
            result.innerHTML = '';
            
            if (input) {
                const numeros = input.split(' ').map(Number).filter(n => !isNaN(n));
                if (numeros.length > 0) {
                    const suma = numeros.reduce((total, num) => total + num, 0);
                    result.innerHTML = `<p>✅ La suma es: ${suma}</p>`;
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
