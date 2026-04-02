<div class="content-wrapper">
<div class="page-content">
  



<div class="container-fluid">
      <h3 class="box-title"><i class="fa fa-plus-square">Madaallii Leenjitootaa Giddu gala Leenjii</i></h3>


<div class="box box-default">
          <div class="box-headerS with-border">
           <h3 class="box-title"><a href="<?php echo base_url('Sport/Madaallii') ?>" class="btn btn-primary"><i class="fa fa-plus-square">Madaallii Haaraa </i></a></h3>
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
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.733px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Maqaa Leenji'aa</th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Maqaa G/Galaa</th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Ramaddii Umrii</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.733px;" aria-label="Browser: activate to sort column ascending">Saala</th>
                     <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.733px;" aria-label="Browser: activate to sort column ascending">Umurii</th>
                    
                       <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">M/Qaamaa(30%)</th>
                       <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">M/Tekinikaa(30%)</th>

                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.217px;" aria-label="Engine version: activate to sort column ascending">M/Ga'umsaa(30%)</th>
                      

                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Waligala 100%</th>

                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width:100px;" aria-label="Engine version: activate to sort column ascending">Guyyaa</th>

                        
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.217px;" aria-label="Engine version: activate to sort column ascending">Ogeessa</th>

                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.417px;" aria-label="CSS grade: activate to sort column ascending">Action</th>  </tr>
            </thead>

                 <tbody>
                  <?php
                  $no = 0;
             
                        foreach ($this->k->getmadali() as $row) {
                        $no++;
                        ?>
                        <tr role="row" class="odd">
                               <td ><?php echo $no; ?></td>
                              <td><?php echo $row->maqalenjia; ?></td>
                              <td><?php echo $row->ggl_id; ?></td>
                              <td><?php echo $row->ramumuri; ?></td>
                              <td><?php echo $row->sex; ?></td>
                              <td><?php echo $row->age; ?></td>
                              <td><?php echo $row->totalqama; ?></td>
                              <td><?php echo $row->totaltekinika; ?></td>
                              <td><?php echo $row->totalgaumsa; ?></td>
                              <td><?php echo $row->ttotal ; ?></td>
                            <td><?php echo $row->date; ?></td>
                           
                              
                              <td><?php echo $row->operator; ?></td>

                             
                      
                             <td>
                    <a class="btn btn-sm btn-info"href="#"><i class="fa fa-wrench"></i></a>
                 <!-- <a class="btn btn-sm btn-success" href="<?php echo base_url('Sport/saveclub/'.$row->k_id)?>"><i class="fa fa-windows"></i></a> -->
                    <a class="btn btn-sm btn-danger" href="#"onclick="return confirm('Are you sure To Delete This Information ??')"><i class="fa fa-trash"></i></a>
                    


                    </td>



                    
 </tr>         
               <?php }
                              ?>
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
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
     </script>

 