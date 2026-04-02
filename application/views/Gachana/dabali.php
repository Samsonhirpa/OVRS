<div class="content-wrapper">
      <section class="content" style="min-height: 526px;">
            <div class="col-xs-12">
                  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-plus"></i> Miseensa Gaachana Sirnaa</h3></div>
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
<form role="form" action="#" method="Post" enctype="multipart/form-data">








<div class="box-header with-border">

<div class="callout callout-info">
         <h4  class="box-title">  Miseensa Gaachana Sirnaa Dabali Galmeessi</h4>
         
          
        </div>


                                

            <div class="row">
  
                  <div class="col col-md-6">


            
  
                  


                  
                         <div class="form-group">
                        <label>Maqaa Guutuu Miseensa Gaachana Sirnaa</label>
                          <input type="text" name="maqa_kilabi" id="company" placeholder="-- Maqaa Kilabii--" class="form-control">
                      </div>
                  
<div class="row">
                 
                      <div class="col-sm-6">
                      <div class="form-group">
                        <label>Bara Dhaloota</label>
                      <input type="date" name="baramis" id="Age" placeholder="-- Bara Miseensa GS Ta'e --" class="form-control">
                         
                         </div>
                    </div>

               <div class="col-sm-6">
                      <div class="form-group">
                        <label>Umurii</label>
                          <input type="number" name="umuri" id="Age" placeholder="-- Umurii --" class="form-control">

                         
                      </div>
                    </div>
                  

          </div>
       
  

      <div class="row">
               <div class="col col-md-6">
				 <div class="form-group">
                        <label>Saala</label>
                  <select id="multipleSelect" name="clubtype" data-search="true" data-silent-initial-value-set="true" >

           <option value="">-- Saala filadhu  --</option>
           <option value="Dhiira">Dhiira</option>
           <option value="Dhalaa">Dhalaa</option>
          
  </select>
                      </div>   

                   </div>

                    <div class="col-sm-6">

                       <div class="form-group">
                        <label>Haala Gaa'ilaa</label>
                  <select id="multipleSelect" name="clubtype" data-search="true" data-silent-initial-value-set="true" >

           <option value="">-- Haala Gaa'ilaa filadhu  --</option>
           <option value="Kan Fuudhe/Heerumte">Kan Fuudhe/Heerumte</option>
           <option value="Kan hin Fuune/Heerumne">Kan hin Fuune/Heerumne</option>
          
  </select>
                      </div>
                    </div>

            
                </div>
                <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label required>Sad.Bart</label>
                  <select id="multipleSelect" multiple name="sport_type" data-search="true" data-silent-initial-value-set="true" >
                  	  <option value="">-- Saala filadhu  --</option>
           <option value="Digirii">Digirii</option>
           <option value="Dipilomaa">Dipilomaa</option>
             <option value="Qopha'insa">Qopha'insa</option>
           <option value="Sad 2ffa">Sad 2ffa</option>
           <option value="Sad 1ffa">Sad 1ffa</option>
           
  </select>
                      
                      </div>
                    </div>

                     <div class="col-sm-6">
                      <div class="form-group">
                        <label>Lakk. Waraqaa Eenyummaa </label>
                      <input type="text" name="waraqaid" id="Age" placeholder="-- Bara Miseensa GS Ta'e --" class="form-control">
                         
                         </div>
                    </div>

                </div>
               
     <div class="row">
  
                   
                    <div class="col-sm-4">
                      <div class="form-group" id="godiina" >
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
                      <div class="form-group" id="aanaa" >
                        <label>Aanaa</label>
                          <select class="form-control"name="dhalotaA_id" id="woreda" >
                           <option value="">-- Select  --</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group" id="ganda" >
                        <label>Ganda</label>
                          <select class="form-control"name="dhalotaK_id" id="kebele" >
                           <option value="">-- Select  --</option>
                        </select>
                      </div>
                    </div>

                    </div>                
    



</div>



                  <div class="col col-md-6">

  
       



      
 <div class="form-group">
                        <label>Zoonii</label>
                         <input type="text" name="zoonii" placeholder="-- Zoonii --" class="form-control">

                      </div>
                 
      <div class="row">
      	 <div class="col-sm-6">
                      <div class="form-group">
                        <label>G/Misoomaa</label>
                        <input type="text" name="gmisoomaa" id="Age" placeholder="-- G/Misoomaa --" class="form-control">

                      </div>
                    </div> 
                    	 <div class="col-sm-6">
                      <div class="form-group">
                        <label>IMO</label>
                        <input type="text" name="imo" id="Age" placeholder="-- IMO --" class="form-control">

                      </div>
                    </div> 
                       
                    
