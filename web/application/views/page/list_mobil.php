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
              <th class="text-center">Tipe Mobil</th>
              <th class="text-center">Actions</th>
           </tr>
         </thead>
         <tbody>
           <?php $no=1; foreach($list as $data) : ?>
            <tr>
              <td class="text-center"><?php echo $no++ ?></td>
              <td class="text-center"><?php echo $data->name ?></td>
              
              <td>
                <center>
                  <a class="btn btn-sm btn-info" href="<?php echo base_url('page/data_mobil/required_parts/'.$data->id) ?>">Required Parts</i></a>
                  <a class="btn btn-sm btn-info" href="<?php echo base_url('page/data_mobil/list_parts/'.$data->id) ?>">List Parts</i></a>
                </center>
              </td>
            </tr>
          <?php endforeach; ?>
         </tbody>
       </table>
     </div>
   </div>
  </div>
</div>