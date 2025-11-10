<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "u949521498_portuu";
$password = "Basededatos442";
$dbname = "u949521498_basedatos04";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT id, nombre, telefono, email, mensaje, fecha FROM formularios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Nombre</th><th>Teléfono</th><th>Email</th><th>Mensaje</th><th>Fecha</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["nombre"]."</td><td>".$row["telefono"]."</td><td>".$row["email"]."</td><td>".$row["mensaje"]."</td><td>".$row["fecha"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron datos.";
}

$conn->close();
?>