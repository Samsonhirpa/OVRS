
<div class="content-wrapper">
  <section class="content" style="min-height: 526px;">
        
<div class="stu-master-create">
    <style>
.box .box-solid {
     background-color: #F8F8F8;
}
</style>

<script>
$(function () {
  $('[data-toggle="popover"]').popover({placement: function() { return $(window).width() < 768 ? 'bottom' : 'right'; }})
})
</script>
<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url('usercontroller/savepatient');?>" method="post">

              <input type="hidden" name="_csrf" value="VUtIQVVrZUcvIT8ieC0oKhkfDwQYOAEJJh0JJgMoKHcHPDwYESdUCQ==">    
  
    <div class="box box-solid box-info col-xs-12 col-lg-12 no-padding">
      <div class="box-header with-border">
         <h4 class="box-title"><i class="fa fa-info-circle"></i> Patient Details</h4>
      </div>


              <div class="box-body">
              
                 <div class="row">
             <div class="col col-md-3">

                <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo $this->lang->line('dor_menu');?></label>
                  <input name="dor" class="form-control" id="exampleInputEmail1" placeholder="firstname Name" type="date" required>
                </div>
              </div></div>
              <div class="row">
               <div class="col col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1"><?php echo $this->lang->line('fulname_menu');?></label>
                  <input name="name" class="form-control" id="exampleInputPassword1" placeholder="Full name" type="text" required>
                </div>
               
                <div class="col col-md-6">
                   <div class="form-group">
                 <label for="exampleInputPassword1"><?php echo $this->lang->line('gender_menu');?></label>
               <select class="form-control"name="gender" required>
                  <?php 
                  foreach ($this->m->getgender() as $row) {
                  
                 
                  ?>

                  <option value="<?php echo $row->id?>"><?php echo $row->g_name;?></option>
<?php  } ?>
                </select>
              </div>
            </div>
            <div class="col col-md-6">

               <div class="form-group">
                  <label for="exampleInputEmail1">Age</label>
                  <input name="age" class="form-control" id="exampleInputEmail1" placeholder="position" type="number" required>
                </div>
                
                </div>
                
                 <div class="form-group">
                  <label for="exampleInputEmail1">Address</label>
                  <input name="address" class="form-control" id="exampleInputEmail1" placeholder="Address" type="text" required>
                </div>
             <div class="form-group">
                  <label for="exampleInputEmail1">Relationship Status</label>
                  <input name="relationship" class="form-control" id="exampleInputEmail1" placeholder="relationship status " type="text" required>
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">Chief Compliant</label>
                  <input name="compliant" class="form-control" id="exampleInputEmail1" placeholder="chief Compliant" type="text" required>
                </div>
            
                </div>
                 <!-- <div class="row"> -->
      <div class="col col-md-6">

         



                 <div class="form-group">

                  <div class="box box-solid box-info col-xs-12 col-lg-12 no-padding">
      <div class="box-header with-border">
         <h4 class="box-title"> Vital sign</h4>
      </div>
                  <label for="exampleInputEmail1">BP (mmhg)<input name="bp" class="form-control" id="exampleInputEmail1" placeholder="bp here" type="text" required></label>
                   <label for="exampleInputEmail1">Temprature[degree celcius]<input name="temp" class="form-control" id="exampleInputEmail1" placeholder="Temp here" type="text" required></label>
                    <label for="exampleInputEmail1">Respiration Rate [ /min ]<input name="rr" class="form-control" id="exampleInputEmail1" placeholder="RR here here" type="text" required></label> <label for="exampleInputEmail1">Pulse Rate [ /min ]<input name="pr" class="form-control" id="exampleInputEmail1" placeholder="bp here" type="text" required></label>
                     <label for="exampleInputEmail1">Po2<input name="po" class="form-control" id="exampleInputEmail1" placeholder="Po2 here" type="text" required></label>
              
                 

            </div>      
                </div>

                

                
                 <label for="exampleInputPassword1">Plan</label>
               
                 <input type="text" class="form-control" name="plan" placeholder="plan">
                 <label for="exampleInputPassword1">Assesment</label>
               <input type="text" name="assesment" class="form-control" placeholder="Assesment here">
               <div class="form-group">
                  <label for="exampleInputEmail1">RX</label>
                  <input name="rx" class="form-control" id="exampleInputEmail1" placeholder="RX here " type="text" required>
                </div>
                 </div>
               </div>
              
                <div class="col col-md-12">
                 <input type="submit" class="btn btn-primary" value="Register">|<input type="reset" value="Clear" class="btn btn-danger">

                </div>
               </div>                </div>
               
            </form>
          </div>
       </div></div></div></section></div>
<!-- 
  <script type="text/javascript">
    
    $(document).ready(function(){
   $("#region").change(function(){
    var rid =$("#region").val();
    $.ajax({
      url:'<?php echo base_url();?>usercontroller/getzone',
      'method':'post',
      'data':{rid:rid},
      'type':'JSON'
    }).done(function(zone){
      console.log(zone);
      zone=JSON.parse(zone);
      $("#zone").empty();
      zone.forEach(function(zone){
        $("#zone").append('<option value='+ zone.id +'>'+ zone.name +'</option>');
      })
    })
   })

    $("#zone").change(function(){
    var zid =$("#zone").val();
    $.ajax({
      url:'<?php echo base_url();?>usercontroller/getworeda',
      'method':'post',
      'data':{zid:zid},
      'type':'JSON'
    }).done(function(zone){
      console.log(zone);
      zone=JSON.parse(zone);
      $("#woreda").empty();
      zone.forEach(function(zone){
        $("#woreda").append('<option value='+ zone.w_id +'">'+ zone.w_name +'</option>');
      })
    })
   })
    })
  </script> -->