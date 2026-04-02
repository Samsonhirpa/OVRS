<div class="content-wrapper">
      <div class="box">
            <div class="row">
                  <div class="col col-md-12">
                        <?php
                        if ($this->session->flashdata('success_msg')) {
                              ?>
                              <div class="alert alert-success">
                                    <?php echo $this->session->flashdata('success_msg'); ?>
                              </div>
                              <?php
                        }
                        if ($this->session->flashdata('error_msg')) {
                              ?>
                              <div class="alert alert-danger">
                                    <?php echo $this->session->flashdata('error_msg'); ?>
                              </div>
                              <?php
                        }
                        ?>
                  </div>
            </div>
      </div>
      

      <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Ragaa Hirmaatootaa Dorgommii Ispoortii</h4>
                        </div>
                        <div class="modal-body">
                              <form action="<?php echo base_url('MSport/save_Hirmaattoota') ?>"method="post">

                     
                    
                    <div class="row">

                    <div class="col-sm-4">
                      <div class="form-group">

                          <label>Baayina Gosa Isp.</label>
                       <input type="number" name="number"  class="form-control" />

                        </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- select -->
                      <div class="form-group">
                       <label>Hirmaatootaa Dorgommii</label>
                          <select  class="form-control" name="dorgomi" id="dorgomi" >
                          <option value="">-- Select  --</option>
                          <option value="Dorgommii TGO">Dorgommii TGO</option>
                          <option value="Dorgommii M/Barnootaa">Dorgommii Manneen Barnootaa</option>
                          <option value="Dorgommii Aadaa">Dorgommii Aadaa</option>
                          <option value="Dorgommii Guddatootaa ">Dorgommii Guddatootaa </option>
                          <option value="Dorgommii Guddatootaa ">Dorgommii G/G Leenjii</option>
                          <option value="Dorgommii Guddatootaa ">Dorgommii SLG </option>
                          <option value="Dorgommii Guddatootaa ">Dorgommii Dubartoota </option>
                          <option value="Dorgommii Guddatootaa ">Dorgommii Federeshinii</option>
                                                           
                                                      </select>

                      </div>
                    </div>

                    <div class="col-sm-4">
                      <!-- select -->
                      <div class="form-group">
                       <label>Sadarkaa Dorgommii</label>
                          <select  class="form-control" name="sadarka" id="sadarka" required onchange = "java_script_:uu(this.options[this.selectedIndex].value)" >
                          <option value="">-- Select  --</option>
                          <option value="Ganda">Sadarkaa Ganda</option>
                          <option value="Aanaa">Sadarkaa Aanaa</option>
                          <option value="Godina">Sadarkaa Godiinaa</option>
                          <option value="A/K/Magaalaa">Sadarkaa A/K/Magaalaa</option>
                          <option value="K/Magaalaa">Sadarkaa K/Magaalaa</option>
                          <option value="Magaalaa">Sadarkaa Magaalaa</option>
                          <option value="Naannoo">Sadarkaa Naannoo</option>
                                                          
                                                      </select>

                      </div>
                    </div>



                </div>
                    <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group" id="godiina" style="display: none;">
                        <label>Godiina</label>
                          <select  class="form-control" name="zone_id" id="zone" >
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
                          <select class="form-control"name="woreda_id" id="woreda" >
                           <option value="">-- Select  --</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group" id="ganda" style="display: none;">
                        <label>Ganda</label>
                          <select class="form-control" name="ganda_id" id="kebele" >
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
                          <select class="form-control"name="akmagala_id" id="subcity_woreda" >
                           <option value="">-- Select  --</option>
                        </select>
                      </div>
                    </div>
                    


                  </div>


<div class="box box-solid box-default col-sm-12 col-sm-12 no-padding">
                      <div class="box-header with-border">
                        <h5 class="box-title"><i class="fa fa-save"></i> Baayina Ispoortessa
                        </h5>
                      </div>
                    </div>

             <div class="row">
                    <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhiira</label>
                    <input type="text" name="isp_dhi" id="one" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhalaa</label>
                    <input type="text" name="isp_dha" id="two" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Ida'ama</label>
                     <input type="text" name="isp_ida" id="sum" onclick="addFunction()" class="form-control">
                    </div>
                    </div>
                                </div>


