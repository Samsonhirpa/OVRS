
<div class="content-wrapper">
  <div class="col-sm-12">  
        <div class="wrap-fpanel">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        <strong> <h3 class="box-title">Update information of :</h3></strong>
                    </div>
                </div>
                <div class="row">
               
                </div>
                <div class="panel-body">
    <div class="row">
      <div class="col col-md-12">
        <form role="form" action="<?php echo base_url('usercontroller/updatepatient/'.$patientinfo->id);?>" method="post">
          <div class="box box-solid box-info col-xs-12 col-lg-12 no-padding">
      <div class="box-header with-border">
         <h4 class="box-title"> Patient Info</h4>
      </div>
          <table class="table table-striped table-bordered table-hover table-danger" border="5">
                
                <tr>
                  
                 <td><?php echo $this->lang->line('dor_menu')?>
                 <input class="form-control" type="date" id="exampleInputFile" name="dor" value="<?php echo $patientinfo->dor;?>" required>
                </td>
                <td>Full name
                 <input class="form-control" type="text" id="exampleInputFile" name="name" value="<?php echo $patientinfo->name;?>" required>
                </td>
                <td>Gender
                <select class="form-control"name="gender" value="<?php echo $patientinfo->gender;?>" required>
                  <?php 
                  foreach ($this->m->getgender() as $row) {
                  
                 
                  ?>

                  <option value="<?php echo $row->id?>"><?php echo $row->g_name;?></option>
<?php  } ?>
                </select>
                </td>
                <td>Age
                 <input class="form-control" type="text" id="exampleInputFile" name="age" value="<?php echo $patientinfo->age;?>" required>
                </td>
                <td>Address
                 <input class="form-control" type="text" id="exampleInputFile" name="address" value="<?php echo $patientinfo->address;?>" required>
                </td>
                <td>Relationship Status
                 <input class="form-control" type="text" id="exampleInputFile" name="relationship" value="<?php echo $patientinfo->relationship;?>"required>
                </td>
                
              </tr>
                    </table>
                  </div>

                  <div class="box box-solid box-info col-xs-12 col-lg-12 no-padding">
      <div class="box-header with-border">
         <h4 class="box-title">Patient Vital sign</h4>
      </div>
                    <table> 
              
               <tr>
                  
                 <td>BP
                 <input class="form-control" type="text" id="exampleInputFile" name="bp" value="<?php echo $patientinfo->bp;?>" required>
                </td>
                <td>Temprature
                 <input class="form-control" type="text" id="exampleInputFile" name="temp" value="<?php echo $patientinfo->temp;?>" required>
                </td>
                <td>RR
                 <input class="form-control" type="text" id="exampleInputFile" name="rr" value="<?php echo $patientinfo->rr;?>" required>
                </td>
                <td>PR
                 <input class="form-control" type="text" id="exampleInputFile" name="pr" value="<?php echo $patientinfo->pr;?>" required>
                </td>
                 <td>Po2
                 <input class="form-control" type="text" id="exampleInputFile" name="po" value="<?php echo $patientinfo->po;?>" required>
                </td>
                
              </tr>
                </table>
              </div>
        <div class="box box-solid box-info col-xs-12 col-lg-12 no-padding">
      <div class="box-header with-border">
         <h4 class="box-title">Patient problem</h4>
      </div>
                    <table> 
              
               <tr>
                  
                 <td>Chief Compliant
                 <input class="form-control" type="text" id="exampleInputFile" name="compliant" value="<?php echo $patientinfo->compliant;?>" required>
                </td>
                <td>Plan
                 <input class="form-control" type="text" id="exampleInputFile" name="plan"value="<?php echo $patientinfo->plan;?>" required>
                </td>
                <td>Assesment
                 <input class="form-control" type="text" id="exampleInputFile" name="assesment" value="<?php echo $patientinfo->assesment;?>" required>
                </td>
                <td>RX
                 <input class="form-control" type="text" id="exampleInputFile" name="rx" value="<?php echo $patientinfo->rx;?>" required>
                </td>
                
              </tr>
                </table>
              </div>
               
           </td> 
            <div class="row">
                <div class="col col-md-12">
                  <input type="submit" class="btn btn-primary" value="Update"name="save">
                </div>
               </div>

            </form>

</div>
      </div>
  </div>
      </div>
  </div>


<script  type="text/javascript" src ="<?php echo base_url();?>js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(e)
{
  $("input").change(function()
  {
    var total=0;
    $("input[name=a_min_price]").each(function(){
      total=total+parseInt($(this).val());
    })
    $("input[name=a_max_price]").each(function(){
      total=total+parseInt($(this).val());
    })
    $("input[name=a_avg_price]").val(total/2);
  })
}
      )
  </script>





















