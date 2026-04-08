<div class="content-wrapper" style="background: #f0f2f5;">
    <style>
        .dashboard-header { background: white; padding: 20px 25px; margin-bottom: 20px; border-radius: 12px; border-bottom: 3px solid #2c5f2d; }
        .dashboard-header h1 { font-size: 22px; margin: 0; color: #1e3c2c; display: flex; align-items: center; gap: 12px; }
        .stat-card { background: white; border-radius: 16px; padding: 20px; text-align: center; box-shadow: 0 2px 4px rgba(0,0,0,0.04); transition: transform 0.2s; }
        .stat-card:hover { transform: translateY(-3px); }
        .badge-green { background: #28a745; color: white; padding: 4px 12px; border-radius: 20px; font-size: 12px; }
        .badge-yellow { background: #ffc107; color: #333; padding: 4px 12px; border-radius: 20px; font-size: 12px; }
        .badge-red { background: #dc3545; color: white; padding: 4px 12px; border-radius: 20px; font-size: 12px; }
        .btn-modern { border-radius: 30px; padding: 8px 20px; font-size: 12px; border: none; cursor: pointer; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; }
        .btn-teal { background: #1e7e8c; color: white; }
        .btn-primary { background: #2c5f2d; color: white; }
        .btn-primary:hover { background: #1e4220; }
        .btn-teal:hover { background: #146b78; }
        .table-modern { width: 100%; border-collapse: collapse; }
        .table-modern th { background: #2c5f2d; color: white; padding: 12px; text-align: left; }
        .table-modern td { padding: 10px; border-bottom: 1px solid #e9ecef; }
        .table-modern tr:hover { background: #f8f9fc; }
        .summary-row { display: flex; gap: 20px; margin-bottom: 20px; flex-wrap: wrap; }
        .summary-card { flex: 1; background: white; border-radius: 16px; padding: 20px; text-align: center; min-width: 150px; box-shadow: 0 2px 4px rgba(0,0,0,0.04); }
        .summary-card h4 { margin: 0 0 10px 0; color: #6c757d; font-size: 13px; }
        .summary-card h2 { margin: 0; font-size: 28px; font-weight: 700; color: #333; }
        .filter-form { background: white; padding: 15px 20px; border-radius: 12px; margin-bottom: 20px; }
        .filter-row { display: flex; flex-wrap: wrap; gap: 15px; align-items: flex-end; }
        .filter-item { flex: 1; min-width: 160px; }
        .filter-actions { flex: 0.5; min-width: 140px; }
        .form-control { padding: 8px 12px; border-radius: 8px; border: 1px solid #ccc; width: 100%; }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .modern-card { background: white; border-radius: 16px; margin-bottom: 25px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.04); }
        .card-header { padding: 15px 20px; background: white; border-bottom: 1px solid #e9ecef; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; }
        .card-header h3 { margin: 0; font-size: 16px; font-weight: 700; color: #1e3c2c; display: flex; align-items: center; gap: 8px; }
        .btn-sm { padding: 5px 10px; font-size: 11px; border-radius: 6px; text-decoration: none; display: inline-flex; align-items: center; gap: 4px; }
        .status-badge { display: inline-block; padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: 600; }
        .status-green { background: #28a745; color: white; }
        .status-yellow { background: #ffc107; color: #333; }
        .status-red { background: #dc3545; color: white; }
    </style>

    <div class="dashboard-header">
        <h1>
            <i class="fa fa-map-marker"></i> 
            Naannoo Filannoo Detail - <?php echo $constituency_name; ?>
        </h1>
        <div class="breadcrumb-modern" style="margin-top: 8px;">
            <a href="<?php echo base_url(); ?>dashboard" style="color: #2c5f2d;">Manii</a>
            <span style="margin: 0 5px; color: #999;">›</span>
            <a href="<?php echo base_url('VoterTurnout/adminDashboard'); ?>" style="color: #2c5f2d;">Daashboordii</a>
            <span style="margin: 0 5px; color: #999;">›</span>
            <a href="<?php echo base_url('VoterTurnout/adminListReports'); ?>" style="color: #2c5f2d;">Gabaasawwan</a>
            <span style="margin: 0 5px; color: #999;">›</span>
            <span style="color: #999;">Detail</span>
        </div>
    </div>

    <section class="content" style="padding: 20px;">
        
        <!-- Date Filter Form -->
        <div class="filter-form">
            <form method="get" action="<?php echo base_url('VoterTurnout/adminConstituencyDetail/'.$constituency_name); ?>">
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
                            <a href="<?php echo base_url('VoterTurnout/adminConstituencyDetail/'.$constituency_name); ?>" class="btn-modern btn-teal"><i class="fa fa-refresh"></i> Haari</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Current Security Status Card (Most Recent) -->
        <div class="modern-card">
            <div class="card-header">
                <h3><i class="fa fa-flag-checkered"></i> Haala Naannoo Ammaa (Current District Status)</h3>
                <span class="status-badge status-<?php echo $latest_status->status_level ?? 'green'; ?>">
                    <?php echo strtoupper($latest_status->status_level ?? 'GREEN'); ?>
                </span>
            </div>
            <div class="card-body" style="padding: 20px;">
                <div class="summary-row">
                    <div class="summary-card">
                        <h4>Guyyaa Darbee</h4>
                        <h2><?php echo $latest_status->report_date ? date('d/m/Y', strtotime($latest_status->report_date)) : 'N/A'; ?></h2>
                    </div>
                    <div class="summary-card">
                        <h4>Yeroo Galmaa'uu</h4>
                        <h2><?php echo $latest_status->created_at ? date('H:i:s', strtotime($latest_status->created_at)) : 'N/A'; ?></h2>
                    </div>
                    <div class="summary-card">
                        <h4>Sababa (Reason)</h4>
                        <p><?php echo $latest_status->status_reason ?: 'Sababiin hin jiru'; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Summary Statistics Cards -->
        <div class="summary-row">
            <div class="summary-card">
                <h4><i class="fa fa-calendar"></i> Waliigala Gabaasa (<?php echo date('d/m/Y', strtotime($start_date)); ?> - <?php echo date('d/m/Y', strtotime($end_date)); ?>)</h4>
                <h2><?php echo number_format($summary->total_reports ?? 0); ?></h2>
                <small>Gabaasa galmaa'an</small>
            </div>
            <div class="summary-card">
                <h4><i class="fa fa-mars"></i> Waliigala Dhiiraa</h4>
                <h2><?php echo number_format($summary->male_voters ?? 0); ?></h2>
                <small>Filattoota Dhiiraa</small>
            </div>
            <div class="summary-card">
                <h4><i class="fa fa-venus"></i> Waliigala Dubartii</h4>
                <h2><?php echo number_format($summary->female_voters ?? 0); ?></h2>
                <small>Filattoota Dubartii</small>
            </div>
            <div class="summary-card">
                <h4><i class="fa fa-users"></i> Waliigala Filattoota</h4>
                <h2><?php echo number_format($summary->total_voters ?? 0); ?></h2>
                <small>Waliigala Filattoota</small>
            </div>
        </div>

        <!-- All Time Statistics -->
        <div class="modern-card">
            <div class="card-header">
                <h3><i class="fa fa-history"></i> Waliigala Gabaasa Hunda (All Time Statistics)</h3>
            </div>
            <div class="card-body" style="padding: 20px;">
                <div class="summary-row">
                    <div class="summary-card">
                        <h4>Waliigala Gabaasa</h4>
                        <h2><?php echo number_format($all_time_summary->total_reports ?? 0); ?></h2>
                    </div>
                    <div class="summary-card">
                        <h4>Waliigala Dhiiraa</h4>
                        <h2><?php echo number_format($all_time_summary->male_voters ?? 0); ?></h2>
                    </div>
                    <div class="summary-card">
                        <h4>Waliigala Dubartii</h4>
                        <h2><?php echo number_format($all_time_summary->female_voters ?? 0); ?></h2>
                    </div>
                    <div class="summary-card">
                        <h4>Waliigala Filattoota</h4>
                        <h2><?php echo number_format($all_time_summary->total_voters ?? 0); ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gender Breakdown Chart -->
        <div class="modern-card">
            <div class="card-header">
                <h3><i class="fa fa-pie-chart"></i> Cita Saalaa (Gender Breakdown)</h3>
            </div>
            <div class="card-body" style="padding: 20px;">
                <?php 
                    $totalMale = $gender_stats->male_voters ?? 0;
                    $totalFemale = $gender_stats->female_voters ?? 0;
                    $totalBoth = $totalMale + $totalFemale;
                    $malePercent = $totalBoth > 0 ? round(($totalMale / $totalBoth) * 100, 1) : 0;
                    $femalePercent = $totalBoth > 0 ? round(($totalFemale / $totalBoth) * 100, 1) : 0;
                ?>
                <div style="height: 40px; border-radius: 30px; overflow: hidden; margin: 10px 0; display: flex;">
                    <div style="background: #2c5f2d; width: <?php echo $malePercent; ?>%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600;">
                        Dhiirii <?php echo number_format($totalMale); ?> (<?php echo $malePercent; ?>%)
                    </div>
                    <div style="background: #e6a017; width: <?php echo $femalePercent; ?>%; display: flex; align-items: center; justify-content: center; color: #333; font-weight: 600;">
                        Dubartii <?php echo number_format($totalFemale); ?> (<?php echo $femalePercent; ?>%)
                    </div>
                </div>
                <div class="text-center" style="margin-top: 15px;">
                    <p><strong>Waliigala Filattoota Hunda:</strong> <?php echo number_format($totalBoth); ?></p>
                </div>
            </div>
        </div>

        <!-- Reports Table (Filtered by Date) -->
        <div class="modern-card">
            <div class="card-header">
                <h3><i class="fa fa-list"></i> Gabaasawwan Galmaa'an (<?php echo date('d/m/Y', strtotime($start_date)); ?> - <?php echo date('d/m/Y', strtotime($end_date)); ?>)</h3>
                <div>
                    <button class="btn-modern btn-primary" onclick="window.print()" style="background:#17a2b8;"><i class="fa fa-print"></i> Maxxansi</button>
                    <button class="btn-modern btn-teal" onclick="exportToCSV()"><i class="fa fa-download"></i> CSV</button>
                </div>
            </div>
            <div class="card-body" style="padding: 20px; overflow-x: auto;">
                <table class="table-modern" id="reportsTable">
                    <thead>
                        <tr>
                            <th style="width:5%;">#</th>
                            <th style="width:12%;">Guyyaa</th>
                            <th style="width:10%;">Yeroo</th>
                            <th style="width:10%;">Lakk.Tarree</th>
                            <th style="width:10%;">Dhiirii</th>
                            <th style="width:10%;">Dubartii</th>
                            <th style="width:10%;">Waliigala</th>
                            <th style="width:15%;">Haala Naannoo</th>
                            <th style="width:8%;">Gocha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($reports as $r): 
                            $statusClass = '';
                            if($r->status_level == 'green') $statusClass = 'badge-green';
                            elseif($r->status_level == 'yellow') $statusClass = 'badge-yellow';
                            else $statusClass = 'badge-red';
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($r->report_date)); ?></td>
                            <td class="text-center"><?php echo $r->report_time; ?> <small>(<?php echo $r->report_session; ?>)</small></td>
                            <td class="text-center">#<?php echo str_pad($r->serial_number, 4, '0', STR_PAD_LEFT); ?></td>
                            <td class="text-center"><strong style="color: #2c5f2d;"><?php echo number_format($r->male_voters); ?></strong></td>
                            <td class="text-center"><strong style="color: #e6a017;"><?php echo number_format($r->female_voters); ?></strong></td>
                            <td class="text-center"><span class="badge-modern" style="background:#2c5f2d; color:white; padding:4px 12px; border-radius:20px;"><?php echo number_format($r->total_voters); ?></span></td>
                            <td class="text-center">
                                <span class="<?php echo $statusClass; ?>">
                                    <?php echo strtoupper($r->status_level); ?>
                                </span>
                                <?php if($r->status_reason): ?>
                                    <br><small style="color:#999;"><?php echo substr($r->status_reason, 0, 40); ?></small>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <a href="<?php echo base_url('VoterTurnout/viewReport/'.$r->id); ?>" class="btn-sm" style="background:#17a2b8; color:white; padding:5px 10px; border-radius:6px; text-decoration:none;">
                                    <i class="fa fa-eye"></i> Ilaali
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php if(empty($reports)): ?>
                            <tr><td colspan="9" class="text-center" style="padding:40px;">Gabaasi hin jiru! Gabaasa haaraa galmeessaa.<?php echo " " . $constituency_name; ?></td></tr>
                        <?php endif; ?>
                    </tbody>
                    <tfoot style="background:#f8f9fc; font-weight:700;">
                        <tr>
                            <td colspan="4" class="text-right"><strong>WALIIGALA:</strong></td>
                            <td class="text-center"><strong><?php echo number_format(array_sum(array_column($reports, 'male_voters'))); ?></strong></td>
                            <td class="text-center"><strong><?php echo number_format(array_sum(array_column($reports, 'female_voters'))); ?></strong></td>
                            <td class="text-center"><strong><?php echo number_format(array_sum(array_column($reports, 'total_voters'))); ?></strong></td>
                            <td colspan="2"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        
        <!-- Navigation Buttons -->
        <div style="margin-top: 20px; display: flex; gap: 10px; justify-content: space-between;">
            <a href="<?php echo base_url('VoterTurnout/adminListReports'); ?>" class="btn-modern btn-teal">
                <i class="fa fa-arrow-left"></i> Duuba Deebi'i (Gabaasawwan Hunda)
            </a>
            <div>
                <a href="<?php echo base_url('VoterTurnout/adminDashboard'); ?>" class="btn-modern btn-primary">
                    <i class="fa fa-dashboard"></i> Daashboordii
                </a>
                <a href="<?php echo base_url('VoterTurnout/register'); ?>" class="btn-modern btn-primary" style="background:#28a745;">
                    <i class="fa fa-plus-circle"></i> Gabaasa Haaraa
                </a>
            </div>
        </div>
        
    </section>
</div>

<script>
function exportToCSV() {
    var rows = [];
    rows.push(['#', 'Guyyaa', 'Yeroo', 'Lakk.Tarree', 'Dhiirii', 'Dubartii', 'Waliigala', 'Haala Naannoo', 'Sababa', 'Gabaasaa']);
    
    <?php foreach($reports as $index => $r): ?>
        rows.push([
            <?php echo $index + 1; ?>,
            '<?php echo date('Y-m-d', strtotime($r->report_date)); ?>',
            '<?php echo $r->report_time . ' (' . $r->report_session . ')'; ?>',
            '#<?php echo str_pad($r->serial_number, 4, '0', STR_PAD_LEFT); ?>',
            <?php echo $r->male_voters; ?>,
            <?php echo $r->female_voters; ?>,
            <?php echo $r->total_voters; ?>,
            '<?php echo strtoupper($r->status_level); ?>',
            '<?php echo addslashes($r->status_reason); ?>',
            '<?php echo addslashes($r->reporter_name); ?>'
        ]);
    <?php endforeach; ?>
    
    var csvContent = rows.map(row => row.join(',')).join('\n');
    var blob = new Blob(["\uFEFF" + csvContent], { type: 'text/csv;charset=utf-8;' });
    var link = document.createElement('a');
    var url = URL.createObjectURL(blob);
    link.href = url;
    link.setAttribute('download', 'naannoo_filannoo_<?php echo $constituency_name; ?>_' + new Date().toISOString().slice(0,19) + '.csv');
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    URL.revokeObjectURL(url);
}
</script>