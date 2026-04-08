<div class="content-wrapper" style="background: #f0f2f5;">
    <style>
        :root {
            --primary-green: #2c5f2d;
            --primary-dark: #1e4220;
            --teal: #1e7e8c;
            --gold: #e6a017;
            --red: #b13e3e;
            --gray-light: #f8f9fc;
            --border: #e9ecef;
            --shadow-sm: 0 2px 4px rgba(0,0,0,0.04);
            --shadow-md: 0 4px 12px rgba(0,0,0,0.06);
        }

        .dashboard-header {
            background: white;
            padding: 20px 25px;
            margin-bottom: 20px;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            border-bottom: 3px solid var(--primary-green);
        }

        .dashboard-header h1 {
            font-size: 22px;
            margin: 0;
            font-weight: 600;
            color: #1e3c2c;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 18px 15px;
            margin-bottom: 20px;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
        }

        .stat-card.primary::before { background: var(--primary-green); }
        .stat-card.teal::before { background: var(--teal); }
        .stat-card.gold::before { background: var(--gold); }
        .stat-card.red::before { background: var(--red); }

        .stat-icon {
            position: absolute;
            right: 15px;
            top: 15px;
            font-size: 48px;
            opacity: 0.08;
        }

        .stat-value {
            font-size: 32px;
            font-weight: 700;
            margin: 5px 0;
            color: #333;
        }

        .filter-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: var(--shadow-sm);
        }

        .modern-card {
            background: white;
            border-radius: 16px;
            box-shadow: var(--shadow-sm);
            margin-bottom: 25px;
            overflow: hidden;
        }

        .card-header {
            padding: 15px 20px;
            background: white;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .card-header h3 {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
            color: #1e3c2c;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .card-body {
            padding: 20px;
            overflow-x: auto;
        }

        .table-modern {
            width: 100%;
            border-collapse: collapse;
        }

        .table-modern thead th {
            background: var(--primary-green);
            color: white;
            padding: 12px 10px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .table-modern tbody tr {
            border-bottom: 1px solid var(--border);
            transition: background 0.2s ease;
        }

        .table-modern tbody tr:hover {
            background: var(--gray-light);
        }

        .table-modern tbody td {
            padding: 12px 10px;
            font-size: 13px;
            vertical-align: middle;
        }

        .badge-modern {
            background: var(--primary-green);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .badge-green { background: #28a745; color: white; padding: 4px 10px; border-radius: 20px; font-size: 11px; }
        .badge-yellow { background: #ffc107; color: #333; padding: 4px 10px; border-radius: 20px; font-size: 11px; }
        .badge-red { background: #dc3545; color: white; padding: 4px 10px; border-radius: 20px; font-size: 11px; }

        .btn-modern {
            border-radius: 30px;
            padding: 8px 20px;
            font-size: 12px;
            font-weight: 500;
            border: none;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
        }

        .btn-primary { background: var(--primary-green); color: white; }
        .btn-primary:hover { background: var(--primary-dark); }
        .btn-teal { background: var(--teal); color: white; }
        .btn-teal:hover { background: #146b78; }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-slide { animation: slideUp 0.4s ease forwards; }
    </style>
    <section class="content-header" style="padding: 25px 30px 0 30px;">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
            <div>
                <h1 style="font-size: 28px; margin: 0; font-weight: 700; background: linear-gradient(135deg, #2c5f2d 0%, #1e4620 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                    <i class="fa fa-check-square-o" style="color: #2c5f2d; margin-right: 12px; -webkit-text-fill-color: initial;"></i>
                    <?php echo $pageTitle; ?>
                </h1>
                <p style="margin: 5px 0 0; color: #6c86a3; font-size: 13px;">
                    <i class="fa fa-flag-checkered"></i> Galmee Baayyina Filattoota
                </p>
            </div>
            <div>
                <a href="<?php echo base_url(); ?>VoterTurnout/listReports" class="btn btn-default" style="border-radius: 30px; padding: 8px 25px; border: none; background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                    <i class="fa fa-arrow-left"></i> Daashboordiitti Deebi'i
                </a>
            </div>
        </div>
    </section>

    <section class="content" style="padding: 20px 30px;">
        <div class="row">
            <div class="col-md-12">
                <!-- Flash Messages -->
                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible" style="border-radius: 12px; border-left: 4px solid #28a745; background: #e8f5e9; padding: 15px 20px;">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible" style="border-radius: 12px; border-left: 4px solid #dc3545; background: #ffebee; padding: 15px 20px;">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <i class="fa fa-exclamation-circle"></i> <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
                
                <!-- Main Form Card -->
                <div style="background: white; border-radius: 24px; box-shadow: 0 20px 40px rgba(0,0,0,0.06), 0 4px 12px rgba(0,0,0,0.04); overflow: hidden;">
                    
                    <!-- Card Header with Gradient -->
                    <div style="background: linear-gradient(135deg, #2c5f2d 0%, #1e4620 100%); padding: 25px 30px;">
                        <div class="row">
                            <div class="col-md-7">
                                <div style="display: flex; align-items: center; gap: 18px;">
                                    <div style="background: rgba(255,255,255,0.15); border-radius: 18px; width: 55px; height: 55px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fa fa-file-text" style="font-size: 26px; color: white;"></i>
                                    </div>
                                    <div>
                                        <h3 style="margin: 0; color: white; font-weight: 600; font-size: 20px;">Gabaasa Baayyina Filattoota</h3>
                                        <p style="margin: 5px 0 0; color: rgba(255,255,255,0.8); font-size: 13px;">Odeeffannoo Filannoo Galmeessi</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 text-right">
                                <div style="background: rgba(255,255,255,0.12); border-radius: 16px; padding: 12px 24px; display: inline-block; backdrop-filter: blur(10px);">
                                    <span style="color: white; font-size: 14px;">
                                        <i class="fa fa-hashtag"></i> Lakk. Tarree: 
                                        <strong style="font-size: 20px; margin-left: 5px;">#<?php echo str_pad($serial_number, 4, '0', STR_PAD_LEFT); ?></strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Form Body -->
                    <form method="post" action="<?php echo base_url('VoterTurnout/save'); ?>" id="voterForm">
                        <div style="padding: 30px;">
                            
                            <!-- Hidden Fields -->
                            <input type="hidden" name="naannoofil_id" value="<?php echo $naannoofil; ?>">
                            <input type="hidden" name="report_date" value="<?php echo $today; ?>">
                            <input type="hidden" name="report_time" value="<?php echo $current_time; ?>">
                            <input type="hidden" name="report_session" value="<?php echo $report_session; ?>">
                            <input type="hidden" name="serial_number" value="<?php echo $serial_number; ?>">
                            <input type="hidden" name="reporter_id" value="<?php echo $reporter_id; ?>">
                            <input type="hidden" name="reporter_name" value="<?php echo $reporter_name; ?>">
                            
                            <!-- Section 1: Basic Information -->
                            <div style="margin-bottom: 35px;">
                                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 25px;">
                                    <div style="background: linear-gradient(135deg, #2c5f2d, #3e8e41); width: 6px; height: 28px; border-radius: 4px;"></div>
                                    <h4 style="margin: 0; font-size: 18px; font-weight: 600; color: #1a3c2c;">
                                        <i class="fa fa-info-circle" style="color: #2c5f2d;"></i> Odeeffannoo Gabaasaa
                                    </h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="font-weight: 600; color: #2c3e50; margin-bottom: 10px; font-size: 13px;">
                                                <i class="fa fa-map-marker text-green"></i> Naannoo Filannoo
                                            </label>
                                            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 12px 16px;">
                                                <strong style="color: #2c5f2d;"><?php echo $voting_region_name; ?></strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="font-weight: 600; color: #2c3e50; margin-bottom: 10px; font-size: 13px;">
                                                <i class="fa fa-calendar"></i> Guyyaa Filannoo
                                            </label>
                                            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 12px 16px;">
                                                <?php echo date('l, d F Y', strtotime($today)); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="font-weight: 600; color: #2c3e50; margin-bottom: 10px; font-size: 13px;">
                                                <i class="fa fa-clock-o"></i> Yeroo Galmee
                                            </label>
                                            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 12px 16px;">
                                                <?php echo date('h:i A', strtotime($current_time)); ?> (<?php echo ucfirst($report_session); ?>)
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Section 2: Voter Statistics -->
                            <div style="margin-bottom: 35px;">
                                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 25px;">
                                    <div style="background: linear-gradient(135deg, #17a2b8, #138496); width: 6px; height: 28px; border-radius: 4px;"></div>
                                    <h4 style="margin: 0; font-size: 18px; font-weight: 600; color: #17a2b8;">
                                        <i class="fa fa-bar-chart"></i> Baayyina Filattoota
                                    </h4>
                                </div>
                                
                                <div class="row">
                                    <!-- Male Voters Card -->
                                    <div class="col-md-6">
                                        <div style="background: linear-gradient(135deg, #ffffff 0%, #f8fff8 100%); border: 1px solid #e0e8e0; border-radius: 20px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.03); transition: all 0.3s ease;">
                                            <div style="background: linear-gradient(135deg, #2c5f2d, #3e8e41); padding: 16px 20px;">
                                                <div style="display: flex; align-items: center; gap: 12px;">
                                                    <div style="background: rgba(255,255,255,0.2); border-radius: 12px; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                                        <i class="fa fa-mars" style="color: white; font-size: 18px;"></i>
                                                    </div>
                                                    <div>
                                                        <h5 style="margin: 0; color: white; font-weight: 600; font-size: 16px;">Dhiira</h5>
                                                        <p style="margin: 2px 0 0; color: rgba(255,255,255,0.8); font-size: 12px;">Male Voters</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="padding: 25px 20px; text-align: center;">
                                                <div style="background: linear-gradient(135deg, #f0f4f0, #e8f0e8); border-radius: 16px; padding: 20px 15px;">
                                                    <i class="fa fa-mars" style="font-size: 28px; color: #2c5f2d;"></i>
                                                    <h4 style="margin: 10px 0 5px; font-weight: 600; color: #2c5f2d;">Lakkoofsa Dhiiraa</h4>
                                                    <input type="number" name="male_voters" id="male_voters" class="form-control" value="0" min="0" onchange="calculateTotal()" style="text-align: center; font-size: 22px; font-weight: 700; border: none; background: transparent; padding: 5px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Female Voters Card -->
                                    <div class="col-md-6">
                                        <div style="background: linear-gradient(135deg, #ffffff 0%, #fff8f0 100%); border: 1px solid #f0e0d0; border-radius: 20px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.03); transition: all 0.3s ease;">
                                            <div style="background: linear-gradient(135deg, #e67e22, #f39c12); padding: 16px 20px;">
                                                <div style="display: flex; align-items: center; gap: 12px;">
                                                    <div style="background: rgba(255,255,255,0.2); border-radius: 12px; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                                        <i class="fa fa-venus" style="color: white; font-size: 18px;"></i>
                                                    </div>
                                                    <div>
                                                        <h5 style="margin: 0; color: white; font-weight: 600; font-size: 16px;">Dubartii</h5>
                                                        <p style="margin: 2px 0 0; color: rgba(255,255,255,0.8); font-size: 12px;">Female Voters</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="padding: 25px 20px; text-align: center;">
                                                <div style="background: linear-gradient(135deg, #fdf4f0, #fde8e0); border-radius: 16px; padding: 20px 15px;">
                                                    <i class="fa fa-venus" style="font-size: 28px; color: #e67e22;"></i>
                                                    <h4 style="margin: 10px 0 5px; font-weight: 600; color: #e67e22;">Lakkoofsa Dubartii</h4>
                                                    <input type="number" name="female_voters" id="female_voters" class="form-control" value="0" min="0" onchange="calculateTotal()" style="text-align: center; font-size: 22px; font-weight: 700; border: none; background: transparent; padding: 5px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Section 3: Grand Total -->
                            <div style="margin-bottom: 35px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="background: linear-gradient(135deg, #1e4620 0%, #2c5f2d 100%); border-radius: 20px; padding: 25px 30px; text-align: center; box-shadow: 0 8px 20px rgba(44, 95, 45, 0.2);">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p style="margin: 0; color: rgba(255,255,255,0.8); font-size: 14px; letter-spacing: 1px;">
                                                        <i class="fa fa-calculator"></i> WALIIGALA FILATTOOTA
                                                    </p>
                                                    <div style="display: flex; align-items: baseline; justify-content: center; gap: 10px; flex-wrap: wrap;">
                                                        <span style="font-size: 48px; font-weight: 800; color: white;" id="grand_total_display">0</span>
                                                        <span style="color: rgba(255,255,255,0.7); font-size: 16px;">filattoota</span>
                                                    </div>
                                                    <input type="hidden" name="total_voters" id="total_voters" value="0">
                                                    <div style="margin-top: 15px;">
                                                        <div style="display: inline-flex; gap: 30px; background: rgba(255,255,255,0.1); border-radius: 40px; padding: 8px 25px;">
                                                            <span><i class="fa fa-mars"></i> Dhiira: <strong id="male_total_display">0</strong></span>
                                                            <span><i class="fa fa-venus"></i> Dubartii: <strong id="female_total_display">0</strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Section 4: Status Level (Green/Yellow/Red) -->
                            <div style="margin-bottom: 35px;">
                                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 25px;">
                                    <div style="background: linear-gradient(135deg, #ffc107, #ff9800); width: 6px; height: 28px; border-radius: 4px;"></div>
                                    <h4 style="margin: 0; font-size: 18px; font-weight: 600; color: #e67e22;">
                                        <i class="fa fa-flag"></i> Haala Naannoo (District Situation)
                                    </h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="font-weight: 600; color: #2c3e50; margin-bottom: 10px; font-size: 13px;">
                                                Haala Naannoo <span class="text-red">*</span>
                                            </label>
                                            <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                                                <label style="display: flex; align-items: center; gap: 10px; padding: 12px 20px; border-radius: 12px; border: 2px solid #e2e8f0; cursor: pointer; transition: all 0.3s;" id="green_label" onclick="selectStatus('green')">
                                                    <input type="radio" name="status_level" value="green" style="width: 20px; height: 20px; accent-color: #28a745;"> 
                                                    <span style="display: inline-block; width: 20px; height: 20px; background: #28a745; border-radius: 50%;"></span>
                                                    <strong style="color: #28a745;">GREEN (Very Safe)</strong>
                                                    <span style="font-size: 12px; color: #666;">- Filannoo nagaan godhama</span>
                                                </label>
                                                <label style="display: flex; align-items: center; gap: 10px; padding: 12px 20px; border-radius: 12px; border: 2px solid #e2e8f0; cursor: pointer; transition: all 0.3s;" id="yellow_label" onclick="selectStatus('yellow')">
                                                    <input type="radio" name="status_level" value="yellow" style="width: 20px; height: 20px; accent-color: #ffc107;"> 
                                                    <span style="display: inline-block; width: 20px; height: 20px; background: #ffc107; border-radius: 50%;"></span>
                                                    <strong style="color: #ffc107;">YELLOW (Some Disturbance)</strong>
                                                    <span style="font-size: 12px; color: #666;">- Rakkina xixiqqoo jira</span>
                                                </label>
                                                <label style="display: flex; align-items: center; gap: 10px; padding: 12px 20px; border-radius: 12px; border: 2px solid #e2e8f0; cursor: pointer; transition: all 0.3s;" id="red_label" onclick="selectStatus('red')">
                                                    <input type="radio" name="status_level" value="red" style="width: 20px; height: 20px; accent-color: #dc3545;"> 
                                                    <span style="display: inline-block; width: 20px; height: 20px; background: #dc3545; border-radius: 50%;"></span>
                                                    <strong style="color: #dc3545;">RED (Not Safe)</strong>
                                                    <span style="font-size: 12px; color: #666;">- Filannoon rakkina guddaa jira</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 15px;">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="font-weight: 600; color: #2c3e50; margin-bottom: 10px; font-size: 13px;">
                                                <i class="fa fa-commenting"></i> Sababa Haalaa (If Yellow or Red)
                                            </label>
                                            <textarea name="status_reason" id="status_reason" class="form-control" rows="2" style="border-radius: 12px; border: 1px solid #e2e8f0; padding: 12px;" placeholder="Yoo haalaan Yellow ykn Red ta'e, sababa ibsi (e.g., balaa, lola, rakkoo nagaa)..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Section 5: Remarks -->
                            <div style="margin-bottom: 30px;">
                                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 15px;">
                                    <div style="background: linear-gradient(135deg, #6c757d, #5a6268); width: 6px; height: 28px; border-radius: 4px;"></div>
                                    <h4 style="margin: 0; font-size: 18px; font-weight: 600; color: #6c757d;">
                                        <i class="fa fa-comment"></i> Hubannoo Dabalataa
                                    </h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea name="remarks" class="form-control" rows="3" style="border-radius: 16px; border: 1px solid #e2e8f0; padding: 15px; resize: none; font-size: 14px;" placeholder="Hubannoo yoo jiraate as irratti barreessi..."></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Submit Buttons -->
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success" style="padding: 14px 45px; font-weight: 700; border-radius: 50px; font-size: 16px; background: linear-gradient(135deg, #2c5f2d, #1e4620); border: none; box-shadow: 0 4px 12px rgba(44,95,45,0.3); transition: all 0.3s;">
                                        <i class="fa fa-save"></i> Olkaa'i
                                    </button>
                                    <button type="reset" class="btn btn-outline-secondary" style="padding: 14px 45px; margin-left: 15px; font-weight: 600; border-radius: 50px; font-size: 16px; background: white; border: 2px solid #cbd5e0; color: #4a5568;" onclick="resetForm()">
                                        <i class="fa fa-undo"></i> Irra Deebi'i
                                    </button>
                                    <a href="<?php echo base_url(); ?>VoterTurnout/listReports" class="btn btn-outline-info" style="padding: 14px 35px; margin-left: 15px; font-weight: 600; border-radius: 50px; font-size: 16px; background: white; border: 2px solid #cbd5e0; color: #4a5568;">
                                        <i class="fa fa-times"></i> Haqi
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .form-control {
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        border-color: #2c5f2d;
        box-shadow: 0 0 0 3px rgba(44, 95, 45, 0.1);
        outline: none;
    }
    
    input[type="number"] {
        -moz-appearance: textfield;
    }
    
    input[type="number"]::-webkit-inner-spin-button, 
    input[type="number"]::-webkit-outer-spin-button {
        opacity: 0.5;
    }
    
    .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(44,95,45,0.4);
    }
    
    .btn-outline-secondary:hover, .btn-outline-info:hover {
        background: #f7fafc;
        transform: translateY(-2px);
    }
    
    .col-md-6 > div {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .col-md-6 > div:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.08) !important;
    }
    
    label:has(input[type="radio"]) {
        cursor: pointer;
    }
    
    label:has(input[type="radio"]:checked) {
        border-color: #2c5f2d !important;
        background: #f0f7f0;
    }
</style>

<script>
function calculateTotal() {
    // Get male and female values
    let maleCount = parseFloat(document.getElementById('male_voters').value) || 0;
    let femaleCount = parseFloat(document.getElementById('female_voters').value) || 0;
    
    // Calculate grand total
    let grandTotal = maleCount + femaleCount;
    document.getElementById('total_voters').value = grandTotal;
    document.getElementById('grand_total_display').innerHTML = grandTotal.toLocaleString();
    
    // Update breakdown displays
    document.getElementById('male_total_display').innerHTML = maleCount.toLocaleString();
    document.getElementById('female_total_display').innerHTML = femaleCount.toLocaleString();
}

function selectStatus(status) {
    // Remove border highlights from all labels
    document.getElementById('green_label').style.borderColor = '#e2e8f0';
    document.getElementById('yellow_label').style.borderColor = '#e2e8f0';
    document.getElementById('red_label').style.borderColor = '#e2e8f0';
    
    // Add highlight to selected
    if(status === 'green') {
        document.getElementById('green_label').style.borderColor = '#28a745';
        document.getElementById('green_label').style.background = '#e8f5e9';
        document.getElementById('yellow_label').style.background = 'white';
        document.getElementById('red_label').style.background = 'white';
    } else if(status === 'yellow') {
        document.getElementById('yellow_label').style.borderColor = '#ffc107';
        document.getElementById('yellow_label').style.background = '#fff3e0';
        document.getElementById('green_label').style.background = 'white';
        document.getElementById('red_label').style.background = 'white';
    } else if(status === 'red') {
        document.getElementById('red_label').style.borderColor = '#dc3545';
        document.getElementById('red_label').style.background = '#ffebee';
        document.getElementById('green_label').style.background = 'white';
        document.getElementById('yellow_label').style.background = 'white';
    }
}

function resetForm() {
    document.getElementById('male_voters').value = 0;
    document.getElementById('female_voters').value = 0;
    document.getElementById('status_reason').value = '';
    document.querySelectorAll('input[name="status_level"]').forEach(radio => radio.checked = false);
    document.getElementById('green_label').style.borderColor = '#e2e8f0';
    document.getElementById('yellow_label').style.borderColor = '#e2e8f0';
    document.getElementById('red_label').style.borderColor = '#e2e8f0';
    document.getElementById('green_label').style.background = 'white';
    document.getElementById('yellow_label').style.background = 'white';
    document.getElementById('red_label').style.background = 'white';
    calculateTotal();
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    calculateTotal();
    
    // Add event listeners
    document.querySelectorAll('input[type="number"]').forEach(function(input) {
        input.addEventListener('input', calculateTotal);
    });
});
</script>