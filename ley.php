<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Artículo 63 | Registro Municipal</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
body{
  margin:0;
  font-family:'Poppins', sans-serif;
  background:#f4f6f8;
  color:#333;
}

/* NAVBAR SIMPLE */
nav{
  background:#099a06;
  padding:16px 24px;
  display:flex;
  justify-content:space-between;
  align-items:center;
  flex-wrap:wrap;
}

nav h1{
  color:#fff;
  font-size:18px;
}

nav a{
  color:#fff;
  text-decoration:none;
  font-weight:500;
}

/* SECCIÓN ARTÍCULO 63 */
.articulo63{
  background: linear-gradient(135deg, #e0f2e9, #f4f6f8);
  padding:60px 20px;
}

.articulo-container{
  max-width:900px;
  margin:auto;
  background:#fff;
  border-radius:20px;
  padding:40px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.1);
  text-align:center;
}

.articulo-container h2{
  color:#099a06;
  font-size:28px;
  margin-bottom:20px;
}

.articulo-container p{
  font-size:17px;
  line-height:1.7;
  margin-bottom:40px;
  color:#333;
}

/* ICONOS CON IMAGEN */
.iconos{
  display:grid;
  grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
  gap:30px;
}

.icono{
  background:#f4f9f7;
  padding:15px;
  border-radius:16px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.05);
  transition: transform 0.3s, box-shadow 0.3s;
  cursor:pointer;
}

.icono:hover{
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.icono img{
  width:100%;
  height:120px;
  object-fit:cover;
  border-radius:12px;
  margin-bottom:12px;
}

.icono p{
  font-size:15px;
  color:#055904;
  font-weight:500;
}

/* MODAL VIDEO + INFO */
.modal {
  display: none;
  position: fixed;
  z-index: 999;
  left: 0; top: 0;
  width: 100%; height: 100%;
  background-color: rgba(0,0,0,0.8);
  align-items: center;
  justify-content: center;
  padding: 20px;
}

.modal-content {
  position: relative;
  background-color: #fff;
  padding: 20px;
  border-radius: 15px;
  max-width: 800px;
  width: 100%;
  max-height: 90%;
  overflow-y: auto;
  text-align: center;
}

.modal-content h3{
  color:#099a06;
  margin-bottom:15px;
}

.modal-content p{
  font-size:16px;
  color:#333;
  margin-bottom:20px;
}

.modal-content video{
  width:100%;
  height:auto;
  border-radius:10px;
}

.close-btn {
  position: absolute;
  top:10px;
  right:15px;
  font-size:28px;
  font-weight:bold;
  color:#333;
  cursor:pointer;
}

/* FOOTER */
footer{
  background:#034f18;
  color:#fff;
  text-align:center;
  padding:18px;
  margin-top:40px;
}

/* RESPONSIVE */
@media(max-width:600px){
  .articulo-container h2{
    font-size:24px;
  }
  .articulo-container p{
    font-size:16px;
  }
  .icono p{
    font-size:14px;
  }
  .modal-content h3{
    font-size:20px;
  }
}
</style>
</head>

<body>

<nav>
  <h1>Registro Municipal de Discapacidad</h1>
  <a href="index.html">⬅ Volver</a>
</nav>

<section class="articulo63">
  <div class="articulo-container">
    <h2>📜 Artículo 63</h2>
    <p>Es obligación de las <strong>personas con discapacidad</strong> y de sus familiares proporcionar los datos que se soliciten y efectuar de manera directa el <strong>Registro correspondiente</strong>.</p>

    <div class="iconos">
      <div class="icono" data-video="video/¿Cómo tramitar el certificado de discapacidad permanente Sigue estos pasos [1].MP4" data-titulo="Registro de Datos" data-descripcion="Actualiza tus datos de manera confiable para garantizar un registro seguro y completo.">
        <img src="img/Imagen1.png" alt="Registro de Datos">
        <p>Registro de datos actualizado y confiable</p>
      </div>

      <div class="icono" data-video="video/Atención Integral para las Familias de Personas con Discapacidad.mp4" data-titulo="Colaboración Familiar" data-descripcion="La colaboración entre personas con discapacidad y familiares es clave para un registro eficiente.">
        <img src="img/Imagen2.png" alt="Colaboración Familiar">
        <p>Colaboración entre personas y familiares</p>
      </div>

      <div class="icono" data-video="video/Contacto de Seguridad  Discapacidades  Instituto GR.mp4"Seguridad de Información" data-descripcion="Se garantiza la protección y seguridad de la información proporcionada en el registro.">
        <img src="img/Imagen3.png" alt="Seguridad de Información">
        <p>Protección y seguridad de la información</p>
      </div>

      <div class="icono" data-video="video/Instrumentación y Cumplimiento de la Convención sobre los Derechos de las Personas con Discapacidad [1].MP4" data-descripcion="Se asegura el cumplimiento de las normas municipales relacionadas con el registro de discapacidad.">
        <img src="img/Imagen4.png" alt="Cumplimiento Normativo">
        <p>Cumplimiento de las normas municipales</p>
      </div>

    </div>
  </div>
</section>

<!-- MODAL -->
<div id="videoModal" class="modal">
  <div class="modal-content">
    <span class="close-btn">&times;</span>
    <h3 id="modalTitulo"></h3>
    <p id="modalDescripcion"></p>
    <video id="modalVideo" controls></video>
  </div>
</div>

<footer>
© 2026 Registro Municipal | Tuxpan, Nayarit
</footer>

<script>
// Variables del modal
const modal = document.getElementById("videoModal");
const modalVideo = document.getElementById("modalVideo");
const modalTitulo = document.getElementById("modalTitulo");
const modalDescripcion = document.getElementById("modalDescripcion");
const closeBtn = document.querySelector(".close-btn");

// Abrir modal al hacer click en icono
document.querySelectorAll(".icono").forEach(icon => {
  icon.addEventListener("click", () => {
    modal.style.display = "flex";
    modalVideo.src = icon.getAttribute("data-video");
    modalTitulo.textContent = icon.getAttribute("data-titulo");
    modalDescripcion.textContent = icon.getAttribute("data-descripcion");
    modalVideo.play();
  });
});

// Cerrar modal
closeBtn.addEventListener("click", () => {
  modal.style.display = "none";
  modalVideo.pause();
  modalVideo.currentTime = 0;
  modalVideo.src = "";
});

// Cerrar modal al hacer click fuera del contenido
window.addEventListener("click", (e) => {
  if(e.target == modal){
    modal.style.display = "none";
    modalVideo.pause();
    modalVideo.currentTime = 0;
    modalVideo.src = "";
  }
});
</script>

</body>
</html>
