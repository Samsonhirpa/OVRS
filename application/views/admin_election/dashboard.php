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

        /* Dashboard Header */
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

        .dashboard-header h1 i {
            color: var(--primary-green);
            font-size: 28px;
        }

        .breadcrumb-modern {
            margin-top: 8px;
            padding: 0;
            background: none;
            font-size: 12px;
        }

        .breadcrumb-modern a {
            color: var(--primary-green);
            text-decoration: none;
        }

        /* Stat Cards */
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
            font-weight: 500;
        }

        /* Modern Cards */
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

        .card-header h3 i {
            color: var(--primary-green);
        }

        .card-body {
            padding: 20px;
        }

        /* Modern Table */
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
            transition: all 0.2s ease;
        }

        .table-modern tbody tr:hover {
            background: var(--gray-light);
        }

        .table-modern tbody td {
            padding: 12px 10px;
            font-size: 13px;
            vertical-align: middle;
        }

        .table-modern tfoot {
            background: var(--gray-light);
            font-weight: 700;
        }

        .table-modern tfoot td {
            padding: 12px 10px;
            border-top: 2px solid var(--border);
        }

        /* Progress Bar */
        .progress-modern {
            height: 6px;
            background: #e9ecef;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 5px;
        }

        .progress-bar-modern {
            height: 100%;
            border-radius: 10px;
            transition: width 0.5s ease;
        }

        /* Gender Progress */
        .gender-progress {
            height: 32px;
            border-radius: 30px;
            overflow: hidden;
            margin: 10px 0;
        }

        .gender-progress-bar {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 600;
        }

        .male-bar { background: var(--primary-green); color: white; }
        .female-bar { background: var(--gold); color: #2c2b26; }

        /* Badge */
        .badge-modern {
            background: var(--primary-green);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        /* Buttons */
        .btn-modern {
            border-radius: 30px;
            padding: 8px 20px;
            font-size: 12px;
            font-weight: 500;
            border: none;
            transition: all 0.2s ease;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-primary {
            background: var(--primary-green);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .btn-teal {
            background: var(--teal);
            color: white;
        }

        .btn-teal:hover {
            background: #146b78;
        }

        /* Animations */
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-slide {
            animation: slideUp 0.4s ease forwards;
        }

        /* Trophy Colors */
        .trophy-gold { color: #ffd700; }
        .trophy-silver { color: #c0c0c0; }
        .trophy-bronze { color: #cd7f32; }

        /* Responsive */
        @media (max-width: 768px) {
            .dashboard-header h1 { font-size: 18px; }
            .stat-value { font-size: 24px; }
            .stat-icon { font-size: 36px; }
            .table-modern thead th, .table-modern tbody td { padding: 8px 5px; font-size: 10px; }
            .btn-modern { padding: 6px 12px; font-size: 11px; }
        }
    </style>

    <!-- Dashboard Header -->
    <div class="dashboard-header animate-slide">
        <h1>
            <i class="fa fa-bar-chart"></i>
            Daashboordii Filannoo Paartii
            <small style="font-size: 13px; color: #6c757d; margin-left: 8px; font-weight: normal;">Admin | Party Election Report</small>
        </h1>
        <div class="breadcrumb-modern">
            <a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Manii</a>
            <span style="margin: 0 5px; color: #999;">›</span>
            <span style="color: #999;">Daashboordii Filannoo Paartii</span>
        </div>
    </div>

    <section class="content" style="padding: 0 15px 15px 15px;">
        
        <!-- KPI Summary Cards -->
        <div class="row animate-slide" style="animation-delay: 0.05s;">
            <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="stat-card primary">
                    <div class="stat-icon"><i class="fa fa-file-text-o"></i></div>
                    <div class="stat-value"><?php echo number_format($summary->total_reports); ?></div>
                    <p class="stat-label">Waliigala Gabaasa</p>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="stat-card teal">
                    <div class="stat-icon"><i class="fa fa-users"></i></div>
                    <div class="stat-value"><?php echo number_format($summary->total_voters); ?></div>
                    <p class="stat-label">Waliigala Filattoota</p>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="stat-card gold">
                    <div class="stat-icon"><i class="fa fa-flag"></i></div>
                    <div class="stat-value"><?php echo count($party_breakdown); ?></div>
                    <p class="stat-label">Paartiiwwan Aktiivii</p>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="stat-card red">
                    <div class="stat-icon"><i class="fa fa-map-marker"></i></div>
                    <div class="stat-value"><?php echo number_format($summary->total_regions); ?></div>
                    <p class="stat-label">Naannoo Filannoo</p>
                </div>
            </div>
        </div>

        <!-- Party Share Circle Graph -->
        <div class="row animate-slide" style="animation-delay: 0.1s;">
            <div class="col-md-6">
                <div class="modern-card">
                    <div class="card-header">
                        <h3><i class="fa fa-pie-chart"></i> Cita Paartii (%)</h3>
                        <span class="badge-modern">Party Share by Voters</span>
                    </div>
                    <div class="card-body" style="text-align: center;">
                        <canvas id="partyPieChart" style="max-width: 260px; max-height: 260px; margin: 0 auto 15px auto;"></canvas>
                        <div id="partyLegend" style="font-size: 12px; text-align: left; margin-top: 10px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="modern-card">
                    <div class="card-header">
                        <h3><i class="fa fa-info-circle"></i> Odeeffannoo Dabalataa</h3>
                    </div>
                    <div class="card-body">
                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-xs-6">
                                <div style="background: var(--gray-light); padding: 15px; border-radius: 12px; text-align: center;">
                                    <i class="fa fa-calendar" style="font-size: 28px; color: var(--primary-green);"></i>
                                    <h4 style="margin: 8px 0 0; font-size: 20px; font-weight: 700;">2025</h4>
                                    <span style="font-size: 11px;">Waggaa Filannoo</span>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div style="background: var(--gray-light); padding: 15px; border-radius: 12px; text-align: center;">
                                    <i class="fa fa-file-text" style="font-size: 28px; color: var(--teal);"></i>
                                    <h4 style="margin: 8px 0 0; font-size: 20px; font-weight: 700;"><?php echo number_format($summary->total_reports); ?></h4>
                                    <span style="font-size: 11px;">Gabaasa Guutuu</span>
                                </div>
                            </div>
                        </div>
                        <div style="background: #e8f5e9; padding: 12px; border-radius: 12px;">
                            <p style="margin: 0; font-size: 12px;"><i class="fa fa-map-marker" style="color: var(--primary-green);"></i> <strong>Naannoo Filannoo:</strong> <?php echo number_format($summary->total_regions); ?> districts covered</p>
                            <p style="margin: 8px 0 0; font-size: 12px;"><i class="fa fa-trophy" style="color: var(--gold);"></i> <strong>Paartii Ol'Aanaa:</strong> <?php echo !empty($party_breakdown) ? $party_breakdown[0]->party_name : 'N/A'; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Party Breakdown Table -->
        <div class="modern-card animate-slide" style="animation-delay: 0.15s;">
            <div class="card-header">
                <h3><i class="fa fa-flag-checkered"></i> Cita Paartii (Party Breakdown)</h3>
                <div>
                    <button class="btn-modern btn-primary" onclick="window.print()"><i class="fa fa-print"></i> Maxxansi</button>
                    <button class="btn-modern btn-teal" onclick="exportPartyData()"><i class="fa fa-download"></i> CSV</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-modern" id="partyTable">
                        <thead>
                            <tr>
                                <th style="width: 5%; text-align: center;">#</th>
                                <th style="width: 25%;">Maqaa Paartii</th>
                                <th style="width: 10%; text-align: center;">Gabaasa</th>
                                <th style="width: 15%; text-align: center;">Dhiirii</th>
                                <th style="width: 15%; text-align: center;">Dubartii</th>
                                <th style="width: 20%; text-align: center;">Waliigala</th>
                                <th style="width: 10%; text-align: center;">% Qooda</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $rank = 1;
                            $totalVoters = 0;
                            foreach($party_breakdown as $party) { $totalVoters += $party->total_voters; }
                            foreach($party_breakdown as $party): 
                                $percentage = $totalVoters > 0 ? round(($party->total_voters / $totalVoters) * 100, 1) : 0;
                            ?>
                            <tr>
                                <td class="text-center">
                                    <?php if($rank == 1): ?>
                                        <i class="fa fa-trophy trophy-gold" style="font-size: 18px;"></i>
                                    <?php elseif($rank == 2): ?>
                                        <i class="fa fa-trophy trophy-silver" style="font-size: 18px;"></i>
                                    <?php elseif($rank == 3): ?>
                                        <i class="fa fa-trophy trophy-bronze" style="font-size: 18px;"></i>
                                    <?php else: ?>
                                        <span style="display: inline-block; width: 24px; height: 24px; line-height: 24px; background: #f0f0f0; border-radius: 50%;"><?php echo $rank; ?></span>
                                    <?php endif; ?>
                                </td>
                                <td><strong><?php echo $party->party_name; ?></strong></td>
                                <td class="text-center"><?php echo $party->report_count; ?></td>
                                <td class="text-center"><?php echo number_format($party->total_male_voters); ?></td>
                                <td class="text-center"><?php echo number_format($party->total_female_voters); ?></td>
                                <td class="text-center"><strong><?php echo number_format($party->total_voters); ?></strong></td>
                                <td class="text-center">
                                    <strong><?php echo $percentage; ?>%</strong>
                                    <div class="progress-modern">
                                        <div class="progress-bar-modern" style="width: <?php echo $percentage; ?>%; background: var(--primary-green);"></div>
                                    </div>
                                </td>
                            </tr>
                            <?php 
                            $rank++; 
                            endforeach; 
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" class="text-right"><strong>WALIIGALA:</strong></td>
                                <td class="text-center"><strong><?php echo number_format(array_sum(array_column($party_breakdown, 'report_count'))); ?></strong></td>
                                <td class="text-center"><strong><?php echo number_format(array_sum(array_column($party_breakdown, 'total_male_voters'))); ?></strong></td>
                                <td class="text-center"><strong><?php echo number_format(array_sum(array_column($party_breakdown, 'total_female_voters'))); ?></strong></td>
                                <td class="text-center"><strong><?php echo number_format($totalVoters); ?></strong></td>
                                <td class="text-center"><strong>100%</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- Top Regions & Gender Breakdown -->
        <div class="row animate-slide" style="animation-delay: 0.2s;">
            <div class="col-md-7">
                <div class="modern-card">
                    <div class="card-header">
                        <h3><i class="fa fa-trophy"></i> Naannoo Filannoo Olii (Top 10)</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table-modern">
                                <thead>
                                    <tr>
                                        <th style="width: 10%;">#</th>
                                        <th style="width: 50%;">Naannoo Filannoo</th>
                                        <th style="width: 20%; text-align: center;">Gabaasa</th>
                                        <th style="width: 20%; text-align: center;">Filattoota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; foreach($top_regions as $region): ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i++; ?></td>
                                        <td><strong><?php echo $region->naannoofil_id; ?></strong></td>
                                        <td class="text-center"><?php echo $region->report_count; ?></td>
                                        <td class="text-center"><span class="badge-modern"><?php echo number_format($region->total_voters); ?></span></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="modern-card">
                    <div class="card-header">
                        <h3><i class="fa fa-venus-mars"></i> Cita Saalaa (Gender Breakdown)</h3>
                    </div>
                    <div class="card-body">
                        <h5 style="margin-bottom: 8px; font-weight: 700;">Dhiirii fi Dubartii Filattoota</h5>
                        <div class="gender-progress">
                            <div class="gender-progress-bar male-bar" style="width: <?php echo $summary->total_voters > 0 ? round(($gender_breakdown->male_voters / $summary->total_voters) * 100, 1) : 0; ?>%;">
                                Dhiirii <?php echo number_format($gender_breakdown->male_voters); ?>
                            </div>
                            <div class="gender-progress-bar female-bar" style="width: <?php echo $summary->total_voters > 0 ? round(($gender_breakdown->female_voters / $summary->total_voters) * 100, 1) : 0; ?>%;">
                                Dubartii <?php echo number_format($gender_breakdown->female_voters); ?>
                            </div>
                        </div>
                        <p class="text-center" style="margin-top: 10px; font-size: 12px;">
                            <strong>Waliigala Filattoota:</strong> <?php echo number_format($summary->total_voters); ?>
                        </p>
                        <hr style="margin: 15px 0;">
                        <div class="row">
                            <div class="col-xs-6">
                                <div style="text-align: center;">
                                    <i class="fa fa-male" style="font-size: 28px; color: var(--primary-green);"></i>
                                    <h4 style="margin: 5px 0 0; font-size: 22px; font-weight: 700;"><?php echo number_format($gender_breakdown->male_voters); ?></h4>
                                    <span style="font-size: 11px;">Dhiirii (% <?php echo $summary->total_voters > 0 ? round(($gender_breakdown->male_voters / $summary->total_voters) * 100, 1) : 0; ?>)</span>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div style="text-align: center;">
                                    <i class="fa fa-female" style="font-size: 28px; color: var(--gold);"></i>
                                    <h4 style="margin: 5px 0 0; font-size: 22px; font-weight: 700;"><?php echo number_format($gender_breakdown->female_voters); ?></h4>
                                    <span style="font-size: 11px;">Dubartii (% <?php echo $summary->total_voters > 0 ? round(($gender_breakdown->female_voters / $summary->total_voters) * 100, 1) : 0; ?>)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="row animate-slide" style="animation-delay: 0.25s;">
            <div class="col-xs-12 text-right" style="margin-top: 10px; margin-bottom: 30px;">
                <a href="<?php echo base_url('AdminElection/partyReports'); ?>" class="btn-modern btn-primary">
                    <i class="fa fa-list"></i> Gabaasa Paartii Ilaali
                </a>
                <a href="<?php echo base_url('AdminElection/regionReports'); ?>" class="btn-modern btn-teal" style="margin-left: 10px;">
                    <i class="fa fa-map-marker"></i> Gabaasa Naannoo Ilaali
                </a>
            </div>
        </div>
        
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Prepare party data for pie chart
        const partyBreakdown = <?php echo json_encode($party_breakdown); ?>;
        if (partyBreakdown && partyBreakdown.length > 0) {
            const partyNames = partyBreakdown.map(p => p.party_name);
            const partyVoters = partyBreakdown.map(p => parseInt(p.total_voters) || 0);
            const totalVoters = partyVoters.reduce((a, b) => a + b, 0);
            
            const colorPalette = ['#2c5f2d', '#1e7e8c', '#e6a017', '#b13e3e', '#5d3a1a', '#4f7a4b', '#d98c2b', '#3a6b4b'];
            const backgroundColors = partyNames.map((_, idx) => colorPalette[idx % colorPalette.length]);
            
            const ctx = document.getElementById('partyPieChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: partyNames,
                    datasets: [{
                        data: partyVoters,
                        backgroundColor: backgroundColors,
                        borderWidth: 2,
                        borderColor: '#ffffff',
                        hoverOffset: 10,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: { position: 'bottom', labels: { boxWidth: 12, font: { size: 10 } } },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    let value = context.raw;
                                    let percentage = totalVoters > 0 ? ((value / totalVoters) * 100).toFixed(1) : 0;
                                    return `${label}: ${value.toLocaleString()} voters (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });
            
            // Build custom legend
            const legendContainer = document.getElementById('partyLegend');
            if (legendContainer) {
                legendContainer.innerHTML = '';
                partyNames.forEach((name, idx) => {
                    const percent = totalVoters > 0 ? ((partyVoters[idx] / totalVoters) * 100).toFixed(1) : 0;
                    const color = backgroundColors[idx];
                    legendContainer.innerHTML += `<div style="display: inline-block; width: 48%; margin-bottom: 5px;"><span style="display:inline-block; width:12px; height:12px; background:${color}; border-radius:2px; margin-right:6px;"></span> ${name}: <strong>${percent}%</strong></div>`;
                });
            }
        }
    });

    function exportPartyData() {
        var rows = [];
        rows.push(['#', 'Maqaa Paartii', 'Gabaasa', 'Dhiirii', 'Dubartii', 'Waliigala', 'Qooda %']);
        
        <?php 
        $rank = 1;
        $totalExport = 0;
        foreach($party_breakdown as $party) { $totalExport += $party->total_voters; }
        foreach($party_breakdown as $party): 
            $percentage = $totalExport > 0 ? round(($party->total_voters / $totalExport) * 100, 1) : 0;
        ?>
            rows.push([
                <?php echo $rank++; ?>,
                '<?php echo addslashes($party->party_name); ?>',
                <?php echo $party->report_count; ?>,
                <?php echo $party->total_male_voters; ?>,
                <?php echo $party->total_female_voters; ?>,
                <?php echo $party->total_voters; ?>,
                '<?php echo $percentage; ?>%'
            ]);
        <?php endforeach; ?>
        
        var csvContent = rows.map(row => row.join(',')).join('\n');
        var blob = new Blob(["\uFEFF" + csvContent], { type: 'text/csv;charset=utf-8;' });
        var link = document.createElement('a');
        var url = URL.createObjectURL(blob);
        link.href = url;
        link.setAttribute('download', 'qabxiilee_paartii_' + new Date().toISOString().slice(0,19) + '.csv');
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        URL.revokeObjectURL(url);
    }
</script>