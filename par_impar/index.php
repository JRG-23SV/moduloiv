<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificar número par o impar</title>
    <style>
       
        body {
            background-color: #e0f7fa; 
            display: flex;             
            justify-content: center;   
            align-items: center;       
            height: 100vh;             
            font-family: Arial, sans-serif;
        }

       
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px; 
            box-shadow: 0 0 10px rgba(0,0,0,0.1); 
            text-align: center; 
            width: 300px;
        }

        h1 {
            color: #00796b;
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
            background-color: #004d40; 
        }

        p {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Verifica si es par o impar</h1>


        <form method="post" action="">
            <label for="numero">Ingrese un número:</label>
            <input type="number" name="numero" id="numero" required>
            <button type="submit">Verificar</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $numero = $_POST['numero'];

            if (is_numeric($numero)) {
               
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
