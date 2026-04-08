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
            font-weight: 500;
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
        .btn-sm { padding: 5px 10px; font-size: 11px; border-radius: 6px; }

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

        .pagination {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 20px;
            flex-wrap: wrap;
        }
        .pagination button {
            padding: 8px 14px;
            border: 1px solid var(--border);
            background: white;
            border-radius: 8px;
            cursor: pointer;
            font-size: 12px;
        }
        .pagination button.active {
            background: var(--primary-green);
            color: white;
            border-color: var(--primary-green);
        }
        .pagination button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-slide { animation: slideUp 0.4s ease forwards; }
        
        .filter-row {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: flex-end;
        }
        .filter-item {
            flex: 1;
            min-width: 160px;
        }
        .filter-actions {
            flex: 0.5;
            min-width: 140px;
        }
    </style>

    <!-- Dashboard Header -->
    <div class="dashboard-header animate-slide">
        <h1>
            <i class="fa fa-list-alt"></i>
            Gabaasawwan Baayyina Filattoota
            <small style="font-size: 13px; color: #6c757d; margin-left: 8px; font-weight: normal;">Admin | Voter Turnout Reports - All Regions</small>
        </h1>
        <div class="breadcrumb-modern" style="margin-top: 8px;">
            <a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Manii</a>
            <span style="margin: 0 5px; color: #999;">›</span>
            <a href="<?php echo base_url('VoterTurnout/adminDashboard'); ?>">Daashboordii</a>
            <span style="margin: 0 5px; color: #999;">›</span>
            <span style="color: #999;">Gabaasawwan Hunda</span>
        </div>
    </div>

    <section class="content" style="padding: 0 15px 15px 15px;">
        
        <!-- Filter Card - All filters in one row -->
        <div class="filter-card animate-slide" style="animation-delay: 0.05s;">
            <form method="get" action="<?php echo base_url('VoterTurnout/adminListReports'); ?>" id="filterForm">
                <div class="filter-row">
                    <div class="filter-item">
                        <label style="font-weight: 600; font-size: 12px;">Guyyaa Jalqabaa:</label>
                        <input type="date" name="start_date" class="form-control" value="<?php echo $start_date; ?>">
                    </div>
                    <div class="filter-item">
                        <label style="font-weight: 600; font-size: 12px;">Guyyaa Xumuraa:</label>
                        <input type="date" name="end_date" class="form-control" value="<?php echo $end_date; ?>">
                    </div>
                    <div class="filter-item">
                        <label style="font-weight: 600; font-size: 12px;">Haala Naannoo:</label>
                        <select name="status_level" class="form-control">
                            <option value="all" <?php echo $selected_status == 'all' ? 'selected' : ''; ?>>Hunda</option>
                            <option value="green" <?php echo $selected_status == 'green' ? 'selected' : ''; ?>>Green (Nagaa)</option>
                            <option value="yellow" <?php echo $selected_status == 'yellow' ? 'selected' : ''; ?>>Yellow (Rakkina xixiqqoo)</option>
                            <option value="red" <?php echo $selected_status == 'red' ? 'selected' : ''; ?>>Red (Rakkina guddaa)</option>
                        </select>
                    </div>
                    <div class="filter-item">
                        <label style="font-weight: 600; font-size: 12px;">Naannoo Filannoo:</label>
                        <select name="region" class="form-control">
                            <option value="all" <?php echo $selected_region == 'all' ? 'selected' : ''; ?>>Naannoo Hunda</option>
                            <?php foreach($all_regions as $region): ?>
                                <option value="<?php echo $region->naannoofil_id; ?>" <?php echo $selected_region == $region->naannoofil_id ? 'selected' : ''; ?>>
                                    <?php echo $region->naannoofil_id; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="filter-actions">
                        <label style="font-weight: 600; font-size: 12px;">&nbsp;</label>
                        <div>
                            <button type="submit" class="btn-modern btn-primary"><i class="fa fa-search"></i> Calleessii</button>
                            <a href="<?php echo base_url('VoterTurnout/adminListReports'); ?>" class="btn-modern btn-teal"><i class="fa fa-refresh"></i> Haari</a>
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
                    <div class="stat-value" id="totalReportsCount"><?php echo number_format(count($reports)); ?></div>
                    <p class="stat-label">Gabaasa Arganne</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card teal">
                    <div class="stat-icon"><i class="fa fa-users"></i></div>
                    <div class="stat-value" id="totalVotersCount"><?php echo number_format($stats->total_voters ?? 0); ?></div>
                    <p class="stat-label">Waliigala Filattoota</p>
                </div>
            </div>
           
            <div class="col-md-3">
                <div class="stat-card red">
                    <div class="stat-icon"><i class="fa fa-map-marker"></i></div>
                    <div class="stat-value" id="totalRegionsCount"><?php echo number_format(count($all_regions)); ?></div>
                    <p class="stat-label">Naannoo Hunda</p>
                </div>
            </div>
        </div>

        <!-- Reports Table with Pagination -->
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
                      
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table-modern" id="reportsTable">
                            <thead>
                                <tr>
                                    <th style="width: 3%; text-align: center;">#</th>
                                    <th style="width: 12%;">Naannoo Filannoo</th>
                                    <th style="width: 10%;">Guyyaa</th>
                                    <th style="width: 8%; text-align: center;">Yeroo</th>
                                    <th style="width: 8%; text-align: center;">Lakk.Tarree</th>
                                    <th style="width: 8%; text-align: center;">Dhiirii</th>
                                    <th style="width: 8%; text-align: center;">Dubartii</th>
                                    <th style="width: 8%; text-align: center;">Waliigala</th>
                                    <th style="width: 10%; text-align: center;">Haala Naannoo</th>
                                    <th style="width: 10%;">Gabaasaa</th>
                                    <th style="width: 10%; text-align: center;">Gocha</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody"></tbody>
                            <tfoot id="tableFoot"></tfoot>
                        </table>
                    </div>
                    <div id="paginationControls" class="pagination"></div>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="row animate-slide" style="animation-delay: 0.2s; margin-bottom: 30px;">
            <div class="col-md-12 text-right">
                <a href="<?php echo base_url('VoterTurnout/register'); ?>" class="btn-modern btn-primary">
                    <i class="fa fa-plus-circle"></i> Haaraa Galmeessi
                </a>
                <a href="<?php echo base_url('VoterTurnout/adminDashboard'); ?>" class="btn-modern btn-teal" style="margin-left: 10px;">
                    <i class="fa fa-dashboard"></i> Daashboordiitti Deebi'i
                </a>
            </div>
        </div>
        
    </section>
