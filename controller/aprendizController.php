<?php
    class AprendizController
    {
        private $aprendizModel;

        public function __construct()
        {
            require_once("C://xampp/htdocs/CRUD_APRENDICES/model/aprendizmodel.php");
            $this->aprendizModel = new AprendizModel();
        }

        public function guardarAprendiz($data) {
            try {
                if (empty($data['primer_nombre']) || empty($data['documento']) || empty($data['telefono']) || empty($data['correo'])) {
                    exit('Todos los campos obligatorios deben ser completados.');
                }
                
                if (strlen($data['telefono']) != 10 || !is_numeric($data['telefono'])) {
                    exit('El número de teléfono debe tener exactamente 10 dígitos y solo números.');
                }
        
                if (!filter_var($data['correo'], FILTER_VALIDATE_EMAIL)) {
                    exit('El correo electrónico no es válido.');
                }
                $id = $this->aprendizModel->crearAprendiz($data);
        
                if ($id !== false && is_numeric($id)) {
                    header("Location: ../../view/aprendices/show.php?id_aprendiz=" . $id);
                    exit(); 
                } else {
                    exit('Error al guardar el aprendiz. ' . $id); 
                }
            } catch (Exception $e) {
                exit('Error general: ' . $e->getMessage());
            }
        }
        

        public function show($id) {
            try {
                return ($this->aprendizModel->show($id) != false) ? $this->aprendizModel->show($id) : header("Location: index.php");
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();        
            }
        }

        public function index() {
            try {
                $rows = $this->aprendizModel->index();
                return $rows ? $rows : false;
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }

        public function update($id_aprendiz, $data) {
            try {
                if (empty($data['primer_nombre']) || empty($data['documento']) || empty($data['telefono']) || empty($data['correo'])) {
                    exit('Todos los campos obligatorios deben ser completados.');
                }
        
                if (strlen($data['telefono']) != 10 || !is_numeric($data['telefono'])) {
                    exit('El número de teléfono debe tener exactamente 10 dígitos.');
                }
        
                if (!filter_var($data['correo'], FILTER_VALIDATE_EMAIL)) {
                    exit('El correo electrónico no es válido.');
                }
        
                $update = $this->aprendizModel->update($id_aprendiz, $data);

                if ($update === true) {
                    header("Location: ../../view/aprendices/show.php?id_aprendiz=" . $id_aprendiz);
                    exit();
                } else {
                    exit($update); 
                }
                
        
            } catch (Exception $e) {
                exit("Error general: " . $e->getMessage());
            }
        }
        

        public function delete($id) {
            try {
                if ($this->aprendizModel->delete($id)) {
                    header("Location: /CRUD_APRENDICES/view/aprendices/show.php");
                    exit;
                } else {
                    header("Location: /CRUD_APRENDICES/view/aprendices/show.php?error=1");
                    exit;
                }
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();  
                exit;
            }
        }
        
    }
?>