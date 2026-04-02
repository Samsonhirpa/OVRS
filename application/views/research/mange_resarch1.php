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
               
                    </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 35.733px;" aria-label="Browser: activate to sort column ascending"><?php echo $this->lang->line('no_menu');?></th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"><?php echo $this->lang->line('filename_menu');?></th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 170.733px;" aria-label="Browser: activate to sort column ascending"><?php echo $this->lang->line('desc_menu');?></th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 101.683px;" aria-label="Platform(s): activate to sort column ascending"><?php echo $this->lang->line('createdby_menu');?></th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 156.217px;" aria-label="Engine version: activate to sort column ascending"><?php echo $this->lang->line('date_menu');?></th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 170.417px;" aria-label="CSS grade: activate to sort column ascending"><?php echo $this->lang->line('action_menu');?></th></tr>
                </thead>
                <tbody>
                  <?php 
                  $no=0;
                  foreach ($this->m->listof_document2($this->session->userdata('username')) as $row ) {
                    $no++;
                  ?>
                <tr role="row" class="odd">
                  <td ><?php echo $no;?></td>
                  <td><?php echo $row->file_name;?></td>
                  <td><?php echo $row->description;?></td>
                  <td><?php echo $row->created_by;?></td>
                  <td><?php echo $row->created_at;?></td>
                  <td>
                      
                          
                          <div class="preview">
            <!-- <embed src="<?php echo base_url().'uploads/'.$row->file_name; ?>" width="80px" height="80px"></div></td>
                        <td>

 <a href="<?php echo base_url('blto_controller/getstudentid/'.$row->id)?>" class="btn btn-sm btn-success"><i class="fa -->

 <a href="<?php echo base_url('marketcontroller/download/'.$row->id)?>" class="btn btn-sm btn-primary">download_<i class="fa fa-download"></i></a>

  <!-- <a class="btn  btn-sm btn-danger" href="<?php echo base_url('marketcontroller/deleteresearch/'.$row->id)?>"onclick="return confirm('Are you sure To Delete This Student ??')">delete_<i class="fa fa-trash"></i></a> -->
<!-- 
        <a href="<?php echo base_url().'files/download/'.$frow['id']; ?>" class="dwn">Download</a> -->
    </div></a>


                        

               <?php }

                ?>
            </tbody>

               
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
