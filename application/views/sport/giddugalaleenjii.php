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
                              <h4 class="modal-title">Ragaa Leenjitoota Giddugala Leenjii Dabali</h4>
                        </div>
                        <div class="modal-body">
                              <form action="<?php echo base_url('Sport/save_Giddugalaleenjii') ?>"method="post" enctype="multipart/form-data">

                     
                    <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                                            <label>Maqaa</label>
                          <input type="text" name="maqaa" placeholder="-- Maqaa Guuti --" class="form-control">
                      
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Bara dhalootaa </label>
                      
                          <input type="year" name="dob" placeholder="-- dd/mm/year --" id="dob" onchange="ageCount();" class="form-control">
                      </div>
                    </div>
                   


                  </div>
    
                <div class="row">
             
                   <div class="col-sm-6">
                      <div class="form-group">
                        <label>Umurii </label>
                      
                          <input type="number" name="age" placeholder=" -- Cuqaasii --" id="Age" class="form-control" required readonly>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Sadarkaa barumsaa </label>
                        <select id="multipleSelect"  name="sadarka" data-search="true" data-silent-initial-value-set="true" >
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
                        <label>Bara giddugala galan</label>
                        <input type="date" name="bara" class="form-control">
                      </div>
                    </div>

                <div class="col-sm-6">
                      <div class="form-group">
                        <label>Bara giddugala Bahu/Bahe</label>
                        <input type="date" name="barabh" class="form-control">
                      </div>
                    </div>
                </div>
                                     


                <div class="row">
        <div class=" col-sm-6">
            <div class="form-group" >
                        <label>Bakka irraa filataman</label>
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
               
                    <div class="col-sm-6">
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
         
                    

                  </div>


    <div class="row">
  
                 <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label required>Gosa Ispoortii</label>
                  <select id="sporttype"  name="maqaisporti" class="form-control">

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
                  <select id="positiontap" name="gosa" class="form-control" >

        
  </select>
                      </div>
                   </div>

          </div>


<div class="row">
 <div class="col-sm-6">
                     
                      <!-- select -->
                      <div class="form-group">
                        <label>Giddugala Leenjii  </label>
         <select id="multipleSelect"  name="ggl" data-search="true" data-silent-initial-value-set="true" required>

           <option value="">-- Giddugala Leenjii Fili  --</option>
           <?php foreach ($this->k->getggl() as $row){
             ?>
            <option value="<?php echo $row->maqaaggl;?>"><?php echo $row->maqaaggl;?></option>
             <?php 
                  } ?>
  </select>
                      
                      </div>
                    </div>

                   <div class="col-sm-6">
                        <div class="form-group">
      <label class=" form-control-label">Suura Taphataa</label>
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
      <h3 class="box-title"><i class="fa fa-plus-square">Odeeffannoo Leenjitoota Giddugala Leenjii   </i></h3>


<div class="box box-default">
          <div class="box-header with-border">
            <button type="button"  data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-plus-square btn btn-primary">Ragaa Leenjitoota Dabali</i>
      </button>
