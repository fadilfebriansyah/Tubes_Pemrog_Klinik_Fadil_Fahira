<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Tindakan</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('action'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Tindakan
                </div>
                <div class="card-body">
                    <h5 class="card-title"><b> Nomor Tindakan :</b><br><?=$data_action['action_id']?></h5>
                    <p class="card-text"><b>Nama Tindakan :</b><br> <?=$data_action['action_name']?></p>
                    <p class="card-text"><b>Biaya Tindakan :</b><br><?= $data_action['action_price']?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>action" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>