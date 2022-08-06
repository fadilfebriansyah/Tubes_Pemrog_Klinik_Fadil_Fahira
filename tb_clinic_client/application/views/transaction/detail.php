<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Transaction</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('transaction'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Transaction
                </div>
                <div class="card-body">
                <?php foreach ($data_transaction as $data_transaction) : ?>
                    <h5 class="card-title"><b>Nomor Transaksi:</b><br><?=$data_transaction['transaction_id']?></h5>
                    <p class="card-text"><b>Tanggal:</b><br> <?=$data_transaction['transaction_date']?></p>
                    <p class="card-text"><b>Nama Pasien:</b><br><?= $data_transaction['patience_name']?></p>
                    <p class="card-text"><b>Dokter yang memeriksa:</b><br><?= $data_transaction['doctor_name']?></p>         
                    <p class="card-text"><b>Diagnosa Penyakit:</b><br><?= $data_transaction['medical_diagnose']?></p>
                    <p class="card-text"><b>Tindakan yang diberikan:</b><br><?= $data_transaction['action_name']?></p>
                    <p class="card-text"><b>Obat yang diresepkan:</b><br><?= $data_transaction['medicine_name']?></p>
                    <p class="card-text"><b>Jumlah obat yang diberikan:</b><br><?= $data_transaction['recipe_qty']?></p>
                    <p class="card-text"><b>Biaya Tindakan:</b><br><?= $data_transaction['action_price']?></p>
                    <p class="card-text"><b>Biaya Rekam Medis:</b><br><?= $data_transaction['medical_price']?></p>
                    <p class="card-text"><b>Biaya Resep:</b><br><?= $data_transaction['recipe_total']?></p>
                    <p class="card-text"><b>Jumlah Transaksi:</b><br><?= $data_transaction['transaction_total']?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>transaction" class="btn btn-primary">Kembali</a>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>
