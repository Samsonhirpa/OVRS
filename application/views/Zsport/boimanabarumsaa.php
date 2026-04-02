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
                              <h4 class="modal-title">Bakka olmaa Ispoortii Dhaabbilee Barnoota</h4>
                        </div>
                        <div class="modal-body">
                              <form action="<?php echo base_url('ZoneSport/save_boimb') ?>"method="post">

                     
                      <!-- select -->
                      <div class="form-group">
                        <label>Maqaa Mana Barumsaa  </label>
                      <input type="text" name="mn_name" placeholder="-- Maqaa Guutuu Galchii --" class="form-control">
                </div>
                      
                                     <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Abbummaa M/Barumsichaa</label>
                       <select  class="form-control" name="qabeenya" required>
                                                             <option value="">-- Select  --</option>
                                                             <option value="Dhunfaa">Dhunfaa</option>
                                                             <option value="Mootummaa">Mootummaa</option>
                                                            
                                                           
                                                      </select>

                      </div>
                    </div>
                    <div class="col-sm-6">
                     <div class="form-group">
                        <label>Sadarkaa Mana Barumsichaa</label>
                      
   <select id="multipleSelect"  name="sbarnota" data-search="true" data-silent-initial-value-set="true" >
                        <option value="">-- Sadarkaa Fili  --</option>
                        <option value="Tokkoffaa">Tokkoffaa</option>
                        <option value="Jidduu galeessa">Jidduu galeessa  </option>
                        <option value="Olaana">Olaana</option>
                        <option value="Kolleejjii">Kolleejjii</option>
                        <option value="Yuuniversitii">Yuuniversitii</option>
                                                           
                                                      </select>

                      </div>
                    </div>
                   

                  </div>
        <div class="row">
            

                     <div class="col-sm-6">
                      <div class="form-group">
                     
                  <label>Gosa Ispoortii</label>
   <select id="multipleSelect" multiple name="type" data-search="true" data-silent-initial-value-set="true" required>

           <option value="">-- Select  --</option>
           <?php foreach ($this->k->getSporttype() as $row){
             ?>
            <option value="<?php echo $row->spt_name;?>"><?php echo $row->spt_name;?></option>
             <?php 
                  } ?>
  </select>

                      </div>

                    </div>

                    <div class="col-sm-6">
         <div class="form-group">
                        <label>Bal’ina Heektara (kaaremetriin)</label>
                      
                          <input type="text" name="hektara" placeholder="-- Bal’ina Heektara (kaaremetriin) --"  class="form-control" />

                      </div>
                    </div>
                  </div>

                
    
   <div class="row">
     <div class="col-sm-6">
                      <div class="form-group">
                        <label>Bara Tajaajila Jalqabe </label>
                      
                          <input type="date" name="bara" class="form-control">
                      </div>
                    </div>
        <div class="col-sm-6">
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
                          <select class="form-control"name="akmagala_id" id="subcity_woreda" >
                           <option value="">-- Select  --</option>
                        </select>
                      </div>
                    </div>
                    

                  </div>

<div class="row">

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Iddoo addaa itti argamuu </label>
                        <input type="text" name="iddoo" placeholder="-- Iddoo addaa itti argamuu --" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Ibsa dabalataa</label>
                        <input type="text" name="yada"  placeholder="-- Yaada dabalataa --" class="form-control">

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
      <h3 class="box-title"><i class="fa fa-plus-square">Odeeffannoo Bakka olmaa Ispoortii Dhaabbilee Barnoota (Mana Barumsaa ) keessatti  argaman</i></h3>


<div class="box box-default">
          <div class="box-header with-border">
            <button type="button"  data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-plus-square btn btn-primary">BOI Mana Barnoota Dabali</i>
      </button>
