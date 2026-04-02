<div class="content-wrapper" style="background: #f4f6f9; padding-top: 15px;">
    <!-- Content Header -->
    <section class="content-header" style="padding: 10px 20px; margin-bottom: 10px; background: white; border-bottom: 1px solid #e0e0e0;">
        <h1 style="font-size: 24px; margin: 0; font-weight: 400; color: #333;">
            <i class="fa fa-dashboard text-green" style="margin-right: 8px;"></i> Daashboordii Naannoo Filannoo
            <small style="font-size: 14px; color: #777; margin-left: 5px;">Gabaasa Guyyaa Guyyaa</small>
        </h1>
        <ol class="breadcrumb" style="padding: 0; margin: 5px 0 0; background: none;">
            <li><a href="<?php echo base_url(); ?>VotingReport/dashboard"><i class="fa fa-dashboard"></i> Daashboordii</a></li>
            <li class="active">Naannoo Filannoo</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="padding: 15px 20px;">
        
        <!-- Welcome User Card -->
        <div class="row" style="margin-bottom: 25px;">
            <div class="col-md-12">
                <div class="box box-success" style="border-radius: 4px; box-shadow: 0 3px 10px rgba(0,0,0,0.05); border-top: 3px solid #2c5f2d;">
                    <div class="box-body" style="padding: 20px; background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);">
                        <div class="row">
                            <div class="col-md-8">
                                <h3 style="margin: 0 0 10px 0; font-size: 22px; font-weight: 500;">
                                    <i class="fa fa-hand-peace-o text-green" style="margin-right: 10px;"></i>
                                    Akkam jirtu, <?php echo $name; ?>!
                                </h3>
                                <p style="font-size: 16px; color: #555; margin-bottom: 15px;">
                                    <i class="fa fa-map-marker text-green" style="margin-right: 8px;"></i>
                                    Naannoo Filannoo kee: <strong style="color: #2c5f2d; font-size: 18px;"><?php echo $voting_region_name; ?></strong>
                                </p>
                                <div style="margin-top: 15px;">
                                    <a href="<?php echo base_url('VotingReport/register'); ?>" class="btn btn-success" style="background: #2c5f2d; border-color: #2c5f2d; padding: 8px 20px; font-weight: 500; border-radius: 4px;">
                                        <i class="fa fa-plus-circle"></i> Gabaasa Haaraa Galmeessi
                                    </a>
                                    <a href="<?php echo base_url('VotingReport/listReports'); ?>" class="btn btn-info" style="background: #17a2b8; border-color: #17a2b8; padding: 8px 20px; font-weight: 500; border-radius: 4px; margin-left: 10px;">
                                        <i class="fa fa-list"></i> Gabaasawwan Koo
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 text-right">
                                <div style="background: #e8f0e8; padding: 15px; border-radius: 8px; display: inline-block; text-align: center;">
                                    <span style="font-size: 14px; color: #555;">Guyyaa har'aa</span>
                                    <h4 style="margin: 5px 0 0 0; color: #2c5f2d; font-weight: 700;"><?php echo date('d F Y'); ?></h4>
                                    <span style="font-size: 13px; color: #777;">Yeroo: <?php echo date('h:i A'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Today's Status Cards -->
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-3 col-sm-6">
                <div class="small-box" style="background: #2c5f2d; color: white; border-radius: 4px; box-shadow: 0 3px 10px rgba(0,0,0,0.1);">
                    <div class="inner" style="padding: 20px;">
                        <h3 style="font-size: 32px; margin: 0 0 5px 0; font-weight: 700;"><?php echo $morning_report ? '✓' : '⏳'; ?></h3>
                        <p style="font-size: 16px; margin: 0;">Kan Ganama</p>
                    </div>
                    <div class="icon" style="position: absolute; top: 15px; right: 15px; color: rgba(255,255,255,0.3); font-size: 50px;">
                        <i class="fa fa-sun-o"></i>
                    </div>
                    <?php if($morning_report): ?>
                        <div class="small-box-footer" style="background: rgba(0,0,0,0.1); padding: 8px 15px;">
                            <span>Yeroo: <?php echo date('H:i', strtotime($morning_report->created_at)); ?> | Waliigala: <?php echo number_format($morning_report->actual_grand_total); ?></span>
                        </div>
                    <?php else: ?>
                        <a href="<?php echo base_url('VotingReport/register'); ?>" class="small-box-footer" style="background: rgba(0,0,0,0.1); padding: 8px 15px; display: block; color: white;">
                            Amma Galmeessi <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="small-box" style="background: #17a2b8; color: white; border-radius: 4px; box-shadow: 0 3px 10px rgba(0,0,0,0.1);">
                    <div class="inner" style="padding: 20px;">
                        <h3 style="font-size: 32px; margin: 0 0 5px 0; font-weight: 700;"><?php echo $afternoon_report ? '✓' : '⏳'; ?></h3>
                        <p style="font-size: 16px; margin: 0;">Kan Waaree Booda</p>
                    </div>
                    <div class="icon" style="position: absolute; top: 15px; right: 15px; color: rgba(255,255,255,0.3); font-size: 50px;">
                        <i class="fa fa-moon-o"></i>
                    </div>
                    <?php if($afternoon_report): ?>
                        <div class="small-box-footer" style="background: rgba(0,0,0,0.1); padding: 8px 15px;">
                            <span>Yeroo: <?php echo date('H:i', strtotime($afternoon_report->created_at)); ?> | Waliigala: <?php echo number_format($afternoon_report->actual_grand_total); ?></span>
                        </div>
                    <?php else: ?>
                        <a href="<?php echo base_url('VotingReport/register'); ?>" class="small-box-footer" style="background: rgba(0,0,0,0.1); padding: 8px 15px; display: block; color: white;">
                            Amma Galmeessi <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="small-box" style="background: #ffc107; color: #333; border-radius: 4px; box-shadow: 0 3px 10px rgba(0,0,0,0.1);">
                    <div class="inner" style="padding: 20px;">
                        <h3 style="font-size: 32px; margin: 0 0 5px 0; font-weight: 700;"><?php echo $total_reports; ?></h3>
                        <p style="font-size: 16px; margin: 0;">Gabaasa Ji'a Kana</p>
                    </div>
                    <div class="icon" style="position: absolute; top: 15px; right: 15px; color: rgba(0,0,0,0.2); font-size: 50px;">
                        <i class="fa fa-file-text"></i>
                    </div>
                    <div class="small-box-footer" style="background: rgba(0,0,0,0.05); padding: 8px 15px;">
                        <span>Ganama: <?php echo $morning_count; ?> | Waaree: <?php echo $afternoon_count; ?></span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="small-box" style="background: #28a745; color: white; border-radius: 4px; box-shadow: 0 3px 10px rgba(0,0,0,0.1);">
                    <div class="inner" style="padding: 20px;">
                        <h3 style="font-size: 32px; margin: 0 0 5px 0; font-weight: 700;"><?php echo number_format($total_voters); ?></h3>
                        <p style="font-size: 16px; margin: 0;">Waliigala Filattoota</p>
                    </div>
                    <div class="icon" style="position: absolute; top: 15px; right: 15px; color: rgba(255,255,255,0.3); font-size: 50px;">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="small-box-footer" style="background: rgba(0,0,0,0.1); padding: 8px 15px;">
                        <span>Ji'a kana galmaa'an</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart and Recent Reports -->
        <div class="row">
            <div class="col-md-7">
                <div class="box box-default" style="border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); border-top: 3px solid #2c5f2d;">
                    <div class="box-header with-border" style="padding: 15px 20px; border-bottom: 1px solid #e0e0e0; background: #f9f9f9;">
                        <h3 class="box-title" style="font-size: 16px; font-weight: 600; color: #333;">
                            <i class="fa fa-line-chart text-green" style="margin-right: 8px;"></i> Gabaasa Torban Kana
                        </h3>
                    </div>
                    <div class="box-body" style="padding: 20px;">
                        <canvas id="weeklyChart" style="height: 250px; width: 100%;"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="box box-default" style="border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); border-top: 3px solid #17a2b8;">
                    <div class="box-header with-border" style="padding: 15px 20px; border-bottom: 1px solid #e0e0e0; background: #f9f9f9;">
                        <h3 class="box-title" style="font-size: 16px; font-weight: 600; color: #333;">
                            <i class="fa fa-clock-o text-info" style="margin-right: 8px;"></i> Gabaasa Dhihootti
                        </h3>
                        <div class="box-tools pull-right">
                            <a href="<?php echo base_url('VotingReport/listReports'); ?>" class="btn btn-xs btn-default">Hunda Ilaali</a>
                        </div>
                    </div>
                    <div class="box-body" style="padding: 0;">
                        <table class="table table-hover" style="margin: 0;">
                            <tbody>
                                <?php 
                                $recent_count = 0;
                                foreach($today_reports as $report): 
                                    if($recent_count >= 5) break;
                                    $recent_count++;
                                ?>
                                <tr>
                                    <td style="padding: 12px 15px; border-bottom: 1px solid #f0f0f0;">
                                        <span class="label <?php echo $report->report_session == 'morning' ? 'label-warning' : 'label-primary'; ?>" style="padding: 5px 10px; border-radius: 20px;">
                                            <?php echo $report->report_session == 'morning' ? 'Ganama' : 'Waaree'; ?>
                                        </span>
                                    </td>
                                    <td style="padding: 12px 15px; border-bottom: 1px solid #f0f0f0;">
                                        <strong><?php echo date('H:i', strtotime($report->created_at)); ?></strong>
                                    </td>
                                    <td style="padding: 12px 15px; border-bottom: 1px solid #f0f0f0;">
                                        <span style="font-weight: 600;"><?php echo number_format($report->actual_grand_total); ?></span> filattoota
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php if($recent_count == 0): ?>
                                <tr>
                                    <td colspan="3" style="padding: 30px; text-align: center; color: #777;">
                                        <i class="fa fa-info-circle"></i> Gabaasi har'aa hin jiru
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Monthly Summary -->
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-12">
                <div class="box box-default" style="border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); border-top: 3px solid #ffc107;">
                    <div class="box-header with-border" style="padding: 15px 20px; border-bottom: 1px solid #e0e0e0; background: #f9f9f9;">
                        <h3 class="box-title" style="font-size: 16px; font-weight: 600; color: #333;">
                            <i class="fa fa-calendar text-yellow" style="margin-right: 8px;"></i> Gabaasa Ji'a <?php echo date('F Y'); ?>
                        </h3>
                    </div>
                    <div class="box-body" style="padding: 20px;">
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div style="text-align: center; padding: 15px;">
                                    <span style="font-size: 28px; font-weight: 700; color: #2c5f2d;"><?php echo $total_reports; ?></span>
                                    <span style="display: block; font-size: 14px; color: #555;">Waliigala Gabaasa</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div style="text-align: center; padding: 15px;">
                                    <span style="font-size: 28px; font-weight: 700; color: #ffc107;"><?php echo $morning_count; ?></span>
                                    <span style="display: block; font-size: 14px; color: #555;">Kan Ganama</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div style="text-align: center; padding: 15px;">
                                    <span style="font-size: 28px; font-weight: 700; color: #17a2b8;"><?php echo $afternoon_count; ?></span>
                                    <span style="display: block; font-size: 14px; color: #555;">Kan Waaree Booda</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div style="text-align: center; padding: 15px;">
                                    <span style="font-size: 28px; font-weight: 700; color: #28a745;"><?php echo number_format($total_voters); ?></span>
                                    <span style="display: block; font-size: 14px; color: #555;">Filattoota</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Weekly Chart Data
    var ctx = document.getElementById('weeklyChart').getContext('2d');
    var weeklyChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo $chart_labels; ?>,
            datasets: [{
                label: 'Baay\'ina Filattoota',
                data: <?php echo $chart_data; ?>,
                backgroundColor: 'rgba(44, 95, 45, 0.1)',
                borderColor: '#2c5f2d',
                borderWidth: 3,
                tension: 0.3,
                fill: true,
                pointBackgroundColor: '#2c5f2d',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
</script>