<div class="content-wrapper" style="background: #f4f6f9; padding-top: 15px;">
    <!-- Content Header -->
    <section class="content-header" style="padding: 10px 20px; margin-bottom: 10px; background: white; border-bottom: 1px solid #e0e0e0;">
        <h1 style="font-size: 24px; margin: 0; font-weight: 400; color: #333;">
            <i class="fa fa-list-alt text-blue" style="margin-right: 8px;"></i> 
            Gabaasa Filannoo Hunda
            <small style="font-size: 14px; color: #777; margin-left: 5px;">Admin - Oromia PP</small>
        </h1>
        <ol class="breadcrumb" style="padding: 0; margin: 5px 0 0; background: none;">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Daashboordii</a></li>
            <li class="active">Gabaasa Filannoo Hunda</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="padding: 15px 20px;">
        
        <!-- Flash Messages -->
        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" style="border-radius: 4px; padding: 12px 15px; margin-bottom: 20px; border-left: 4px solid #2c5f2d;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>
        
        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible" style="border-radius: 4px; padding: 12px 15px; margin-bottom: 20px; border-left: 4px solid #c9302c;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="fa fa-exclamation-circle"></i> <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <!-- Summary Cards -->
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-2 col-sm-4">
                <div class="small-box bg-blue" style="border-radius: 4px; margin-bottom: 0;">
                    <div class="inner">
                        <h3><?php echo $summary->total_reports; ?></h3>
                        <p>Waliigala Gabaasa</p>
                    </div>
                    <div class="icon"><i class="fa fa-file-text"></i></div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4">
                <div class="small-box bg-green" style="border-radius: 4px; margin-bottom: 0;">
                    <div class="inner">
                        <h3><?php echo number_format($summary->total_voters); ?></h3>
                        <p>Filattoota</p>
                    </div>
                    <div class="icon"><i class="fa fa-users"></i></div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4">
                <div class="small-box bg-yellow" style="border-radius: 4px; margin-bottom: 0;">
                    <div class="inner">
                        <h3><?php echo $summary->unique_regions; ?></h3>
                        <p>Naannoo Filannoo</p>
                    </div>
                    <div class="icon"><i class="fa fa-map-marker"></i></div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4">
                <div class="small-box bg-purple" style="border-radius: 4px; margin-bottom: 0;">
                    <div class="inner">
                        <h3><?php echo number_format($summary->member_male + $summary->member_female); ?></h3>
                        <p>Miseensa</p>
                    </div>
                    <div class="icon"><i class="fa fa-id-card"></i></div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4">
                <div class="small-box bg-orange" style="border-radius: 4px; margin-bottom: 0;">
                    <div class="inner">
                        <h3><?php echo number_format($summary->nonmember_male + $summary->nonmember_female); ?></h3>
                        <p>Miseensa Hin Taane</p>
                    </div>
                    <div class="icon"><i class="fa fa-user-plus"></i></div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4">
                <div class="small-box bg-red" style="border-radius: 4px; margin-bottom: 0;">
                    <div class="inner">
                        <h3><?php echo date('d/m/Y', strtotime($start_date)); ?> - <?php echo date('d/m/Y', strtotime($end_date)); ?></h3>
                        <p>Guyyaa</p>
                    </div>
                    <div class="icon"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>

        <!-- Gender Breakdown -->
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-12">
                <div class="box box-info" style="border-radius: 4px;">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-venus-mars"></i> Filattoota Saalaan</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="info-box bg-green">
                                    <span class="info-box-icon"><i class="fa fa-male"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Miseensa Dhiira</span>
                                        <span class="info-box-number"><?php echo number_format($summary->member_male); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="info-box bg-green">
                                    <span class="info-box-icon"><i class="fa fa-female"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Miseensa Dubartii</span>
                                        <span class="info-box-number"><?php echo number_format($summary->member_female); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="info-box bg-yellow">
                                    <span class="info-box-icon"><i class="fa fa-male"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Miseensa Hin Taane Dhiira</span>
                                        <span class="info-box-number"><?php echo number_format($summary->nonmember_male); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="info-box bg-yellow">
                                    <span class="info-box-icon"><i class="fa fa-female"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Miseensa Hin Taane Dubartii</span>
                                        <span class="info-box-number"><?php echo number_format($summary->nonmember_female); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Form -->
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-12">
                <div class="box box-default" style="border-radius: 4px;">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-filter"></i> Calleessii Gabaasa</h3>
                    </div>
                    <div class="box-body">
                        <form method="get" action="<?php echo base_url('VotingReport/listReportAll'); ?>" class="form-inline">
                            <div class="form-group" style="margin-right: 15px; margin-bottom: 10px;">
                                <label>Guyyaa Jalqabaa:</label>
                                <input type="date" name="start_date" class="form-control" value="<?php echo $start_date; ?>" style="height: 35px;">
                            </div>
                            <div class="form-group" style="margin-right: 15px; margin-bottom: 10px;">
                                <label>Guyyaa Xumuraa:</label>
                                <input type="date" name="end_date" class="form-control" value="<?php echo $end_date; ?>" style="height: 35px;">
                            </div>
                            <div class="form-group" style="margin-right: 15px; margin-bottom: 10px;">
                                <label>Yeroo:</label>
                                <select name="session" class="form-control" style="height: 35px; min-width: 150px;">
                                    <option value="all" <?php echo $session == 'all' ? 'selected' : ''; ?>>Hunda</option>
                                    <option value="morning" <?php echo $session == 'morning' ? 'selected' : ''; ?>>Kan Ganama</option>
                                    <option value="afternoon" <?php echo $session == 'afternoon' ? 'selected' : ''; ?>>Kan Waaree Booda</option>
                                </select>
                            </div>
                            <div class="form-group" style="margin-right: 15px; margin-bottom: 10px;">
                                <label>Naannoo Filannoo:</label>
                                <select name="region_id" class="form-control" style="height: 35px; min-width: 200px;">
                                    <option value="all" <?php echo $selected_region == 'all' ? 'selected' : ''; ?>>Hunda</option>
                                    <?php foreach($regions as $region): ?>
                                        <option value="<?php echo $region->naannoofil; ?>" <?php echo $selected_region == $region->naannoofil ? 'selected' : ''; ?>>
                                            <?php echo $region->naannoofil; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group" style="margin-right: 15px; margin-bottom: 10px;">
                                <label>Barbaadi:</label>
                                <input type="text" name="search" class="form-control" placeholder="Maqaa, naannoo, teessoo..." value="<?php echo $search; ?>" style="height: 35px; min-width: 200px;">
                            </div>
                            <div class="form-group" style="margin-bottom: 10px;">
                                <button type="submit" class="btn btn-primary" style="background: #2c5f2d; border-color: #2c5f2d; height: 35px;">
                                    <i class="fa fa-filter"></i> Calleessii
                                </button>
                                <a href="<?php echo base_url('VotingReport/listReportAll'); ?>" class="btn btn-default" style="height: 35px;">
                                    <i class="fa fa-refresh"></i> Haari
                                </a>
                                <a href="<?php echo base_url('VotingReport/exportReports'); ?>?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&session=<?php echo $session; ?>&region_id=<?php echo $selected_region; ?>" class="btn btn-success" style="height: 35px;">
                                    <i class="fa fa-file-excel-o"></i> Export
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reports Table -->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary" style="border-radius: 4px; border-top: 3px solid #2c5f2d;">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-list"></i> Gabaasawwan Filannoo</h3>
                        <div class="box-tools pull-right">
                            <span class="label label-primary">Waliigala: <?php echo count($reports); ?></span>
                        </div>
                    </div>
                    <div class="box-body">
                        <?php if(empty($reports)): ?>
                            <div class="alert alert-info">
                                <i class="fa fa-info-circle"></i> Gabaasi hin argamne!
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="reportsTable">
                                    <thead>
                                        <tr style="background: #2c5f2d; color: white;">
                                            <th style="text-align: center;">#</th>
                                            <th>Guyyaa</th>
                                            <th>Yeroo</th>
                                            <th>Naannoo Filannoo</th>
                                            <th>Gabaasaa</th>
                                            <th>Teessoo</th>
                                            <th style="text-align: center;">Miseensa</th>
                                            <th style="text-align: center;">Miseensa Hin Taane</th>
                                            <th style="text-align: center;">Waliigala</th>
                                            <th style="text-align: center;">Yeroo Galmee</th>
                                            <th style="text-align: center;">Gocha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach($reports as $report): 
                                            $full_name = trim($report->first_name . ' ' . $report->middle_name . ' ' . $report->last_name);
                                            if(empty($full_name)) $full_name = $report->reporter_name;
                                            
                                            $location = '';
                                            if($report->zone_name) $location = $report->zone_name;
                                            elseif($report->city_name) $location = $report->city_name;
                                            else $location = 'Kan hin beekamne';
                                        ?>
                                        <tr>
                                            <td style="text-align: center; vertical-align: middle;"><?php echo $i++; ?></td>
                                            <td style="vertical-align: middle;"><?php echo date('d/m/Y', strtotime($report->report_date)); ?></td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <?php if($report->report_session == 'morning'): ?>
                                                    <span class="label label-warning">Ganama</span>
                                                <?php else: ?>
                                                    <span class="label label-primary">Waaree Booda</span>
                                                <?php endif; ?>
                                            </td>
                                            <td style="vertical-align: middle; font-weight: 600;"><?php echo $report->naannoofil_id; ?></td>
                                            <td style="vertical-align: middle;">
                                                <strong><?php echo $full_name; ?></strong><br>
                                                <small><?php echo $report->reporter_phone; ?></small>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <?php echo $location; ?><br>
                                                <small><?php echo $report->woreda_name ?: $report->subcity_name; ?></small>
                                            </td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <span class="badge bg-green"><?php echo number_format($report->actual_member_male); ?> D</span><br>
                                                <span class="badge bg-green"><?php echo number_format($report->actual_member_female); ?> Dub</span>
                                            </td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <span class="badge bg-yellow"><?php echo number_format($report->actual_nonmember_male); ?> D</span><br>
                                                <span class="badge bg-yellow"><?php echo number_format($report->actual_nonmember_female); ?> Dub</span>
                                            </td>
                                            <td style="text-align: center; vertical-align: middle; font-weight: 700; color: #2c5f2d;">
                                                <?php echo number_format($report->actual_grand_total); ?>
                                            </td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <?php echo date('H:i', strtotime($report->created_at)); ?><br>
                                                <small><?php echo date('d/m', strtotime($report->created_at)); ?></small>
                                            </td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <a href="<?php echo base_url('VotingReport/viewReportDetail/'.$report->id); ?>" class="btn btn-xs btn-info" title="Ilaalchuu">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- DataTables CSS and JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    $('#reportsTable').DataTable({
        "pageLength": 25,
        "language": {
            "search": "Barbaadi:",
            "lengthMenu": "Agarsiisi _MENU_ galmee",
            "info": "Galmee _START_ hanga _END_ kan _TOTAL_ keessaa",
            "infoEmpty": "Galmeen hin jiru",
            "infoFiltered": "(yiddu _MAX_ galmee keessaa calleefame)",
            "zeroRecords": "Wanti walsimu hin jiru",
            "paginate": {
                "first": "Jalqaba",
                "last": "Dhuma",
                "next": "Kan ittu",
                "previous": "Kan dura"
            }
        }
    });
});
</script>

<style>
    .badge {
        font-size: 11px;
        padding: 3px 6px;
    }
    .table td {
        vertical-align: middle;
    }
    .small-box {
        border-radius: 4px;
        margin-bottom: 20px;
    }
    .info-box {
        border-radius: 4px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    .bg-blue { background: #0073b7; color: white; }
    .bg-purple { background: #605ca8; color: white; }
    .bg-orange { background: #ff851b; color: white; }
</style>