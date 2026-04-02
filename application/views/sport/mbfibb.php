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
                              <h4 class="modal-title">Manneen  Barnootaa fi Lakkoobsa Barattoota </h4>
                        </div>
                        <div class="modal-body">
                              <form action="<?php echo base_url('Sport/save_mbfibb') ?>"method="post">

                     
                  
                    
      <div class="row">
        <div class=" col-sm-6">
            <div class="form-group" >
                        <label>Teessoo</label>
                          <select class="form-control" name="teessoo" required onchange = "java_script_:uu(this.options[this.selectedIndex].value)" >
                                <option value="">-- Magaalaa Ykn Godina Filaadhu  --</option>
                                        <option value="Magaaalaa" >Bulchiinsa Magaalaa</option>
                                        <option value="Godina" >Godina</option>
                                              

                                       </select>
                      </div>
              
</div>

                   
                    <div class="col-sm-6">
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
               
                    <div class="col-sm-6">
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
         
                    

                  </div>




<div class="box box-solid box-default col-sm-12 col-sm-12 no-padding">
                     
                        <h5 class="box-title"><i class="fa fa-save"></i> Baay’ina Mana Barnootaa
                        </h5>
                    </div>

             <div class="row">
                    <div class="col-sm-3">        
                  <div class="form-group">

                    <label>KG</label>
                    <input type="number" name="kg" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-3">        
                  <div class="form-group">

                    <label>Sad.1ffaa</label>
                    <input type="number" name="tokkofa" class="form-control">
                    </div>
                    </div>

                    <div class="col-sm-3">        
                  <div class="form-group">

                    <label>Sad.2ffaa</label>
                    <input type="number" name="lammafa" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-3">        
                  <div class="form-group">

                    <label>Dha.Bar/ Ol’anaa</label>
                     <input type="number" name="olana" class="form-control">
                    </div>
                    </div>
                                </div>




<div class="box box-solid box-default col-sm-12 col-sm-12 no-padding">
                     
                        <h5 class="box-title"><i class="fa fa-save"></i> Baayina Barattootaa Olmaa Da’immanii (KG)
                        </h5>
                    </div>

             <div class="row">
                    <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhiira</label>
                    <input type="number" name="kg_dhi" id="one" class="form-control" >
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhalaa</label>
                    <input type="number" name="kg_dha" id="two" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Ida'ama</label>
                     <input type="number" name="kg_ida" placeholder="click for total" id="sum" onclick="addFunction()" class="form-control" readonly>
                    </div>
                    </div>
                                </div>



<div class="box box-solid box-default col-sm-12 col-sm-12 ">
                        <h5 class="box-title"><i class="fa fa-save"></i> Baayina Barattootaa Sad.1ffaa
                        </h5>
                    </div>

             <div class="row">
                    <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhiira</label>
                    <input type="number" name="tk_dhi" id="one1" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhalaa</label>
                    <input type="number" name="tk_dha" id="two1" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Ida'ama</label>
                     <input type="number" name="tk_ida" id="sum1" placeholder="click for total" onclick="addFunction1()" class="form-control" readonly>
                    </div>
                    </div>
                                </div>



<div class="box box-solid box-default col-sm-12 col-sm-12 no-padding">
                        <h5 class="box-title"><i class="fa fa-save"></i> Baayina Barattootaa Sad.2ffaa
                        </h5>
                    </div>

             <div class="row">
                    <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhiira</label>
                    <input type="number" name="lm_dhi" id="one2" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhalaa</label>
                    <input type="number" name="lm_dha" id="two2" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Ida'ama</label>
                     <input type="number" name="lm_ida" id="sum2" placeholder="click for total" onclick="addFunction2()" class="form-control" readonly>
                    </div>
                    </div>
                                </div>



