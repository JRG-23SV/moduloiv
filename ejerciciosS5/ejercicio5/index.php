<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Encontrar índice del valor</title>
<style>
  body {
    background: linear-gradient(135deg, #84fab0, #8fd3f4);
    font-family: Arial, sans-serif;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
  }
  .container {
    background: white;
    padding: 28px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    width: 340px;
    text-align: center;
    animation: fadeIn 0.6s ease;
  }
  h1 {
    color: #2563eb;
    font-size: 1.3rem;
    margin-bottom: 20px;
  }
  input {
    width: 100%;
    padding: 10px;
    border: 2px solid #60a5fa;
    border-radius: 8px;
    margin: 10px 0;
    font-size: 1rem;
    text-align: center;
    transition: border 0.3s;
  }
  input:focus {
    border-color: #2563eb;
    outline: none;
  }
  button {
    background: #2563eb;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    width: 100%;
    font-size: 1rem;
    transition: background 0.3s;
  }
  button:hover {
    background: #1d4ed8;
  }
  p {
    margin-top: 20px;
    padding: 10px;
    border-radius: 8px;
    font-size: 1rem;
  }
  .ok {
    background: #dcfce7;
    color: #166534;
  }
  .error {
    background: #fee2e2;
    color: #991b1b;
  }
  @keyframes fadeIn {
    from { opacity: 0; transform: scale(0.9); }
    to { opacity: 1; transform: scale(1); }
  }
</style>
</head>
<body>
  <div class="container">
    <h1>Encontrar índice del valor</h1>
    <input id="valoresInput" placeholder="Valores separados por espacios">
    <input id="buscarInput" placeholder="Valor a buscar">
    <button onclick="buscarIndice()">Buscar índice</button>
    <div id="resultado"></div>
  </div>
<script>
function buscarIndice() {
  const valores = document.getElementById('valoresInput').value.trim().split(' ');
  const buscar = document.getElementById('buscarInput').value.trim();
  const resultado = document.getElementById('resultado');

  if (buscar === '' || valores.length === 0) {
    resultado.innerHTML = '<p class="error">⚠️ Por favor llena ambos campos.</p>';
    return;
  }

  const indice = valores.indexOf(buscar);

  if (indice !== -1) {
    resultado.innerHTML = `<p class="ok">✅ El valor ${buscar} se encuentra en la posición ${indice + 1}.</p>`;
  } else {
    resultado.innerHTML = `<p class="error">❌ El valor ${buscar} no fue encontrado.</p>`;
  }
}
</script>
</body>
</html>
