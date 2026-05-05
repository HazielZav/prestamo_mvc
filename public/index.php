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

    case 'equipos':
        (new EquipoController())->index();
        break;

    case 'actualizar':
        $id = $_GET['id'] ?? null;
        if ($id) {
            (new EquipoController())->actualizar($id);
        } else {
            echo "ID de equipo no proporcionado";
        }
        break;

    default:
        echo "Bienvenido al sistema";
        break;
}
?>