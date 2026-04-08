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

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
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

        .stat-label {
            font-size: 12px;
            color: #6c757d;
            margin: 0;
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
            text-decoration: none;
        }

        .btn-primary { background: var(--primary-green); color: white; }
        .btn-primary:hover { background: var(--primary-dark); }
        .btn-teal { background: var(--teal); color: white; }
        .btn-teal:hover { background: #146b78; }

        .filter-form {
            background: white;
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .status-card {
            border-radius: 16px;
            padding: 20px;
            text-align: center;
            color: white;
            margin-bottom: 20px;
        }

        .status-card.green { background: linear-gradient(135deg, #28a745, #1e7e34); }
        .status-card.yellow { background: linear-gradient(135deg, #ffc107, #e0a800); color: #333; }
        .status-card.red { background: linear-gradient(135deg, #dc3545, #bd2130); }

        .status-card h3 { margin: 0; font-size: 14px; opacity: 0.9; }
        .status-card h2 { margin: 10px 0; font-size: 28px; font-weight: 700; }
        .status-card p { margin: 0; font-size: 12px; opacity: 0.8; }

        .filter-row {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: flex-end;
        }
        .filter-item {
            flex: 1;
            min-width: 180px;
        }
        .filter-actions {
            flex: 0.5;
            min-width: 150px;
        }
        .form-control {
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            width: 100%;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-slide { animation: slideUp 0.4s ease forwards; }
        
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { padding: 10px; border: 1px solid var(--border); }
        .table-bordered { border: 1px solid var(--border); }
        .table-responsive { overflow-x: auto; }
    </style>

    <!-- Dashboard Header -->
    <div class="dashboard-header animate-slide">
        <h1>
            <i class="fa fa-bar-chart"></i>
            Daashboordii Baayyina Filattoota
            <small style="font-size: 13px; color: #6c757d; margin-left: 8px; font-weight: normal;"><?php echo $voting_region_name; ?></small>
        </h1>
        <div class="breadcrumb-modern" style="margin-top: 8px;">
            <a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Manii</a>
            <span style="margin: 0 5px; color: #999;">›</span>
            <span style="color: #999;">Daashboordii Baayyina Filattoota</span>
        </div>
    </div>

    <section class="content" style="padding: 0 15px 15px 15px;">
        
        <!-- Filter Form - All in one row -->
        <div class="filter-form animate-slide" style="animation-delay: 0.05s;">
            <form method="get" action="<?php echo base_url('VoterTurnout/dashboard'); ?>">
                <div class="filter-row">
                    <div class="filter-item">
                        <label style="font-weight: 600; font-size: 12px;">Guyyaa Jalqabaa:</label>
                        <input type="date" name="start_date" class="form-control" value="<?php echo $start_date; ?>">
                    </div>
                    <div class="filter-item">
                        <label style="font-weight: 600; font-size: 12px;">Guyyaa Xumuraa:</label>
                        <input type="date" name="end_date" class="form-control" value="<?php echo $end_date; ?>">
                    </div>
                    <div class="filter-actions">
                        <label style="font-weight: 600; font-size: 12px;">&nbsp;</label>
                        <div>
                            <button type="submit" class="btn-modern btn-primary"><i class="fa fa-search"></i> Calleessii</button>
                            <a href="<?php echo base_url('VoterTurnout/dashboard'); ?>" class="btn-modern btn-teal"><i class="fa fa-refresh"></i> Haari</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

     

        <!-- KPI Summary Cards (Totals - SUM of all records) -->
        <div class="row animate-slide" style="animation-delay: 0.15s; display: flex; gap: 20px; flex-wrap: wrap; margin-bottom: 20px;">
            <div class="col-xs-6 col-sm-6 col-md-3" style="flex:1; min-width:180px;">
                <div class="stat-card primary">
                    <div class="stat-icon"><i class="fa fa-file-text-o"></i></div>
                    <div class="stat-value"><?php echo number_format($summary->total_reports ?? 0); ?></div>
                    <p class="stat-label">Waliigala Gabaasa</p>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3" style="flex:1; min-width:180px;">
                <div class="stat-card teal">
                    <div class="stat-icon"><i class="fa fa-mars"></i></div>
                    <div class="stat-value"><?php echo number_format($summary->total_male_voters ?? 0); ?></div>
                    <p class="stat-label">Waliigala Dhiiraa</p>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3" style="flex:1; min-width:180px;">
                <div class="stat-card gold">
                    <div class="stat-icon"><i class="fa fa-venus"></i></div>
                    <div class="stat-value"><?php echo number_format($summary->total_female_voters ?? 0); ?></div>
                    <p class="stat-label">Waliigala Dubartii</p>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3" style="flex:1; min-width:180px;">
                <div class="stat-card red">
                    <div class="stat-icon"><i class="fa fa-users"></i></div>
                    <div class="stat-value"><?php echo number_format($summary->total_voters ?? 0); ?></div>
                    <p class="stat-label">Waliigala Filattoota</p>
                </div>
            </div>
        </div>

   <!-- Current Security Status Card (Last registered) -->
        <div class="row animate-slide" style="animation-delay: 0.1s;">
            <div class="col-md-12">
                <div class="status-card <?php echo $summary->current_status; ?>">
                    <h3><i class="fa fa-flag-checkered"></i> Haala Naannoo Ammaa (Current District Status)</h3>
                    <h2>
                        <?php 
                        if($summary->current_status == 'green') echo 'GREEN - NAGAA (Safe)';
                        elseif($summary->current_status == 'yellow') echo 'YELLOW - RAKKINA XIXIQQOO (Some Disturbance)';
                        else echo 'RED - RAKKINA GUDDAA (Not Safe)';
                        ?>
                    </h2>
                    <?php if($summary->current_status_reason): ?>
                        <p><i class="fa fa-comment"></i> Sababa: <?php echo $summary->current_status_reason; ?></p>
                    <?php endif; ?>
                    <p><i class="fa fa-calendar"></i> Guyyaa Darbee: <?php echo $summary->last_report_date ? date('d/m/Y H:i', strtotime($summary->last_report_date)) : 'N/A'; ?></p>
                </div>
            </div>
        </div>

        <!-- Weekly Chart -->
        <div class="row animate-slide" style="animation-delay: 0.2s;">
            <div class="col-md-12">
                <div class="modern-card">
                    <div class="card-header">
                        <h3><i class="fa fa-line-chart"></i> Gabaasa Torban Kana (Weekly Report)</h3>
                        <span class="badge-modern">Baayyina Filattoota Guyyaa Guyyaa</span>
                    </div>
                    <div class="card-body">
                        <canvas id="weeklyChart" style="height: 300px; width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Reports Table -->
        <div class="row animate-slide" style="animation-delay: 0.25s;">
            <div class="col-md-12">
                <div class="modern-card">
                    <div class="card-header">
                        <h3><i class="fa fa-history"></i> Gabaasawwan Dhiyaan (Recent Reports)</h3>
                        <a href="<?php echo base_url('VoterTurnout/listReports'); ?>" class="btn-modern btn-teal">
                            <i class="fa fa-list"></i> Hunda Ilaali
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="font-size: 13px;">
                                <thead style="background: var(--primary-green); color: white;">
                                    <tr>
                                        <th>Guyyaa</th>
                                        <th>Yeroo</th>
                                        <th>Lakk.Tarree</th>
                                        <th class="text-center">Dhiira</th>
                                        <th class="text-center">Dubartii</th>
                                        <th class="text-center">Waliigala</th>
                                        <th class="text-center">Haala Naannoo</th>
                                        <th class="text-center">Gocha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(empty($recent_reports)): ?>
                                        <tr>
                                            <td colspan="8" class="text-center" style="padding:40px;">Gabaasi hin jiru! Gabaasa haaraa galmeessaa.</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach($recent_reports as $report): 
                                            $statusClass = '';
                                            $statusIcon = '';
                                            if($report->status_level == 'green') {
                                                $statusClass = 'badge-green';
                                                $statusIcon = 'fa-check-circle';
                                            } elseif($report->status_level == 'yellow') {
                                                $statusClass = 'badge-yellow';
                                                $statusIcon = 'fa-warning';
                                            } else {
                                                $statusClass = 'badge-red';
                                                $statusIcon = 'fa-exclamation-triangle';
                                            }
                                        ?>
                                        <tr>
                                            <td><?php echo date('d/m/Y', strtotime($report->report_date)); ?></td>
                                            <td><?php echo date('H:i', strtotime($report->report_time)); ?> <small>(<?php echo $report->report_session; ?>)</small></td>
                                            <td>#<?php echo str_pad($report->serial_number, 4, '0', STR_PAD_LEFT); ?></td>
                                            <td class="text-center"><strong style="color: #2c5f2d;"><?php echo number_format($report->male_voters); ?></strong></td>
                                            <td class="text-center"><strong style="color: #e6a017;"><?php echo number_format($report->female_voters); ?></strong></td>
                                            <td class="text-center"><span class="badge-modern"><?php echo number_format($report->total_voters); ?></span></td>
                                            <td class="text-center">
                                                <span class="<?php echo $statusClass; ?>">
                                                    <i class="fa <?php echo $statusIcon; ?>"></i> <?php echo strtoupper($report->status_level); ?>
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo base_url('VoterTurnout/viewReport/'.$report->id); ?>" class="btn btn-xs btn-info" style="border-radius: 6px; background:#17a2b8; color:white; padding:4px 8px;">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot style="background: #f8f9fc; font-weight: 700;">
                                    <tr>
                                        <td colspan="3" class="text-right"><strong>WALIIGALA:</strong></td>
                                        <td class="text-center"><strong><?php echo number_format($summary->total_male_voters ?? 0); ?></strong></td>
                                        <td class="text-center"><strong><?php echo number_format($summary->total_female_voters ?? 0); ?></strong></td>
                                        <td class="text-center"><strong><?php echo number_format($summary->total_voters ?? 0); ?></strong></td>
                                        <td colspan="2"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="row animate-slide" style="animation-delay: 0.3s;">
            <div class="col-xs-12 text-right" style="margin-top: 10px; margin-bottom: 30px;">
                <a href="<?php echo base_url('VoterTurnout/register'); ?>" class="btn-modern btn-primary">
                    <i class="fa fa-plus-circle"></i> Gabaasa Haaraa Galmeessi
                </a>
                <a href="<?php echo base_url('VoterTurnout/listReports'); ?>" class="btn-modern btn-teal" style="margin-left: 10px;">
                    <i class="fa fa-list"></i> Gabaasawwan Hunda Ilaali
                </a>
            </div>
        </div>
        
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var weeklyCtx = document.getElementById('weeklyChart').getContext('2d');
        new Chart(weeklyCtx, {
            type: 'line',
            data: {
                labels: <?php echo $week_labels; ?>,
                datasets: [{
                    label: 'Baay\'ina Filattoota',
                    data: <?php echo $week_data; ?>,
                    backgroundColor: 'rgba(44, 95, 45, 0.08)',
                    borderColor: '#2c5f2d',
                    borderWidth: 3,
                    tension: 0.3,
                    fill: true,
                    pointBackgroundColor: '#2c5f2d',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: { boxWidth: 12, font: { size: 11 } }
                    },
                    tooltip: {
                        backgroundColor: '#1a3c2c',
                        titleColor: '#fff',
                        bodyColor: '#e8f5e9'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: '#e2e8f0' },
                        title: { display: true, text: 'Baay\'ina Filattoota', font: { size: 11 } }
                    },
                    x: {
                        grid: { display: false },
                        title: { display: true, text: 'Guyyaa', font: { size: 11 } }
                    }
                }
            }
        });
    });
</script>