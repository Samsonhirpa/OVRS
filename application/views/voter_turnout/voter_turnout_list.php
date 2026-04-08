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

        .stat-label {
            font-size: 12px;
            color: #6c757d;
            margin: 0;
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
            text-decoration: none;
        }

        .btn-primary { background: var(--primary-green); color: white; }
        .btn-primary:hover { background: var(--primary-dark); }
        .btn-teal { background: var(--teal); color: white; }
        .btn-teal:hover { background: #146b78; }

        .form-control {
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            width: 100%;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }
        .col-md-3 { flex: 1; min-width: 180px; }
        .col-md-12 { width: 100%; }
        .col-xs-6 { flex: 1; min-width: 150px; }
        .text-center { text-align: center; }
        .text-right { text-align: right; }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-slide { animation: slideUp 0.4s ease forwards; }
    </style>

    <div class="dashboard-header animate-slide">
        <h1>
            <i class="fa fa-list-alt"></i>
            Gabaasawwan Baayyina Filattoota
            <small style="font-size: 13px; color: #6c757d; margin-left: 8px; font-weight: normal;"><?php echo $voting_region_name; ?></small>
        </h1>
        <div class="breadcrumb-modern" style="margin-top: 8px;">
            <a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Manii</a>
            <span style="margin: 0 5px; color: #999;">›</span>
            <a href="<?php echo base_url('VoterTurnout/dashboard'); ?>">Daashboordii</a>
            <span style="margin: 0 5px; color: #999;">›</span>
            <span style="color: #999;">Gabaasawwan</span>
        </div>
    </div>

    <section class="content" style="padding: 0 15px 15px 15px;">
        
        <div class="filter-card animate-slide" style="animation-delay: 0.05s;">
            <form method="get" action="<?php echo base_url('VoterTurnout/listReports'); ?>">
                <div class="row">
                    <div class="col-md-3">
                        <label style="font-weight: 600; font-size: 12px;">Guyyaa Jalqabaa:</label>
                        <input type="date" name="start_date" class="form-control" value="<?php echo $start_date; ?>">
                    </div>
                    <div class="col-md-3">
                        <label style="font-weight: 600; font-size: 12px;">Guyyaa Xumuraa:</label>
                        <input type="date" name="end_date" class="form-control" value="<?php echo $end_date; ?>">
                    </div>
                    <div class="col-md-3">
                        <label style="font-weight: 600; font-size: 12px;">Haala Naannoo:</label>
                        <select name="status_level" class="form-control">
                            <option value="all" <?php echo $selected_status == 'all' ? 'selected' : ''; ?>>Hunda</option>
                            <option value="green" <?php echo $selected_status == 'green' ? 'selected' : ''; ?>>Green (Nagaa)</option>
                            <option value="yellow" <?php echo $selected_status == 'yellow' ? 'selected' : ''; ?>>Yellow (Rakkina xixiqqoo)</option>
                            <option value="red" <?php echo $selected_status == 'red' ? 'selected' : ''; ?>>Red (Rakkina guddaa)</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label style="font-weight: 600; font-size: 12px;">&nbsp;</label>
                        <div>
                            <button type="submit" class="btn-modern btn-primary"><i class="fa fa-search"></i> Calleessii</button>
                            <a href="<?php echo base_url('VoterTurnout/listReports'); ?>" class="btn-modern btn-teal"><i class="fa fa-refresh"></i> Haari</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Summary Stats Cards -->
        <div class="row animate-slide" style="animation-delay: 0.1s;">
            <div class="col-md-3">
                <div class="stat-card primary">
                    <div class="stat-icon"><i class="fa fa-file-text-o"></i></div>
                    <div class="stat-value"><?php echo number_format($summary->total_reports ?? 0); ?></div>
                    <p class="stat-label">Waliigala Gabaasa</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card teal">
                    <div class="stat-icon"><i class="fa fa-mars"></i></div>
                    <div class="stat-value"><?php echo number_format($summary->total_male_voters ?? 0); ?></div>
                    <p class="stat-label">Waliigala Dhiiraa</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card gold">
                    <div class="stat-icon"><i class="fa fa-venus"></i></div>
                    <div class="stat-value"><?php echo number_format($summary->total_female_voters ?? 0); ?></div>
                    <p class="stat-label">Waliigala Dubartii</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card red">
                    <div class="stat-icon"><i class="fa fa-users"></i></div>
                    <div class="stat-value"><?php echo number_format($summary->total_voters ?? 0); ?></div>
                    <p class="stat-label">Waliigala Filattoota</p>
                </div>
            </div>
        </div>

        <!-- Reports Table -->
        <div class="modern-card animate-slide" style="animation-delay: 0.15s;">
            <div class="card-header">
                <h3><i class="fa fa-list"></i> Gabaasawwan Galmaa'an</h3>
                <div>
                    <button class="btn-modern btn-primary" onclick="window.print()"><i class="fa fa-print"></i> Maxxansi</button>
                    <button class="btn-modern btn-teal" onclick="exportToCSV()"><i class="fa fa-download"></i> CSV</button>
                </div>
            </div>
            <div class="card-body">
                <?php if(empty($reports)): ?>
                    <div style="text-align: center; padding: 60px 20px;">
                        <i class="fa fa-inbox" style="font-size: 64px; color: #cbd5e0;"></i>
                        <p style="margin-top: 15px; color: #718096;">Gabaasi baayyina filattoota hin jiru!</p>
                        <a href="<?php echo base_url('VoterTurnout/register'); ?>" class="btn-modern btn-primary" style="margin-top: 10px;">
                            <i class="fa fa-plus-circle"></i> Haaraa Galmeessi
                        </a>
                    </div>
                <?php else: ?>
                    <table class="table-modern" id="reportsTable">
                        <thead>
                            <tr>
                                <th style="width: 5%; text-align: center;">#</th>
                                <th style="width: 12%;">Guyyaa</th>
                                <th style="width: 10%; text-align: center;">Yeroo</th>
                                <th style="width: 10%; text-align: center;">Lakk.Tarree</th>
                                <th style="width: 10%; text-align: center;">Dhiirii</th>
                                <th style="width: 10%; text-align: center;">Dubartii</th>
                                <th style="width: 10%; text-align: center;">Waliigala</th>
                                <th style="width: 15%; text-align: center;">Haala Naannoo</th>
                                <th style="width: 8%; text-align: center;">Gocha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1; foreach($reports as $report): 
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
                                $reportTime = strtotime($report->created_at);
                                $can_edit = ((time() - $reportTime) / 3600) <= 1;
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $counter++; ?></td>
                                <td><?php echo date('d/m/Y', strtotime($report->report_date)); ?></td>
                                <td class="text-center"><?php echo date('H:i', strtotime($report->report_time)); ?> <small>(<?php echo $report->report_session; ?>)</small></td>
                                <td class="text-center">#<?php echo str_pad($report->serial_number, 4, '0', STR_PAD_LEFT); ?></td>
                                <td class="text-center"><strong style="color: #2c5f2d;"><?php echo number_format($report->male_voters); ?></strong></td>
                                <td class="text-center"><strong style="color: #e6a017;"><?php echo number_format($report->female_voters); ?></strong></td>
                                <td class="text-center"><span class="badge-modern"><?php echo number_format($report->total_voters); ?></span></td>
                                <td class="text-center">
                                    <span class="<?php echo $statusClass; ?>">
                                        <i class="fa <?php echo $statusIcon; ?>"></i> <?php echo strtoupper($report->status_level); ?>
                                    </span>
                                    <?php if($report->status_reason): ?>
                                        <br><small style="color: #999;" title="<?php echo htmlspecialchars($report->status_reason); ?>">
                                            <?php echo substr($report->status_reason, 0, 30); ?>
                                        </small>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <div style="display: flex; gap: 5px; justify-content: center;">
                                        <a href="<?php echo base_url('VoterTurnout/viewReport/'.$report->id); ?>" class="btn btn-sm" style="background: #17a2b8; color: white; border-radius: 6px; padding: 5px 10px;" title="Ilaalchuu">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <?php if($can_edit): ?>
                                            <a href="<?php echo base_url('VoterTurnout/editReport/'.$report->id); ?>" class="btn btn-sm" style="background: #e6a017; color: white; border-radius: 6px; padding: 5px 10px;" title="Fooyyessuu">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="<?php echo base_url('VoterTurnout/deleteReport/'.$report->id); ?>" class="btn btn-sm" style="background: #dc3545; color: white; border-radius: 6px; padding: 5px 10px;" onclick="return confirm('Gabaasa kana haquu barbaaddaa?')" title="Haquu">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr style="background: #f8f9fc; font-weight: 700;">
                                <td colspan="4" class="text-right"><strong>WALIIGALA:</strong></td>
                                <td class="text-center"><strong><?php echo number_format($summary->total_male_voters ?? 0); ?></strong></td>
                                <td class="text-center"><strong><?php echo number_format($summary->total_female_voters ?? 0); ?></strong></td>
                                <td class="text-center"><strong><?php echo number_format($summary->total_voters ?? 0); ?></strong></td>
                                <td colspan="2"></td>
                            </tr>
                        </tfoot>
                    </table>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="row animate-slide" style="animation-delay: 0.2s; margin-bottom: 30px;">
            <div class="col-md-12 text-right">
                <a href="<?php echo base_url('VoterTurnout/register'); ?>" class="btn-modern btn-primary">
                    <i class="fa fa-plus-circle"></i> Gabaasa Haaraa Galmeessi
                </a>
                <a href="<?php echo base_url('VoterTurnout/dashboard'); ?>" class="btn-modern btn-teal" style="margin-left: 10px;">
                    <i class="fa fa-dashboard"></i> Daashboordiitti Deebi'i
                </a>
            </div>
        </div>
        
    </section>
</div>

<script>
    function exportToCSV() {
        var rows = [];
        rows.push(['#', 'Guyyaa', 'Yeroo', 'Lakk.Tarree', 'Dhiirii', 'Dubartii', 'Waliigala', 'Haala Naannoo', 'Sababa']);
        
        <?php if(!empty($reports)): ?>
            <?php $exportCounter = 1; foreach($reports as $report): ?>
                rows.push([
                    <?php echo $exportCounter++; ?>,
                    '<?php echo date('Y-m-d', strtotime($report->report_date)); ?>',
                    '<?php echo $report->report_time . ' (' . $report->report_session . ')'; ?>',
                    '#<?php echo str_pad($report->serial_number, 4, '0', STR_PAD_LEFT); ?>',
                    <?php echo $report->male_voters; ?>,
                    <?php echo $report->female_voters; ?>,
                    <?php echo $report->total_voters; ?>,
                    '<?php echo strtoupper($report->status_level); ?>',
                    '<?php echo addslashes($report->status_reason); ?>'
                ]);
            <?php endforeach; ?>
        <?php endif; ?>
        
        var csvContent = rows.map(row => row.join(',')).join('\n');
        var blob = new Blob(["\uFEFF" + csvContent], { type: 'text/csv;charset=utf-8;' });
        var link = document.createElement('a');
        var url = URL.createObjectURL(blob);
        link.href = url;
        link.setAttribute('download', 'gabaasawwan_baayyina_filattoota_' + new Date().toISOString().slice(0,19) + '.csv');
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        URL.revokeObjectURL(url);
    }
</script>