</div>

<script>
// Pass PHP data to JavaScript
const reportsData = <?php echo json_encode($reports); ?>;
let currentPage = 1;
const rowsPerPage = 15;

function getStatusBadge(status, reason) {
    let badgeClass = '', icon = '', text = '';
    if(status == 'green') {
        badgeClass = 'badge-green';
        icon = 'fa-check-circle';
        text = 'GREEN';
    } else if(status == 'yellow') {
        badgeClass = 'badge-yellow';
        icon = 'fa-warning';
        text = 'YELLOW';
    } else {
        badgeClass = 'badge-red';
        icon = 'fa-exclamation-triangle';
        text = 'RED';
    }
    let html = `<span class="${badgeClass}"><i class="fa ${icon}"></i> ${text}</span>`;
    if(reason) {
        html += `<br><small style="color: #999;" title="${escapeHtml(reason)}">${reason.substring(0, 30)}${reason.length > 30 ? '...' : ''}</small>`;
    }
    return html;
}

function escapeHtml(str) {
    if(!str) return '';
    return str.replace(/[&<>]/g, function(m) {
        if(m === '&') return '&amp;';
        if(m === '<') return '&lt;';
        if(m === '>') return '&gt;';
        return m;
    });
}

function renderTable() {
    const start = (currentPage - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    const pageData = reportsData.slice(start, end);
    const tbody = document.getElementById('tableBody');
    tbody.innerHTML = '';
    
    if(!pageData.length) {
        tbody.innerHTML = '<tr><td colspan="11" class="text-center" style="padding:40px;">No data found</td></tr>';
        return;
    }
    
    pageData.forEach((report, idx) => {
        const rowNum = start + idx + 1;
        // FIXED: Correct URL for constituency detail
        const detailUrl = "<?php echo base_url('VoterTurnout/adminConstituencyDetail/'); ?>" + encodeURIComponent(report.naannoofil_id);
        // FIXED: Correct URL for view single report
        const viewUrl = "<?php echo base_url('VoterTurnout/viewReport/'); ?>" + report.id;
        
        tbody.innerHTML += `<tr>
            <td class="text-center">${rowNum}</td>
            <td><strong><a href="${detailUrl}" style="color: #2c5f2d; text-decoration: none;">${escapeHtml(report.naannoofil_id)}</a></strong></td>
            <td>${report.report_date ? new Date(report.report_date).toLocaleDateString('en-GB') : 'N/A'}</td>
            <td class="text-center">${report.report_time ? report.report_time.substring(0,5) : 'N/A'} <small>(${report.report_session || 'N/A'})</small></td>
            <td class="text-center">#${String(report.serial_number || 0).padStart(4, '0')}</td>
            <td class="text-center"><strong style="color: #2c5f2d;">${(report.male_voters || 0).toLocaleString()}</strong></td>
            <td class="text-center"><strong style="color: #e6a017;">${(report.female_voters || 0).toLocaleString()}</strong></td>
            <td class="text-center"><span class="badge-modern">${(report.total_voters || 0).toLocaleString()}</span></td>
            <td class="text-center">${getStatusBadge(report.status_level, report.status_reason)}</td>
            <td><small>${escapeHtml(report.reporter_name || 'Unknown')}</small></td>
            <td class="text-center">
                <div style="display: flex; gap: 5px; justify-content: center;">
                    <a href="${viewUrl}" class="btn-sm" style="background: #17a2b8; color: white; border-radius: 6px; padding: 5px 10px; text-decoration: none;" title="Ilaalchuu">
                        <i class="fa fa-eye"></i> Ilaali
                    </a>
                    <a href="${detailUrl}" class="btn-sm" style="background: #2c5f2d; color: white; border-radius: 6px; padding: 5px 10px; text-decoration: none;" title="Naannoo Detail">
                        <i class="fa fa-map-marker"></i> Detail
                    </a>
                </div>
            </td>
        </tr>`;
    });
    
    // Update footer totals
    const totalMale = reportsData.reduce((sum, r) => sum + (r.male_voters || 0), 0);
    const totalFemale = reportsData.reduce((sum, r) => sum + (r.female_voters || 0), 0);
    const totalVoters = reportsData.reduce((sum, r) => sum + (r.total_voters || 0), 0);
    
    document.getElementById('tableFoot').innerHTML = `<tr style="background: #f8f9fc; font-weight: 700;">
        <td colspan="5" class="text-right"><strong>WALIIGALA:</strong></td>
        <td class="text-center"><strong>${totalMale.toLocaleString()}</strong></td>
        <td class="text-center"><strong>${totalFemale.toLocaleString()}</strong></td>
        <td class="text-center"><strong>${totalVoters.toLocaleString()}</strong></td>
        <td colspan="3"></td>
    </tr>`;
    
    renderPagination();
}

function renderPagination() {
    const totalPages = Math.ceil(reportsData.length / rowsPerPage);
    const container = document.getElementById('paginationControls');
    if(totalPages <= 1) { container.innerHTML = ''; return; }
    
    let html = `<button onclick="changePage(1)" ${currentPage === 1 ? 'disabled' : ''}>«</button>`;
    for(let i = 1; i <= totalPages; i++) {
        if(i === 1 || i === totalPages || (i >= currentPage - 2 && i <= currentPage + 2)) {
            html += `<button class="${i === currentPage ? 'active' : ''}" onclick="changePage(${i})">${i}</button>`;
        } else if(i === currentPage - 3 || i === currentPage + 3) {
            html += `<span style="padding:8px;">...</span>`;
        }
    }
    html += `<button onclick="changePage(${totalPages})" ${currentPage === totalPages ? 'disabled' : ''}>»</button>`;
    container.innerHTML = html;
}

function changePage(page) {
    currentPage = page;
    renderTable();
}

function exportToCSV() {
    var rows = [];
    rows.push(['#', 'Naannoo Filannoo', 'Guyyaa', 'Yeroo', 'Lakk.Tarree', 'Dhiirii', 'Dubartii', 'Waliigala', 'Haala Naannoo', 'Sababa', 'Gabaasaa', 'Hubannoo']);
    
    reportsData.forEach((report, index) => {
        rows.push([
            index + 1,
            report.naannoofil_id || '',
            report.report_date || '',
            (report.report_time || '') + ' (' + (report.report_session || '') + ')',
            '#' + String(report.serial_number || 0).padStart(4, '0'),
            report.male_voters || 0,
            report.female_voters || 0,
            report.total_voters || 0,
            (report.status_level || '').toUpperCase(),
            (report.status_reason || '').replace(/,/g, ';'),
            report.reporter_name || '',
            (report.remarks || '').replace(/,/g, ';')
        ]);
    });
    
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

// Initialize table
if(reportsData.length > 0) {
    renderTable();
}
</script>