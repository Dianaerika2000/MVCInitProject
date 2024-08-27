<?php
require_once './DBHelper.php';

function createTable(DBHelper $dbHelper, string $tableName, string $createStatement) {
    try {
        $dbHelper->createTable($tableName, $createStatement);
        echo "Tabla '$tableName' creada exitosamente.\n";
    } catch (Exception $e) {
        echo "Error al crear la tabla '$tableName': " . $e->getMessage() . "\n";
    }
}

// Ejemplo de uso
$dbHelper = new DBHelper();

$tablesToCreate = [
    'categoria' => "
        id SERIAL PRIMARY KEY,
        descripcion VARCHAR(255) NOT NULL
    ",
    // Añadir más tablas aquí
    // 'otra_tabla' => "
    //     id SERIAL PRIMARY KEY,
    //     nombre VARCHAR(100) NOT NULL,
    //     descripcion TEXT
    // "
];

foreach ($tablesToCreate as $tableName => $createStatement) {
    createTable($dbHelper, $tableName, $createStatement);
}
?>
