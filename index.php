<?php
// src/index.php

require_once __DIR__ . '/controllers/CMain.php';
require_once __DIR__ . '/controllers/CCategoria.php';
// require_once __DIR__ . '/controllers/CProducto.php';

// Enrutador básico
$controller = null;

if (isset($_GET['controller'])) {
    switch ($_GET['controller']) {
        case 'categoria':
            $controller = new CCategoria();
            break;
        // case 'producto':
        //     $controller = new CProducto();
        //     break;
        default:
            echo "Controlador no encontrado.";
            exit();
    }
} else {
    $controller = new CMain();
}

$controller->handleRequest();
?>
