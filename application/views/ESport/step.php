
<!-- <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> -->


<style>
* {
  box-sizing: border-box;
}



/*#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}*/

h1 {
  text-align: center;  
}

/*input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}*/

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #04AA6D;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
</style>
<div class="content-wrapper">
      <section class="content" style="min-height: 526px;">
            <div class="col-xs-12">
                  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-plus"></i>Madaallii Taphattoota Kubbaa miilaa giddu-galoota leenjii ispoortii seenan  </h3></div>
            </div>

<div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
<!-- <form id="regForm" action="/action_page.php"> -->
  <form id="regForm" action="<?php echo base_url('Sport/save_Madalli') ?>"method="post">
  
<div class="box-header with-border">



  <!-- One "tab" for each step in the form: -->
 
  <div class="tab">
    <div class="callout callout-info">
         <h4  class="box-title">Unka 1ffaa : Odeeffannoo Leenji'aa fi Anthropometrical details </h4>
         
          
        </div>
   
            <div class="row">
  
                  <div class="col col-md-6">

 <div class="row">
             

                    <div class="col-sm-12">
 <div class="form-group">
                        <label>Maqaa leenji’a</label>
                          <input type="text" name="maqalenjia" id="company" placeholder="-- Maqaa Leenji'aa --" class="form-control">
                      </div>
                
</div>
                    <div class="col-sm-12">

      <div class="form-group">
                        <label>Maqaa Giddu Gala leenjii</label>
                       <select name="ggl_id" class="form-control" required>

           <option value="">-- Giddugala Leenjii Fili  --</option>
           <?php foreach ($this->k->getggl() as $row){
             ?>
            <option value="<?php echo $row->maqaaggl;?>"><?php echo $row->maqaaggl;?></option>
             <?php 
                  } ?>
  </select>

                      </div>  
       </div>
     </div>
  

      <div class="row">
             

                    <div class="col-sm-6">

                     

                      <div class="form-group">
                        <label>Ramaddii Umrii</label>
                      
                          <input type="number"  name="ramumuri" placeholder="-- Ramaddii Umurii --" class="form-control" />

                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Saala</label>
                          <input type="text" name="sex"  placeholder="-- Muuxannoo --" class="form-control">

                         
                      </div>
                    </div>
                  
                    
                    
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Age </label>
                    <input type="number" name="age"  class="form-control">      
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Weight </label>
                    <input type="number" name="weight"  class="form-control">      
                      </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Height </label>
                    <input type="number" name="height"  class="form-control">      
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Body mass index /BMI</label>
                   <select class="form-control" name="indexmass" >
                                <option value="">-- Select --</option>
                                        <option value="Under weight" >Under weight</option>
                                        <option value="Normal weight" >Normal weight</option>
                                        <option value="Over weight" >Over weight</option>
                                        <option value="Obese" >Obese</option>
  </select>    
                      </div>
                    </div>
                </div>
          </div>         
     
      

<div class="col col-md-6">

       
<!-- <div class="box box-solid box-default col-xs-12 col-lg-12 no-padding">
                      <div class="box-header with-border">
                        <h4 class="box-title"><i class="fa fa-thumbs-up"></i>Anthropometrical details 
                        </h4>
                      </div>
                    </div>
 -->

      

      <div class="row">
         <div class="col-sm-6">
                      <div class="form-group">
                        <label> Upper body</label>
                        <input type="text" name="seattop" placeholder="--  Sitting position/seat-top head --" class="form-control">

                      </div>
                    </div> 
                       <div class="col-sm-6">
                      <div class="form-group">
                        <label> Lower body </label>
                        <input type="text" name="hiptoe"  placeholder="--  Hip-toe  --" class="form-control">
                         
                         </div>
                    </div>
                    
</div> 

 <div class="row">
         <div class="col-sm-6">
                      <div class="form-group">

                        <label>Arm</label>
                        <input type="text" name="arm" id="Age" placeholder="--  Upper limbs --" class="form-control">


                      </div>
                    </div> 
                       <div class="col-sm-6">
                      <div class="form-group">
                        <label>Forearm</label>
                      <input type="text" name="forarm" id="Age" placeholder="-- Upper limbs --" class="form-control">
                         
                         </div>
                    </div>
                    
</div>
          
                         
      
