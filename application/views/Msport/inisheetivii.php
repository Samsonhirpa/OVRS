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
                              <h4 class="modal-title">Inisheetivii Bakka Olmaa Ispoortii </h4>
                        </div>
                        <div class="modal-body">
                              <form action="<?php echo base_url('Sport/save_inisheetivii') ?>"method="post" enctype="multipart/form-data">

                     
                  
                    
      <div class="row">
        <div class=" col-xs-12 col-lg-12">
            <div class="form-group" >
                        <label>Teessoo</label>
                          <select class="form-control" name="teessoo" required onchange = "java_script_:uu(this.options[this.selectedIndex].value)" >
                                <option value="">-- Magaalaa Ykn Godina Filaadhu  --</option>
                                        <option value="Magaaalaa" >Bulchiinsa Magaalaa</option>
                                        <option value="Godina" >Godina</option>
                                              

                                       </select>
                      </div>
              
</div>

                   
                    <div class="col-sm-4">
                      <div class="form-group" id="godiina" style="display: none;">
                        <label>Godiina</label>
                          <select  class="form-control" name="zone_id" id="zone" >
                                                             <option value="">-- Select  --</option>
                                                            <?php
                                                            foreach ($this->b->getzone() as $row) {
                                                                  ?>

                                                                  <option value="<?php echo $row->zid ?>"><?php echo $row->zname; ?></option>
                                                            <?php } ?>
                                                      </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group" id="aanaa" style="display: none;">
                        <label>Aanaa</label>
                          <select class="form-control"name="woreda_id" id="woreda" >
                           <option value="">-- Select  --</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group" id="ganda" style="display: none;">
                        <label>Ganda</label>
                          <select class="form-control"name="ganda_id" id="kebele" >
                           <option value="">-- Select  --</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group" id="magaalaa" style="display: none;">
                        <label>Magaalaa</label>
                          <select  class="form-control" name="magala_id" id="city" >
                                                             <option value="">-- Select  --</option>
                                                            <?php
                                                            foreach ($this->b->getcity() as $row) {
                                                                  ?>

                                                                  <option value="<?php echo $row->cid ?>"><?php echo $row->cname; ?></option>
                                                            <?php } ?>
                                                      </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group" id="kmagaalaa" style="display: none;">
                        <label>Kutaa Magaalaa</label>
                          <select class="form-control"name="kmagala_id" id="subcity" >
                           <option value="">-- Select  --</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group" id="akmagaalaa" style="display: none;">
                        <label>Aanaa Kutaa Magaalaa</label>
                          <select class="form-control"name="akmagala_id" id="subcitywd" >
                           <option value="">-- Select  --</option>
                        </select>
                      </div>
                    </div>
                    

                  </div>
  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Maqaa Iddoo addaa itti argamuu </label>
                      <input type="text" name="uni_name" placeholder="-- Maqaa Maqaa Iddoo addaa itti argamuu --" class="form-control">
                </div>
                    </div>
                    <div class="col-sm-6">
                     <div class="form-group">
                        <label>Bal’ina karee meetiraan /heektaraan/ </label>
                      <input type="text" name="hektara" placeholder="-- Bal’ina Heektaraan Galchii --" class="form-control">
                </div>
                    </div>
                   

                  </div>
                    
       
                        <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Saayiit pilaanii fi ragaa qabiyye </label>
                       <select  class="form-control" name="qabiyye" required>
                                                             <option value="">-- Select  --</option>
                                                    <option value="Qabaa">Qabaa</option>
                                                    <option value="Hin qabu">Hin qabu</option>
                                                            
                                                           
                                                      </select>

                      </div>
                    </div>
                    <div class="col-sm-6">
                     <div class="form-group">
                        <label>Dhimma barbaachiseef oolaa jiraa?</label>
                      
                           <select  class="form-control" name="hala" required>
                            <option value="">-- Select  --</option>
                            <option value="Eyyee">Eyyee</option>
                            <option value="Lakki">Lakki</option>
                                                                                                                   
                                                      </select>
                      </div>
                    </div>
                   

                  </div>

                

