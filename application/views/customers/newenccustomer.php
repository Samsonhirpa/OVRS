<div class="content-wrapper">
      <section class="content" style="min-height: 526px;">
            <div class="col-xs-12">
                  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-plus"></i>New Customer Information </h3></div>
            </div>


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
<form role="form" action="<?php echo base_url('Structure/save_enccustomer'); ?>" method="Post" enctype="multipart/form-data">



<div class="box-header with-border">

<div class="callout callout-info">
         <h4  class="box-title"> Register new Customer Information</h4>
         
          
        </div>



            <div class="row">
  
                  <div class="col col-md-6">

                       <div class="form-group">
                        <label>Full Name</label>
                         <input class="form-control" type="text"  name="fullname"  >
                      </div>

    
    
                      <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="sex" required="">
                          <option value="">-- Select  --</option>
                              <?php foreach ($this->str->getGender() as $row){
                                   ?>
                          <option value="<?php echo $row->gender_name;?>"><?php echo $row->gender_name;?></option>
                          <?php 
                           } ?>

                        </select>
                    </div>
                   
                      <div class="form-group">
                        <label>Mother Name</label>
                         <input class="form-control" type="text"  name="mothername"  >
                      </div>
                   
                    
                
                      <div class="form-group">
                        <label>Phone Number</label>
                          <input type="text" name="phone"  class="form-control" required>
                      </div>
                  
                      <div class="form-group">
                        <label>Phone Number2</label>
                          <input type="text" name="phone2"  class="form-control"  >
                      </div>
                  
                       <div class="form-group">
                        <label>Profession</label>
                         <input class="form-control" type="text"  name="profession"  >
                      </div>
               
                 
                  </div>



               
  


                                                <!-- <div class="row"> -->
                  <div class="col col-md-6">

                  
                      <div class="form-group">
                        <label>Agent</label>
                         <select class="form-control" name="agent_id" required="">
                         <option style="text-align: center;" value="">--  Select Agent  --</option>
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
                         <option style="text-align: center;" value="">--  Select Company  --</option>
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
                         <input type="text" name="totalpayment" id="total" class="form-control" onchange="calcremaining()">
                      </div>
                 
                      <div class="form-group">
                        <label>Down Paid</label>
                          <input type="text" name="downpayment" id="downpay" class="form-control" onchange="calcremaining()" >
                      </div>
                  
          
                      <div class="form-group">
                        <label>Remaining</label>
                          <input type="text" name="remaining" id="remaining" class="form-control"  readonly>
                      </div>
             <div class="row">
                 <div class="col col-md-6">
                 
            
                      <div class="form-group">
                        <label>Expire date of Crime Free card</label>
                          <input type="date" name="xdateofcrime" id="expire"  class="form-control" >
                      </div>

                       </div>
                         <div class="col col-md-6">
                       <div class="form-group">
                        <label>Notification date</label>
                          <input type="text" name="notify" id="notify"  class="form-control" readonly >
                      </div>
                  </div>
              </div>
                  </div>
                                             

                                    </div>

                                     <div class="col col-md-12" style=" text-align: right;">
                                          <input type="submit" class="btn btn-primary" value="Register">|<input type="reset" value="Clear" class="btn btn-danger">
                                    </div>
                                          
                        </div>

                        
                         </div>
                       
                                  </form>
                                </div>
                              </div>
                            </div>
                          </section>
                  



     <script type="text/javascript">



  document.getElementById("expire").onchange = function() {
  var exp = this.value;

  // Calculate expiry date
  var date = new Date(exp);
  date.setMonth(date.getMonth() - 1);

  // Get date parts
  var yyyy = date.getFullYear();
  var m = date.getMonth() + 1;
  var d = date.getDate();

  document.getElementById("notify").value = d + "/" + m + "/" + yyyy;
}


       
function calcremaining() {

  var tot = parseFloat(document.getElementById("total").value);
 // parse float quantity
  var down = parseFloat(document.getElementById("downpay").value);
  var rem = tot - down ;
  //pass calculated value to input with id total
  document.getElementById("remaining").value =  rem;
 
}



   
</script>
