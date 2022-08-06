<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Transaction</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('transaction'); ?>">List Data</a></li>
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
                        <label for="transaction_date" class="col-sm-2 col-form-label">Transaction Date</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" id="transaction_date" name="transaction_date" value=" <?= set_value('transaction_date'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('transaction_date') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="transaction_total" class="col-sm-2 col-form-label">Transaction Total</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="transaction_total" name="transaction_total" value="<?= set_value('transaction_total'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('transaction_total') ?>
                            </small>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="medical_id" class="col-sm-2 col-form-label">Medical ID</label>
                        <div class="col-sm-5">
                        <select class="form-control" name="medical_id" id="medical_id">
                                <?php foreach ($data_medical as $mdc) : ?>
                                    <option value="<?= $mdc['medical_id'] ?>"><?= $mdc['medical_id'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('medical_id') ?>
                            </small>
                        </div>
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
