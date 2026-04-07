<div class="content-wrapper" style="background: #f4f6f9; padding-top: 15px;">
    <!-- Content Header -->
    <section class="content-header" style="padding: 10px 20px; margin-bottom: 10px; background: white; border-bottom: 1px solid #e0e0e0;">
        <h1 style="font-size: 24px; margin: 0; font-weight: 400; color: #333;">
            <i class="fa fa-bar-chart text-green" style="margin-right: 8px;"></i> 
            Daashboordii Filannoo Paartii
            <small style="font-size: 14px; color: #777; margin-left: 5px;">Admin</small>
        </h1>
        <ol class="breadcrumb" style="padding: 0; margin: 5px 0 0; background: none;">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Daashboordii</a></li>
            <li class="active">Filannoo Paartii</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="padding: 15px 20px;">
        
        <!-- Filter Form -->
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-12">
                <div class="box box-default" style="border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                    <div class="box-header" style="padding: 12px 15px; background: #f9f9f9; border-bottom: 1px solid #e0e0e0;">
                        <h3 class="box-title" style="font-size: 16px; margin: 0;">
                            <i class="fa fa-filter"></i> Calleessii Gabaasaa
                        </h3>
                    </div>
                    <div class="box-body" style="padding: 15px;">
                        <form method="get" action="<?php echo base_url('AdminElectionReport/dashboard'); ?>" class="form-inline" style="display: flex; flex-wrap: wrap; gap: 15px;">
                            <div class="form-group">
                                <label>Guyyaa Jalqabaa:</label>
                                <input type="date" name="start_date" class="form-control" value="<?php echo $start_date; ?>" style="margin-left: 5px;">
                            </div>
                            <div class="form-group">
                                <label>Guyyaa Xumuraa:</label>
                                <input type="date" name="end_date" class="form-control" value="<?php echo $end_date; ?>" style="margin-left: 5px;">
                            </div>
                            <div class="form-group">
                                <label>Naannoo:</label>
                                <select name="region_id" class="form-control" style="margin-left: 5px; min-width: 150px;">
                                    <option value="all" <?php echo $selected_region == 'all' ? 'selected' : ''; ?>>Naannoo Hunda</option>
                                    <?php foreach($regions as $region): ?>
                                        <option value="<?php echo $region->region_code; ?>" <?php echo $selected_region == $region->region_code ? 'selected' : ''; ?>>
                                            <?php echo $region->region_code; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" style="background: #2c5f2d; border-color: #2c5f2d;">
                                    <i class="fa fa-search"></i> Ilaali
                                </button>
                                <a href="<?php echo base_url('AdminElectionReport/dashboard'); ?>" class="btn btn-default">
                                    <i class="fa fa-refresh"></i> Haari
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box" style="background: #2c5f2d; color: white; border-radius: 4px; padding: 20px; margin-bottom: 0;">
                    <div class="inner">
                        <h3 style="font-size: 36px; margin: 0 0 5px;"><?php echo number_format($summary->total_reports); ?></h3>
                        <p style="font-size: 16px; margin: 0;">Waliigala Gabaasa</p>
                    </div>
                    <div class="icon" style="position: absolute; right: 10px; top: 15px; font-size: 70px; opacity: 0.3;">
                        <i class="fa fa-file-text-o"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box" style="background: #17a2b8; color: white; border-radius: 4px; padding: 20px; margin-bottom: 0;">
                    <div class="inner">
                        <h3 style="font-size: 36px; margin: 0 0 5px;"><?php echo number_format($summary->total_voters); ?></h3>
                        <p style="font-size: 16px; margin: 0;">Waliigala Filattoota</p>
                    </div>
                    <div class="icon" style="position: absolute; right: 10px; top: 15px; font-size: 70px; opacity: 0.3;">
                        <i class="fa fa-users"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box" style="background: #ffc107; color: #333; border-radius: 4px; padding: 20px; margin-bottom: 0;">
                    <div class="inner">
                        <h3 style="font-size: 36px; margin: 0 0 5px;"><?php echo number_format($summary->total_members); ?></h3>
                        <p style="font-size: 16px; margin: 0;">Miseensa</p>
                    </div>
                    <div class="icon" style="position: absolute; right: 10px; top: 15px; font-size: 70px; opacity: 0.3;">
                        <i class="fa fa-user-plus"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box" style="background: #dc3545; color: white; border-radius: 4px; padding: 20px; margin-bottom: 0;">
                    <div class="inner">
                        <h3 style="font-size: 36px; margin: 0 0 5px;"><?php echo number_format($summary->total_regions); ?></h3>
                        <p style="font-size: 16px; margin: 0;">Naannoo Filannoo</p>
                    </div>
                    <div class="icon" style="position: absolute; right: 10px; top: 15px; font-size: 70px; opacity: 0.3;">
                        <i class="fa fa-map-marker"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-6">
                <div class="box box-default" style="border-radius: 4px;">
                    <div class="box-header" style="padding: 12px 15px; background: #f9f9f9; border-bottom: 1px solid #e0e0e0;">
                        <h3 class="box-title"><i class="fa fa-line-chart"></i> Filattoota Guyyaa Guyyaa (Guyyaa 30)</h3>
                    </div>
                    <div class="box-body" style="padding: 15px;">
                        <canvas id="dailyChart" style="width: 100%; height: 300px;"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-default" style="border-radius: 4px;">
                    <div class="box-header" style="padding: 12px 15px; background: #f9f9f9; border-bottom: 1px solid #e0e0e0;">
                        <h3 class="box-title"><i class="fa fa-bar-chart"></i> Filattoota Ji'aa Ji'aa (<?php echo date('Y'); ?>)</h3>
                    </div>
                    <div class="box-body" style="padding: 15px;">
                        <canvas id="monthlyChart" style="width: 100%; height: 300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Party and Region Breakdown -->
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-6">
                <div class="box box-default" style="border-radius: 4px;">
                    <div class="box-header" style="padding: 12px 15px; background: #f9f9f9; border-bottom: 1px solid #e0e0e0;">
                        <h3 class="box-title"><i class="fa fa-flag"></i> Cita Paartii</h3>
                    </div>
                    <div class="box-body" style="padding: 15px;">
                        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                            <table class="table table-bordered table-hover" style="font-size: 13px;">
                                <thead>
                                    <tr style="background: #2c5f2d; color: white;">
                                        <th>Paartii</th>
                                        <th class="text-center">Gabaasa</th>
                                        <th class="text-center">Miseensa</th>
                                        <th class="text-center">Mis Hin Taane</th>
                                        <th class="text-center">Waliigala</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($party_breakdown as $party): ?>
                                    <tr>
                                        <td><strong><?php echo $party->party_name; ?></strong></td>
                                        <td class="text-center"><?php echo $party->report_count; ?></td>
                                        <td class="text-center"><?php echo number_format($party->member_total); ?></td>
                                        <td class="text-center"><?php echo number_format($party->nonmember_total); ?></td>
                                        <td class="text-center"><strong><?php echo number_format($party->total_voters); ?></strong></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php if(empty($party_breakdown)): ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Gabaasi hin jiru!</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                             </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-default" style="border-radius: 4px;">
                    <div class="box-header" style="padding: 12px 15px; background: #f9f9f9; border-bottom: 1px solid #e0e0e0;">
                        <h3 class="box-title"><i class="fa fa-trophy"></i> Naannoo Filannoo Olii (Top 10)</h3>
                    </div>
                    <div class="box-body" style="padding: 15px;">
                        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                            <table class="table table-bordered table-hover" style="font-size: 13px;">
                                <thead>
                                    <tr style="background: #2c5f2d; color: white;">
                                        <th>#</th>
                                        <th>Naannoo Filannoo</th>
                                        <th class="text-center">Gabaasa</th>
                                        <th class="text-center">Filattoota</th>
                                        <th class="text-center">Miseensa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($top_regions as $region): ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><strong><?php echo $region->naannoofil_id; ?></strong></td>
                                        <td class="text-center"><?php echo $region->report_count; ?></td>
                                        <td class="text-center"><strong><?php echo number_format($region->total_voters); ?></strong></td>
                                        <td class="text-center"><?php echo number_format($region->total_members); ?></td>
                                     </tr>
                                    <?php endforeach; ?>
                                    <?php if(empty($top_regions)): ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Gabaasi hin jiru!</td>
                                     </tr>
                                    <?php endif; ?>
                                </tbody>
                             </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gender Breakdown -->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default" style="border-radius: 4px;">
                    <div class="box-header" style="padding: 12px 15px; background: #f9f9f9; border-bottom: 1px solid #e0e0e0;">
                        <h3 class="box-title"><i class="fa fa-venus-mars"></i> Cita Saalaa</h3>
                    </div>
                    <div class="box-body" style="padding: 15px;">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 style="text-align: center;">Miseensa</h4>
                                <div class="progress" style="height: 30px; margin-bottom: 10px;">
                                    <div class="progress-bar progress-bar-success" style="width: <?php echo ($gender_breakdown->male_members + $gender_breakdown->female_members) > 0 ? ($gender_breakdown->male_members / ($gender_breakdown->male_members + $gender_breakdown->female_members) * 100) : 0; ?>%; background: #2c5f2d;">
                                        Dhiirii <?php echo number_format($gender_breakdown->male_members); ?>
                                    </div>
                                    <div class="progress-bar progress-bar-warning" style="width: <?php echo ($gender_breakdown->male_members + $gender_breakdown->female_members) > 0 ? ($gender_breakdown->female_members / ($gender_breakdown->male_members + $gender_breakdown->female_members) * 100) : 0; ?>%; background: #ffc107;">
                                        Dubartii <?php echo number_format($gender_breakdown->female_members); ?>
                                    </div>
                                </div>
                                <p class="text-center">
                                    <strong>Waliigala Miseensa:</strong> <?php echo number_format($gender_breakdown->male_members + $gender_breakdown->female_members); ?>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h4 style="text-align: center;">Miseensa Hin Taane</h4>
                                <div class="progress" style="height: 30px; margin-bottom: 10px;">
                                    <div class="progress-bar progress-bar-success" style="width: <?php echo ($gender_breakdown->male_nonmembers + $gender_breakdown->female_nonmembers) > 0 ? ($gender_breakdown->male_nonmembers / ($gender_breakdown->male_nonmembers + $gender_breakdown->female_nonmembers) * 100) : 0; ?>%; background: #17a2b8;">
                                        Dhiirii <?php echo number_format($gender_breakdown->male_nonmembers); ?>
                                    </div>
                                    <div class="progress-bar progress-bar-warning" style="width: <?php echo ($gender_breakdown->male_nonmembers + $gender_breakdown->female_nonmembers) > 0 ? ($gender_breakdown->female_nonmembers / ($gender_breakdown->male_nonmembers + $gender_breakdown->female_nonmembers) * 100) : 0; ?>%; background: #ffc107;">
                                        Dubartii <?php echo number_format($gender_breakdown->female_nonmembers); ?>
                                    </div>
                                </div>
                                <p class="text-center">
                                    <strong>Waliigala Miseensa Hin Taane:</strong> <?php echo number_format($gender_breakdown->male_nonmembers + $gender_breakdown->female_nonmembers); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="row">
            <div class="col-md-12 text-right" style="margin-top: 10px;">
                <a href="<?php echo base_url('AdminElectionReport/listReports'); ?>" class="btn btn-primary" style="background: #2c5f2d; border-color: #2c5f2d;">
                    <i class="fa fa-list"></i> Gabaasa Hunda Ilaali
                </a>
                <a href="<?php echo base_url('AdminElectionReport/exportReports'); ?>" class="btn btn-success" style="margin-left: 10px;">
                    <i class="fa fa-download"></i> Export (CSV)
                </a>
            </div>
        </div>
    </section>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Daily Chart
    var dailyCtx = document.getElementById('dailyChart').getContext('2d');
    var dailyChart = new Chart(dailyCtx, {
        type: 'line',
        data: {
            labels: <?php echo $daily_labels; ?>,
            datasets: [{
                label: 'Waliigala Filattoota',
                data: <?php echo $daily_data; ?>,
                borderColor: '#2c5f2d',
                backgroundColor: 'rgba(44, 95, 45, 0.1)',
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });

    // Monthly Chart
    var monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
    var monthlyChart = new Chart(monthlyCtx, {
        type: 'bar',
        data: {
            labels: <?php echo $monthly_labels; ?>,
            datasets: [{
                label: 'Waliigala Filattoota',
                data: <?php echo $monthly_data; ?>,
                backgroundColor: '#2c5f2d',
                borderColor: '#1e4220',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });
</script>