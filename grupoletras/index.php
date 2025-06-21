<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<title>Grupo de la Letra</title>
<style>
  body {
    background: linear-gradient(120deg, #f0f4f8, #d9e2ec);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }
  .card {
    background: white;
    padding: 28px 30px;
    border-radius: 14px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    text-align: center;
    width: 320px;
    animation: fadeIn 0.6s ease forwards;
  }
  h1 {
    color: #334e68;
    margin-bottom: 22px;
  }
  label {
    display: block;
    font-weight: 600;
    margin-bottom: 8px;
    color: #334e68;
  }
  input[type="text"] {
    width: 100%;
    padding: 12px;
    font-size: 1.1rem;
    border: 2px solid #627d98;
    border-radius: 8px;
    text-align: center;
    text-transform: lowercase;
    outline-offset: 2px;
    transition: border-color 0.3s;
  }
  input[type="text"]:focus {
    border-color: #1d4ed8;
    box-shadow: 0 0 5px rgba(29, 78, 216, 0.5);
  }
  button {
    margin-top: 16px;
    background-color: #1d4ed8;
    color: white;
    border: none;
    width: 100%;
    padding: 12px;
    border-radius: 8px;
    font-size: 1.1rem;
    cursor: pointer;
    transition: background-color 0.3s;
  }
  button:hover {
    background-color: #1e40af;
  }
  p.result {
    margin-top: 22px;
    font-weight: 700;
    font-size: 1.2rem;
    color: #1e293b;
    user-select: none;
  }
  p.error {
    margin-top: 22px;
    color: #b91c1c;
    font-weight: 700;
  }
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px);}
    to { opacity: 1; transform: translateY(0);}
  }
</style>
</head>
<body>
  <div class="card">
    <h1>¿A qué grupo pertenece?</h1>
    <form method="post" action="">
      <label for="letra">Ingrese una letra:</label>
      <input type="text" id="letra" name="letra" maxlength="1" required pattern="[a-zA-Z]">
      <button type="submit">Verificar</button>
    </form>

    <?php
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $letra = strtolower(trim($_POST['letra']));

          // Validar que es una sola letra de la a a la z
          if (!preg_match('/^[a-z]$/', $letra)) {
              echo '<p class="error">⚠️ Por favor ingrese una letra válida (a-z).</p>';
          } else {
              $grupo = '';

              if (in_array($letra, ['a', 'e', 'i', 'o', 'u'])) {
                  $grupo = 'A';
              } elseif (in_array($letra, ['b', 'c', 'd', 'f', 'g'])) {
                  $grupo = 'B';
              } elseif (in_array($letra, ['h', 'j', 'k', 'l', 'm'])) {
                  $grupo = 'C';
              } elseif (in_array($letra, ['n', 'p', 'q', 'r'])) {
                  $grupo = 'D';
              } elseif (in_array($letra, ['s', 't', 'v', 'w', 'x', 'y', 'z'])) {
                  $grupo = 'E';
              } else {
                  $grupo = 'desconocido';
              }

              if ($grupo === 'desconocido') {
                echo '<p class="error">⚠️ Letra no reconocida.</p>';
              } else {
                echo "<p class='result'>La letra <strong>'$letra'</strong> pertenece al <strong>Grupo $grupo</strong>.</p>";
              }
          }
      }
    ?>
  </div>
</body>
</html>
