<?php
    if (isset($_POST['search'])):
        require_once 'db.php';
        $search = $_POST['search'];

        $query = mysqli_query($db, "SELECT * FROM hp WHERE nama LIKE '%" . $search . "%'");
        while ($row = mysqli_fetch_object($query)):
?>

<div class="col-12 col-sm-6 col-md-4 col-xxl-3 gx-4 gy-4">
    <div class="card" style="width: 18rem;">
        <img src="<?= $row->gambar;?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $row->nama;?></h5>
            <p class="card-text">Harga: <?= $row->harga;?></p>
            <button type="button" class="bi bi-trash-fill btn" style="float: right; color: red;"></button>
            <button type="button" class="bi bi-pencil-square btn" style="float: right; color: blue;"></button>
            <a href="" class="btn btn-primary">Detail</a>
        </div>
    </div>
</div>

<?php
        endwhile;
    endif;
?>