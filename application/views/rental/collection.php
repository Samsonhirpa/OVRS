<div class="content-wrapper">
      <section class="content" style="min-height: 526px;">
            <div class="col-xs-12">
                  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-plus"></i>New Rental Information </h3></div>
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
<form role="form" action="<?php echo base_url('Structure/save_rent'); ?>" method="Post" enctype="multipart/form-data">



<div class="box-header with-border">

<div class="callout callout-info">
         <h4  class="box-title"> Register new Rental Information</h4>
         
          
        </div>


<div class="box box-solid box-secondary col-xs-12 col-lg-12 no-padding">
                                    
<div class="box">


<div class="row">
                        <div class="col-sm-2">
                         <div class="form-group">
                        <label>Vendor Name</label>
                         <select class="form-control" name="customer_id" required="">
                         <option style="text-align: center;" value="">--  Select Vendor  --</option>
                          <?php foreach ($this->str->getcustomer() as $row){
                             ?>
                          <option value="<?php echo $row->c_id;?>"><?php echo $row->c_name;?></option>
                           <?php 
                            } ?>
                          </select>
                      </div>
                    </div>

                     <div class="col-sm-2">
                      <!-- select -->
                      <div class="form-group">
                        <label>Customer Name</label>
                        <select class="form-control" name="project_id"  required="">
                         <option style="text-align: center;" value="">--  Select Customer  --</option>
                          
                          <?php foreach ($this->str->getproject() as $row){
                             ?>
                          <option value="<?php echo $row->p_id;?>"><?php echo $row->p_name;?></option>
                           <?php 
                            } ?>
                          </select>
                      </div>
                    </div>
                     <div class="col-sm-2">
                      <div class="form-group">
                        <label>Type</label>
                          <select class="form-control" name="type_id" id="type" required="">
                         <option style="text-align: center;" value="">--  Select type  --</option>
                           <?php foreach ($this->str->gettypev() as $row){
                             ?>
                          <option value="<?php echo $row->t_id;?>"><?php echo $row->t_name;?></option>
                           <?php 
                            } ?>
                          </select>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>Vehicle</label>
                        <select class="form-control" name="vehicle_id" id="vehicle" required="">
                         <option style="text-align: center;" value="">--  Select  --</option>
                          
                          </select>
                         
                      </div>
                    </div>
                        <div class="col-sm-2">
                       <div class="form-group">


                        <label>Payment Type</label>
                        <select class="form-control" name=" payment_id" required="">
                         <option style="text-align: center;" value="">--  Select  --</option>
                          <?php foreach ($this->str->getpytype() as $row){
                             ?>
                          <option value="<?php echo $row->py_id;?>"><?php echo $row->py_name;?></option>
                           <?php 
                            } ?>
                          </select>
                         
                      </div>
                     
                    </div>
                    <div class="col-sm-2">
                      <!-- select -->
                      <div class="form-group">
                        <label>Plate No</label>
                          <input type="text" name="plateno"  placeholder="--Plate No--" class="form-control">
                      </div>
                    </div>
</div>
</div>
            <div class="row">
  
                  <div class="col col-md-6">

                    <div class="box box-solid box-default col-xs-12 col-lg-12 no-padding">
                       <div class="box-header with-border" align="center">
                        <h4 class="box-title"><i class="fa fa-thumbs-up" ></i>  ----------Vendor Information ----------
                        </h4>
                      </div>
                    </div>

  <div class="row">
                    <div class="col-sm-4">
                      <!-- select -->
                      <div class="form-group">
                        <label>Start Date</label>
                         <input class="form-control" type="date" id="pick_date" name="s_date" onchange="cal()" >
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>End Date</label>
                          <input type="date" class="form-control" id="drop_date" name="e_date" onchange="cal()">
                      </div>
                     <!--  <button onclick="calculateDays()">Get Difference</button> -->
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Total Day</label>
                      <!--   <p id="output"></p> -->
                          <input type="text" id="numdays2" name="t_date"  class="form-control" onchange="calcTotal()">
                      </div>
                    </div>
                  </div>


                          <div class="row">
                 
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Payment Per day</label>
                          <input type="text" name="payperday" id="ppd" class="form-control" >
                      </div>
                    </div>

                    <div class="col-sm-6">
                         <div class="form-group">
                        <label>COST</label>
                         <input type="text" name="cost" id="cost"  class="form-control" onclick="calcTotal()">
                      </div>
                    </div>


