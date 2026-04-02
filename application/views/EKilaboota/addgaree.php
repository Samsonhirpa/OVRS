
<div class="content-wrapper">
      <section class="content" style="min-height: 526px;">
            <div class="col-xs-12">
                  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-plus"></i>Raggaa Gareewwan Ispoortii Kan Ittin Guutaman </h3></div>
            </div>


            <div class="stu-master-create">
                  <style>
                        .box .box-solid {
                              background-color: #F8F8F8;
                        }
                  </style>

                  <script>
                        $(function () {
                              $('[data-toggle="popover"]').popover({placement: function () {
                                          return $(window).width() < 768 ? 'bottom' : 'right';
                                    }})
                        }
                  </script>
                  <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
<form role="form" action="<?php echo base_url('ESport/save_garee'); ?>" method="Post" enctype="multipart/form-data">








<div class="box-header with-border">

<div class="callout callout-info">
         <h4  class="box-title"> Ragaa Garee Ispoortii Dabali</h4>
         
          
        </div>



                                    

            <div class="row">
  
                  <div class="col col-md-6">


            <div class="row">
  
                  <div class="col col-md-12">


                  
                         <div class="form-group">
                        <label>Maqaa Garee Ispoortii</label>
                          <input type="text" name="maqa_kilabi" id="company" placeholder="-- Maqaa Garee Ispoortii --" class="form-control">
                      </div>
                   </div>

          </div>
       
  

      <div class="row">
             

                    <div class="col-sm-6">

                     

                      <div class="form-group">
                        <label>Bara Hunda'ee</label>
                      
                          <input type="number" min="1900" max="2099" step="1" value="2017" name="k_dob" id="dob" onchange="ageCount();" class="form-control" />

                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Muuxannoo</label>
                          <input type="text" name="muuxannoo" id="Age" placeholder="-- Muuxannoo --" class="form-control">

                         
                      </div>
                    </div>
                  
                    
                    
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label required>Gosa Ispoortii</label>
                  <select id="multipleSelect" multiple name="sport_type" data-search="true" data-silent-initial-value-set="true" >

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
                        <label>Bajaataa kilabiif qabamee</label>
                         <input type="text" name="bajata" id="Age" placeholder="-- Bajaataa kilabiif qabamee --" class="form-control">

                      </div>
                    </div>

                  </div>
    
      <div class="row">
        <div class=" col-xs-12 col-lg-12">
                  
               <div class="form-group">
                        <label>Teessoo</label>
                         <select class="form-control" onchange = "java_script_:uu(this.options[this.selectedIndex].value)" >
                                <option value="">-- Magaalaa Ykn Godina Filaadhu  --</option>
                                        <option value="Magaaalaa" >Bulchiinsa Magaalaa</option>
                                        <option value="Godina" >Godina</option>
  </select>
                      </div>

</div>
                   
                    <div class="col-sm-4">
                      <div class="form-group" id="godiina" style="display: none;">
                        <label>Godiina</label>
                          <select  class="form-control" name="dhalotaG_id" id="zone" >
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
                          <select class="form-control"name="dhalotaA_id" id="woreda" >
                           <option value="">-- Select  --</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group" id="ganda" style="display: none;">
                        <label>Ganda</label>
                          <select class="form-control"name="dhalotaK_id" id="kebele" >
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


                                                <!-- <div class="row"> -->
                  <div class="col col-md-6">

                                                      <!-- <div class="form-group">
                                         
                                            <label for="company" class=" form-control-label"> <h4>Muuxannoowan gadi fageenyaan</h4></label>
                                           <textarea rows="5" name="muxannoowan" placeholder="Muuxannoowan hojiin argataan tarreessi" class="form-control"></textarea>
                                        </div> -->
                                        
                                        
             
                  
                         

  
       
<div class="box box-solid box-default col-xs-12 col-lg-12 no-padding">
                      <div class="box-header with-border">
                        <h4 class="box-title"><i class="fa fa-thumbs-up"></i> Odeeffannoo Leenjisaa
                        </h4>
                      </div>
                    </div>


      

      <div class="row">
         <div class="col-sm-6">
                      <div class="form-group">
                        <label>Maqaa Leenjiisaa</label>
                        <input type="text" name="maqa_lenjisa" id="Age" placeholder="-- Maqaa Leenjiisaa --" class="form-control">

                      </div>
                    </div> 
                       <div class="col-sm-6">
                      <div class="form-group">
                        <label> Saala </label>
                         <select class="form-control" name="s_barnota" required="">
                                                                  <option value="">-- Select  --</option>
                                                                  <?php foreach ($this->str->getGender() as $row){
                                                                    
                                                                        ?>
                                                                  <option value="<?php echo $row->gender_name;?>"><?php echo $row->gender_name;?></option>
                                                                              <?php 
                                                                  } ?>

                                                            </select>
                       
                         </div>
                    </div>
                    
</div> 

 <div class="row">
         <div class="col-sm-6">
                      <div class="form-group">
                        <label>Sad. Barnootaa</label>

                           <select  class="form-control" name="s_barnota">
                        <option value="">-- Sadarkaa Fili  --</option>
                        <option value="Tokkoffaa">Tokkoffaa</option>
                        <option value="Jidduu galeessa">Jidduu galeessa  </option>
                        <option value="Olaana">Olaana</option>
                        <option value="Kolleejjii">Kolleejjii</option>
                                                         </select>

                      </div>
                    </div> 
                       <div class="col-sm-6">
                      <div class="form-group">
                        <label>Sad/oguma leenjiisaa </label>
                      <input type="text" name="s_lenjisa" id="Age" placeholder="-- Sad/oguma leenjiisaa --" class="form-control">
                         
                         </div>
                    </div>
                    
</div>
          
 <div class="row">
         <div class="col-sm-6">
                      <div class="form-group">
                        <label>Bara beekamtii argatee</label>
                        <input type="date" name="bara_bekamti" id="Age" placeholder="-- Bara beekamtii argatee --" class="form-control">

                      </div>
                    </div> 
                       <div class="col-sm-6">
                      <div class="form-group">
                        <label>Bara haara'ee </label>
                      <input type="date" name="bara_harahe"   class="form-control">
                         
                         </div>
                    </div>
                    
</div>                          
      


 </div> 


                                    </div>
                                </div>
                                   <div class="col col-md-12" style=" text-align: right;">
                                      <input type="submit" class="btn btn-primary" value="Galmeessi">|<input type="reset" value="Haqi" class="btn btn-danger">     
                                        
                    
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</div>
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
     $('#kebele').html('<option value="">Ganda Fili</option>');
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


<script>
       function level(aval) {
        if (aval == "3") {
            zoneid.style.display = 'block';
            woredaid.style.display = 'block';      
           
            $('#zoneid').attr('required', 'required');
            $('#zoneid').attr('required', 'required');
          
        } else
            if (aval == "4") {
                woredaid.style.display = 'none';
                zoneid.style.display = 'block';
               
                $('#zoneid').attr('required', 'required');
                $('#woredaid').attr('required', false);
                $('#woreda').val(null);
           }
            else {
                woredaid.style.display = 'none';
                zoneid.style.display = 'none';
                $('#zoneid').attr('required', false);
                $('#woredaid').attr('required', false);
                $('#zone').val(null); 
                $('#woreda').val(null);
               
            }

    }
</script>

<script type="text/javascript">
    function ageCount() {
        var date1 = new Date();
        var  dob= document.getElementById("dob").value;
        var date2=new Date(dob);
            var y1 = date1.getFullYear(); //getting current year
            var y2 = date2.getFullYear(); //getting dob year
            var age = y1 - y2 -7 ;           //calculating age 
            document.getElementById("Age").value = age;
            // document.write("Age : " + age);
          
        

    }
</script>

<script type="text/javascript" src="<?php echo base_url();?>dist3/js/virtual-select.min.js"></script>

<script type="text/javascript">
    VirtualSelect.init({ 
  ele: '#multipleSelect' 
});
</script>