<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
	</div>

</div>

<div class="card" style="width: 60% ; margin-bottom: 100px">
	<div class="card-body">
		<form method="POST" action="<?php echo base_url('process/request_car') ?>" enctype="multipart/form-data">

			<div class="form-group">
				<label>JTipe Mobil</label>

				<select name="car_model" class="form-control">
					<option value="">--Pilih Tipe Mobil--</option>
					<?php $no = 1;
					foreach ($list_car as $data) : ?>
						<option value="<?php echo $data->name ?>"><?php echo $data->name ?></option>
					<?php endforeach; ?>
				</select>
				<?php echo form_error('car_model', '<div class="text-small text-danger"> </div>') ?>
			</div>
			<div class="form-group">
				<label>Quantity</label>
				<input type="number" name="quantity" class="form-control">
				<?php echo form_error('quantity', '<div class="text-small text-danger"> </div>') ?>
			</div>

			<button type="submit" class="btn btn-success">Simpan</button>
			<button type="reset" class="btn btn-danger">Reset</button>
			<a href="<?php echo base_url('admin/user') ?>" class="btn btn-warning">Kembali</a>

		</form>
	</div>
</div>