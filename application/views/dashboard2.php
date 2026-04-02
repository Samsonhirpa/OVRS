
 
  <!-- Left side column. contains the logo and sidebar -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

<?php
 
$dataPoints = array( 
    array("y" => 3373.64, "label" => "Germany" ),
    array("y" => 2435.94, "label" => "France" ),
    array("y" => 1842.55, "label" => "China" ),
    array("y" => 1828.55, "label" => "Russia" ),
    array("y" => 1039.99, "label" => "Switzerland" ),
    array("y" => 765.215, "label" => "Japan" ),
    array("y" => 612.453, "label" => "Netherlands" )
);

// $test=array();
// $count=0;

// $res=$this->db->select('istediyemi');
// while ($row=mysql_fetch_array($res)) {
//   // code...
//   $test["count"]["label"]=$row["std_name"];
//   $test["count"]["y"]=$row["std_level"];
//   $count=$count+1;
// }
 
?>
    <!-- Main content -->
    <section class="content">

      <div class="row">
        
   
        <div class="col-md-9">
          <h3 class="box-title" align="center">Baga Nagaan  Gara <?php echo $useraccount->zname;?> Dhuftan</h3>
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Home</a></li>
              <li><a href="#timeline" data-toggle="tab">Mullata fi Dudhaalee</a></li>
             
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                
                <!-- /.post -->

                  <div class="row">
<?php
            $zone = $this->session->userdata('zone');

if ($zone) {
    // Fetch the count of rows where zone_id matches.
    $this->db->where('zone_id', $zone);
    $count = $this->db->from('kilabi')->count_all_results();
} else {
    $count = 0; // Default if zone_id is not in session.
  
}
?>
          <div class="col-md-3 col-sm-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $count?><sup style="font-size: 20px"></sup></h3>

              <p>Kilaboota Ispoortii</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
        <a href="<?php echo base_url('ZoneSport/manageclub') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> 
          </div>
        </div>
        <!-- /.col -->

       
<?php
$zone = $this->session->userdata('zone');

if ($zone) {
    // Fetch the count of rows where zone_id matches.
    $this->db->where('wzone_id', $zone);
    $count = $this->db->from('wirtu')->count_all_results();
} else {
    $count = 0; // Default if zone_id is not in session.
  
}
?> 
          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green" href="<?php echo base_url('ZoneSport/Marshal_arti') ?>">
            <div class="inner">
              <h3><?php echo $count?><sup style="font-size: 20px"></sup></h3>

              <p>Wirtuu Maarshal artii</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url('ZoneSport/Marshal_arti') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> 
          </div>
        </div>
        <!-- ./col -->
<?php
            $zoni = $this->session->userdata('zone');

if ($zoni) {
    // Fetch the count of rows where zone_id matches.
    $this->db->where('zone_id', $zoni);
    $count = $this->db->from('waldale')->count_all_results();
} else {
    $count = 0; // Default if zone_id is not in session.
  
}
?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $count?></h3>

              <p>Waldaalee  Ispoortii</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
         <a href="<?php echo base_url('ZoneSport/Waldaalee') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
 <?php
            $zoni = $this->session->userdata('zone');

if ($zoni) {
    // Fetch the count of rows where zone_id matches.
    $this->db->where('zone_id', $zoni);
    $count = $this->db->from('istediyemi')->count_all_results();
} else {
    $count = 0; // Default if zone_id is not in session.
  
}
?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $count?></h3>

              <p>Istediyemoota</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo base_url('ZoneSport/istediyemi') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> 
       </div>
       </div>
      <?php
            $zoni = $this->session->userdata('zone');

if ($zoni) {
    // Fetch the count of rows where zone_id matches.
    $this->db->where('len_zone', $zoni);
    $count = $this->db->from('lenji')->count_all_results();
} else {
    $count = 0; // Default if zone_id is not in session.
  
}
?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $count?></h3>

              <p>Lenji Lenjisumma</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo base_url('ZoneSport/Leenjisummaa') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> 
       </div>
       </div>

     <?php
            $zoni = $this->session->userdata('zone');

