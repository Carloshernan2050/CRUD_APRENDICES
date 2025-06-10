<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestión de Aprendices | SENA</title>

  <!-- Favicon -->
  <link rel="icon" href="/CRUD_APRENDICES/view/img/logoSena.png" type="image/png">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="/CRUD_APRENDICES/public/css/styles.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark mb-4">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="/CRUD_APRENDICES/index.php">
        <img src="/CRUD_APRENDICES/view/img/logoSena.png" alt="Logo SENA" width="30" height="30" class="me-2">
        <span class="fw-bold">Gestión Aprendices</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link fw-bold" href="/CRUD_APRENDICES/index.php">Inicio</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown- fw-bold" href="#" role="button" data-bs-toggle="dropdown">
              Aprendices
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/CRUD_APRENDICES/view/aprendices/show.php">Lista de Aprendices</a></li>
              <li><a class="dropdown-item" href="/CRUD_APRENDICES/view/aprendices/crear.php">Agregar Nuevo</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
  