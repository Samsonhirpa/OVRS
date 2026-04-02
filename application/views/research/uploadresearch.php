<div class="content-wrapper">
      <div class="col-md-12">
            <div class="box box-primary">
                  <div class="box-header with-border">
                        <h3 class="box-title">Research Upload</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                        <form action="<?php echo base_url('Structure/File_upload') ?>" method="Post" enctype="multipart/form-data">
                              <div class="form-group">
                                    <input name="title" class="form-control" placeholder="Title:">
                              </div>
                              <div class="form-group">
                                    <input class="form-control" name="subject" placeholder="Subject:">
                              </div>
                              <textarea name="detail" id="editor1" class="form-control" placeholder="Detail Here ..."> </textarea>
                              <div class="form-group">
                                    <div class="btn btn-default btn-file">
                                          <i class="fa fa-paperclip"></i> Attachment
                                          <input type="file" name="attachment">
                                    </div>
                                    <p class="help-block">Max. 32MB</p>
                              </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                       
                        <button type="reset" class="btn btn-danger"><i class="fa fa-pencil"></i> Reset</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                  
                  </div> 
                  
                  <!-- /.box-footer -->
            </div>
            </form>
            <!-- /. box -->
      </div>
</div>