</div>

<div class="row">
                      <div class="col-sm-5">
                         <div class="form-group">
                        <label>VAT/TOT</label>
                         <input type="text" name="vatot" id="math_Results"  class="form-control">

                        
                      </div>
                     <!--  <div id="math_Results"></div> -->
                    </div>

 <div class="col-sm-2">
                      <!-- select -->
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="nm"  class="form-control">
                      </div>
                    </div>
                
  
  
  <div class="col-sm-5">
    
  <div class="form-group">
    <h4> Select Type Of Reciet </h4>
<input type="checkbox" name="math_Operators" value="VAT" onclick="solve();" />   <label style="color:red;">VAT</label>
<input type="checkbox" name="math_Operators" value="TOT 2%"  onclick="solve();" />   <label style="color:red;">TOT 2%</label>
<input type="checkbox" name="math_Operators" value="TOT 10%"  onclick="solve();" />   <label style="color:red;">TOT 10%</label>
<input type="checkbox" name="math_Operators" value="None"  onclick="solve();" />   <label style="color:red;">None</label>

  </div>
  </div>


     </div>  
     <div class="row">
                    <div class="col-sm-3">
                      <!-- select -->
                      <div class="form-group">
                        <label>Gross</label>
                         <input type="text" name="gross" id="gross" class="form-control" onchange="calcded()">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Withhold</label>
                          <input type="text" name="withhold" id="withhold" class="form-control" onclick="calcwiz()">
                      </div>
                    </div><div class="col-sm-3">
                      <div class="form-group">
                        <label>Paid</label>
                          <input type="text" name="paid" id="paid" class="form-control" onchange="calcded()">
                      </div>
                    </div><div class="col-sm-3">
                      <div class="form-group">
                        <label>Other</label>
                          <input type="text" name="other" id="other" class="form-control" onchange="calcded()">
                      </div>
                    </div>
                  </div>


 <div class="row">
                  <div class="col-sm-3">
                      <!-- select -->
                      <div class="form-group">
                        <label>Advance</label>
                        <input type="text" name="advance" id="advance"  class="form-control" onchange="calcded()">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <!-- select -->
                      <div class="form-group">
                        <label>Total Ded</label>
                         <input type="text" name="totalded" id="totalded" class="form-control" onclick="calcded()">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Net Payable</label>
                          <input type="text" name="netpayable" id="netpayable" class="form-control"  onclick="netpay()">
                      </div>
                    </div>
                  </div>
                                        

                 
                  </div>


               
  


                                                <!-- <div class="row"> -->
                  <div class="col col-md-6">

                    <div class="box box-solid box-default col-xs-12 col-lg-12 no-padding">
                      <div class="box-header with-border" align="center">
                        <h4 class="box-title"><i class="fa fa-thumbs-up" ></i>  ----------Customer Information ----------
                        </h4>
                      </div>
                    </div>

  <div class="row">
                    <div class="col-sm-4">
                      <!-- select -->
                      <div class="form-group">
                        <label>Start Date</label>
                         <input class="form-control" type="date" id="pick_date1" name="s_date1" onchange="cal1()" >
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>End Date</label>
                          <input type="date" class="form-control" id="drop_date1" name="e_date1" onchange="cal1()">
                      </div>
                     <!--  <button onclick="calculateDays()">Get Difference</button> -->
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Total Day</label>
                      <!--   <p id="output"></p> -->
                          <input type="text" id="numdays21" name="t_date1"  class="form-control" onchange="calcTotal1()">
                      </div>
                    </div>
                  </div>


                          <div class="row">
                 
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Payment Per day</label>
                          <input type="text" name="payperday1" id="ppd1" class="form-control" >
                      </div>
                    </div>

                    <div class="col-sm-6">
                         <div class="form-group">
                        <label>COST</label>
                         <input type="text" name="cost1" id="cost1"  class="form-control" onclick="calcTotal1()">
                      </div>
                    </div>


