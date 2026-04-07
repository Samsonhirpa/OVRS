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
<div class="content-wrapper" style="background: #f4f6f9;">
    <section class="content-header" style="padding: 10px 15px;">
        <h1 style="font-size: 18px; margin: 0;"><i class="fa fa-map-marker"></i> Gabaasa Naannoo Filannoo</h1>
        <ol class="breadcrumb" style="padding: 0; margin: 5px 0 0; background: none;">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Manii</a></li>
            <li><a href="<?php echo base_url('AdminElection/dashboard'); ?>">Daashboordii Filannoo</a></li>
            <li class="active">Gabaasa Naannoo Filannoo</li>
        </ol>
    </section>

    <section class="content" style="padding: 10px 15px;">
        
        <!-- Filter Form -->
        <div class="box box-primary" style="border-radius: 4px;">
            <div class="box-header" style="padding: 8px 12px; background: #f9f9f9;">
                <h3 class="box-title" style="font-size: 14px;"><i class="fa fa-filter"></i> Gabaasa Baay'ee</h3>
            </div>
            <div class="box-body" style="padding: 12px;">
                <form method="get" class="form-responsive" id="filterForm">
                    <div class="row">
                        <div class="col-xs-6 col-sm-4 col-md-2" style="margin-bottom: 8px;">
                            <label style="font-size: 11px;">Guyyaa Jalqabaa</label>
                            <input type="date" name="start_date" class="form-control input-sm" value="<?php echo $start_date; ?>">
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-2" style="margin-bottom: 8px;">
                            <label style="font-size: 11px;">Guyyaa Dhumaa</label>
                            <input type="date" name="end_date" class="form-control input-sm" value="<?php echo $end_date; ?>">
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-2" style="margin-bottom: 8px;">
                            <label style="font-size: 11px;">Paartii</label>
                            <select name="party" class="form-control input-sm">
                                <option value="all">Paartii Hunda</option>
                                <?php foreach($parties as $party): ?>
                                    <option value="<?php echo $party->party_name; ?>" <?php echo $selected_party == $party->party_name ? 'selected' : ''; ?>>
                                        <?php echo $party->party_name; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3" style="margin-bottom: 8px;">
                            <label style="font-size: 11px;">Gosa Teessoo</label>
                            <select name="teessoo_type" class="form-control input-sm" id="teessooTypeSelect">
                                <option value="all">Gosa Teessoo Hunda</option>
                                <option value="zone" <?php echo isset($selected_teessoo_type) && $selected_teessoo_type == 'zone' ? 'selected' : ''; ?>>Zone</option>
                                <option value="magalaa" <?php echo isset($selected_teessoo_type) && $selected_teessoo_type == 'magalaa' ? 'selected' : ''; ?>>Magalaa</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-3" style="margin-bottom: 8px;">
                            <label style="font-size: 11px;">&nbsp;</label><br>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Barbaadi</button>
                            <a href="<?php echo base_url('AdminElection/regionReports'); ?>" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Haari</a>
                            <button type="button" class="btn btn-success btn-sm" onclick="exportWithFilter()">
                                <i class="fa fa-download"></i> CSV Bahi
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Naannoo Filannoo Summary Table -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success" style="border-radius: 4px;">
                    <div class="box-header" style="padding: 8px 12px; background: #f9f9f9;">
                        <h3 class="box-title" style="font-size: 14px;"><i class="fa fa-trophy"></i> Qabxiilee Naannoo Filannoo</h3>
                        <small style="font-size: 10px;">(<?php echo date('d/m/Y', strtotime($start_date)); ?> - <?php echo date('d/m/Y', strtotime($end_date)); ?>)</small>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-default btn-sm" onclick="exportSummaryTable()">
                                <i class="fa fa-download"></i> CSV Bahi
                            </button>
                        </div>
                    </div>
                    <div class="box-body" style="padding: 10px;">
                        <div class="table-responsive" style="overflow-x: auto;">
                            <table class="table table-bordered table-striped table-condensed" style="font-size: 12px; width: 100%; min-width: 900px;">
                                <thead>
                                    <tr style="background: #00a65a; color: white;">
                                        <th style="width: 5%; text-align: center;">#</th>
                                        <th style="width: 20%;">Naannoo Filannoo</th>
                                        <th style="width: 30%;">Teessoo (Zone/Magalaa)</th>
                                        <th style="width: 8%; text-align: center;">Gabaasa</th>
                                        <th style="width: 10%; text-align: center;">Dhiirii</th>
                                        <th style="width: 10%; text-align: center;">Dubartii</th>
                                        <th style="width: 10%; text-align: center;">Waliigala</th>
                                        <th style="width: 10%; text-align: center;">Guyyaa Dhumaa</th>
                                        <th style="width: 7%; text-align: center;">Ibsa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(isset($locationSummary) && !empty($locationSummary)):
                                        $rank = 1;
                                        $grandTotalReports = 0;
                                        $grandTotalMale = 0;
                                        $grandTotalFemale = 0;
                                        $grandTotalVoters = 0;
                                        foreach($locationSummary as $loc): 
                                            $grandTotalReports += $loc->total_reports;
                                            $grandTotalMale += $loc->total_male_voters;
                                            $grandTotalFemale += $loc->total_female_voters;
                                            $grandTotalVoters += $loc->total_voters;
                                    ?>
                                      <tr>
                                        <td class="text-center" style="vertical-align: middle;"><?php echo $rank++; ?></td>
                                        <td style="vertical-align: middle;"><strong><?php echo $loc->naannoofil_id; ?></strong></td>
                                        <td style="vertical-align: middle;">
                                            <?php 
                                            $teessooName = '';
                                            if($loc->teessoo_type == 'zone') {
                                                $teessooName = $loc->zone_name;
                                            } else {
                                                $teessooName = $loc->city_name;
                                            }
                                            echo $teessooName ?: '-';
                                            ?>
                                            <span class="label label-<?php echo $loc->teessoo_type == 'zone' ? 'primary' : 'info'; ?>" style="margin-left: 8px;">
                                                <?php echo $loc->teessoo_type == 'zone' ? 'Zone' : 'Magalaa'; ?>
                                            </span>
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;"><?php echo $loc->total_reports; ?></td>
                                        <td class="text-center" style="vertical-align: middle;"><?php echo number_format($loc->total_male_voters); ?></td>
                                        <td class="text-center" style="vertical-align: middle;"><?php echo number_format($loc->total_female_voters); ?></td>
                                        <td class="text-center" style="vertical-align: middle;"><strong><?php echo number_format($loc->total_voters); ?></strong></td>
                                        <td class="text-center" style="vertical-align: middle;"><?php echo date('d/m/Y', strtotime($loc->last_report_date)); ?></td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <button class="btn btn-xs btn-info" onclick="viewNaannooFilannooDetails('<?php echo $loc->naannoofil_id; ?>', '<?php echo $loc->teessoo_type; ?>', '<?php echo $loc->teessoo_id; ?>')" title="Ilaali Qabxiilee Paartii">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </td>
                                      </tr>
                                    <?php 
                                        endforeach; 
                                    else: 
                                    ?>
                                      <tr>
                                        <td colspan="9" class="text-center">Gabaasni Naannoo Filannoo hin jiru!</td>
                                      </tr>
                                    <?php endif; ?>
                                </tbody>
                                <?php if(isset($locationSummary) && !empty($locationSummary)): ?>
                                <tfoot style="background: #f5f5f5; font-weight: bold;">
                                    <tr>
                                        <td colspan="4" class="text-right"><strong>WALIIGALA:</strong></td>
                                        <td class="text-center"><strong><?php echo number_format($grandTotalReports); ?></strong></td>
                                        <td class="text-center"><strong><?php echo number_format($grandTotalMale); ?></strong></td>
                                        <td class="text-center"><strong><?php echo number_format($grandTotalFemale); ?></strong></td>
                                        <td class="text-center"><strong><?php echo number_format($grandTotalVoters); ?></strong></td>
                                        <td class="text-center"></td>
                                    </tr>
                                </tfoot>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
