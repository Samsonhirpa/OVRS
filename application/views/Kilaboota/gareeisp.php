<div class="content-wrapper">
<div class="page-content">
  



<div class="container-fluid">
      <h3 class="box-title"><i class="fa fa-plus-square">Odeeffannoo Gareewwan Ispoortii</i></h3>


<div class="box box-default">
          <div class="box-headerS with-border">
           <h3 class="box-title"><a href="<?php echo base_url('Sport/addGaree') ?>" class="btn btn-primary"><i class="fa fa-plus-square">Dabalii Galmeessi </i></a></h3>
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
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200.733px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Garee Ispoortii</th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Gosa Ispoortii</th>
                        <!-- <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Gosa Kilabii</th> -->
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.733px;" aria-label="Browser: activate to sort column ascending">Bajaataa kilabii</th>
                     <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.733px;" aria-label="Browser: activate to sort column ascending">Bara Hunda'ee</th>
                    
                       <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Maqaa Leenjiisaa</th>
                       <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Sad/oguma leenjiisaa</th>

                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 156.217px;" aria-label="Engine version: activate to sort column ascending">Bara beekamtii argatee</th>
                      

                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Godiina</th>

                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 156.217px;" aria-label="Engine version: activate to sort column ascending">Aanaa</th>

                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 156.217px;" aria-label="Engine version: activate to sort column ascending">Ganda</th> 
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 156.217px;" aria-label="Engine version: activate to sort column ascending">Operator</th>

                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200.417px;" aria-label="CSS grade: activate to sort column ascending">Action</th>  </tr>
            </thead>

                 <tbody>
                  <?php
                  $no = 0;
             
                        foreach ($this->k->getgaree() as $row) {
                        $no++;
                        ?>
                        <tr role="row" class="odd">
                               <td ><?php echo $no; ?></td>
                              <td><?php echo $row->maqa_kilabi; ?></td>
                              <td><?php echo $row->sport_type; ?></td>
                              <!-- <td><?php echo $row->clubtype; ?></td> -->
                              <td><?php echo $row->bajata; ?></td>
                              <td><?php echo $row->k_dob; ?></td>
                              <td><?php echo $row->maqa_lenjisa; ?></td>
                              <td><?php echo $row->s_lenjisa; ?></td>
                              <td><?php echo $row->bara_bekamti; ?></td>
                              <td><?php echo $row->zname . ' ' . $row->cname  ; ?></td>
                            <td><?php echo $row->woreda_name. ' ' . $row->subcity_name; ?></td>
                            <td><?php echo $row->kname. ' ' . $row->sbw_name; ?></td>
                              
                              <td><?php echo $row->created_by; ?></td>

                             
                      
                             <td>
                    <a class="btn btn-sm btn-info"href="<?php echo base_url('Sport/Updategaree/'.$row->gr_id)?>"><i class="fa fa-wrench"></i></a>
                 <!-- <a class="btn btn-sm btn-success" href="<?php echo base_url('Sport/saveclub/'.$row->k_id)?>"><i class="fa fa-windows"></i></a> -->
                    <a class="btn btn-sm btn-danger" href="<?php echo base_url('Sport/Delete_garee/'.$row->gr_id)?>"onclick="return confirm('Are you sure To Delete This Information ??')"><i class="fa fa-trash"></i></a>
                    


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

 