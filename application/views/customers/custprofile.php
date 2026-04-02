<div class="content-wrapper">
      <section class="content" style="min-height: 526px;">
            <div class="col-xs-12">
                  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-plus"></i>Detail Customer Information </h3></div>
            </div>





<div class="modal fade" id="modal-default1">
                                    <div class="modal-dialog">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                      <h4 class="modal-title">FINAL PAYMENT BANK TRANSFER RECEIT</h4>
                                                </div>
                                                <div class="modal-body">
                                           
           
<div class="form-group">
        <img  style="height: 400px; width: 575px;"  src="<?php echo base_url()?>upload/<?php echo $ntacustomers->file_name?>"  alt="not displaying">

</div>
<div class="row">
    <div class="col col-md-6">
  <div class="form-group">
    <label>Final Payment Ammount</label><br>
    <input class="form-control" type="text" name="finalpay" value="<?php echo $ntacustomers->finalpay;?>" required>
  </div>
</div>
  <div class="col col-md-6">
   <div class="form-group">
    <label> Payment Recieve By</label><br>
    <input class="form-control" type="text" name="bankinfoby" value="<?php echo $ntacustomers->bankinfoby;?>" required>
  </div>
</div>
    </div>
                                                            </div>
                                                           
                                                      </form>
                                                </div>
                                                <!-- /.modal-content -->
                                          </div>
                                          <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->







<div class="modal fade" id="modal-default">
                                    <div class="modal-dialog">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                      <h4 class="modal-title">PERMIT PAYMENT BANK TRANSFER RECEIT</h4>
                                                </div>
                                                <div class="modal-body">
                                           
           
<div class="form-group">
        <img  style="height: 400px; width: 575px;"  src="<?php echo base_url()?>uploadpp/<?php echo $ntacustomers->file_name1?>"  alt="not displaying">

</div>
<div class="row">
    <div class="col col-md-6">
  <div class="form-group">
    <label>Permit Payment Ammount</label><br>
    <input class="form-control" type="text" name="permitpay" value="<?php echo $ntacustomers->permitpay;?>" required>
  </div>
</div>
  <div class="col col-md-6">
   <div class="form-group">
    <label>Permit Payment Recieve By</label><br>
    <input class="form-control" type="text" name="permitpay" value="<?php echo $ntacustomers->permitpayby;?>" required>
  </div>
</div>
    </div>
                                                            </div>
                                                           
                                                      </form>
                                                </div>
                                                <!-- /.modal-content -->
                                          </div>
                                          <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->







            <div class="stu-master-create">
                  <style>
                        .box .box-solid {
                              background-color: #F8F8F8;
                        }
                  </style>

                  <script>
                        $(function () {
                              $('[data-toggle="popover"]').popover({placement: function () {
                                          return $(window).width() < 768 ? 'bottom' : 'right';
                                    }})
                        })
                  </script>
                  <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">

<form role="form" action="<?php echo base_url('Structure/update_customer/' .$ntacustomers->id); ?>" method="Post" enctype="multipart/form-data">


<div class="box-header with-border">

