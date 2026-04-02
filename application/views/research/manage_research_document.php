<div class="content-wrapper">
<div class="page-content">
  



<div class="container-fluid">
      <h3 class="box-title"><i class="fa fa-plus-square">Sanadoota Biiroo Dargaggoo fi Ispoortii Oromiyaa</i></h3>


<div class="box box-default">
          <div class="box-headerS with-border">
          <button type="button"  data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-plus-square btn btn-primary">Sanada Dabali</i>
      </button>
          </div>
         
           
      

      <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Unka Sanadni Haaraan Ittin Galmahu</h4>
                        </div>
                        <div class="modal-body">
                              <div class="box-body">
                                    <form action="<?php echo base_url('Structure/File_upload') ?>" method="Post" enctype="multipart/form-data">
                                          <div class="form-group">
                                                <label>Maqaa Sanadaa</label>
                                                <input name="title" class="form-control" placeholder="">
                                          </div>
                                          <div class="form-group">
                                                <label>Gosa Sanadaa</label>
                                                <input class="form-control" name="subject" >
                                          </div>
                                            <div class="form-group">
                                                  <label>Ibsa Sanadaa</label>
                                          <textarea name="detail" id="editor1" class="form-control" placeholder="Ibsa Sanadaa barreessi ..."> </textarea>
                                            </div>
                                          <div class="form-group">
                                                
                                                <div class="btn btn-default btn-file">
                                                      <i class="fa fa-paperclip"></i> Sanada Olka'i
                                                      <input type="file" name="file_name">
                                                </div>
                                                <p class="help-block">Max. 32MB</p>
                                          </div>
                              </div>
                              <!-- /.box-body -->
                              <div class="box-footer">

                                    <button type="reset" class="btn btn-danger"><i class="fa fa-pencil"></i> Haqi</button>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Olkaa'i</button>

                              </div> 

                              <!-- /.box-footer -->
                        </div>
                        </form>
                        <!-- /. box -->
                  </div>
            </div>
            <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
<!-- /.modal -->
<div class="box-body">
       <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            <thead>
                  <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 35.733px;" aria-label="Browser: activate to sort column ascending">Lakk</th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 130.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Maqaa Sanadaa</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Gosa Sanadaa</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 101px;" aria-label="Platform(s): activate to sort column ascending">Ibsa Sanadaa </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">Ogeessa</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.217px;" aria-label="Engine version: activate to sort column ascending">Action</th>
            </thead>
            <tbody>
                  <?php
                  $no = 0;
                  foreach ($this->str->getResearchDocument() as $row) {
                        $no++;
                        ?>
                        <tr role="row" class="odd">
                              <td ><?php echo $no; ?></td>
                              <td><?php echo $row->title; ?></td>
                              <td><?php echo $row->subject; ?></td>
                              <td><?php echo $row->file_name; ?>|
                               <td><?php echo $row->created_by; ?></td>     
                              </td>
                              <td>
                                   
                                    <a class="btn btn-sm btn-danger" href="<?php echo base_url('Sport/deletedoc/'.$row->id)?>"><i class="fa fa-trash"></i></a>
                                    <a href="<?php echo base_url('Structure/download/'.$row->id)?>" class="btn btn-sm btn-primary"><i class="fa fa-download"></i></a>
                              </td>
</tr>
                        <?php }
                        ?>
           </tbody>
     </tr>
</thead>
</table>
</div>
</div>
</div>
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
