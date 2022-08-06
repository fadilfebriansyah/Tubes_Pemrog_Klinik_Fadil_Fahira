<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Resep</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('recipe'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>

                    <div class="form-group row">
                        <label for="medical_id" class="col-sm-2 col-form-label">Nomor Rekam Medis</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="medical_id" id="medical_id">
                                <?php foreach ($data_medical as $cal) : ?>
                                    <option value="<?= $cal['medical_id'] ?>"><?= $cal['medical_id'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('medical_id') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="medicine_id" class="col-sm-2 col-form-label">Obat</label>
                        <div class="col-sm-5">
                            <select class="form-control" id="medicine_id" name="medicine_id">
                                <option value="">Silahkan Pilih Nama Obat</option>
                                <?php
                                foreach ($data_medicine as $row) :
                                ?>
                                    <option value="<?= $row['medicine_id'] ?>"><?= $row['medicine_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('medicine_id') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="harga_obat" class="col-sm-2 col-form-label">Harga Obat</label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control" id="harga_obat" name="harga_obat" value="" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="recipe_qty" class="col-sm-2 col-form-label">Qty</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="recipe_qty" name="recipe_qty" value=" <?= set_value('recipe_qty'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('recipe_qty') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="recipe_total" class="col-sm-2 col-form-label">Total</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="recipe_total" name="recipe_total" value=" <?= set_value('recipe_total'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('recipe_total') ?>
                            </small>
                        </div>
                    </div>
                    <div class="col-sm-10 offset-md-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $('#medicine_id').change(function() {
        var medicine_id = $('#medicine_id').val();

        $.ajax({
            type: 'GET',
            url: 'http://localhost/Tubes_Pemrog_Klinik_Fadil_Fahira/tbclinic_server/medicine/getharga?KEY=ulbi123&medicine_id=' + medicine_id,
            beforeSend: function(xhr) {
                xhr.setRequestHeader("Authorization", "Basic " + btoa("ulbi" + ":" + "pemrograman3"));
            },
            success: function(data) {
                $('#harga_obat').val(data.data.medicine_price)
            }
        })
    })
</script>