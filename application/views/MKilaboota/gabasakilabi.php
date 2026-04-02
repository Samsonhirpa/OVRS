<div class="content-wrapper">

<div class="container-fluid">
      <h3 class="box-title"><i class="fa fa-plus-square">Gabaasa Kilabootaa fi Gosa Isaanii</i></h3>

   <div class="box box-default">
         
          <div class="box-body">
      <!-- <div class="container" id="div-id-name"> -->
      <div id="printMe">
            <div class="box-body">
                  <div class="nav-tabs-custom">
                        <!-- Tabs within a box -->
                        <ul class="nav nav-tabs pull-right">
                              <!-- <li class="active"><a href="#revenue-chart" data-toggle="tab"></a></li> -->
                              <!-- <li><a href="#sales-chart" data-toggle="tab">Donut</a></li> -->
                              <li class="pull-left header"> <p align="center"><img style="height: 70px;" src="<?php echo base_url();?>dist/img/youthlogo.jpg" class="img-circle" alt="User Image"><b><i style="font: Lucida Bright; font-size: 27px; text-align: center;">         Biiroo Dargaggoo fi Sportii Naannoo Oromiyaa       </b></i></b><img style="height: 70px;" src="<?php echo base_url();?>dist/img/minster of women.png" class="img-circle" alt="User Image"></p>
                                    <h4 align="center">Baayyina Kilabootaa fi Gosa Isaanii</h4>
                              </li>
                        </ul>
                  </div>
                  <table class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead>
                              <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 25.733px;" aria-label="Browser: activate to sort column ascending">TL</th>
                                  
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 80.733px;" aria-label="Browser: activate to sort column ascending">Gosa Kilabii</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 60.683px;" aria-label="Platform(s): activate to sort column ascending">Bayyina Kilabii</th>
                                    
                              </tr>
                        </thead>
                        <tbody>
                          

                              <tr>
                                    <?php
                                    $this->db->select('*')->from('kilabi');
                                    $this->db->where('clubtype', 1 );
                                   
                                    $query1 =    $this->db->count_all_results();

                                    ?>
                                    <?php $n01 = $query1;
                                    if ($n01 > 0) { ?>
                                          <td>1</td>
                                          <td>Super liigii  Itiyoophiyaa</td>
                                        
                                          <td><?php echo $query1; ?></td>
                                        
                                    <?php } ?>
                              </tr>
                              <tr>
                                    <?php
                                    $this->db->select('*')->from('kilabi');
                                    $this->db->where('clubtype', 2);
                                   
                                    $query2 =    $this->db->count_all_results();

?>
                                    <?php $n01 = $query2;
                                    if ($n01 > 0) { ?>
                                          <td>2</td>
                                          <td>Liigii Olaana  Itiyoophiyaa</td>
                                        
                                          <td><?php echo $query2; ?></td>
                                        
                                    <?php } ?>
                              </tr>
                              <tr>
                                    <?php
                                    $this->db->select('*')->from('kilabi');
                                    $this->db->where('clubtype', 3);
                                   
                                    $query3 =    $this->db->count_all_results();

?>
                                    <?php $n01 = $query3;
                                    if ($n01 > 0) { ?>
                                          <td>3</td>
                                          <td>Pirimarliigii Itiyoophiya</td>
                                        
                                          <td><?php echo $query3; ?></td>
                                        
                                    <?php } ?>
                              </tr>
                             <tr>
                                    <?php
                                    $this->db->select('*')->from('kilabi');
                                    $this->db->where('clubtype', 4);
                                   
                                    $query4 =    $this->db->count_all_results();

?>
                                    <?php $n01 = $query4;
                                    if ($n01 > 0) { ?>
                                          <td>4</td>
                                          <td>Ligii Oromiyaa 1ffaa</td>
                                        
                                          <td><?php echo $query4; ?></td>
                                        
                                    <?php } ?>
                              </tr>
                             <tr>
                                    <?php
                                    $this->db->select('*')->from('kilabi');
                                    $this->db->where('clubtype', 5);
                                   
                                    $query5 =    $this->db->count_all_results();

?>
                                    <?php $n01 = $query5;
                                    if ($n01 > 0) { ?>
                                          <td>5</td>
                                          <td>Ligii Oromiyaa 2ffaa</td>
                                        
                                          <td><?php echo $query5; ?></td>
                                        
                                    <?php } ?>
                              </tr>
                            




                              <tr>
                                    <?php
                                    $total = $query1 + $query2 + $query3 + $query4 + $query5;

                                    ?>


                                    <?php $n01 = $query1;
                                    if ($n01 > 0) { ?>
                                          <td>#</td>
                                           <td colspan="1" align="right"><strong>Baayyina Kilabootaa Waligala</strong></td>
                                       
                                          <td><strong><?php echo $total; ?></strong></td>
                                          
                                         
                                         
                                          <!-- <td><?php echo $query->zname; ?></td>
                              <td><?php echo $query->woreda_name; ?></td>
                              <td><?php echo $query->kname ?></td>
                              <td><?php echo $query->operator; ?></td> -->
                                    <?php } ?>
                              </tr>

                        </tbody>
                  </table>
            </div>
      </div>

      <br>

      <button onclick="printDivMe('printMe')" class="btn btn-info pull-right"><i class="fa fa-print">PRINT</i></button>
 


      <!-- <button onclick="printDivMe('printMe')" class="btn btn-info pull-right"><i class="fa fa-print"></i></button> -->



</div>
</div>
</div>
</div>



<script>
      function printDivMe(divName) {
            var divToPrint = document.getElementById('printMe');
            var htmlToPrint = '' +
                  '<style type="text/css">' +
                  'table {' +
                  '    border-collapse: collapse;' +
                  'width:1000px;' +
                  '}' +
                  'th , td {' +
                  'border: 1px solid black;' +
                  'padding: 4px;' +
                  'text-align: left;' +
                  '}' +
                  '</style>';
            htmlToPrint += divToPrint.outerHTML;
            newWin = window.open("");
            newWin.document.write(htmlToPrint);
            newWin.print();
            newWin.close();
      }
</script>


<!-- <script>

function printDiv(divName){
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
}

     

    function model(divName) {

        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
    {#var height=document.getElementById(divName).innerHTML;
    w= window.open("",'name','resizeable=1',false);
    w.document.write("<body style='width:230px;font-size:20px;'");#}
    {#w.document.write(printContents);#}
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;

        }
</script>
 -->
<!-- <script>
function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}
</script> -->


<!-- <script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script> -->