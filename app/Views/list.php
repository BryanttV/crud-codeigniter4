<?=$this->extend('layout')?>

<?=$this->section('title')?>
Home
<?=$this->endSection()?>

<?=$this->section('content')?>
<div class="row">
	<h1 class="py-2 mt-4 text-center shadow-lg rounded-3 bg-light fw-bold">CRUD con CodeIgniter4 | Home</h1>

	<?php if (isset($validation)): ?>
		<div class="mt-2 alert alert-danger"><?=$validation?></div>
	<?php endif?>

	<div class="mt-4 col-12">
		<form class="row g-3" action="<?=base_url('create')?>"
		method="POST" enctype="multipart/form-data">
		<div class="col-12 col-md-4">
			<label for="name" class="text-light form-label">Name</label>
			<input type="text" name="name" id="name" class="form-control"
			placeholder="Name" value="<?=old('name')?>" required>
		</div>
		<div class="col-12 col-md-4">
			<label for="lastname" class="text-light form-label">Lastname</label>
			<input type="text" name="lastname" id="lastname" class="form-control"
			placeholder="Lastname" value="<?=old('lastname')?>" required>
		</div>
		<div class="col-12 col-md-4">
			<label for="age" class="text-light form-label">Age</label>
			<input type="number" name="age" min="1" max="120" id="age" class="form-control"
			placeholder="Age" value="<?=old('age')?>" required>
		</div>
		<div class="col-12">
				<label for="photo" class="text-light form-label">Photo</label>
				<input type="file" accept="image/jpeg,image/jpg,image/png"
				name="photo" id="photo" class="form-control" required>
		</div>
		<div class="my-4">
			<button type="submit" class="shadow-sm btn btn-warning col-12">Save</button>
		</div>
		</form>
	</div>
</div>
<hr class="border-2 border-top border-light">
<div class="row">
	<h3 class="py-2 my-4 text-center rounded-3 fw-bold bg-light">List of Persons</h3>
	<table class="table table-dark table-responsive table-hover table-bordered">
		<thead>
			<tr>
				<th scope="col">Id</th>
				<th scope="col">Name</th>
				<th scope="col">Lastname</th>
				<th scope="col">Age</th>
				<th scope="col">Photo</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($persons as $person): ?>
				<tr>
					<td><?=$person->id_person?></td>
					<td><?=$person->name?></td>
					<td><?=$person->lastname?></td>
					<td><?=$person->age?></td>
					<td>
						<img style="width: 12rem;" class="mx-auto shadow d-block rounded-3 img-fluid" src="<?=base_url('uploads/' . $person->photo)?>" alt="<?=base_url('uploads/' . $person->photo)?>">
					</td>
					<td>
						<div class="gap-2 row justify-content-center">
							<a class="shadow-sm col-6 col-sm-10 col-lg-5 btn btn-warning" href="<?=base_url('edit/' . $person->id_person)?>">
							<span class="d-none d-sm-inline me-2">Edit</span>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
							<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
								<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
							</svg>
							</a>
							<a class="shadow-sm col-6 col-sm-10 col-lg-5 mt-sm-2 m-lg-0 btn btn-danger" href="<?=base_url('delete/' . $person->id_person)?>">
								<span class="d-none d-sm-inline me-2">Delete</span>
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">
								<path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
								</svg>
							</a>
						</div>
					</td>
				</tr>
			<?php endforeach?>
		</tbody>
	</table>
</div>
<?=$this->endSection()?>

<?=$this->section('alert')?>

<!-- Mensaje de Alerta de nuevo/borrar registro -->
<script type="text/javascript">
		let message = '<?=$message?>';

		if(message == '0'){
			Swal.fire({
				icon: 'error',
				title: 'Re F',
				html: 'Error al crear',
			});
		} else if(message == '1'){
			Swal.fire({
				icon: 'success',
				title: 'Melo',
				text: 'Agregado con éxito'
			});
		} else if(message == '2'){
			Swal.fire({
				icon: 'success',
				title: 'Severo',
				text: 'Registro eliminado correctamente'
			});
		} else if(message == '3'){
			Swal.fire({
				icon: 'error',
				title: 'Que gono...',
				text: 'Error al eliminar'
			});
		} else if(message == '4'){
			Swal.fire({
				icon: 'success',
				title: 'Re bien',
				text: 'Actualizado correctamente'
			});
		}
</script>

<?=$this->endSection()?>