if ($zoni) {
    // Fetch the count of rows where zone_id matches.
    $this->db->where('zone_id', $zoni);
    $count = $this->db->from('olmaisporti')->count_all_results();
} else {
    $count = 0; // Default if zone_id is not in session.
  
}
?>
       <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $count?></h3>

              <p>Bakka Olmaa Ispoortii</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
         <a href="<?php echo base_url('ZoneSport/Oolmaisporti') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

 <?php
            $zoni = $this->session->userdata('zone');

if ($zoni) {
    // Fetch the count of rows where zone_id matches.
    $this->db->where('zone_id', $zoni);
    $count = $this->db->from('gidugala')->count_all_results();
} else {
    $count = 0; // Default if zone_id is not in session.
  
}
?>
          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green" href="<?php echo base_url('Sport/Giddugalaleenjii') ?>">
            <div class="inner">
              <h3><?php echo $count?><sup style="font-size: 20px"></sup></h3>

              <p>Giddugala leenjii</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url('ZoneSport/Giddugalaleenjii') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> 
          </div>
        </div>
        <!-- ./col -->

    <?php
            $zoni = $this->session->userdata('zone');

if ($zoni) {
    // Fetch the count of rows where zone_id matches.
    $this->db->where('zone_id', $zoni);
    $count = $this->db->from('guddattoota')->count_all_results();
} else {
    $count = 0; // Default if zone_id is not in session.
  
}
?>
          <div class="col-md-3 col-sm-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $count?><sup style="font-size: 20px"></sup></h3>

              <p>Guddattoota</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
        <a href="<?php echo base_url('ZoneSport/Guddattoota') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> 
          </div>
        </div>

     </div>
                <!-- Post -->
                <div class="post">

                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?php echo base_url();?>/dist/img/youthlogo.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Biiroo Dargaggoofi Ispoortii <?php echo $useraccount->zname;?></a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Gabaasa waligalaa <?php echo $useraccount->zname;?></span>
                  </div>
                  <!-- /.user-block -->
                     <div class="card-body">
<div class="row">
 <?php
            $zoni = $this->session->userdata('zone');

if ($zoni) {
    // Fetch the count of rows where zone_id matches.
    $this->db->where('szone_id', $zoni);
    $count = $this->db->from('sgl')->count_all_results();
} else {
    $count = 0; // Default if zone_id is not in session.
  
}
?>
 
<div class="col-6 col-md-3 text-center">
<div style="display:inline;width:90px;height:90px;"><canvas width="258" height="258" style="width: 90px; height: 90px;"></canvas><input type="text" class="knob" value="<?php echo $count?>" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-fgcolor="#3c8dbc" data-readonly="true" readonly="readonly" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(60, 141, 188); padding: 0px; appearance: none;"></div>
<div class="knob-label">Buufata SLG</div>
</div>
 <?php
            $zoni = $this->session->userdata('zone');

if ($zoni) {
    // Fetch the count of rows where zone_id matches.
    $this->db->where('zone_id', $zoni);
    $count = $this->db->from('gslg')->count_all_results();
} else {
    $count = 0; // Default if zone_id is not in session.
  
}
?>

<div class="col-6 col-md-3 text-center">
<div style="display:inline;width:90px;height:90px;"><canvas width="258" height="258" style="width: 90px; height: 90px;"></canvas><input type="text" class="knob" value="<?php echo $count?>" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-fgcolor="#3c8dbc" data-readonly="true" readonly="readonly" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(60, 141, 188); padding: 0px; appearance: none;"></div>
<div class="knob-label">Guddatoota SLG</div>
</div>
<!--  -->
 <?php
            $zoni = $this->session->userdata('zone');

if ($zoni) {
    // Fetch the count of rows where zone_id matches.
    $this->db->where('zone_id', $zoni);
    $count = $this->db->from('guddattoota')->count_all_results();
} else {
    $count = 0; // Default if zone_id is not in session.
  
}
?>

<div class="col-6 col-md-3 text-center">
<div style="display:inline;width:90px;height:90px;"><canvas width="258" height="258" style="width: 90px; height: 90px;"></canvas><input type="text" class="knob" value="<?php echo $count?>" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-fgcolor="#3c8dbc" data-readonly="true" readonly="readonly" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(60, 141, 188); padding: 0px; appearance: none;"></div>
<div class="knob-label">Baayyina Atileetotaa</div>
</div>
  <?php
            $zoni = $this->session->userdata('zone');

