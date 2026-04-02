

<aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                  <div class="pull-left image">
                        <img style="height: 50px; width: 500px;" src="<?php echo base_url(); ?>dist/img/AA.jpg" class="img-circle" alt="User Image">
                  </div>
                  <div class="pull-left info">
                        <p><?php
                              $role = $this->session->userdata('role');
                              $role_name = $this->db->select('*')->from('role')->where('role_id', $role)->get()->row();

                              echo $role_name->role_name;
                              ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i>New Travel </a>
                  </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                  <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                              </button>
                        </span>
                  </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <?php
            if ($this->session->userdata('role') == 1) {
                  ?>

                  <ul class="sidebar-menu" data-widget="tree">
<!-- 
                        <li class="active treeview">
                              <a href="<?php echo base_url('BDDDDOcontroller/dashboard'); ?>">
                                    <i class="fa fa-dashboard"></i> <span></i>Dashboard</span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                        </li>  --> 
                          <li><a href="<?php echo base_url() ?>Structure/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                           <li><a href="<?php echo base_url() ?>Structure/GachanaSirna"><i class="fa fa-dashboard"></i>GachanaSirna</a></li>
                       <li class="treeview">
                              <a href="#">
                                    <i class="fa fa-users"></i> <span>USER MANAGEMENT</span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                              <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url('BDDDDOcontroller/add_employee') ?>"><i class="fa fa-user-plus"></i>Add User</a></li>
                                    <li><a href="<?php echo base_url('Structure/User_list') ?>"><i class="fa fa-list-alt"></i>User List</a></li>

                                  </ul>
                        </li>

                        <li class="treeview">
                              <a href="#">
                                    <i class="fa fa-laptop"></i> <span>OUR CUSTOMERS</span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                              <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url('Structure/add_customer') ?>"><i class="fa fa-plus"></i>Add New Customers</a></li>
                        <li><a href="<?php echo base_url() ?>Structure/manage_customer"><i class="fa fa-bars"></i>Manage Customers</a></li>
                              </ul>
                        </li> 
                       <!--  <li class="treeview">
                              <a href="#">
                                    <i class="fa fa-laptop"></i> <span>Rental</span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                              <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url('Structure/add_rent') ?>"><i class="fa fa-plus"></i>Add Rental</a></li>
                        <li><a href="<?php echo base_url() ?>Structure/manage_rent"><i class="fa fa-laptop"></i>Manage Rental</a></li>
                              </ul>
                        </li> -->

      <li class="treeview">
           <a href="#">
            <i class="fa fa-folder"></i> <span>MANAGE PERMIT</span>
             <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
              <ul class="treeview-menu">
      
      <li><a href="<?php echo base_url('Structure/permit_payment') ?>"><i class="fa fa-bars"></i>Permit Payment</a></li>
 <li><a href="<?php echo base_url('Structure/manage_permit') ?>"><i class="fa fa-th"></i>Approve Permit</a></li>

       
     

                                 
              </ul>
       </li>
<li><a href="<?php echo base_url() ?>Structure/EmbacySchedule"><i class="fa fa-bars"></i>EMBACYs SCHEDULE</a></li>


      
 <li><a href="<?php echo base_url('Structure/manage_visa') ?>"><i class="fa fa-folder"></i>APPROVE VISA</a></li>
 <li><a href="<?php echo base_url('Structure/manage_payment') ?>"><i class="fa fa-bars"></i>FINAL PAYMENT</a></li>



<li><a href="<?php echo base_url() ?>Structure/manage_refund"><i class="fa fa-bars"></i>MANAGE REFUND</a></li>

                        <li class="treeview">
           <a href="#">
            <i class="fa fa-user-plus"></i> <span>GENERAL REPORT</span>
             <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
              <ul class="treeview-menu">
       
      <li><a href="<?php echo base_url() ?>Structure/refunded"><i class="fa fa-bars"></i>Refunded Report</a></li>
        <li><a href="<?php echo base_url() ?>Structure/OnprocesCustomers"><i class="fa fa-bars"></i>On Process</a></li>
        <li><a href="<?php echo base_url() ?>Structure/successcustomers"><i class="fa fa-bars"></i>Success Process</a></li>

                                 
              </ul>
       </li>
                        
         
                           
         

                         <li class="treeview">
                              <a href="#">
                                    <i class="fa fa-plane"></i> <span>FLIGHT SCHEDULE</span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                              <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url('Structure/Flightday') ?>"><i class="fa  fa-bars"></i>Flight Schedule </a></li>
                                    <li><a href="<?php echo base_url('Structure/Flightdaypass') ?>"><i class="fa  fa-bars"></i>Flight Report </a></li>
                                    
                                  </ul>
                        </li>
                       <li><a href="<?php echo base_url('Structure/CustomerDocument'); ?>"><i class="fa fa-file-pdf-o"></i>CUSTOMERS DOCUMENT</a></li>

                      
                     
                      <li><a href="<?php echo base_url() ?>Structure/manage_ipcomment"><i class="fa fa-envelope"></i>POST MESSAGES</a></li>
                       <li><a href="<?php echo base_url('Structure/notifyexpire'); ?>"><i class="fa fa-circle-o"></i>NOTIFICATIONS</a></li>
                             <li class="treeview">
                              <a href="#">
                                    <i class="fa fa-gears"></i> <span>LOOK UP</span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                              <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url('Structure/Vendor') ?>"><i class="fa  fa-bars"></i>Manage Agents </a></li>
                                    <li><a href="<?php echo base_url('Structure/Project') ?>"><i class="fa  fa-bars"></i> Manage Company </a></li>
                                    <li><a href="<?php echo base_url('Structure/Zone') ?>"><i class="fa  fa-bars"></i> Manage Country </a></li>
                                    <!-- <li><a href="<?php echo base_url('Structure/Woreda') ?>"><i class="fa fa-link"></i>Manage Woreda</a></li> -->
                                  </ul>
                        </li>
                       
                        <?php
                  } else if ($this->session->userdata('role') == 2) {
                        ?>
                        <ul class="sidebar-menu" data-widget="tree">

                              <li class="active treeview">
                                    <a href="<?php echo base_url('Structure/admindashboard'); ?>">
                                          <i class="fa fa-dashboard"></i> <span></i>Dashbord</span>
                                          <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                          </span>
                                    </a>
                              </li>
                             <li><a href="<?php echo base_url('Structure/add_enccustomer') ?>"><i class="fa fa-plus"></i>Add New Customers</a></li>
                        <li><a href="<?php echo base_url() ?>Structure/manage_enccustomer"><i class="fa fa-bars"></i>Manage Customers</a></li>
                        
       <li class="treeview">
           <a href="#">
            <i class="fa fa-user-plus"></i> <span>MANAGE PAYMENT</span>
             <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
              <ul class="treeview-menu">
      <li><a href="<?php echo base_url('Structure/permit_payment') ?>"><i class="fa fa-bars"></i>Permit Payment</a></li>

       
      <li><a href="<?php echo base_url('Structure/encmanage_payment') ?>"><i class="fa fa-bars"></i>Remaining Payment</a></li>


                                 
              </ul>
       </li>
          <li class="treeview">
                              <a href="#">
                                    <i class="fa fa-gears"></i> <span>FLIGHT SCHEDULE</span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                              <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url('Structure/Flightday') ?>"><i class="fa  fa-bars"></i>Flight Schedule </a></li>
                                    <li><a href="<?php echo base_url('Structure/Flightdaypass') ?>"><i class="fa  fa-bars"></i>Flight Report </a></li>
                                    
                                  </ul>
                        </li>   
                       <li><a href="<?php echo base_url('Structure/CustomerDocument'); ?>"><i class="fa fa-file-pdf-o"></i>CUSTOMERS DOCUMENT</a></li>
                       
       <li><a href="<?php echo base_url() ?>Structure/manage_ipcomment"><i class="fa fa-envelope"></i>NEW MESSAGE</a></li>
        <li><a href="<?php echo base_url('structure/notifyexpire'); ?>"><i class="fa fa-circle-o"></i>NOTIFICATIONS</a></li>
                             
                        </ul>


                        ?>
                        <?php
                  } else if ($this->session->userdata('role') == 3) {
                        ?>
                        <ul class="sidebar-menu" data-widget="tree">

                              <li class="active treeview">
                                    <a href="<?php echo base_url('marketcontroller/admindashboard'); ?>">
                                          <i class="fa fa-dashboard"></i>Dashboard

                                          <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                          </span>
                                    </a>
                              </li>

 <li class="treeview">
                              <a href="#">
                                    <i class="fa fa-laptop"></i> <span>OUR CUSTOMERS</span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                              <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url('Structure/add_customer') ?>"><i class="fa fa-plus"></i>Add New Customers</a></li>
                        <li><a href="<?php echo base_url() ?>Structure/manage_customer"><i class="fa fa-bars"></i>Manage Customers</a></li>
                              </ul>
                        </li> 
                       
 <li><a href="<?php echo base_url('Structure/manage_permit') ?>"><i class="fa fa-th"></i>MANAGE PERMIT</a></li>
 <li><a href="<?php echo base_url('Structure/manage_visa') ?>"><i class="fa fa-folder"></i>MANAGE VISA</a></li>
<li><a href="<?php echo base_url() ?>Structure/manage_refund"><i class="fa fa-bars"></i>MANAGE REFUND</a></li>

   <li class="treeview">
                              <a href="#">
                                    <i class="fa fa-gears"></i> <span>FLIGHT SCHEDULE</span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                              <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url('Structure/Flightday') ?>"><i class="fa  fa-bars"></i>Flight Schedule </a></li>
                                    <li><a href="<?php echo base_url('Structure/Flightdaypass') ?>"><i class="fa  fa-bars"></i>Flight Report </a></li>
                                    
                                  </ul>
                        </li>

                        <li class="treeview">
           <a href="#">
            <i class="fa fa-user-plus"></i> <span>GENERAL REPORT</span>
             <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
              <ul class="treeview-menu">
       
      <li><a href="<?php echo base_url() ?>Structure/refunded"><i class="fa fa-bars"></i>Refunded Report</a></li>
        <li><a href="<?php echo base_url() ?>Structure/successcustomers"><i class="fa fa-bars"></i>Success Process</a></li>

                                 
              </ul>
       </li>
                        
         
                           
                      
         
            

      <li><a href="<?php echo base_url('structure/notifyexpire'); ?>"><i class="fa fa-circle-o"></i>NOTIFICATIONS</a></li>

      <li><a href="<?php echo base_url('structure/manage_ipcomment'); ?>"><i class="fa fa-circle-o"></i>NEW MESSAGES</a></li>


                        </ul>


                        ?>

                        <?php
                  } else if ($this->session->userdata('role') == 4) {
                        ?>
                        <ul class="sidebar-menu" data-widget="tree">

                              <li class="active treeview">
                                    <a href="<?php echo base_url('Structure/admindashboard'); ?>">
                                          <i class="fa fa-dashboard"></i> <span></i>Dashbord</span>
                                          <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                          </span>
                                    </a>
                              </li>

 <li class="treeview">
                              <a href="#">
                                    <i class="fa fa-laptop"></i> <span>OUR CUSTOMERS</span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                              <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url('Structure/add_customer') ?>"><i class="fa fa-plus"></i>Add New Customers</a></li>
                        <li><a href="<?php echo base_url() ?>Structure/manage_customer"><i class="fa fa-bars"></i>Manage Customers</a></li>
                              </ul>
                        </li> 
                      
 <li><a href="<?php echo base_url('Structure/manage_permit') ?>"><i class="fa fa-th"></i>MANAGE PERMIT</a></li>
 <li><a href="<?php echo base_url('Structure/manage_visa') ?>"><i class="fa fa-folder"></i>MANAGE VISA</a></li>
<li><a href="<?php echo base_url() ?>Structure/manage_refund"><i class="fa fa-bars"></i>MANAGE REFUND</a></li>

                        <li class="treeview">
           <a href="#">
            <i class="fa fa-user-plus"></i> <span>GENERAL REPORT</span>
             <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
              <ul class="treeview-menu">
       
      <li><a href="<?php echo base_url() ?>Structure/refunded"><i class="fa fa-bars"></i>Refunded Report</a></li>
        <li><a href="<?php echo base_url() ?>Structure/successcustomers"><i class="fa fa-bars"></i>Success Process</a></li>

                                 
              </ul>
       </li>
                        
          <li class="treeview">
                              <a href="#">
                                    <i class="fa fa-gears"></i> <span>FLIGHT SCHEDULE</span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                              <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url('Structure/Flightday') ?>"><i class="fa  fa-bars"></i>Flight Schedule </a></li>
                                    <li><a href="<?php echo base_url('Structure/Flightdaypass') ?>"><i class="fa  fa-bars"></i>Flight Report </a></li>
                                    
                                  </ul>
                        </li>
                        
         
                           
               <li class="treeview">
                              <a href="#">
                                    <i class="fa fa-gears"></i> <span>LOOK UP</span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                              <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url('Structure/Vendor') ?>"><i class="fa  fa-bars"></i>Manage Partner </a></li>
                                    <li><a href="<?php echo base_url('Structure/Project') ?>"><i class="fa  fa-bars"></i> Manage Company </a></li>
                                    <li><a href="<?php echo base_url('Structure/Zone') ?>"><i class="fa  fa-bars"></i> Manage Country </a></li>
                                    <!-- <li><a href="<?php echo base_url('Structure/Woreda') ?>"><i class="fa fa-link"></i>Manage Woreda</a></li> -->
                                  </ul>
                        </li>
   
                           
                              
                        <li><a href="<?php echo base_url() ?>Structure/manage_ipcomment"><i class="fa fa-laptop"></i>POST MESSAGE</a></li>

                          <li><a href="<?php echo base_url('structure/notifyexpire'); ?>"><i class="fa fa-circle-o"></i>NOTIFICATIONS</a></li>    

                        </ul>
<?php } ?>
                  </aside>