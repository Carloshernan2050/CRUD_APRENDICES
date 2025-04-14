<?php
class conexion {
    private $server = "localhost";
    private $database = "prueba_db";
    private $usuario = "root";
    private $contrasenia = "";
    private $pdo;

public function conectar (){
    try {
        $conexion = "mysql:host={$this->server};dbname={$this->database}";
        $this->pdo = new PDO($conexion, $this->usuario, $this->contrasenia);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->pdo;    
    }catch (PDOException $e){
        echo "error al conectar a la base: " . $e->getMessage();
        exit;
}
}
public function tomarConexion() {
    return $this->pdo;
}
}