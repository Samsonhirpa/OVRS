<div class="content-wrapper">
      <section class="content" style="min-height: 526px;">
            <div class="col-xs-12">
                  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-plus"></i>Add New Employee </h3></div>
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
                              <form role="form" action="<?php echo base_url('Structure/Edit_User/'.$row->id); ?>" method="post">
                                    <div class="box-body">

                                          <div class="row">
                                                <div class="col col-md-6">

                                                      <div class="form-group">
                                                            <label for="exampleInputEmail1">Frist Name</label>
                                                            <input name="fname" class="form-control" id="exampleInputPassword1" placeholder="-- Frist Name --" type="text" required>
                                                      </div>
                                                      <div class="form-group">
                                                            <label for="exampleInputPassword1">Middle Name</label>
                                                            <input name="middle_name" class="form-control" id="exampleInputPassword1" placeholder="-- Middle Name --" type="text" required>

                                                      </div>
                                                      <div class="form-group">
                                                            <label for="exampleInputPassword1">Last Name</label>
                                                            <input name="lname" class="form-control" id="exampleInputPassword1" placeholder="-- Last Name --" type="text" required>
                                                      </div>

                                                      <div class="form-group">
                                                            <label for="exampleInputPassword1">Password</label>
                                                            <input name="password" class="form-control" id="exampleInputPassword1" placeholder="-- Password --" type="password" required>
                                                      </div>
                                                      <div class="form-group">
                                                            <label for="exampleInputPassword1">User Name</label>
                                                            <input name="username" class="form-control" id="exampleInputPassword1" placeholder="-- User name --" type="text" required>
                                                      </div>





                                                      <div class="form-group">
                                                            <label for="exampleInputPassword1">Gender</label>
                                                            <select class="form-control" name="sex" required="">
                                                                  <option value="">-- Select  --</option>
                                                                  <?php foreach ($this->str->getGender() as $row){
                                                                    
                                                                        ?>
                                                                  <option value="<?php echo $row->gender_id;?>"><?php echo $row->gender_name;?></option>
                                                                              <?php 
                                                                  } ?>

                                                            </select>
                                                      </div>
                                                </div>


                                                <!-- <div class="row"> -->
                                                <div class="col col-md-6">

                                                      <div class="form-group">
                                                            <label for="exampleInputPassword1">Date Of Registration</label>
                                                            <input name="dob" class="form-control" id="exampleInputPassword1" placeholder="-- Date Of Employeed --" type="date" required>
                                                      </div>

                                                      <div class="form-group">
                                                            <label for="exampleInputPassword1">Phone No</label>
                                                            <input name="phoneno" class="form-control" id="exampleInputPassword1" placeholder="-- Phone No --" type="text" required>
                                                      </div>
                                                      <div class="form-group">
                                                            <label for="exampleInputPassword1">Role</label>
                                                            <select name="role"class="form-control" id="exampleInputPassword1" placeholder="Role" type="text" required onchange = "java_script_:level(this.options[this.selectedIndex].value)">
                                                                  <?php foreach ($this->str->getRole() as $row) { ?>
                                                                        <option value="<?php echo $row->role_id; ?>"><?php echo $row->role_name; ?></option>
                                                                  <?php } ?>

                                                            </select>
                                                      </div>
                                                      <div class="form-group">
                                                            <label for="exampleInputPassword1">Email</label>
                                                            <input name="email" class="form-control" id="exampleInputPassword1" placeholder="-- Email --" type="email" required>
                                                      </div>                                                     

                                                         <select class="form-control" name="region" id="exampleInputPassword1" required>
                                                            
                                                            <?php
                                                            foreach ($this->b->getregion() as $row) {
                                                                  ?>

                                                                  <option value="<?php echo $row->r_id ?>"><?php echo $row->r_name; ?></option>
                                                            <?php } ?>
                                                      </select>
                                                      <!-- <div id="zoneid" style="display: none;"> -->
                                                            <div>
                                                      <label for="exampleInputPassword1"> Zone or Cities</label>
                                                      <select  class="form-control" name="zone" id="zone" >
                                                             <option value="">-- Select  --</option>
                                                            <?php
                                                            foreach ($this->b->getzone() as $row) {
                                                                  ?>

                                                                  <option value="<?php echo $row->zid ?>"><?php echo $row->zname; ?></option>
                                                            <?php } ?>
                                                      </select>
                                                </div>
                                               <!--  <div id="woredaid" style="display: none;"> -->
                                                <div>
                                                      <label for="exampleInputPassword1">Woreda</label>
                                                      <select class="form-control"name="woreda" id="woreda" >
 <option value="">-- Select  --</option>
                                                      </select>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="col col-md-12">
                                          <input type="submit" class="btn btn-primary" value="Register">|<input type="reset" value="Clear" class="btn btn-danger">
                                    </div>
                        </div>
                        </form>
                  </div>
            </div>
</div>



<script type="text/javascript">

      $(document).ready(function () {
            $("#zone").change(function () {
                  var zid = $("#zone").val();
                  alert(zid);
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

            $("#town").change(function () {
                  var tid = $("#town").val();
                  $.ajax({
                        url: '<?php echo base_url(); ?>BDDDDOcontroller/getkebele',
                        'method': 'post',
                        'data': {tid: tid},
                        'type': 'JSON'
                  }).done(function (town) {
                        console.log(town);
                        town = JSON.parse(town);
                        $("#kebele").empty();
                        town.forEach(function (town) {
                              $("#kebele").append('<option value=' + town.kid + '">' + town.kname + '</option>');
                        })
                  })
            })
      })
</script>
<!-- <script>
       function level(aval) {
        if (aval == "3") {
            zoneid.style.display = 'block';
            woredaid.style.display = 'block';      
           
            $('#zoneid').attr('required', 'required');
            $('#zoneid').attr('required', 'required');
          
        } else
            if (aval == "4") {
                woredaid.style.display = 'none';
                zoneid.style.display = 'block';
               
                $('#zoneid').attr('required', 'required');
                $('#woredaid').attr('required', false);
                $('#woreda').val(null);
           }
            else {
                woredaid.style.display = 'none';
                zoneid.style.display = 'none';
                $('#zoneid').attr('required', false);
                $('#woredaid').attr('required', false);
                $('#zone').val(null); 
                $('#woreda').val(null);
               
            }

    }
</script> -->