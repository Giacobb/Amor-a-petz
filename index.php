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
      text-shadow: 2px 2px 4px rgba(0,0,0,0.6);
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

  <section class="py-5 bg-light" id="contato">
    <div class="container">
      <h2 class="mb-4">Entre em Contato</h2>
      <form>
        <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nome" placeholder="Seu nome">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" placeholder="seu@email.com">
        </div>
        <div class="mb-3">
          <label for="mensagem" class="form-label">Mensagem</label>
          <textarea class="form-control" id="mensagem" rows="3" placeholder="Quero adotar o Thor!"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Enviar</button>
      </form>
    </div>
  </section>

  <footer class="bg-dark text-white text-center py-3">
    <p class="mb-0">&copy; 2025 Amor a Petz - Felipe Giacobbe.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
