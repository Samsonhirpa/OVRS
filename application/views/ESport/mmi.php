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
      

      <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header">
                              
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>

         <h4  class="modal-title callout callout-info"> Raggaa Galii MMI itti Sasaabamuu</h4>
         
          
       
                        </div>
                        <div class="modal-body">
                              <form action="<?php echo base_url('Sport/save_mmi') ?>"method="post">

                     
                      <!-- select -->
                           <div class="row">
        <div class=" col-sm-6">
            <div class="form-group" >
                        <label>Teessoo</label>
                          <select class="form-control" name="teessoo" required onchange = "java_script_:uu(this.options[this.selectedIndex].value)" >
                                <option value="">-- Magaalaa Ykn Godina Filaadhu  --</option>
                                        <option value="Magaaalaa" >Bulchiinsa Magaalaa</option>
                                        <option value="Godina" >Godina</option>
                                              

                                       </select>
                      </div>
              
</div>

                   
                    <div class="col-sm-6">
                      <div class="form-group" id="godiina" style="display: none;">
                        <label>Godiina</label>
                          <select  class="form-control" name="zone" id="zone" >
                                                             <option value="">-- Select  --</option>
                                                            <?php
                                                            foreach ($this->b->getzone() as $row) {
                                                                  ?>

                                                                  <option value="<?php echo $row->zname ?>"><?php echo $row->zname; ?></option>
                                                            <?php } ?>
                                                      </select>
                      </div>
                    </div>
               
                    <div class="col-sm-6">
                      <div class="form-group" id="magaalaa" style="display: none;">
                        <label>Magaalaa</label>
                          <select  class="form-control" name="magala_id" id="city" >
                                                             <option value="">-- Select  --</option>
                                                            <?php
                                                            foreach ($this->b->getcity() as $row) {
                                                                  ?>

                                                                  <option value="<?php echo $row->cname ?>"><?php echo $row->cname; ?></option>
                                                            <?php } ?>
                                                      </select>
                      </div>
                    </div>
         
                    

                  </div>
                  <div class="row">
        <div class=" col-sm-6">
            
                       <div class="form-group">
                        <label>Sadarkaa ittin Galiin Sassaabamee</label>
                          <select  class="form-control" name="level" >
                                                             <option value="">-- Select  --</option>
                                                             <option value="Aanaa">Aanaa</option>
                                                             <option value="Godiina">Godiina</option>
                                                             <option value="Ga'ee Nannoo">Ga'ee Nannoo</option>
                                                           
                                                      </select>
                      </div>
                </div>

                 <div class=" col-sm-6">

                      <div class="form-group">
                        <label>Qaama irra Sassabamee</label>
                          <select  class="form-control" name="qaama" >
                                                             <option value="">-- Select  --</option>
                                                             <option value="Q/Bulaa">Q/Bulaa</option>
                                                             <option value="H/Bulaa">H/Bulaa</option>
                                                     <option value="Ga'ee Nannoo">Daldalaa</option>
                                                     <option value="Ga'ee Nannoo">H/Mootumaa</option>
                                                     <option value="Jirataa Magaalaa">Jirataa Magaalaa</option>
                                                     <option value="Qamolee adda addaa">Qamolee adda addaa</option>
                                                     <option value="Qamolee adda addaa">Bajata Mootumaaa</option>
                                                           
                                                      </select>
                      </div>
                </div>
          </div>

 <div class="row">
        <div class=" col-sm-6">

                      <div class="form-group">
                        <label>Hanga Sassaabamee</label>
                      <input type="number" name="total" placeholder="-- Hanga Sassaabamee --" class="form-control">
                </div>
          </div>

          <div class=" col-sm-6">

                      <div class="form-group">
                        <label>Bara Sassaabamee</label>
                      <input type="number" min="1900" max="2099" step="1" value="2016" name="bara" class="form-control" />
                </div>
          </div>
</div>


 <div class="row">
        <div class=" col-sm-4">
                <div class="form-group">
                        <label>Bajata Mootumaaa</label>
                      <input type="text" name="bajatamotuma" placeholder="-- Bajata Mootumaaa --" class="form-control">
                </div>
             </div> 
        <div class=" col-sm-4">

<div class="form-group">
                        <label>Odiitii</label>
                    
                      <select  class="form-control" name="oditi" >
                                                             <option value="">-- Select  --</option>
                                                             <option value="Ta'eera">Ta'eera</option>
                                                             <option value="Hin Taane">Hin Taane</option>
                               </select>
                </div>
          </div>

          <div class=" col-sm-4">

<div class="form-group">
                        <label>Baayyina Nagahee</label>
                      <input type="number" name="nagahe" placeholder="-- Baayyina Nagahee --" class="form-control">
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
      <h3 class="box-title"><i class="fa fa-plus-square">Odeeffannoo Galii MMI </i></h3>


