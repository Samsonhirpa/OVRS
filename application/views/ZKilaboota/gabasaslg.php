<div class="content-wrapper">

<div class="container-fluid">
      <h3 class="box-title"><i class="fa fa-plus-square">Gabaasa Sagantaa Leenjii Guddattootaa fi Guddatoota achi keessaatti argaman</i></h3>

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
                                    <h4 align="center">Baayyina Sagantaa Leenjii Guddattootaa fi Guddatoota achi keessaatti argaman</h4>
                              </li>
                        </ul>
                  </div>
                       
                  <table class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead>
                              <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20.733px;" aria-label="Browser: activate to sort column ascending">TL</th>
                                  
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 70.733px;" aria-label="Browser: activate to sort column ascending">Maqaa SLG</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 70.733px;" aria-label="Browser: activate to sort column ascending">Gosa Isportii</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 60.683px;" aria-label="Platform(s): activate to sort column ascending">Bayyina Guddattootaa</th>
                                    
                              </tr>
                        </thead>
                        <tbody>
                          

                              
                                     <?php
                  $no = 0;
             
                        foreach ($this->k->getsgl() as $row) {
                        $no++;
                        $gud= $row->sgl_id; 
                        ?>
                        <tr>
                              <td ><?php echo $no; ?></td>
                              <td><?php echo $row->maqasgl; ?></td>
                              <td><?php echo $row->sport_type; ?></td>
                              <td> 
                              <?php 

$this->db->where('bslg_id =',$gud );
$query = $this->db->get('gslg');
$col= $query->num_rows();

?>                               <?php echo $col?>
                              </td>      

                              </tr>
 <?php }

  ?>
                              <tr>
                                    <?php
$total=$this->db->count_all_results('gslg'); ?>
    <?php
$total1=$this->db->count_all_results('gslg'); ?>
 <td align="right"><strong>Ida'ama SLG</strong></td>
                                          <td><strong><?php echo $total1; ?></strong></td>

                                          <td colspan="1" align="right"><strong>Ida'ama Guddattootaa</strong></td>
                                       
                                          <td><strong><?php echo $total; ?></strong></td>
                              </tr>
                             
 

                        </tbody>
                  </table>
            </div>
      </div>

      <br>

      <!-- <button type="button" class="btn btn-warning"><a href="<?php echo base_url('Report/AllReport_info'); ?>">Back To All Report</a></button> -->


      <button onclick="printDivMe('printMe')" class="btn btn-info pull-right"><i class="fa fa-print">PRINT</i></button>



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
