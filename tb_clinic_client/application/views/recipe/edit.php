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
                        <label for="recipe_id" class="col-sm-2 col-form-label">Recipe Id</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="recipe_id" name="recipe_id" value=" <?= $data_recipe['recipe_id']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('recipe_id') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="recipe_qty" class="col-sm-2 col-formlabel">Recipe Qty</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="recipe_qty" name="recipe_qty" value=" <?= $data_recipe['recipe_qty']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('recipe_qty') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="recipe_total" class="col-sm-2 col-formlabel">Recipe Total</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="recipe_total" name="recipe_total" value=" <?= $data_recipe['recipe_total']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('recipe_total') ?>
                            </small>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                    <label for="medicine_name" class="col-sm-2 col-form-label">Medicine Name</label>
                    <div class="col-sm-5">
                            <select class="form-control" id="medicine_name" name="medicine_name">
                                <?php 
                                foreach ($data_medicine as $row) :
                                ?>
                                <option value="<?= $row['medicine_name'] ?>" <?php if ($data_recipe['medicine_name'] == $row['medicine_name']) : echo "selected"; endif; ?>> <?= $row['medicine_name'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('medicine_name') ?>
                            </small>
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