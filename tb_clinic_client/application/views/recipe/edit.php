<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Medical</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('medical'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes); ?>
                    <?php foreach ($data_recipe as $data_recipe) : ?>
                    <div class="form-group row">
                        <label for="recipe_id" class="col-sm-2 col-form-label">Nomor Resep</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="recipe_id" name="recipe_id" value=" <?= $data_recipe['recipe_id']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('recipe_id') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="recipe_qty" class="col-sm-2 col-formlabel">Qty</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="recipe_qty" name="recipe_qty" value=" <?= $data_recipe['recipe_qty']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('recipe_qty') ?>
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
                    <label for="patience_name" class="col-sm-2 col-form-label">Medical ID</label>
                    <div class="col-sm-5">
                            <select class="form-control" id="patience_name" name="patience_name">
                                <?php 
                                foreach ($data_patience as $row) :
                                ?>
                                <option value="<?= $row['patience_name'] ?>" <?php if ($data_recipe['patience_name'] == $row['patience_name']) : echo "selected"; endif; ?>> <?= $row['patience_name'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('patience_name') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>