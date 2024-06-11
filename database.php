<?php
// Configuración de la base de datos
$host = 'localhost';   
$dbname = 'aplicativoweb'; 
$username = 'root';  
$password = ''; 

try {
    // Crear una nueva conexión PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Configurar el modo de error de PDO para que lance excepciones
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa a la base de datos";
} catch (PDOException $e) {
    // En caso de error, mostrar un mensaje
    echo "Error de conexión: " . $e->getMessage();
}

// Función para registrar un cliente
function registrarCliente($pdo, $cedula, $nombre, $direccion, $telefono) {
    $sql = "INSERT INTO clientes (cedula, nombre, direccion, telefono) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$cedula, $nombre, $direccion, $telefono]);
    echo "Cliente registrado correctamente.";
}

// Función para registrar una lectura de medidor
function registrarLectura($pdo, $numero_medidor, $cedula_cliente, $lectura, $fecha) {
    $sql = "INSERT INTO lecturas (numero_medidor, cedula_cliente, lectura, fecha) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$numero_medidor, $cedula_cliente, $lectura, $fecha]);
    echo "Lectura registrada correctamente.";
}

// Función para consultar el consumo por número de medidor
function consultarConsumoPorMedidor($pdo, $numero_medidor) {
    $sql = "SELECT * FROM lecturas WHERE numero_medidor = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$numero_medidor]);
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resultados;
}

// Función para consultar el consumo por cédula de cliente
function consultarConsumoPorCedula($pdo, $cedula_cliente) {
    $sql = "SELECT * FROM lecturas WHERE cedula_cliente = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$cedula_cliente]);
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resultados;
}
?>
