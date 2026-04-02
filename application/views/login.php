<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Galmee Seensa | Sirna Filannoo Oromiyaa</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0a1929 0%, #1a2a3a 50%, #0f172a 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Animated background elements */
        body::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(37,99,235,0.1) 0%, transparent 50%);
            animation: rotate 30s linear infinite;
            z-index: 0;
        }

        body::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.05"><path d="M50 10 L60 40 L90 40 L65 60 L75 90 L50 70 L25 90 L35 60 L10 40 L40 40 Z" fill="%233b82f6"/></svg>') repeat;
            background-size: 100px 100px;
            animation: float 60s linear infinite;
            z-index: 0;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes float {
            from { background-position: 0 0; }
            to { background-position: 1000px 1000px; }
        }

        /* Main container */
        .login-container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 500px; /* Increased from default */
            align: center;
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Oromia flag stripes animation */
        .flag-stripes {
            display: flex;
            height: 6px;
            width: 100%;
            margin-bottom: 15px;
            border-radius: 3px;
            overflow: hidden;
            animation: slideInLeft 0.8s ease-out;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .flag-stripe {
            flex: 1;
            height: 100%;
            transition: all 0.3s ease;
        }

        .flag-stripe.green {
            background: #078930;
            animation: pulseGreen 2s ease-in-out infinite;
        }

        .flag-stripe.yellow {
            background: #FCDD09;
            animation: pulseYellow 2s ease-in-out infinite 0.3s;
        }

        .flag-stripe.red {
            background: #DA121A;
            animation: pulseRed 2s ease-in-out infinite 0.6s;
        }

        @keyframes pulseGreen {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }

        @keyframes pulseYellow {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }

        @keyframes pulseRed {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }

        /* Login box - wider */
        .login-box {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.2);
            width: 110%;
            align: center;
            animation: scaleIn 0.6s ease-out 0.2s both;
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Header with Oromia theme */
        .login-header {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .login-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(135deg, rgba(37,99,235,0.2) 0%, rgba(59,130,246,0.2) 100%);
            transform: rotate(45deg);
            animation: shine 4s infinite;
        }

        @keyframes shine {
            0% {
                transform: rotate(45deg) translateY(-100%);
            }
            100% {
                transform: rotate(45deg) translateY(100%);
            }
        }

        .login-header h1 {
            color: white;
            font-size: 32px;
            font-weight: 700;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            position: relative;
            z-index: 2;
            animation: slideInDown 0.8s ease-out;
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header h2 {
            color: rgba(255,255,255,0.9);
            font-size: 18px;
            font-weight: 400;
            margin: 10px 0 0;
            position: relative;
            z-index: 2;
            animation: slideInDown 0.8s ease-out 0.1s both;
        }

        .login-header .oromia-text {
            color: #FCDD09;
            font-weight: 600;
        }

        /* Welcome message */
        .welcome-message {
            padding: 30px 30px 10px;
            text-align: center;
            animation: fadeIn 1s ease-out 0.3s both;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .welcome-message h3 {
            color: #0f172a;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .welcome-message p {
            color: #475569;
            font-size: 14px;
            line-height: 1.6;
        }

        .welcome-message i {
            color: #2563eb;
            margin-right: 5px;
        }

        /* Login body - with wider inputs */
        .login-body {
            padding: 20px 30px 30px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
            animation: slideInRight 0.6s ease-out;
            animation-fill-mode: both;
        }

        .form-group:nth-child(1) { animation-delay: 0.4s; }
        .form-group:nth-child(2) { animation-delay: 0.5s; }
        .form-group:nth-child(3) { animation-delay: 0.6s; }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #1e293b;
            font-weight: 500;
            font-size: 14px;
        }

        .form-group label i {
            color: #2563eb;
            margin-right: 5px;
        }

        /* Wider input boxes */
        .input-group {
            width: 100%;
            display: flex;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            border: 2px solid #e2e8f0;
            background: white;
        }

        .input-group:hover {
            box-shadow: 0 8px 20px rgba(37,99,235,0.15);
            border-color: #3b82f6;
            transform: translateY(-2px);
        }

        .input-group:focus-within {
            box-shadow: 0 8px 25px rgba(37,99,235,0.25);
            border-color: #2563eb;
        }

        .input-group-addon {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: white;
            border: none;
            padding: 0 20px; /* Wider padding */
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            min-width: 60px; /* Fixed width for icon area */
        }

        .input-group-addon i {
            font-size: 18px;
        }

        .form-control {
            border: none;
            height: 55px; /* Taller input */
            font-size: 15px;
            padding: 0 20px; /* More horizontal padding */
            flex: 1;
            outline: none;
            background: white;
            width: 100%; /* Full width */
        }

        .form-control:focus {
            outline: none;
        }

        .form-control::placeholder {
            color: #94a3b8;
            font-weight: 300;
        }

        /* Remember me checkbox */
        .remember-me {
            margin-bottom: 25px;
            animation: fadeIn 1s ease-out 0.7s both;
        }

        .remember-me label {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #475569;
            font-weight: 400;
            cursor: pointer;
        }

        .remember-me input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #2563eb;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .remember-me input[type="checkbox"]:hover {
            transform: scale(1.1);
        }

        /* Login button */
        .btn-login {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            border: none;
            color: white;
            font-size: 16px;
            font-weight: 600;
            padding: 16px 20px; /* Taller button */
            border-radius: 12px;
            width: 100%;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 10px 25px rgba(15,23,42,0.3);
            position: relative;
            overflow: hidden;
            animation: bounceIn 1s ease-out 0.8s both;
        }

        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0.3);
            }
            50% {
                opacity: 1;
                transform: scale(1.05);
            }
            70% {
                transform: scale(0.9);
            }
            100% {
                transform: scale(1);
            }
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.6s ease;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(37,99,235,0.4);
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:active {
            transform: translateY(-1px);
        }

        .btn-login i {
            margin-right: 10px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Login footer */
        .login-footer {
            padding: 20px 30px 30px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
            background: #f8fafc;
            animation: fadeIn 1s ease-out 0.9s both;
        }

        .login-footer p {
            margin: 5px 0;
            color: #64748b;
            font-size: 13px;
        }

        .login-footer a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .login-footer a:hover {
            color: #1e40af;
            text-decoration: underline;
        }

        /* Alert messages */
        .alert {
            border-radius: 12px;
            padding: 15px 20px;
            margin: 20px 30px 0;
            border: none;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: slideInDown 0.5s ease;
        }

        .alert-success {
            background: #dff0d8;
            color: #155724;
            border-left: 4px solid #078930;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border-left: 4px solid #DA121A;
        }

        .alert i {
            font-size: 18px;
        }

        /* Language selector */
        .language-selector {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 20;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 5px;
            border: 1px solid rgba(255,255,255,0.2);
            animation: fadeIn 1s ease-out;
        }

        .language-selector button {
            background: transparent;
            border: none;
            color: white;
            padding: 8px 16px;
            border-radius: 25px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .language-selector button.active {
            background: white;
            color: #0f172a;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }

        .language-selector button:hover {
            background: rgba(255,255,255,0.2);
        }

        .language-selector button.active:hover {
            background: white;
        }

        /* Oromia region badge */
        .region-badge {
            display: inline-block;
            background: rgba(37,99,235,0.1);
            color: #2563eb;
            padding: 5px 15px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 500;
            margin-top: 10px;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        .region-badge i {
            margin-right: 5px;
            color: #FCDD09;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-container {
                padding: 10px;
            }
            
            .login-header h1 {
                font-size: 24px;
            }
            
            .login-header h2 {
                font-size: 16px;
            }
            
            .welcome-message h3 {
                font-size: 20px;
            }
            
            .input-group-addon {
                padding: 0 15px;
                min-width: 50px;
            }
            
            .form-control {
                height: 50px;
                padding: 0 15px;
            }
        }
    </style>
</head>
<body>
   
    
    <!-- Login Container -->
    <div class="login-container">
        <!-- Oromia Flag Stripes -->
       
        
        <!-- Login Box -->
        <div class="login-box">
            <!-- Header -->
            <div class="login-header">
                <h1>PBO</h1>
                <h2>Sirna Galmee Filannoo <span class="oromia-text">Oromiyaa</span></h2>
                <div class="region-badge">
                    <i class="fa fa-map-marker"></i> 178 Naannoo Filannoo
                </div>
            </div>
            
            <!-- Welcome Message -->
            <div class="welcome-message">
                <h3>
                    <i class="fa fa-hand-peace-o" style="color: #FCDD09;"></i> 
                    Baga Nagaan Dhuftan!
                </h3>
                <p>
                    <i class="fa fa-check-circle" style="color: #078930;"></i> 
                    Galmee Filannoo Oromiyaa. Maqaa herregaa fi jecha darbii kee galchi.
                </p>
            </div>
            
            <!-- Flash Messages -->
            <?php if($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <i class="fa fa-check-circle"></i>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>
            
            <?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <i class="fa fa-exclamation-circle"></i>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>
            
            <!-- Login Body -->
            <div class="login-body">
                <form action="<?php echo base_url('Structure/checkuser'); ?>" method="post">
                    <!-- Username Field - Wider -->
                    <div class="form-group">
                        <label>
                            <i class="fa fa-user"></i> Maqaa Herregaa
                        </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                            <input type="text" class="form-control" name="username" placeholder="Maqaa herregaa galchi" required autofocus>
                        </div>
                    </div>
                    
                    <!-- Password Field - Wider -->
                    <div class="form-group">
                        <label>
                            <i class="fa fa-lock"></i> Jecha Darbii
                        </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-lock"></i>
                            </span>
                            <input type="password" class="form-control" name="password" placeholder="Jecha darbii galchi" required>
                        </div>
                    </div>
                    
                    <!-- Remember Me -->
                    <div class="remember-me">
                        <label>
                            <input type="checkbox" name="remember"> Yaadadhu (Remember me)
                        </label>
                    </div>
                    
                    <!-- Login Button -->
                    <button type="submit" class="btn-login">
                        <i class="fa fa-sign-in"></i> Galmaa'u
                    </button>
                </form>
            </div>
            
            <!-- Footer -->
            <div class="login-footer">
                <p>© <?php echo date('Y'); ?> Oromia PP. Mirga hunduu tikfameera.</p>
                <p>
                    <i class="fa fa-phone" style="color: #2563eb;"></i> 9112 | 
                    <i class="fa fa-envelope" style="color: #2563eb;"></i> info@oromiapp.gov.et
                </p>
                <p>
                    <a href="#">Tajaajila Maamilaa</a> | 
                    <a href="#">Nu Qunnami</a>
                </p>
            </div>
        </div>
    </div>

    <!-- JavaScript for animations and interactivity -->
    <script>
        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            document.querySelectorAll('.alert').forEach(function(alert) {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(function() {
                    alert.style.display = 'none';
                }, 500);
            });
        }, 5000);

        // Language selector functionality
        document.querySelectorAll('.language-selector button').forEach(function(btn) {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.language-selector button').forEach(function(b) {
                    b.classList.remove('active');
                });
                this.classList.add('active');
                
                // Here you can add language switching logic
                var lang = this.textContent.trim();
                if(lang === 'English') {
                    // Switch to English
                } else if(lang === 'አማርኛ') {
                    // Switch to Amharic
                } else {
                    // Switch to Afaan Oromoo
                }
            });
        });

        // Add floating label effect
        document.querySelectorAll('.form-control').forEach(function(input) {
            input.addEventListener('focus', function() {
                this.closest('.input-group').style.transform = 'translateY(-2px)';
            });
            
            input.addEventListener('blur', function() {
                this.closest('.input-group').style.transform = 'translateY(0)';
            });
        });

        // Welcome message typing effect (optional)
        const welcomeText = "Galmee Filannoo Oromiyaatti bagagganaa";
        let i = 0;
        // Uncomment for typing effect
        /*
        function typeWriter() {
            if (i < welcomeText.length) {
                document.querySelector('.welcome-message p').innerHTML = welcomeText.substring(0, i+1);
                i++;
                setTimeout(typeWriter, 50);
            }
        }
        typeWriter();
        */
    </script>
</body>
</html>