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
               
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                 <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 35.733px;" aria-label="Browser: activate to sort column ascending"><?php echo $this->lang->line('no_menu');?></th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"><?php echo $this->lang->line('fulname_menu');?></th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 101.683px;" aria-label="Platform(s): activate to sort column ascending">Age</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 156.217px;" aria-label="Engine version: activate to sort column ascending"><?php echo $this->lang->line('dor_menu');?></th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 101.683px;" aria-label="Platform(s): activate to sort column ascending">Assesment</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 101.683px;" aria-label="Platform(s): activate to sort column ascending">RX</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 170.417px;" aria-label="CSS grade: activate to sort column ascending"><?php echo $this->lang->line('action_menu');?></th></tr>
                </thead>
                <tbody>
                  <?php 
                  $no=0;
                  foreach ($this->m->getregion() as $row ) {
                    $no++;
                  ?>
                <tr role="row" class="odd">
                  <td ><?php echo $no;?></td>
                  
                  <td><?php echo $row->name;?></td>
                  
                  <td><?php echo $row->age;?></td>
                  <td><?php echo $row->dor;?></td>
                  <td><?php echo $row->assesment;?></td>
                  <td><?php echo $row->rx;?></td>
                  <td>
                    <a class="btn btn-xs btn-info"href="<?php echo base_url('usercontroller/editpatient/'.$row->id)?>"><i class="fa fa-wrench">edit</i></a>
                    <a class="btn btn-xs btn-success" href="<?php echo base_url('usercontroller/show_hori_fooyyaha/'.$row->id)?>"><i class="fa fa-windows">detail</i></a>
                    <a class="btn btn-xs btn-danger" href="<?php echo base_url('usercontroller/deletepatient/'.$row->id)?>"onclick="return confirm('Are you sure To Delete This Student ??')"><i class="fa fa-trash">delete</i></a>
                   
                  </td>
                </tr>
                <?php } ?>
              </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
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





