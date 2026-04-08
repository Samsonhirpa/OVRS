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
        }
        .dashboard-header {
            background: white;
            padding: 20px 25px;
            margin-bottom: 20px;
            border-radius: 12px;
            border-bottom: 3px solid var(--primary-green);
        }
        .dashboard-header h1 {
            font-size: 22px;
            margin: 0;
            color: #1e3c2c;
        }
        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 18px 15px;
            margin-bottom: 20px;
            box-shadow: var(--shadow-sm);
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
        }
        .card-header h3 {
            margin: 0;
            font-size: 16px;
            color: #1e3c2c;
        }
        .badge-modern {
            background: var(--primary-green);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
        }
        .badge-green { background: #28a745; color: white; padding: 4px 10px; border-radius: 20px; }
        .badge-yellow { background: #ffc107; color: #333; padding: 4px 10px; border-radius: 20px; }
        .badge-red { background: #dc3545; color: white; padding: 4px 10px; border-radius: 20px; }
        .btn-modern {
            border-radius: 30px;
            padding: 8px 20px;
            font-size: 12px;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-primary { background: var(--primary-green); color: white; }
        .btn-teal { background: var(--teal); color: white; }
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
        }
        .status-card.green { background: linear-gradient(135deg, #28a745, #1e7e34); }
        .status-card.yellow { background: linear-gradient(135deg, #ffc107, #e0a800); color: #333; }
        .status-card.red { background: linear-gradient(135deg, #dc3545, #bd2130); }
        .pagination {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 20px;
        }
        .pagination button {
            padding: 8px 14px;
            border: 1px solid var(--border);
            background: white;
            border-radius: 8px;
            cursor: pointer;
        }
        .pagination button.active {
            background: var(--primary-green);
            color: white;
        }
        .form-control {
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            width: 100%;
        }
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
        .chart-container {
            height: 400px;
        }
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #999;
        }
    </style>

    <div class="dashboard-header">
        <h1><i class="fa fa-bar-chart"></i> Daashboordii Baayyina Filattoota - Admin</h1>
        <small>Oromia Region</small>
    </div>

    <section class="content" style="padding: 0 15px 15px 15px;">
        <!-- Filter Form - All in one row -->
        <div class="filter-form">
            <form method="get" action="<?php echo base_url('VoterTurnout/adminDashboard'); ?>">
                <div class="filter-row">
                    <div class="filter-item">
                        <label>Guyyaa Jalqabaa:</label>
                        <input type="date" name="start_date" class="form-control" value="<?php echo $start_date; ?>">
                    </div>
                    <div class="filter-item">
                        <label>Guyyaa Xumuraa:</label>
                        <input type="date" name="end_date" class="form-control" value="<?php echo $end_date; ?>">
                    </div>
                    <div class="filter-item">
                        <label>Naannoo (Zone):</label>
                        <select name="zone" class="form-control">
                            <option value="all">Naannoo Hunda</option>
                            <?php foreach($all_zones as $z): ?>
                                <option value="<?php echo $z; ?>" <?php echo $selected_zone == $z ? 'selected' : ''; ?>><?php echo $z; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="filter-item">
                        <label>Haala Ammaa:</label>
                        <select name="status" class="form-control">
                            <option value="all">Hunda</option>
                            <option value="green" <?php echo $selected_status == 'green' ? 'selected' : ''; ?>>GREEN</option>
                            <option value="yellow" <?php echo $selected_status == 'yellow' ? 'selected' : ''; ?>>YELLOW</option>
                            <option value="red" <?php echo $selected_status == 'red' ? 'selected' : ''; ?>>RED</option>
                        </select>
                    </div>
                    <div class="filter-item">
                        <label>Naannoo Filannoo:</label>
                        <select name="constituency" class="form-control">
                            <option value="all">Hunda</option>
                            <?php foreach($constituency_options as $opt): ?>
                                <option value="<?php echo $opt->naannoofil_id; ?>" <?php echo $selected_constituency == $opt->naannoofil_id ? 'selected' : ''; ?>>
                                    <?php echo $opt->naannoofil_id; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="filter-actions">
                        <label>&nbsp;</label>
                        <div>
                            <button type="submit" class="btn-modern btn-primary"><i class="fa fa-search"></i> Calleessii</button>
                            <a href="<?php echo base_url('VoterTurnout/adminDashboard'); ?>" class="btn-modern btn-teal"><i class="fa fa-refresh"></i> Haari</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- KPI Cards -->
        <div style="display: flex; gap: 20px; flex-wrap: wrap; margin-bottom: 20px;">
            <div style="flex:1; min-width:200px;"><div class="stat-card primary"><div class="stat-value"><?php echo number_format($total_constituencies_with_data); ?></div><div>Naannoo Filannoo</div></div></div>
            <div style="flex:1; min-width:200px;"><div class="stat-card teal"><div class="stat-value"><?php echo number_format($stats->male_voters ?? 0); ?></div><div>Waliigala Dhiiraa</div></div></div>
            <div style="flex:1; min-width:200px;"><div class="stat-card gold"><div class="stat-value"><?php echo number_format($stats->female_voters ?? 0); ?></div><div>Waliigala Dubartii</div></div></div>
            <div style="flex:1; min-width:200px;"><div class="stat-card red"><div class="stat-value"><?php echo number_format($stats->total_voters ?? 0); ?></div><div>Waliigala Filattoota</div></div></div>
        </div>

        <!-- Status Summary Cards -->
        <div style="display: flex; gap: 20px; flex-wrap: wrap; margin-bottom: 20px;">
            <div style="flex:1;"><div class="status-card green"><h3>GREEN - Nagaa</h3><h2><?php echo number_format($green_count); ?></h2><p>Naannoo</p></div></div>
            <div style="flex:1;"><div class="status-card yellow"><h3>YELLOW - Rakkina xixiqqoo</h3><h2><?php echo number_format($yellow_count); ?></h2><p>Naannoo</p></div></div>
            <div style="flex:1;"><div class="status-card red"><h3>RED - Rakkina guddaa</h3><h2><?php echo number_format($red_count); ?></h2><p>Naannoo</p></div></div>
        </div>

        <!-- Color-coded Bar Chart -->
        <div class="modern-card">
            <div class="card-header"><h3><i class="fa fa-bar-chart"></i> Baayyina Filattoota (Color-coded by Status)</h3><span class="badge-modern">Hover over bars</span></div>
            <div class="card-body">
                <div class="chart-container"><canvas id="voterChart"></canvas></div>
                <div style="text-align:center; margin-top:15px;">
                    <span><span style="background:#28a745; width:12px;height:12px;display:inline-block;"></span> Green</span>
                    <span style="margin-left:15px;"><span style="background:#ffc107; width:12px;height:12px;display:inline-block;"></span> Yellow</span>
                    <span style="margin-left:15px;"><span style="background:#dc3545; width:12px;height:12px;display:inline-block;"></span> Red</span>
                </div>
            </div>
        </div>

        <!-- Table with Pagination (6 rows) -->
        <div class="modern-card">
            <div class="card-header"><h3><i class="fa fa-map-marker"></i> Haala Naannoo Filannoo</h3><span class="badge-modern"><?php echo count($constituency_data); ?> constituencies with data</span></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" style="font-size:13px;">
                        <thead style="background:var(--primary-green); color:white;">
                            <tr><th>#</th><th>Naannoo Filannoo</th><th>Zone</th><th class="text-center">Dhiira</th><th class="text-center">Dubartii</th><th class="text-center">Waliigala</th><th class="text-center">Gabaasa</th><th class="text-center">Haala</th><th class="text-center">Guyyaa Darbee</th></tr>
                        </thead>
                        <tbody id="tableBody"></tbody>
                        <tfoot id="tableFoot"></tfoot>
                    </table>
                </div>
                <div id="paginationControls" class="pagination"></div>
            </div>
        </div>

        <div class="text-right" style="margin-bottom:30px;">
            <a href="<?php echo base_url('VoterTurnout/register'); ?>" class="btn-modern btn-primary"><i class="fa fa-plus-circle"></i> Haaraa Galmeessi</a>
            <a href="<?php echo base_url('VoterTurnout/adminListReports'); ?>" class="btn-modern btn-teal"><i class="fa fa-list"></i> Gabaasawwan Hunda</a>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
const constituencyData = <?php echo json_encode($constituency_data); ?>;
let currentPage = 1;
const rowsPerPage = 6;

function getStatusColor(s) {
    if(s === 'green') return '#28a745';
    if(s === 'yellow') return '#ffc107';
    return '#dc3545';
}

function renderChart() {
    if(!constituencyData.length) return;
    const ctx = document.getElementById('voterChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: constituencyData.map(c => c.naannoofil_id.length > 20 ? c.naannoofil_id.substr(0,18)+'...' : c.naannoofil_id),
            datasets: [{
                label: 'Waliigala Filattoota',
                data: constituencyData.map(c => c.total_voters),
                backgroundColor: constituencyData.map(c => getStatusColor(c.current_status)),
                borderRadius: 6,
                barPercentage: 0.7
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: { legend: { display: false }, tooltip: { callbacks: { label: (ctx) => `Filattoota: ${ctx.raw.toLocaleString()}` } } },
            scales: { y: { beginAtZero: true, ticks: { callback: v => v.toLocaleString() } } }
        }
    });
}

function renderTable() {
    const start = (currentPage-1)*rowsPerPage;
    const pageData = constituencyData.slice(start, start+rowsPerPage);
    const tbody = document.getElementById('tableBody');
    tbody.innerHTML = '';
    if(!pageData.length) { tbody.innerHTML = '<tr><td colspan="9" class="empty-state">Odeeffannoon hin jiru!</td></tr>'; return; }
    pageData.forEach((item,i) => {
        let badge = item.current_status === 'green' ? 'badge-green' : (item.current_status === 'yellow' ? 'badge-yellow' : 'badge-red');
        let icon = item.current_status === 'green' ? 'fa-check-circle' : (item.current_status === 'yellow' ? 'fa-warning' : 'fa-exclamation-triangle');
        let statusText = item.current_status.toUpperCase();
        tbody.innerHTML += `<tr>
            <td class="text-center">${start+i+1}</td>
            <td><strong>${escapeHtml(item.naannoofil_id)}</strong></td>
            <td>${escapeHtml(item.zone)}</td>
            <td class="text-center">${item.male_voters.toLocaleString()}</td>
            <td class="text-center">${item.female_voters.toLocaleString()}</td>
            <td class="text-center"><span class="badge-modern">${item.total_voters.toLocaleString()}</span></td>
            <td class="text-center">${item.total_reports}</td>
            <td class="text-center"><span class="${badge}"><i class="fa ${icon}"></i> ${statusText}</span></td>
            <td class="text-center">${item.last_report_date ? item.last_report_date : 'N/A'}</td>
        </tr>`;
    });
    let totalMale = constituencyData.reduce((s,c)=>s+c.male_voters,0);
    let totalFemale = constituencyData.reduce((s,c)=>s+c.female_voters,0);
    let totalVoters = constituencyData.reduce((s,c)=>s+c.total_voters,0);
    let totalReports = constituencyData.reduce((s,c)=>s+c.total_reports,0);
    document.getElementById('tableFoot').innerHTML = `<tr style="background:#f8f9fc;font-weight:700;"><td colspan="3" class="text-right">WALIIGALA:</td>
        <td class="text-center">${totalMale.toLocaleString()}</td><td class="text-center">${totalFemale.toLocaleString()}</td>
        <td class="text-center">${totalVoters.toLocaleString()}</td><td class="text-center">${totalReports}</td><td colspan="2"></td></tr>`;
    renderPagination();
}

function renderPagination() {
    let totalPages = Math.ceil(constituencyData.length/rowsPerPage);
    let container = document.getElementById('paginationControls');
    if(totalPages<=1) { container.innerHTML=''; return; }
    let html = `<button onclick="changePage(1)" ${currentPage===1?'disabled':''}>«</button>`;
    for(let i=1;i<=totalPages;i++) {
        if(i===1||i===totalPages||(i>=currentPage-1&&i<=currentPage+1))
            html += `<button class="${i===currentPage?'active':''}" onclick="changePage(${i})">${i}</button>`;
        else if(i===currentPage-2||i===currentPage+2) html += `<span>...</span>`;
    }
    html += `<button onclick="changePage(${totalPages})" ${currentPage===totalPages?'disabled':''}>»</button>`;
    container.innerHTML = html;
}
function changePage(p) { currentPage=p; renderTable(); }
function escapeHtml(str) { if(!str) return ''; return str.replace(/[&<>]/g, m => ({'&':'&amp;','<':'&lt;','>':'&gt;'})[m]); }
renderChart();
renderTable();
</script>