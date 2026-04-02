
<aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                  <div class="pull-left image">
                        <img style="height: 50px; width: 500px;" src="<?php echo base_url(); ?>dist/img/youthlogo.jpg" class="img-circle" alt="User Image">
                  </div>
                  <div class="pull-left info">
                        <p><?php
                              $role = $this->session->userdata('role');
                              $role_name = $this->db->select('*')->from('role')->where('role_id', $role)->get()->row();

                              echo $role_name->role_name;
                              ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i>  Oromiyaa </a>
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
                       <li class="treeview">
                              <a href="#">
                                    <i class="fa fa-users"></i> <span>Fayyadamtoota Sistemaa</span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                              <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url('Structure/User_list') ?>"><i class="fa fa-list-alt"></i>Fayyadamtoota To'achuu</a></li>
                                    <li><a href="<?php echo base_url('BDDDDOcontroller/add_employee') ?>"><i class="fa fa-user-plus"></i>Fayyadamaa Haaraa dabali</a></li>
                                  </ul>
                        </li>
                            <!-- <li class="treeview">
                              <a href="#">
                                    <i class="fa fa-link"></i> <span>Odeeffannoo Hoggantoota</span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                               <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url('Structure/managecabine') ?>"><i class="fa fa-list-alt"></i>Hogganaa To'achuu</a></li>
                                    <li><a href="<?php echo base_url('Structure/addcabines') ?>"><i class="fa fa-user-plus"></i>Hogganaa Haaraa dabali</a></li>
                                  </ul>

                        </li>  -->
                         <!-- <li class="treeview">
                              <a href="#">
                                    <i class="fa fa-link"></i> <span>Ragaa Dargaggoota</span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                               <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url('Structure/ManageYouth') ?>"><i class="fa fa-list-alt"></i>Dargaggoo To'achuu</a></li>
                                    <li><a href="<?php echo base_url('Structure/AddYouth') ?>"><i class="fa fa-user-plus"></i>Dargaggoo Haaraa dabali</a></li>
                                  </ul>

                        </li>  -->
                    <li class="treeview">
                              <a href="#">
                                    <i class="fa fa-link"></i> <span>Gurmaainsa</span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                               <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url('Sport/Garee') ?>"><i class="fa fa-list-alt"></i>Garee Ispoortii</a></li>
                                    <li><a href="<?php echo base_url('Sport/Marshal_arti') ?>"><i class="fa fa-users"></i> Wirtuu Maarshal artii </a></li>

                                    <li><a href="<?php echo base_url('Sport/manageclub') ?>"><i class="fa fa-list-alt"></i>Kilaboota</a></li>
                                    <!-- <li><a href="<?php echo base_url('Sport/addclub') ?>"><i class="fa fa-user-plus"></i>Kilabii Ispoortii dabali</a></li> -->
                                    <li><a href="<?php echo base_url('Sport/Taphattoota') ?>"><i class="fa fa-users"></i> Taphattoota </a></li>
                                    
                                    <li><a href="<?php echo base_url('Sport/Waldaalee') ?>"><i class="fa fa-list-alt"></i> Waldaalee  Ispoortii </a></li>
                                    <!-- <li><a href="<?php echo base_url('Sport/mmi') ?>"><i class="fa fa-circle-o"></i> Galii MMI </a></li> -->

                                  </ul>

                        </li>  

                 
                        <!--   <li><a href="<?php echo base_url() ?>Structure/AddMemeber"><i class="fa fa-laptop"></i>Miseensummaa Jarmiyaa</a></li>
                          <li><a href="<?php echo base_url() ?>Structure/Add_GGBND"><i class="fa fa-laptop"></i>Giduu Galaa Dargaggootaa</a></li>
                          <li><a href="<?php echo base_url() ?>Structure/Add_ScienceCafe"><i class="fa fa-laptop"></i>Giduu Galaa Sayinsii Kafee</a></li> -->
                        <!-- <li class="treeview">
                              <a href="#">
                                    <i class="fa fa-user-plus"></i> <span>Miseensummaa Jarmiyaa</span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                              <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url('Structure/alluserinfo') ?>"><i class="fa fa-list-alt"></i>Gabaasa Fayyadmtootaa</a></li>
                                     
                                    <li><a href="<?php echo base_url('Structure/allinfo') ?>"><i class="fa fa-user-o"></i> Hoggantootaa Oromiyaa</a></li>
                                  
                     
                  </ul> -->
              
                         <li class="treeview">
                              <a href="#">
                                    <i class="fa fa-link"></i> <span>Barn,Leenji & Dorg   </span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                               <ul class="treeview-menu">
                         <li><a href="<?php echo base_url('Sport/SGL') ?>"><i class="fa fa-laptop"></i>Buufata SLG </a></li>
                         <li><a href="<?php echo base_url('Sport/GuddattootaSGL') ?>"><i class="fa fa-laptop"></i>Leenjitoota SLG </a></li>
                         <li><a href="<?php echo base_url('Sport/gglenji') ?>"><i class="fa  fa-plus"></i> Giddugala Leenjii</a></li>
                        <li><a href="<?php echo base_url('Sport/Giddugalaleenjii') ?>"><i class="fa fa-laptop"></i>Leenjitoota G/g leenjii </a></li>
                        <li><a href="<?php echo base_url('Sport/Leenjisummaa') ?>"><i class="fa fa-link"></i>Leenjii Leenjisummaa </a></li>
                        <li><a href="<?php echo base_url('Sport/Murteessummaa') ?>"><i class="fa fa-link"></i>Leenjii Murteessummaa </a></li>

                        <li><a href="<?php echo base_url('Sport/Hirmaattoota') ?>"><i class="fa fa-laptop"></i> Hirmaattoota Dorgommii</a></li>

                        
                         <li><a href="<?php echo base_url('Sport/Guddattoota') ?>"><i class="fa fa-laptop"></i>Atileetoota Ciccimoo  </a></li>
                   
                       
                        <!-- <li><a href="<?php echo base_url('Structure/dashboard') ?>"><i class="fa fa-laptop"></i> Ragaa Leenjtootaa  </a></li> -->
                        



                                  </ul>

                        </li>


                        <li class="treeview">
                              <a href="#">
                                    <i class="fa fa-link"></i> <span>Bakka Olmaa Ispoortii</span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                               <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('Sport/Oolmaisporti') ?>"><i class="fa fa-laptop"></i> Bakka Oolmaa Ispoortii  </a></li>
                        <li><a href="<?php echo base_url('Sport/boimb') ?>"><i class="fa fa-laptop"></i> BOI Mana Barnoota   </a></li>
                        <!-- <li><a href="<?php echo base_url('Sport/inisheetivii') ?>"><i class="fa fa-laptop"></i>Inisheetivii BOI</a></li> -->
                        <li><a href="<?php echo base_url('Sport/istediyemi') ?>"><i class="fa fa-laptop"></i>Isteediyeemiiwwan</a></li>

                                  </ul>

                        </li>

                  <!--        <li class="treeview">
                              <a href="#">
                                    <i class="fa fa-link"></i> <span>Ispoortii Hawaasaa</span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                               <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('Sport/mbfibb') ?>"><i class="fa fa-laptop"></i> M/B fi Barattoota </a></li>
                  <li><a href="<?php echo base_url('Sport/dashboard') ?>"><i class="fa fa-laptop"></i> M/Hojii fi Hojjettoota   </a></li>
                        <li><a href="<?php echo base_url('Structure/dashboard') ?>"><i class="fa fa-laptop"></i>Baay’ina Uummataa </a></li>
                       
                                  </ul>

                        </li> -->
                        
                                  <li class="treeview">
                              <a href="#">
                                    <i class="fa fa-link"></i> <span>Gabaasa</span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                               <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url('Sport/Gabasakilabi') ?>"><i class="fa fa-list-alt"></i>Gabaasa Kilaboota</a></li>
                                    <!-- <li><a href="<?php echo base_url('Sport/addclub') ?>"><i class="fa fa-user-plus"></i>Kilabii Ispoortii dabali</a></li> -->
                                    <li><a href="<?php echo base_url('Sport/GabasaTapattoota') ?>"><i class="fa fa-users"></i> Gabaasa Taphattoota </a></li>
                                    <li><a href="<?php echo base_url('Sport/GabasaSLG') ?>"><i class="fa fa-list-alt"></i>Gabaasa SLG</a></li>
                                    
                                    <li><a href="<?php echo base_url('Sport/GabasaGGL') ?>"><i class="fa fa-users"></i> Gabasa G/G Leenjii </a></li>
                                   
                                  </ul>

                        </li>
                       
                        <li><a href="<?php echo base_url() ?>Sport/MadaalliiLenjitootaa"><i class="fa fa-angle-double-up"></i>Madaallii Taphataa</a></li>
                        <li><a href="<?php echo base_url() ?>Structure/ReserchDocument"><i class="fa fa-file"></i>Sanadoota BDSO</a></li>
                        <li><a href="<?php echo base_url() ?>Structure/manage_ipcomment"><i class="fa fa-laptop"></i>Yaadota</a></li>
                         <li class="treeview">
                              <a href="#">
                                    <i class="fa fa-gears"></i> <span>Serreessitu</span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                              <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url('Structure/Zone') ?>"><i class="fa  fa-plus"></i> Godina/Magaalaa </a></li>
                                    <li><a href="<?php echo base_url('Structure/Woreda') ?>"><i class="fa fa-link"></i> Aanaa</a></li>
                                    <li><a href="<?php echo base_url('Structure/Kebele') ?>"><i class="fa fa-link"></i> Gandaa</a></li>
                                    <li><a href="<?php echo base_url('Structure/Zone') ?>"><i class="fa  fa-plus"></i> Dhabbata Barnoota </a></li>
                                    <li><a href="<?php echo base_url('Structure/Woreda') ?>"><i class="fa fa-link"></i> Gosa Barumsaa</a></li>
                                    <!-- <li><a href="<?php echo base_url('Structure/Kebele') ?>"><i class="fa fa-link"></i> Gandaa</a></li> -->
                                  </ul>
                        </li>

                       
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
                                    <i class="fa fa-link"></i> <span>Ragaa Dargaggoota</span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                               <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url('Structure/ManageYouth') ?>"><i class="fa fa-list-alt"></i>Dargaggoo To'achuu</a></li>
                                    <li><a href="<?php echo base_url('Structure/AddYouth') ?>"><i class="fa fa-user-plus"></i>Dargaggoo Haaraa dabali</a></li>
                                  </ul>

                        </li>

                        <li><a href="<?php echo base_url() ?>Structure/AddMemeber"><i class="fa fa-laptop"></i>Miseensummaa Jarmiyaa</a></li>
                          <li><a href="<?php echo base_url() ?>Structure/Add_GGBND"><i class="fa fa-laptop"></i>Giduu Galaa Dargaggootaa</a></li>
                          <li><a href="<?php echo base_url() ?>Structure/Add_ScienceCafe"><i class="fa fa-laptop"></i>Giduu Galaa Sayinsii Kafee</a></li>


                              
                  
                        <li><a href="<?php echo base_url() ?>Structure/hoggantoota_godina"><i class="fa fa-laptop"></i>Dargaggootaa Godina Hunda</a></li>
                        <li><a href="<?php echo base_url() ?>Structure/manage_ipcomment"><i class="fa fa-laptop"></i>Yaada</a></li>

                             
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
                                    <i class="fa fa-link"></i> <span>Ragaa Dargaggoota</span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                               <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url('Structure/ManageYouth') ?>"><i class="fa fa-list-alt"></i>Dargaggoo To'achuu</a></li>
                                    <li><a href="<?php echo base_url('Structure/AddYouth') ?>"><i class="fa fa-user-plus"></i>Dargaggoo Haaraa dabali</a></li>
                                  </ul>

                        </li>

                        <li><a href="<?php echo base_url() ?>Structure/AddMemeber"><i class="fa fa-laptop"></i>Miseensummaa Jarmiyaa</a></li>
                          <li><a href="<?php echo base_url() ?>Structure/Add_GGBND"><i class="fa fa-laptop"></i>Giduu Galaa Dargaggootaa</a></li>
                          <li><a href="<?php echo base_url() ?>Structure/Add_ScienceCafe"><i class="fa fa-laptop"></i>Giduu Galaa Sayinsii Kafee</a></li>
                        </li>


                              <li><a href="<?php echo base_url('structure/hoggantoota_aanaa'); ?>"><i class="fa fa-circle-o"></i>Dargaggoota Aanaa</a></li>

                              <li><a href="<?php echo base_url('structure/ipcomment'); ?>"><i class="fa fa-circle-o"></i>Yaada</a></li>



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
                                    <i class="fa fa-link"></i> <span>Ragaa Dargaggoota</span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                               <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url('Structure/ManageYouth') ?>"><i class="fa fa-list-alt"></i>Dargaggoo To'achuu</a></li>
                                    <li><a href="<?php echo base_url('Structure/AddYouth') ?>"><i class="fa fa-user-plus"></i>Dargaggoo Haaraa dabali</a></li>
                                  </ul>

                        </li>

                        <li><a href="<?php echo base_url() ?>Structure/AddMemeber"><i class="fa fa-laptop"></i>Miseensummaa Jarmiyaa</a></li>
                          <li><a href="<?php echo base_url() ?>Structure/Add_GGBND"><i class="fa fa-laptop"></i>Giduu Galaa Dargaggootaa</a></li>
                          <li><a href="<?php echo base_url() ?>Structure/Add_ScienceCafe"><i class="fa fa-laptop"></i>Giduu Galaa Sayinsii Kafee</a></li>
                        </li>


                              <li><a href="<?php echo base_url('structure/hoggantoota_aanaa'); ?>"><i class="fa fa-circle-o"></i>Dargaggoota Aanaa</a></li>

                              <li><a href="<?php echo base_url('structure/ipcomment'); ?>"><i class="fa fa-circle-o"></i>Yaada</a></li>



                        </ul>


                        ?>

                        <?php
                  } else if ($this->session->userdata('role') == 6) {
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


                              <
<li class="treeview">
                              <a href="#">
                                    <i class="fa fa-link"></i> <span>Kilabootaa Ispoortii</span>
                                    <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                               <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url('Structure/ManageYouth') ?>"><i class="fa fa-list-alt"></i>Kilabootaa  To'achuu</a></li>
                                    <li><a href="<?php echo base_url('Sport/addclub') ?>"><i class="fa fa-user-plus"></i>Kilabii Ispoortii dabali</a></li>
                                  </ul>

                        </li>

                        <li><a href="<?php echo base_url() ?>Structure/AddMemeber"><i class="fa fa-laptop"></i>Miseensummaa Jarmiyaa</a></li>
                          <li><a href="<?php echo base_url() ?>Structure/Add_GGBND"><i class="fa fa-laptop"></i>Giduu Galaa Dargaggootaa</a></li>
                          <li><a href="<?php echo base_url() ?>Structure/Add_ScienceCafe"><i class="fa fa-laptop"></i>Giduu Galaa Sayinsii Kafee</a></li>
                        </li>


                              <li><a href="<?php echo base_url('structure/hoggantoota_aanaa'); ?>"><i class="fa fa-circle-o"></i>Dargaggoota Aanaa</a></li>

                              <li><a href="<?php echo base_url('structure/ipcomment'); ?>"><i class="fa fa-circle-o"></i>Yaada</a></li>

                              <!-- <li><a href="<?php echo base_url('marketcontroller/mange_usercom'); ?>"><i class="fa fa-circle-o"></i><?php echo $this->lang->line('feedback_menu'); ?></a></li> -->

                        </ul>
<?php } ?>
                  </aside>