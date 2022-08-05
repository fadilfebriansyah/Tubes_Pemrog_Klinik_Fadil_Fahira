<div class="container pt-5" id="app">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Medical</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('medical'); ?>">List Data</a></li>
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
                        <label for="medical_id" class="col-sm-2 col-form-label">Medical Id</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="medical_id" name="medical_id" value="<?= set_value('medical_id'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('medical_id') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="registry_id" class="col-sm-2 col-form-label">Registry Id</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="registry_id" id="registry_id">
                                <?php foreach ($data_registry as $rgs) : ?>
                                    <option value="<?= $rgs['registry_id'] ?>"><?= $rgs['registry_id'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('registry_id') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="medical_date" class="col-sm-2 col-form-label">Medical Date</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" id="medical_date" name="medical_date" value=" <?= set_value('medical_date'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('medical_date') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="medical_diagnose" class="col-sm-2 col-form-label">Medical Diagnose</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="medical_diagnose" name="medical_diagnose" value="<?= set_value('medical_diagnose'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('medical_diagnose') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="medical_temperature" class="col-sm-2 col-form-label">Medical Temperature</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="medical_temperature" name="medical_temperature" value="<?= set_value('medical_temperature'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('medical_temperature') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="medical_blood_pressure" class="col-sm-2 col-form-label">Medical Blood Pressure</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="medical_blood_pressure" name="medical_blood_pressure" value="<?= set_value('medical_blood_pressure'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('medical_blood_pressure') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="medical_price" class="col-sm-2 col-form-label">Medical Price</label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control" id="medical_price" name="medical_price">
                            <small class="text-danger">
                                <?php echo form_error('medical_price') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="action_id" class="col-sm-2 col-form-label">ACTION ID</label>
                    <div class="col-sm-5">
                            <select class="form-control" id="action_id" name="action_id">
                            <option value="">Silahkan Pilih Tindakan</option>
                                <?php 
                                foreach ($data_action as $row) :
                                ?>
                                <option value="<?= $row['action_id'] ?>"><?= $row['action_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('action_id') ?>
                            </small>
                        </div>
                    </div> 
                    
                    <div class="form-group row">
                        <label for="harga_aksi" class="col-sm-2 col-form-label">HARGA TINDAKAN</label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control" id="harga_aksi" name="harga_aksi" value="" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="medical_total" class="col-sm-2 col-form-label">Medical Total</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="medical_total" name="medical_total" value="<?= set_value('medical_total'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('medical_total') ?>
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
     $('#action_id').change(function () {
        var action_id = $('#action_id').val();

        $.ajax({
            type: 'GET',
            url: 'http://localhost/Tubes_Pemrog_Klinik_Fadil_Fahira/tbclinic_server/action/getharga?KEY=ulbi123&action_id='+action_id,
            beforeSend: function (xhr) {
                xhr.setRequestHeader ("Authorization", "Basic " + btoa("ulbi" + ":" + "pemrograman3"));
            },
            success: function (data) {
                $('#harga_aksi').val(data.data.action_price)
            }
        })
    })
</script>
