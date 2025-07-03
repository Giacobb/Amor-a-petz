<?php include 'cabecalho.php'; ?>

<section class="py-5" id="pets">
    <div class="container">
        <style>
            /* Tipografia */
            body {
                font-family: 'Open Sans', sans-serif;
                background-color: #f8f9fa;
                color: #333;
                line-height: 1.6;
            }

            h1,
            h2,
            h3,
            h4,
            h5 {
                font-family: 'Poppins', sans-serif;
                font-weight: 700;
                color: rgb(14, 103, 247);
                ;
                margin-bottom: 1rem;
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
                color: rgb(14, 103, 247);
                ;
            }

            .pet-card .card-text {
                font-size: 1rem;
                color: #555;
            }

            .btn-primary {
                background-color: rgb(14, 103, 247);
                ;
                border-color: rgb(14, 103, 247);
                ;
                transition: background-color 0.3s ease, border-color 0.3s ease;
            }

            .btn-primary:hover {
                background-color: rgb(43, 58, 192);
                border-color: rgb(14, 103, 247);
                ;
            }

            /* Seção Sobre */
            #sobre p {
                font-size: 1.125rem;
                font-weight: 500;
                color: rgb(14, 103, 247);
            }
        </style>

        <h1 class="mb-4"><strong>Pets Disponíveis</strong></h1>

        <!-- Filtro com select -->
        
        <div class="row">
            <?php
            
            

            $sql = "SELECT id, nome, tipo, sexo, idade, porte, descricao, imagem_url FROM tb_animais ";
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