<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['numero_medidor'])) {
        $numero_medidor = $_GET['numero_medidor'];
        $consumo = consultarConsumoPorMedidor($pdo, $numero_medidor);
    } elseif (isset($_GET['cedula_cliente'])) {
        $cedula_cliente = $_GET['cedula_cliente'];
        $consumo = consultarConsumoPorCedula($pdo, $cedula_cliente);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Consultar Consumo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-xl">
            <h1 class="text-2xl font-bold mb-4">Consultar Consumo</h1>
            <form method="get" action="consultar.php">
                <div class="mb-4">
                    <label class="block text-gray-700">Número de Medidor:</label>
                    <input type="text" name="numero_medidor" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Cédula del Cliente:</label>
                    <input type="text" name="cedula_cliente" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="mb-4">
                    <input type="submit" value="Consultar" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
                </div>
            </form>
            <?php
            if (isset($consumo)) {
                echo "<h2 class='text-xl font-bold mt-6'>Resultados:</h2>";
                echo "<pre class='bg-gray-100 p-4 rounded-lg mt-4'>";
                print_r($consumo);
                echo "</pre>";
            }
            ?>
        </div>
    </div>
</body>
</html>
