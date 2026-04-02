
<div class="content-wrapper">
      <div class="box">
           

      </div>
      <div class="box-header">
            <h3 class="box-title"><b>MANAGE NEW MESSAGES </b></h3>

      </div>
 <a class="btn btn-primary" href="<?php echo base_url()?>structure/ipcomment">ADD COMMENT</a>
      
<!-- /.modal -->
<!-- /.box-header -->
<div class="box-body">
      <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            <thead>
                  <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 35.733px;" aria-label="Browser: activate to sort column ascending"><?php echo $this->lang->line('no_menu'); ?></th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 80.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Date</th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 80.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Full Name</th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 80.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Email</th>

                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.733px;" aria-label="Browser: activate to sort column ascending">Subject</th>

                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 141.683px;" aria-label="Platform(s): activate to sort column ascending">User Text</th> 
                        
                        
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 70.733px;" aria-label="Browser: activate to sort column ascending">Author</th>
                          </tr>
            </thead>
            <tbody>
                    <?php
            $no = 0;
            foreach ($this->str->getipcomment() as $row ) {
                  $no++;
                  ?>
                 
                        <tr role="row" class="odd">
                              <td ><?php echo $no; ?></td>
                              <td><?php echo $row->date; ?></td>
                              <td><?php echo $row->fname; ?></td>
                              <td><?php echo $row->email; ?></td>
                              <td><?php echo $row->subject; ?></td>
                               <td><?php echo $row->text; ?></td> 
                              
                              <td><?php echo $row->operator; ?></td>

                              
                              
                        </tr>
                     

               
                        </div>
                  </div>
      </div>

      <!-- /.modal -->

<?php }
?>


</tbody>

<!--<tfoot>
      <tr>
            <th colspan="3">Total</th>
            <th id=""><?php echo $row->sex; ?></th>
      </tr>
</tfoot>-->
</table>
</div>
</div>

<script>
      $(document).ready(function () {
            $('#example').DataTable({
                  dom: 'lBfrtip',
                  buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                  ]
            });
      });
</script>