<div class="box box-solid box-default col-sm-12 col-sm-12 no-padding">
                      <div class="box-header with-border">
                        <h5 class="box-title"><i class="fa fa-save"></i> Baayina Leenjisa/tu
                        </h5>
                      </div>
                    </div>

             <div class="row">
                    <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhiira</label>
                    <input type="text" name="len_dhi" id="one2" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhalaa</label>
                    <input type="text" name="len_dha" id="two2" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Ida'ama</label>
                     <input type="text" name="len_ida" id="sum2" onclick="addFunction2()" class="form-control">
                    </div>
                    </div>
                                </div>
                 
               
<div class="box box-solid box-default col-sm-12 col-sm-12 no-padding">
                      <div class="box-header with-border">
                        <h5 class="box-title"><i class="fa fa-save"></i> Baayina Dursa Garee
                        </h5>
                      </div>
                    </div>
<div class="row">
                    <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhiira</label>
                    <input type="text" name="dur_dhi" id="one3" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhalaa</label>
                    <input type="text" name="dur_dha" id="two3" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Ida'ama</label>
                     <input type="text" name="dur_ida" id="sum3" onclick="addFunction3()" class="form-control">
                    </div>
                    </div>
                                </div>
               
   
 <div class="box box-solid box-default col-sm-12 col-sm-12 no-padding">
                      <div class="box-header with-border">
                        <h5 class="box-title"><i class="fa fa-save"></i> Miseensaa Biroo
                        </h5>
                      </div>
                    </div>                     
                    
<div class="row">
                    <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhiira</label>
                    <input type="text" name="bir_dhi" id="one4" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhalaa</label>
                    <input type="text" name="bir_dha" id="two4" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Ida'ama</label>
                     <input type="text" name="bir_ida" id="sum4" onclick="addFunction4()" class="form-control">
                    </div>
                    </div>
                                </div>


  <div class="box box-solid box-default col-sm-12 col-sm-12 no-padding">
                      <div class="box-header with-border">
                        <h5 class="box-title"><i class="fa fa-save"></i> Ida’amaa
                        </h5>
                      </div>
                    </div>                   
<div class="row">
                    <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhiira</label>
                    <input type="text" name="id_dhi" id="one5" onclick="addFunction5()" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhalaa</label>
                    <input type="text" name="id_dha" id="two5" onclick="addFunction6()" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Ida'ama</label>
                     <input type="text" name="id_ida" id="sum5" onclick="addFunction7()" class="form-control">
                    </div>
                    </div>
                                </div>
                  
                  
                 
   
                                    </div>
                                    <div class="modal-footer">
                                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary"><i class="fa fa-save">   Save</i></button>
                                    </div>
                              </form>
                        </div>
                        <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->


      <div class="page-content">
  



<div class="container-fluid">
      <h3 class="box-title"><i class="fa fa-plus-square">Ragaa Hirmaatootaa Dorgommii TGO/Manneen Barnootaa/Aadaa/Guddatootaa sadarkaa ganda irraa kaase hanga godina/Magaalaatti jiru</i></h3>


<div class="box box-default">
          <div class="box-header with-border">
            <button type="button"  data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-plus-square btn btn-primary">Hirmaattoota Dabali</i>
      </button>
