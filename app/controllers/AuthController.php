<?php
require_once "../models/Usuario.php";

class AuthController {

    public function loginForm() {
        require "../app/views/auth/login.php";
    }

    public function login() {
        session_start();

        $usuario = (new Usuario())->login($_POST['correo'], $_POST['password']);

        if ($usuario) {
            $_SESSION['user'] = $usuario;
            header("Location: index.php");
        } else {
            echo "Credenciales incorrectas";
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php");
    }
}
?>