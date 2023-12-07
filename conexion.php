<?php
// Conexión a la base de datos (ajusta los detalles según tu configuración)
$conn = new mysqli('localhost', 'usuario', 'contraseña', 'nombre_base_de_datos');

if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}

// Obtener cartas de la base de datos
$sql = 'SELECT * FROM cartas ORDER BY RAND() LIMIT 1';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo 'No se encontraron cartas';
}

$conn->close();
?>