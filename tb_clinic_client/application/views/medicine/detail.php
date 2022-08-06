<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Obat</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('medicine'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Pasien
                </div>
                <div class="card-body">
                    <h5 class="card-title"><b>Nomor Obat :</b><br><?=$data_medicine['medicine_id']?></h5>
                    <p class="card-text"><b>Nama Obat :</b><br> <?=$data_medicine['medicine_name']?></p>
                    <p class="card-text"><b>Harga Obat :</b><br><?= $data_medicine['medicine_price']?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>medicine" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>