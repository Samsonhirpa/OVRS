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
        }

        .table-modern tbody tr {
            border-bottom: 1px solid var(--border);
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

        .filter-form {
            background: white;
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        /* Chart Container */
        .chart-container {
            position: relative;
            height: 300px;
            margin-bottom: 20px;
        }

        .status-legend {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .status-legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
        }

        .status-legend-color {
            width: 16px;
            height: 16px;
            border-radius: 4px;
        }

        .status-legend-color.green { background: #28a745; }
        .status-legend-color.yellow { background: #ffc107; }
        .status-legend-color.red { background: #dc3545; }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-slide { animation: slideUp 0.4s ease forwards; }
    </style>

    <!-- Dashboard Header -->
    <div class="dashboard-header animate-slide">
        <h1>
            <i class="fa fa-bar-chart"></i>
            Daashboordii Baayyina Filattoota
            <small style="font-size: 13px; color: #6c757d; margin-left: 8px; font-weight: normal;">Admin | Voter Turnout Report</small>
        </h1>
        <div class="breadcrumb-modern" style="margin-top: 8px;">
            <a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Manii</a>
            <span style="margin: 0 5px; color: #999;">›</span>
            <span style="color: #999;">Daashboordii Baayyina Filattoota</span>
        </div>
    </div>

    <section class="content" style="padding: 0 15px 15px 15px;">
        
        <!-- Filter Form -->
        <div class="filter-form animate-slide" style="animation-delay: 0.05s;">
            <form method="get" action="<?php echo base_url('VoterTurnout/adminDashboard'); ?>">
                <div class="row">
                    <div class="col-md-3">
                        <label style="font-weight: 600; font-size: 12px;">Guyyaa Jalqabaa:</label>
                        <input type="date" name="start_date" class="form-control" value="<?php echo $start_date; ?>" style="border-radius: 8px;">
                    </div>
                    <div class="col-md-3">
                        <label style="font-weight: 600; font-size: 12px;">Guyyaa Xumuraa:</label>
                        <input type="date" name="end_date" class="form-control" value="<?php echo $end_date; ?>" style="border-radius: 8px;">
                    </div>
                    <div class="col-md-3">
                        <label style="font-weight: 600; font-size: 12px;">Haala Naannoo:</label>
                        <select name="status_level" class="form-control" style="border-radius: 8px;">
                            <option value="all" <?php echo $selected_status == 'all' ? 'selected' : ''; ?>>Hunda</option>
                            <option value="green" <?php echo $selected_status == 'green' ? 'selected' : ''; ?>>Green (Nagaa)</option>
                            <option value="yellow" <?php echo $selected_status == 'yellow' ? 'selected' : ''; ?>>Yellow (Rakkina xixiqqoo)</option>
                            <option value="red" <?php echo $selected_status == 'red' ? 'selected' : ''; ?>>Red (Rakkina guddaa)</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label style="font-weight: 600; font-size: 12px;">Naannoo:</label>
                        <select name="region" class="form-control" style="border-radius: 8px;">
                            <option value="all" <?php echo $selected_region == 'all' ? 'selected' : ''; ?>>Naannoo Hunda</option>
                            <?php foreach($all_regions as $region): ?>
                                <option value="<?php echo $region->naannoofil_id; ?>" <?php echo $selected_region == $region->naannoofil_id ? 'selected' : ''; ?>>
                                    <?php echo $region->naannoofil_id; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn-modern btn-primary"><i class="fa fa-search"></i> Calleessii</button>
                        <a href="<?php echo base_url('VoterTurnout/adminDashboard'); ?>" class="btn-modern btn-teal"><i class="fa fa-refresh"></i> Haari</a>
                    </div>
                </div>
            </form>
        </div>

        <!-- KPI Summary Cards -->
        <div class="row animate-slide" style="animation-delay: 0.1s;">
            <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="stat-card primary">
                    <div class="stat-icon"><i class="fa fa-file-text-o"></i></div>
                    <div class="stat-value"><?php echo number_format($stats['overall']->total_reports ?? 0); ?></div>
                    <p class="stat-label">Waliigala Gabaasa</p>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="stat-card teal">
                    <div class="stat-icon"><i class="fa fa-users"></i></div>
                    <div class="stat-value"><?php echo number_format($stats['overall']->total_voters ?? 0); ?></div>
                    <p class="stat-label">Waliigala Filattoota</p>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="stat-card gold">
                    <div class="stat-icon"><i class="fa fa-flag"></i></div>
                    <div class="stat-value"><?php echo number_format($stats['total_regions'] ?? 0); ?></div>
                    <p class="stat-label">Naannoo Filannoo</p>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="stat-card red">
                    <div class="stat-icon"><i class="fa fa-calendar"></i></div>
                    <div class="stat-value"><?php echo date('d/m/Y', strtotime($start_date)); ?> - <?php echo date('d/m/Y', strtotime($end_date)); ?></div>
                    <p class="stat-label">Yeroo Calleessaa</p>
                </div>
            </div>
        </div>

        <!-- Status Summary Cards -->
        <div class="row animate-slide" style="animation-delay: 0.15s;">
            <div class="col-md-4">
                <div style="background: #e8f5e9; border-radius: 16px; padding: 15px; text-align: center; border-left: 4px solid #28a745;">
                    <i class="fa fa-check-circle" style="color: #28a745; font-size: 24px;"></i>
                    <h4 style="margin: 5px 0; color: #28a745;">Green (Nagaa)</h4>
                    <h2 style="margin: 0; font-size: 28px;"><?php echo number_format($stats['green_count'] ?? 0); ?></h2>
                    <small>Gabaasa</small>
                </div>
            </div>
            <div class="col-md-4">
                <div style="background: #fff3e0; border-radius: 16px; padding: 15px; text-align: center; border-left: 4px solid #ffc107;">
                    <i class="fa fa-warning" style="color: #ffc107; font-size: 24px;"></i>
                    <h4 style="margin: 5px 0; color: #ffc107;">Yellow (Rakkina xixiqqoo)</h4>
                    <h2 style="margin: 0; font-size: 28px;"><?php echo number_format($stats['yellow_count'] ?? 0); ?></h2>
                    <small>Gabaasa</small>
                </div>
            </div>
            <div class="col-md-4">
                <div style="background: #ffebee; border-radius: 16px; padding: 15px; text-align: center; border-left: 4px solid #dc3545;">
                    <i class="fa fa-exclamation-triangle" style="color: #dc3545; font-size: 24px;"></i>
                    <h4 style="margin: 5px 0; color: #dc3545;">Red (Rakkina guddaa)</h4>
                    <h2 style="margin: 0; font-size: 28px;"><?php echo number_format($stats['red_count'] ?? 0); ?></h2>
                    <small>Gabaasa</small>
                </div>
            </div>
        </div>

        <!-- Security Status Chart Row -->
        <div class="row animate-slide" style="animation-delay: 0.2s;">
            <div class="col-md-12">
                <div class="modern-card">
                    <div class="card-header">
                        <h3><i class="fa fa-pie-chart"></i> Haala Naannoo (Security Status Distribution)</h3>
                        <span class="badge-modern">Based on Report Status</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="chart-container">
                                    <canvas id="securityStatusChart" style="height: 280px; width: 100%;"></canvas>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="status-legend">
                                    <div class="status-legend-item">
                                        <div class="status-legend-color green"></div>
                                        <span><strong>Green (Nagaa)</strong> - <?php echo number_format($stats['green_count'] ?? 0); ?> reports</span>
                                    </div>
                                    <div class="status-legend-item">
                                        <div class="status-legend-color yellow"></div>
                                        <span><strong>Yellow (Rakkina xixiqqoo)</strong> - <?php echo number_format($stats['yellow_count'] ?? 0); ?> reports</span>
                                    </div>
                                    <div class="status-legend-item">
                                        <div class="status-legend-color red"></div>
                                        <span><strong>Red (Rakkina guddaa)</strong> - <?php echo number_format($stats['red_count'] ?? 0); ?> reports</span>
                                    </div>
                                </div>
                                <div style="margin-top: 25px; background: #f8f9fc; padding: 15px; border-radius: 12px;">
                                    <h5 style="margin: 0 0 10px 0; font-size: 14px; font-weight: 700;">Summary:</h5>
                                    <ul style="margin: 0; padding-left: 20px;">
                                        <li style="margin-bottom: 8px;">
                                            <i class="fa fa-check-circle" style="color: #28a745;"></i>
                                            <strong><?php echo number_format($stats['green_count'] ?? 0); ?></strong> reports indicate <strong>Green (Safe)</strong> situation
                                        </li>
                                        <li style="margin-bottom: 8px;">
                                            <i class="fa fa-warning" style="color: #ffc107;"></i>
                                            <strong><?php echo number_format($stats['yellow_count'] ?? 0); ?></strong> reports indicate <strong>Yellow (Some Disturbance)</strong>
                                        </li>
                                        <li>
                                            <i class="fa fa-exclamation-triangle" style="color: #dc3545;"></i>
                                            <strong><?php echo number_format($stats['red_count'] ?? 0); ?></strong> reports indicate <strong>Red (Not Safe)</strong> situation
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gender Breakdown Row -->
        <div class="row animate-slide" style="animation-delay: 0.25s;">
            <div class="col-md-12">
                <div class="modern-card">
                    <div class="card-header">
                        <h3><i class="fa fa-venus-mars"></i> Cita Saalaa (Gender Breakdown)</h3>
                    </div>
                    <div class="card-body">
                        <?php 
                            $totalVoters = $stats['overall']->total_voters ?? 0;
                            $malePercent = $totalVoters > 0 ? round((($stats['gender']->male_voters ?? 0) / $totalVoters) * 100, 1) : 0;
                            $femalePercent = $totalVoters > 0 ? round((($stats['gender']->female_voters ?? 0) / $totalVoters) * 100, 1) : 0;
                        ?>
                        <div style="height: 40px; border-radius: 30px; overflow: hidden; margin: 10px 0; display: flex;">
                            <div style="background: #2c5f2d; width: <?php echo $malePercent; ?>%; display: flex; align-items: center; justify-content: center; color: white; font-size: 14px; font-weight: 600;">
                                Dhiirii <?php echo number_format($stats['gender']->male_voters ?? 0); ?> (<?php echo $malePercent; ?>%)
                            </div>
                            <div style="background: #e6a017; width: <?php echo $femalePercent; ?>%; display: flex; align-items: center; justify-content: center; color: #333; font-size: 14px; font-weight: 600;">
                                Dubartii <?php echo number_format($stats['gender']->female_voters ?? 0); ?> (<?php echo $femalePercent; ?>%)
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-xs-6 text-center">
                                <div style="background: #e8f5e9; padding: 15px; border-radius: 12px;">
                                    <i class="fa fa-mars" style="font-size: 32px; color: #2c5f2d;"></i>
                                    <h3 style="margin: 10px 0 5px; font-weight: 700;"><?php echo number_format($stats['gender']->male_voters ?? 0); ?></h3>
                                    <p style="margin: 0; font-size: 12px;">Dhiirii (<?php echo $malePercent; ?>%)</p>
                                </div>
                            </div>
                            <div class="col-xs-6 text-center">
                                <div style="background: #fff3e0; padding: 15px; border-radius: 12px;">
                                    <i class="fa fa-venus" style="font-size: 32px; color: #e6a017;"></i>
                                    <h3 style="margin: 10px 0 5px; font-weight: 700;"><?php echo number_format($stats['gender']->female_voters ?? 0); ?></h3>
                                    <p style="margin: 0; font-size: 12px;">Dubartii (<?php echo $femalePercent; ?>%)</p>
                                </div>
                            </div>
                        </div>
                        <div class="text-center" style="margin-top: 15px;">
                            <p style="margin: 0; font-size: 14px;">
                                <strong>Waliigala Filattoota:</strong> <?php echo number_format($totalVoters); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="row animate-slide" style="animation-delay: 0.3s;">
            <div class="col-xs-12 text-right" style="margin-top: 10px; margin-bottom: 30px;">
                <a href="<?php echo base_url('VoterTurnout/register'); ?>" class="btn-modern btn-primary">
                    <i class="fa fa-plus-circle"></i> Haaraa Galmeessi
                </a>
                <a href="<?php echo base_url('VoterTurnout/adminListReports'); ?>" class="btn-modern btn-teal" style="margin-left: 10px;">
                    <i class="fa fa-list"></i> Gabaasawwan Hunda Ilaali
                </a>
            </div>
        </div>
        
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Security Status Pie Chart
        const greenCount = <?php echo $stats['green_count'] ?? 0; ?>;
        const yellowCount = <?php echo $stats['yellow_count'] ?? 0; ?>;
        const redCount = <?php echo $stats['red_count'] ?? 0; ?>;
        
        const ctx = document.getElementById('securityStatusChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Green (Nagaa)', 'Yellow (Rakkina xixiqqoo)', 'Red (Rakkina guddaa)'],
                datasets: [{
                    data: [greenCount, yellowCount, redCount],
                    backgroundColor: ['#28a745', '#ffc107', '#dc3545'],
                    borderWidth: 2,
                    borderColor: '#ffffff',
                    hoverOffset: 10,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 12,
                            font: { size: 11 },
                            padding: 15
                        }
                    },
                    tooltip: {
                        backgroundColor: '#1a3c2c',
                        titleColor: '#fff',
                        bodyColor: '#e8f5e9',
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                let value = context.raw;
                                let total = greenCount + yellowCount + redCount;
                                let percentage = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
                                return `${label}: ${value} reports (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });
    });
</script>