<div class="box box-solid box-default col-sm-12 col-sm-12 no-padding">
                        <h5 class="box-title"><i class="fa fa-save"></i> Baayina Barattootaa Dha.Bar. Ol’anaa

                        </h5>
                    </div>

             <div class="row">
                    <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhiira</label>
                    <input type="number" name="ol_dhi" id="one3" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Dhalaa</label>
                    <input type="number" name="ol_dha" id="two3" class="form-control">
                    </div>
                    </div>

                     <div class="col-sm-4">        
                  <div class="form-group">

                    <label>Ida'ama</label>
                     <input type="number" name="ol_ida" id="sum3" placeholder="click for total" onclick="addFunction3()" class="form-control" readonly>
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
      <h3 class="box-title"><i class="fa fa-plus-square">Ragaa Baay’ina Manneen  Barnootaa fi Lakkoobsa Barattoota akka Godina/Bul.Magalaa keessaniitti  jiru </i></h3>


<div class="box box-default">
          <div class="box-header with-border">
            <button type="button"  data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-plus-square btn btn-primary">Ragaa M/B fi Barattootaa Dabali</i>
      </button>
            <b>
        <input style=" float: right;  display: block;  color: black;  text-align: left;  padding: 5px 6px;   font-size: 17px;" id="gfg" type="search" placeholder="Asii Barbaadii"> 
    </b>
    <!-- <input type="button" onclick="PrintTable();" value="Print"/> -->
    <button type="button" onclick="PrintTable();" value="Print" >
            <i class="fa fa-save btn btn-success">Print</i>
      </button>
