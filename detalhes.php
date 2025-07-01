<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<?php
include "cabecalho.php";

$servidor = 'localhost';
$bd = 'bd_pet';
$usuario = 'root';
$senha = '';

$conn = mysqli_connect($servidor, $usuario, $senha, $bd);
if (!$conn) {
    die("Erro na conexão: " . mysqli_connect_error());
}

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "<p>Pet não encontrado.</p>";
    include "rodape.php";
    exit;
}

$sql = "SELECT * FROM animais WHERE id = $id";
$resultado = mysqli_query($conn, $sql);

if ($pet = mysqli_fetch_assoc($resultado)) {
?>
    <style>
        .info-box {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .info-box h2 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .info-box p {
            font-size: 16px;
            line-height: 1.6;
            color: #333;
        }

        .info-box .btn {
            margin-top: 20px;
        }

        .pet-img {
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }
    </style>

    <div class="container my-5">
        <div class="row justify-content-center align-items-start g-5">

            <div class="col-md-5 text-center">
                <img src="<?= $pet['imagem_url'] ?>" alt="<?= $pet['nome'] ?>" class="img-fluid pet-img">
            </div>

            <div class="col-md-7">
                <div class="info-box">
                    <h2><?= $pet['nome'] ?></h2>
                    <p><strong>Tipo:</strong> <?= $pet['tipo'] ?></p>
                    <p><strong>Sexo:</strong> <?= $pet['sexo'] ?></p>
                    <p><strong>Idade:</strong> <?= $pet['idade'] ?></p>
                    <p><strong>Porte:</strong> <?= $pet['porte'] ?></p>
                    <p><strong>Descrição:</strong> <?= $pet['descricao'] ?></p>
                    <button type="button" class="btn btn-primary d-flex justify-content-center" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left: 460px;">
                        Quer adotar?
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
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php
} else {
    echo "<div class='container my-5'><p class='alert alert-danger'>Pet não encontrado!</p></div>";
}

include "rodape.php";
?>