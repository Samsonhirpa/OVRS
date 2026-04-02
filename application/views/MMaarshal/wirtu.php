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
                              <h4 class="modal-title">Raggaa Wirtuu Leenjii Maarshal artii ittin Guutamuu</h4>
                        </div>
                        <div class="modal-body">
                              <form action="<?php echo base_url('MSport/save_wirtu') ?>"method="post">

                     
                      <!-- select -->
                      <div class="row">
                    <div class="col-sm-6">
                       <div class="form-group">
                        <label>Maqaa W/Leenjii</label>
                      <input type="text" name="wirtuu" placeholder="-- Maqaa W/Leenjii Galchii --" class="form-control">
                </div>
              </div>
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Gosa Ispoortii Maarshal artii</label>

  <select class="form-control" name="sport_type" required="">
        <option value="">-- Select  --</option>
                        <option value="W/Teekuwaandoo">W/Teekuwaandoo</option>
                        <option value="Kaaraatee">Kaaraatee</option>
                        <option value="Wushuu">Wushuu</option>
                        <option value="ETA">ETA</option>
                        <option value="EITA">EITA</option>
                        <option value="EUTA">EUTA</option>
                        <option value="Juudoo">Juudoo</option>
                        <option value="Jitikundoo ">Jitikundoo </option>
       
  </select>


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
                        <label>Bara haara'ee</label>
                       <input type="number" min="2000" max="2099" step="1" value="2017" name="licenserenew" id="licenserenew" class="form-control" />

                      </div>
                    </div>

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
                         <input type="text" name="l_phone"   placeholder="-- Lakkoofsa Bilbilaa --" class="form-control">

                      </div>
                    </div>

                  </div>
    
                <div class="row">
             

                    <div class="col-sm-6">

                      <div class="form-group">
                        <label>Bara Eyyeema fudhate</label>
                      <input type="date" name="licensereg"  class="form-control">

                      </div>

                            </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Muuxannoo Leenjisaa</label>
                          <input type="text" name="muuxanno" id="Age" placeholder="-- Muuxannoo --" class="form-control">

                         
                      </div>
                    </div>
                  
                    
                    
                  </div>

              <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Sad. Ogummaa Leenjisummaa</label>

  <select class="form-control" name="sadlenji" required="">
        <option value="">-- Select  --</option>
                        <option value="DAN 1ffaa">DAN 1ffaa</option>
                        <option value="DAN 2ffaa">DAN 2ffaa</option>
                        <option value="DAN 3ffaa">DAN 3ffaa</option>
                        <option value="DAN 4ffaa">DAN 4ffaa</option>
                        <option value="DAN 5ffaa">DAN 5ffaa</option>
                        <option value="DAN 6ffaa">DAN 6ffaa</option>
                        <option value="DAN 7ffaa">DAN 7ffaa</option>
                        <option value="DAN 8ffaa">DAN 8ffaa</option>
                        <option value="DAN 9ffaa">DAN 9ffaa</option>
                        <option value="DAN 10ffaa">DAN 10ffaa</option>
       
  </select>


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
                          <select  class="form-control" name="wzone_id" id="zone" >
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
                          <select class="form-control"name="wworeda_id" id="woreda" >
                           <option value="">-- Select  --</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group" id="ganda" style="display: none;">
                        <label>Ganda</label>
                          <select class="form-control"name="wkebele_id" id="kebele" >
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
      <h3 class="box-title"><i class="fa fa-plus-square">Odeeffannoo Wirtuu Leenjii Maarshal artii</i></h3>


<div class="box box-default">
          <div class="box-header with-border">
            <button type="button"  data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-plus-square btn btn-primary">Wiirtuu Leenjii Dabali</i>
      </button>
