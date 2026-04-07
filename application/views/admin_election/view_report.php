<div class="content-wrapper" style="background: #f4f6f9;">
    <section class="content-header" style="padding: 15px 20px;">
        <h1><i class="fa fa-file-text"></i> Election Report Details</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url('AdminElection/dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo base_url('AdminElection/partyReports'); ?>">Party Reports</a></li>
            <li class="active">View Report</li>
        </ol>
    </section>

    <section class="content" style="padding: 15px 20px;">
        
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <i class="fa fa-flag"></i> Report Information
                        </h3>
                        <div class="box-tools pull-right">
                            <span class="label label-success">Report #<?php echo $report->serial_number; ?></span>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="40%">Report Date:</th>
                                        <td><?php echo date('l, d F Y', strtotime($report->report_date)); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Session:</th>
                                        <td>
                                            <?php if($report->report_session == 'morning'): ?>
                                                <span class="label label-warning">Morning (Ganama)</span>
                                            <?php else: ?>
                                                <span class="label label-info">Afternoon (Waaree Booda)</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Report Time:</th>
                                        <td><?php echo date('h:i A', strtotime($report->report_time)); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Serial Number:</th>
                                        <td><strong>#<?php echo $report->serial_number; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <th>Region:</th>
                                        <td><?php echo $report->naannoofil_id; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="40%">Political Party:</th>
                                        <td><strong><?php echo $report->party_name; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <th>Reporter Name:</th>
                                        <td><?php echo $report->reporter_name; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Reported On:</th>
                                        <td><?php echo date('d/m/Y h:i A', strtotime($report->created_at)); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Last Updated:</th>
                                        <td><?php echo $report->updated_at ? date('d/m/Y h:i A', strtotime($report->updated_at)) : 'Not updated'; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-md-12">
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><i class="fa fa-users"></i> Voter Statistics</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="info-box" style="margin-bottom: 0;">
                                                    <span class="info-box-icon bg-green"><i class="fa fa-male"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-text">Male Voters</span>
                                                        <span class="info-box-number"><?php echo number_format($report->male_voters); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="info-box" style="margin-bottom: 0;">
                                                    <span class="info-box-icon bg-yellow"><i class="fa fa-female"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-text">Female Voters</span>
                                                        <span class="info-box-number"><?php echo number_format($report->female_voters); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="info-box" style="margin-bottom: 0;">
                                                    <span class="info-box-icon bg-red"><i class="fa fa-check-circle"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-text">Total Elected Voters</span>
                                                        <span class="info-box-number"><?php echo number_format($report->grand_total); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php if($report->remarks): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><i class="fa fa-comment"></i> Remarks</h3>
                                    </div>
                                    <div class="box-body">
                                        <p><?php echo nl2br(htmlspecialchars($report->remarks)); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="<?php echo base_url('AdminElection/partyReports'); ?>" class="btn btn-default">
                                    <i class="fa fa-arrow-left"></i> Back to Reports
                                </a>
                                <a href="<?php echo base_url('AdminElection/dashboard'); ?>" class="btn btn-primary">
                                    <i class="fa fa-dashboard"></i> Dashboard
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
</div>

<style>
    .info-box {
        display: block;
        min-height: 90px;
        background: #fff;
        width: 100%;
        box-shadow: 0 1px 1px rgba(0,0,0,0.1);
        border-radius: 2px;
        margin-bottom: 15px;
    }
    .info-box-icon {
        border-top-left-radius: 2px;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 2px;
        display: block;
        float: left;
        height: 90px;
        width: 90px;
        text-align: center;
        font-size: 45px;
        line-height: 90px;
        background: rgba(0,0,0,0.2);
    }
    .info-box-content {
        padding: 5px 10px;
        margin-left: 90px;
    }
    .info-box-number {
        display: block;
        font-weight: bold;
        font-size: 18px;
    }
    .bg-green { background-color: #00a65a; color: #fff; }
    .bg-yellow { background-color: #f39c12; color: #fff; }
    .bg-red { background-color: #dd4b39; color: #fff; }
</style>