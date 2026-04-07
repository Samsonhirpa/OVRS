<div class="content-wrapper" style="background: #f0f2f5;">
    <style>
        :root {
            --brand: #3c8dbc;
            --brand-dark: #367fa9;
            --brand-light: #6eb3d4;
            --success: #00a65a;
            --danger: #dd4b39;
            --warning: #f39c12;
            --info: #17a2b8;
        
            --gray: #f5f5f5;
            --dark: #2c3e50;
            --border: #e9ecef;
           
            --shadow-lg: 0 8px 24px rgba(0,0,0,0.1);
            --primary-green: #2c5f2d;
            --primary-dark: #1e4220;
            --teal: #1e7e8c;
            --gold: #e6a017;
            --red: #b13e3e;
            --gray-light: #f8f9fc;
         
            --shadow-sm: 0 2px 4px rgba(0,0,0,0.04);
            --shadow-md: 0 4px 12px rgba(0,0,0,0.06);
        }

        /* Animated Header */
        .animated-header {
            background: linear-gradient(120deg, #ffffff 0%, #f8f9fa 100%);
            padding: 20px 25px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: var(--shadow-sm);
            border-bottom: 3px solid var(--brand);
            position: relative;
            overflow: hidden;
        }

        .animated-header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 200px;
            height: 100%;
            background: linear-gradient(135deg, transparent 0%, rgba(60,141,188,0.03) 100%);
            pointer-events: none;
        }

        .animated-header h1 {
            font-size: 22px;
            margin: 0;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .animated-header h1 i {
            color: var(--brand);
            font-size: 28px;
        }

        .breadcrumb-modern {
            margin-top: 8px;
            padding: 0;
            background: none;
            font-size: 12px;
        }

        .breadcrumb-modern a {
            color: var(--brand);
            text-decoration: none;
        }

        .breadcrumb-modern a:hover {
            text-decoration: underline;
        }

        /* Filter Card */
        .filter-card {
            background: white;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            margin-bottom: 25px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .filter-card:hover {
            box-shadow: var(--shadow-md);
        }

        .filter-card-header {
            background: var(--gray-light);
            padding: 14px 20px;
            border-bottom: 1px solid var(--border);
        }

        .filter-card-header h3 {
            margin: 0;
            font-size: 15px;
            font-weight: 600;
            color: var(--dark);
        }

        .filter-card-header h3 i {
            color: var(--brand);
            margin-right: 8px;
        }

        .filter-card-body {
            padding: 20px;
        }

        /* Form Controls */
        .input-modern {
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 8px 12px;
            font-size: 13px;
            width: 100%;
            transition: all 0.2s ease;
            background: white;
        }

        .input-modern:focus {
            border-color: var(--brand);
            outline: none;
            box-shadow: 0 0 0 3px rgba(60,141,188,0.1);
        }

        label {
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 6px;
            display: block;
            color: var(--dark);
        }

        /* Modern Buttons */
        .btn-modern {
            border-radius: 8px;
            padding: 8px 16px;
            font-size: 12px;
            font-weight: 500;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-modern i {
            font-size: 12px;
        }

        .btn-primary {
            background: var(--brand);
            color: white;
        }

        .btn-primary:hover {
            background: var(--brand-dark);
            transform: translateY(-1px);
        }

        .btn-default {
            background: #e9ecef;
            color: #495057;
        }

        .btn-default:hover {
            background: #dee2e6;
            transform: translateY(-1px);
        }

        .btn-success {
            background: var(--success);
            color: white;
        }

        .btn-success:hover {
            background: #008d4c;
            transform: translateY(-1px);
        }

        .btn-danger {
            background: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background: #c23321;
            transform: translateY(-1px);
        }

        .btn-warning {
            background: var(--warning);
            color: white;
        }

        .btn-warning:hover {
            background: #db8b0b;
            transform: translateY(-1px);
        }

        /* Stats Card */
        .stats-card {
            background: white;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            margin-bottom: 25px;
            overflow: hidden;
        }

        .stats-card-header {
            background: linear-gradient(135deg, var(--brand) 0%, var(--brand-dark) 100%);
            padding: 14px 20px;
            color: white;
        }

        .stats-card-header h3 {
            margin: 0;
            font-size: 15px;
            font-weight: 600;
        }

        .stats-card-header h3 i {
            margin-right: 8px;
        }

        .stats-card-body {
            padding: 20px;
        }

        /* Modern Table */
        .table-modern {
            width: 100%;
            border-collapse: collapse;
        }

        .table-modern thead th {
            background: var(--gray-light);
            color: var(--dark);
            padding: 12px 10px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid var(--brand);
        }

        .table-modern tbody tr {
            border-bottom: 1px solid var(--border);
            transition: all 0.2s ease;
        }

        .table-modern tbody tr:hover {
            background: var(--gray-light);
            transform: scale(1.01);
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
        .progress-wrapper {
            min-width: 100px;
        }

        .progress-modern {
            height: 6px;
            background: #e9ecef;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 5px;
        }

        .progress-bar-modern {
            background: var(--brand);
            height: 100%;
            border-radius: 10px;
            transition: width 0.5s ease;
            position: relative;
        }

        /* Trophy Icons */
        .trophy-gold { color: #ffd700; text-shadow: 0 0 3px rgba(255,215,0,0.5); }
        .trophy-silver { color: #c0c0c0; }
        .trophy-bronze { color: #cd7f32; }

        /* Rank Badge */
        .rank-badge {
            display: inline-block;
            width: 24px;
            height: 24px;
            line-height: 24px;
            text-align: center;
            background: var(--gray-light);
            border-radius: 50%;
            font-weight: 700;
            font-size: 11px;
        }

        /* Party Name */
        .party-name {
            font-weight: 700;
            color: var(--dark);
        }

        /* Label */
        .label-modern {
            padding: 3px 8px;
            border-radius: 20px;
            font-size: 9px;
            font-weight: 600;
            margin-left: 6px;
        }

        .label-zone { background: var(--brand); color: white; }
        .label-magalaa { background: var(--info); color: white; }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 50px;
            color: #adb5bd;
        }

        .empty-state i {
            font-size: 48px;
            margin-bottom: 15px;
        }

        /* Toolbar */
        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 15px;
        }

        /* Animations */
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slide {
            animation: slideInUp 0.4s ease forwards;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .animated-header h1 { font-size: 18px; }
            .filter-card-body { padding: 15px; }
            .table-modern thead th, .table-modern tbody td { padding: 8px 5px; font-size: 10px; }
            .btn-modern { padding: 6px 12px; font-size: 11px; }
            .toolbar { flex-direction: column; align-items: stretch; }
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--brand);
            border-radius: 10px;
        }
    </style>

    <!-- Animated Header -->
    <div class="animated-header animate-slide">
        <h1>
            <i class="fa fa-flag-checkered"></i>
            Gabaasa Paartii
        </h1>
        <div class="breadcrumb-modern">
            <a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Manii</a>
            <span style="margin: 0 5px; color: #999;">›</span>
            <a href="<?php echo base_url('AdminElection/dashboard'); ?>">Daashboordii Filannoo</a>
            <span style="margin: 0 5px; color: #999;">›</span>
            <span style="color: #999;">Gabaasa Paartii</span>
        </div>
    </div>

    <section class="content" style="padding: 0 15px 15px 15px;">
        
        <!-- Filter Card -->
        <div class="filter-card animate-slide" style="animation-delay: 0.05s;">
            <div class="filter-card-header">
                <h3><i class="fa fa-sliders-h"></i> Gabaasa Baay'ee</h3>
            </div>
            <div class="filter-card-body">
                <form method="get" id="filterForm">
                    <div class="row">
                        <div class="col-md-2 col-sm-6" style="margin-bottom: 12px;">
                            <label><i class="fa fa-calendar"></i> Guyyaa Jalqabaa</label>
                            <input type="date" name="start_date" class="input-modern" value="<?php echo $start_date; ?>">
                        </div>
                        <div class="col-md-2 col-sm-6" style="margin-bottom: 12px;">
                            <label><i class="fa fa-calendar-check-o"></i> Guyyaa Dhumaa</label>
                            <input type="date" name="end_date" class="input-modern" value="<?php echo $end_date; ?>">
                        </div>
                        <div class="col-md-2 col-sm-6" style="margin-bottom: 12px;">
                            <label><i class="fa fa-flag"></i> Paartii</label>
                            <select name="party" class="input-modern">
                                <option value="all">Paartii Hunda</option>
                                <?php foreach($parties as $party): ?>
                                    <option value="<?php echo $party->party_name; ?>" <?php echo $selected_party == $party->party_name ? 'selected' : ''; ?>>
                                        <?php echo $party->party_name; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2 col-sm-6" style="margin-bottom: 12px;">
                            <label><i class="fa fa-map-marker"></i> Naannoo Filannoo</label>
                            <select name="region" class="input-modern">
                                <option value="all">Naannoo Filannoo Hunda</option>
                                <?php foreach($regions as $region): ?>
                                    <option value="<?php echo $region->naannoofil_id; ?>" <?php echo $selected_region == $region->naannoofil_id ? 'selected' : ''; ?>>
                                        <?php echo $region->naannoofil_id; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2 col-sm-6" style="margin-bottom: 12px;">
                            <label><i class="fa fa-building"></i> Gosa Teessoo</label>
                            <select name="teessoo_type" class="input-modern" id="teessooTypeSelect">
                                <option value="all">Gosa Teessoo Hunda</option>
                                <option value="zone" <?php echo isset($selected_teessoo_type) && $selected_teessoo_type == 'zone' ? 'selected' : ''; ?>>Zone</option>
                                <option value="magalaa" <?php echo isset($selected_teessoo_type) && $selected_teessoo_type == 'magalaa' ? 'selected' : ''; ?>>Magalaa</option>
                            </select>
                        </div>
                        <div class="col-md-2" style="margin-bottom: 12px;">
                            <label>&nbsp;</label>
                            <div style="display: flex; gap: 8px;">
                                <button type="submit" class="btn-modern btn-primary"><i class="fa fa-search"></i> Barbaadi</button>
                                <a href="<?php echo base_url('AdminElection/partyReports'); ?>" class="btn-modern btn-default"><i class="fa fa-refresh"></i> Haari</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Party Totals Summary Card -->
        <div class="stats-card animate-slide" style="animation-delay: 0.1s;">
            <div class="stats-card-header">
                <h3><i class="fa fa-trophy"></i> Qabxiilee Paartii</h3>
            </div>
            <div class="stats-card-body">
                <div class="toolbar">
                    <div>
                        <span class="badge" style="background: var(--brand); padding: 4px 10px; border-radius: 20px;">
                            <i class="fa fa-calendar"></i> <?php echo date('d/m/Y', strtotime($start_date)); ?> - <?php echo date('d/m/Y', strtotime($end_date)); ?>
                        </span>
                    </div>
                    <div style="display: flex; gap: 8px;">
                        <button class="btn-modern btn-default btn-sm" onclick="window.print()"><i class="fa fa-print"></i> Maxxansi</button>
                        <button class="btn-modern btn-danger btn-sm" onclick="generatePDF()"><i class="fa fa-file-pdf-o"></i> PDF</button>
                        <button class="btn-modern btn-success btn-sm" onclick="exportPartySummary()"><i class="fa fa-download"></i> CSV</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table-modern" id="partyTable">
                        <thead>
                            <tr>
                                <th style="width: 5%; text-align: center;">#</th>
                                <th style="width: 30%;">Maqaa Paartii</th>
                                <th style="width: 10%; text-align: center;">Gabaasa</th>
                                <th style="width: 15%; text-align: center;">Dhiirii</th>
                                <th style="width: 15%; text-align: center;">Dubartii</th>
                                <th style="width: 20%; text-align: center;">Waliigala</th>
                                <th style="width: 5%; text-align: center;">Qooda</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $rank = 1;
                            $grandTotalReports = 0;
                            $grandTotalMale = 0;
                            $grandTotalFemale = 0;
                            $grandTotalVoters = 0;
                            foreach($partyTotals as $party): 
                                $grandTotalReports += $party->total_reports;
                                $grandTotalMale += $party->total_male_voters;
                                $grandTotalFemale += $party->total_female_voters;
                                $grandTotalVoters += $party->total_voters;
                            ?>
                            <tr>
                                <td class="text-center" style="width: 40px;">
                                    <?php if($rank == 1): ?>
                                        <i class="fa fa-trophy trophy-gold" style="font-size: 20px;"></i>
                                    <?php elseif($rank == 2): ?>
                                        <i class="fa fa-trophy trophy-silver" style="font-size: 20px;"></i>
                                    <?php elseif($rank == 3): ?>
                                        <i class="fa fa-trophy trophy-bronze" style="font-size: 20px;"></i>
                                    <?php else: ?>
                                        <span class="rank-badge"><?php echo $rank; ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="party-name"><?php echo $party->party_name; ?></span>
                                </td>
                                <td class="text-center"><?php echo $party->total_reports; ?></td>
                                <td class="text-center"><?php echo number_format($party->total_male_voters); ?></td>
                                <td class="text-center"><?php echo number_format($party->total_female_voters); ?></td>
                                <td>
                                    <div class="progress-wrapper">
                                        <div class="text-center" style="margin-bottom: 5px;">
                                            <strong><?php echo number_format($party->total_voters); ?></strong>
                                        </div>
                                        <div class="progress-modern">
                                            <div class="progress-bar-modern" style="width: <?php echo $grandTotalVoters > 0 ? round(($party->total_voters / $grandTotalVoters) * 100, 1) : 0; ?>%;"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center"><?php echo $grandTotalVoters > 0 ? round(($party->total_voters / $grandTotalVoters) * 100, 1) : 0; ?>%</td>
                            </tr>
                            <?php 
                            $rank++; 
                            endforeach; 
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" class="text-right"><strong>WALIIGALA:</strong></td>
                                <td class="text-center"><strong><?php echo number_format($grandTotalReports); ?></strong></td>
                                <td class="text-center"><strong><?php echo number_format($grandTotalMale); ?></strong></td>
                                <td class="text-center"><strong><?php echo number_format($grandTotalFemale); ?></strong></td>
                                <td class="text-center"><strong><?php echo number_format($grandTotalVoters); ?></strong></td>
                                <td class="text-center"><strong>100%</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- Detailed Reports Card -->
        <div class="stats-card animate-slide" style="animation-delay: 0.15s;">
            <div class="stats-card-header">
                <h3><i class="fa fa-list-alt"></i> Gabaasa Adda Addaa</h3>
            </div>
            <div class="stats-card-body">
                <div class="toolbar">
                    <div></div>
                    <div>
                        <span class="badge" style="background: var(--success); padding: 4px 12px; border-radius: 20px;">
                            <i class="fa fa-file-text-o"></i> Ida'ama: <?php echo count($reports); ?> gabaasa
                        </span>
                    </div>
                </div>
                <div class="table-responsive">
                    <?php if(empty($reports)): ?>
                        <div class="empty-state">
                            <i class="fa fa-inbox"></i>
                            <p>Gabaasni addaan baafame hin jiru.</p>
                        </div>
                    <?php else: ?>
                        <table class="table-modern" id="reportsTable">
                            <thead>
                                <tr>
                                    <th>Guyyaa</th>
                                    <th>Lakk. Tarree</th>
                                    <th>Naannoo Filannoo</th>
                                    <th>Teessoo</th>
                                    <th>Paartii</th>
                                    <th class="text-center">Dhiirii</th>
                                    <th class="text-center">Dubartii</th>
                                    <th class="text-center">Waliigala</th>
                                    <th>Gabaasaa</th>
                                    <th class="text-center">Ibsa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $totalMale = 0; 
                                $totalFemale = 0; 
                                $totalGrand = 0;
                                foreach($reports as $report): 
                                    $totalMale += $report->male_voters;
                                    $totalFemale += $report->female_voters;
                                    $totalGrand += $report->grand_total;
                                ?>
                                <tr>
                                    <td><?php echo date('d/m/Y', strtotime($report->report_date)); ?></td>
                                    <td><?php echo $report->serial_number; ?></td>
                                    <td><span class="party-name"><?php echo $report->naannoofil_id; ?></span></td>
                                    <td>
                                        <?php 
                                        $teessooName = '';
                                        if(isset($report->zone_id) && $report->zone_id) {
                                            $teessooName = $report->zone_name ?? 'Zone';
                                        } elseif(isset($report->magala_id) && $report->magala_id) {
                                            $teessooName = $report->city_name ?? 'Magalaa';
                                        } else {
                                            $teessooName = '-';
                                        }
                                        echo $teessooName;
                                        ?>
                                        <span class="label-modern <?php echo isset($report->zone_id) && $report->zone_id ? 'label-zone' : 'label-magalaa'; ?>">
                                            <?php echo isset($report->zone_id) && $report->zone_id ? 'Zone' : 'Magalaa'; ?>
                                        </span>
                                    </td>
                                    <td><span class="party-name"><?php echo $report->party_name; ?></span></td>
                                    <td class="text-center"><?php echo number_format($report->male_voters); ?></td>
                                    <td class="text-center"><?php echo number_format($report->female_voters); ?></td>
                                    <td class="text-center"><strong><?php echo number_format($report->grand_total); ?></strong></td>
                                    <td><?php echo $report->reporter_name; ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url('AdminElection/viewReport/'.$report->id); ?>" class="btn-modern btn-primary btn-sm" style="padding: 4px 8px;" title="Ilaali">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-right"><strong>WALIIGALA:</strong></td>
                                    <td class="text-center"><strong><?php echo number_format($totalMale); ?></strong></td>
                                    <td class="text-center"><strong><?php echo number_format($totalFemale); ?></strong></td>
                                    <td class="text-center"><strong><?php echo number_format($totalGrand); ?></strong></td>
                                    <td colspan="2"></td>
                                </tr>
                            </tfoot>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
    </section>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
function exportWithFilter() {
    var startDate = $('input[name="start_date"]').val();
    var endDate = $('input[name="end_date"]').val();
    var party = $('select[name="party"]').val();
    var region = $('select[name="region"]').val();
    var teessooType = $('#teessooTypeSelect').val();
    
    var url = '<?php echo base_url("AdminElection/export"); ?>?start_date=' + startDate + '&end_date=' + endDate + '&party=' + party + '&region=' + region + '&teessoo_type=' + teessooType;
    
    window.location.href = url;
}

function exportPartySummary() {
    var rows = [];
    rows.push(['#', 'Maqaa Paartii', 'Gabaasa', 'Dhiirii', 'Dubartii', 'Waliigala', 'Qooda %']);
    
    <?php if(isset($partyTotals) && !empty($partyTotals)): ?>
        <?php 
        $rank = 1; 
        $totalVoters = 0;
        foreach($partyTotals as $party) { $totalVoters += $party->total_voters; }
        foreach($partyTotals as $party): 
            $percentage = $totalVoters > 0 ? round(($party->total_voters / $totalVoters) * 100, 1) : 0;
        ?>
            rows.push([
                <?php echo $rank++; ?>,
                '<?php echo addslashes($party->party_name); ?>',
                <?php echo $party->total_reports; ?>,
                <?php echo $party->total_male_voters; ?>,
                <?php echo $party->total_female_voters; ?>,
                <?php echo $party->total_voters; ?>,
                '<?php echo $percentage; ?>%'
            ]);
        <?php endforeach; ?>
    <?php endif; ?>
    
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

function generatePDF() {
    var element = document.querySelector('.stats-card');
    var opt = {
        margin: [10, 10, 10, 10],
        filename: 'gabaasa_paartii_' + new Date().toISOString().slice(0,19) + '.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2, letterRendering: true },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' }
    };
    html2pdf().set(opt).from(element).save();
}

// Add animation on page load
document.addEventListener('DOMContentLoaded', function() {
    const elements = document.querySelectorAll('.animate-slide');
    elements.forEach((el, index) => {
        el.style.opacity = '0';
        setTimeout(() => {
            el.style.opacity = '1';
        }, index * 50);
    });
});
</script>