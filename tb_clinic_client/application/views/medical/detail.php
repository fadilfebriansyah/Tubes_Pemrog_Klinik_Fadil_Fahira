<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Rekam Medis</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('medical'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Rekam Medis
                </div>
                <div class="card-body">
                <?php foreach ($data_medical as $data_medical) : ?>
                    <h5 class="card-title"><b>Nomor Periksa:</b><br><?=$data_medical['medical_id']?></h5>
                    <p class="card-text"><b>Nama Pasien:</b><br><?= $data_medical['patience_name']?></p>
                    <p class="card-text"><b>Tanggal Periksa:</b><br> <?=$data_medical['medical_date']?></p>
                    <p class="card-text"><b>Diagnosa:</b><br><?= $data_medical['medical_diagnose']?></p>
                    <p class="card-text"><b>Suhu Badan:</b><br><?= $data_medical['medical_temperature']?></p>
                    <p class="card-text"><b>Tekanan Darah:</b><br><?= $data_medical['medical_blood_pressure']?></p>
                    <p class="card-text"><b>Tindakan yang diberikan:</b><br><?= $data_medical['action_name']?></p>
                    <p class="card-text"><b>Biaya Periksa:</b><br><?= $data_medical['medical_price']?></p>
                    <p class="card-text"><b>Biaya Tindakan:</b><br><?= $data_medical['action_price']?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>medical" class="btn btn-primary">Kembali</a>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>