</div>
          
           
            <div class="box-body">
            <!-- <div id="dvContents" style="border: 1px dotted black; padding: 5px; width:305px"> -->
                 <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            <thead  class="thead-success">
                  <tr role="row">
                    <tr>
                    
                    <td rowspan="2" style="text-align: center;">NO</td>
                    <td rowspan="2" style="text-align: center;">Dorgommii</td>
                    <td rowspan="2" style="text-align: center;">Baayina Gosa Isp.</td>
                    <td rowspan="2" style="text-align: center;">Sadarkaa</td>
                    <td rowspan="2" style="text-align: center;">Godina</td>
                    <td rowspan="2" style="text-align: center;">Aanaa</td>
                    <td rowspan="2" style="text-align: center;">Ganda</td>
                    <td colspan="3" style="text-align: center;">Baayina Ispoorte</td>
                    <td colspan="3" style="text-align: center;">Baayina Leenjista/tu</td>
                    <td colspan="3" style="text-align: center;">Baayina Dursa Garee</td>
                    <td colspan="3" style="text-align: center;">Miseensaa Biroo</td>
                    <td colspan="3" style="text-align: center;">Ida’amaa Walii Galaa</td>  
                    <td rowspan="2" style="text-align: center;">Action</td>
                   
                  </tr> 
                        <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 35.733px;" aria-label="Browser: activate to sort column ascending">NO</th> -->
                        <!-- <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Dorgommii</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Baayina Gosa Isp.</th>

                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Sadarkaa</th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Godina</th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Aanaa</th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Ganda</th>
                     -->
                    
                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Dhi.</th>
                    
                       <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Dha.</th>
                       <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Ida.</th>


                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Dhi.</th>
                    
                       <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Dha.</th>
                       <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Ida.</th>

                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Dhi.</th>
                    
                       <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Dha.</th>
                       <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Ida.</th>

                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Dhi.</th>
                    
                       <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Dha.</th>
                       <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Ida.</th>

                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Dhi.</th>
                    
                       <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Dha.</th>
                       <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Ida.</th>
                      
                         <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200.417px;" aria-label="CSS grade: activate to sort column ascending">Action</th>  </tr> -->
            </thead>
                        <tbody>
                              <?php
                              $no = 0;
                              foreach ($this->mk->getHirmaattoota() as $row) {
                                    $no++;
                                    ?>
                                    <tr role="row" class="odd">
                                          <td> <?php echo $no; ?></td>
                                          <td><?php echo $row->dorgomi; ?></td>
                                          <td><?php echo $row->number; ?></td>
                                          <td><?php echo $row->sadarka; ?></td>
                                         <td><?php echo $row->zname . ' ' . $row->cname  ; ?></td>
                                          <td><?php echo $row->woreda_name. ' ' . $row->subcity_name; ?></td>
                                    <td><?php echo $row->kname. ' ' . $row->sbw_name; ?></td> 
                                          <td><?php echo $row->isp_dhi; ?></td>
                                          <td><?php echo $row->isp_dha; ?></td>
                                          <td><?php echo $row->isp_ida; ?></td>
                                          <td><?php echo $row->len_dhi; ?></td>
                                          <td><?php echo $row->len_dha; ?></td>
                                          <td><?php echo $row->len_ida; ?></td>
                                          <td><?php echo $row->dur_dhi; ?></td>
                                          <td><?php echo $row->dur_dha; ?></td>
                                          <td><?php echo $row->dur_ida; ?></td>
                                          <td><?php echo $row->bir_dhi; ?></td>
                                          <td><?php echo $row->bir_dha; ?></td>
                                          <td><?php echo $row->bir_ida; ?></td>
                                          <td><?php echo $row->id_dhi; ?></td>
                                          <td><?php echo $row->id_dha; ?></td>
                                          <td><?php echo $row->id_ida; ?></td>
                                          
                                         
                                          <td>
                                                <a class="btn btn-sm btn-danger" href="<?php echo base_url('MSport/Delete_Hirmaattoota/' . $row->hir_id) ?>"onclick="return confirm('Are you sure To Delete ?')"><i class="fa fa-trash"></i></a>

                                                <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-default<?php echo $row->hir_id; ?>" onclick="return confirm('Are you sure To Edit ?')"><i class="fa fa-edit"></i></a>
                                          </td>
                                    </tr>


                              <div class="modal fade" id="modal-default<?php echo $row->hir_id; ?>">
                                    <div class="modal-dialog">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                      <h4 class="modal-title">Edit Wiirtuu</h4>
                                                </div>
                                                <div class="modal-body">
            <form action="<?php echo base_url('MSport/Edit_Hirmaattoota/' . $row->hir_id) ?>"method="post">


   
                    <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                       <label>Godiina/Magaala</label>
                          <select  class="form-control" name="zone_id" id="zone" >
                                                             <option value="">-- Select  --</option>
                                                            <?php
                                                            foreach ($this->b->getzone() as $row) {
                                                                  ?>

                                                                  <option value="<?php echo $row->zid ?>"><?php echo $row->zname; ?></option>
                                                            <?php } ?>
                                                      </select>

                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">

                          <label>Baayina Gosa Isp.</label>
                       <input type="number" name="number"  class="form-control" />

                        </div>
                    </div>

                  </div>

<div class="box box-solid box-default col-sm-12 col-sm-12 no-padding">
                      <div class="box-header with-border">
                        <h5 class="box-title"><i class="fa fa-save"></i> Baayina Ispoorte
                        </h5>
                      </div>
                    </div>

             <div class="row">
                    <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhiira</label>
                    <input type="text" name="isp_dhi" id="isp_dhi" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhalaa</label>
                    <input type="text" name="isp_dha" id="isp_dha" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Ida'ama</label>
                     <input type="text" name="isp_ida" id="esum" onclick="eaddFunction()" class="form-control">
                    </div>
                    </div>
                                </div>


<div class="box box-solid box-default col-sm-12 col-sm-12 no-padding">
                      <div class="box-header with-border">
                        <h5 class="box-title"><i class="fa fa-save"></i> Baayina Leenjisa/tu
                        </h5>
                      </div>
                    </div>

             <div class="row">
                    <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhiira</label>
                    <input type="text" name="len_dhi" id="eone2" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhalaa</label>
                    <input type="text" name="len_dha" id="etwo2" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Ida'ama</label>
                     <input type="text" name="len_ida" id="esum2" onclick="eaddFunction2()" class="form-control">
                    </div>
                    </div>
                                </div>
                 
               
<div class="box box-solid box-default col-sm-12 col-sm-12 no-padding">
                      <div class="box-header with-border">
                        <h5 class="box-title"><i class="fa fa-save"></i> Baayina Dursa Garee
                        </h5>
                      </div>
                    </div>
<div class="row">
                    <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhiira</label>
                    <input type="text" name="dur_dhi" id="eone3" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhalaa</label>
                    <input type="text" name="dur_dha" id="etwo3" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Ida'ama</label>
                     <input type="text" name="dur_ida" id="esum3" onclick="eaddFunction3()" class="form-control">
                    </div>
                    </div>
                                </div>
               
   
 <div class="box box-solid box-default col-sm-12 col-sm-12 no-padding">
                      <div class="box-header with-border">
                        <h5 class="box-title"><i class="fa fa-save"></i> Miseensaa Biroo
                        </h5>
                      </div>
                    </div>                     
                    
<div class="row">
                    <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhiira</label>
                    <input type="text" name="bir_dhi" id="eone4" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhalaa</label>
                    <input type="text" name="bir_dha" id="etwo4" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Ida'ama</label>
                     <input type="text" name="bir_ida" id="esum4" onclick="eaddFunction4()" class="form-control">
                    </div>
                    </div>
                                </div>


  <div class="box box-solid box-default col-sm-12 col-sm-12 no-padding">
                      <div class="box-header with-border">
                        <h5 class="box-title"><i class="fa fa-save"></i> Ida’amaa
                        </h5>
                      </div>
                    </div>                   
<div class="row">
                    <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhiira</label>
                    <input type="text" name="id_dhi" id="eone5" onclick="eaddFunction5()" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhalaa</label>
                    <input type="text" name="id_dha" id="etwo5" onclick="eaddFunction6()" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Ida'ama</label>
                     <input type="text" name="id_ida" id="esum5" onclick="eaddFunction7()" class="form-control">
                    </div>
                    </div>
                                </div>
                  
           
   

                                                            </div>
                                                            <div class="modal-footer">
                                                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                                  <button type="submit" class="btn btn-primary"><i class="fa fa-edit">   Edit</i></button>
                                                            </div>
                                                    </form>
                                              </div>
                                        </div>
                                  </div>
                            </div>



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

<script type="text/javascript">
  function ageval() {
               var res = document.getElementById("age").value;

               if (res<14 || res > 35)
                   alert("Dargaggoo waggaa 14 Olii fi 35 gadii qofa galchaa Maaloo! ");
             return false;

           }
      
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

<script>
$(document).ready(function(){
 $('#zone').change(function(){
  var zid = $('#zone').val();
  if(zid != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>Sport/fetch_state",
    method:"POST",
    data:{zid:zid},
    success:function(data)
    {
     $('#woreda').html(data);
     $('#kebele').html('<option value="">Aanaa Fili</option>');
    }
   });
  }
  else
  {
   $('#woreda').html('<option value="">Aanaa Fili</option>');
   $('#kebele').html('<option value="">Ganda Fili</option>');
  }
 });

 $('#woreda').change(function(){
  var woreda_id = $('#woreda').val();
  if(woreda_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>Sport/fetch_city",
    method:"POST",
    data:{woreda_id:woreda_id},
    success:function(data)
    {
     $('#kebele').html(data);
    }
   });
  }
  else
  {
   $('#kebele').html('<option value="">Ganda Fili</option>');
  }
 });
 
});
</script>

