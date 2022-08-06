<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Pasien</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('patience'); ?>">List Data</a></li>
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
                    <h5 class="card-title"><b>Nomor Pasien :</b><br><?=$data_patience['patience_id']?></h5>
                    <p class="card-text"><b>Nama Pasien :</b><br> <?=$data_patience['patience_name']?></p>
                    <p class="card-text"><b>Alamat :</b><br><?= $data_patience['patience_address']?></p>
                    <p class="card-text"><b>Golongan Darah :</b><br><?= $data_patience['patience_blood']?></p>
                    <p class="card-text"><b>Umur :</b><br><?= $data_patience['patience_age']?></p>
                    <p class="card-text"><b>Jenis Kelamin :</b><br><?= $data_patience['patience_gender']?></p>
                    <p class="card-text"><b>Telepon :</b><br><?= $data_patience['patience_phone']?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>patience" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>