<div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Bara</label>
                      <input type="date" name="bara" placeholder="-- Bara --" class="form-control">
                </div>
                    </div>

                      <div class="col-sm-6">
                        <div class="form-group">
      <label class=" form-control-label">Sanada Olkaa'i</label>
      <input type="file"  name="attachment" id="attachment" class="form-control-file" required>
</div>
</div>
                 
                   

                  </div>
 
                     <div class="form-group">
                        <label>Yaada dabalataa</label>
                      <input type="text" name="yada"  placeholder="-- Yaada dabalataa --" class="form-control">
                       
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
      <h3 class="box-title"><i class="fa fa-plus-square">Inisheetivii Bakka Olmaa Ispoortii Heektara tokko ganda tokkoof jedhu  Oromiyaa keessatti argaman</i></h3>


<div class="box box-default">
          <div class="box-header with-border">
            <button type="button"  data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-plus-square btn btn-primary">Inisheetivii Bakka Olmaa Ispoortii Dabali</i>
      </button>
</div>
          
           
            <div class="box-body">
                  <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead style="background-color: #666666; color: white">
                              <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 35.733px;" aria-label="Browser: activate to sort column ascending">#</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">Teessoo</th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Godina/Magaala</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Aanaa/Kutaa Magaalaa</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Ganda/Aanaa Kutaa Magaalaa</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Maqaa Addaa</th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 80px;" aria-label="Browser: activate to sort column ascending">Heektaara</th>
                                   
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">Ragaa qabiyyee </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">Bara </th>
                                    
                             
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Ogeessa</th>


                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">Action</th></tr>
                        </thead>
                        <tbody>
                              <?php
                              $no = 0;
                              foreach ($this->k->getinisheetivii() as $row) {
                                    $no++;
                                    ?>
                                    <tr role="row" class="odd">
                                          <td> <?php echo $no; ?></td>
                                           <td><?php echo $row->teessoo; ?></td>
                                         <td><?php echo $row->zname . ' ' . $row->cname  ; ?></td>
                                          <td><?php echo $row->woreda_name. ' ' . $row->subcity_name; ?></td>
                                          <td><?php echo $row->kname. ' ' . $row->sbw_name; ?></td>
                                          <td><?php echo $row->uni_name; ?></td>
                                          <td><?php echo $row->hektara; ?></td>
                                          <td><?php echo $row->qabiyye; ?></td>
                                          <td><?php echo $row->bara; ?></td>
                                         
                                         <td><?php echo $row->operator; ?></td>
                                         
                                          <td>
                                           
      <a href="<?php echo base_url().'Sport/downloadfile/'.$row->ins_id; ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-download-alt"></a>
                                                <a class="btn btn-sm btn-danger" href="<?php echo base_url('Sport/Delete_inisheetivii/' . $row->ins_id) ?>"onclick="return confirm('Are you sure To Delete ?')"><i class="fa fa-trash"></i></a>

                                            
                                          </td>
                                    </tr>





                              <?php }
                              ?>
                             </tbody>
                       </table>
                 </div>
           </div>
     </div>
</div>
</div>

<script type="text/javascript">
  function ageval() {
               var res = document.getElementById("age").value;

               if (res<14 || res > 35)
                   alert("Dargaggoo waggaa 14 Olii fi 35 gadii qofa galchaa Maaloo! ");
             return false;

           }
      
   </script>
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
                              $("#kebele").append('<option value=' + kebele.kid + '">' + kebele.kname + '</option>');
                        })
                  })
            })
      })
</script>

