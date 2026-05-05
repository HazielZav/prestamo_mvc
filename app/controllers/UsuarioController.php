<?php
require_once "../controllers/AuthController.php";

class UsuarioController {

    public function index() {
        Auth::check();
        Auth::role('admin');

        $usuario = new Usuario();
        $usuarios = $usuario->obtenerTodos();
        require "../app/views/usuarios/index.php";
    }

    
}
?>