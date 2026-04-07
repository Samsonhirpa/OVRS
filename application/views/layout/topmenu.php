<style>
    /* Top Menu Styles - Modern Professional Header */
    :root {
        
        --primary: #2563eb;
        --primary-dark: #1e40af;
        --secondary: #7c3aed;
        --white: #ffffff;
        --light-bg: #f8fafc;
        --shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
    }

    .main-header {
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
        box-shadow: var(--shadow);
        border: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1030;
        height: 60px;
    }

    .main-header .logo {
        background: rgba(0, 0, 0, 0.1);
        color: var(--white);
        font-weight: 700;
        font-size: 20px;
        padding: 15px 20px;
        line-height: 30px;
        transition: all 0.3s ease;
        border-right: 1px solid rgba(255,255,255,0.1);
        float: left;
        width: 300px;
        height: 60px;
    }

    .main-header .logo:hover {
        background: rgba(0, 0, 0, 0.2);
    }

    .logo-lg b, .logo-mini b {
        color: var(--white);
        font-weight: 800;
        letter-spacing: 1px;
    }

    .navbar {
        background: transparent !important;
        border: none;
        margin-left: 300px;
        height: 60px;
    }

    .navbar-custom-menu {
        float: right;
        margin-right: 20px;
    }

    .navbar-nav {
        margin: 0;
        padding: 0;
        list-style: none;
        display: flex;
        align-items: center;
        height: 60px;
    }

    .navbar-nav > li {
        position: relative;
        display: inline-block;
        margin-left: 5px;
    }

    .navbar-nav > li > a {
        color: var(--white) !important;
        padding: 10px 20px;
        border-radius: 30px;
        font-size: 14px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .navbar-nav > li > a:hover {
        background: rgba(255, 255, 255, 0.25);
        transform: translateY(-2px);
        box-shadow: 0 8px 15px rgba(0,0,0,0.2);
        border-color: rgba(255, 255, 255, 0.4);
    }

    .navbar-nav > li > a i {
        font-size: 16px;
        margin-right: 5px;
    }

    .sidebar-toggle {
        float: left;
        background: rgba(255, 255, 255, 0.15);
        color: var(--white) !important;
        padding: 15px 20px;
        line-height: 30px;
        font-size: 18px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 60px;
        width: 60px;
        text-decoration: none;
        border: none;
        cursor: pointer;
    }

    .sidebar-toggle:hover {
        background: rgba(255, 255, 255, 0.25);
        transform: scale(1.05);
    }

    .sidebar-toggle i {
        font-size: 20px;
    }

    .user-menu {
        position: relative;
    }

    .dropdown-menu {
        position: absolute;
        top: 100%;
        right: 0;
        z-index: 1000;
        display: none;
        min-width: 200px;
        padding: 0;
        margin-top: 10px;
        background: var(--white);
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        border: 1px solid rgba(0,0,0,0.05);
        animation: slideDown 0.3s ease;
    }

    .user-menu:hover .dropdown-menu {
        display: block;
    }

    .user-header {
        padding: 20px;
        text-align: center;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        border-radius: 12px 12px 0 0;
        color: var(--white);
    }

    .user-header img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        border: 3px solid rgba(255,255,255,0.3);
        margin-bottom: 10px;
    }

    .user-footer {
        padding: 15px;
        display: flex;
        justify-content: space-between;
        background: var(--white);
        border-radius: 0 0 12px 12px;
    }

    .btn {
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 500;
        transition: all 0.3s ease;
        border: 1px solid #e2e8f0;
        background: var(--white);
        color: #1e293b;
        text-decoration: none;
    }

    .btn:hover {
        background: #f1f5f9;
        border-color: #cbd5e1;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 967px) {
        .main-header .logo {
            width: 100%;
            text-align: center;
            border-right: none;
        }
        
        .navbar {
            margin-left: 0;
        }
        
        .navbar-custom-menu {
            margin-right: 10px;
        }
        
        .navbar-nav > li > a {
            padding: 8px 12px;
            font-size: 12px;
        }
        
        .navbar-nav > li > a span {
            display: none;
        }
    }

    .wrapper {
        padding-top: 60px;
    }

    .fa-circle.text-success {
        color: #10b981 !important;
        font-size: 8px;
        margin-right: 5px;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<header class="main-header">
    <a href="<?php echo base_url('Structure/dashboard');?>" class="logo">
        <span class="logo-mini"><b>ONEB</b></span>
        <span class="logo-lg"><b>ONEB</b></span>
    </a>
    
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" id="sidebarToggle" role="button">
            <span class="sr-only">Toggle navigation</span>
            <i class="fa fa-bars"></i>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo base_url('structure/profile/'.$this->session->userdata('username')); ?>">
                        <i class="fa fa-user-circle"></i> 
                        <span>Profile</span>
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo base_url('Structure/logout');?>">
                        <i class="fa fa-sign-out"></i> 
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>