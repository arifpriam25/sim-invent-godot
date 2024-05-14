<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
  </div>
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
              <th class="text-center">SKU</th>
              <th class="text-center">Tipe Mobil</th>
              <th class="text-center">Nama Parts</th>
              <th class="text-center">Tanggal</th>

           </tr>
         </thead>
         <tbody>
           <?php $no=1; foreach($list as $data) : ?>
            <tr>
              <td class="text-center"><?php echo $no++ ?></td>
              <td class="text-center"><?php echo $data->sku ?></td>
              <td class="text-center"><?php echo $data->car_type ?></td>
              <td class="text-center"><?php echo $data->parts_name ?></td>
              <td class="text-center"><?php echo $data->spr_at ?></td>
              
            </tr>
          <?php endforeach; ?>
         </tbody>
       </table>
     </div>
   </div>
  </div>
</div>