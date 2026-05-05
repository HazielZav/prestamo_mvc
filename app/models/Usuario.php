<?php
require_once "../config/database.php";

class Usuario {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->conectar();
    }

    public function login($correo, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE correo = ?");
        $stmt->execute([$correo]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
?>