</div>
                                        
    
<div class="row">
                      <div class="col-sm-5">
                         <div class="form-group">
                        <label>VAT/TOT</label>
                         <input type="text" name="vatot1" id="math_Results1"  class="form-control">

                        
                      </div>
                     <!--  <div id="math_Results"></div> -->
                    </div>

 <div class="col-sm-2">
                      <!-- select -->
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name1" id="nm1"  class="form-control">
                      </div>
                    </div>
                
  
  
  <div class="col-sm-5">
    
  <div class="form-group">
    <h3>  
<input type="checkbox" name="math_Operators1" value="VAT" onclick="solve1();" />   <label style="color:red;">Calculate VAT</label></h3>

  </div>
  </div>


     </div>         
                  
      <div class="row">
                    <div class="col-sm-3">
                      <!-- select -->
                      <div class="form-group">
                        <label>Gross</label>
                         <input type="text" name="gross1" id="gross1" class="form-control" onchange="calcded1()">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Withhold</label>
                          <input type="text" name="withhold1" id="withhold1" class="form-control" onclick="calcwiz1()">
                      </div>
                    </div><div class="col-sm-3">
                      <div class="form-group">
                        <label>Paid</label>
                          <input type="text" name="paid1" id="paid1" class="form-control" onchange="calcded1()">
                      </div>
                    </div><div class="col-sm-3">
                      <div class="form-group">
                        <label>Other</label>
                          <input type="text" name="other1" id="other1" class="form-control" onchange="calcded1()">
                      </div>
                    </div>
                  </div>


 <div class="row">
                  <div class="col-sm-3">
                      <!-- select -->
                      <div class="form-group">
                        <label>Advance</label>
                        <input type="text" name="advance1" id="advance1"  class="form-control" onchange="calcded1()">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <!-- select -->
                      <div class="form-group">
                        <label>Total Ded</label>
                         <input type="text" name="totalded1" id="totalded1" class="form-control" onclick="calcded1()">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Net Recievable</label>
                          <input type="text" name="netpayable1" id="netpayable1" class="form-control"  onclick="netpay1()">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Recievable Status</label>
                          <input type="text" name="status" id="status" class="form-control" onclick="pystatus()">
                      </div>
                    </div>
                  </div>
                                             

     
       






                                               
        




                                    </div>
                                          
                        </div>

                        
                         </div>
                        <div class="col col-md-12" style=" text-align: right;">
                                          <input type="submit" class="btn btn-primary" value="Register">|<input type="reset" value="Clear" class="btn btn-danger">
                                    </div>

                 </div>
                        </form>
                  </div>
            </div>
</div>
</div>

 <script type="text/javascript">
        function GetDays(){
                var dropdt = new Date(document.getElementById("drop_date").value);
                var pickdt = new Date(document.getElementById("pick_date").value);
                var days = parseInt((dropdt - pickdt + 1) / (24 * 3600 * 1000));
                var tday =days + 1;
                return parseInt(tday);
        }

        function cal(){
        if(document.getElementById("drop_date")){
            document.getElementById("numdays2").value=GetDays();
        }  
    }

    </script>
<script type="text/javascript">
        function GetDays1(){
                var dropdt = new Date(document.getElementById("drop_date1").value);
                var pickdt = new Date(document.getElementById("pick_date1").value);
               var days = parseInt((dropdt - pickdt + 1) / (24 * 3600 * 1000));
                var tday =days + 1;
                return parseInt(tday);
        }

        function cal1(){
        if(document.getElementById("drop_date1")){
            document.getElementById("numdays21").value=GetDays1();
        }  
    }

    </script>

     <script type="text/javascript">
       
