<?php
// contact_process.php

// Conectar a la base de datos
$servername = "localhost";
$username = "c2640596_Adm";
$password = "Junio2024";
$dbname = "c2640596_Negocio";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Preparar y ejecutar la consulta SQL
$sql = "INSERT INTO contacto (nombre, correo, asunto, mensaje) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $subject, $message);

if ($stmt->execute()) {
    echo "Mensaje enviado correctamente.";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