<div class="box box-default">
          <div class="box-header with-border">
            <button type="button"  data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-plus-square btn btn-primary">Galii MMI Dabali</i>
      </button>
</div>
          
           
            <div class="box-body">
                  <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead style="background-color: #666666; color: white">
                              <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 35.733px;" aria-label="Browser: activate to sort column ascending">#</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Godiina/Magaala</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Sadarkaa irra Sassabamee </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Qaama irra Sassabamee</th>
                                    
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Hanga Sassabamee</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Bara Sassabamee</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Baayyina Nagahee</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Odiitii</th>
                                   
                                   
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Ogeessa</th>


                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">Action</th></tr>
                        </thead>
                        <tbody>
                              <?php
                              $no = 0;
                              foreach ($this->k->getmmi() as $row) {
                                    $no++;
                                    ?>
                                    <tr role="row" class="odd">
                                          <td> <?php echo $no; ?></td>
                                           <td><?php echo $row->zone . ' ' . $row->magala_id  ; ?></td>
                                        
                                          <td><?php echo $row->level; ?></td>
                                          <td><?php echo $row->qaama; ?></td>
                                          <td><?php echo $row->total; ?></td>
                                          <td><?php echo $row->bara; ?></td>
                                          <td><?php echo $row->nagahe; ?></td>
                                          <td><?php echo $row->oditi; ?></td>
                                         
                                          <td><?php echo $row->operator; ?></td>
                                         
                                          <td>
                                                <a class="btn btn-sm btn-danger" href="<?php echo base_url('Sport/Delete_mmi/' . $row->mmi_id) ?>"onclick="return confirm('Are you sure To Delete ?')"><i class="fa fa-trash">Delete</i></a>

                                                <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-default<?php echo $row->mmi_id; ?>" onclick="return confirm('Are you sure To Edit ?')"><i class="fa fa-edit">Edit</i></a>
                                          </td>
                                    </tr>


                              <div class="modal fade" id="modal-default<?php echo $row->mmi_id; ?>">
                                    <div class="modal-dialog">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                      <h4 class="modal-title">Edit Galii MMI</h4>
                                                </div>
                                                <div class="modal-body">
                                                 <form action="<?php echo base_url('Sport/Edit_mmi/' . $row->mmi_id) ?>"method="post">
                         

      
                          
                        
                      
   
 <div class="row">
        <div class=" col-sm-6">
                         <div class="form-group">
                        <label>Sadarkaa ittin Galiin Sassaabamee</label>
                          <select  class="form-control" name="level" >
                                                             <option value="<?php echo $row->level?>"><?php echo $row->level?></option>
                                                             <option value="Aanaa">Aanaa</option>
                                                             <option value="Godiina">Godiina</option>
                                                             <option value="Ga'ee Nannoo">Ga'ee Nannoo</option>
                                                           
                                                      </select>
                      </div>
</div>


        <div class=" col-sm-6">
                      <div class="form-group">
                        <label>Qaama irra Sassabamee</label>
                          <select  class="form-control" name="qaama" >
                                                             <option value="<?php echo $row->qaama?>"><?php echo $row->qaama?></option>
                                                             <option value="Q/Bulaa">Q/Bulaa</option>
                                                             <option value="H/Bulaa">H/Bulaa</option>
                                                     <option value="Ga'ee Nannoo">Daldalaa</option>
                                                     <option value="Ga'ee Nannoo">H/Mootumaa</option>
                                                     <option value="Jirataa Magaalaa">Jirataa Magaalaa</option>
                                                     <option value="Qamolee adda addaa">Qamolee adda addaa</option>
                                                           
                                                      </select>
                      </div>
                    </div>
              </div>
                    <div class="row">
        <div class=" col-sm-6">

                      <div class="form-group">
                        <label>Hanga Sassaabamee</label>
                      <input type="number" name="total" placeholder="-- Hanga Sassaabamee --" class="form-control">
                </div>
          </div>

          <div class=" col-sm-6">

                      <div class="form-group">
                        <label>Bara Sassaabamee</label>
                      <input type="number" min="1900" max="2099" step="1" value="2016" name="bara" class="form-control" />
                </div>
          </div>
</div>
                    
 <div class="row">
        <div class=" col-sm-6">
                <div class="form-group">
                        <label>Bajata Mootumaaa</label>
                      <input type="text" name="bajatamotuma"  class="form-control">
                </div>
             </div> 
        <div class=" col-sm-6">

<div class="form-group">
                        <label>Odiitii</label>
                      <input type="text" name="oditi" placeholder="-- Odiitii --" class="form-control">
                </div>
          </div>
    </div>
                
                      
    
              <div class="col-sm-12">
                                                          
                      <div class="form-group">
                        <label>Godiina/Magaala</label>
                          <select  class="form-control" name="zone" >
                                                             <option value="<?php echo $row->zone; ?>"><?php echo $row->zone; ?></option>
                                                            <?php
                                                            foreach ($this->b->getzone() as $row) {
                                                                  ?>

                                                                  <option value="<?php echo $row->zname ?>"><?php echo $row->zname; ?></option>
                                                            <?php } ?>
                                                      </select>
                      </div>
                       
                    
                           </div>
         

                                                            </div>
                                                            <div class="modal-footer">
                                                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                                  <button type="submit" class="btn btn-primary"><i class="fa fa-edit">   Edit</i></button>
                                                            </div>
                                                    </form>
                                              </div>
                                        </div>
                                  </div>
                            </div>



                              <?php }
                              ?>
                             </tbody>
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
<script type="text/javascript">

      $(document).ready(function () {
            $("#zone").change(function () {
                  var zid = $("#zone").val();
                  // alert(zid);
                  $.ajax({
                        url: '<?php echo base_url(); ?>BDDDDOcontroller/getWoreda',
                        'method': 'post',
                        'data': {zid: zid},
                        'type': 'JSON'
                  }).done(function (woreda) {
                        console.log(woreda);
                        woreda = JSON.parse(woreda);
                        $("#woreda").empty();
                        woreda.forEach(function (woreda) {
                              $("#woreda").append('<option value=' + woreda.woreda_id + '>' + woreda.woreda_name + '</option>');
                        })
                  })
            })

            $("#woreda").change(function () {
                  var tid = $("#woreda").val();
                  $.ajax({
                        url: '<?php echo base_url(); ?>BDDDDOcontroller/getkebele',
                        'method': 'post',
                        'data': {tid: tid},
                        'type': 'JSON'
                  }).done(function (kebele) {
                        console.log(kebele);
                        kebele = JSON.parse(kebele);
                        $("#kebele").empty();
                        kebele.forEach(function (kebele) {
                              $("#kebele").append('<option value=' + kebele.kid + '>' + kebele.kname + '</option>');
                        })
                  })
            })
      })