<div class="row">
         <div class="col-sm-6">
                      <div class="form-group">
                        <label>Thigh</label>
                        <input type="text" name="limbthigh" id="Age" placeholder="-- Lower limb --" class="form-control">

                      </div>
                    </div> 
                       <div class="col-sm-6">
                      <div class="form-group">
                        <label>Leg</label>
                      <input type="text" name="limbleg" placeholder="-- Lower limb --"  class="form-control">
                         
                         </div>
                    </div>
                    
</div>                          
   <div class="row">
         <div class="col-sm-6">
                      <div class="form-group">
                        <label>Waist  </label>
                        <input type="text" name="waist" id="Age" placeholder="-- Circumferences --" class="form-control">

                      </div>
                    </div> 
                       <div class="col-sm-6">
                      <div class="form-group">
                        <label>Hip  </label>
                      <input type="text" name="hip" placeholder="-- Circumferences --"  class="form-control">
                         
                         </div>
                    </div>
                    
</div>     

 <div class="row">
         <div class="col-sm-6">
                      <div class="form-group">
                        <label>Chest </label>
                        <input type="text" name="chest" id="Age" placeholder="-- Circumferences --" class="form-control">

                      </div>
                    </div> 
                       <div class="col-sm-6">
                      <div class="form-group">
                        <label>Thigh</label>
                      <input type="text" name="thigh" placeholder="-- Circumferences --"  class="form-control">
                         
                         </div>
                    </div>
                    
</div>
 </div> 


                                    </div>
</div>
  <div class="tab">
<div class="callout callout-info">
  <h4  class="box-title">Unka 2ffaa : Madaallii qaamaa (30 %) </h4>
 </div>

  <div class="row">
  
                  <div class="col col-md-6">

 <div class="row">
             

 <div class="col-sm-12">
  <div class="form-group">
      <label>Sit and reach test (2.5%)</label>
      <input type="number" name="sitreach" id="t1" min="0" max="2.5" step="0.1" class="form-control">                 
  </div>                
</div>

<div class="col-sm-12">
  <div class="form-group">
      <label>Pushup (2.5%)</label>
      <input type="number" name="pushup" id="t2" min="0" max="2.5" step="0.1" class="form-control">                 
  </div>                
</div>
<div class="col-sm-12">
  <div class="form-group">
      <label>Sit up (2.5%)</label>
      <input type="number" name="situp" id="t3" min="0" max="2.5" step="0.1" class="form-control">                 

  </div>                
</div>
<div class="col-sm-12">
  <div class="form-group">
      <label>Plank test (2.5)</label>
           <input type="number" name="plank" id="t4" min="0" max="2.5" step="0.1" class="form-control">  
      </div>                
</div>
<div class="col-sm-12">
  <div class="form-group">
      <label>40m Run test (3%) </label>
      <input type="number" name="run" id="t5" min="0" max="3" step="0.1" class="form-control">                 
     </div>                
</div>

</div>
</div>


       <div class="col col-md-6">

 <div class="row">
             

                    <div class="col-sm-12">
 <div class="form-group">
                        <label>Cooper test (4%)</label>
            <input type="number" name="cooper" id="t6" min="0" max="4" step="0.1" class="form-control">                 
               </div>                
</div>

<div class="col-sm-12">
  <div class="form-group">
      <label>Illinois agility test (4%)</label>
          <input type="number" name="illinois" id="t7" min="0" max="4" step="0.1" class="form-control">                 
  </div>                
</div>
<div class="col-sm-12">
  <div class="form-group">
      <label>Reaction time test (2.5%) </label>
        <input type="number" name="reaction" id="t8" min="0" max="2.5" step="0.1" class="form-control">          
      </div>                
</div>
<div class="col-sm-12">
  <div class="form-group">
      <label>Vertical jump test (4%) </label>
           <input type="number" name="vjump" id="t9" min="0" max="2.5" step="0.1" class="form-control">         
  </div>                
</div>
<div class="col-sm-12">
  <div class="form-group">
      <label>Coordination test (3%) </label>
       <input type="number" name="coordination" onchange="addFunction()" id="t10" min="0" max="3" step="0.1" class="form-control">       
       </div>                
</div><div class="col-sm-12">
  <div class="form-group">
      <label>Total 30%</label>
     <input type="text" name="totalqama" id="total" onclick="addFunction()">     
       </div>                
</div>



