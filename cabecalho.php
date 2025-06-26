<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'bd_pet';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Erro na conexão: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amor a Petz</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .hero {

      height: 400px;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
    }

    .pet-card img {
      height: 400px;
      object-fit: cover;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

      <a class="navbar-brand" href="#">
        <img src="img/icon.png" alt="Logo" width="75" height="75" class="d-inline-block align-text-center me-2">Amor a Petz
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#sobre">Sobre</a></li>
          <li class="nav-item"><a class="nav-link" href="#pets">Pets</a></li>
          
        </ul>
      </div>
    </div>
  </nav>