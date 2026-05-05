<?php
class Auth {

    public static function check() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }
    }

    public static function role($rol) {
        if ($_SESSION['user']['rol'] != $rol) {
            echo "Acceso denegado";
            exit;
        }
    }
}
?>