</div>

<!-- Modal for Party Breakdown by Naannoo Filannoo -->
<div id="partyModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" style="width: 90%; max-width: 1000px;">
        <div class="modal-content" style="border-radius: 5px;">
            <div class="modal-header" style="background: #3c8dbc; color: white; border-radius: 5px 5px 0 0; padding: 12px 15px;">
                <button type="button" class="close" data-dismiss="modal" style="color: white; opacity: 1;">&times;</button>
                <h4 class="modal-title" style="font-size: 16px;">
                    <i class="fa fa-flag"></i> Qabxiilee Paartii: <span id="modalNaannooFilannoo"></span>
                </h4>
            </div>
            <div class="modal-body" style="padding: 15px;">
                <div id="modalLoading" class="text-center" style="display: none; padding: 50px;">
                    <i class="fa fa-spinner fa-spin fa-3x"></i>
                    <p style="margin-top: 10px;">Gabaasa fe'amaa jira...</p>
                </div>
                
                <div id="partyTableContainer" style="display: none;">
                    <div class="box box-primary" style="margin-bottom: 0;">
                        <div class="box-header with-border" style="background: #f9f9f9; padding: 8px 12px;">
                            <h3 class="box-title" style="font-size: 13px;"><i class="fa fa-list"></i> Qabxiilee Paartii (Gadi bu'aan)</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-default btn-sm" onclick="exportPartyData()">
                                    <i class="fa fa-download"></i> CSV Bahi
                                </button>
                            </div>
                        </div>
                        <div class="box-body" style="padding: 10px; overflow-x: auto;">
                            <table class="table table-bordered table-striped table-condensed" style="min-width: 600px; font-size: 12px;">
                                <thead>
                                    <tr style="background: #00a65a; color: white;">
                                        <th style="width: 5%; text-align: center;">#</th>
                                        <th style="width: 25%;">Maqaa Paartii</th>
                                        <th style="width: 10%; text-align: center;">Gabaasa</th>
                                        <th style="width: 15%; text-align: center;">Dhiirii</th>
                                        <th style="width: 15%; text-align: center;">Dubartii</th>
                                        <th style="width: 15%; text-align: center;">Waliigala</th>
                                        <th style="width: 15%; text-align: center;">% Qooda</th>
                                    </tr>
                                </thead>
                                <tbody id="partyTableBody">
                                    <tr><td colspan="7" class="text-center">Gabaasni hin jiru</td></tr>
                                </tbody>
                                <tfoot id="partyTableFooter" style="background: #f5f5f5; font-weight: bold;">
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="padding: 10px 15px;">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cufi</button>
            </div>
        </div>
    </div>
</div>

<style>
    @media (max-width: 768px) {
        .content-header h1 { font-size: 16px !important; }
        .box-title { font-size: 12px !important; }
        .table-condensed > tbody > tr > td,
        .table-condensed > thead > tr > th { 
            padding: 6px 4px !important; 
            font-size: 10px !important; 
        }
        .btn-sm { font-size: 10px !important; padding: 4px 8px !important; }
        .modal-lg { width: 95% !important; }
        .label { font-size: 8px !important; }
    }
    
    .table-condensed > tbody > tr > td,
    .table-condensed > thead > tr > th {
        padding: 8px 6px;
    }
    
    .label-primary { background-color: #3c8dbc; }
    .label-info { background-color: #00c0ef; }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
var currentPartyData = null;

function viewNaannooFilannooDetails(naannoofilId, teessooType, teessooId) {
    $('#partyModal').modal('show');
    $('#modalNaannooFilannoo').text(naannoofilId);
    
    var startDate = $('input[name="start_date"]').val();
    var endDate = $('input[name="end_date"]').val();
    var party = $('select[name="party"]').val();
    
    $('#modalLoading').show();
    $('#partyTableContainer').hide();
    
    $.ajax({
        url: '<?php echo base_url("AdminElection/getNaannooFilannooPartyDetails"); ?>',
        type: 'GET',
        data: {
            naannoofil_id: naannoofilId,
            teessoo_type: teessooType,
            teessoo_id: teessooId,
            start_date: startDate,
            end_date: endDate,
            party: party
        },
        dataType: 'json',
        success: function(response) {
            $('#modalLoading').hide();
            
            if(response.success) {
                currentPartyData = response;
                updatePartyTable(response.parties, response.total_voters);
                $('#partyTableContainer').show();
            } else {
                alert('Dogoggorri uummame: ' + (response.message || 'Gabaasni hin argamne'));
            }
        },
        error: function(xhr, status, error) {
            $('#modalLoading').hide();
            alert('Dogoggorri uummame. Yoo itti fufte, deggersa fanni.');
            console.error(error);
        }
    });
}

function updatePartyTable(parties, totalVoters) {
    var tbody = $('#partyTableBody');
    tbody.empty();
    
    if(!parties || parties.length === 0) {
        tbody.append('<tr><td colspan="7" class="text-center">Gabaasni hin jiru</td></tr>');
        $('#partyTableFooter').empty();
        return;
    }
    
    var rank = 1;
    var totalMale = 0;
    var totalFemale = 0;
    var totalGrand = 0;
    var totalReports = 0;
    
    parties.sort(function(a, b) {
        return b.total_voters - a.total_voters;
    });
    
    for(var i = 0; i < parties.length; i++) {
        var party = parties[i];
        var percentage = totalVoters > 0 ? ((party.total_voters / totalVoters) * 100).toFixed(1) : 0;
        
        var trophyHtml = '';
        if(rank === 1) {
            trophyHtml = '<i class="fa fa-trophy" style="color: gold; margin-left: 5px;"></i>';
        } else if(rank === 2) {
            trophyHtml = '<i class="fa fa-trophy" style="color: silver; margin-left: 5px;"></i>';
        } else if(rank === 3) {
            trophyHtml = '<i class="fa fa-trophy" style="color: #cd7f32; margin-left: 5px;"></i>';
        }
        
        var row = '<tr>' +
            '<td class="text-center">' + rank + '</td>' +
            '<td><strong>' + party.party_name + '</strong> ' + trophyHtml + '</td>' +
            '<td class="text-center">' + party.report_count + '</td>' +
            '<td class="text-center">' + numberWithCommas(party.total_male_voters) + '</td>' +
            '<td class="text-center">' + numberWithCommas(party.total_female_voters) + '</td>' +
            '<td class="text-center"><strong>' + numberWithCommas(party.total_voters) + '</strong></td>' +
            '<td class="text-center">' +
                '<div class="progress" style="margin: 3px 0; height: 18px;">' +
                    '<div class="progress-bar progress-bar-success" style="width: ' + percentage + '%; line-height: 18px; font-size: 10px;">' + percentage + '%</div>' +
                '</div>' +
            '</td>' +
        '</tr>';
        
        tbody.append(row);
        
        totalReports += party.report_count;
        totalMale += party.total_male_voters;
        totalFemale += party.total_female_voters;
        totalGrand += party.total_voters;
        rank++;
    }
    
    var footer = '<tr>' +
        '<td colspan="2" class="text-right"><strong>WALIIGALA:</strong></td>' +
        '<td class="text-center"><strong>' + totalReports + '</strong></td>' +
        '<td class="text-center"><strong>' + numberWithCommas(totalMale) + '</strong></td>' +
        '<td class="text-center"><strong>' + numberWithCommas(totalFemale) + '</strong></td>' +
        '<td class="text-center"><strong>' + numberWithCommas(totalGrand) + '</strong></td>' +
        '<td class="text-center"><strong>100%</strong></td>' +
    '</tr>';
    
    $('#partyTableFooter').html(footer);
}

function exportPartyData() {
    if(!currentPartyData) return;
    
    var csv = [];
    csv.push(['#', 'Maqaa Paartii', 'Gabaasa', 'Dhiirii', 'Dubartii', 'Waliigala', 'Qooda %']);
    
    var rank = 1;
    for(var i = 0; i < currentPartyData.parties.length; i++) {
        var party = currentPartyData.parties[i];
        var percentage = currentPartyData.total_voters > 0 ? ((party.total_voters / currentPartyData.total_voters) * 100).toFixed(1) : 0;
        csv.push([
            rank++,
            party.party_name,
            party.report_count,
            party.total_male_voters,
            party.total_female_voters,
            party.total_voters,
            percentage + '%'
        ]);
    }
    
    csv.push([]);
    csv.push(['WALIIGALA', '', '', '', '', currentPartyData.total_voters, '100%']);
    
    var csvContent = csv.map(row => row.join(',')).join('\n');
    var blob = new Blob(["\uFEFF" + csvContent], { type: 'text/csv;charset=utf-8;' });
    var link = document.createElement('a');
    var url = URL.createObjectURL(blob);
    link.href = url;
    link.setAttribute('download', 'qabxiilee_paartii_' + $('#modalNaannooFilannoo').text() + '_' + new Date().toISOString().slice(0,19) + '.csv');
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    URL.revokeObjectURL(url);
}

function exportSummaryTable() {
    var rows = [];
    rows.push(['#', 'Naannoo Filannoo', 'Teessoo (Zone/Magalaa)', 'Gosa Teessoo', 'Gabaasa', 'Dhiirii', 'Dubartii', 'Waliigala', 'Guyyaa Dhumaa']);
    
    <?php if(isset($locationSummary) && !empty($locationSummary)): ?>
        <?php $rank = 1; foreach($locationSummary as $loc): 
            $teessooName = '';
            if($loc->teessoo_type == 'zone') {
                $teessooName = addslashes($loc->zone_name);
            } else {
                $teessooName = addslashes($loc->city_name);
            }
        ?>
            rows.push([
                <?php echo $rank++; ?>,
                '<?php echo addslashes($loc->naannoofil_id); ?>',
                '<?php echo $teessooName; ?>',
                '<?php echo $loc->teessoo_type == 'zone' ? 'Zone' : 'Magalaa'; ?>',
                <?php echo $loc->total_reports; ?>,
                <?php echo $loc->total_male_voters; ?>,
                <?php echo $loc->total_female_voters; ?>,
                <?php echo $loc->total_voters; ?>,
                '<?php echo date('d/m/Y', strtotime($loc->last_report_date)); ?>'
            ]);
        <?php endforeach; ?>
    <?php endif; ?>
    
    var csvContent = rows.map(row => row.join(',')).join('\n');
    var blob = new Blob(["\uFEFF" + csvContent], { type: 'text/csv;charset=utf-8;' });
    var link = document.createElement('a');
    var url = URL.createObjectURL(blob);
    link.href = url;
    link.setAttribute('download', 'qabxiilee_naannoo_filannoo_' + new Date().toISOString().slice(0,19) + '.csv');
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    URL.revokeObjectURL(url);
}

function exportWithFilter() {
    var startDate = $('input[name="start_date"]').val();
    var endDate = $('input[name="end_date"]').val();
    var party = $('select[name="party"]').val();
    var teessooType = $('#teessooTypeSelect').val();
    
    var url = '<?php echo base_url("AdminElection/exportRegionData"); ?>?start_date=' + startDate + '&end_date=' + endDate + '&party=' + party + '&teessoo_type=' + teessooType;
    
    window.location.href = url;
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
</script>