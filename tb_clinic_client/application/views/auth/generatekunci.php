<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
		<title>Generate API Key</title>
	</head>
	
	<body>
						<a>Generate API Key</a>
					<!-- Alert kalau ada pesan dari controller -->
                    <?php if ($this->session->flashdata('message')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Error! <?= $this->session->flashdata('message'); ?>
                            <button type="button" class="close" data-dismiss="alert" arialabel="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <!-- /Alert kalau ada pesan dari controller -->
							<form action="<?= base_url('auth/generatekunci') ?>" method="post">
							<input type="text" name="key" placeholder="Munculah API KEY" readonly="true" value="<?php if($newKey != '') echo $newKey;?>"/>
							<input type="hidden" name="user_id" value="<?php if($newId != '')echo $newId;?>">
							<input type="submit" class="btn btn-primary btn-block" value="Generate Disini" <?php if($newKey != '') echo "disabled"?>></input>
							</form>
							<a href="<?= base_url('auth') ?>">Login</a>
	</body>
</html>