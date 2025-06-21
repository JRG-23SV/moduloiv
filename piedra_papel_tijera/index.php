<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Opciones posibles con emoji para mostrar en botones y resultado
$opciones = [
    'Piedra' => '✊',
    'Papel' => '✋',
    'Tijera' => '✌️'
];

// Inicializar variables de sesión
if (!isset($_SESSION['rondas_totales'])) {
    $_SESSION['rondas_totales'] = 0;
    $_SESSION['ronda_actual'] = 0;
    $_SESSION['puntaje_jugadora'] = 0;
    $_SESSION['puntaje_compu'] = 0;
    $_SESSION['fin_partida'] = false;
    $_SESSION['mensaje'] = '';
}

// Función para decidir ganador de ronda
function decidirGanador($jugadora, $compu) {
    if ($jugadora === $compu) return 'Empate';
    if (
        ($jugadora === 'Piedra' && $compu === 'Tijera') ||
        ($jugadora === 'Papel' && $compu === 'Piedra') ||
        ($jugadora === 'Tijera' && $compu === 'Papel')
    ) return 'Jugadora';
    return 'Computadora';
}

// Manejo iniciar partida
if (isset($_POST['iniciar'])) {
    $rondas = (int)$_POST['rondas'];
    if ($rondas > 0) {
        $_SESSION['rondas_totales'] = $rondas;
        $_SESSION['ronda_actual'] = 1;
        $_SESSION['puntaje_jugadora'] = 0;
        $_SESSION['puntaje_compu'] = 0;
        $_SESSION['fin_partida'] = false;
        $_SESSION['mensaje'] = '';
    }
}

// Manejo jugada
if (isset($_POST['jugada']) && !$_SESSION['fin_partida']) {
    $jugadora = $_POST['jugada'];
    $compu = array_rand($opciones);

    $ganador = decidirGanador($jugadora, $compu);

    if ($ganador === 'Jugadora') {
        $_SESSION['puntaje_jugadora']++;
        $resultado_ronda = "🎉 ¡Ganaste esta ronda!";
    } elseif ($ganador === 'Computadora') {
        $_SESSION['puntaje_compu']++;
        $resultado_ronda = "😞 La computadora ganó esta ronda.";
    } else {
        $resultado_ronda = "🤝 Esta ronda fue un empate.";
    }

    $_SESSION['mensaje'] = "
        Ronda {$_SESSION['ronda_actual']} de {$_SESSION['rondas_totales']}<br>
        Jugadora: {$opciones[$jugadora]} $jugadora<br>
        Computadora: {$opciones[$compu]} $compu<br>
        $resultado_ronda<br>
        Puntaje: {$_SESSION['puntaje_jugadora']} (Jugadora) - {$_SESSION['puntaje_compu']} (Computadora)<br>
        Rondas restantes: ".($_SESSION['rondas_totales'] - $_SESSION['ronda_actual'])."
    ";

    if ($_SESSION['ronda_actual'] >= $_SESSION['rondas_totales']) {
        $_SESSION['fin_partida'] = true;
        // Resultado final
        if ($_SESSION['puntaje_jugadora'] > $_SESSION['puntaje_compu']) {
            $_SESSION['mensaje'] .= "<br><strong>🎊 ¡Felicidades! Ganaste la partida.</strong>";
        } elseif ($_SESSION['puntaje_jugadora'] < $_SESSION['puntaje_compu']) {
            $_SESSION['mensaje'] .= "<br><strong>💻 La computadora ganó la partida.</strong>";
        } else {
            $_SESSION['mensaje'] .= "<br><strong>🤝 La partida terminó en empate.</strong>";
        }
    } else {
        $_SESSION['ronda_actual']++;
    }
}

// Reiniciar
if (isset($_POST['reiniciar'])) {
    session_destroy();
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Piedra, Papel o Tijera - Rondas</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Fira+Mono&display=swap');
  body {
    background: #222831; /* Fondo oscuro pero no negro absoluto */
    color: #eeeeee;
    font-family: 'Fira Mono', monospace, monospace;
    margin: 0; padding: 0;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  h1 {
    font-weight: 700;
    margin-bottom: 8px;
    color: #00adb5;
    text-shadow: 0 0 8px #00fff7;
  }
  .container {
    background: #393e46;
    padding: 30px 36px;
    border-radius: 16px;
    box-shadow: 0 0 30px #00adb5cc;
    width: 360px;
    text-align: center;
  }
  label {
    font-size: 1.1rem;
    margin-bottom: 12px;
    display: block;
  }
  input[type=number] {
    width: 100%;
    padding: 14px;
    font-size: 1.1rem;
    border-radius: 8px;
    border: none;
    outline: none;
    margin-bottom: 20px;
    background: #222831;
    color: #eeeeee;
    text-align: center;
  }
  button, .opcion-btn {
    cursor: pointer;
    border-radius: 12px;
    border: none;
    font-size: 1.3rem;
    font-weight: 700;
    color: #222831;
    background: #00adb5;
    padding: 14px 0;
    margin: 10px 6px 0 6px;
    width: 100px;
    box-shadow: 0 3px 10px #00adb5cc;
    transition: background 0.3s ease;
    user-select: none;
  }
  button:hover, .opcion-btn:hover {
    background: #00cec9;
  }
  .opcion-btn {
    color: #222831;
  }
  .opciones {
    display: flex;
    justify-content: center;
    margin-top: 10px;
  }
  .mensaje {
    margin-top: 24px;
    font-size: 1.1rem;
    line-height: 1.5;
    min-height: 140px;
    background: #222831;
    border-radius: 12px;
    padding: 16px;
    box-shadow: inset 0 0 12px #00adb5cc;
  }
  form.reiniciar {
    margin-top: 22px;
  }
</style>
</head>
<body>
  <div class="container">
    <h1>Piedra, Papel o Tijera</h1>

<?php if ($_SESSION['rondas_totales'] == 0): ?>
    <!-- Formulario para iniciar la partida -->
    <form method="post" action="">
      <label for="rondas">Cantidad de rondas:</label>
      <input type="number" id="rondas" name="rondas" min="1" max="20" value="5" required />
      <button type="submit" name="iniciar">Iniciar Juego</button>
    </form>

<?php elseif ($_SESSION['fin_partida']): ?>
    <!-- Fin de la partida, mostrar resultado y botón reiniciar -->
    <div class="mensaje"><?= $_SESSION['mensaje'] ?></div>
    <form method="post" class="reiniciar">
      <button type="submit" name="reiniciar">Jugar de nuevo</button>
    </form>

<?php else: ?>
    <!-- Juego en curso: mostrar mensaje y botones de opciones -->
    <div class="mensaje"><?= $_SESSION['mensaje'] ?: "Ronda {$_SESSION['ronda_actual']} de {$_SESSION['rondas_totales']}. Elige tu jugada:" ?></div>

    <form method="post" action="">
      <div class="opciones">
        <?php foreach ($opciones as $nombre => $emoji): ?>
          <button type="submit" name="jugada" value="<?= $nombre ?>" class="opcion-btn" title="<?= $nombre ?>">
            <?= $emoji ?><br><?= $nombre ?>
          </button>
        <?php endforeach; ?>
      </div>
    </form>
<?php endif; ?>

  </div>
</body>
</html>
