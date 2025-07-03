<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Adote Amor</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@400;700&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* Tipografia */
    body {
      font-family: 'Open Sans', sans-serif;
      background-color: #f8f9fa;
      color: #333;
      line-height: 1.6;
    }

    h1, h2, h3, h4, h5 {
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
      color: #2c3e50;
      margin-bottom: 1rem;
    }

    /* Carrossel */
    .carousel .carousel-item img.banner {
      height: 400px;
      object-fit: cover;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    /* Cards dos pets */
    .pet-card {
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      background-color: #fff;
    }

    .pet-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    .pet-card img {
      height: 250px;
      object-fit: cover;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
    }

    .pet-card .card-body {
      padding: 1.25rem;
    }

    .pet-card .card-title {
      font-size: 1.5rem;
      margin-bottom: 0.5rem;
      color: #34495e;
    }

    .pet-card .card-text {
      font-size: 1rem;
      color: #555;
    }

    .btn-primary {
      background-color: #e74c3c;
      border-color: #e74c3c;
      transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #c0392b;
      border-color: #c0392b;
    }

    /* Seção Sobre */
    #sobre p {
      font-size: 1.125rem;
      font-weight: 500;
      color:rgb(45, 54, 47);
    }
  </style>
</head>

<body>

  <?php include 'cabecalho.php'; ?>

  <div id="carouselExample" class="carousel slide mb-5">

  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>

  <div class="carousel-inner rounded-4 shadow-sm">
    <div class="carousel-item active">
      <img src="img/banner.avif" class="d-block w-100 banner" alt="Banner 1">
    </div>
    <div class="carousel-item">
      <img src="img/banner1.png" class="d-block w-100 banner" alt="Banner 2">
    </div>
    <div class="carousel-item">
      <img src="img/fundoa.jfif" class="d-block w-100 banner" alt="Banner 3">
    </div>
    <div class="carousel-item">
      <img src="img/banner3.png" class="d-block w-100 banner" alt="Banner 4">
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Próximo</span>
  </button>
  <div style="height: 40px; background-color: rgb(0, 88, 252);"></div>
</div>


  <section class="py-5 bg-light" id="sobre">
    <div class="container">
      <h1 class="mb-4">Sobre o Projeto</h1>
      <p><strong>Adote Amor é uma iniciativa voltada à adoção responsável de animais, criada com o propósito de transformar vidas — tanto dos animais quanto das pessoas que os acolhem.</strong> Nosso projeto atua como uma ponte entre animais resgatados, muitas vezes vítimas de abandono, maus-tratos ou negligência, e lares acolhedores que buscam um novo companheiro para compartilhar amor, carinho e cuidado.
        Trabalhamos em parceria com ONGs, abrigos e protetores independentes para garantir que cada adoção seja feita com responsabilidade, ética e total transparência. Antes de serem disponibilizados para adoção, todos os animais passam por uma avaliação veterinária, são vacinados, vermifugados e, quando possível, castrados. Além disso, realizamos entrevistas e orientações com os adotantes, garantindo que o novo lar seja adequado e seguro para o animal.
        Acreditamos que adotar é um ato de amor e empatia, e por isso promovemos campanhas de conscientização, eventos de adoção, apoio a lares temporários e ações educativas sobre bem-estar animal. O objetivo é não apenas encontrar lares definitivos para cães e gatos, mas também criar uma cultura de respeito e responsabilidade com os animais.
        Se você está pronto para mudar a vida de um bichinho — e permitir que ele mude a sua — o Adote Amor está aqui para ajudar nessa jornada. Porque todo animal merece uma segunda chance. E todo amor merece ser adotado.</p>
    </div>
  </section>

  <section class="py-5" id="pets">
  <div class="container">
    <h1 class="mb-4"><strong>Pets disponíveis</strong></h1>
    <div class="row">
      <?php
      $sql = "SELECT id, nome, tipo, sexo, idade, porte, descricao, imagem_url FROM tb_animais limit 6";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $nome = $row['nome'];
    $sexo = $row['sexo'];
    $idade = $row['idade'];
    $porte = $row['porte'];
    $descricao = $row['descricao'];
    $imagem = $row['imagem_url'];

    $descricao_limitada = mb_substr($descricao, 0, 25, 'UTF-8');
    if (mb_strlen($descricao, 'UTF-8') > 255) {
      $descricao_limitada .= '...';
    }
    ?>
    
    <div class="col-md-4 mb-4">
      <div class="card pet-card">
        <img src="<?= $imagem ?>" class="card-img-top" alt="Pet">
        <div class="card-body">
          <h5 class="card-title"><?= $nome ?></h5>
          <p class="card-text"><?= $sexo ?>, <?=$idade?>, porte <?= $porte ?></p>
          <p class="card-text"><?= $descricao_limitada ?></p>
          <a href="detalhes.php?id=<?= $id ?>" class="btn btn-primary">Quero Adotar</a>
        </div>
      </div>
    </div>

    <?php
  }
}
      ?>
    </div>
  </div>
</section>


  <?php include 'rodape.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