</div> 

 <div class="row">
 	    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Bara Miseensa GS Ta'e </label>
                      <input type="date" name="baramis" id="Age" placeholder="-- Bara Miseensa GS Ta'e --" class="form-control">
                         
                         </div>
                    </div> 
                     <div class="col-sm-6">
                     <div class="form-group">
                        <label>Haala Hidhannoo</label>
                  <select id="multipleSelect" name="clubtype" data-search="true" data-silent-initial-value-set="true" >

           <option value="">-- Haala Hidhannoo filadhu  --</option>
           <option value="Kan Qabu">Kan Qabu</option>
           <option value="Hin Qabne">Hin Qabne</option>
          
  </select>
                      </div>   
                    </div> 
      
                   
                    
</div>
 


          
 <div class="row">
      
                       <div class="col-sm-6">
                      <div class="form-group">
                        <label>Gosa Meeshaa </label>
                    <select id="multipleSelect" name="clubtype" data-search="true" data-silent-initial-value-set="true" >
                    <option value="">-- Gosa Meeshaa filadhu  --</option>
           			<option value="Kilaashii">Kilaashii</option>
           			<option value="SKS">SKS</option>
           			<option value="Shugguxii">Shugguxii</option>
           			<option value="B/Hafaa">B/Hafaa</option>
           			<option value="Baayina Rasaasaa">Baayina Rasaasaa</option>
           			
           			

                     </select>  
                         </div>
                    </div>

                       <div class="col-sm-6">
                      <div class="form-group">
                        <label>Abbaa Qabeenya Meeshichaa </label>
                    <select id="multipleSelect" name="clubtype" data-search="true" data-silent-initial-value-set="true" >
                    <option value="">-- Abbaa Qabeenya filadhu  --</option>
           			<option value="Kan Mootummaa">Kan Mootummaa</option>
           			<option value="Kan Haawaasaa">Kan Haawaasaa</option>
           			<option value="Kan Dhuunfaa Isaa">Kan Dhuunfaa Isaa</option>
           			

                     </select>  
                         </div>
                    </div>
                    
</div>
<div class="row">
 	        <div class="col-sm-6">
                      <div class="form-group">
                        <label>Haala Gurmii Miseensa GS</label>
                       <select id="multipleSelect" name="clubtype" data-search="true" data-silent-initial-value-set="true" >

           <option value="">-- Haala Hidhannoo filadhu  --</option>
           <option value="Saglii">Saglii</option>
           <option value="Tuuta">Tuuta</option>
           <option value="Humna">Humna</option>
           <option value="Cifraa">Cifraa</option>
     
          
  </select>
                         
                         </div>
                    </div>
      </div>
                         
      </div>


</div>
                                  
                                   <div class="col col-md-12" style=" text-align: right;">
                                      <input type="submit" class="btn btn-primary" value="Galmeessi">|<input type="reset" value="Haqi" class="btn btn-danger">     
                                        
                               </div>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </section>
   </div>


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
             '<option value="">-- Select  --</option>'
      })                    
</script>

<script type="text/javascript">

  $(document).ready(function () {
            $("#sector").change(function () {
                  var sid = $("#sector").val();
                  // alert(sid);
                  $.ajax({
                        url: '<?php echo base_url(); ?>BDDDDOcontroller/getmudamaa',
                        'method': 'post',
                        'data': {sid: sid},
                        'type': 'JSON'
                  }).done(function (mudama) {
                        console.log(mudama);
                        mudama = JSON.parse(mudama);
                        $("#mudama").empty();
                        mudama.forEach(function (mudama) {
                              $("#mudama").append('<option value=' + mudama.t_id + '>' + mudama.t_name + '</option>');
                        })
                  })
            })


            $("#town").change(function () {
                  var tid = $("#town").val();
                  $.ajax({
                        url: '<?php echo base_url(); ?>BDDDDOcontroller/getkebele',
                        'method': 'post',
                        'data': {tid: tid},
                        'type': 'JSON'
                  }).done(function (town) {
                        console.log(town);
                        town = JSON.parse(town);
                        $("#kebele").empty();
                        town.forEach(function (town) {
                              $("#kebele").append('<option value=' + town.kid + '">' + town.kname + '</option>');
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
            var age = y1 - y2 - 7;           //calculating age 
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