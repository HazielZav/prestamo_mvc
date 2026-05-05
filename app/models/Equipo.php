<?php
require_once "../config/database.php";

class Equipo {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->conectar();
    }

    public function listarTodos() {
        $stmt = $this->conn->query("SELECT * FROM equipos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear($nombre, $descripcion) {
        $stmt = $this->conn->prepare(
            "INSERT INTO equipos (nombre, descripcion) VALUES (?, ?)");
        return $stmt->execute([$nombre, $descripcion]);
    }

    public function actualizar($id, $nombre, $descripcion) {
        $stmt = $this->conn->prepare(
            "UPDATE equipos SET nombre = ?, descripcion = ? WHERE id = ?");
        return $stmt->execute([$nombre, $descripcion, $id]);
    }

    public function obtenerPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM equipos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function eliminar($id){
        $stmt = $this->conn->prepare("DELETE FROM equipos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>