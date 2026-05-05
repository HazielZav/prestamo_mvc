<?php

    public function solicitar($usuario_id, $equipo_id) {
        $stmt = $this->conn->prepare("
            INSERT INTO prestamos (usuario_id, equipo_id, fecha_prestamo)
            VALUES (?, ?, NOW())
        ");
        return $stmt->execute([$usuario_id, $equipo_id]);
    }
?>