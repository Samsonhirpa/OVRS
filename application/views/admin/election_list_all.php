<div class="content-wrapper" style="background: #f4f6f9; padding-top: 15px;">
    <!-- Content Header -->
    <section class="content-header" style="padding: 10px 20px; margin-bottom: 10px; background: white; border-bottom: 1px solid #e0e0e0;">
        <h1 style="font-size: 24px; margin: 0; font-weight: 400; color: #333;">
            <i class="fa fa-list-alt text-green" style="margin-right: 8px;"></i> 
            Gabaasawwan Filannoo Paartii Hunda
            <small style="font-size: 14px; color: #777; margin-left: 5px;">Admin</small>
        </h1>
        <ol class="breadcrumb" style="padding: 0; margin: 5px 0 0; background: none;">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Daashboordii</a></li>
            <li><a href="<?php echo base_url('AdminElectionReport/dashboard'); ?>">Filannoo Paartii</a></li>
            <li class="active">Gabaasa Hunda</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="padding: 15px 20px;">
        
        <!-- Filter Form -->
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-12">
                <div class="box box-default" style="border-radius: 4px;">
                    <div class="box-header" style="padding: 12px 15px; background: #f9f9f9; border-bottom: 1px solid #e0e0e0;">
                        <h3 class="box-title"><i class="fa fa-filter"></i> Calleessii Gabaasaa</h3>
                    </div>
                    <div class="box-body" style="padding: 15px;">
                        <form method="get" action="<?php echo base_url('AdminElectionReport/listReports'); ?>" class="form-inline" style="display: flex; flex-wrap: wrap; gap: 10px;">
                            <div class="form-group">
                                <input type="date" name="start_date" class="form-control" value="<?php echo $start_date; ?>" placeholder="Guyyaa Jalqabaa">
                            </div>
                            <div class="form-group">
                                <input type="date" name="end_date" class="form-control" value="<?php echo $end_date; ?>" placeholder="Guyyaa Xumuraa">
                            </div>
                            <div class="form-group">
                                <select name="party" class="form-control">
                                    <?php foreach($parties as $key => $party_name): ?>
                                        <option value="<?php echo $key; ?>" <?php echo $selected_party == $key ? 'selected' : ''; ?>>
                                            <?php echo $party_name; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="region_id" class="form-control">
                                    <option value="all" <?php echo $selected_region == 'all' ? 'selected' : ''; ?>>Naannoo Hunda</option>
                                    <?php foreach($regions as $region): ?>
                                        <option value="<?php echo $region->region_code; ?>" <?php echo $selected_region == $region->region_code ? 'selected' : ''; ?>>
                                            <?php echo $region->region_code; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="search" class="form-control" placeholder="Barbaadi..." value="<?php echo $search; ?>" style="min-width: 200px;">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" style="background: #2c5f2d; border-color: #2c5f2d;">
                                    <i class="fa fa-search"></i> Calleessii
                                </button>
                                <a href="<?php echo base_url('AdminElectionReport/listReports'); ?>" class="btn btn-default">
                                    <i class="fa fa-refresh"></i> Haari
                                </a>
                                <a href="<?php echo base_url('AdminElectionReport/exportReports?start_date='.$start_date.'&end_date='.$end_date.'&party='.$selected_party.'&region_id='.$selected_region); ?>" class="btn btn-success">
                                    <i class="fa fa-download"></i> Export (CSV)
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Summary Row -->
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-3 col-xs-6">
                <div class="info-box" style="background: #2c5f2d; color: white; padding: 15px; border-radius: 4px;">
                    <span class="info-box-icon"><i class="fa fa-file-text-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Waliigala Gabaasa</span>
                        <span class="info-box-number"><?php echo $summary->total_reports; ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="info-box" style="background: #17a2b8; color: white; padding: 15px; border-radius: 4px;">
                    <span class="info-box-icon"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Waliigala Filattoota</span>
                        <span class="info-box-number"><?php echo number_format($summary->total_voters); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="info-box" style="background: #ffc107; color: #333; padding: 15px; border-radius: 4px;">
                    <span class="info-box-icon"><i class="fa fa-user-plus"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Miseensa</span>
                        <span class="info-box-number"><?php echo number_format($summary->total_members); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="info-box" style="background: #6c757d; color: white; padding: 15px; border-radius: 4px;">
                    <span class="info-box-icon"><i class="fa fa-map-marker"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Naannoo</span>
                        <span class="info-box-number"><?php echo $summary->total_regions; ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reports Table -->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default" style="border-radius: 4px;">
                    <div class="box-header" style="padding: 12px 15px; background: #f9f9f9; border-bottom: 1px solid #e0e0e0;">
                        <h3 class="box-title"><i class="fa fa-list"></i> Gabaasawwan Filannoo Paartii</h3>
                    </div>
                    <div class="box-body" style="padding: 15px;">
                        <div class="table-responsive" style="overflow-x: auto;">
                            <table class="table table-bordered table-hover" style="font-size: 12px; min-width: 1000px;">
                                <thead>
                                    <tr style="background: #2c5f2d; color: white;">
                                        <th>#</th>
                                        <th>Guyyaa</th>
                                        <th>Naannoo</th>
                                        <th>Paartii</th>
                                        <th>Gabaasaa</th>
                                        <th class="text-center">Miseensa</th>
                                        <th class="text-center">Mis Hin Taane</th>
                                        <th class="text-center">Waliigala</th>
                                        <th>Yeroo Galmee</th>
                                        <th class="text-center">Gocha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(empty($reports)): ?>
                                    <tr>
                                        <td colspan="10" class="text-center">Gabaasi hin jiru!</td>
                                    </tr>
                                    <?php else: ?>
                                    <?php $i=1; foreach($reports as $report): ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($report->report_date)); ?></td>
                                        <td><strong><?php echo $report->naannoofil_id; ?></strong></td>
                                        <td><?php echo $report->party_name; ?></td>
                                        <td><?php echo $report->reporter_name; ?></td>
                                        <td class="text-center"><?php echo number_format($report->member_total); ?></td>
                                        <td class="text-center"><?php echo number_format($report->nonmember_total); ?></td>
                                        <td class="text-center"><strong><?php echo number_format($report->grand_total); ?></strong></td>
                                        <td><?php echo date('H:i', strtotime($report->created_at)); ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url('AdminElectionReport/viewReport/'.$report->id); ?>" class="btn btn-xs btn-info" title="Ilaalchuu">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                             </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>