<div class="callout callout-info">
         <h4  class="box-title"> Detail Information Of :<?php echo $ntacustomers->fullname;?> </h4>
         
          
        </div>



            <div class="row">
  
                  <div class="col col-md-6">

                    <div class="form-group">
                        <label>Full Name</label>
                         <input class="form-control" type="text"  name="fullname" value="<?php echo $ntacustomers->fullname;?>">
                      </div>

 
                      <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="sex" required="">
                          <option value="<?php echo $ntacustomers->sex;?>"><?php echo $ntacustomers->sex;?></option>
                              <?php foreach ($this->str->getGender() as $row){
                                   ?>
                          <option value="<?php echo $row->gender_name;?>"><?php echo $row->gender_name;?></option>
                          <?php 
                           } ?>

                        </select>
                    </div>
                   
                      <div class="form-group">
                        <label>Mother Name</label>
                         <input class="form-control" type="text" value="<?php echo $ntacustomers->mothername;?>" name="mothername"  >
                      </div>
                   
                    
                
                      <div class="form-group">
                        <label>Phone Number</label>
                          <input type="text" name="phone"  class="form-control" value="<?php echo $ntacustomers->phone;?>" required>
                      </div>
                  
                      <div class="form-group">
                        <label>Phone Number2</label>
                          <input type="text" name="phone2" value="<?php echo $ntacustomers->phone2;?>" class="form-control"  >
                      </div>
                  
                       <div class="form-group">
                        <label>Profession</label>
                         <input class="form-control" type="text" value="<?php echo $ntacustomers->profession;?>" name="profession"  >
                      </div>
               
                 
                  </div>



               
  


                                                <!-- <div class="row"> -->
                  <div class="col col-md-6">

                  
                      <div class="form-group">
                        <label>Agent</label>
                         <select class="form-control" name="agent_id" required="">
                         <option style="text-align: center;" value="<?php echo $ntacustomers->c_name;?>"><?php echo $ntacustomers->c_name;?></option>
                          <?php foreach ($this->str->getcustomer() as $row){
                             ?>
                          <option value="<?php echo $row->c_id;?>"><?php echo $row->c_name;?></option>
                           <?php 
                            } ?>
                          </select>
                      </div>

                      <div class="form-group">
                        <label>Company Apply To</label>
                         <select class="form-control" name="company_id" required="">
                         <option style="text-align: center;" value="<?php echo $ntacustomers->p_name;?>"><?php echo $ntacustomers->p_name;?></option>
                          <?php foreach ($this->str->getproject() as $row){
                             ?>
                          <option value="<?php echo $row->p_id;?>"><?php echo $row->p_name;?></option>
                           <?php 
                            } ?>
                          </select>
                      </div>
               

                      <!-- select -->
                      <div class="form-group">
                        <label>Total Pay</label>
                         <input type="text" name="totalpayment" id="total" value="<?php echo $ntacustomers->totalpayment;?>" class="form-control" onchange="calcremaining()">
                      </div>
                 <div class="row">

          <div class="col col-md-6">
                      <div class="form-group">
                        <label>Down Paid</label>
                          <input type="text" name="downpayment" id="downpay" value="<?php echo $ntacustomers->downpayment;?>" class="form-control" >
                      </div>
                    </div>
                  
           <div class="col col-md-6">
                      <div class="form-group">
                        <label>Permit Payment</label>
                          <input type="text" name="permitpay"  value="<?php echo $ntacustomers->permitpay;?>" class="form-control"  readonly>
                      </div>
             </div>
           </div>

                      <div class="form-group">
                        <label>Remaining</label>
                          <input type="text" name="remaining"  value="<?php echo $ntacustomers->remaining;?>" class="form-control"  readonly>
                      </div>
                      <div class="form-group">
                        <label>Expire date of Crime Free card</label>
                          <input type="date" name="xdateofcrime" value="<?php echo $ntacustomers->xdateofcrime;?>"  class="form-control" >
                      </div>
                  
                  </div>
                                             

                                    </div>
        

<div class="box-header with-border" style="background-color: #EBEBEB">
         <div class="row">

         	<div class="col col-md-4">
 <div class="form-group">
 	<div class="form-group">
                        <h5>Registered By:&nbsp;&nbsp;<strong><?php echo $ntacustomers->operator;?></strong></h5>
                         
                      </div>
                   </div>
               </div>


   	<div class="col col-md-4">
 <div class="form-group">
 	<div class="form-group">
                        <h5>Permit Approved By:&nbsp;&nbsp;<strong><?php echo $ntacustomers->permitapprovedby;?></strong></h5>
                          <a class="btn btn-xs btn-success" data-toggle="modal" data-target="#modal-default" ><i class="fa fa-diamond">Permit Payment Reciet</i></a>
                      </div>
                   </div>
               </div>

   	<div class="col col-md-4">
 
 	<div class="form-group">
                        <h5>VISA Approved By:&nbsp;&nbsp;<strong><?php echo $ntacustomers->visaapprovedby;?></strong></h5>
      <a class="btn btn-xs btn-success" data-toggle="modal" data-target="#modal-default1" ><i class="fa fa-diamond">Final Payment Reciet</i></a>

      
                      </div>
                   </div>
             


         </div>
    
</div>
                               
                                          
                        </div>

                        
                         </div>
                       
                                  </form>
                                </div>
                              </div>
                            </div>
                          </section>
                  


 <script type="text/javascript">
       
function calcremaining() {

  var tot = parseFloat(document.getElementById("total").value);
 // parse float quantity
  var down = parseFloat(document.getElementById("downpay").value);
  var rem = tot - down ;
  //pass calculated value to input with id total
  document.getElementById("remaining").value =  rem;
 
}

</script>