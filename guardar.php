<?php
include("conexion.php");

/* =========================
   PROTECCIÓN DE VARIABLES
========================= */
$nombre = $_POST['nombre'] ?? '';
$direccion = $_POST['direccion'] ?? '';
$edad = $_POST['edad'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$curp = strtoupper($_POST['curp'] ?? '');
$estado_civil = $_POST['estado_civil'] ?? '';
$sexo = $_POST['sexo'] ?? '';
$escolaridad = $_POST['escolaridad'] ?? '';
$ocupacion = $_POST['ocupacion'] ?? '';
$dependencia = $_POST['dependencia'] ?? '';
$tipo_discapacidad = $_POST['tipo_discapacidad'] ?? '';
$temporalidad = $_POST['temporalidad'] ?? '';
$aparato = $_POST['aparato'] ?? '';
$causa = $_POST['causa'] ?? '';
$seguridad_social = $_POST['seguridad_social'] ?? '';
$atencion = $_POST['atencion'] ?? '';
$pertenece_asociacion = $_POST['pertenece_asociacion'] ?? '';
$nombre_asociacion = $_POST['nombre_asociacion'] ?? '';

/* =========================
   CARPETA DE FOTOS
========================= */
if (!file_exists("fotos")) {
    mkdir("fotos", 0777, true);
}

/* =========================
   SUBIR FOTO
========================= */
$foto = "";
if (!empty($_FILES['foto']['name'])) {
    $foto = time() . "_" . $_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'], "fotos/" . $foto);
}

/* =========================
   INSERTAR EN BD
========================= */
$sql = "INSERT INTO registro_discapacidad
(nombre,direccion,edad,telefono,curp,estado_civil,sexo,escolaridad,ocupacion,
dependencia,tipo_discapacidad,temporalidad,aparato,causa,seguridad_social,
atencion,pertenece_asociacion,nombre_asociacion,foto)
VALUES(
'$nombre','$direccion','$edad','$telefono','$curp','$estado_civil','$sexo',
'$escolaridad','$ocupacion','$dependencia','$tipo_discapacidad','$temporalidad',
'$aparato','$causa','$seguridad_social','$atencion','$pertenece_asociacion',
'$nombre_asociacion','$foto')";

$conexion->query($sql);

/* =========================
   OBTENER REGISTRO
========================= */
$id = $conexion->insert_id;
$consulta = $conexion->query("SELECT * FROM registro_discapacidad WHERE id=$id");
$datos = $consulta->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Vista previa de impresión</title>

<style>
body{
    font-family: Arial;
    background:#f2f6f8;
}
.contenedor{
    max-width:900px;
    margin:20px auto;
    background:white;
    padding:25px;
    border-radius:12px;
}
.encabezado{
    display:none;
    justify-content:space-between;
    align-items:center;
    border-bottom:2px solid #1b5e20;
    margin-bottom:20px;
}
.encabezado img{
    height:70px;
}
.foto{
    text-align:center;
    margin-bottom:20px;
}
.foto img{
    width:160px;
    height:160px;
    border-radius:50%;
    object-fit:cover;
    border:4px solid #2e7d32;
}
table{
    width:100%;
    border-collapse:collapse;
}
td{
    padding:8px;
    border-bottom:1px solid #ddd;
}
td b{
    color:#1b5e20;
}
.botones{
    text-align:center;
    margin-top:25px;
}
button{
    padding:12px 20px;
    border:none;
    border-radius:6px;
    margin:5px;
    font-size:15px;
    cursor:pointer;
}
.imprimir{
    background:#2e7d32;
    color:white;
}
@media print{
    .botones{display:none;}
    .encabezado{display:flex;}
}
</style>
</head>

<body>

<div class="contenedor">

<div class="encabezado">
    <img src="img/dis-2.jpg">
    <h3>Registro de Personas con Discapacidad</h3>
    <img src="img/gt.jpg">
</div>

<div class="foto">
    <?php if($datos['foto']!=""){ ?>
        <img src="fotos/<?php echo $datos['foto']; ?>">
    <?php } ?>
</div>

<table>
<tr><td><b>Nombre:</b></td><td><?php echo $datos['nombre']; ?></td></tr>
<tr><td><b>Dirección:</b></td><td><?php echo $datos['direccion']; ?></td></tr>
<tr><td><b>Edad:</b></td><td><?php echo $datos['edad']; ?></td></tr>
<tr><td><b>Teléfono:</b></td><td><?php echo $datos['telefono']; ?></td></tr>
<tr><td><b>CURP:</b></td><td><?php echo $datos['curp']; ?></td></tr>
<tr><td><b>Estado civil:</b></td><td><?php echo $datos['estado_civil']; ?></td></tr>
<tr><td><b>Sexo:</b></td><td><?php echo $datos['sexo']; ?></td></tr>
<tr><td><b>Escolaridad:</b></td><td><?php echo $datos['escolaridad']; ?></td></tr>
<tr><td><b>Ocupación:</b></td><td><?php echo $datos['ocupacion']; ?></td></tr>
<tr><td><b>Dependencia económica:</b></td><td><?php echo $datos['dependencia']; ?></td></tr>
<tr><td><b>Tipo de discapacidad:</b></td><td><?php echo $datos['tipo_discapacidad']; ?></td></tr>
<tr><td><b>Temporalidad:</b></td><td><?php echo $datos['temporalidad']; ?></td></tr>
<tr><td><b>Aparato ortopédico:</b></td><td><?php echo $datos['aparato']; ?></td></tr>
<tr><td><b>Causa:</b></td><td><?php echo $datos['causa']; ?></td></tr>
<tr><td><b>Seguridad social:</b></td><td><?php echo $datos['seguridad_social']; ?></td></tr>
<tr><td><b>Atención institucional:</b></td><td><?php echo $datos['atencion']; ?></td></tr>
<tr><td><b>Asociación:</b></td><td><?php echo $datos['nombre_asociacion']; ?></td></tr>
</table>

<div class="botones">
    <button class="imprimir" onclick="window.print()">🖨️ Imprimir</button>
    <button onclick="location.href='formulario.html'">Nuevo registro</button>
</div>

</div>
<!-- ALERT ELEGANTE -->
<div id="alertaImpresion" style="
    position:fixed;
    top:0; left:0;
    width:100%; height:100%;
    background:rgba(0,0,0,0.5);
    display:flex;
    align-items:center;
    justify-content:center;
    z-index:9999;
">
    <div style="
        background:white;
        padding:30px;
        border-radius:12px;
        text-align:center;
        max-width:350px;
        box-shadow:0 10px 30px rgba(0,0,0,.3);
        animation:zoom .3s ease;
    ">
        <h3 style="color:#2e7d32;margin-bottom:10px;">
            ✔ Registro guardado
        </h3>
        <p style="margin-bottom:20px;">
            ¿Deseas imprimir el comprobante?
        </p>
        <button onclick="imprimir()" style="
            background:#2e7d32;
            color:white;
            border:none;
            padding:10px 18px;
            border-radius:6px;
            cursor:pointer;
            margin-right:8px;
        ">Imprimir</button>

        <button onclick="cerrarAlerta()" style="
            background:#ccc;
            border:none;
            padding:10px 18px;
            border-radius:6px;
            cursor:pointer;
        ">Cerrar</button>
    </div>
</div>

<style>
@keyframes zoom{
    from{transform:scale(.8);opacity:0;}
    to{transform:scale(1);opacity:1;}
}
</style>

<script>
function cerrarAlerta(){
    document.getElementById('alertaImpresion').style.display='none';
}

function imprimir(){
    cerrarAlerta();
    setTimeout(()=>{ window.print(); },300);
}
</script>

</body>
</html>
