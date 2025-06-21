<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Días del mes</title>
    <style>
        body {
            background: linear-gradient(135deg, #cce7ff, #ffffff);
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
            width: 320px;
        }
        h1 {
            color: #005b99;
            font-size: 1.5rem;
        }
        select, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #005b99;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #004577;
        }
        p {
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Días del mes</h1>
        <form method="post" action="">
            <label for="mes">Seleccione un mes:</label>
            <select id="mes" name="mes" required>
                <option value="" disabled selected>-- Elige un mes --</option>
                <option value="1">Enero</option>
                <option value="2">Febrero</option>
                <option value="3">Marzo</option>
                <option value="4">Abril</option>
                <option value="5">Mayo</option>
                <option value="6">Junio</option>
                <option value="7">Julio</option>
                <option value="8">Agosto</option>
                <option value="9">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
            <button type="submit">Consultar</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mes = (int) $_POST['mes'];
            $dias = 0;
            $nombreMes = '';

            switch ($mes) {
                case 1:  $nombreMes = "Enero";      $dias = 31; break;
                case 2:  $nombreMes = "Febrero";    $dias = 28; break;
                case 3:  $nombreMes = "Marzo";      $dias = 31; break;
                case 4:  $nombreMes = "Abril";      $dias = 30; break;
                case 5:  $nombreMes = "Mayo";       $dias = 31; break;
                case 6:  $nombreMes = "Junio";      $dias = 30; break;
                case 7:  $nombreMes = "Julio";      $dias = 31; break;
                case 8:  $nombreMes = "Agosto";     $dias = 31; break;
                case 9:  $nombreMes = "Septiembre"; $dias = 30; break;
                case 10: $nombreMes = "Octubre";    $dias = 31; break;
                case 11: $nombreMes = "Noviembre";  $dias = 30; break;
                case 12: $nombreMes = "Diciembre";  $dias = 31; break;
                default:
                    echo "<p>⚠️ Por favor seleccione un mes válido.</p>";
                    return;
            }

            echo "<p>✅ El mes $nombreMes tiene $dias días.</p>";
        }
        ?>
    </div>
</body>
</html>
