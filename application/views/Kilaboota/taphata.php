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
                              <h4 class="modal-title">Raggaa Taphatootaa Kan ittin Guutamuu</h4>
                        </div>
                        <div class="modal-body">

<form role="form" action="<?php echo base_url('Sport/save_taphata'); ?>" method="Post" enctype="multipart/form-data">


                  <div class="form-group">
                        <label>Maqaa Taphataa</label>
                      <input type="text" name="tpt_name" placeholder="-- Maqaa Taphataa Galchii --" class="form-control">
                </div>
                      
                          
                      <!-- select -->
                   <div class="row">
             
                      <div class="col-sm-6">
                      <div class="form-group">
                        <label>Miindaa Taphataa</label>
                      <input type="text" name="minda" placeholder="-- Miindaa Taphataa  --" class="form-control">
</div> 

                      
                   </div>
                   <div class="col-sm-6">
                      <div class="form-group">
                        <label>Lakkoofsa Bilbilaa </label>
                         <input type="text" name="tpt_phone"   placeholder="-- Lakkoofsa Bilbilaa --" class="form-control">

                      </div>
                </div>
          </div>
                    <div class="row">
             
                      <div class="col-sm-6">
                      <div class="form-group">
                        <label>Bara Waligaltee Mallatteesse </label>
                        <input type="date" name="agreement" class="form-control" />
                        
                      </div>
                </div>
                <div class="col-sm-6">
                    
                         <div class="form-group">
                        <label>Kilabii Taphatu Filii   :</label>
                        
 <select id="multipleSelect" name="kilabi_id" data-search="true" data-silent-initial-value-set="true" >

           <?php foreach ($this->k->getKilabi() as $row){
             ?>

            <option value="<?php echo $row->k_id;?>"><?php echo $row->maqa_kilabi;?></option>
             <?php 
                  } ?>

                   <!-- </datalist> -->
  </select>
                     
                  </div>
            </div>
      </div>


    <div class="row">
  
                 <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label required>Gosa Ispoortii</label>
                  <select id="sporttype"  name="gosasport" class="form-control">

           <?php foreach ($this->k->getSporttype() as $row){
             ?>
            <option value="<?php echo $row->spt_id;?>"><?php echo $row->spt_name;?></option>
             <?php 
                  } ?>
  </select>
                      
                      </div>
                    </div>  

                   <div class="col col-md-6">
                     <div class="form-group">
                        <label>Bakka irra taphatan</label>
                  <select id="positiontap" name="positiontap" class="form-control" >

        
  </select>
                      </div>
                   </div>

          </div>

 <div class="row">
              <div class="col-sm-6">
                        <div class="form-group">
      <label class=" form-control-label">Suura Taphataa</label>
      <input type="file"  name="attachment" id="attachment" class="form-control-file" required>
</div>
</div>
        
     <div class="col-sm-6">
                      <div class="form-group" >
                        <label>Teessoo Wiirtuun Itti argamu</label>
                          <select class="form-control" name="teessoo" required onchange = "java_script_:uu(this.options[this.selectedIndex].value)" >
                                <option value="">-- Magaalaa Ykn Godina Filaadhu  --</option>
                                        <option value="Magaaalaa" >Bulchiinsa Magaalaa</option>
                                        <option value="Godina" >Godina</option>
                                              

                                       </select>
                      </div>
                    </div>

                  </div>
                 
    
     <div class="row">
            
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
                          <select class="form-control" name="woreda_id" id="woreda" >
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
      <h3 class="box-title"><i class="fa fa-plus-square">Odeeffannoo Taphatootaa </i></h3>


<div class="box box-default">
          <div class="box-header with-border">
            <button type="button"  data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-plus-square btn btn-primary">Taphataa  Dabali</i>
      </button>
