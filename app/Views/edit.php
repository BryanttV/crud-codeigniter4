<?=$this->extend('layout')?>

<?php
// 1. Primer Método: Datos del Arreglo
// $id_person = $data[0]['id_person'];
// $name = $data[0]['name'];
// $lastname = $data[0]['lastname'];
// $age = $data[0]['age'];
?>

<?=$this->section('title')?>
Edit
<?=$this->endSection()?>

<?=$this->section('content')?>
<div class="row">
	<h1 class="py-2 mt-4 text-center rounded-3 bg-light fw-bold">CRUD con CodeIgniter4 | Edit</h1>
	
	<?php if ($validation): ?>
		<div class="mt-2 alert alert-danger"><?=$validation->listErrors()?></div>
	<?php endif?>
	<div class="mt-4 col-12">
		<form class="row g-3" action="<?=base_url('update')?>" method="POST" enctype="multipart/form-data">
			<input type="text" id="id_person" name="id_person" hidden value="<?=$person['id_person']?>">
			<div class="col-12 col-md-4">
				<label for="name" class="text-light form-label">Name</label>
				<input type="text" name="name" id="name" class="form-control"
				placeholder="Name" value="<?=$person['name']?>" required>
			</div>
			<div class="col-12 col-md-4">
				<label for="lastname" class="text-light form-label">Lastname</label>
				<input type="text" name="lastname" id="lastname" class="form-control"
				placeholder="Lastname" value="<?=$person['lastname']?>" required>
			</div>
			<div class="col-12 col-md-4">
				<label for="age" class="text-light form-label">Age</label>
				<input type="number" min="1" max="120" name="age" id="age" class="form-control"
				placeholder="Age" value="<?=$person['age']?>" required>
			</div>
			<div class="col-12">
				<label for="photo" class="text-light form-label">Photo</label>
				<input type="file" accept="image/jpeg,image/jpg,image/png" 
				name="photo" id="photo" class="form-control">
			</div>
			<div class="mt-4 col-12 col-md-6">
				<button type="submit" class="w-100 btn btn-warning">Update</button>
			</div>
			<div class="mt-4 col-12 col-md-6">
				<a href="<?=base_url()?>" class="btn btn-info w-100">Back</a>
			</div>
		</form>
	</div>
</div>
<?=$this->endSection()?>

<?=$this->section('alert')?>

<!-- Mensaje de Alerta de actualización -->
<?php if (isset($message)): ?>

	<script type="text/javascript">
		let message = '<?=$message?>';

		if(message == '1'){
			Swal.fire({
				icon: 'error',
				title: 'Que paila',
				text: 'Error al actualizar'
			});
		}
	</script>
<?php endif;?>

<?=$this->endSection()?>