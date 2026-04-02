<div class="content-wrapper" style="background: #f4f6f9;">
    <!-- Content Header -->
    <section class="content-header" style="padding: 10px 15px;">
        <h1 style="font-size: 22px; margin: 0;">
            Gabaasa Ilaalchuu
            <small style="font-size: 13px;">#<?php echo $report->serial_number; ?> - <?php echo date('d/m/Y', strtotime($report->report_date)); ?></small>
        </h1>
        <ol class="breadcrumb" style="padding: 0; margin: 5px 0 0; background: none;">
            <li><a href="<?php echo base_url(); ?>VotingReport/dashboard"><i class="fa fa-dashboard"></i> Dawashii</a></li>
            <li><a href="<?php echo base_url(); ?>VotingReport/listReports">Gabaasawwan</a></li>
            <li class="active">Ilaalchuu</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="padding: 10px;">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default" style="border-radius: 0;">
                    <div class="box-header with-border">
                        <h3 class="box-title">Gabaasa <?php echo $report->report_session == 'morning' ? 'Kan Ganama' : 'Kan Waaree Booda'; ?></h3>
                        <div class="box-tools pull-right">
                            <a href="<?php echo base_url('VotingReport/listReports'); ?>" class="btn btn-sm btn-default">
                                <i class="fa fa-arrow-left"></i> Deebi'i
                            </a>
                        </div>
                    </div>
                    
                    <div class="box-body">
                        <!-- Info Row -->
                        <div class="row" style="margin-bottom: 20px; background: #f9f9f9; padding: 15px;">
                            <div class="col-md-3"><strong>Guyyaa:</strong> <?php echo date('d/m/Y', strtotime($report->report_date)); ?></div>
                            <div class="col-md-3"><strong>Yeroo:</strong> <?php echo $report->report_session == 'morning' ? 'Kan Ganama' : 'Kan Waaree Booda'; ?></div>
                            <div class="col-md-3"><strong>Lakk. Tarree:</strong> #<?php echo $report->serial_number; ?></div>
                            <div class="col-md-3"><strong>Naannoo:</strong> <?php echo $report->voting_region_name; ?></div>
                        </div>
                        
                        <!-- Summary Cards -->
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-md-3">
                                <div class="small-box bg-green" style="margin: 0;">
                                    <div class="inner">
                                        <h3><?php echo number_format($report->actual_member_total); ?></h3>
                                        <p>Ida'ama Miseensa</p>
                                    </div>
                                    <div class="icon"><i class="fa fa-users"></i></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="small-box bg-yellow" style="margin: 0;">
                                    <div class="inner">
                                        <h3><?php echo number_format($report->actual_nonmember_total); ?></h3>
                                        <p>Ida'ama Miseensa Hin Taane</p>
                                    </div>
                                    <div class="icon"><i class="fa fa-user-plus"></i></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="small-box bg-blue" style="margin: 0;">
                                    <div class="inner">
                                        <h3><?php echo number_format($report->actual_grand_total); ?></h3>
                                        <p>Waliigala</p>
                                    </div>
                                    <div class="icon"><i class="fa fa-bar-chart"></i></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="small-box bg-purple" style="margin: 0;">
                                    <div class="inner">
                                        <h3><?php echo $report->actual_total_percent; ?>%</h3>
                                        <p>Sadarkaa Raawwii</p>
                                    </div>
                                    <div class="icon"><i class="fa fa-percent"></i></div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Detailed Table -->
                        <table class="table table-bordered">
                            <tr style="background: #e3e3e3;">
                                <th colspan="9" style="text-align: center;">KAROORA</th>
                                <th colspan="12" style="text-align: center;">HOJIIN RAAWWATAME</th>
                                <th colspan="6" style="text-align: center;">DABALATAA</th>
                            </tr>
                            <tr style="background: #f0f0f0;">
                                <th colspan="3">Miseensa</th>
                                <th colspan="3">Miseensa Hin Taane</th>
                                <th colspan="3">Ida'ama Waliigalaa</th>
                                <th colspan="4">Miseensa</th>
                                <th colspan="4">Miseensa Hin Taane</th>
                                <th colspan="4">Ida'ama Waliigalaa</th>
                                <th colspan="3">Miseensa</th>
                                <th colspan="3">Miseensa Hin Taane</th>
                            </tr>
                            <tr>
                                <!-- Karoora -->
                                <td>Dhiira: <?php echo number_format($report->plan_member_male); ?></td>
                                <td>Dub: <?php echo number_format($report->plan_member_female); ?></td>
                                <td>Ida: <?php echo number_format($report->plan_member_total); ?></td>
                                <td>Dhiira: <?php echo number_format($report->plan_nonmember_male); ?></td>
                                <td>Dub: <?php echo number_format($report->plan_nonmember_female); ?></td>
                                <td>Ida: <?php echo number_format($report->plan_nonmember_total); ?></td>
                                <td>Dhiira: <?php echo number_format($report->plan_total_male); ?></td>
                                <td>Dub: <?php echo number_format($report->plan_total_female); ?></td>
                                <td>Wali: <?php echo number_format($report->plan_grand_total); ?></td>
                                
                                <!-- Hojiin Raawwatame -->
                                <td>Dh: <?php echo number_format($report->actual_member_male); ?></td>
                                <td>Db: <?php echo number_format($report->actual_member_female); ?></td>
                                <td>Id: <?php echo number_format($report->actual_member_total); ?></td>
                                <td><?php echo $report->actual_member_percent; ?>%</td>
                                <td>Dh: <?php echo number_format($report->actual_nonmember_male); ?></td>
                                <td>Db: <?php echo number_format($report->actual_nonmember_female); ?></td>
                                <td>Id: <?php echo number_format($report->actual_nonmember_total); ?></td>
                                <td><?php echo $report->actual_nonmember_percent; ?>%</td>
                                <td>Dh: <?php echo number_format($report->actual_total_male); ?></td>
                                <td>Db: <?php echo number_format($report->actual_total_female); ?></td>
                                <td>Wl: <?php echo number_format($report->actual_grand_total); ?></td>
                                <td><?php echo $report->actual_total_percent; ?>%</td>
                                
                                <!-- Dabalataa -->
                                <td>Dh: <?php echo number_format($report->additional_member_male); ?></td>
                                <td>Db: <?php echo number_format($report->additional_member_female); ?></td>
                                <td>Id: <?php echo number_format($report->additional_member_total); ?></td>
                                <td>Dh: <?php echo number_format($report->additional_nonmember_male); ?></td>
                                <td>Db: <?php echo number_format($report->additional_nonmember_female); ?></td>
                                <td>Id: <?php echo number_format($report->additional_nonmember_total); ?></td>
                            </tr>
                        </table>
                        
                        <!-- Remarks -->
                        <?php if($report->remarks): ?>
                        <div class="well" style="margin-top: 20px;">
                            <strong>Hubannoo:</strong><br>
                            <?php echo $report->remarks; ?>
                        </div>
                        <?php endif; ?>
                        
                        <!-- Meta Info -->
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-md-6">
                                <small class="text-muted">
                                    <i class="fa fa-clock-o"></i> Galmaa'e: <?php echo date('d/m/Y H:i:s', strtotime($report->created_at)); ?>
                                </small>
                            </div>
                            <div class="col-md-6 text-right">
                                <small class="text-muted">
                                    <i class="fa fa-user"></i> Gabaasaa: <?php echo $report->reporter_name; ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>