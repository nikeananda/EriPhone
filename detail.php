<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Product Details</title>
    <style>
        h1 {
            font-size: 2em;
        }

        h2 {
            font-size: 1em;
        }
    </style>
</head>

<body>
    <header class="container mb-5">
        <div class="text-center mt-4">
            <h1>Product Details</h1>
        </div>
    </header>

    <div class="container my-2">
        <?php
            require_once('db.php');
            $hp_id = $_GET['id'];
            $query = mysqli_query($db, "SELECT * FROM hp WHERE `hp_id` = '$hp_id'");
            while ($row = mysqli_fetch_object($query)) :
        ?>
        <div class="row mb-3">
            <div class="col-md-4 col-xl-3">
                <img src="<?= $row->gambar; ?>" alt="" width="100%">
            </div>
            <div class="col-md-8 col-xl-9">
                <h1><?= $row->nama; ?></h1>
                <div class="mt-5 row">
                    <div class="col-sm-6 col-lg-4 col-xxl-3">
                        <ul class="list-unstyled">
                            <li><strong>RAM</strong></li>
                            <li><?= $row->ram; ?> GB</li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xxl-3">
                        <ul class="list-unstyled">
                            <li><strong>ROM</strong></li>
                            <li><?= $row->rom; ?> GB</li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xxl-3">
                        <ul class="list-unstyled">
                            <li><strong>Kamera Utama</strong></li>
                            <li><?= $row->kamera_utama; ?> MP</li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xxl-3">
                        <ul class="list-unstyled">
                            <li><strong>Kamera Depan</strong></li>
                            <li><?= $row->kamera_depan; ?> MP</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-3 row">
                    <div class="col-sm-6 col-lg-4 col-xxl-3">
                        <ul class="list-unstyled">
                            <li><strong>Layar</strong></li>
                            <li><?= $row->layar; ?> inch</li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xxl-3">
                        <ul class="list-unstyled">
                            <li><strong>Baterai</strong></li>
                            <li><?= $row->baterai; ?> mAh</li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xxl-3">
                        <ul class="list-unstyled">
                            <li><strong>Warna</strong></li>
                            <li><?= $row->warna; ?></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xxl-3">
                        <ul class="list-unstyled">
                            <li><strong>Harga</strong></li>
                            <li>Rp <?= $row->harga; ?>,00</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="d-grid">
                    <a href="index.html" class="bi bi-arrow-left btn btn-primary"> Back</a>
                </div>
            </div>
        </div>
    </div>
    </div>
        <?php endwhile ?>
    </div>
</body>
</html>