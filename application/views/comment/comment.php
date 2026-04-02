       <div class="content-wrapper">
        <form action="<?php echo base_url('index.php/Structure/savecomment/'.$this->session->userdata('username'));?>"method="post">
      
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email OR Phone</label>
                  <input type="text" class="form-control"  placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Your Name</label>
                  <input type="text" class="form-control"  placeholder="your name" name="name">
                </div>
                
                <div class="form-group">
                  <label>Textarea</label>
                  <textarea class="form-control" rows="3" placeholder="Enter your comment pls" name="comment"></textarea>
                </div>
               
                  <!-- <input type="hidden" name="sid"  value="<?php echo $short->sid;?>"style="width: 70px">  -->
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Send</button>
              </div>



                <div class="row">
                      <div class="col col-md-2 pull-right">
                        <a class="btn btn-info" href="<?php echo base_url()?>Structure/mange_comment1"><i class="fa  fa-file-pdf-o"></i></a>
                        <a class="btn btn-success" href="#"><i class="fa fa-file-excel-o"></i></a>
                      </div>
                    </div>
            
           
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 25.733px;" aria-label="Browser: activate to sort column ascending">No</th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1"  colspan="1" style="width: 90.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Name</th><th class="sorting_asc" tabindex="0" aria-controls="example1"  colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Email</th><<!-- th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 170.733px;" aria-label="Browser: activate to sort column ascending"><?php echo $this->lang->line('sites_menu');?></th> --><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 101.683px;" aria-label="Platform(s): activate to sort column ascending">Text</th>
                  <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 190.417px;" aria-label="CSS grade: activate to sort column ascending"><?php echo $this->lang->line('action_menu');?></th> --></tr>
                </thead>
                <tbody>
                  <?php 
                  $no=0;
                  foreach ($this->str->getcomment($this->session->userdata('username')) as $row ) {
                    $no++;
                  ?>
                <tr role="row" class="odd">
                  <td ><?php echo $no;?></td>
                  <td><?php echo $row->cname;?></td>
                  <td><?php echo $row->cemail;?></td>
                  <!-- <td><?php echo $row->site_name;?></td> -->
                  <td><?php echo $row->ctext;?></td>
                  
                  <!-- <td>                  
                    <a class="btn  btn-xs btn-success" href="<?php echo base_url('pro_controllers/showcomment/'.$row->id)?>"><i class="fa fa-windows"></i></a>
                    <a class="btn  btn-xs btn-danger" href="<?php echo base_url('pro_controllers/deletecomment1/'.$row->id)?>"onclick="return confirm('Are you sure To Delete This Student ??')"><i class="fa fa-trash"></i></a>
                  </td> -->
                </tr>
                <?php } ?>
              </tbody>
                <!-- <tfoot>
                <tr><th rowspan="1" colspan="1">NO</th><th rowspan="1" colspan="1">Last Name</th><th rowspan="1" colspan="1">First Name</th><th rowspan="1" colspan="1">Class</th><th rowspan="1" colspan="1">Address</th><th rowspan="1" colspan="1">Action</th></tr>
                </tfoot> -->
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
            </form>   


