<div class="content-wrapper" style="background: #f4f6f9; padding-top: 15px;">
    <!-- Content Header -->
    <section class="content-header" style="padding: 10px 20px; margin-bottom: 10px; background: white; border-bottom: 1px solid #e0e0e0;">
        <h1 style="font-size: 24px; margin: 0; font-weight: 400; color: #333;">
            <i class="fa fa-file-text-o text-green" style="margin-right: 8px;"></i> 
            Gabaasa Filannoo Paartii Ilaalchuu
            <small style="font-size: 14px; color: #777; margin-left: 5px;">Admin</small>
        </h1>
        <ol class="breadcrumb" style="padding: 0; margin: 5px 0 0; background: none;">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Daashboordii</a></li>
            <li><a href="<?php echo base_url('AdminElectionReport/dashboard'); ?>">Filannoo Paartii</a></li>
            <li><a href="<?php echo base_url('AdminElectionReport/listReports'); ?>">Gabaasa Hunda</a></li>
            <li class="active">Ilaalchuu</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="padding: 15px 20px;">
        
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default" style="border-radius: 4px;">
                    <div class="box-header" style="padding: 12px 15px; background: #f9f9f9; border-bottom: 1px solid #e0e0e0;">
                        <h3 class="box-title">
                            <i class="fa fa-info-circle"></i> Odeeffannoo Gabaasaa
                        </h3>
                        <div class="box-tools pull-right">
                            <a href="<?php echo base_url('AdminElectionReport/listReports'); ?>" class="btn btn-default btn-sm">
                                <i class="fa fa-arrow-left"></i> Duubi Deebi
                            </a>
                        </div>
                    </div>
                    <div class="box-body" style="padding: 20px;">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered" style="font-size: 14px;">
                                    <tr>
                                        <th style="width: 200px;">Guyyaa Gabaasaa:</th>
                                        <td><?php echo date('d/m/Y', strtotime($report->report_date)); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Yeroo Gabaasaa:</th>
                                        <td><?php echo date('H:i:s', strtotime($report->report_time)); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Lakk. Tarree:</th>
                                        <td>#<?php echo $report->serial_number; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Naannoo Filannoo:</th>
                                        <td><strong><?php echo $report->naannoofil_id; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <th>Maqaa Paartii:</th>
                                        <td><span class="label label-primary" style="background: #2c5f2d;"><?php echo $report->party_name; ?></span></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered" style="font-size: 14px;">
                                    <tr>
                                        <th style="width: 200px;">Gabaasaa:</th>
                                        <td><?php echo $report->reporter_name; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Bilbila:</th>
                                        <td><?php echo $report->reporter_phone ?: '-'; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td><?php echo $report->reporter_email ?: '-'; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Yeroo Galmee:</th>
                                        <td><?php echo date('d/m/Y H:i:s', strtotime($report->created_at)); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Hubannoo:</th>
                                        <td><?php echo $report->remarks ?: '-'; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <h4 style="margin-top: 20px; border-bottom: 2px solid #2c5f2d; padding-bottom: 8px;">
                            <i class="fa fa-users"></i> Odeeffannoo Filattoota
                        </h4>
                        
                        <div class="row" style="margin-top: 15px;">
                            <div class="col-md-6">
                                <div class="box box-success" style="border-top-color: #2c5f2d;">
                                    <div class="box-header">
                                        <h3 class="box-title">Miseensa</h3>
                                    </div>
                                    <div class="box-body">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Dhiirii</th>
                                                <td class="text-right"><strong><?php echo number_format($report->member_male); ?></strong></td>
                                            </tr>
                                            <tr>
                                                <th>Dubartii</th>
                                                <td class="text-right"><strong><?php echo number_format($report->member_female); ?></strong></td>
                                            </tr>
                                            <tr style="background: #e8f5e9;">
                                                <th><strong>Waliigala</strong></th>
                                                <td class="text-right"><strong><?php echo number_format($report->member_total); ?></strong></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box box-warning" style="border-top-color: #ffc107;">
                                    <div class="box-header">
                                        <h3 class="box-title">Miseensa Hin Taane</h3>
                                    </div>
                                    <div class="box-body">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Dhiirii</th>
                                                <td class="text-right"><strong><?php echo number_format($report->nonmember_male); ?></strong></td>
                                            </tr>
                                            <tr>
                                                <th>Dubartii</th>
                                                <td class="text-right"><strong><?php echo number_format($report->nonmember_female); ?></strong></td>
                                            </tr>
                                            <tr style="background: #fff8e1;">
                                                <th><strong>Waliigala</strong></th>
                                                <td class="text-right"><strong><?php echo number_format($report->nonmember_total); ?></strong></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-danger" style="border-top-color: #dc3545;">
                                    <div class="box-header">
                                        <h3 class="box-title">Waliigala Filattoota Hunda</h3>
                                    </div>
                                    <div class="box-body text-center">
                                        <h2 style="font-size: 48px; font-weight: 800; color: #dc3545; margin: 0;">
                                            <?php echo number_format($report->grand_total); ?>
                                        </h2>
                                        <p style="font-size: 16px;">Waliigala Filattoota (Miseensa + Miseensa Hin Taane)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
</div>