</div>
           <div class="row">
          <div class="col-md-12">
            <div class="table-responsive table--no-card m-b-30">

           
            <div class="box-body">
                  <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead style="background-color: #666666; color: white">
                              <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 35.733px;" aria-label="Browser: activate to sort column ascending">#</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 50px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Suura Taphataa</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Maqaa Taphataa</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">Miindaa</th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">Bilbila Taphataa</th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Maqaa Kilabii</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Bakka Taphatu</th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Gosa Ispoortii</th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Bara Mallatteese</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Ogeessa</th>



                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">Action</th></tr>
                        </thead>
                        <tbody>
                              <?php
                              $no = 0;
                              foreach ($this->k->gettaphata() as $row) {
                                    $no++;
                                    ?>
                                    <tr role="row" class="odd">
                                          <td> <?php echo $no; ?></td>
                             
                              <td>
                                    <img src="<?= base_url('upload/'.$row->file_name) ?>" height="40px" width="40px">
                              </td>

                                          <td><?php echo $row->tpt_name; ?></td>
                                          <td><?php echo $row->minda; ?></td>
                                          <td><?php echo $row->tpt_phone; ?></td>
                                          <td><?php echo $row->maqa_kilabi; ?></td>
                                          <td><?php echo $row->p_name; ?></td>
                                          <td><?php echo $row->spt_name; ?></td>
                                          <td><?php echo $row->agreement; ?></td>
                                          <td><?php echo $row->operator; ?></td>

                                          <td>
                                                <a class="btn btn-xs btn-success" href="<?php echo base_url('Sport/profiletaphata/'.$row->tpt_id)?>"><i class="fa fa-windows"></i></a>
                                                <a class="btn btn-xs btn-danger" href="<?php echo base_url('Sport/Delete_Taphataa/' . $row->tpt_id ) ?>"onclick="return confirm('Are you sure To Delete ?')"><i class="fa fa-trash"></i></a>

                                                <!--<a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-default<?php echo $row->tpt_id ; ?>" onclick="return confirm('Are you sure To Edit ?')"><i class="fa fa-edit"></i></a>-->
                                          </td>
                                    </tr>


                              <div class="modal fade" id="modal-default<?php echo $row->tpt_id ; ?>">
                                    <div class="modal-dialog">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                      <h4 class="modal-title">Edit Wiirtuu</h4>
                                                </div>
                                                <div class="modal-body">
                                                 <form action="<?php echo base_url('Sport/Edit_wirtu/' . $row->tpt_id ) ?>"method="post">
                                                            
    <!-- select -->
                       <div class="form-group">
                        <label>Maqaa Taphataa</label>
                      <input type="text" name="tpt_name" placeholder="-- Maqaa Taphataa Galchii --" class="form-control">
                </div>
                      
                                     
                      <!-- select -->
                      <div class="form-group">
                        <label>Miindaa Taphataa</label>
                      <input type="text" name="minda" placeholder="-- Miindaa Taphataa  --" class="form-control">
</div>
                      
                   
                      <div class="form-group">
                        <label>Lakkoofsa Bilbilaa </label>
                         <input type="text" name="tpt_phone"   placeholder="-- Lakkoofsa Bilbilaa --" class="form-control">

                      </div>
                    
                      <div class="form-group">
                        <label>Bara Waligaltee Mallatteesse </label>
                        <input type="date" name="agreement" class="form-control" />
                        
                      </div>
                    
                         <div class="form-group">
                        <label>Kilabii Taphatu</label>
                          <input class="form-control" autoComplete="on" list="suggestions" name="kilabi_id" required=""/>
      <datalist id="suggestions">
      <!-- <select class="form-control" name="kilabi_id" required=""> -->
      

           <?php foreach ($this->k->getKilabi() as $row){
             ?>

            <option value="<?php echo $row->k_id;?>"><?php echo $row->maqa_kilabi;?></option>
             <?php 
                  } ?>

                   </datalist>
              
                     
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
             </div></div></div>
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

 <script>
$(document).ready(function(){
 $('#sporttype').change(function(){
  var spt_id = $('#sporttype').val();
  if(spt_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>Sport/fetch_position",
    method:"POST",
    data:{spt_id:spt_id},
    success:function(data)
    {
     $('#positiontap').html(data);
     }
   });
  }
  else
  {
   $('#positiontap').html('<option value="">Bakka Fili</option>');
  }
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


<script type="text/javascript" src="<?php echo base_url();?>dist3/js/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>dist3/js/virtual-select.min.js"></script>

<script type="text/javascript">
    VirtualSelect.init({ 
  ele: '#multipleSelect' 
});
</script>