function calcTotal() {

  var price = parseFloat(document.getElementById("ppd").value);
 // parse float quantity
  var quantity = parseFloat(document.getElementById("numdays2").value);
  var cost = price * quantity;
  //pass calculated value to input with id total
  document.getElementById("cost").value =  cost.toFixed(2);
 
}
function calcTotal1() {

  var price = parseFloat(document.getElementById("ppd1").value);
 // parse float quantity
  var quantity = parseFloat(document.getElementById("numdays21").value);
  var cost = price * quantity;
  //pass calculated value to input with id total
  document.getElementById("cost1").value =  cost.toFixed(2);
  
}

function calcded(){

  
  var adv = parseFloat(document.getElementById("advance").value);
   var pd = parseFloat(document.getElementById("paid").value);
   var wz = parseFloat(document.getElementById("withhold").value);
   var oz = parseFloat(document.getElementById("other").value);
      
    

      var totalded = 0;
      var calded1 = totalded + adv + pd + wz + oz;
  

      document.getElementById("totalded").value= calded1.toFixed(2);
     }

function netpay(){
var gr = parseFloat(document.getElementById("gross").value);
var ded = parseFloat(document.getElementById("totalded").value);

var net = gr - ded;
      document.getElementById("netpayable").value= net.toFixed(2);

}
function solve() {

var operators_If = document.getElementsByName("math_Operators");
var ct = document.getElementById("cost").value;



if (ct=="") {
var math_Results = "<span class='warning'>Enter the cost value.</span>";
document.getElementById('math_Results').value =  math_Results;
return false;
}

if (operators_If[0].checked == true) {
vat = parseInt(ct) * 15 / 100 ;          
results =  vat ;
gross = parseInt(ct) + results ;
let myPet = 'VAT';

document.getElementById("math_Results").value =  results.toFixed(2);
document.getElementById("gross").value =  gross.toFixed(2);
document.getElementById("nm").value =  myPet;

return false;
} 
else if (operators_If[1].checked == true) {
 tot2 = parseInt(ct) * 2 / 100 ;          
results =  tot2 ;
gross = parseInt(ct) + results ;
let myPet = 'TOT 2%';


document.getElementById("math_Results").value =  results.toFixed(2);
document.getElementById("gross").value =  gross.toFixed(2);
document.getElementById("nm").value =  myPet;

return false;
} 
else if (operators_If[2].checked == true) {
 tot10 = parseInt(ct) * 10 / 100 ;          
results =  tot10 ;
gross = parseInt(ct) + results ;
let myPet = 'TOT 10%';


document.getElementById("math_Results").value =  results.toFixed(2);
document.getElementById("gross").value =  gross.toFixed(2);
document.getElementById("nm").value =  myPet;

return false;
} 
else if (operators_If[3].checked == true) {
 none = parseInt(ct) * 0 / 100 ;          
results =  none ;
gross = parseInt(ct) + results ;
let myPet = 'NONE';


document.getElementById("math_Results").value =  results.toFixed(2);
document.getElementById("gross").value =  gross.toFixed(2);
document.getElementById("nm").value =  myPet;

return false;
} 
else {
var math_Results = "<span class='warning'>Select your math operators.</span>";
document.getElementById('math_Results').innerHTML = math_Results;
return false;
}
return true;
}
function reset_Operators() {
document.getElementById('math_Results').innerHTML = '';
}
function clear()
{
document.getElementById('math_Results').innerHTML = "";
first_TextBox_Value="";
no_two="";
first_TextBox_Value.focus();
}

function calcded1(){

  
  var adv = parseFloat(document.getElementById("advance1").value);
   var pd = parseFloat(document.getElementById("paid1").value);
   var wz = parseFloat(document.getElementById("withhold1").value);
   var oz = parseFloat(document.getElementById("other1").value);
      
    

      var totalded = 0;
      var calded1 = totalded + adv + pd + wz + oz;
  

      document.getElementById("totalded1").value= calded1.toFixed(2);
     }