</div>
    
          
  
            <div class="box-body">
           <div id="dvContents" style="border: 1px dotted black; padding: 5px;">

                  <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead style="background-color: #666666; color: white">
                              <tr role="row">
                                    <tr>
                    
                    <td rowspan="3" style="text-align: center;">NO</td>
                    <td rowspan="3" style="text-align: center;">Teessoo</td>
                    <td rowspan="3" style="text-align: center;">Godina/Magaala</td>
                    <td colspan="4" rowspan="2" style="text-align: center;">Baay’ina Mana Barnootaa</td>
                    <td colspan="12" rowspan="1" style="text-align: center;">Baay’ina Barattootaa</td>
                    <td rowspan="3" style="text-align: center;">Action</td>

                    
                  </tr> 
                                <tr>
                    <td colspan="3" style="text-align: center;">KG</td>
                    <td colspan="3" style="text-align: center;">Sad.1ffaa</td>
                    <td colspan="3" style="text-align: center;">Sad.2ffaa</td>
                    <td colspan="3" style="text-align: center;">Dha.Bar/ Ol’anaa</td>
                    
                  </tr>   
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">KG</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Sad.1ffaa</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Sad.2ffaa</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Dha.Bar/ Ol’anaa</th>

                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="2" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Dhi</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Dha</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Ida</th>
                                   <th class="sorting" tabindex="0" aria-controls="example1" rowspan="2" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Dhi</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Dha</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Ida</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="2" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Dhi</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Dha</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Ida</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="2" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Dhi</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Dha</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Ida</th>
                                    
                                    <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">Action</th> -->
                                    </tr>
                        </thead>
                        <tbody id="geeks">
 <?php
                              $no = 0;
                              foreach ($this->k->getmbfibb() as $row) {
                                    $no++;
                                    ?>
                                    <tr role="row" class="odd">
                                          <td> <?php echo $no; ?></td>
                                           <td><?php echo $row->teessoo; ?></td>
                                         <td><?php echo $row->zname . ' ' . $row->cname  ; ?></td><td><?php echo $row->kg; ?></td>
                                          <td><?php echo $row->tokkofa; ?></td>
                                          <td><?php echo $row->lammafa; ?></td>
                                          <td><?php echo $row->olana; ?></td>
                                          <td><?php echo $row->kg_dhi; ?></td>
                                          <td><?php echo $row->kg_dha; ?></td>
                                          <td><?php echo $row->kg_ida; ?></td>
                                          <td><?php echo $row->tk_dhi; ?></td>
                                          <td><?php echo $row->tk_dha; ?></td>
                                          <td><?php echo $row->tk_ida; ?></td>
                                          <td><?php echo $row->lm_dhi; ?></td>
                                          <td><?php echo $row->lm_dha; ?></td>
                                          <td><?php echo $row->lm_ida; ?></td>
                                          <td><?php echo $row->ol_dhi; ?></td>
                                          <td><?php echo $row->ol_dha; ?></td>
                                          <td><?php echo $row->ol_ida; ?></td>
                                          
                                         
                                          <td>
                                                  <a class="btn btn-sm btn-danger" href="<?php echo base_url('Sport/Delete_mbfibb/' . $row->mb_id) ?>"onclick="return confirm('Are you sure To Delete ?')"><i class="fa fa-trash"></i></a>
                                            
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

<script type="text/javascript">
    function PrintTable() {
        var printWindow = window.open('', '', 'height=200,width=400');
        printWindow.document.write('<html><head><title>Ragaa Baay’ina Manneen  Barnootaa fi Lakkoobsa Barattoota akka Godina/Bul.Magalaa keessaniitti  jiru</title>');
 
        //Print the Table CSS.
        var table_style = document.getElementById("table_style").innerHTML;
        printWindow.document.write('<style type = "text/css">');
        printWindow.document.write(table_style);
        printWindow.document.write('</style>');
        printWindow.document.write('</head>');
 
        //Print the DIV contents i.e. the HTML Table.
        printWindow.document.write('<body>');
        var divContents = document.getElementById("dvContents").innerHTML;
        printWindow.document.write(divContents);
        printWindow.document.write('</body>');
 
        printWindow.document.write('</html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>

<style id="table_style" type="text/css">
    body
    {
        font-family: Arial;
        font-size: 10pt;
    }
    table
    {
        border: 1px solid #ccc;
        border-collapse: collapse;
    }
    table th
    {
        background-color: #F7F7F7;
        color: #333;
        font-weight: bold;
    }
    table th, table td
    {
        padding: 5px;
        border: 1px solid #ccc;
    }
</style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 
<script>
        $(document).ready(function () {
            $("#gfg").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#geeks tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
<script type="text/javascript">
  function ageval() {
               var res = document.getElementById("age").value;

               if (res<14 || res > 35)
                   alert("Dargaggoo waggaa 14 Olii fi 35 gadii qofa galchaa Maaloo! ");
             return false;

           }
      
   </script>

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
    function addFunction1() {//  ww w. j av a 2  s  .  c o m
    var x = parseInt(document.getElementById("one1").value);
    var y = parseInt(document.getElementById("two1").value);
    var sum1=x+y;
    document.getElementById("sum1").value = sum1;

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
    function addFunction() {//  ww w. j av a 2  s  .  c o m
    var x = parseInt(document.getElementById("one").value);
    var y = parseInt(document.getElementById("two").value);
    var sum=x+y;
    document.getElementById("sum").value = sum;

}
</script>
<script>
       function uu(sadarka) {
        if (sadarka == "Godina") {
            
                godiina.style.display = 'block';
               magaalaa.style.display = 'none';
               
            $('#Godina').attr('required', 'required');
            $('#Magaaalaa').attr('required', false);
            $('#dhalotaM_id').val(null); 
            $('#dhalotaKM_id').val(null);
            $('#dhalotaAKM_id').val(null); 
            
            
        } else
            if (sadarka == "Magaaalaa") {
                magaalaa.style.display = 'block';
                godiina.style.display = 'none';
                
               
                $('#Magaaalaa').attr('required', 'required');
                $('#Godina').attr('required', false);
                $('#dhalotaG_id').val(null); 
                $('#dhalotaKA_id').val(null);
                $('#dhalotaK_id').val(null);
                     
           }
           
            else
            if (sadarka == "") {
                godiina.style.display = 'none';
                magaalaa.style.display = 'none';
               
               
               
           }
            else {
                godiina.style.display = 'none';
                magaalaa.style.display = 'none';
               
               
            }

    }
</script>
