<div class="content-wrapper">
      <section class="content" style="min-height: 526px;">
            <div class="col-xs-12">
                  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-plus"></i>Raggaa Kilabootaa Ispoortii Kan Ittin Guutamuu </h3></div>
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
<form role="form" action="<?php echo base_url('ESport/Updateclub/' .$kilabi->k_id); ?>" method="Post" enctype="multipart/form-data">








<div class="box-header with-border">

<div class="callout callout-info">
         <h4  class="box-title"> Ragaa Kilabootaa Ispoortii Dabali</h4>
         
          
        </div>


<div class="box box-solid box-secondary col-xs-12 col-lg-12 no-padding">
                                    

            <div class="row">
  
                  <div class="col col-md-6">

                         <div class="row">
  
                  <div class="col col-md-6">


                  
                         <div class="form-group">
                        <label>Maqaa Kilabii</label>
                          <input type="text" name="maqa_kilabi" id="company" value="<?php echo $kilabi->maqa_kilabi;?>" placeholder="-- Maqaa Kilabii--" class="form-control">
                      </div>
                   </div>

                   <div class="col col-md-6">


                  
                         <div class="form-group">
                        <label>Gosa Kilabii</label>
                         <select class="form-control" name="clubtype" required="">
           <option value="<?php echo $kilabi->clubtype;?>"><?php echo $kilabi->clubtype;?></option>
           <?php foreach ($this->k->getClubtype() as $row){
             ?>
            <option value="<?php echo $row->ct_name;?>"><?php echo $row->ct_name;?></option>
             <?php 
                  } ?>
  </select>
                      </div>
                   </div>

          </div>
       

          
       
  

      <div class="row">
             

                    <div class="col-sm-6">

                     

                      <div class="form-group">
                        <label>Bara Hunda'ee</label>
                      
                          <input type="date" name="k_dob" id="dob" value="<?php echo $kilabi->k_dob;?>" onchange="ageCount();" class="form-control" />

                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Muuxannoo</label>
                          <input type="text" name="muuxannoo" value="<?php echo $kilabi->muuxannoo;?>" id="Age" placeholder="-- Muuxannoo --" class="form-control">

                         
                      </div>
                    </div>
                  
                    
                    
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Gosa Ispoortii</label>
                      <input type="text" name="sport_type" value="<?php echo $kilabi->sport_type;?>" id="Age" class="form-control">

                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Bajaataa kilabiif qabamee</label>
                         <input type="text" name="bajata"  id="Age" value="<?php echo $kilabi->bajata;?>" class="form-control">

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
                          <select class="form-control"name="akmagala_id" id="subcitywd" >
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
                        <input type="text" name="maqa_lenjisa" value="<?php echo $kilabi->maqa_lenjisa;?>" class="form-control">

                      </div>
                    </div> 
                       <div class="col-sm-6">
                      <div class="form-group">
                        <label> Saala </label>
                      <input type="text" name="s_barnota" value="<?php echo $kilabi->s_barnota;?>" class="form-control">
                         
                         </div>
                    </div>
                    
</div> 

 <div class="row">
         <div class="col-sm-6">
                      <div class="form-group">
                        <label>Sad. Barnootaa</label>
                        <input type="text" name="s_barnota" id="Age" value="<?php echo $kilabi->s_barnota;?>" class="form-control">

                      </div>
                    </div> 
                       <div class="col-sm-6">
                      <div class="form-group">
                        <label>Sad/oguma leenjiisaa </label>
                      <input type="text" name="s_lenjisa" id="Age" value="<?php echo $kilabi->s_lenjisa;?>" class="form-control">
                         
                         </div>
                    </div>
                    
</div>
          
 <div class="row">
         <div class="col-sm-6">
                      <div class="form-group">
                        <label>Bara beekamtii argatee</label>
                        <input type="date" name="bara_bekamti" id="Age" value="<?php echo $kilabi->bara_bekamti;?>" class="form-control">

                      </div>
                    </div> 
                       <div class="col-sm-6">
                      <div class="form-group">
                        <label>Bara haara'ee </label>
                      <input type="date" name="bara_harahe" value="<?php echo $kilabi->bara_harahe;?>"  class="form-control">
                         
                         </div>
                    </div>
                    
</div>                          
      


 </div> 


                                    </div>
                                </div>
                                   <div class="col col-md-12" style=" text-align: right;">
                                      <input type="submit" class="btn btn-primary" value="Fooyyeessi">|<input type="reset" value="Haqi" class="btn btn-danger">     
                                        
                                          
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

<script type="text/javascript">

      $(document).ready(function () {
            $("#sadarka").change(function () {
                  var sid = $("#sadarka").val();
                  // alert(zid);
                  $.ajax({
                        url: '<?php echo base_url(); ?>BDDDDOcontroller/getschooletype',
                        'method': 'post',
                        'data': {sid: sid},
                        'type': 'JSON'
                  }).done(function (school) {
                        console.log(school);
                        school = JSON.parse(school);
                        $("#school").empty();
                        school.forEach(function (school) {
                              $("#school").append('<option value=' + school.shid + '>' + school.school_name + '</option>');
                        })
                  })
            })

            $("#school").change(function () {
                  var pid = $("#school").val();
                  $.ajax({
                        url: '<?php echo base_url(); ?>BDDDDOcontroller/getschoolplace',
                        'method': 'post',
                        'data': {pid: pid},
                        'type': 'JSON'
                  }).done(function (place) {
                        console.log(place);
                        place = JSON.parse(place);
                        $("#place").empty();
                        place.forEach(function (place) {
                              $("#place").append('<option value=' + place.pl_id + '">' + place.place_name + '</option>');
                        })
                  })
            })

            $("#place").change(function () {
                  var eid = $("#place").val();
                  $.ajax({
                        url: '<?php echo base_url(); ?>BDDDDOcontroller/getedutype',
                        'method': 'post',
                        'data': {eid: eid},
                        'type': 'JSON'
                  }).done(function (edutype) {
                        console.log(edutype);
                        edutype = JSON.parse(edutype);
                        $("#edutype").empty();
                        edutype.forEach(function (edutype) {
                              $("#edutype").append('<option value=' + edutype.u_id + '">' + edutype.u_name + '</option>');
                        })
                  })
            })
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
            var age = y1 - y2 -8 ;           //calculating age 
            document.getElementById("Age").value = age;
            // document.write("Age : " + age);
          
        

    }
</script>