<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
  </div>

</div>
<!-- /.container-fluid -->

<div class="card" style="width: 60% ; margin-bottom: 100px">
	<div class="card-body">
		<form method="POST" action="<?php echo base_url('admin/data_users/tambah_data_aksi')?>" enctype="multipart/form-data">

			<div class="form-group">
				<label>Nama</label>
				<input type="text" name="name" class="form-control">
				<?php echo form_error('name', '<div class="text-small text-danger"> </div>')?>
			</div>

			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control">
				<?php echo form_error('username', '<div class="text-small text-danger"> </div>')?>
			</div>

			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control">
				<?php echo form_error('password', '<div class="text-small text-danger"> </div>')?>
			</div>

			<div class="form-group">
				<label>Status</label>
				<select name="is_active" class="form-control">
					<option value="">--Pilih Status--</option>
					<option value="1">Active</option>
					<option value="0">Inactive</option>
				</select>
				<?php echo form_error('status', '<div class="text-small text-danger"> </div>')?>
			</div>

			<div class="form-group">
				<label>Hak Akses</label>
				<select name="role_id" class="form-control">
					<option value="">--Pilih Hak Akses--</option>
					<option value="1">Admin</option>
					<option value="0">User</option>
				</select>
			</div>

			<button type="submit" class="btn btn-success" >Simpan</button>
			<button type="reset" class="btn btn-danger" >Reset</button>
			<a href="<?php echo base_url('admin/data_users')?>" class="btn btn-warning">Kembali</a>

		</form>
	</div>
</div>