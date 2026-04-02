
<div class="content-wrapper">
<div class="box">
  <div class="row">
                 <div class="col col-md-12">
                    <?php
                        if($this->session->flashdata('success_msg'))
                        {
                          ?>
                          <div class="alert alert-success">
                            <?php echo $this->session->flashdata('success_msg');?>
                          </div>
                          <?php
                        }
                        if($this->session->flashdata('error_msg'))
                        {
                          ?>
                          <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('error_msg');?>
                          </div>
                          <?php
                        }
                    ?>
                  </div>
                </div>
                <div class="row">
                      <div class="col col-md-2 pull-right">
                        <a class="btn btn-info" href="<?php echo base_url()?>marketcontroller/manage_employee"><i class="fa  fa-file-pdf-o"></i></a>
                        <a class="btn btn-success" href="#"><i class="fa fa-file-excel-o"></i></a>
                      </div>
                    </div>
            <div class="box-header">
              <h3 class="box-title">List Of Users</h3>
            </div>
            <a class="btn btn-primary" href="<?php echo base_url()?>marketcontroller/add_employee">Add New Useraccount</a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 35.733px;" aria-label="Browser: activate to sort column ascending">No</th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Username</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 170.733px;" aria-label="Browser: activate to sort column ascending">Password</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 101.683px;" aria-label="Platform(s): activate to sort column ascending">Level</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 170.417px;" aria-label="CSS grade: activate to sort column ascending">Action</th></tr>
                </thead>
               
<tbody>
                 <?php 
                $no=0;
                foreach ($this->m->getlistuser() as $row) {
                    $no++;
                    ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $row->username;?></td>
                        <td><?php echo $row->password;?></td>
                        <td><?php echo $row->level;?></td>
                        
                        
                        <td>
                            <a href="<?php echo base_url('marketcontroller/editUser/'.$row->id)?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                            <a href="<?php echo base_url('marketcontroller/showusers/'.$row->id)?>"class="btn btn-sm btn-info"><i class="fa fa-windows"></i></a>
                            <a href="<?php echo base_url('marketcontroller/deleteuser/'.$row->id)?>"class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this item ????')"><i class="fa fa-trash"></i></a>

                        </td>
                    </tr>

               <?php }

                ?>
            </tbody>
                <tfoot>
                <tr><th rowspan="1" colspan="1">no</th><th rowspan="1" colspan="1">username</th><th rowspan="1" colspan="1">password</th><th rowspan="1" colspan="1">level</th><th rowspan="1" colspan="1">Action</th></tr>
                </tfoot>
    </table>
          </div>
      </div>

</div>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>