<script type="text/javascript">

      $(document).ready(function () {
            $("#city").change(function () {
                  var ctid = $("#city").val();
                  // alert(zid);
                  $.ajax({
                        url: '<?php echo base_url(); ?>BDDDDOcontroller/getsubcity',
                        'method': 'post',
                        'data': {ctid: ctid},
                        'type': 'JSON'
                  }).done(function (subcity) {
                        console.log(subcity);
                        subcity = JSON.parse(subcity);
                        $("#subcity").empty();
                        subcity.forEach(function (subcity) {
                              $("#subcity").append('<option value=' + subcity.subcity_id + '>' + subcity.subcity_name + '</option>');
                        })
                  })
            })

            $("#subcity").change(function () {
                  var sbid = $("#subcity").val();
                  $.ajax({
                        url: '<?php echo base_url(); ?>BDDDDOcontroller/getsubcitywrd',
                        'method': 'post',
                        'data': {sbid: sbid},
                        'type': 'JSON'
                  }).done(function (subcitywd) {
                        console.log(subcitywd);
                        subcitywd = JSON.parse(subcitywd);
                        $("#subcitywd").empty();
                        subcitywd.forEach(function (subcitywd) {
                              $("#subcitywd").append('<option value=' + subcitywd.sbw_id + '">' + subcitywd.sbw_name + '</option>');
                        })
                  })
            })
      })
</script>


<script type="text/javascript">

      $(document).ready(function () {
            $("#zone1").change(function () {
                  var zid1 = $("#zone1").val();
                  // alert(zid);
                  $.ajax({
                        url: '<?php echo base_url(); ?>BDDDDOcontroller/getWoredat',
                        'method': 'post',
                        'data': {zid1: zid1},
                        'type': 'JSON'
                  }).done(function (woreda1) {
                        console.log(woreda1);
                        woreda1 = JSON.parse(woreda1);
                        $("#woreda1").empty();
                        woreda1.forEach(function (woreda1) {
                              $("#woreda1").append('<option value=' + woreda1.woreda1_id + '>' + woreda1.woreda1_name + '</option>');
                        })
                  })
            })

            $("#woreda1").change(function () {
                  var tid1 = $("#woreda1").val();
                  $.ajax({
                        url: '<?php echo base_url(); ?>BDDDDOcontroller/getkebelet',
                        'method': 'post',
                        'data': {tid1: tid1},
                        'type': 'JSON'
                  }).done(function (kebele1) {
                        console.log(kebele1);
                        kebele1 = JSON.parse(kebele1);
                        $("#kebele1").empty();
                        kebele1.forEach(function (kebele1) {
                              $("#kebele1").append('<option value=' + kebele1.kid1 + '">' + kebele1.kname1 + '</option>');
                        })
                  })
            })
      })
</script>


<script>
       function uu(sadarka) {
        if (sadarka == "Godina") {
            
                godiina.style.display = 'block';
                aanaa.style.display = 'block';
                ganda.style.display = 'block';
                magaalaa.style.display = 'none';
                kmagaalaa.style.display = 'none';
                akmagaalaa.style.display = 'none';
             
            $('#Godina').attr('required', 'required');
            $('#Magaaalaa').attr('required', false);
            $('#dhalotaM_id').val(null); 
            $('#dhalotaKM_id').val(null);
            $('#dhalotaAKM_id').val(null); 
            
            
        } else
            if (sadarka == "Magaaalaa") {
                magaalaa.style.display = 'block';
                kmagaalaa.style.display = 'block';
                akmagaalaa.style.display = 'block';
                godiina.style.display = 'none';
                aanaa.style.display = 'none';
                ganda.style.display = 'none';
                
               
                $('#Magaaalaa').attr('required', 'required');
                $('#Godina').attr('required', false);
                $('#dhalotaG_id').val(null); 
                $('#dhalotaKA_id').val(null);
                $('#dhalotaK_id').val(null);
                     
           }
           
            else
            if (sadarka == "") {
                godiina.style.display = 'none';
                aanaa.style.display = 'none';
                ganda.style.display = 'none';
                magaalaa.style.display = 'none';
                kmagaalaa.style.display = 'none';
                akmagaalaa.style.display = 'none';
                
               
               
           }
            else {
                godiina.style.display = 'none';
                aanaa.style.display = 'none';
                ganda.style.display = 'none';
                magaalaa.style.display = 'none';
                kmagaalaa.style.display = 'none';
                akmagaalaa.style.display = 'none';
               
               
            }

    }
</script>
