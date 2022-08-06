<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Resep Obat</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('recipe'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Resep Obat
                </div>
                <div class="card-body">
                <?php foreach ($data_recipe as $data_recipe) : ?>
                    <h5 class="card-title"><b>Nomor Resep:</b><br><?=$data_recipe['recipe_id']?></h5>
                    <p class="card-text"><b>Nama Pasien:</b><br><?= $data_recipe['patience_name']?></p>
                    <p class="card-text"><b>Nama Obat:</b><br><?= $data_recipe['medicine_name']?></p>
                    <p class="card-text"><b>QTY:</b><br> <?=$data_recipe['recipe_qty']?></p>
                    <p class="card-text"><b>Total:</b><br><?= $data_recipe['recipe_total']?></p>
                    
                    
                    <p></p>
                    <a href="<?= base_url(); ?>recipe" class="btn btn-primary">Kembali</a>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>