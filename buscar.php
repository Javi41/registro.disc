<?php
// Conexión PDO
$host = "localhost";
$db = "registro_discapacidad";
$user = "root";
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Obtener folio enviado desde el formulario
$folio = $_GET['folio'] ?? '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Resultado de Búsqueda</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<style>
body {
    font-family: 'Poppins', sans-serif;
    background:#f4f6f8;
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
    padding:20px;
}

.result-container {
    background:#fff;
    border:4px solid #099a06;
    border-radius:16px;
    padding:40px 30px;
    max-width:600px;
    width:100%;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
    text-align:center;
}

.result-container h2 {
    color:#099a06;
    font-size:24px;
    margin-bottom:20px;
    font-weight:700;
}

.result-container .folio {
    font-size:20px;
    font-weight:700;
    color:#0a8f08;
    margin-bottom:10px;
}

.result-container .nombre {
    font-size:20px;
    font-weight:600;
    color:#333;
    margin-bottom:20px;
}

.result-container ul {
    text-align:left;
    margin:20px 0;
    padding-left:20px;
}

.result-container li {
    margin-bottom:10px;
    font-weight:500;
}

button, .btn {
    padding:12px 25px;
    border-radius:12px;
    font-weight:600;
    cursor:pointer;
    margin:10px 5px;
    border:none;
    box-shadow:0 4px 12px rgba(0,0,0,0.2);
    transition:all 0.3s ease;
}

button:hover, .btn:hover {
    transform: translateY(-4px);
    box-shadow:0 8px 20px rgba(0,0,0,0.25);
}

.print-btn {
    background:#099a06;
    color:#fff;
}

.back-btn {
    background:#fff;
    color:#099a06;
    border:2px solid #099a06;
}

.back-btn:hover {
    background:#f0f0f0;
}
</style>
</head>
<body>

<div class="result-container">
<?php
if ($folio) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM personas_discapacidad WHERE folio = :folio");
        $stmt->execute([':folio' => $folio]);
        $persona = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($persona) {
            echo "<div class='folio'>Folio: {$persona['folio']}</div>";
            echo "<div class='nombre'>Nombre: {$persona['nombre']}</div>";
            
            echo "<ul>";
            foreach ($persona as $key => $value) {
                if($key != 'folio' && $key != 'nombre'){ // Excluimos folio y nombre que ya se resaltaron
                    echo "<li><b>".ucfirst(str_replace("_"," ",$key)).":</b> $value</li>";
                }
            }
            echo "</ul>";
        } else {
            echo "<h2>No se encontró el folio</h2>";
            echo "<p style='margin:20px 0; font-size:16px;'>Folio buscado: <b>$folio</b></p>";
        }
    } catch (PDOException $e) {
        echo "<p>Error al buscar el registro: " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p>Debe ingresar un folio para buscar.</p>";
}
?>

<!-- BOTONES CENTRADOS -->
<div>
    <button class="print-btn" onclick="window.print()">🖨 Imprimir</button>
    <a href="formulario.html" class="btn back-btn">⬅ Volver al Formulario</a>
</div>
</div>

</body>
</html>
