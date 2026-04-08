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
                <h1 style="font-size: 28px; margin: 0; font-weight: 700; background: linear-gradient(135deg, #e67e22 0%, #f39c12 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                    <i class="fa fa-edit" style="color: #e67e22; margin-right: 12px; -webkit-text-fill-color: initial;"></i>
                    Gabaasa Fooyyessuu - Baayyina Filattoota
                </h1>
                <p style="margin: 5px 0 0; color: #6c86a3; font-size: 13px;">
                    <i class="fa fa-clock-o"></i> Yeroo hafe: <strong id="countdown" style="color: #e67e22;"></strong>
                </p>
            </div>
            <div>
                <a href="<?php echo base_url('VoterTurnout/listReports'); ?>" class="btn btn-default" style="border-radius: 30px; padding: 10px 25px; background: white; border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                    <i class="fa fa-arrow-left"></i> Deebi'i
                </a>
            </div>
        </div>
    </section>

    <section class="content" style="padding: 20px 30px;">
        <div class="row">
            <div class="col-md-12">
                
                <!-- Warning Alert -->
                <div style="background: linear-gradient(135deg, #fff3e0, #ffe0b2); border-radius: 16px; padding: 15px 20px; margin-bottom: 20px; border-left: 4px solid #e67e22;">
                    <i class="fa fa-warning" style="color: #e67e22;"></i>
                    <span style="color: #e67e22;">
                        <strong>Hubachiisa:</strong> Gabaasa kana sa'aatii 1 keessatti qofa fooyyessuu dandeessa. Yeroo darbee booda fooyyessuu hin dandeessu!
                    </span>
                </div>
                
                <!-- Edit Form Card -->
                <form method="post" action="<?php echo base_url('VoterTurnout/updateReport/'.$report->id); ?>" id="editForm">
                    <div style="background: white; border-radius: 24px; box-shadow: 0 20px 40px rgba(0,0,0,0.06); overflow: hidden;">
                        
                        <!-- Header -->
                        <div style="background: linear-gradient(135deg, #e67e22 0%, #f39c12 100%); padding: 25px 30px;">
                            <div style="display: flex; align-items: center; gap: 15px;">
                                <div style="background: rgba(255,255,255,0.15); border-radius: 18px; width: 55px; height: 55px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa fa-pencil-square-o" style="font-size: 26px; color: white;"></i>
                                </div>
                                <div>
                                    <h3 style="margin: 0; color: white; font-weight: 600; font-size: 20px;">Fooyyessuu Gabaasaa</h3>
                                    <p style="margin: 5px 0 0; color: rgba(255,255,255,0.8); font-size: 13px;">
                                        Lakk. Tarree: #<?php echo str_pad($report->serial_number, 4, '0', STR_PAD_LEFT); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Body -->
                        <div style="padding: 30px;">
                            
                            <!-- Basic Information (Read-only) -->
                            <div style="margin-bottom: 30px;">
                                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
                                    <div style="background: linear-gradient(135deg, #2c5f2d, #3e8e41); width: 6px; height: 28px; border-radius: 4px;"></div>
                                    <h4 style="margin: 0; font-size: 18px; font-weight: 600; color: #1a3c2c;">
                                        <i class="fa fa-info-circle"></i> Odeeffannoo Gabaasaa
                                    </h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div style="background: #f8fafc; border-radius: 16px; padding: 15px;">
                                            <label style="font-size: 12px; color: #718096;">Naannoo Filannoo</label>
                                            <div><strong><?php echo $report->naannoofil_id; ?></strong></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div style="background: #f8fafc; border-radius: 16px; padding: 15px;">
                                            <label style="font-size: 12px; color: #718096;">Guyyaa Filannoo</label>
                                            <div><strong><?php echo date('l, d F Y', strtotime($report->report_date)); ?></strong></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div style="background: #f8fafc; border-radius: 16px; padding: 15px;">
                                            <label style="font-size: 12px; color: #718096;">Yeroo Galmee</label>
                                            <div><strong><?php echo date('h:i A', strtotime($report->created_at)); ?></strong></div>
                                            <div><small><?php echo $report->report_session; ?> session</small></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 15px;">
                                    <div class="col-md-4">
                                        <div style="background: #f8fafc; border-radius: 16px; padding: 15px;">
                                            <label style="font-size: 12px; color: #718096;">Gabaasaa</label>
                                            <div><strong><i class="fa fa-user"></i> <?php echo $report->reporter_name; ?></strong></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div style="background: #f8fafc; border-radius: 16px; padding: 15px;">
                                            <label style="font-size: 12px; color: #718096;">Lakk. Tarree</label>
                                            <div><strong>#<?php echo str_pad($report->serial_number, 4, '0', STR_PAD_LEFT); ?></strong></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Voter Statistics (Editable) -->
                            <div style="margin-bottom: 30px;">
                                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
                                    <div style="background: linear-gradient(135deg, #17a2b8, #138496); width: 6px; height: 28px; border-radius: 4px;"></div>
                                    <h4 style="margin: 0; font-size: 18px; font-weight: 600; color: #17a2b8;">
                                        <i class="fa fa-bar-chart"></i> Lakkoofsa Filattoota
                                    </h4>
                                </div>
                                <div class="row">
                                    <!-- Male Voters Card -->
                                    <div class="col-md-6">
                                        <div style="border: 1px solid #e0e8e0; border-radius: 20px; overflow: hidden;">
                                            <div style="background: linear-gradient(135deg, #2c5f2d, #3e8e41); padding: 15px 20px;">
                                                <h5 style="margin: 0; color: white;"><i class="fa fa-mars"></i> Dhiira (Male)</h5>
                                            </div>
                                            <div style="padding: 30px 20px; text-align: center;">
                                                <div style="background: linear-gradient(135deg, #e8f5e9, #d4e8d4); border-radius: 20px; padding: 25px;">
                                                    <i class="fa fa-mars" style="font-size: 48px; color: #2c5f2d;"></i>
                                                    <h3 style="margin: 15px 0 10px; font-weight: 700;">Lakkoofsa Dhiiraa</h3>
                                                    <input type="number" name="male_voters" id="male_voters" class="form-control" value="<?php echo $report->male_voters; ?>" min="0" onchange="calculateTotal()" style="text-align: center; font-size: 28px; font-weight: 800; border-radius: 12px; padding: 12px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Female Voters Card -->
                                    <div class="col-md-6">
                                        <div style="border: 1px solid #f0e0d0; border-radius: 20px; overflow: hidden;">
                                            <div style="background: linear-gradient(135deg, #e67e22, #f39c12); padding: 15px 20px;">
                                                <h5 style="margin: 0; color: white;"><i class="fa fa-venus"></i> Dubartii (Female)</h5>
                                            </div>
                                            <div style="padding: 30px 20px; text-align: center;">
                                                <div style="background: linear-gradient(135deg, #fde8e0, #f8d8c8); border-radius: 20px; padding: 25px;">
                                                    <i class="fa fa-venus" style="font-size: 48px; color: #e67e22;"></i>
                                                    <h3 style="margin: 15px 0 10px; font-weight: 700;">Lakkoofsa Dubartii</h3>
                                                    <input type="number" name="female_voters" id="female_voters" class="form-control" value="<?php echo $report->female_voters; ?>" min="0" onchange="calculateTotal()" style="text-align: center; font-size: 28px; font-weight: 800; border-radius: 12px; padding: 12px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Grand Total Section -->
                            <div style="margin-bottom: 30px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="background: linear-gradient(135deg, #1e4620 0%, #2c5f2d 100%); border-radius: 20px; padding: 25px; text-align: center;">
                                            <p style="margin: 0; color: rgba(255,255,255,0.8); font-size: 14px;">WALIIGALA FILATTOOTA</p>
                                            <h2 style="margin: 10px 0 0; font-size: 42px; font-weight: 800; color: white;" id="grand_total_display"><?php echo number_format($report->total_voters); ?></h2>
                                            <input type="hidden" name="total_voters" id="total_voters" value="<?php echo $report->total_voters; ?>">
                                            <div style="margin-top: 10px;">
                                                <span style="background: rgba(255,255,255,0.15); border-radius: 30px; padding: 5px 15px; display: inline-block; color: white;">
                                                    <i class="fa fa-mars"></i> <span id="male_display"><?php echo number_format($report->male_voters); ?></span> | 
                                                    <i class="fa fa-venus"></i> <span id="female_display"><?php echo number_format($report->female_voters); ?></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Security Status (Editable) -->
                            <div style="margin-bottom: 30px;">
                                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
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
                                                <label style="display: flex; align-items: center; gap: 10px; padding: 12px 20px; border-radius: 12px; border: 2px solid <?php echo ($report->status_level == 'green') ? '#28a745' : '#e2e8f0'; ?>; cursor: pointer; transition: all 0.3s; background: <?php echo ($report->status_level == 'green') ? '#e8f5e9' : 'white'; ?>;" id="green_label" onclick="selectStatus('green')">
                                                    <input type="radio" name="status_level" value="green" <?php echo ($report->status_level == 'green') ? 'checked' : ''; ?> style="width: 20px; height: 20px; accent-color: #28a745;"> 
                                                    <span style="display: inline-block; width: 20px; height: 20px; background: #28a745; border-radius: 50%;"></span>
                                                    <strong style="color: #28a745;">GREEN (Very Safe)</strong>
                                                    <span style="font-size: 12px; color: #666;">- Filannoo nagaan godhama</span>
                                                </label>
                                                <label style="display: flex; align-items: center; gap: 10px; padding: 12px 20px; border-radius: 12px; border: 2px solid <?php echo ($report->status_level == 'yellow') ? '#ffc107' : '#e2e8f0'; ?>; cursor: pointer; transition: all 0.3s; background: <?php echo ($report->status_level == 'yellow') ? '#fff3e0' : 'white'; ?>;" id="yellow_label" onclick="selectStatus('yellow')">
                                                    <input type="radio" name="status_level" value="yellow" <?php echo ($report->status_level == 'yellow') ? 'checked' : ''; ?> style="width: 20px; height: 20px; accent-color: #ffc107;"> 
                                                    <span style="display: inline-block; width: 20px; height: 20px; background: #ffc107; border-radius: 50%;"></span>
                                                    <strong style="color: #ffc107;">YELLOW (Some Disturbance)</strong>
                                                    <span style="font-size: 12px; color: #666;">- Rakkina xixiqqoo jira</span>
                                                </label>
                                                <label style="display: flex; align-items: center; gap: 10px; padding: 12px 20px; border-radius: 12px; border: 2px solid <?php echo ($report->status_level == 'red') ? '#dc3545' : '#e2e8f0'; ?>; cursor: pointer; transition: all 0.3s; background: <?php echo ($report->status_level == 'red') ? '#ffebee' : 'white'; ?>;" id="red_label" onclick="selectStatus('red')">
                                                    <input type="radio" name="status_level" value="red" <?php echo ($report->status_level == 'red') ? 'checked' : ''; ?> style="width: 20px; height: 20px; accent-color: #dc3545;"> 
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
                                            <textarea name="status_reason" id="status_reason" class="form-control" rows="3" style="border-radius: 12px; border: 1px solid #e2e8f0; padding: 12px;" placeholder="Yoo haalaan Yellow ykn Red ta'e, sababa ibsi (e.g., balaa, lola, rakkoo nagaa)..."><?php echo $report->status_reason; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Remarks -->
                            <div style="margin-bottom: 30px;">
                                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 15px;">
                                    <div style="background: linear-gradient(135deg, #6c757d, #5a6268); width: 6px; height: 28px; border-radius: 4px;"></div>
                                    <h4 style="margin: 0; font-size: 18px; font-weight: 600; color: #6c757d;">
                                        <i class="fa fa-comment"></i> Hubannoo Dabalataa
                                    </h4>
                                </div>
                                <textarea name="remarks" class="form-control" rows="3" style="border-radius: 16px; border: 1px solid #e2e8f0; padding: 15px;"><?php echo $report->remarks; ?></textarea>
                            </div>
                            
                            <!-- Submit Buttons -->
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-warning" style="border-radius: 40px; padding: 12px 35px; background: linear-gradient(135deg, #e67e22, #f39c12); border: none; color: white; font-weight: 600;">
                                        <i class="fa fa-save"></i> Fooyyessii Gabaa
                                    </button>
                                    <a href="<?php echo base_url('VoterTurnout/viewReport/'.$report->id); ?>" class="btn btn-default" style="border-radius: 40px; padding: 12px 35px; margin-left: 10px; background: #6c757d; color: white; border: none;">
                                        <i class="fa fa-times"></i> Haqi
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
function calculateTotal() {
    let maleVoters = parseFloat(document.getElementById('male_voters').value) || 0;
    let femaleVoters = parseFloat(document.getElementById('female_voters').value) || 0;
    let grandTotal = maleVoters + femaleVoters;
    
    document.getElementById('total_voters').value = grandTotal;
    document.getElementById('grand_total_display').innerHTML = grandTotal.toLocaleString();
    document.getElementById('male_display').innerHTML = maleVoters.toLocaleString();
    document.getElementById('female_display').innerHTML = femaleVoters.toLocaleString();
}

function selectStatus(status) {
    // Remove border highlights from all labels
    document.getElementById('green_label').style.borderColor = '#e2e8f0';
    document.getElementById('yellow_label').style.borderColor = '#e2e8f0';
    document.getElementById('red_label').style.borderColor = '#e2e8f0';
    document.getElementById('green_label').style.background = 'white';
    document.getElementById('yellow_label').style.background = 'white';
    document.getElementById('red_label').style.background = 'white';
    
    // Add highlight to selected
    if(status === 'green') {
        document.getElementById('green_label').style.borderColor = '#28a745';
        document.getElementById('green_label').style.background = '#e8f5e9';
    } else if(status === 'yellow') {
        document.getElementById('yellow_label').style.borderColor = '#ffc107';
        document.getElementById('yellow_label').style.background = '#fff3e0';
    } else if(status === 'red') {
        document.getElementById('red_label').style.borderColor = '#dc3545';
        document.getElementById('red_label').style.background = '#ffebee';
    }
}

// Countdown timer
const createdAt = new Date("<?php echo date('Y-m-d H:i:s', strtotime($report->created_at)); ?>").getTime();
const expiryTime = createdAt + (60 * 60 * 1000);

function startCountdown() {
    const now = new Date().getTime();
    const remaining = expiryTime - now;
    
    if(remaining > 0) {
        const minutes = Math.floor((remaining % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((remaining % (1000 * 60)) / 1000);
        document.getElementById('countdown').innerHTML = minutes + ' daqiiqaa ' + seconds + ' sekoondii';
        setTimeout(startCountdown, 1000);
    } else {
        document.getElementById('countdown').innerHTML = 'Yeroo darbeera!';
        document.querySelector('button[type="submit"]').disabled = true;
        document.querySelector('button[type="submit"]').style.opacity = '0.5';
    }
}
startCountdown();

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    calculateTotal();
    document.querySelectorAll('input[type="number"]').forEach(function(input) {
        input.addEventListener('input', calculateTotal);
    });
});
</script>