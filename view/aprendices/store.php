<?php
    require_once ("C://xampp/htdocs/CRUD_APRENDICES/controller/aprendizController.php");
    $aprendiz = new AprendizController();

    $data = [
        "primer_nombre"      => $_POST['primer_nombre'],
        "segundo_nombre"     => $_POST['segundo_nombre'],
        "primer_apellido"    => $_POST['primer_apellido'],
        "segundo_apellido"   => $_POST['segundo_apellido'],
        "id_tipo_documento"  => $_POST['id_tipo_documento'],
        "documento"          => $_POST['documento'],
        "correo"             => $_POST['correo'],
        "telefono"           => $_POST['telefono'],
        "fecha_nacimiento"   => $_POST['fecha_nacimiento'],
        "id_genero"          => $_POST['id_genero'],
        "id_grupo_sanguineo" => $_POST['id_grupo_sanguineo'],
        "id_programa_formacion" => $_POST['id_programa_formacion'],
        "fecha_inicio"       => $_POST['fecha_inicio'],
        "fecha_fin"          => $_POST['fecha_fin']
    ];

    $aprendiz->guardarAprendiz($data);
    

?>