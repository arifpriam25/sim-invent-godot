<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
  </div>
  <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('admin/data_users/tambah_data') ?>"><i class="fas fa-plus"></i> Tambah User</a>
  <?php echo $this->session->flashdata('pesan')?>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
   <div class="card-body">
     <div class="table-responsive">
       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead class="thead-dark">
           <tr>
              <th class="text-center">No</th>
              <th class="text-center">Nama</th>
              <th class="text-center">Username</th>
              <th class="text-center">Tanggal Daftar</th>
              <th class="text-center">Status</th>
              <th class="text-center">Hak Akses</th>
           </tr>
         </thead>
         <tbody>
           <?php $no=1; foreach($users as $item) : ?>
            <tr>
              <td class="text-center"><?php echo $no++ ?></td>
              <td class="text-center"><?php echo $item->name ?></td>
              <td class="text-center"><?php echo $item->username ?></td>
              <td class="text-center"><?php echo $item->created_at ?></td>
              <td class="text-center">
              <?php if($item->is_active=='1') {
                echo "active";
                } else {
                  echo "Inactive";
                }
              ?>
              </td>
              <td class="text-center">
              <?php if($item->role_id=='1') {
                echo "admin";
                } else {
                  echo "user";
                }
              ?>
              </td>
            </tr>
          <?php endforeach; ?>
         </tbody>
       </table>
     </div>
   </div>
  </div>
</div>