</div>
          
           
            <div class="box-body">
                  <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead style="background-color: #666666; color: white">
                              <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 35.733px;" aria-label="Browser: activate to sort column ascending">#</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 130px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">G/G Leenjii</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 130px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Maqaa</th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 70px;" aria-label="Browser: activate to sort column ascending">Bara dhalootaa</th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 70px;" aria-label="Platform(s): activate to sort column ascending">Umurii</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 80px;" aria-label="Platform(s): activate to sort column ascending">Sadarkaa barumsaa</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 80px;" aria-label="Browser: activate to sort column ascending">Bara G/G galan</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 80px;" aria-label="Browser: activate to sort column ascending">Bara G/G Bahan</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 80px;" aria-label="Browser: activate to sort column ascending">Ispoortii</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 70px;" aria-label="Browser: activate to sort column ascending">Gosa </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 130px;" aria-label="Browser: activate to sort column ascending">Godina /Magaalaa </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Suuraa </th>


                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">Action</th></tr>
                        </thead>
                        <tbody>
                              <?php
                              $no = 0;
                              foreach ($this->k->getGiddugalaleenjii() as $row) {
                                    $no++;
                                    ?>
                      
                                    <tr role="row" class="odd">
                                          <td> <?php echo $no; ?></td>
                                          <td><?php echo $row->ggl; ?></td>
                                          <td><?php echo $row->maqaa; ?></td>
                                          <td><?php echo $row->dob; ?></td>
                                          <td><?php echo $row->age; ?></td>
                                          <td><?php echo $row->sadarka; ?></td>
                                          <td><?php echo $row->bara; ?></td>
                                          <td><?php echo $row->barabh; ?></td>
                                          <td><?php echo $row->spt_name; ?></td>

                                          <td><?php echo $row->p_name; ?></td>
                                    <td><?php echo $row->zname . ' ' . $row->cname  ; ?></td>


                                         <td>
                                    <img src="<?= base_url('upload/'.$row->attachment) ?>" height="40px" width="40px">
                              </td>

                                          <td>
                                                <a class="btn btn-sm btn-danger" href="<?php echo base_url('Sport/Delete_Giddugalaleenjii/' . $row->gl_id) ?>"onclick="return confirm('Are you sure To Delete ?')"><i class="fa fa-trash"></i></a>

                                                <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-default<?php echo $row->gl_id; ?>" onclick="return confirm('Are you sure To Edit ?')"><i class="fa fa-edit"></i></a>
                                          </td>
                                    </tr>


                              <div class="modal fade" id="modal-default<?php echo $row->gl_id; ?>">
                                    <div class="modal-dialog">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                      <h4 class="modal-title">Bakka Olmaa Ispoortii Duraanii Fooyyessi</h4>
                                                </div>
                                                <div class="modal-body">
                                                 <form action="<?php echo base_url('Sport/Edit_Giddugalaleenjii/' . $row->gl_id) ?>"method="post">
                                                             
 <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                                            <label>Maqaa</label>
                          <input type="text" name="maqaa" placeholder="-- Maqaa Guuti --" class="form-control">
                      
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Bara dhalootaa </label>
                      
                          <input type="date" name="dob" id="dob" onchange="ageCount();" class="form-control">
                      </div>
                    </div>
                   


                  </div>
    
                <div class="row">
             

                   <div class="col-sm-6">
                      <div class="form-group">
                        <label>Umurii </label>
                      
                          <input type="number" name="age" id="age" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Sadarkaa barumsaa </label>
                      <select  class="form-control" name="sadarka" id="ragaa" >
                        <option value="">-- Sadarkaa Fili  --</option>
                        <option value="Sadarkaa Jalqaba(1-8)">Sadarkaa Jalqaba(1-8)</option>
                        <option value="Sadarkaa Lammaffaa(9-10)">Sadarkaa Lammaffaa(9-10) </option>
                        <option value="Qopha'ina(11-12)">Qopha'ina(11-12)</option>
                        <option value="Dipiloomaa">Dipiloomaa</option>
                        <option value="Digirii">Digirii</option>
                        <option value="Maastersii">Maastersii</option>
                        <option value="PHD">PHD</option>
                        <option value="Kan Hin Baranne">Kan Hin Baranne</option>
                                                           
                                                      </select>

                      </div>
                    </div>
                   </div>


                    
                           

                                     <div class="row">
                <div class="col-sm-6">
                      <div class="form-group">
                        <label>Bara giddugala galan</label>
                        <input type="date" name="bara" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Godiina/Magaala Irraa filatame
                        </label>
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
                    
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Maqaa Ispoortii</label>
                      <select class="form-control" name="maqaisporti" required onchange = "java_script_:level(this.options[this.selectedIndex].value)" >
                      <option value="">-- Select  --</option>
                      <option value="Atleetiksii" id="Atleetiksii">Atleetiksii</option>
                      <option value="kubbaa Miillaa" id="Miilaa">kubbaa Miilaa </option>
                      <option value="Saaphana" id="Saaphana">Saaphana</option>
   

                                       </select>
                                                      </div>
            
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Gosa </label>
                        <input type="text" name="gosa" class="form-control">
                      </div>
                    </div>
                    
</div> 
<div class="row">
 <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Giddugala Leenjii  </label>
                      <select  class="form-control" name="ggl" id="ragaa" >
                        <option value="">-- Sadarkaa Fili  --</option>
                        <option value="GL Atleetiksii Boqojjii">GL Atleetiksii Boqojjii</option>
                        <option value="GL Atleetiksii Booree">GL Atleetiksii Booree </option>
                        <option value="GL kubbaa Miilaa Amboo">GL kubbaa Miilaa Amboo</option>
                       
                                                           
                                                      </select>

                      </div>
                    </div>
  <div class="col-sm-6">
  <div class="form-group">
                        <label>Yaada dabalataa</label>
                      <input type="text" name="yada"  placeholder="-- Yaada dabalataa --" class="form-control">
                       
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
                        url: '<?php echo base_url(); ?>BDDDDOcontroller/getWoreda11',
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
                        url: '<?php echo base_url(); ?>BDDDDOcontroller/getkebele11',
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

<script type="text/javascript">
    function ageCount() {
        var date1 = new Date();
        var  dob= document.getElementById("dob").value;
        var date2=new Date(dob);
            var y1 = date1.getFullYear(); //getting current year
            var y2 = date2.getFullYear(); //getting dob year
            var age = y1 - y2 - 8; 

             if (age<14 || age > 19){
                   alert("Dargaggoo Umurii 14 Olii fi 19 gadii qofa galchaa Maaloo! ");
             document.getElementById("Age").value =" " ;
           }else{
            document.getElementById("Age").value = age;

           }
            // document.write("Age : " + age);
          
        

    }
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
<script type="text/javascript" src="<?php echo base_url();?>dist3/js/virtual-select.min.js"></script>

<script type="text/javascript">
    VirtualSelect.init({ 
  ele: '#multipleSelect' 
});
</script>