<script>
$(document).ready(function(){
 $('#city').change(function(){
  var cid = $('#city').val();
  if(cid != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>Sport/fetch_subcity",
    method:"POST",
    data:{cid:cid},
    success:function(data)
    {
     $('#subcity').html(data);
     $('#subcity_woreda').html('<option value="">Aanaa K/M Fili</option>');
    }
   });
  }
  else
  {
   $('#subcity').html('<option value="">Kutaa Magaalaa Fili</option>');
   $('#subcity_woreda').html('<option value="">A/K/M Fili</option>');
  }
 });

 $('#subcity').change(function(){
  var subcity_id = $('#subcity').val();
  if(subcity_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>Sport/fetch_subcitywd",
    method:"POST",
    data:{subcity_id:subcity_id},
    success:function(data)
    {
     $('#subcity_woreda').html(data);
    }
   });
  }
  else
  {
   $('#subcity_woreda').html('<option value="">Aanaa  Fili</option>');
  }
 });
 
});
</script>

<script type="text/javascript" src="<?php echo base_url();?>dist3/js/jquery.min.js"></script>

<script type="text/javascript">
    function addFunction() {//  ww w. j av a 2  s  .  c o m
    var x = parseInt(document.getElementById("one").value);
    var y = parseInt(document.getElementById("two").value);
    var sum=x+y;
    document.getElementById("sum").value = sum;

}
</script>
<script type="text/javascript">
    function addFunction2() {//  ww w. j av a 2  s  .  c o m
    var x = parseInt(document.getElementById("one2").value);
    var y = parseInt(document.getElementById("two2").value);
    var sum2=x+y;
    document.getElementById("sum2").value = sum2;

}
</script>
<script type="text/javascript">
    function addFunction3() {//  ww w. j av a 2  s  .  c o m
    var x = parseInt(document.getElementById("one3").value);
    var y = parseInt(document.getElementById("two3").value);
    var sum3=x+y;
    document.getElementById("sum3").value = sum3;

}
</script>
<script type="text/javascript">
    function addFunction4() {//  ww w. j av a 2  s  .  c o m
    var x = parseInt(document.getElementById("one4").value);
    var y = parseInt(document.getElementById("two4").value);
    var sum4=x+y;
    document.getElementById("sum4").value = sum4;

}
</script>
<script type="text/javascript">
    function addFunction5() {//  ww w. j av a 2  s  .  c o m
    var q = parseInt(document.getElementById("one").value);
    var w = parseInt(document.getElementById("one2").value);
    var e = parseInt(document.getElementById("one3").value);
    var r = parseInt(document.getElementById("one4").value);
    var sum5=q+w+e+r;
    document.getElementById("one5").value = sum5;

}
</script>
<script type="text/javascript">
    function addFunction6() {//  ww w. j av a 2  s  .  c o m
     var q = parseInt(document.getElementById("two").value);
    var w = parseInt(document.getElementById("two2").value);
    var e = parseInt(document.getElementById("two3").value);
    var r = parseInt(document.getElementById("two4").value);
   var sum6=q+w+e+r;
    document.getElementById("two5").value = sum6;

}
</script>
<script type="text/javascript">
    function addFunction7() {//  ww w. j av a 2  s  .  c o m
    var x = parseInt(document.getElementById("one5").value);
    var y = parseInt(document.getElementById("two5").value);
    var sum7=x+y;
    document.getElementById("sum5").value = sum7;

}

    function eaddFunction() {//  ww w. j av a 2  s  .  c o m
    var f = parseInt(document.getElementById("eone").value);
    var g = parseInt(document.getElementById("etwo").value);
    var h=f+g;
    document.getElementById("esum").value = h;

}
</script>
<script type="text/javascript">
    function eaddFunction2() {//  ww w. j av a 2  s  .  c o m
    var x = parseInt(document.getElementById("eone2").value);
    var y = parseInt(document.getElementById("etwo2").value);
    var sum2=x+y;
    document.getElementById("esum2").value = sum2;

}
</script>
<script type="text/javascript">
    function eaddFunction3() {//  ww w. j av a 2  s  .  c o m
    var x = parseInt(document.getElementById("eone3").value);
    var y = parseInt(document.getElementById("etwo3").value);
    var sum3=x+y;
    document.getElementById("esum3").value = sum3;

}
</script>
<script type="text/javascript">
    function eaddFunction4() {//  ww w. j av a 2  s  .  c o m
    var x = parseInt(document.getElementById("eone4").value);
    var y = parseInt(document.getElementById("etwo4").value);
    var sum4=x+y;
    document.getElementById("esum4").value = sum4;

}
</script>
<script type="text/javascript">
    function eaddFunction5() {//  ww w. j av a 2  s  .  c o m
    var q = parseInt(document.getElementById("eone").value);
    var w = parseInt(document.getElementById("eone2").value);
    var e = parseInt(document.getElementById("eone3").value);
    var r = parseInt(document.getElementById("eone4").value);
    var sum5=q+w+e+r;
    document.getElementById("eone5").value = sum5;

}
</script>
<script type="text/javascript">
    function eaddFunction6() {//  ww w. j av a 2  s  .  c o m
     var q = parseInt(document.getElementById("etwo").value);
    var w = parseInt(document.getElementById("etwo2").value);
    var e = parseInt(document.getElementById("etwo3").value);
    var r = parseInt(document.getElementById("etwo4").value);
   var sum6=q+w+e+r;
    document.getElementById("etwo5").value = sum6;

}
</script>
<script type="text/javascript">
    function eaddFunction7() {//  ww w. j av a 2  s  .  c o m
    var x = parseInt(document.getElementById("eone5").value);
    var y = parseInt(document.getElementById("etwo5").value);
    var sum7=x+y;
    document.getElementById("esum5").value = sum7;

}
</script>


