<?php
require_once "../app/core/Auth.php";

class EquipoController {

    public function index() {
        Auth::check();
        Auth::role('admin');

        $nombreEquipo = new Equipo();
        $equipos = $nombreEquipo->listarTodos();

        require "../app/views/equipos/index.php";
    }

    public function crear(){
        Auth::check();
        Auth::role('admin');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];

            $equipo = new Equipo();
            if ($equipo->crear($nombre, $descripcion)) {
                header("Location: index.php?action=equipos");
            } else {
                echo "Error al crear el equipo";
            }
        } else {
            require "../app/views/equipos/crear.php";
        }
    }

    public function actualizar($id){
        Auth::check();
        Auth::role('admin');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];

            $equipo = new Equipo();
            if ($equipo->actualizar($id, $nombre, $descripcion)) {
                header("Location: index.php?action=equipos");
            } else {
                echo "Error al actualizar el equipo";
            }
        } else{
            $equipo = new Equipo();
            $datosEquipo = $equipo->obtenerPorId($id);
            require "../app/views/equipos/actualizar.php";
        }
    }

    public function eliminar($id){
        Auth::check();
        Auth::role('admin');

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $equipo = new Equipo();
            if ($equipo->eliminar($id)){
                header("Location: index.php?action=equipos_");
            } else {
                echo "Error al eliminar el equipo";
            }
        } else {
            $equipo = new Equipo();
            $datosEquipo = $equipo->obtenerPorId($id);
            require "../app/views/equipos/eliminar.php";
        }
    }
}
?>