if ($zoni) {
    // Fetch the count of rows where zone_id matches.
    $this->db->where('zone_id', $zoni);
    $count = $this->db->from('taphata')->count_all_results();
} else {
    $count = 0; // Default if zone_id is not in session.
  
}
?>

<div class="col-6 col-md-3 text-center">
<div style="display:inline;width:90px;height:90px;"><canvas width="258" height="258" style="width: 90px; height: 90px;"></canvas><input type="text" class="knob" value="<?php echo $count?>" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-fgcolor="#3c8dbc" data-readonly="true" readonly="readonly" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(60, 141, 188); padding: 0px; appearance: none;"></div>
<div class="knob-label">Taphattoota Kilabii</div>
</div>
<!-- <div class="col-6 col-md-3 text-center">
<div style="display:inline;width:120px;height:120px;"><canvas width="345" height="345" style="width: 120px; height: 120px;"></canvas><input type="text" class="knob" value="60" data-skin="tron" data-thickness="0.2" data-width="120" data-height="120" data-fgcolor="#f56954" style="width: 64px; height: 40px; position: absolute; vertical-align: middle; margin-top: 40px; margin-left: -92px; border: 0px; background: none; font: bold 24px Arial; text-align: center; color: rgb(245, 105, 84); padding: 0px; appearance: none;"></div>
<div class="knob-label">data-width="120"</div>
</div>

<div class="col-6 col-md-3 text-center">
<div style="display:inline;width:90px;height:90px;"><canvas width="258" height="258" style="width: 90px; height: 90px;"></canvas><input type="text" class="knob" value="10" data-skin="tron" data-thickness="0.1" data-width="90" data-height="90" data-fgcolor="#00a65a" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(0, 166, 90); padding: 0px; appearance: none;"></div>
<div class="knob-label">data-thickness="0.1"</div>
</div> -->



</div>

</div>
                 
                  <!-- /.row -->

                  
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                        <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-wifi bg-blue"></i>

                    <div class="timeline-item">
                     

                      <h3 class="timeline-header"><a href="#">Mullata Biiroo Dargaggoo fi Ispoortii Oromiyaa</a> </h3>

                      <div class="timeline-body">
                      div class="timeline-body">
                        <b>Mullata:</b>  Bara 2022tti misooma Dargaggoo fi Ispoortii mirkaneessuun biyya keenya badhaadhinatti ceetee arguu dha.
Ergama 
• Dargaggoota naannoo Oromiyaa Bifa Qinda’ee fi gurmaa’een Sochii Ijaarsa Sirna Dimookiraasii, Bulchiinsa Gaarii fi Misoomaa Keessatti Miira Guutuu fi Adda durummaann hirmaatotaa fi fayyadamoo akka ta’an taasisuu
• Ispoortii sochii fi hirmaannaa ummataan bu’uura ummatummaa akka qabaatu taasisuun misooma ispoortii bu’a qabeessa ta’e akka mirkanaa’u taasisuu dha.
.<br>
                       
                      </div>
                      
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-wifi bg-aqua"></i>

                    <div class="timeline-item">
                      
 <h3 class="timeline-header"><a href="#">Dudhaalee (Core Values)</a> </h3>
<div class="timeline-body">
• Itti gaafatamummaa/responsibility/ <br>
• Hirmaachisummaa(Participation) <br>
• Iftoomina (Transparency) <br>
• Haqummaa fi hunda-galeessummaa/Equity and inclusiveness/ <br>
• Waliigaltee irra gahuu (Consensus)  <br>
• Olaantummaa seeraa kabajuu(Rule of Law) <br>
• Deebii hatattamaa kennuu (Responsiveness )<br>
• Ga’umsa fi Bu’a qabeessummaa (Effectiveness and Efficiency) <br>
• Aadaa fi Duudhaa Hawaasaa Kabajuu<br>
• Miira tajaajiltummaa ummataa qabaabchuu <br>
• Beekumsaa fi amantaan hogganuu<br>
 <br>
                        1.2.  Aangoo fi gahee Biiroo Dargaggoofi Ispoortii Oromiyaa
