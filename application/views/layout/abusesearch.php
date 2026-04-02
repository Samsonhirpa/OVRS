<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>Total number of children</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo base_url()?>BDDDDOcontroller/manage_nochildren" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Total Population</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url()?>BDDDDOcontroller/manage_population" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>Child Friendly</p>
            </div>
            <div class="icon">

              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url()?>BDDDDOcontroller/manage_childfriendly" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Manage Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo base_url('auth/index')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      
          <!-- /.nav-tabs-custom -->
       <div class="row">
        <div class="col-md-6">
         <ul class="sidebar-menu" data-widget="tree">
        
        <li class="active treeview">
          <a href="<?php echo base_url('BDDDDOcontroller/dashboard');?>">
            <i class="fa fa-dashboard"></i> <span></i>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
         </a>
        </li>  
  <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Abuse Case</span>
            
          </a>
          <ul class="treeview-menu">
             <li><a href="<?php echo base_url();?>BDDDDOcontroller/manage_abusecase">all abuse case</a></li>
                  <li class="has-children">
                    <a href="#"><span>HTP</span></a>
                  <ul class="dropdown">
                    <li><a href="<?php echo base_url();?>BDDDDOcontroller/manage_abusecase1">age < 5</a></li>
                    <li><a href="<?php echo base_url();?>BDDDDOcontroller/manage_abusecase2">age 6-10 </a></li>
                    <li><a href="<?php echo base_url();?>BDDDDOcontroller/manage_abusecase3">age 11-15</a></li>
                    <li><a href="<?php echo base_url();?>BDDDDOcontroller/manage_abusecase4">age 16-18</a></li>
                   </ul>
                  </li>
            
          </ul>
        </li>  
        
   <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                
                <li class="has-children">
                  <a href="#"><span>Abuse Case</span></a>
                  <ul class="dropdown">
              <li><a href="<?php echo base_url();?>BDDDDOcontroller/manage_abusecase">all abuse case</a></li>
                  <li class="has-children">
                    <a href="#"><span>HTP</span></a>
                  <ul class="dropdown">
                    <li><a href="<?php echo base_url();?>BDDDDOcontroller/manage_abusecase1">age < 5</a></li>
                    <li><a href="<?php echo base_url();?>BDDDDOcontroller/manage_abusecase2">age 6-10 </a></li>
                    <li><a href="<?php echo base_url();?>BDDDDOcontroller/manage_abusecase3">age 11-15</a></li>
                    <li><a href="<?php echo base_url();?>BDDDDOcontroller/manage_abusecase4">age 16-18</a></li>
                   </ul>
                  </li>
           <li><a href="<?php echo base_url();?>marketcontroller/listof_document1">REPE</a></li>
                    
                  </ul>
                </li>
                

              </ul>
     
           </div>
           <div class="col-md-6">
             <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>sereach abuse case</span>
            
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('BDDDDOcontroller/allabusecase');?>"><i class="fa fa-user-plus"></i>all age</a></li>
            <li><a href="<?php echo base_url('usercontroller/manage_schedule')?>"><i class="fa fa-circle-o"></i>Manage Checkups</a></li>
            <li><a href="<?php echo base_url()?>BDDDDOcontroller/uploadresearch"><i class="fa fa-laptop"></i>Comment</a></li>
      <li><a href="<?php echo base_url()?>BDDDDOcontroller/manage_population"><i class="fa fa-laptop"></i>Total Population</a></li>
       <li><a href="<?php echo base_url()?>BDDDDOcontroller/manage_nochildren"><i class="fa fa-laptop"></i>Total Number of children</a></li> 
       <li><a href="<?php echo base_url()?>BDDDDOcontroller/manage_female"><i class="fa fa-laptop"></i>Traind People</a></li>
       <li><a href="<?php echo base_url()?>BDDDDOcontroller/uploadresearch"><i class="fa fa-laptop"></i>Number of NGO</a></li>    
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>All Repport</span>
            
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('usercontroller/addschedule');?>"><i class="fa fa-user-plus"></i>Schedule Checkup</a></li>
            <li><a href="<?php echo base_url('usercontroller/manage_schedule')?>"><i class="fa fa-circle-o"></i>Manage Checkups</a></li>
            
          </ul>
        </li>  
           </ul>
          </ul>
        </li>  
           </div>
           </div> 
                
        

        </section>
</div>