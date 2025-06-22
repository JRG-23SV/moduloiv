<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Saludos Personalizados</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #c2e59c, #64b3f4);
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }
    .container {
        background: white;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.15);
        text-align: center;
        width: 320px;
        animation: fadeIn 0.6s ease;
    }
    h1 {
        color: #004d40;
        font-size: 1.4rem;
    }
    input {
        width: 100%;
        padding: 10px;
        font-size: 1rem;
        border: 2px solid #00796b;
        border-radius: 8px;
        margin: 12px 0;
        text-align: center;
    }
    button {
        background-color: #00796b;
        color: white;
        padding: 12px;
        border: none;
        border-radius: 8px;
        width: 100%;
        cursor: pointer;
        font-size: 1rem;
    }
    button:hover {
        background-color: #004d40;
    }
    .result {
        margin-top: 20px;
        text-align: left;
    }
    .result p {
        background: #e0f2f1;
        padding: 8px;
        border-radius: 6px;
        color: #004d40;
        margin: 6px 0;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.9); }
        to { opacity: 1; transform: scale(1); }
    }
</style>
</head>
<body>
    <div class="container">
        <h1>Saludos Personalizados</h1>
        <input type="text" id="namesInput" placeholder="Ingrese nombres separados por espacios" />
        <button onclick="saludar()">Saludar</button>
        <div class="result" id="result"></div>
    </div>

    <script>
        function saludar() {
            const input = document.getElementById('namesInput').value.trim();
            const result = document.getElementById('result');
            result.innerHTML = '';
            
            if (input) {
                const nombres = input.split(' ').filter(n => n); // elimina espacios extra
                nombres.forEach(nombre => {
                    const p = document.createElement('p');
                    p.textContent = `¡Hola ${nombre}!`;
                    result.appendChild(p);
                });
            } else {
                result.innerHTML = '<p style="color:#c62828;">⚠️ Por favor ingrese al menos un nombre.</p>';
            }
        }
    </script>
</body>
</html>