Labsii Lakk 242/2015: Labsii qaammota raawwachiistuu Mootummaa Naanno Oromiyaa irra deebiidhaan gurmeessuuf aangoo fi Hojii isaanii murteessuuf baheen; aangoo fi gaheen hojii Biiroo Dargaggoota fi Ispoortii Oromiyaa haala armaan gadiitiin tarreeffameera:
.<br>
                      
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
           <!--        <li>
                    <i class="fa fa-wifi bg-yellow"></i>

                    <div class="timeline-item">
                    

                      <h3 class="timeline-header"><a href="#">Kaayyoo</a> </h3>

                      <div class="timeline-body">
                        <b>Tokkummaa_Sab-daneessummaa:</b> refers to all of the resources of a network that make network or internet connectivity, management, business operations and communication possible. Network infrastructure comprises hardware and software, systems and devices, and it enables computing and communication between users, services, applications and processes.<br>
                        Anything involved in the network, from servers to wireless routers, comes together to make up a system’s network infrastructure. Network infrastructure allows for effective communication and service between users, applications, services, devices and so forth.
                      </div>
                      
                    </div>
                  </li>
        -->
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->

            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <div class="col-md-3">

          <!-- Profile Image -->
          
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Istediyeemii Oromiyaa</h3>
            </div>
            <!-- /.box-header -->
           
             <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-football"></i></span>

 <?php
            $zoni = $this->session->userdata('zone');

if ($zoni) {
    // Fetch the count of rows where zone_id matches.
    $this->db->where('zone_id', $zoni);
$this->db->where('std_level =', '1ffaa');

    $count = $this->db->from('istediyemi')->count_all_results();
} else {
    $count = 0; // Default if zone_id is not in session.
  
}
?>

            <div class="info-box-content">
              <span class="info-box-text">Sadarkaa 1ffaa</span>
               <span class="info-box-number"><?php echo $count?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <div class="info-box">
            <span class="info-box-icon bg-orange"><i class="ion ion-ios-football"></i></span>
 <?php
            $zoni = $this->session->userdata('zone');

if ($zoni) {
    // Fetch the count of rows where zone_id matches.
    $this->db->where('zone_id', $zoni);
$this->db->where('std_level =', '2ffaa');

    $count = $this->db->from('istediyemi')->count_all_results();
} else {
    $count = 0; // Default if zone_id is not in session.
  
}
?>
            <div class="info-box-content">
              <span class="info-box-text">Sadarkaa 2ffaa</span>
               <span class="info-box-number"><?php echo $count?></span>
            </div>
            <!-- /.info-box-content -->
          </div>

<div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-football"></i></span>
 <?php
            $zoni = $this->session->userdata('zone');

if ($zoni) {
    // Fetch the count of rows where zone_id matches.
    $this->db->where('zone_id', $zoni);
$this->db->where('std_level =', '3ffaa');

    $count = $this->db->from('istediyemi')->count_all_results();
} else {
    $count = 0; // Default if zone_id is not in session.
  
}
?>
            <div class="info-box-content">
              <span class="info-box-text">Sadarkaa 3ffaa</span>
               <span class="info-box-number"><?php echo $count?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i>Gosoota</strong>

              <p>
                <span class="label label-danger">Damee Naannoo</span>
                <span class="label label-success">Damee Godina</span>
                <span class="label label-info">Damee Aanaa</span>
                </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i>Naannoo oromiyaa</strong>

              <p>Naannoo oromiyaa keessatti ispoortii bu’uura ummataa akka qabatu gochuun hirmaannaa fi dorgomummaa.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      <!-- /.row -->





    </section>




    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

<!-- ./wrapper -->

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2",
    title:{
        text: "Gold Reserves"
    },
    axisY: {
        title: "Gold Reserves (in tonnes)"
    },
    data: [{
        type: "column",
        yValueFormatString: "#,##0.## tonnes",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();
 
}
</script>


<!-- jQuery 3 -->
<script type="text/javascript">

      $(document).ready(function () {
            $("#zone").change(function () {
                  var zid = $("#zone").val();
                  $.ajax({
                        url: '<?php echo base_url(); ?>BDDDDOcontroller/getWoreda',
                        'method': 'post',
                        'data': {zid: zid},
                        'type': 'JSON'
                  }).done(function (woreda) {
                        console.log(woreda);
                        town = JSON.parse(woreda);
                        $("#woreda").empty();
                        town.forEach(function (woreda) {
                              $("#woreda").append('<option value=' + woreda.woreda_id + '>' + woreda.woreda_name + '</option>');
                        });
                  });
            });

      });
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

