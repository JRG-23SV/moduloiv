<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Estado del Examen</title>
<style>
    body {
        background: radial-gradient(circle, #84fab0, #8fd3f4);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .card {
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        text-align: center;
        width: 320px;
        animation: fadeIn 0.5s ease;
    }
    h1 {
        color: #00796b;
        font-size: 1.5rem;
        margin-bottom: 20px;
    }
    label {
        color: #333;
        font-weight: bold;
    }
    input {
        width: 100%;
        padding: 10px;
        margin: 12px 0;
        border: 2px solid #00796b;
        border-radius: 8px;
        text-align: center;
        font-size: 1rem;
    }
    button {
        background: #00796b;
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
        background: #004d40;
    }
    p {
        margin-top: 20px;
        padding: 10px;
        border-radius: 8px;
        font-size: 1.1rem;
    }
    .aprobado {
        background: #c8e6c9;
        color: #256029;
    }
    .recuperar {
        background: #fff9c4;
        color: #827717;
    }
    .aplazado {
        background: #ffcdd2;
        color: #b71c1c;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.9); }
        to { opacity: 1; transform: scale(1); }
    }
</style>
</head>
<body>
    <div class="card">
        <h1>Estado del Examen</h1>
        <form method="post" action="">
            <label for="nota">Ingrese la nota (0 a 10):</label>
            <input type="number" id="nota" name="nota" min="0" max="10" step="0.1" required>
            <button type="submit">Verificar</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nota = floatval($_POST['nota']);
            $mensaje = '';
            $clase = '';

            if ($nota > 7) {
                $mensaje = "✅ ¡Examen aprobado!";
                $clase = "aprobado";
            } elseif ($nota > 4) {
                $mensaje = "⚠️ Toca recuperar.";
                $clase = "recuperar";
            } else {
                $mensaje = "❌ Aplazado.";
                $clase = "aplazado";
            }

            echo "<p class='$clase'>$mensaje</p>";
        }
        ?>
    </div>
</body>
</html>
