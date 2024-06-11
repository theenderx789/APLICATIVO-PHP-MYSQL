<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    registrarCliente($pdo, $cedula, $nombre, $direccion, $telefono);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-xl">
            <h1 class="text-2xl font-bold mb-4">Registrar Cliente</h1>
            <form method="post" action="registrar.php">
                <div class="mb-4">
                    <label class="block text-gray-700">Cédula:</label>
                    <input type="text" name="cedula" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Nombre:</label>
                    <input type="text" name="nombre" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Dirección:</label>
                    <input type="text" name="direccion" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Teléfono:</label>
                    <input type="text" name="telefono" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <input type="submit" value="Registrar" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
                </div>
            </form>
        </div>
    </div>
</body>
</html>