</script>

<script type="text/javascript">

      $(document).ready(function () {
            $("#zone1").change(function () {
                  var zid = $("#zone1").val();
                  // alert(zid);
                  $.ajax({
                        url: '<?php echo base_url(); ?>BDDDDOcontroller/getWoreda',
                        'method': 'post',
                        'data': {zid: zid},
                        'type': 'JSON'
                  }).done(function (woreda1) {
                        console.log(woreda1);
                        woreda1 = JSON.parse(woreda1);
                        $("#woreda1").empty();
                        woreda.forEach(function (woreda1) {
                              $("#woreda1").append('<option value=' + woreda1.woreda_id + '>' + woreda1.woreda_name + '</option>');
                        })
                  })
            })

            $("#woreda1").change(function () {
                  var tid = $("#woreda1").val();
                  $.ajax({
                        url: '<?php echo base_url(); ?>BDDDDOcontroller/getkebele',
                        'method': 'post',
                        'data': {tid: tid},
                        'type': 'JSON'
                  }).done(function (kebele1) {
                        console.log(kebele1);
                        kebele1 = JSON.parse(kebele1);
                        $("#kebele1").empty();
                        kebele.forEach(function (kebele) {
                              $("#kebele").append('<option value=' + kebele.kid + '>' + kebele.kname + '</option>');
                        })
                  })
            })
      })
</script>
<script>
       function uu(sadarka) {
        if (sadarka == "Godina") {
            
                godiina.style.display = 'block';
               magaalaa.style.display = 'none';
               
            $('#Godina').attr('required', 'required');
            $('#Magaaalaa').attr('required', false);
            $('#dhalotaM_id').val(null); 
            $('#dhalotaKM_id').val(null);
            $('#dhalotaAKM_id').val(null); 
            
            
        } else
            if (sadarka == "Magaaalaa") {
                magaalaa.style.display = 'block';
                godiina.style.display = 'none';
                
               
                $('#Magaaalaa').attr('required', 'required');
                $('#Godina').attr('required', false);
                $('#dhalotaG_id').val(null); 
                $('#dhalotaKA_id').val(null);
                $('#dhalotaK_id').val(null);
                     
           }
           
            else
            if (sadarka == "") {
                godiina.style.display = 'none';
                magaalaa.style.display = 'none';
               
               
               
           }
            else {
                godiina.style.display = 'none';
                magaalaa.style.display = 'none';
               
               
            }

    }
</script>
