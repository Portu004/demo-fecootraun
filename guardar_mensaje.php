<?php
// --- Conexión a la base de datos LOCAL  ---
$servername = "localhost";
$username = "root";       // Usuario por defecto de XAMPP
$password = "";           // Contraseña vacía por defecto de XAMPP
$dbname = "u949521498_basedatos04"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// --- Procesar el formulario ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // --- ESTA ES LA FORMA SEGURA (CONSULTAS PREPARADAS) ---
    
    // 1. Preparamos la consulta. 
    $stmt = $conn->prepare("INSERT INTO formularios (nombre, telefono, email, mensaje) VALUES (?, ?, ?, ?)");
    
    // 2. "Atamos" (bind) las variables a los "?"
    // Las "ssss" significan que las 4 variables son de tipo String (texto)
    $stmt->bind_param("ssss", $nombre, $telefono, $email, $mensaje);

    // 3. Ejecutamos la consulta
    if ($stmt->execute()) {
        // Éxito: Redirigimos
        header("Location: ver_datos.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    // 4. Cerramos todo
    $stmt->close();
    $conn->close();
}
?>


