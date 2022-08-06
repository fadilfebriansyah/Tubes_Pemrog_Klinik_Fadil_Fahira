<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Registry</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('registry'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Pendaftaran
                </div>
                <div class="card-body">
                <?php foreach ($data_registry as $data_registry) : ?>
                    <h5 class="card-title"><b>Nomor Pendaftaran:</b><br><?=$data_registry['registry_id']?></h5>
                    <p class="card-text"><b>Nama Pasien:</b><br><?= $data_registry['patience_name']?></p>
                    <p class="card-text"><b>Nama Dokte:</b><br><?= $data_registry['doctor_name']?></p>
                    <p class="card-text"><b>Tanggal Pendaftaran:</b><br> <?=$data_registry['registry_date']?></p>
                    <p class="card-text"><b>Waktu Pendaftaran:</b><br><?= $data_registry['registry_time']?></p>
                    <p class="card-text"><b>Biaya Pendaftaran:</b><br><?= $data_registry['registry_price']?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>registry" class="btn btn-primary">Kembali</a>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>
