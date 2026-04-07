<div class="content-wrapper" style="background: linear-gradient(135deg, #f5f7fc 0%, #eef2f8 100%); min-height: 100vh;">
    <section class="content-header" style="padding: 25px 30px 0 30px;">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
            <div>
                <h1 style="font-size: 28px; margin: 0; font-weight: 700; background: linear-gradient(135deg, #2c5f2d 0%, #1e4620 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                    <i class="fa fa-dashboard" style="color: #2c5f2d; margin-right: 12px; -webkit-text-fill-color: initial;"></i>
                    Daashboordii Filannoo Paartii
                </h1>
                <p style="margin: 5px 0 0; color: #6c86a3; font-size: 13px;">
                    <i class="fa fa-flag-checkered"></i> <?php echo $voting_region_name; ?> - Kuufama Odeeffannoo Filannoo
                </p>
            </div>
            <div>
                <a href="<?php echo base_url('ElectionReport/register'); ?>" class="btn btn-success" style="border-radius: 30px; padding: 10px 25px; background: linear-gradient(135deg, #2c5f2d, #1e4620); border: none; box-shadow: 0 2px 8px rgba(44,95,45,0.3);">
                    <i class="fa fa-plus-circle"></i> Haaraa Galmeessi
                </a>
                <a href="<?php echo base_url('ElectionReport/listReports'); ?>" class="btn btn-default" style="border-radius: 30px; padding: 10px 25px; margin-left: 10px; background: white; border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                    <i class="fa fa-list"></i> Gabaasawwan Koo
                </a>
            </div>
        </div>
    </section>

    <section class="content" style="padding: 20px 30px;">
        <div class="row">
            <div class="col-md-12">
                
                <!-- Welcome Card -->
                <div style="background: linear-gradient(135deg, #ffffff, #f8fff8); border-radius: 24px; padding: 25px 30px; margin-bottom: 25px; border: 1px solid #e0e8e0;">
                    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
                        <div>
                            <h2 style="margin: 0; font-size: 22px; font-weight: 700; color: #1a3c2c;">
                                <i class="fa fa-hand-peace-o" style="color: #2c5f2d;"></i>
                                Akkam jirtu, <?php echo $name; ?>!
                            </h2>
                            <p style="margin: 8px 0 0; color: #6c86a3;">
                                <i class="fa fa-map-marker"></i> Naannoo Filannoo: <strong style="color: #2c5f2d;"><?php echo $voting_region_name; ?></strong>
                            </p>
                        </div>
                        <div style="background: #e8f5e9; border-radius: 16px; padding: 10px 20px; text-align: center;">
                            <div style="font-size: 12px; color: #2c5f2d;">Guyyaa har'aa</div>
                            <div style="font-size: 18px; font-weight: 700; color: #1e4620;"><?php echo date('d F Y'); ?></div>
                            <div style="font-size: 11px; color: #6c86a3;"><?php echo date('h:i A'); ?></div>
                        </div>
                    </div>
                </div>
                
                <!-- Stats Cards Row (Male & Female Only) -->
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-md-3">
                        <div style="background: linear-gradient(135deg, #2c5f2d, #1e4620); border-radius: 20px; padding: 20px; color: white;">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div>
                                    <p style="margin: 0; opacity: 0.8; font-size: 12px;">WALIIGALA GABAASA</p>
                                    <h2 style="margin: 5px 0; font-size: 36px; font-weight: 800;"><?php echo number_format($summary->total_reports ?? 0); ?></h2>
                                </div>
                                <div style="background: rgba(255,255,255,0.15); border-radius: 16px; width: 55px; height: 55px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa fa-file-text" style="font-size: 26px;"></i>
                                </div>
                            </div>
                            <small style="opacity: 0.7;">Gabaasa galmaa'an</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div style="background: linear-gradient(135deg, #2c5f2d, #3e8e41); border-radius: 20px; padding: 20px; color: white;">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div>
                                    <p style="margin: 0; opacity: 0.8; font-size: 12px;">DHIIRA (MALE)</p>
                                    <h2 style="margin: 5px 0; font-size: 36px; font-weight: 800;"><?php echo number_format($summary->total_male_voters ?? 0); ?></h2>
                                </div>
                                <div style="background: rgba(255,255,255,0.15); border-radius: 16px; width: 55px; height: 55px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa fa-mars" style="font-size: 26px;"></i>
                                </div>
                            </div>
                            <small style="opacity: 0.7;">Filattoota Dhiiraa</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div style="background: linear-gradient(135deg, #e67e22, #f39c12); border-radius: 20px; padding: 20px; color: white;">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div>
                                    <p style="margin: 0; opacity: 0.8; font-size: 12px;">DUBARTII (FEMALE)</p>
                                    <h2 style="margin: 5px 0; font-size: 36px; font-weight: 800;"><?php echo number_format($summary->total_female_voters ?? 0); ?></h2>
                                </div>
                                <div style="background: rgba(255,255,255,0.15); border-radius: 16px; width: 55px; height: 55px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa fa-venus" style="font-size: 26px;"></i>
                                </div>
                            </div>
                            <small style="opacity: 0.7;">Filattoota Dubartii</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div style="background: linear-gradient(135deg, #9b59b6, #8e44ad); border-radius: 20px; padding: 20px; color: white;">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div>
                                    <p style="margin: 0; opacity: 0.8; font-size: 12px;">WALIIGALA FILATTOOTA</p>
                                    <h2 style="margin: 5px 0; font-size: 36px; font-weight: 800;"><?php echo number_format($summary->total_voters ?? 0); ?></h2>
                                </div>
                                <div style="background: rgba(255,255,255,0.15); border-radius: 16px; width: 55px; height: 55px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa fa-users" style="font-size: 26px;"></i>
                                </div>
                            </div>
                            <small style="opacity: 0.7;">Filattoota hunda</small>
                        </div>
                    </div>
                </div>
                
                <!-- Chart and Party Breakdown Row -->
                <div class="row">
                    <div class="col-md-7">
                        <div style="background: white; border-radius: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.04); overflow: hidden; margin-bottom: 20px;">
                            <div style="background: #f8fafc; padding: 18px 25px; border-bottom: 1px solid #e2e8f0;">
                                <h5 style="margin: 0; font-weight: 600; color: #2c5f2d;">
                                    <i class="fa fa-line-chart"></i> Gabaasa Torban Kana
                                </h5>
                            </div>
                            <div style="padding: 20px;">
                                <canvas id="weeklyChart" style="height: 300px; width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div style="background: white; border-radius: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.04); overflow: hidden; margin-bottom: 20px;">
                            <div style="background: #f8fafc; padding: 18px 25px; border-bottom: 1px solid #e2e8f0;">
                                <h5 style="margin: 0; font-weight: 600; color: #e67e22;">
                                    <i class="fa fa-pie-chart"></i> Cita Paartii (Party Breakdown)
                                </h5>
                            </div>
                            <div style="padding: 20px;">
                                <div class="table-responsive">
                                    <table class="table" style="margin-bottom: 0;">
                                        <thead>
                                            <tr style="background: #f8fafc;">
                                                <th>Paartii</th>
                                                <th class="text-center">Gabaasa</th>
                                                <th class="text-center">Dhiira</th>
                                                <th class="text-center">Dubartii</th>
                                                <th class="text-center">Waliigala</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($party_breakdown)): ?>
                                                <?php foreach($party_breakdown as $party): ?>
                                                <tr>
                                                    <td>
                                                        <span style="background: linear-gradient(135deg, #e67e22, #f39c12); color: white; padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 600;">
                                                            <?php echo $party->party_name; ?>
                                                        </span>
                                                    </td>
                                                    <td class="text-center"><?php echo $party->report_count; ?></td>
                                                    <td class="text-center"><?php echo number_format($party->male_voters ?? 0); ?></td>
                                                    <td class="text-center"><?php echo number_format($party->female_voters ?? 0); ?></td>
                                                    <td class="text-center">
                                                        <strong style="color: #2c5f2d;"><?php echo number_format($party->total_voters); ?></strong>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="5" class="text-center" style="padding: 40px;">
                                                        <i class="fa fa-info-circle" style="font-size: 24px; color: #cbd5e0;"></i>
                                                        <p style="margin-top: 10px;">Odeeffannoo hin jiru</p>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr style="background: #e8f5e9; font-weight: 700;">
                                                <td>Waliigala</td>
                                                <td class="text-center"><?php echo number_format($summary->total_reports ?? 0); ?></td>
                                                <td class="text-center"><?php echo number_format($summary->total_male_voters ?? 0); ?></td>
                                                <td class="text-center"><?php echo number_format($summary->total_female_voters ?? 0); ?></td>
                                                <td class="text-center"><?php echo number_format($summary->total_voters ?? 0); ?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Gender Distribution Chart Row -->
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-6">
                        <div style="background: white; border-radius: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.04); overflow: hidden;">
                            <div style="background: #f8fafc; padding: 18px 25px; border-bottom: 1px solid #e2e8f0;">
                                <h5 style="margin: 0; font-weight: 600; color: #17a2b8;">
                                    <i class="fa fa-pie-chart"></i> Qoodinsa Saalaa (Gender Distribution)
                                </h5>
                            </div>
                            <div style="padding: 20px;">
                                <canvas id="genderChart" style="height: 250px; width: 100%;"></canvas>
                                <div style="text-align: center; margin-top: 15px;">
                                    <span style="display: inline-block; margin: 0 15px;">
                                        <i class="fa fa-mars" style="color: #2c5f2d;"></i> Dhiira: 
                                        <strong><?php echo number_format($summary->total_male_voters ?? 0); ?></strong>
                                    </span>
                                    <span style="display: inline-block; margin: 0 15px;">
                                        <i class="fa fa-venus" style="color: #e67e22;"></i> Dubartii: 
                                        <strong><?php echo number_format($summary->total_female_voters ?? 0); ?></strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="background: white; border-radius: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.04); overflow: hidden;">
                            <div style="background: #f8fafc; padding: 18px 25px; border-bottom: 1px solid #e2e8f0;">
                                <h5 style="margin: 0; font-weight: 600; color: #e67e22;">
                                    <i class="fa fa-bar-chart"></i> Top 5 Paartii (By Voters)
                                </h5>
                            </div>
                            <div style="padding: 20px;">
                                <div class="table-responsive">
                                    <table class="table" style="margin-bottom: 0;">
                                        <thead>
                                            <tr style="background: #f8fafc;">
                                                <th>Paartii</th>
                                                <th class="text-center">Waliigala</th>
                                                <th class="text-center">%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $topParties = array_slice($party_breakdown, 0, 5);
                                            $totalVoters = $summary->total_voters ?? 0;
                                            if(!empty($topParties)): 
                                                foreach($topParties as $party): 
                                                    $percentage = $totalVoters > 0 ? round(($party->total_voters / $totalVoters) * 100, 1) : 0;
                                            ?>
                                                <tr>
                                                    <td>
                                                        <span style="background: linear-gradient(135deg, #e67e22, #f39c12); color: white; padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 600;">
                                                            <?php echo $party->party_name; ?>
                                                        </span>
                                                    </td>
                                                    <td class="text-center">
                                                        <strong style="color: #2c5f2d;"><?php echo number_format($party->total_voters); ?></strong>
                                                    </td>
                                                    <td class="text-center">
                                                        <div style="background: #e8f5e9; border-radius: 20px; padding: 3px 0; width: 100%;">
                                                            <div style="background: linear-gradient(135deg, #2c5f2d, #3e8e41); border-radius: 20px; width: <?php echo $percentage; ?>%; padding: 3px 8px; color: white; font-size: 11px; font-weight: 600;">
                                                                <?php echo $percentage; ?>%
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="3" class="text-center" style="padding: 40px;">
                                                        <i class="fa fa-info-circle" style="font-size: 24px; color: #cbd5e0;"></i>
                                                        <p style="margin-top: 10px;">Odeeffannoo hin jiru</p>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-12 text-center">
                        <a href="<?php echo base_url('ElectionReport/register'); ?>" class="btn btn-success btn-lg" style="border-radius: 50px; padding: 12px 35px; background: linear-gradient(135deg, #2c5f2d, #1e4620); border: none; margin: 0 10px;">
                            <i class="fa fa-plus-circle"></i> Gabaasa Haaraa Galmeessi
                        </a>
                        <a href="<?php echo base_url('ElectionReport/listReports'); ?>" class="btn btn-info btn-lg" style="border-radius: 50px; padding: 12px 35px; background: linear-gradient(135deg, #17a2b8, #138496); border: none; margin: 0 10px;">
                            <i class="fa fa-list"></i> Gabaasawwan Koo Ilaali
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Weekly Chart
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
    
    // Gender Distribution Pie Chart
    var genderCtx = document.getElementById('genderChart').getContext('2d');
    new Chart(genderCtx, {
        type: 'doughnut',
        data: {
            labels: ['Dhiira (Male)', 'Dubartii (Female)'],
            datasets: [{
                data: [
                    <?php echo $summary->total_male_voters ?? 0; ?>, 
                    <?php echo $summary->total_female_voters ?? 0; ?>
                ],
                backgroundColor: ['#2c5f2d', '#e67e22'],
                borderColor: '#ffffff',
                borderWidth: 3,
                hoverOffset: 10
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { 
                        boxWidth: 15, 
                        font: { size: 12, weight: 'bold' },
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
                            let value = context.raw || 0;
                            let total = context.dataset.data.reduce((a, b) => a + b, 0);
                            let percentage = total > 0 ? Math.round((value / total) * 100) : 0;
                            return `${label}: ${value.toLocaleString()} (${percentage}%)`;
                        }
                    }
                }
            },
            cutout: '60%'
        }
    });
</script>