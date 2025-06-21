<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificar número par o impar</title>
    <style>
        /* Estilos generales para el cuerpo */
        body {
            background-color: #e0f7fa; /* Color de fondo azul claro */
            display: flex;             /* Usamos flexbox para centrar */
            justify-content: center;   /* Centra horizontalmente */
            align-items: center;       /* Centra verticalmente */
            height: 100vh;             /* 100% de la altura de la pantalla */
            font-family: Arial, sans-serif;
        }

        /* Estilo para el contenedor del formulario */
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px; /* Bordes redondeados */
            box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Sombra suave */
            text-align: center; /* Centra el texto */
            width: 300px; /* Ancho fijo para el formulario */
        }

        h1 {
            color: #00796b; /* Color del título */
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #00796b;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #004d40; /* Oscurece el botón al pasar el ratón */
        }

        p {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Verifica si es par o impar</h1>

        <!-- Formulario para que el usuario ingrese un número -->
        <form method="post" action="">
            <label for="numero">Ingrese un número:</label>
            <input type="number" name="numero" id="numero" required>
            <button type="submit">Verificar</button>
        </form>

        <?php
        // Comprobamos si el formulario ha sido enviado
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $numero = $_POST['numero'];

            // Validamos que sea numérico
            if (is_numeric($numero)) {
                // Usamos el operador % para obtener el residuo
                if ($numero % 2 == 0) {
                    echo "<p>✅ El número $numero es PAR.</p>";
                } else {
                    echo "<p>❌ El número $numero es IMPAR.</p>";
                }
            } else {
                echo "<p>⚠️ Por favor ingrese un número válido.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
