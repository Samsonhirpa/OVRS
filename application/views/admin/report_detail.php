<div class="content-wrapper" style="background: #f4f6f9; padding-top: 15px;">
    <!-- Content Header -->
    <section class="content-header" style="padding: 10px 20px; margin-bottom: 10px; background: white; border-bottom: 1px solid #e0e0e0;">
        <h1 style="font-size: 24px; margin: 0; font-weight: 400; color: #333;">
            <i class="fa fa-file-text text-blue" style="margin-right: 8px;"></i> 
            Gabaasa Ilaalchuu
            <small style="font-size: 14px; color: #777; margin-left: 5px;">#<?php echo $report->serial_number; ?></small>
        </h1>
        <ol class="breadcrumb" style="padding: 0; margin: 5px 0 0; background: none;">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Daashboordii</a></li>
            <li><a href="<?php echo base_url('VotingReport/listReportAll'); ?>">Gabaasa Hunda</a></li>
            <li class="active">Ilaalchuu</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="padding: 15px 20px;">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary" style="border-radius: 4px; border-top: 3px solid #2c5f2d;">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-info-circle"></i> Gabaasa Filannoo</h3>
                        <div class="box-tools pull-right">
                            <a href="<?php echo base_url('VotingReport/listReportAll'); ?>" class="btn btn-sm btn-default">
                                <i class="fa fa-arrow-left"></i> Deebi'i
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <!-- Report Info Cards -->
                        <div class="row">
                            <div class="col-md-3">
                                <div class="info-box bg-blue">
                                    <span class="info-box-icon"><i class="fa fa-calendar"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Guyyaa</span>
                                        <span class="info-box-number"><?php echo date('d/m/Y', strtotime($report->report_date)); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-box bg-green">
                                    <span class="info-box-icon"><i class="fa fa-clock-o"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Yeroo</span>
                                        <span class="info-box-number"><?php echo $report->report_session == 'morning' ? 'Ganama' : 'Waaree Booda'; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-box bg-yellow">
                                    <span class="info-box-icon"><i class="fa fa-hashtag"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Lakk. Tarree</span>
                                        <span class="info-box-number">#<?php echo $report->serial_number; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-box bg-red">
                                    <span class="info-box-icon"><i class="fa fa-map-marker"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Naannoo Filannoo</span>
                                        <span class="info-box-number"><?php echo $report->naannoofil_id; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reporter Info -->
                        <div class="box box-default" style="margin-top: 20px;">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-user"></i> Odeeffannoo Gabaasaa</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <strong>Maqaa Guutuu:</strong> 
                                        <?php 
                                            echo trim($report->first_name . ' ' . $report->middle_name . ' ' . $report->last_name);
                                        ?>
                                    </div>
                                    <div class="col-md-2">
                                        <strong>Saala:</strong> <?php echo $report->gender_name; ?>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Bilbila:</strong> <?php echo $report->reporter_phone; ?>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Email:</strong> <?php echo $report->reporter_email; ?>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-4">
                                        <strong>Teessoo:</strong> 
                                        <?php 
                                            echo $report->zone_name ?: $report->city_name ?: 'Kan hin beekamne';
                                        ?>
                                    </div>
                                    <div class="col-md-4">
                                        <strong>Aanaa/Kutaa:</strong> 
                                        <?php echo $report->woreda_name ?: $report->subcity_name ?: 'Kan hin beekamne'; ?>
                                    </div>
                                    <div class="col-md-4">
                                        <strong>Ganda:</strong> 
                                        <?php echo $report->kebele_name ?: $report->subcity_woreda_name ?: 'Kan hin beekamne'; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Karoora Section -->
                        <div class="box box-success" style="margin-top: 20px;">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-pencil"></i> Karoora (Qophii)</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <table class="table table-bordered">
                                            <tr><th colspan="3" style="background: #2c5f2d; color: white; text-align: center;">Miseensa</th></tr>
                                            <tr>
                                                <th>Dhiira</th>
                                                <th>Dubartii</th>
                                                <th>Ida'ama</th>
                                            </tr>
                                            <tr>
                                                <td><?php echo number_format($report->plan_member_male); ?></td>
                                                <td><?php echo number_format($report->plan_member_female); ?></td>
                                                <td><?php echo number_format($report->plan_member_total); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-4">
                                        <table class="table table-bordered">
                                            <tr><th colspan="3" style="background: #f39c12; color: white; text-align: center;">Miseensa Hin Taane</th></tr>
                                            <tr>
                                                <th>Dhiira</th>
                                                <th>Dubartii</th>
                                                <th>Ida'ama</th>
                                            </tr>
                                            <tr>
                                                <td><?php echo number_format($report->plan_nonmember_male); ?></td>
                                                <td><?php echo number_format($report->plan_nonmember_female); ?></td>
                                                <td><?php echo number_format($report->plan_nonmember_total); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-4">
                                        <table class="table table-bordered">
                                            <tr><th colspan="3" style="background: #00a65a; color: white; text-align: center;">Ida'ama Waliigalaa</th></tr>
                                            <tr>
                                                <th>Dhiira</th>
                                                <th>Dubartii</th>
                                                <th>Waliigala</th>
                                            </tr>
                                            <tr>
                                                <td><?php echo number_format($report->plan_total_male); ?></td>
                                                <td><?php echo number_format($report->plan_total_female); ?></td>
                                                <td><?php echo number_format($report->plan_grand_total); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Hojiin Raawwatame Section -->
                        <div class="box box-success" style="margin-top: 20px;">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-check-circle"></i> Hojiin Raawwatame</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <table class="table table-bordered">
                                            <tr><th colspan="4" style="background: #2c5f2d; color: white; text-align: center;">Miseensa</th></tr>
                                            <tr>
                                                <th>Dhiira</th>
                                                <th>Dubartii</th>
                                                <th>Ida'ama</th>
                                                <th>%</th>
                                            </tr>
                                            <tr>
                                                <td><?php echo number_format($report->actual_member_male); ?></td>
                                                <td><?php echo number_format($report->actual_member_female); ?></td>
                                                <td><?php echo number_format($report->actual_member_total); ?></td>
                                                <td><?php echo $report->actual_member_percent; ?>%</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-4">
                                        <table class="table table-bordered">
                                            <tr><th colspan="4" style="background: #f39c12; color: white; text-align: center;">Miseensa Hin Taane</th></tr>
                                            <tr>
                                                <th>Dhiira</th>
                                                <th>Dubartii</th>
                                                <th>Ida'ama</th>
                                                <th>%</th>
                                            </tr>
                                            <tr>
                                                <td><?php echo number_format($report->actual_nonmember_male); ?></td>
                                                <td><?php echo number_format($report->actual_nonmember_female); ?></td>
                                                <td><?php echo number_format($report->actual_nonmember_total); ?></td>
                                                <td><?php echo $report->actual_nonmember_percent; ?>%</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-4">
                                        <table class="table table-bordered">
                                            <tr><th colspan="4" style="background: #00a65a; color: white; text-align: center;">Ida'ama Waliigalaa</th></tr>
                                            <tr>
                                                <th>Dhiira</th>
                                                <th>Dubartii</th>
                                                <th>Waliigala</th>
                                                <th>%</th>
                                            </tr>
                                            <tr>
                                                <td><?php echo number_format($report->actual_total_male); ?></td>
                                                <td><?php echo number_format($report->actual_total_female); ?></td>
                                                <td><?php echo number_format($report->actual_grand_total); ?></td>
                                                <td><?php echo $report->actual_total_percent; ?>%</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Dabalataa Section -->
                        <div class="box box-warning" style="margin-top: 20px;">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-plus-circle"></i> Galmee Dabalataa</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-bordered">
                                            <tr><th colspan="3" style="background: #ff8c00; color: white; text-align: center;">Miseensa Dabalataa</th></tr>
                                            <tr>
                                                <th>Dhiira</th>
                                                <th>Dubartii</th>
                                                <th>Ida'ama</th>
                                            </tr>
                                            <tr>
                                                <td><?php echo number_format($report->additional_member_male); ?></td>
                                                <td><?php echo number_format($report->additional_member_female); ?></td>
                                                <td><?php echo number_format($report->additional_member_total); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-bordered">
                                            <tr><th colspan="3" style="background: #ff8c00; color: white; text-align: center;">Miseensa Hin Taane Dabalataa</th></tr>
                                            <tr>
                                                <th>Dhiira</th>
                                                <th>Dubartii</th>
                                                <th>Ida'ama</th>
                                            </tr>
                                            <tr>
                                                <td><?php echo number_format($report->additional_nonmember_male); ?></td>
                                                <td><?php echo number_format($report->additional_nonmember_female); ?></td>
                                                <td><?php echo number_format($report->additional_nonmember_total); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Remarks -->
                        <?php if($report->remarks): ?>
                        <div class="box box-default" style="margin-top: 20px;">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-comment"></i> Hubannoo</h3>
                            </div>
                            <div class="box-body">
                                <p><?php echo nl2br($report->remarks); ?></p>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Timestamps -->
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-md-6">
                                <strong>Yeroo Galmee:</strong> <?php echo date('d/m/Y H:i:s', strtotime($report->created_at)); ?>
                            </div>
                            <div class="col-md-6 text-right">
                                <?php if($report->updated_at): ?>
                                    <strong>Yeroo Fooyya'ee:</strong> <?php echo date('d/m/Y H:i:s', strtotime($report->updated_at)); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>