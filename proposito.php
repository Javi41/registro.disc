<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Visión, Misión y Propósito | Inclusión Nayarit</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
  * { margin:0; padding:0; box-sizing:border-box; font-family: 'Poppins', sans-serif; }
  body, html { height: 100%; overflow: hidden; background:#f0f0f0; }

  .container { width: 100%; height: 300vh; transition: transform 0.7s ease-in-out; }

  .view {
    width: 100%;
    height: 100vh;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    text-align:center;
    padding:20px;
    color:white;
    position: relative;
  }

  /* Colores por vista */
  #vision { background: linear-gradient(135deg, #6dd5ed, #2193b0); }
  #mision { background: linear-gradient(135deg, #ff9a9e, #fad0c4); color:#333; }
  #proposito { background: linear-gradient(135deg, #a18cd1, #fbc2eb); color:#333; }

  h2 { font-size: 3rem; margin-bottom: 15px; text-shadow: 1px 1px 3px rgba(0,0,0,0.3);}
  p { font-size: 1.25rem; max-width:650px; margin-bottom: 30px; line-height: 1.6; }

  .values {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin-bottom: 30px;
    gap: 15px;
  }

  .value-card {
    background: rgba(255,255,255,0.15);
    padding: 15px 20px;
    border-radius: 12px;
    min-width: 140px;
    font-weight: 500;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    backdrop-filter: blur(8px);
    transition: transform 0.3s;
  }

  .value-card:hover { transform: translateY(-5px); }

  .btn {
    padding:12px 25px;
    background-color: rgba(0,0,0,0.3);
    color:white;
    text-decoration:none;
    border-radius:12px;
    font-weight:600;
    margin:5px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    transition: all 0.3s;
  }

  .btn:hover { background-color: rgba(0,0,0,0.5); transform: scale(1.05); }

  .btn-index { background-color: #333; color: #fff; }
  .btn-index:hover { background-color: #555; }

  /* Iconos grandes */
  .icon { font-size: 3rem; margin-bottom: 15px; }
</style>
</head>
<body>

<div class="container" id="container">

  <!-- Vista Visión -->
  <section id="vision" class="view">
    <div class="icon">🌐</div>
    <h2>Visión</h2>
    <p>Garantizar el respeto y ejercicio de los derechos de las personas con discapacidad, impulsando inclusión y accesibilidad universal, creando un Nayarit donde todos tengamos igualdad de oportunidades.</p>
    
    <div class="values">
      <div class="value-card">Inclusión 🤝</div>
      <div class="value-card">Equidad ⚖️</div>
      <div class="value-card">Respeto ❤️</div>
      <div class="value-card">Accesibilidad ♿</div>
    </div>

    <button class="btn" onclick="showMision()">Ver Misión</button>
    <a href="index.html" class="btn btn-index">Volver a Index</a>
  </section>

  <!-- Vista Misión -->
  <section id="mision" class="view">
    <div class="icon">🚀</div>
    <h2>Misión</h2>
    <p>Construir un Nayarit incluyente, accesible y respetuoso, promoviendo la participación plena de todas las personas con discapacidad, fomentando educación, cultura y empleo con igualdad de oportunidades.</p>

    <div class="values">
      <div class="value-card">Educación 📚</div>
      <div class="value-card">Cultura 🎨</div>
      <div class="value-card">Empleo 💼</div>
      <div class="value-card">Participación 🗳️</div>
    </div>

    <button class="btn" onclick="showVision()">Regresar a Visión</button>
    <button class="btn" onclick="showProposito()">Ver Propósito</button>
    <a href="index.html" class="btn btn-index">Volver a Index</a>
  </section>

  <!-- Vista Propósito -->
  <section id="proposito" class="view">
    <div class="icon">🎯</div>
    <h2>Propósito</h2>
    <p>Promover un Nayarit inclusivo y accesible, donde cada persona con discapacidad pueda desarrollarse plenamente, participar activamente en la sociedad y disfrutar de igualdad de oportunidades en todos los ámbitos de la vida.</p>

    <div class="values">
      <div class="value-card">Empoderamiento 💪</div>
      <div class="value-card">Igualdad ⚖️</div>
      <div class="value-card">Solidaridad 🤝</div>
      <div class="value-card">Respeto ❤️</div>
    </div>

    <button class="btn" onclick="showMision()">Regresar a Misión</button>
    <a href="index.html" class="btn btn-index">Volver a Index</a>
  </section>

</div>

<script>
  const container = document.getElementById('container');

  function showVision() { container.style.transform = 'translateY(0)'; }
  function showMision() { container.style.transform = 'translateY(-100vh)'; }
  function showProposito() { container.style.transform = 'translateY(-200vh)'; }
</script>

</body>
</html>
