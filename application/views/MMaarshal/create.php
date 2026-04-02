<div class="content-wrapper">
      <div class="box">
            <div class="row">
                  <div class="col col-md-12">
                        <?php
                        if ($this->session->flashdata('success_msg')) {
                              ?>
                              <div class="alert alert-success">
                                    <?php echo $this->session->flashdata('success_msg'); ?>
                              </div>
                              <?php
                        }
                        if ($this->session->flashdata('error_msg')) {
                              ?>
                              <div class="alert alert-danger">
                                    <?php echo $this->session->flashdata('error_msg'); ?>
                              </div>
                              <?php
                        }
                        ?>
                  </div>
            </div>
      </div>
    
      <button type="button"  data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-plus-square btn btn-primary">Wiirtuu Leenjii Dabali</i>
      </button>
      <h3 class="box-title">Raggaa Wirtuu Leenjii Maarshal artii ittin Guutamuu</h3>

      <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Wirtuu Leenjii Dabali</h4>
                        </div>
                        <div class="modal-body">
                              <form action="<?php echo base_url('Sport/Add_wirtu') ?>"method="post">

                     
                      <!-- select -->
                      <div class="form-group">
                        <label>Maqaa W/Leenjii</label>
                      <input type="text" name="wirtuu" placeholder="-- Maqaa W/Leenjii Galchii --" class="form-control">
                </div>
                      
                                     <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Maqaa Leenjiisaa </label>
                      <input type="text" name="lenjisa" placeholder="-- Maqaa Leenjiisaa  --" class="form-control">

                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Lakkoofsa Bilbilaa </label>
                         <input type="text" name="phone"  placeholder="-- Lakkoofsa Bilbilaa --" class="form-control">

                      </div>
                    </div>

                  </div>
    
                <div class="row">
             

                    <div class="col-sm-6">

                     

                      <div class="form-group">
                        <label>Bara Hunda'ee</label>
                      
                          <input type="date" name="w_dob" id="dob" onchange="ageCount();" class="form-control" />

                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Muuxannoo</label>
                          <input type="text" name="muuxanno" id="Age" placeholder="-- Muuxannoo --" class="form-control">

                         
                      </div>
                    </div>
                  
                    
                    
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Gosa Ispoortii</label>
                      <input type="text" name="sport_type" id="Age" placeholder="-- Age --" class="form-control">

                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>S/saqee</label>
                         <input type="text" name="saqee" id="Age" placeholder="-- S/saqee --" class="form-control">

                      </div>
                    </div>

                  </div>
                 
    

                                    <br>
                                    <label><strong>Bakka Itti Argamu</strong></label><br>
                                   

                                     <div class="row">
                
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Godiina/Magaala</label>
                          <select  class="form-control" name="TeessooG_id" id="zone1" >
                                                             <option value="">-- Select  --</option>
                                                            <?php
                                                            foreach ($this->b->getzone1() as $row) {
                                                                  ?>

                                                                  <option value="<?php echo $row->zid1 ?>"><?php echo $row->zname1; ?></option>
                                                            <?php } ?>
                                                      </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Aanaa</label>
                          <select class="form-control"name="TeessooA_id" id="woreda1" >
                           <option value="">-- Select  --</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Ganda</label>
                          <select class="form-control"name="TeessooK_id" id="kebele1" >
                           <option value="">-- Select  --</option>
                        </select>
                      </div>
                    </div>
                    
</div> 
     <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Bara Eyyeema fudhata</label>
                      <!-- <input type="date" name="sport_type" id="Age" class="form-control"> -->
                      <input type="text" id="popupDatepicker" class="form-control">
                      </div>
                      <div id="inlineDatepicker"></div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Bara haara'ee</label>
                         <!-- <input type="date" name="saqee" id="Age"  class="form-control"> -->
<input type="text" id="popupDatepicker"></p>
<p>Or inline</p>
<div id="inlineDatepicker"></div>
                      </div>
                    </div>

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
            <!-- /.modal -->
  <div class="page-content">
  

            <div class="container-fluid">
     
            <div class="box-body">
                  <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead style="background-color: #666666; color: white">
                              <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 35.733px;" aria-label="Browser: activate to sort column ascending">#</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Zone Name</th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 170.733px;" aria-label="Browser: activate to sort column ascending">Zone Code</th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 101.683px;" aria-label="Platform(s): activate to sort column ascending">Description</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 170.417px;" aria-label="CSS grade: activate to sort column ascending">Action</th></tr>
                        </thead>
                        <tbody>
                              <?php
                              $no = 0;
                              foreach ($this->str->getZone() as $row) {
                                    $no++;
                                    ?>
                                    <tr role="row" class="odd">
                                          <td> <?php echo $no; ?></td>
                                          <td><?php echo $row->zname; ?></td>
                                          <td><?php echo $row->zone_code; ?></td>
                                          <td><?php echo $row->zone_description; ?></td>
                                          <td>
                                                <a class="btn btn-sm btn-danger" href="<?php echo base_url('Structure/Delete_Zone/' . $row->zid) ?>"onclick="return confirm('Are you sure To Delete ?')"><i class="fa fa-trash">Delete</i></a>

                                                <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-default<?php echo $row->zid; ?>" onclick="return confirm('Are you sure To Edit ?')"><i class="fa fa-edit">Edit</i></a>
                                          </td>
                                    </tr>


                              <div class="modal fade" id="modal-default<?php echo $row->zid; ?>">
                                    <div class="modal-dialog">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                      <h4 class="modal-title">Edit Zone</h4>
                                                </div>
                                                <div class="modal-body">
                                                      <form action="<?php echo base_url('Structure/Edit_zone/' . $row->zid) ?>"method="post">
                                                            <label>Zone Name</label><br>
                                                            <input class="form-control input-lg" type="text" value="<?php echo $row->zname; ?>" name="zone_name" placeholder="Zone" required>
                                                            <br>
                                                            <label>Zone Code</label><br>
                                                            <input class="form-control input-lg" type="text" value="<?php echo $row->zone_code; ?>" name="zone_code" placeholder="Zone Code">

                                                            <br>
                                                            <label>Description</label><br>
                                                            <input class="form-control input-lg" type="text" value="<?php echo $row->zone_description; ?>" name="zone_description" placeholder="Description">
                                                            <!--<br>-->


                                                            </div>
                                                            <div class="modal-footer">
                                                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                                  <button type="submit" class="btn btn-primary"><i class="fa fa-edit">   Edit</i></button>
                                                            </div>
                                                      </form>
                                                </div>
                                                <!-- /.modal-content -->
                                          </div>
                                          <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->



                              <?php }
                              ?>
                              </div>
                        </tbody>
                  </table>
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


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>dist/js1/jquery.plugin.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>dist/js1/jquery.calendars.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>dist/js1/jquery.calendars.plus.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>dist/js1/jquery.calendars.picker.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>dist/js1/jquery.calendars.ethiopian.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>dist/js1/jquery.calendars.ethiopian-am.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>dist/js1/jquery.calendars.picker-am.js"></script>

<script>
$(function() {
       var calendar = $.calendars.instance('ethiopian','am');
      $('#popupDatepicker').calendarsPicker({calendar: calendar});
      $('#inlineDatepicker').calendarsPicker({calendar: calendar, onSelect: showDate});
});

function showDate(date) {
      alert('The date chosen is ' + date);
}
</script>