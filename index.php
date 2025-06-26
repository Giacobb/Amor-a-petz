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
          <li class="nav-item"><a class="nav-link" href="#contato">Contato</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <style>
    .carousel .carousel-item img.banner {
      height: 400px;
      object-fit: cover;
    }
  </style>
  <div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/banner.avif" class="d-block w-100 banner" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/banner1.png" class="d-block w-100 banner" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/banner2.png" class="d-block w-100 banner" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/banner3.png" class="d-block w-100 banner" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <section class="py-5 bg-light" id="sobre">
    <div class="container">
      <h2 class="mb-4">Sobre o Projeto</h2>
      <p>O Adote Amor é um projeto de adoção responsável que conecta animais resgatados a pessoas que querem um novo amigo. Trabalhamos com ONGs e protetores para garantir uma adoção ética, amorosa e segura.</p>
    </div>
  </section>

  <section class="py-5" id="pets">
    <div class="container">
      <h1 class="mb-4"><strong>Pets disponíveis</strong></h1>
      <div class="row">
        <?php
        $sql = "SELECT nome, tipo, sexo, idade, porte, descricao, imagem_url FROM animais";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo '<div class="col-md-4 mb-4">';
            echo '  <div class="card pet-card">';
            echo '    <img src="' . $row['imagem_url'] . '" class="card-img-top" alt="Pet">';
            echo '    <div class="card-body">';
            echo '      <h5 class="card-title">' . htmlspecialchars($row['nome']) . '</h5>';
            echo '      <p class="card-text">' . htmlspecialchars($row['sexo']) . ', ' . htmlspecialchars($row['idade']) . ', porte ' . htmlspecialchars($row['porte']) . ', ' . htmlspecialchars($row['descricao']) . '</p>';
            echo '      <a href="#contato" class="btn btn-primary">Quero Adotar</a>';
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
          }
        } else {
          echo '<p>Nenhum pet disponível no momento.</p>';
        }
        ?>
      </div>
    </div>
  </section>

  <button type="button" class="btn btn-primary d-flex justify-content-center" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left: 460px;">
  Precisa de ajuda?
  </button>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"> Precisa de ajuda?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Contatos:<br>
        Whats : (19) 9999-999 <br>
        Email : emailteste@gmail.com<br>
        Tel : 4545-5454

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

  <footer class="bg-dark text-white text-center py-3">
    <p class="mb-0">&copy; 2025 Amor a Petz - Felipe Giacobbe.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>