<script>
       function uu(sadarka) {
        if (sadarka == "Ganda") {
            
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
            if (sadarka == "Aanaa") {
                 godiina.style.display = 'block';
                aanaa.style.display = 'block';
                ganda.style.display = 'none';
                magaalaa.style.display = 'none';
                kmagaalaa.style.display = 'none';
                akmagaalaa.style.display = 'none';
             
            $('#Godina').attr('required', 'required');
            $('#Magaaalaa').attr('required', false);
            $('#dhalotaM_id').val(null); 
            $('#dhalotaKM_id').val(null);
            $('#dhalotaAKM_id').val(null); 
           }
            else
            if (sadarka == "Godina") {
                 godiina.style.display = 'block';
                aanaa.style.display = 'none';
                ganda.style.display = 'none';
                magaalaa.style.display = 'none';
                kmagaalaa.style.display = 'none';
                akmagaalaa.style.display = 'none';
             
            $('#Godina').attr('required', 'required');
            $('#Magaaalaa').attr('required', false);
            $('#dhalotaM_id').val(null); 
            $('#dhalotaKM_id').val(null);
            $('#dhalotaAKM_id').val(null); 
           }
           else
            if (sadarka == "A/K/Magaalaa") {
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
                     
           }  else
            if (sadarka == "K/Magaalaa") {
                magaalaa.style.display = 'block';
                kmagaalaa.style.display = 'block';
                akmagaalaa.style.display = 'none';
                godiina.style.display = 'none';
                aanaa.style.display = 'none';
                ganda.style.display = 'none';
                
               
                $('#Magaaalaa').attr('required', 'required');
                $('#Godina').attr('required', false);
                $('#dhalotaG_id').val(null); 
                $('#dhalotaKA_id').val(null);
                $('#dhalotaK_id').val(null);
                     
           }  else
            if (sadarka == "Magaalaa") {
                magaalaa.style.display = 'block';
                kmagaalaa.style.display = 'none';
                akmagaalaa.style.display = 'none';
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
            if (sadarka == "Naannoo") {
                magaalaa.style.display = 'none';
                kmagaalaa.style.display = 'none';
                akmagaalaa.style.display = 'none';
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
