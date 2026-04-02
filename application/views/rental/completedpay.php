 <div class="content-wrapper">
<div class="page-content">
  



<div class="container-fluid">
      <h3 class="box-title"><i class="fa fa-plus-square">COLLECTION PAYABLE DATABASE</i></h3>


<div class="box box-default">
         <!--  <div class="box-header with-border">
            <h3 class="box-title"><a href="<?php echo base_url('Structure/add_collection') ?>" class="btn btn-primary"><i class="fa fa-plus-square">Add Collection </i></a></h3>
          </div> -->
          <div class="box-body">
           

 <div class="row">
                  <div class="col col-md-12">
                    <?php
                        if($this->session->flashdata('success_msg'))
                        {
                          ?>
                          <div class="alert alert-success">
                            <?php echo $this->session->flashdata('success_msg');?>
                          </div>
                          <?php
                        }
                        if($this->session->flashdata('error_msg'))
                        {
                          ?>
                          <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('error_msg');?>
                          </div>
                          <?php
                        }
                    ?>
                  </div>
                </div>


   
  </div>
      <div class="row">
        <div class="col-md-12">
          <div class="overview-wrap">
            
          
          </div>
        </div>
      </div>
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive table--no-card m-b-30">


 
<div class="box-body">


      <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info"
      data-toolbar="#toolbar"
      data-show-print="true"
      data-show-export="true"
      data-click-to-select="true">
            <thead  class="thead-success">
               
                  <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 35.733px;" aria-label="Browser: activate to sort column ascending">NO</th>
                          <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 80.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Ref. No</th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 150.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Projet Name</th>
                      
                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.733px;" aria-label="Browser: activate to sort column ascending">Vehicle</th>
                    
                       <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Plate No</th>
<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 170.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Date</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 85.217px;" aria-label="Engine version: activate to sort column ascending">T/Days</th>

<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Pay/day</th>
<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Type</th>
<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">VAT/TOT</th>
<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Withhold</th>
<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Gross</th>


                       
                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.733px;" aria-label="Browser: activate to sort column ascending">Status</th>

             </tr>
            </thead>

                 <tbody>
                  <?php
                  $no = 0;
             
                        foreach ($this->str->getcompletepayed() as $row ) {
                        $no++;
                        ?>
                        <tr role="row" class="odd">
                              <td ><?php echo $no; ?></td>
                               <td><?php echo $row->refno ; ?></td> 
                               <td><?php echo $row->p_name ; ?></td> 
                               <td><?php echo $row->v_name ; ?></td> 
                               <td><?php echo $row->plateno ; ?></td> 
                               <td><?php echo $row->s_date .'-'. $row->e_date ;?></td> 
                               <td><?php echo $row->t_date ; ?></td> 
                               <td><?php echo $row->payperday ; ?></td> 
                             
                               <td><?php echo $row->name ;?></td> 
                               <td><?php echo $row->vatot ;?></td> 
                               <td><?php echo $row->withhold ; ?></td> 
                               <td><?php echo $row->gross ; ?></td> 
                            
                                                          
                          <td>   <a class="btn btn-xs alert-success" href="#"><i <?php if($row->vendor_status == 0 ) { ?> class="fa fa-cloud-upload">Not Payed </i> <i <?php } if($row->vendor_status == 1 ) { ?> class="fa fa-cloud-upload"> Reject </i> <i <?php } if($row->vendor_status == 2 ) { ?> class="fa fa-thumbs-o-up"><?php } ?>Payed</i> </a></td>                                
                
    
                               <?php }

                ?>
                              
                   </tr>
                   </tbody>
                          <tfoot>
            <tr>
                <th>#</th>
                <th>Total:</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>PAYED</th>
                
            </tr>
        </tfoot>
                 </table>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 


<script>
$(document).ready(function() {
    $('#example').DataTable( {

 "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
           
              var sumCol8Filtered = display.map(el => data[el][8]).reduce((a, b) => intVal(a) + intVal(b), 0 );
              var sumCol9Filtered = display.map(el => data[el][9]).reduce((a, b) => intVal(a) + intVal(b), 0 );
            var sumCol10Filtered = display.map(el => data[el][10]).reduce((a, b) => intVal(a) + intVal(b), 0 );
            
          
    $( api.column( 8 ).footer() ).html(
                 sumCol8Filtered
              
            );      
 $( api.column( 10 ).footer() ).html(
                 sumCol10Filtered
              
            );
              $( api.column( 9 ).footer() ).html(
                 sumCol9Filtered   
            );
        },

         dom: 'Bfrtip',
        buttons: [
          

            { extend: 'copy', footer: true },
            { extend: 'excel', footer: true },
            { extend: 'csv', footer: true },
            { extend: 'print', footer: true },
            { extend: 'pdf', footer: true }
           
            
        ]
   


    } );
} );
</script>



 



 