 <div class="content-wrapper">
<div class="page-content">
  



<div class="container-fluid">
      <h3 class="box-title"><i class="fa fa-plus-square">RENTAL PAYABLE DATABASE</i></h3>


<div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title"><a href="<?php echo base_url('Structure/add_rent') ?>" class="btn btn-primary"><i class="fa fa-plus-square">Add Rental </i></a></h3>
          </div>
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


      <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            <thead  class="thead-success">
                  <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 35.733px;" aria-label="Browser: activate to sort column ascending">NO</th>
                          <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 80.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Ref. No</th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 150.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Vendor Name</th>
                      
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.733px;" aria-label="Browser: activate to sort column ascending">Project</th>
                     <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.733px;" aria-label="Browser: activate to sort column ascending">Vehicle</th>
                    
                       <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Plate No</th>
<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 140.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Date</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 85.217px;" aria-label="Engine version: activate to sort column ascending">T/Days</th>



<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"> Vendor Payable</th>

<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 85.733px;" aria-label="Browser: activate to sort column ascending">Net Recievable</th>

<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.733px;" aria-label="Browser: activate to sort column ascending">Operator</th>
                      
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 150.417px;" aria-label="CSS grade: activate to sort column ascending">Action</th>  </tr>
            </thead>

                 <tbody>
                  <?php
                  $no = 0;
             
                        foreach ($this->str->getrent() as $row ) {
                        $no++;
                        ?>
                        <tr role="row" class="odd">
                              <td ><?php echo $no; ?></td>
                               <td><?php echo $row->refno ; ?></td> 
                              <td><?php echo $row->c_name; ?></td>
                               <td><?php echo $row->p_name ; ?></td> 
                               <td><?php echo $row->v_name ; ?></td> 
                               <td><?php echo $row->plateno ; ?></td> 
                               <td><?php echo $row->s_date .'-'. $row->e_date ;?></td> 
                               <td><?php echo $row->t_date ; ?></td> 
                               <td><?php echo $row->netpayable ; ?></td> 
                              
                              
                               <td><?php echo $row->netpayable1 ; ?></td>                                
                              <td><?php echo $row->operator; ?></td>                              
                              
                         
                      <td>
                    <a class="btn btn-sm btn-info"href="<?php echo base_url('Structure/edit_rent/'.$row->id)?>"><i class="fa fa-wrench"></i></a>
                 <a class="btn btn-sm btn-success" href="<?php echo base_url('Structure/showrent/'.$row->id)?>"><i class="fa fa-windows"></i></a>
                    <a class="btn btn-sm btn-danger" href="<?php echo base_url('Structure/Delete_rent/'.$row->id)?>"onclick="return confirm('Are you sure To Delete This Information ??')"><i class="fa fa-trash"></i></a>
                    


                    </td>

                               <?php }

                ?>
                              
                   </tr>
                   </tbody>
                 </table>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 
<script type="text/javascript">
         $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        
buttons: [
                { extend: 'copy' },
                { extend: 'csv' },
                { extend: 'excel' },
                { extend: 'pdf' },

                {
                    extend: 'print',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<div><img style="height: 250px; width:1200px;" src="<?php echo base_url();?>dist/img/he.png"  alt="User Image"></div>'

                        );

                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
            }
            ]



    } );
} );
     </script>

 