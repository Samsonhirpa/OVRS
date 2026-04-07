<!DOCTYPE html>
<html>
<head>
    <style>
       /* Side Menu Styles - Matching Blue Theme with Top Menu */
:root {
    --sidebar-bg: #0f172a;
    --sidebar-light: #1e293b;
    --sidebar-hover: #2d3a4f;
    --accent: #3b82f6;
    --accent-dark: #2563eb;
    --accent-light: #60a5fa;
    --primary: #2563eb;
    --primary-dark: #1e40af;
    --text-light: #f1f5f9;
    --text-muted: #94a3b8;
    --border-color: #334155;
    --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.3);
    --sidebar-width: 300px;
    --mini-sidebar-width: 80px;
    --top-nav-height: 60px;
}

/* Main Sidebar - Fixed positioning */
.main-sidebar {
    position: fixed;
    top: 60px;
    left: 0;
    bottom: 0;
    width: var(--sidebar-width);
    background: linear-gradient(180deg, #0f172a 0%, #1a2634 100%);
    box-shadow: 2px 0 10px rgba(0,0,0,0.3);
    z-index: 1020;
    transition: width 0.3s ease;
    overflow-y: auto;
    overflow-x: hidden;
    border-right: 1px solid var(--border-color);
}

.content-wrapper,
.main-footer {
    margin-left: var(--sidebar-width);
    margin-top: 60px;
    transition: margin-left 0.3s ease;
    padding: 20px;
    min-height: calc(100vh - 60px);
    background: #f1f5f9;
    width: calc(100% - var(--sidebar-width));
}

.sidebar {
    display: block;
    padding-bottom: 20px;
}

.user-panel {
    padding: 25px 20px;
    border-bottom: 1px solid rgba(255,255,255,0.05);
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    background: rgba(0,0,0,0.2);
}

.user-panel .image {
    padding-right: 15px;
}

.user-panel .image img {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    border: 3px solid var(--accent);
    padding: 2px;
    transition: all 0.3s ease;
    background: var(--sidebar-light);
}

.user-panel .image img:hover {
    transform: scale(1.05);
    border-color: var(--accent-light);
}

.user-panel .info p {
    color: var(--text-light);
    font-weight: 600;
    margin-bottom: 5px;
    font-size: 16px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 180px;
}

.user-panel .info a {
    color: var(--accent);
    font-size: 13px;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 5px;
    transition: all 0.3s ease;
}

.user-panel .info a:hover {
    color: var(--accent-light);
    transform: translateX(5px);
}

.sidebar-form {
    margin: 15px 20px;
    border-radius: 25px;
    overflow: hidden;
    border: 2px solid var(--border-color);
    transition: all 0.3s ease;
    background: rgba(255,255,255,0.05);
}

.sidebar-form:hover {
    border-color: var(--accent);
    box-shadow: 0 0 0 3px rgba(59,130,246,0.1);
}

.sidebar-form input {
    background: transparent;
    border: none;
    color: var(--text-light);
    padding: 12px 15px;
    width: 100%;
    outline: none;
    font-size: 14px;
}

.sidebar-form input::placeholder {
    color: var(--text-muted);
    font-weight: 300;
}

.sidebar-form button {
    background: var(--accent);
    color: var(--text-light);
    border: none;
    padding: 12px 18px;
    transition: all 0.3s ease;
    cursor: pointer;
}

.sidebar-form button:hover {
    background: var(--accent-dark);
}

.sidebar-menu {
    list-style: none;
    margin: 0;
    padding: 0 15px;
}

.sidebar-menu > li {
    position: relative;
    margin-bottom: 5px;
}

.sidebar-menu > li > a {
    display: flex;
    align-items: center;
    padding: 14px 18px;
    color: var(--text-muted);
    border-radius: 12px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    font-weight: 500;
    font-size: 15px;
    text-decoration: none;
    position: relative;
    border-left: 3px solid transparent;
}

.sidebar-menu > li > a:hover {
    background: var(--sidebar-hover);
    color: var(--text-light);
    transform: translateX(5px);
    border-left-color: var(--accent);
}

.sidebar-menu > li.active > a {
    background: linear-gradient(90deg, var(--accent-dark) 0%, var(--accent) 100%);
    color: var(--text-light);
    box-shadow: 0 4px 10px rgba(37,99,235,0.3);
    border-left-color: var(--accent-light);
}

.sidebar-menu i {
    margin-right: 15px;
    font-size: 18px;
    width: 24px;
    text-align: center;
    color: var(--accent);
}

.sidebar-menu > li.active i {
    color: var(--text-light);
}

.pull-right-container {
    margin-left: auto;
}

.pull-right-container i {
    margin-right: 0;
    font-size: 14px;
    color: var(--text-muted);
}

.treeview-menu {
    list-style: none;
    margin: 5px 0 5px 35px !important;
    padding: 10px 0;
    background: rgba(0,0,0,0.2);
    border-radius: 12px;
    border-left: 3px solid var(--accent);
    display: none;
}

.treeview.active .treeview-menu {
    display: block;
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.treeview-menu li a {
    display: block;
    padding: 12px 15px 12px 55px;
    color: var(--text-muted);
    font-size: 14px;
    transition: all 0.3s ease;
    text-decoration: none;
    position: relative;
}

.treeview-menu li a:hover {
    color: var(--text-light);
    background: rgba(59,130,246,0.1);
    padding-left: 60px;
}

.treeview-menu li a i {
    position: absolute;
    left: 20px;
    top: 13px;
    font-size: 14px;
    color: var(--accent);
    margin-right: 0;
}

.sidebar-menu .header {
    color: var(--accent-light);
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 2px;
    padding: 20px 15px 8px;
    margin-top: 15px;
    border-bottom: 1px solid var(--border-color);
    margin-bottom: 15px;
    font-weight: 700;
}

.label {
    background: var(--accent);
    color: var(--text-light);
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    margin-left: 8px;
}

.main-sidebar::-webkit-scrollbar {
    width: 5px;
}

.main-sidebar::-webkit-scrollbar-track {
    background: var(--sidebar-bg);
}

.main-sidebar::-webkit-scrollbar-thumb {
    background: var(--accent);
    border-radius: 5px;
}

.main-sidebar::-webkit-scrollbar-thumb:hover {
    background: var(--accent-light);
}

body.sidebar-mini .main-sidebar {
    width: var(--mini-sidebar-width) !important;
}

body.sidebar-mini .content-wrapper,
body.sidebar-mini .main-footer {
    margin-left: var(--mini-sidebar-width) !important;
    width: calc(100% - var(--mini-sidebar-width)) !important;
}

body.sidebar-mini .sidebar-menu > li > a {
    padding: 14px;
    justify-content: center;
}

body.sidebar-mini .sidebar-menu > li > a i {
    margin-right: 0;
    font-size: 20px;
}

body.sidebar-mini .sidebar-menu > li > a span:not(.pull-right-container),
body.sidebar-mini .user-panel .info,
body.sidebar-mini .sidebar-form,
body.sidebar-mini .treeview-menu,
body.sidebar-mini .sidebar-menu .header,
body.sidebar-mini .pull-right-container {
    display: none !important;
}

body.sidebar-mini .user-panel {
    padding: 20px;
    justify-content: center;
}

body.sidebar-mini .user-panel .image {
    padding-right: 0;
}

body.sidebar-mini .user-panel .image img {
    width: 45px;
    height: 45px;
}

body.sidebar-mini .main-sidebar:hover {
    width: var(--sidebar-width) !important;
    box-shadow: var(--shadow-lg);
    z-index: 1030;
}

body.sidebar-mini .main-sidebar:hover .user-panel .info,
body.sidebar-mini .main-sidebar:hover .sidebar-form,
body.sidebar-mini .main-sidebar:hover .sidebar-menu > li > a span,
body.sidebar-mini .main-sidebar:hover .treeview-menu,
body.sidebar-mini .main-sidebar:hover .sidebar-menu .header,
body.sidebar-mini .main-sidebar:hover .pull-right-container {
    display: block !important;
}

body.sidebar-mini .main-sidebar:hover .sidebar-menu > li > a {
    padding: 14px 18px;
    justify-content: flex-start;
}

body.sidebar-mini .main-sidebar:hover .sidebar-menu > li > a i {
    margin-right: 15px;
    font-size: 18px;
}

body.sidebar-mini .main-sidebar:hover .user-panel {
    padding: 25px 20px;
}

body.sidebar-mini .main-sidebar:hover .user-panel .image {
    padding-right: 15px;
}

@media (max-width: 967px) {
    .main-sidebar {
        transform: translateX(-100%);
        width: 85%;
        max-width: 300px;
    }
    
    .sidebar-open .main-sidebar {
        transform: translateX(0);
    }
    
    .content-wrapper,
    .main-footer {
        margin-left: 0 !important;
        width: 100% !important;
    }
}
    </style>
</head>
<body>
    <aside class="main-sidebar">
        <section class="sidebar">
            <!-- User Panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo base_url(); ?>dist/img/NEB.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php
                        $role = $this->session->userdata('role');
                        $role_name = $this->db->select('*')->from('role')->where('role_id', $role)->get()->row();
                        echo $role_name->role_name;
                    ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Oromiyaa</a>
                </div>
            </div>

            <!-- Search Form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Barbaadi...">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>

            <!-- Role-based Menu -->
            <?php if ($this->session->userdata('role') == 1): ?>
                <!-- Admin Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">NAVIGATION</li>
                  
                    
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-users"></i> <span>Fayyadamtoota Sistemaa</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url('Structure/User_list') ?>"><i class="fa fa-list-alt"></i>Fayyadamtoota To'achuu</a></li>
                            <li><a href="<?php echo base_url('Structure/add_employee') ?>"><i class="fa fa-user-plus"></i>Fayyadamaa Haaraa dabali</a></li>
                        </ul>
                    </li>

                    <!-- Election Management for Admin -->
                    <li class="treeview <?php echo (isset($activeMenu) && ($activeMenu == 'adminElectionDashboard' || $activeMenu == 'adminElectionPartyReports' || $activeMenu == 'adminElectionRegionReports')) ? 'active' : ''; ?>">
                        <a href="#">
                            <i class="fa fa-check-square-o"></i> <span>Gabaasa Galmee Guyyaa Guyyaa</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url() ?>Structure/dashboard"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                            <li><a href="<?php echo base_url() ?>VotingReport/listReportAll"><i class="fa fa-list-alt"></i>Gabaasaa Waliigalaa</a></li>
                        </ul>
                    </li>        
 
                    <!-- Bu'aa Filannoo for Admin -->
                    <li class="treeview <?php echo (isset($activeMenu) && ($activeMenu == 'adminElectionDashboard' || $activeMenu == 'adminElectionPartyReports' || $activeMenu == 'adminElectionRegionReports')) ? 'active' : ''; ?>">
                        <a href="#">
                            <i class="fa fa-check-square-o"></i> <span>Bu'aa Filannoo</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php echo (isset($activeMenu) && $activeMenu == 'adminElectionDashboard') ? 'active' : ''; ?>">
                                <a href="<?php echo base_url('AdminElection/dashboard'); ?>">
                                    <i class="fa fa-dashboard"></i> Daashboordii
                                </a>
                            </li>
                            <li class="<?php echo (isset($activeMenu) && $activeMenu == 'adminElectionPartyReports') ? 'active' : ''; ?>">
                                <a href="<?php echo base_url('AdminElection/partyReports'); ?>">
                                    <i class="fa fa-flag"></i> Gabaasa Paartii
                                </a>
                            </li>
                            <li class="<?php echo (isset($activeMenu) && $activeMenu == 'adminElectionRegionReports') ? 'active' : ''; ?>">
                                <a href="<?php echo base_url('AdminElection/regionReports'); ?>">
                                    <i class="fa fa-map-marker"></i> Gabaasa Naannoo
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Baayyina Filattoota (Voter Turnout) for Admin -->
                    <li class="treeview <?php echo (isset($activeMenu) && ($activeMenu == 'voterTurnoutAdminDashboard' || $activeMenu == 'voterTurnoutAdminList')) ? 'active' : ''; ?>">
                        <a href="#">
                            <i class="fa fa-bar-chart"></i> <span>Baayyina Filattoota</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php echo (isset($activeMenu) && $activeMenu == 'voterTurnoutAdminDashboard') ? 'active' : ''; ?>">
                                <a href="<?php echo base_url('VoterTurnout/adminDashboard'); ?>">
                                    <i class="fa fa-dashboard"></i> Daashboordii Admin
                                </a>
                            </li>
                            <li class="<?php echo (isset($activeMenu) && $activeMenu == 'voterTurnoutAdminList') ? 'active' : ''; ?>">
                                <a href="<?php echo base_url('VoterTurnout/adminListReports'); ?>">
                                    <i class="fa fa-list"></i> Gabaasawwan Hunda
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>

            <?php elseif ($this->session->userdata('role') == 3): ?>
                <!-- Naannoo Filannoo User Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">NAVIGATION</li>
                    <li><a href="<?php echo base_url() ?>VotingReport/dashboard"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                    
                    <!-- Gabaasa Galmee Guyyaa Guyyaa -->
                    <li class="treeview <?php echo ($activeMenu == 'electionDashboard' || $activeMenu == 'electionReports') ? 'active' : ''; ?>">
                        <a href="#">
                            <i class="fa fa-check-square-o"></i> <span>Gabaasa Galmee Guyyaa Guyyaa</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url() ?>VotingReport/register"><i class="fa fa-plus-circle"></i>Gabaasa dabali</a></li>
                            <li><a href="<?php echo base_url() ?>VotingReport/listReports"><i class="fa fa-list-alt"></i>Gabaasa To'adhu</a></li>
                        </ul>
                    </li>

                    <!-- Bu'aa Filannoo -->
                    <li class="treeview <?php echo ($activeMenu == 'electionDashboard' || $activeMenu == 'electionReports') ? 'active' : ''; ?>">
                        <a href="#">
                            <i class="fa fa-check-square-o"></i> <span>Bu'aa Filannoo</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php echo ($activeMenu == 'electionDashboard') ? 'active' : ''; ?>">
                                <a href="<?php echo base_url('ElectionReport/dashboard'); ?>"><i class="fa fa-dashboard"></i> Daashboordii</a>
                            </li>
                            <li class="<?php echo ($activeMenu == 'electionReports') ? 'active' : ''; ?>">
                                <a href="<?php echo base_url('ElectionReport/listReports'); ?>"><i class="fa fa-list"></i> Gabaasawwan Koo</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('ElectionReport/register'); ?>"><i class="fa fa-plus-circle"></i> Haaraa Galmeessi</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Baayyina Filattoota (Voter Turnout) for Naannoo Filannoo -->
                    <li class="treeview <?php echo (isset($activeMenu) && ($activeMenu == 'voterTurnoutDashboard' || $activeMenu == 'voterTurnoutReports' || $activeMenu == 'voterTurnoutRegister')) ? 'active' : ''; ?>">
                        <a href="#">
                            <i class="fa fa-bar-chart"></i> <span>Baayyina Filattoota</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php echo (isset($activeMenu) && $activeMenu == 'voterTurnoutDashboard') ? 'active' : ''; ?>">
                                <a href="<?php echo base_url('VoterTurnout/dashboard'); ?>">
                                    <i class="fa fa-dashboard"></i> Daashboordii
                                </a>
                            </li>
                            <li class="<?php echo (isset($activeMenu) && $activeMenu == 'voterTurnoutReports') ? 'active' : ''; ?>">
                                <a href="<?php echo base_url('VoterTurnout/listReports'); ?>">
                                    <i class="fa fa-list"></i> Gabaasawwan Koo
                                </a>
                            </li>
                            <li class="<?php echo (isset($activeMenu) && $activeMenu == 'voterTurnoutRegister') ? 'active' : ''; ?>">
                                <a href="<?php echo base_url('VoterTurnout/register'); ?>">
                                    <i class="fa fa-plus-circle"></i> Haaraa Galmeessi
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            <?php endif; ?>
        </section>
    </aside>

    <script>
        // Sidebar toggle functionality
        document.getElementById('sidebarToggle').addEventListener('click', function(e) {
            e.preventDefault();
            document.body.classList.toggle('sidebar-mini');
            localStorage.setItem('sidebarState', document.body.classList.contains('sidebar-mini') ? 'mini' : 'full');
        });

        // Load saved preference
        document.addEventListener('DOMContentLoaded', function() {
            const savedState = localStorage.getItem('sidebarState');
            if (savedState === 'mini') {
                document.body.classList.add('sidebar-mini');
            }
        });

        // Treeview toggle
        document.querySelectorAll('.treeview > a').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const parent = this.parentElement;
                parent.classList.toggle('active');
            });
        });

        // Add tooltips for mini sidebar
        document.querySelectorAll('.sidebar-menu > li > a').forEach(item => {
            const span = item.querySelector('span');
            if (span) {
                item.setAttribute('title', span.textContent);
            }
        });
    </script>

</body>
</html>