</div>
</div>
</div>


  </div>
  <div class="tab">
    <div class="callout callout-info">
  <h4  class="box-title">Unka 3ffaa : Madaallii qaamaa (30%) fi Madaallii teekinikaa (30%)</h4>
 </div>

  <div class="row">
  
                  <div class="col col-md-6">

<div class="row">
 <div class="col-sm-6">
  <div class="form-group">
      <label>Shooting (power and Accuracy) (6%)</label>
      <input type="number" name="shooting" id="tt1" min="0" max="6" step="0.1" class="form-control">                 
  </div>                
</div>
<div class="col-sm-6">
  <div class="form-group">
      <label>Passing (Short/long accuracy)(6%)</label>
      <input type="number" name="passing" id="tt2" min="0" max="6" step="0.1" class="form-control">                 
  </div>                
</div>
</div>
 <div class="row">
 <div class="col-sm-6">
  <div class="form-group">
      <label>Ball control(Juggling,First touch)(6%)</label>
      <input type="number" name="juggling" id="tt3" min="0" max="6" step="0.1" class="form-control">                 
  </div>                
</div>
<div class="col-sm-6">
  <div class="form-group">
      <label>Dribbling(Slalom,Zigzag)(6%)</label>
      <input type="number" name="dribbling" id="tt4" min="0" max="6" step="0.1" class="form-control">                 
  </div>                
</div>
</div>
<div class="row">
 <div class="col-sm-6">
  <div class="form-group">
      <label>Speed and reaction with ball(Timed sprint)(6%)</label>
      <input type="number" name="sprint" id="tt5" min="0" max="6" step="0.1" class="form-control">                 
  </div>                
</div>
<div class="col-sm-6">
  <div class="form-group">
      <label>Goalkeeper Reaction and Save(6%)</label>
      <input type="number" name="goalsave" id="tt6" min="0" max="6" step="0.1" onchange="addFunction1()" class="form-control">                 
  </div>                
</div>
<div class="col-sm-12">
  <div class="form-group">
      <label>Qaphxii Madaallii Tekinikaa (30%)</label>
       <input type="number" name="totaltekinika" id="totaltelinika" onclick="addFunction1()" class="form-control">       
       </div>                
</div>
</div>





</div>
 <div class="col col-md-6">

<div class="row">
 <div class="col-sm-6">
  <div class="form-group">
      <label>Pressing and compactness test (5%)</label>
      <input type="number" name="pressing" id="tt7" min="0" max="5" step="0.1" class="form-control">                 
  </div>                
</div>
<div class="col-sm-6">
  <div class="form-group">
      <label>Tactical knowledge(theoretical)(5%)</label>
      <input type="number" name="theoretical" id="tt8" min="0" max="5" step="0.1" class="form-control">                 
  </div>                
</div>
</div>

<div class="row">
 <div class="col-sm-6">
  <div class="form-group">
      <label>Set - piece tactical understanding (5%)</label>
      <input type="number" name="setpiece" id="tt9" min="0" max="5" step="0.1" class="form-control">                 
  </div>                
</div>
<div class="col-sm-6">
  <div class="form-group">
      <label>Positional play test/Rondos (5%)</label>
      <input type="number" name="rondos" id="tt10" min="0" max="5" step="0.1" class="form-control">                 
  </div>                
</div>
</div>

<div class="row">
 <div class="col-sm-6">
  <div class="form-group">
      <label>Game intelligence test (5%)</label>
      <input type="number" name="intelligence" id="tt11" min="0" max="5" step="0.1" class="form-control">                 
  </div>                
</div>
<div class="col-sm-6">
  <div class="form-group">
      <label>Small sided games (5%)</label>
      <input type="number" name="smallsided" id="tt12" min="0" max="5" step="0.1" onchange="addFunction2()" class="form-control">                 
  </div>                
</div>
<div class="col-sm-12">
  <div class="form-group">
      <label>Qaphxii Madaallii Ga'umsa  (30%)</label>
       <input type="number" name="totalgaumsa" id="totalgaumsa" onclick="addFunction2()" class="form-control">       
       </div>                
</div>
</div>


</div>
</div>

  </div>
  <div class="tab">
 <div class="callout callout-info">
  <h4  class="box-title">Unka 4ffaa : Madaallii xiin-sammuu (10%) fi Qaphxii Walii galaa</h4>
 </div>

  <div class="row">
  
                  <div class="col col-md-6">

