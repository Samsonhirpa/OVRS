
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
        /* Top Menu Styles - White to Gray Gradient Background */
        :root {
            --gray-light: #e0e0e0;
            --gray-medium: #bdbdbd;
            --gray-dark: #9e9e9e;
            --gray-soft: #eeeeee;
            --white: #ffffff;
            --dark-text: #333333;
            --shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
            --logo-blue: #ffffff;
            --sidebar-width: 260px;
            --sidebar-collapsed-width: 80px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            overflow-x: hidden;
        }

        /* ========= TOP MENU STYLES ========= */
        .main-header {
            background: linear-gradient(135deg, #ffffff 0%, #f5f5f5 30%, #e8e8e8 60%, #d4d4d4 100%);
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
            background: #0096FF !important;
            color: #000000 !important;
            font-weight: 700;
            font-size: 20px;
            padding: 15px 20px;
            line-height: 30px;
            transition: all 0.3s ease;
            border-right: 1px solid rgba(0, 0, 0, 0.1);
            float: left;
            width: var(--sidebar-width);
            height: 60px;
            text-decoration: none;
            display: block;
            overflow: hidden;
            white-space: nowrap;
        }

        .main-header .logo:hover {
            background: #0088e6 !important;
        }

        .logo-lg b, .logo-mini b {
            color: #000000 !important;
            font-weight: 800;
            letter-spacing: 1px;
        }
        
        /* Logo mini (shown when sidebar collapsed) */
        .logo-mini {
            display: none;
        }
        
        .logo-lg {
            display: inline-block;
        }

        .navbar {
            background: transparent !important;
            border: none;
            margin-left: var(--sidebar-width);
            height: 60px;
            transition: margin-left 0.3s ease;
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
            color: var(--dark-text) !important;
            padding: 10px 20px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: rgba(128, 128, 128, 0.08);
            border: 1px solid rgba(128, 128, 128, 0.2);
            text-decoration: none;
        }

        .navbar-nav > li > a:hover {
            background: var(--gray-medium);
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(128, 128, 128, 0.3);
            border-color: var(--gray-medium);
        }

        .navbar-nav > li > a i {
            font-size: 16px;
            margin-right: 5px;
            color: var(--gray-dark);
        }

        .navbar-nav > li > a:hover i {
            color: white;
        }

        .sidebar-toggle {
            float: left;
            background: !important;
            color: #000000 !important;
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
            border-radius: 0px;
            margin-left: 0px;
        }

        .sidebar-toggle:hover {
            background: !important;
            color: #000000 !important;
            transform: scale(1.02);
        }

        .sidebar-toggle:hover i {
            color: #000000;
        }

        .sidebar-toggle i {
            font-size: 20px;
            color: #000000;
        }

        /* ========= SIDEBAR STYLES ========= */
        .main-sidebar {
            position: fixed;
            top: 60px;
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, #0096FF 0%, #0077cc 100%);
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            z-index: 1020;
            transition: width 0.3s ease;
            overflow-y: auto;
            overflow-x: hidden;
        }
        
        /* Sidebar collapsed state */
        body.sidebar-collapsed .main-sidebar {
            width: var(--sidebar-collapsed-width);
        }
        
        body.sidebar-collapsed .main-header .logo {
            width: var(--sidebar-collapsed-width);
        }
        
        body.sidebar-collapsed .navbar {
            margin-left: var(--sidebar-collapsed-width);
        }
        
        body.sidebar-collapsed .content-wrapper {
            margin-left: var(--sidebar-collapsed-width);
        }
        
        /* Hide text when sidebar collapsed */
        body.sidebar-collapsed .sidebar-menu > li > a span:not(.pull-right-container),
        body.sidebar-collapsed .user-panel .info,
        body.sidebar-collapsed .sidebar-form,
        body.sidebar-collapsed .sidebar-menu .header,
        body.sidebar-collapsed .pull-right-container {
            display: none !important;
        }
        
        body.sidebar-collapsed .sidebar-menu > li > a {
            justify-content: center;
            padding: 14px;
        }
        
        body.sidebar-collapsed .sidebar-menu > li > a i {
            margin-right: 0;
            font-size: 20px;
        }
        
        body.sidebar-collapsed .user-panel {
            justify-content: center;
            padding: 20px;
        }
        
        body.sidebar-collapsed .user-panel .image {
            padding-right: 0;
        }
        
        body.sidebar-collapsed .logo-lg {
            display: none;
        }
        
        body.sidebar-collapsed .logo-mini {
            display: inline-block;
        }
        
        /* Hover effect on collapsed sidebar */
        body.sidebar-collapsed .main-sidebar:hover {
            width: var(--sidebar-width);
        }
        
        body.sidebar-collapsed .main-sidebar:hover .sidebar-menu > li > a span,
        body.sidebar-collapsed .main-sidebar:hover .user-panel .info,
        body.sidebar-collapsed .main-sidebar:hover .sidebar-form,
        body.sidebar-collapsed .main-sidebar:hover .sidebar-menu .header,
        body.sidebar-collapsed .main-sidebar:hover .pull-right-container {
            display: block !important;
        }
        
        body.sidebar-collapsed .main-sidebar:hover .sidebar-menu > li > a {
            justify-content: flex-start;
            padding: 14px 18px;
        }
        
        body.sidebar-collapsed .main-sidebar:hover .sidebar-menu > li > a i {
            margin-right: 15px;
            font-size: 18px;
        }
        
        body.sidebar-collapsed .main-sidebar:hover .user-panel {
            justify-content: flex-start;
            padding: 25px 20px;
        }
        
        body.sidebar-collapsed .main-sidebar:hover .user-panel .image {
            padding-right: 15px;
        }
        
        body.sidebar-collapsed .main-sidebar:hover .logo-lg {
            display: inline-block;
        }
        
        body.sidebar-collapsed .main-sidebar:hover .logo-mini {
            display: none;
        }

        /* Sidebar content styles */
        .sidebar {
            display: block;
            padding-bottom: 20px;
        }

        .user-panel {
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.15);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            background: rgba(0,0,0,0.1);
        }

        .user-panel .image {
            padding-right: 15px;
        }

        .user-panel .image img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 2px solid white;
            padding: 2px;
        }

        .user-panel .info p {
            color: white;
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .user-panel .info a {
            color: rgba(255,255,255,0.8);
            font-size: 12px;
            text-decoration: none;
        }

        .sidebar-form {
            margin: 15px 20px;
            border-radius: 25px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.3);
            background: rgba(255,255,255,0.1);
        }

        .sidebar-form input {
            background: transparent;
            border: none;
            color: white;
            padding: 10px 15px;
            width: 100%;
            outline: none;
        }

        .sidebar-form input::placeholder {
            color: rgba(255,255,255,0.7);
        }

        .sidebar-form button {
            background: rgba(255,255,255,0.2);
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }

        .sidebar-menu {
            list-style: none;
            margin: 0;
            padding: 0 15px;
        }

        .sidebar-menu > li {
            margin-bottom: 5px;
        }

        .sidebar-menu > li > a {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            color: rgba(255,255,255,0.85);
            border-radius: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .sidebar-menu > li > a:hover {
            background: rgba(255,255,255,0.15);
            color: white;
        }

        .sidebar-menu > li.active > a {
            background: rgba(255,255,255,0.25);
            color: white;
        }

        .sidebar-menu i {
            margin-right: 15px;
            width: 20px;
            text-align: center;
            color: white;
        }

        .sidebar-menu .header {
            color: rgba(255,255,255,0.7);
            font-size: 11px;
            text-transform: uppercase;
            padding: 15px 15px 8px;
            margin-top: 15px;
        }

        /* Main content */
        .content-wrapper {
            margin-left: var(--sidebar-width);
            margin-top: 60px;
            transition: margin-left 0.3s ease;
            padding: 20px;
            min-height: calc(100vh - 60px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-sidebar {
                transform: translateX(-100%);
                width: var(--sidebar-width);
            }
            
            body.sidebar-mobile-open .main-sidebar {
                transform: translateX(0);
            }
            
            .content-wrapper {
                margin-left: 0;
            }
            
            .navbar {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <!-- TOP MENU -->
    <header class="main-header">
        <a href="#" class="logo">
            <span class="logo-mini"><b>OEM</b></span>
            <span class="logo-lg"><b>OEM</b></span>
        </a>
        
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" id="sidebarToggle" role="button">

            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">
                            <i class="fa fa-user-circle"></i> 
                            <span>Profile</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="#">
                            <i class="fa fa-sign-out"></i> 
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>



    <script>
        // Sidebar toggle functionality - minimizes sidebar when button clicked
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('sidebarToggle');
            const body = document.body;
            
            // Check for saved preference
            const savedState = localStorage.getItem('sidebarCollapsed');
            if (savedState === 'true') {
                body.classList.add('sidebar-collapsed');
            }
            
            // Toggle sidebar on button click
            if (toggleBtn) {
                toggleBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    body.classList.toggle('sidebar-collapsed');
                    
                    // Save preference
                    const isCollapsed = body.classList.contains('sidebar-collapsed');
                    localStorage.setItem('sidebarCollapsed', isCollapsed);
                });
            }
            
            // Handle responsive mobile sidebar
            const isMobile = window.innerWidth <= 768;
            if (isMobile) {
                body.classList.remove('sidebar-collapsed');
            }
        });
    </script>