</div>
          
           
            <div class="box-body">
                  <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead style="background-color: #666666; color: white">
                              <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 35.733px;" aria-label="Browser: activate to sort column ascending">#</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Maqaa Mana Barumsaa</th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 80px;" aria-label="Browser: activate to sort column ascending">Qabeenya</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 80px;" aria-label="Browser: activate to sort column ascending">Sadarkaa Mana Bursumsa  </th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 80px;" aria-label="Platform(s): activate to sort column ascending">Gosa Ispoorti hammatu</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90px;" aria-label="Platform(s): activate to sort column ascending">Bal’ina Heektara (kaaremetriin)</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Godina/Magaala</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Aanaa</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Ganda</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Iddoo addaa</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Bara Jalqabe</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Ogeessa</th>


                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">Action</th></tr>
                        </thead>
                        <tbody>
                              <?php
                              $no = 0;
                              foreach ($this->zk->getboimn() as $row) {
                                    $no++;
                                    ?>
                                    <tr role="row" class="odd">
                                          <td> <?php echo $no; ?></td>
                                          <td><?php echo $row->mn_name; ?></td>
                                          <td><?php echo $row->qabeenya; ?></td>
                                          <td><?php echo $row->sbarnota; ?></td>
                                          <td><?php echo $row->type; ?></td>
                                          <td><?php echo $row->hektara; ?></td>
                                          <td><?php echo $row->zname . ' ' . $row->cname  ; ?></td>
                                          <td><?php echo $row->woreda_name. ' ' . $row->subcity_name; ?></td>
                                          <td><?php echo $row->kname. ' ' . $row->sbw_name; ?></td>
                                         <td><?php echo $row->iddoo; ?></td>
                                         <td><?php echo $row->bara; ?></td>
                                         <td><?php echo $row->operator; ?></td>
                                         
                                          <td>
                                                <a class="btn btn-sm btn-danger" href="<?php echo base_url('ZoneSport/Delete_boimb/' . $row->mb_id) ?>"onclick="return confirm('Are you sure To Delete ?')"><i class="fa fa-trash"></i></a>

                                                <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-default<?php echo $row->mb_id; ?>" onclick="return confirm('Are you sure To Edit ?')"><i class="fa fa-edit"></i></a>
                                          </td>
                                    </tr>


                              <div class="modal fade" id="modal-default<?php echo $row->mb_id; ?>">
                                    <div class="modal-dialog">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                      <h4 class="modal-title">Edit Wiirtuu</h4>
                                                </div>
                                                <div class="modal-body">
                                                 <form action="<?php echo base_url('ZoneSport/Edit_boimb/' . $row->mb_id) ?>"method="post">
                                                           
                      <div class="form-group">
                        <label>Maqaa Mana Barumsaa  </label>
                      <input type="text" name="mn_name" placeholder="-- Maqaa Guutuu Galchii --" class="form-control">
                </div>
                      
                                     <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Qabeenya</label>
                       <select  class="form-control" name="qabeenya" required>
                                                             <option value="">-- Select  --</option>
                                                             <option value="Dhunfaa">Dhunfaa</option>
                                                             <option value="Mootummaa">Mootummaa</option>
                                                            
                                                           
                                                      </select>

                      </div>
                    </div>
                    <div class="col-sm-6">
                     <div class="form-group">
                        <label>Sadarkaa Mana Bursumsa</label>
                      
                           <select  class="form-control" name="sbarnota"  >
                        <option value="">-- Sadarkaa Fili  --</option>
                        <option value="Tokkoffaa">Tokkoffaa</option>
                        <option value="Jidduu galeessa">Jidduu galeessa  </option>
                        <option value="Olaana">Olaana</option>
                        <option value="Kolleejjii">Kolleejjii</option>
                                                         </select>

                      </div>
                    </div>
                   

                  </div>
        <div class="row">
            

                     <div class="col-sm-6">
                      <div class="form-group">
                     
                  <label>Gosa Ispoortii</label>
  <select class="form-control" name="type" required="">
           <option value="">-- Select  --</option>
           <?php foreach ($this->k->getSporttype() as $row){
             ?>
            <option value="<?php echo $row->spt_name;?>"><?php echo $row->spt_name;?></option>
             <?php 
                  } ?>
  </select>

                      </div>

                    </div>

                    <div class="col-sm-6">
         <div class="form-group">
                        <label>Bal’ina Heektara (kaaremetriin)</label>
                      
                          <input type="text" name="hektara" placeholder="-- Bal’ina Heektara (kaaremetriin) --"  class="form-control" />

                      </div>
                    </div>
                  </div>

                
    

                                    <br>
                                    <label><strong>Bakka Itti Argamu</strong></label><br>
                                   

                                     <div class="row">
                
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Godiina/Magaala</label>
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
                      <div class="form-group">
                        <label>Aanaa</label>
                          <select class="form-control"name="woreda_id" id="woreda" >
                           <option value="">-- Select  --</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Ganda</label>
                          <select class="form-control"name="ganda_id" id="kebele" >
                           <option value="">-- Select  --</option>
                        </select>
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

<script>
$(document).ready(function(){
 $('#zone').change(function(){
  var zid = $('#zone').val();
  if(zid != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>Sport/fetch_state",
    method:"POST",
    data:{zid:zid},
    success:function(data)
    {
     $('#woreda').html(data);
     $('#kebele').html('<option value="">Aanaa Fili</option>');
    }
   });
  }
  else
  {
   $('#woreda').html('<option value="">Aanaa Fili</option>');
   $('#kebele').html('<option value="">Ganda Fili</option>');
  }
 });

 $('#woreda').change(function(){
  var woreda_id = $('#woreda').val();
  if(woreda_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>Sport/fetch_city",
    method:"POST",
    data:{woreda_id:woreda_id},
    success:function(data)
    {
     $('#kebele').html(data);
    }
   });
  }
  else
  {
   $('#kebele').html('<option value="">Ganda Fili</option>');
  }
 });
 
});
</script>

<script>
$(document).ready(function(){
 $('#city').change(function(){
  var cid = $('#city').val();
  if(cid != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>Sport/fetch_subcity",
    method:"POST",
    data:{cid:cid},
    success:function(data)
    {
     $('#subcity').html(data);
     $('#subcity_woreda').html('<option value="">Aanaa K/M Fili</option>');
    }
   });
  }
  else
  {
   $('#subcity').html('<option value="">Kutaa Magaalaa Fili</option>');
   $('#subcity_woreda').html('<option value="">A/K/M Fili</option>');
  }
 });

 $('#subcity').change(function(){
  var subcity_id = $('#subcity').val();
  if(subcity_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>Sport/fetch_subcitywd",
    method:"POST",
    data:{subcity_id:subcity_id},
    success:function(data)
    {
     $('#subcity_woreda').html(data);
    }
   });
  }
  else
  {
   $('#subcity_woreda').html('<option value="">Aanaa  Fili</option>');
  }
 });
 
});
</script>

<script type="text/javascript" src="<?php echo base_url();?>dist3/js/jquery.min.js"></script>

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
<script type="text/javascript" src="<?php echo base_url();?>dist3/js/virtual-select.min.js"></script>

<script type="text/javascript">
    VirtualSelect.init({ 
  ele: '#multipleSelect' 
});
</script>