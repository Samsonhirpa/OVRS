<div class="content-wrapper">
      <section class="content" style="min-height: 526px;">
            <div class="col-xs-12">
              
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
                        })
                  </script>

                  <div class="col-md-12" >
  
<div class="box box-default">
                        <!-- general form elements -->
<div class="student-profile py-4">
  <div class="container" id="divone">
    <div class="row">
      <div class="col-lg-12">


<div class="nav-tabs-custom">
            <!-- Tabs within a box -->
           
       <p><img style="height: 70px;" src="<?php echo base_url();?>dist/img/youthlogo.jpg" class="img-circle" alt="User Image"><b><i style="font: Lucida Bright; font-size: 27px; text-align: center;">         Biiroo Dargaggoo fi Sportii Naannoo Oromiyaa       </b></i></b><img style="height: 70px;" src="<?php echo base_url();?>dist/img/minster of women.png" class="img-circle" alt="User Image"></p>
           
            </div>

</div>
      </div>
      <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
        <img  style="height: 150px; width: 150px;"  src="<?php echo base_url()?>upload/<?php echo $gslg->file_name?>"  alt="not displaying">
            <h3><?php echo $gslg->gt_name;?></h3>
          </div>
          <div class="card-body">
         <p class="mb-0"> <strong class="pr-1">Umurii:</strong><?php echo $gslg->umuri;?></p>
         <p class="mb-0"><strong class="pr-1">Bilbila:</strong><?php echo $gslg->bilbila;?> </p>
        
           


                     
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Odeeffannoo Bakka Dhalootaa Guddataa </h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <thead  class="thead-success">
             <tr role="row" style="background-color: aqua;">
                <th width="20%">Bakka</th>
                <th width="20%">Godiina/Magaala </th>
                 <th width="20%">Aanaa</th>
                <th width="20%">Ganda</th>

                   </tr>
            </thead>

             <tbody>
               <tr role="row">
                <td><strong>Oromiyaa</strong></td>
                <td><?php echo $gslg->zname;?><?php echo $gslg->cname;?></td>
                <td><?php echo $gslg->woreda_name;?><?php echo $gslg->subcity_name;?></td>
                <td><?php echo $gslg->kname;?><?php echo $gslg->sbw_name;?></td>
              </tr>
               
              </tbody>
            </table>
          </div>
        </div>
     

 <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Odeeffannoo Buufata SLG</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <thead  class="thead-success">
             <tr role="row" style="background-color: aqua">
        
                <th width="20%">Maaqaa Buufataa</th>
                <th width="20%">Bara Seenee</th>
                <th width="20%">Gosa Ispoortii</th>
               
                   </tr>
            </thead>

             <tbody>
               <tr role="row">
                <td><?php echo $gslg->maqasgl;?></td>
                <td><?php echo $gslg->bara;?></td>
                <td><?php echo $gslg->sport_type;?></td>
              
               
              </tr>
              
              </tbody>
            </table>
          </div>
        </div>

   <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Odeeffannoo Teessoo Buufata SLG</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <thead  class="thead-success">
             <tr role="row" style="background-color: aqua;">
                <th width="20%">Bakka</th>
                <th width="20%">Godiina/Magaala </th>
                 <th width="20%">Aanaa</th>
                <th width="20%">Ganda</th>

                   </tr>
            </thead>

             <tbody>
               <tr role="row">
                <td><strong>Oromiyaa</strong></td>
               <td><?php echo $gslg->zname;?><?php echo $gslg->cname;?></td>
                <td><?php echo $gslg->woreda_name;?><?php echo $gslg->subcity_name;?></td>
                <td><?php echo $gslg->kname;?><?php echo $gslg->sbw_name;?></td>
              </tr>
               
              </tbody>
            </table>
          </div>
        </div> 
     

<!-- 
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Odeeffannoo Leenjisaa</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <thead  class="thead-success">
             <tr role="row" style="background-color: aqua;">
                <th width="20%">Maqaa Leenjisa</th>
                <th width="20%">Sadarkaa Barnootaa</th>
                <th width="20%">Sad/oguma leenjiisaa</th>
                <th width="20%">Bara beekamtii argatee</th>
                   </tr>
            </thead>

             <tbody>
               <tr role="row">
               
                <td><?php echo $taphata->maqa_lenjisa;?></td>
                <td><?php echo $taphata->s_barnota;?></td>
                <td><?php echo $taphata->s_lenjisa;?></td>
                <td><?php echo $taphata->bara_bekamti;?></td>
              </tr>
              
              </tbody>
            </table>
          </div>
        </div>
 -->

 

        <table>
            <p class="mb-0"><strong class="pr-1">Ogeessa Galmeesse:</strong>  &nbsp; &nbsp;<?php echo $gslg->operator;?></p>
          
        </table>


       
          
      </div>
       
     </div>
   
</div>
</div>
</div>
</div>
<button class="btn-success" onclick="myfun('divone')">print</button>

</section>
</div>
<script type="text/javascript">
  
  function mywholepage(){
    window.print();
  }
  function myfun(divone){
    var backup = document.body.innerHTML;
    var divcontent = document.getElementById('divone').innerHTML;
    document.body.innerHTML = divcontent;
    window.print();
    document.body.innerHTML = backup;
  }
</script>

