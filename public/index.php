<?php

$action = $_GET['action'] ?? 'home';

switch ($action) {

    case 'login':
        (new AuthController())->loginForm();
        break;

    case 'login_post':
        (new AuthController())->login();
        break;

    case 'logout':
        (new AuthController())->logout();
        break;

    case 'equipos_listar':
        (new EquipoController())->index();
        break;

    case 'equipos_crear':
        (new EquipoController())->crear();
        break;

    case 'equipos_actualizar':
        $id = $_GET['id'] ?? null;
        if ($id) {
            (new EquipoController())->actualizar($id);
        } else {
            echo "ID de equipo no proporcionado";
        }
        break;

    case 'equipos_eliminar':
        $id = $_GET['id'] ?? null;
        if ($id) {
            (new EquipoController())->eliminar($id);
        } else {
            echo "ID de equipo no proporcionado";
        }
        break;

    default:
        echo "Bienvenido al sistema";
        break;
}
?>