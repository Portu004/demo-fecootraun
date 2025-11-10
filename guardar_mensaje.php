<?php
// Datos de la base de datos
$servername = "localhost";
$username = "u949521498_portuu";
$password = "Basededatos442";
$dbname = "u949521498_basedatos04";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Insertar datos en la base de datos
    $sql = "INSERT INTO mensajes (nombre, telefono, email, mensaje) VALUES ('$nombre', '$telefono', '$email', '$mensaje')";

    if ($conn->query($sql) === TRUE) {
        echo "Mensaje guardado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
