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

    public function crear($nombre, $correo, $password_plana, $rol) {
        $hashedPassword = password_hash($password_plana, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare(
            "INSERT INTO usuarios (nombre, correo, password, rol) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$nombre, $correo, $hashedPassword, $rol]);
    }

    public function actualizar($id, $nombre, $correo, $password_plana, $rol) {
        $hashedPassword = password_hash($password_plana, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare(
            "UPDATE usuarios SET nombre = ?, correo = ?, password = ?, rol = ? WHERE id = ?");
        return $stmt->execute([$nombre, $correo, $hashedPassword, $rol, $id]);
    }

    public function obtenerPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function eliminar($id){
        $stmt = $this->conn->prepare("DELETE FROM usuarios WHERE id = ?");
        return $stmt->execute([$id]);
    }   
}
?>