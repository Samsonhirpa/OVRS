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
            <div class="box-header">
            <h3 class="box-title"><b>Number of Children Whose Received Care and Support Services</b></h3>
      </div>

      <button type="button"  data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-plus-square btn btn-primary">Add</i>
      </button>
      <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Add Whose Received Care and Support Services</h4>
                        </div>
                        <div class="modal-body">
                              <form role="form" action="<?php echo base_url('Structure/Save_careandsupport1'); ?>" method="post">
                                    <div class="box-body">

                                          <div class="row">
                                                <div class="col col-md-12">

                                                      <div class="form-group">
                                                            <label for="exampleInputEmail1">Date</label>
                                                            <input type="date" placeholder="-- Enter Date --" name="date" class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                    <label for="exampleInputEmail1">Types of Care and Support Services</label>
                                                  <select class="form-control" name="careandsupporttype">
                                                    <?php 
                                                    foreach ($this->b->getcareandsupporttype() as $row) {
                                                    
                                                   
                                                    ?>

                                                    <option value="<?php echo $row->css_id?>"><?php echo $row->css_name;?></option>
                                  <?php  } ?>
                                                  </select>
                                                  </div>
                                                      <div class="form-group">
                                                            <label for="exampleInputPassword1">Age</label>
                                                            <select class="form-control"name="age_id">
                                                                  <?php
                                                                  foreach ($this->b->getage() as $row) {
                                                                        ?>

                                                                        <option value="<?php echo $row->ag_id ?>"><?php echo $row->age; ?></option>
                                                                  <?php } ?>
                                                            </select>
                                                      </div>


                                                      <label for="exampleInputPassword1">Gender</label>
                                                      <select class="form-control" name="sex" required="">
                                                            <option value="">-- Select  --</option>
                                                            <?php
                                                            foreach ($this->str->getGender() as $row) {
                                                                  ?>
                                                                  <option value="<?php echo $row->gender_id; ?>"><?php echo $row->gender_name; ?></option>
                                                            <?php }
                                                            ?>

                                                      </select>
                                                      



                                                </div>
                                          </div>

                                          <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-save">   Save</i></button>
                                          </div>
                              </form>
                        </div>
                        <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
            </div>
      </div>
</div>

<!-- /.modal -->
<!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 35.733px;" aria-label="Browser: activate to sort column ascending"><?php echo $this->lang->line('no_menu');?></th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Care and support Services</th>

                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 170.733px;" aria-label="Browser: activate to sort column ascending">Age</th>

                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 101.683px;" aria-label="Platform(s): activate to sort column ascending">Gender</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 156.217px;" aria-label="Engine version: activate to sort column ascending">Zone</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 170.733px;" aria-label="Browser: activate to sort column ascending">Woreda</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 170.733px;" aria-label="Browser: activate to sort column ascending">Kebele</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 170.733px;" aria-label="Browser: activate to sort column ascending">Operator</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 170.417px;" aria-label="CSS grade: activate to sort column ascending">Action</th></tr>
                </thead>
                <tbody>
                  <?php 
                  $no=0;
                  foreach ($this->str->getcareandsupport1($this->session->userdata('username')) as $row ) {
                        $no++;
                        ?>
                 
                <tr role="row" class="odd">
                  <td ><?php echo $no;?></td>
                  <td><?php echo $row->css_name;?></td>
                  <td><?php echo $row->age;?></td>
                  <td><?php echo $row->gender_name;?></td>
                  <td><?php echo $row->zname; ?></td>
                  <td><?php echo $row->woreda_name; ?></td>
                  <td><?php echo $row->kname; ?></td>
                  <td><?php echo $row->operator; ?></td>
                  <td>

                    <!-- <a class="btn btn-xs btn-info"href="<?php echo base_url('BDDDDOcontroller/edit_careandsupport/'.$row->id)?>"onclick="return confirm('Are you sure To Edit this info ??')"><i class="fa fa-wrench">edit</i></a> -->
                   <a class="btn btn-sm btn-danger" href="<?php echo base_url('Structure/delete_careandsupport1/'.$row->id)?>"onclick="return confirm('Are you sure To Delete ?')"><i class="fa fa-trash">delete</i></a>

                   <a type="button" class="btn btn-warning"  data-toggle="modal" data-target="#modal-defaultedit<?php echo $row->id ?>">
                                          Edit
                                    </a>
                    


                		</td>
                	</tr>

                  <div class="modal fade" id="modal-defaultedit<?php echo $row->id ?>">
                        <div class="modal-dialog">
                              <div class="modal-content">
                                    <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                          <h4 class="modal-title">Edit</h4>
                                    </div>
                                    <div class="modal-body">
                                          <form role="form" action="<?php echo base_url('Structure/Edit_careandsupport1/'.$row->id); ?>" method="post">
                                                <div class="box-body">

                                                      <div class="row">
                                                            <div class="col col-md-12">

                                                                  <div class="form-group">
                                                                        <label for="exampleInputEmail1">Date</label>
                                                                        <input type="date" value="<?php echo $row->date?>" placeholder="-- Enter Date --" name="date" class="form-control">
                                                                  </div>
                                                                  <div class="form-group">
                                                                        <label for="exampleInputEmail1">Types of Care and Support Services</label>
                                                                        <select class="form-control" name="careandsupporttype">
                                                                              <?php
                                                                              foreach ($this->b->getcareandsupporttype() as $rows) {
                                                                                    ?>

                                                                                    <option value="<?php echo $rows->css_id ?>"<?php if($rows->css_id == $row->css_id) { echo "Selected"; }?>><?php echo $rows->css_name; ?></option>
                                                                              <?php } ?>
                                                                        </select>
                                                                  </div>
                                                                  <div class="form-group">
                                                                        <label for="exampleInputPassword1">Age</label>
                                                                        <select class="form-control"name="age_id">
                                                                              <?php
                                                                              foreach ($this->b->getage() as $rows) {
                                                                                    ?>

                                                                                    <option value="<?php echo $rows->ag_id ?>"<?php if($rows->ag_id == $row->ag_id){ echo "Selected"; }?>><?php echo $rows->age; ?></option>
                                                                              <?php } ?>
                                                                        </select>
                                                                  </div>


                                                                  <label for="exampleInputPassword1">Gender</label>
                                                                  <select class="form-control" name="sex" required="">
                                                                        <option value="">-- Select  --</option>
                                                                        <?php
                                                                        foreach ($this->str->getGender() as $rows) {
                                                                              ?>
                                                                              <option value="<?php echo $rows->gender_id; ?>"<?php if($row->gender_id == $row->sex){ echo "Selected"; }?>><?php echo $rows->gender_name; ?></option>
                                                                        <?php }
                                                                        ?>

                                                                  </select>
                                                                  <!-- <label for="exampleInputPassword1">Kebele</label>
                                                                  <input type="text" value="<?php echo $row->kebele;?>" name="kebele" placeholder="-- Enter Kebele" class="form-control"> -->



                                                            </div>
                                                      </div>

                                                      <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save">   Update</i></button>
                                                      </div>
                                      <input type="hidden" name="datecreated"  class="form-control  style="width: 70px"  value="<?php echo $row->datecreated;?>">


                                          </form>
                                          <p> 
                            <?php echo $this->session->flashdata('error_msg');?>
                          
                        </p>
                                    </div>
                                    <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                        </div>
                  </div>
      </div>

      <!-- /.modal -->

               <?php }

                ?>
            </tbody>

               
            </table>
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