</div>
          
           
            <div class="box-body">
                  <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead style="background-color: #666666; color: white">
                              <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20.733px;" aria-label="Browser: activate to sort column ascending">#</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Maqaa W/Leenjii</th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Maqaa Leenjisa</th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">Bilbila Leenjisa</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Gosa Ispoortii</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Bara Hundaa'e</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Bara Hara'e</th>
 <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Ogeessa</th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 80px;" aria-label="CSS grade: activate to sort column ascending">Action</th></tr>
                        </thead>
                        <tbody>
                              <?php
                              $no = 0;
                              foreach ($this->mk->getwirtu() as $row) {
                                    $no++;
                                    ?>
                                    <tr role="row" class="odd">
                                          <td> <?php echo $no; ?></td>
                                          <td><?php echo $row->wirtuu; ?></td>
                                          <td><?php echo $row->lenjisa; ?></td>
                                          <td><?php echo $row->l_phone; ?></td>
                                          <td><?php echo $row->sport_type; ?></td>
                                          <td><?php echo $row->w_dob; ?></td>

                                          <td><?php echo $row->licenserenew; ?></td>
                                          <td><?php echo $row->operator; ?></td>
                                          <td>
                                                <a class="btn btn-sm btn-danger" href="<?php echo base_url('MSport/Delete_wirtu/' . $row->w_id) ?>"onclick="return confirm('Are you sure To Delete ?')"><i class="fa fa-trash">Balleessi</i></a>

                                                <!--<a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-default<?php echo $row->w_id; ?>" onclick="return confirm('Are you sure To Edit ?')"><i class="fa fa-edit">Edit</i></a>-->
                                          </td>
                                    </tr>


                              <div class="modal fade" id="modal-default<?php echo $row->w_id; ?>">
                                    <div class="modal-dialog">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                      <h4 class="modal-title">Edit Wiirtuu</h4>
                                                </div>
                                                <div class="modal-body">
                                                 <form action="<?php echo base_url('MSport/Edit_wirtu/' . $row->w_id) ?>"method="post">
                                                             <div class="form-group">
                        <label>Maqaa W/Leenjii</label>
                      <input type="text" name="wirtuu" value="<?php echo $row->wirtuu; ?>" class="form-control">
                </div>
                      
                                     <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Maqaa Leenjiisaa </label>
                      <input type="text" name="lenjisa" value="<?php echo $row->lenjisa; ?>" class="form-control">

                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Lakkoofsa Bilbilaa </label>
                         <input type="text" name="l_phone"  value="<?php echo $row->l_phone; ?>" class="form-control">

                      </div>
                    </div>

                  </div>
    
                <div class="row">
             

                    <div class="col-sm-6">

                     

                      <div class="form-group">
                        <label>Bara Hunda'ee</label>
                      
                          <input type="date" name="w_dob" value="<?php echo $row->w_dob; ?>" id="dob" onchange="ageCount();" class="form-control" />

                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Muuxannoo</label>
                          <input type="text" name="muuxanno" id="Age" value="<?php echo $row->muuxanno; ?>" class="form-control">

                         
                      </div>
                    </div>
                  
                    
                    
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Gosa Ispoortii</label>
                      <input type="text" name="sport_type" id="Age" value="<?php echo $row->sport_type; ?>" class="form-control">

                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>S/saqee</label>
                         <input type="text" name="saqee" id="Age" value="<?php echo $row->saqee; ?>" class="form-control">

                      </div>
                    </div>

                  </div>      
                      <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Bara Eyyeema fudhata</label>
                      <input type="date" name="licensereg" id="Age" value="<?php echo $row->licensereg; ?>" class="form-control">

                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Bara haara'ee</label>
                         <input type="date" name="licenserenew" id="Age" value="<?php echo $row->licenserenew; ?>" class="form-control">

                      </div>
                    </div>

                  </div>
               
                 
    

                                    <br>
                                    <label><strong>Bakka Itti Argamu</strong></label><br>
                                   

                                     <div class="row">
                
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Godiina/Magaala</label>
                          <select  class="form-control" name="wzone_id" id="zone1" >
                                                             <option value="">-- fili --</option>
                                                            <?php
                                                            foreach ($this->b->getzone11() as $row) {
                                                                  ?>

                                                                  <option value="<?php echo $row->zid ?>"><?php echo $row->zname; ?></option>
                                                            <?php } ?>
                                                      </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Aanaa</label>
                          <select class="form-control"name="wworeda_id" id="woreda1" >
                           <option value="">-- fili --</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Ganda</label>
                          <select class="form-control"name="wkebele_id" id="kebele1" >
                           <option value="">-- fili --</option>
                        </select>
                      </div>
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

<script type="text/javascript">
    function ageCount() {
        var date1 = new Date();
        var  dob= document.getElementById("dob").value;
        var date2=new Date(dob);
            var y1 = date1.getFullYear(); //getting current year
            var y2 = date2.getFullYear(); //getting dob year
            var age = y1 - y2 -8 ;           //calculating age 
            document.getElementById("Age").value = age;
            // document.write("Age : " + age);
          
        

    }
</script>
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