<div class="row">
 <div class="col-sm-12">
  <div class="form-group">
      <label>Qabxii waliigalaa xiin-sammuu (10%)</label>
      <input type="number" name="xinsamu" id="xinsamu" min="0" max="10" step="0.1" onchange="addFunctiont()" class="form-control">                 
  </div>                
</div>
 <div class="col-sm-12">
  <div class="form-group">
      <label>Qabxii waliigalaa madaallii qaamaa (30%)</label>
      <input type="number" name="total1" id="totalqama"  class="form-control">                 
  </div>                
</div>
<div class="col-sm-12">
  <div class="form-group">
      <label>Qaphxii Madaallii Teekinikaa (30%)</label>
      <input type="number" name="total2" id="total2" class="form-control">                 
  </div>                
</div>
<div class="col-sm-12">
  <div class="form-group">
      <label>Qabxii waliigalaa ga’umsaa (30%)</label>
      <input type="number" name="total3" id="total3"  class="form-control">                 
  </div>                
</div>
</div>
</div>

<div class="col col-md-6">
 <div class="form-group">
      <label>Qabxii waliigalaa Leenji'aa (100%)</label>
      <input type="number" name="ttotal" id="ttotal" onclick="addFunctiont()" class="form-control">                 
  </div>  
</div>
  </div>
  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</div></div>
</form>
</section>
</div>



<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

<!-- <script type="text/javascript" src="<?php echo base_url();?>dist3/js/virtual-select.min.js"></script>

<script type="text/javascript">
    VirtualSelect.init({ 
  ele: '#multipleSelect' 
});
</script> -->

<script type="text/javascript">
    function addFunction() {//  ww w. j av a 2  s  .  c o m
    var t1 = parseInt(document.getElementById("t1").value);
    var t2 = parseInt(document.getElementById("t2").value);
    var t3 = parseInt(document.getElementById("t3").value);
    var t4 = parseInt(document.getElementById("t4").value);
    var t5 = parseInt(document.getElementById("t5").value);
    var t6= parseInt(document.getElementById("t6").value);
    var t7 = parseInt(document.getElementById("t7").value);
    var t8 = parseInt(document.getElementById("t8").value);
    var t9 = parseInt(document.getElementById("t9").value);
    var t10 = parseInt(document.getElementById("t10").value);
   
    var sum=t1+t2+t3+t4+t5+t6+t7+t8+t9+t10;
    document.getElementById("total").value = sum;
    document.getElementById("totalqama").value = sum;

}
</script>
<script type="text/javascript">
    function addFunction1() {//  ww w. j av a 2  s  .  c o m
    var tt1 = parseInt(document.getElementById("tt1").value);
    var tt2 = parseInt(document.getElementById("tt2").value);
    var tt3 = parseInt(document.getElementById("tt3").value);
    var tt4 = parseInt(document.getElementById("tt4").value);
    var tt5 = parseInt(document.getElementById("tt5").value);
    var tt6 = parseInt(document.getElementById("tt6").value);
    
   
    var sum1=tt1+tt2+tt3+tt4+tt5+tt6;
    document.getElementById("totaltelinika").value = sum1;
    document.getElementById("total2").value = sum1;

}
</script>
<script type="text/javascript">
    function addFunction2() {//  ww w. j av a 2  s  .  c o m
    var tt7 = parseInt(document.getElementById("tt7").value);
    var tt8 = parseInt(document.getElementById("tt8").value);
    var tt9 = parseInt(document.getElementById("tt9").value);
    var tt10 = parseInt(document.getElementById("tt10").value);
    var tt11= parseInt(document.getElementById("tt11").value);
    var tt12= parseInt(document.getElementById("tt12").value);
    
   
    var sum=tt7+tt8+tt9+tt10+tt11+tt12;
    document.getElementById("totalgaumsa").value = sum;
    document.getElementById("total3").value = sum;

}
</script>
<script type="text/javascript">
    function addFunctiont() {//  ww w. j av a 2  s  .  c o m
    var xinsamu = parseInt(document.getElementById("xinsamu").value);
    var tot1 = parseInt(document.getElementById("totalqama").value);
    var tot2 = parseInt(document.getElementById("total2").value);
    var tot3 = parseInt(document.getElementById("total3").value);
   
    
   
    var sum=tot1+tot2+tot3+xinsamu;
    document.getElementById("ttotal").value = sum;
    
}
</script>