function netpay1(){
var gr = parseFloat(document.getElementById("gross1").value);
var ded = parseFloat(document.getElementById("totalded1").value);

var net = gr - ded;
      document.getElementById("netpayable1").value= net.toFixed(2);

}
function solve1() {

var operators_If = document.getElementsByName("math_Operators1");
var ct = document.getElementById("cost1").value;



if (ct=="") {
var math_Results = "<span class='warning'>Enter the cost value.</span>";
document.getElementById('math_Results1').value =  math_Results;
return false;
}

if (operators_If[0].checked == true) {
vat = parseInt(ct) * 15 / 100 ;          
results =  vat ;
gross = parseInt(ct) + results ;
let myPet = 'VAT';

document.getElementById("math_Results1").value =  results.toFixed(2);
document.getElementById("gross1").value =  gross.toFixed(2);
document.getElementById("nm1").value =  myPet;

return false;
} 
else if (operators_If[1].checked == true) {
 tot2 = parseInt(ct) * 2 / 100 ;          
results =  tot2 ;
gross = parseInt(ct) + results ;
let myPet = 'TOT 2%';


document.getElementById("math_Results1").value =  results.toFixed(2);
document.getElementById("gross1").value =  gross.toFixed(2);
document.getElementById("nm1").value =  myPet;

return false;
} 
else if (operators_If[2].checked == true) {
 tot10 = parseInt(ct) * 10 / 100 ;          
results =  tot10 ;
gross = parseInt(ct) + results ;
let myPet = 'TOT 10%';


document.getElementById("math_Results1").value =  results.toFixed(2);
document.getElementById("gross1").value =  gross.toFixed(2);
document.getElementById("nm1").value =  myPet;

return false;
} 
else if (operators_If[3].checked == true) {
 none = parseInt(ct) * 0 / 100 ;          
results =  none ;
gross = parseInt(ct) + results ;
let myPet = 'NONE';


document.getElementById("math_Results1").value =  results.toFixed(2);
document.getElementById("gross1").value =  gross.toFixed(2);
document.getElementById("nm1").value =  myPet;

return false;
} 
else {
var math_Results = "<span class='warning'>Select your math operators.</span>";
document.getElementById('math_Results').innerHTML = math_Results;
return false;
}
return true;
}
function reset_Operators1() {
document.getElementById('math_Results1').innerHTML = '';
}
function clear1()
{
document.getElementById('math_Results1').innerHTML = "";
first_TextBox_Value="";
no_two="";
first_TextBox_Value.focus();
}


function calcwiz(){
var gr = parseFloat(document.getElementById("gross").value);

var wiz = gr * 2 / 100;
      document.getElementById("withhold").value= wiz.toFixed(2);

}

function calcwiz1(){
var gr = parseFloat(document.getElementById("gross1").value);

var wiz = gr * 2 / 100;
      document.getElementById("withhold1").value= wiz.toFixed(2);

}

function pystatus(){
var net = parseFloat(document.getElementById("netpayable1").value);

if (net == 0) {
  document.getElementById("status").value= "Collected";
}
else{
  document.getElementById("status").value= "Not Collected";

}
}

</script>







       
<script type="text/javascript">

  $(document).ready(function () {
            $("#type").change(function () {
                  var sid = $("#type").val();
                  // alert(sid);
                  $.ajax({
                        url: '<?php echo base_url(); ?>Structure/getvehicletype',
                        'method': 'post',
                        'data': {sid: sid},
                        'type': 'JSON'
                  }).done(function (vehicle) {
                        console.log(vehicle);
                        vehicle = JSON.parse(vehicle);
                        $("#vehicle").empty();
                        vehicle.forEach(function (vehicle) {
                              $("#vehicle").append('<option value=' + vehicle.v_id + '>' + vehicle.v_name + '</option>');
                        })
                  })
            })


      })
</script>
