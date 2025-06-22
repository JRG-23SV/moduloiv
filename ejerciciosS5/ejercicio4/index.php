<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Buscar valor</title>
<style>
  body {
    background: linear-gradient(120deg, #c3cfe2, #dde4eb);
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
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    width: 340px;
    text-align: center;
  }
  h1 {
    color: #374151;
    font-size: 1.3rem;
    margin-bottom: 16px;
  }
  input {
    width: 100%;
    padding: 10px;
    border: 2px solid #94a3b8;
    border-radius: 8px;
    margin: 10px 0;
    font-size: 1rem;
    text-align: center;
  }
  button {
    background: #3b82f6;
    color: white;
    border: none;
    padding: 12px;
    border-radius: 8px;
    width: 100%;
    cursor: pointer;
    font-size: 1rem;
    transition: background 0.3s;
  }
  button:hover {
    background: #2563eb;
  }
  p {
    margin-top: 16px;
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
</style>
</head>
<body>
  <div class="container">
    <h1>Buscar valor</h1>
    <input id="valoresInput" placeholder="Valores separados por espacios">
    <input id="buscarInput" placeholder="Valor a buscar">
    <button onclick="buscarValor()">Verificar</button>
    <div id="resultado"></div>
  </div>
<script>
function buscarValor() {
  const valores = document.getElementById('valoresInput').value.trim().split(' ');
  const valor = document.getElementById('buscarInput').value.trim();
  const resultado = document.getElementById('resultado');
  if (valor === '' || valores.length === 0) {
    resultado.innerHTML = '<p class="error">⚠️ Por favor llena ambos campos.</p>';
    return;
  }
  if (valores.includes(valor)) {
    resultado.innerHTML = `<p class="ok">✅ El valor ${valor} se encuentra entre los valores.</p>`;
  } else {
    resultado.innerHTML = `<p class="error">❌ El valor ${valor} no está entre los valores.</p>`;
  }
}
</script>
</body>
</html>
