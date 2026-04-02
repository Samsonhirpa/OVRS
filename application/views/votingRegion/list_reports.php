<div class="content-wrapper" style="background: #f4f6f9; padding-top: 15px;">
    <!-- Content Header -->
    <section class="content-header" style="padding: 10px 20px; margin-bottom: 10px; background: white; border-bottom: 1px solid #e0e0e0;">
        <h1 style="font-size: 24px; margin: 0; font-weight: 400; color: #333;">
            <i class="fa fa-list-alt text-green" style="margin-right: 8px;"></i> Gabaasawwan Naannoo Koo
            <small style="font-size: 14px; color: #777; margin-left: 5px;"><?php echo $voting_region_name; ?></small>
        </h1>
        <ol class="breadcrumb" style="padding: 0; margin: 5px 0 0; background: none;">
            <li><a href="<?php echo base_url(); ?>VotingReport/dashboard"><i class="fa fa-dashboard"></i> Daashboordii</a></li>
            <li class="active">Gabaasawwan Koo</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="padding: 15px 20px;">
        
        <!-- Region Info Card -->
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-12">
                <div class="box box-success" style="border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); border-left: 4px solid #2c5f2d;">
                    <div class="box-body" style="padding: 15px 20px; background: #f9f9f9;">
                        <div class="row">
                            <div class="col-md-6">
                                <strong style="font-size: 16px;">
                                    <i class="fa fa-map-marker text-green" style="margin-right: 8px;"></i>
                                    Naannoo Filannoo: <span style="color: #2c5f2d; font-weight: 700;"><?php echo $voting_region_name; ?></span>
                                </strong>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong style="font-size: 16px;">
                                    <i class="fa fa-user text-green" style="margin-right: 8px;"></i>
                                    Gabaasaa: <span style="color: #2c5f2d; font-weight: 700;"><?php echo $name; ?></span>
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Flash Messages -->
        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" style="border-radius: 4px; padding: 12px 15px; margin-bottom: 20px; border-left: 4px solid #2c5f2d; background: #dff0d8; color: #3c763d;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color: #3c763d;">&times;</button>
                <i class="icon fa fa-check-circle" style="margin-right: 8px;"></i> 
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible" style="border-radius: 4px; padding: 12px 15px; margin-bottom: 20px; border-left: 4px solid #c9302c; background: #f2dede; color: #a94442;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color: #a94442;">&times;</button>
                <i class="icon fa fa-exclamation-circle" style="margin-right: 8px;"></i> 
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-default" style="border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); border-top: 3px solid #2c5f2d;">
                    <div class="box-header with-border" style="padding: 15px 20px; border-bottom: 1px solid #e0e0e0; background: #f9f9f9;">
                        <h3 class="box-title" style="font-size: 18px; font-weight: 500; color: #333;">
                            <i class="fa fa-file-text-o text-green" style="margin-right: 8px;"></i> Gabaasawwan Naannoo Koo
                        </h3>
                        <div class="box-tools pull-right">
                            <a href="<?php echo base_url('VotingReport/register'); ?>" class="btn btn-success btn-sm" style="border-radius: 3px; padding: 5px 12px; font-weight: 500;">
                                <i class="fa fa-plus-circle"></i> Haaraa Galmeessi
                            </a>
                        </div>
                    </div>
                    
                    <div class="box-body" style="padding: 20px;">
                        <!-- Filter Form -->
                        <div class="row" style="margin-bottom: 25px; background: #f5f5f5; padding: 15px; border-radius: 4px;">
                            <div class="col-md-12">
                                <form method="get" action="<?php echo base_url('VotingReport/listReports'); ?>" class="form-inline">
                                    <div class="form-group" style="margin-right: 15px; margin-bottom: 5px;">
                                        <label style="font-weight: 600; color: #555; margin-right: 5px;">Guyyaa Jalqabaa:</label>
                                        <input type="date" name="start_date" class="form-control" value="<?php echo $start_date; ?>" style="height: 35px; border-radius: 3px; border: 1px solid #ccc; padding: 5px 10px;">
                                    </div>
                                    <div class="form-group" style="margin-right: 15px; margin-bottom: 5px;">
                                        <label style="font-weight: 600; color: #555; margin-right: 5px;">Guyyaa Xumuraa:</label>
                                        <input type="date" name="end_date" class="form-control" value="<?php echo $end_date; ?>" style="height: 35px; border-radius: 3px; border: 1px solid #ccc; padding: 5px 10px;">
                                    </div>
                                    <div class="form-group" style="margin-right: 15px; margin-bottom: 5px;">
                                        <label style="font-weight: 600; color: #555; margin-right: 5px;">Yeroo:</label>
                                        <select name="session" class="form-control" style="height: 35px; border-radius: 3px; border: 1px solid #ccc; padding: 5px 10px; min-width: 150px;">
                                            <option value="all" <?php echo $session == 'all' ? 'selected' : ''; ?>>Hunda</option>
                                            <option value="morning" <?php echo $session == 'morning' ? 'selected' : ''; ?>>Kan Ganama</option>
                                            <option value="afternoon" <?php echo $session == 'afternoon' ? 'selected' : ''; ?>>Kan Waaree Booda</option>
                                        </select>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 5px;">
                                        <button type="submit" class="btn btn-primary" style="border-radius: 3px; padding: 6px 15px; font-weight: 500; color: white; background: #2c5f2d; border-color: #2c5f2d;">
                                            <i class="fa fa-filter"></i> Calleessii
                                        </button>
                                        <a href="<?php echo base_url('VotingReport/listReports'); ?>" class="btn btn-default" style="border-radius: 3px; padding: 6px 15px; font-weight: 500; margin-left: 8px;">
                                            <i class="fa fa-refresh"></i> Haari
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <?php if(empty($reports)): ?>
                            <div class="alert alert-info" style="border-radius: 4px; padding: 20px; text-align: center; background: #d9edf7; border-color: #bce8f1; color: #31708f;">
                                <i class="fa fa-info-circle" style="font-size: 24px; margin-bottom: 10px; display: block;"></i>
                                <strong style="font-size: 16px;">Naannoo keetiif gabaasi hin jiru!</strong>
                                <p style="margin-top: 10px;">Gabaasa haaraa galmeessuuf <a href="<?php echo base_url('VotingReport/register'); ?>" style="color: #2c5f2d; font-weight: 600;">kana tuqi</a>.</p>
                            </div>
                        <?php else: ?>
                            <div class="table-responsive" style="overflow-x: auto;">
                                <table class="table table-bordered table-hover" style="width: 100%; border-collapse: collapse; font-size: 12px; min-width: 1400px;">
                                    <thead>
                                        <tr style="background: #2c5f2d; color: white;">
                                            <th style="padding: 10px 6px; text-align: center; vertical-align: middle;" rowspan="2">#</th>
                                            <th style="padding: 10px 6px; text-align: center; vertical-align: middle;" rowspan="2">Guyyaa</th>
                                            <th style="padding: 10px 6px; text-align: center; vertical-align: middle;" rowspan="2">Yeroo</th>
                                            <th style="padding: 10px 6px; text-align: center; vertical-align: middle;" rowspan="2">Lakk. Tarree</th>
                                            <th style="padding: 10px 6px; text-align: center; vertical-align: middle;" colspan="2">Miseensa</th>
                                            <th style="padding: 10px 6px; text-align: center; vertical-align: middle;" colspan="2">Miseensa Hin Taane</th>
                                            <th style="padding: 4px 3px; text-align: center; vertical-align: middle; background: #e67e22;" colspan="2">Gurmiin Miseensa</th>
                                            <th style="padding: 4px 3px; text-align: center; vertical-align: middle; background: #e67e22;" colspan="2">Gurmiin Mis Hin Taane</th>
                                            <th style="padding: 10px 6px; text-align: center; vertical-align: middle;" rowspan="2">Waliigala Hunda</th>
                                            <th style="padding: 10px 6px; text-align: center; vertical-align: middle;" rowspan="2">Yeroo Galmee</th>
                                            <th style="padding: 10px 6px; text-align: center; vertical-align: middle;" rowspan="2">Haala</th>
                                            <th style="padding: 10px 6px; text-align: center; vertical-align: middle;" rowspan="2">Gocha</th>
                                        </tr>
                                        <tr style="background: #2c5f2d; color: white;">
                                            <th style="padding: 6px 4px; text-align: center; font-size: 10px;">Dhiirii</th>
                                            <th style="padding: 6px 4px; text-align: center; font-size: 10px;">Dubartii</th>
                                            <th style="padding: 6px 4px; text-align: center; font-size: 10px;">Dhiirii</th>
                                            <th style="padding: 6px 4px; text-align: center; font-size: 10px;">Dubartii</th>
                                            <th style="padding: 6px 4px; text-align: center; font-size: 10px; background: #f0ad4e;">Dhiirii</th>
                                            <th style="padding: 6px 4px; text-align: center; font-size: 10px; background: #f0ad4e;">Dubartii</th>
                                            <th style="padding: 6px 4px; text-align: center; font-size: 10px; background: #f0ad4e;">Dhiirii</th>
                                            <th style="padding: 6px 4px; text-align: center; font-size: 10px; background: #f0ad4e;">Dubartii</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $i=1; 
                                        // Initialize totals
                                        $total_member_male = 0;
                                        $total_member_female = 0;
                                        $total_nonmember_male = 0;
                                        $total_nonmember_female = 0;
                                        $total_add_member_male = 0;
                                        $total_add_member_female = 0;
                                        $total_add_nonmember_male = 0;
                                        $total_add_nonmember_female = 0;
                                        
                                        foreach($reports as $report): 
                                            // Get additional values (Gurmaa'insaan)
                                            $add_member_male = isset($report->additional_member_male) ? (int)$report->additional_member_male : 0;
                                            $add_member_female = isset($report->additional_member_female) ? (int)$report->additional_member_female : 0;
                                            $add_nonmember_male = isset($report->additional_nonmember_male) ? (int)$report->additional_nonmember_male : 0;
                                            $add_nonmember_female = isset($report->additional_nonmember_female) ? (int)$report->additional_nonmember_female : 0;
                                            
                                            // Calculate grand total including ALL categories
                                            $grand_total = $report->actual_member_male + $report->actual_member_female 
                                                         + $report->actual_nonmember_male + $report->actual_nonmember_female
                                                         + $add_member_male + $add_member_female
                                                         + $add_nonmember_male + $add_nonmember_female;
                                            
                                            // Accumulate totals
                                            $total_member_male += $report->actual_member_male;
                                            $total_member_female += $report->actual_member_female;
                                            $total_nonmember_male += $report->actual_nonmember_male;
                                            $total_nonmember_female += $report->actual_nonmember_female;
                                            $total_add_member_male += $add_member_male;
                                            $total_add_member_female += $add_member_female;
                                            $total_add_nonmember_male += $add_nonmember_male;
                                            $total_add_nonmember_female += $add_nonmember_female;
                                        ?>
                                        <tr style="border-bottom: 1px solid #ddd;">
                                            <td style="padding: 8px 6px; text-align: center; font-weight: 600;"><?php echo $i++; ?></td>
                                            <td style="padding: 8px 6px; text-align: center;"><?php echo date('d/m/Y', strtotime($report->report_date)); ?></td>
                                            <td style="padding: 8px 6px; text-align: center;">
                                                <?php if($report->report_session == 'morning'): ?>
                                                    <span class="label" style="background: #ffc107; color: #333; padding: 4px 8px; border-radius: 20px; font-size: 10px;">Ganama</span>
                                                <?php else: ?>
                                                    <span class="label" style="background: #17a2b8; color: white; padding: 4px 8px; border-radius: 20px; font-size: 10px;">Waaree</span>
                                                <?php endif; ?>
                                            </td>
                                            <td style="padding: 8px 6px; text-align: center; font-weight: 600;">#<?php echo $report->serial_number; ?></td>
                                            
                                            <!-- Miseensa (Actual) -->
                                            <td style="padding: 8px 6px; text-align: center; background: #e8f5e9;"><?php echo number_format($report->actual_member_male); ?></td>
                                            <td style="padding: 8px 6px; text-align: center; background: #e8f5e9;"><?php echo number_format($report->actual_member_female); ?></td>
                                            
                                            <!-- Miseensa Hin Taane (Actual) -->
                                            <td style="padding: 8px 6px; text-align: center; background: #fff8e1;"><?php echo number_format($report->actual_nonmember_male); ?></td>
                                            <td style="padding: 8px 6px; text-align: center; background: #fff8e1;"><?php echo number_format($report->actual_nonmember_female); ?></td>
                                            
                                            <!-- Gurmaa'insaan Miseensa (Additional Member) -->
                                            <td style="padding: 8px 6px; text-align: center; background: #fde0c4; font-weight: 600; color: #e67e22;"><?php echo number_format($add_member_male); ?></td>
                                            <td style="padding: 8px 6px; text-align: center; background: #fde0c4; font-weight: 600; color: #e67e22;"><?php echo number_format($add_member_female); ?></td>
                                            
                                            <!-- Gurmaa'insaan Miseensa Hin Taane (Additional Non-Member) -->
                                            <td style="padding: 8px 6px; text-align: center; background: #fde0c4; font-weight: 600; color: #e67e22;"><?php echo number_format($add_nonmember_male); ?></td>
                                            <td style="padding: 8px 6px; text-align: center; background: #fde0c4; font-weight: 600; color: #e67e22;"><?php echo number_format($add_nonmember_female); ?></td>
                                            
                                            <!-- Waliigala Hunda (All categories combined) -->
                                            <td style="padding: 8px 6px; text-align: center; font-weight: 800; background: #c8e6c9; color: #1b5e20;">
                                                <?php echo number_format($grand_total); ?>
                                            </td>
                                            
                                            <td style="padding: 8px 6px; text-align: center;"><?php echo date('H:i', strtotime($report->created_at)); ?></td>
                                            <td style="padding: 8px 6px; text-align: center;">
                                                <?php if($report->can_edit): ?>
                                                    <span class="label" style="background: #28a745; color: white; padding: 4px 8px; border-radius: 20px; font-size: 10px;">Fooyyessuu</span>
                                                <?php else: ?>
                                                    <span class="label" style="background: #6c757d; color: white; padding: 4px 8px; border-radius: 20px; font-size: 10px;">Sa'a 2 darbe</span>
                                                <?php endif; ?>
                                            </td>
                                            <td style="padding: 8px 6px; text-align: center;">
                                                <div class="btn-group" style="display: flex; gap: 3px; justify-content: center;">
                                                    <a href="<?php echo base_url('VotingReport/viewReport/'.$report->id); ?>" class="btn btn-xs" style="background: #17a2b8; color: white; padding: 4px 6px; border-radius: 3px;" title="Ilaalchuu">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    
                                                    <?php if($report->can_edit): ?>
                                                        <a href="<?php echo base_url('VotingReport/editReport/'.$report->id); ?>" class="btn btn-xs" style="background: #ffc107; color: #333; padding: 4px 6px; border-radius: 3px;" title="Fooyyessuu">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="<?php echo base_url('VotingReport/deleteReport/'.$report->id); ?>" class="btn btn-xs" style="background: #dc3545; color: white; padding: 4px 6px; border-radius: 3px;" onclick="return confirm('Gabaasa kana haquu barbaaddaa?')" title="Haquu">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    <?php else: ?>
                                                        <button class="btn btn-xs" style="background: #e0e0e0; color: #999; padding: 4px 6px; border-radius: 3px;" disabled><i class="fa fa-edit"></i></button>
                                                        <button class="btn btn-xs" style="background: #e0e0e0; color: #999; padding: 4px 6px; border-radius: 3px;" disabled><i class="fa fa-trash"></i></button>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr style="background: #f0f2f5; font-weight: 700;">
                                            <td colspan="4" style="padding: 10px 6px; text-align: right;"><strong>Waliigala (Hunda):</strong></td>
                                            <!-- Miseensa totals -->
                                            <td style="padding: 10px 6px; text-align: center; background: #c8e6c9;"><?php echo number_format($total_member_male); ?></td>
                                            <td style="padding: 10px 6px; text-align: center; background: #c8e6c9;"><?php echo number_format($total_member_female); ?></td>
                                            <!-- Miseensa Hin Taane totals -->
                                            <td style="padding: 10px 6px; text-align: center; background: #fff8e1;"><?php echo number_format($total_nonmember_male); ?></td>
                                            <td style="padding: 10px 6px; text-align: center; background: #fff8e1;"><?php echo number_format($total_nonmember_female); ?></td>
                                            <!-- Gurmaa'insaan Miseensa totals -->
                                            <td style="padding: 10px 6px; text-align: center; background: #fde0c4; color: #e67e22;"><?php echo number_format($total_add_member_male); ?></td>
                                            <td style="padding: 10px 6px; text-align: center; background: #fde0c4; color: #e67e22;"><?php echo number_format($total_add_member_female); ?></td>
                                            <!-- Gurmaa'insaan Miseensa Hin Taane totals -->
                                            <td style="padding: 10px 6px; text-align: center; background: #fde0c4; color: #e67e22;"><?php echo number_format($total_add_nonmember_male); ?></td>
                                            <td style="padding: 10px 6px; text-align: center; background: #fde0c4; color: #e67e22;"><?php echo number_format($total_add_nonmember_female); ?></td>
                                            <!-- Grand total all categories -->
                                            <td style="padding: 10px 6px; text-align: center; font-weight: 800; background: #a5d6a7; color: #1b5e20; font-size: 14px;">
                                                <?php 
                                                $all_total = $total_member_male + $total_member_female 
                                                           + $total_nonmember_male + $total_nonmember_female
                                                           + $total_add_member_male + $total_add_member_female
                                                           + $total_add_nonmember_male + $total_add_nonmember_female;
                                                echo number_format($all_total);
                                                ?>
                                            </td>
                                            <td colspan="4"></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            
                            <!-- Summary Row - All totals combined -->
                            <div class="row" style="margin-top: 25px;">
                                <div class="col-md-12">
                                    <div class="well" style="background: #f9f9f9; padding: 15px; border-radius: 4px; border: 1px solid #ddd;">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-6">
                                                <div style="text-align: center;">
                                                    <span style="font-size: 24px; font-weight: 700; color: #2c5f2d;"><?php echo count($reports); ?></span>
                                                    <span style="display: block; font-size: 13px; color: #555;">Waliigala Gabaasa</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <div style="text-align: center;">
                                                    <?php 
                                                    $total_morning = 0;
                                                    $total_afternoon = 0;
                                                    foreach($reports as $r) {
                                                        if($r->report_session == 'morning') $total_morning++;
                                                        if($r->report_session == 'afternoon') $total_afternoon++;
                                                    }
                                                    ?>
                                                    <span style="font-size: 24px; font-weight: 700; color: #ffc107;"><?php echo $total_morning; ?></span>
                                                    <span style="display: block; font-size: 13px; color: #555;">Kan Ganama</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <div style="text-align: center;">
                                                    <span style="font-size: 24px; font-weight: 700; color: #17a2b8;"><?php echo $total_afternoon; ?></span>
                                                    <span style="display: block; font-size: 13px; color: #555;">Kan Waaree Booda</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <div style="text-align: center;">
                                                    <span style="font-size: 28px; font-weight: 800; color: #28a745;"><?php echo number_format($all_total); ?></span>
                                                    <span style="display: block; font-size: 13px; color: #555;">Waliigala Hunda (Total)</span>
                                                    <small style="font-size: 10px; color: #888;">
                                                        Miseensa: <?php echo number_format($total_member_male + $total_member_female); ?> | 
                                                        Hin Miseensa: <?php echo number_format($total_nonmember_male + $total_nonmember_female); ?> | 
                                                        Gurmaa'insaan: <?php echo number_format(($total_add_member_male + $total_add_member_female + $total_add_nonmember_male + $total_add_nonmember_female)); ?>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="alert alert-info" style="margin-top: 20px; padding: 12px 15px; border-radius: 4px; background: #d1ecf1; border-color: #bee5eb; color: #0c5460;">
                                <i class="fa fa-info-circle"></i> 
                                <strong>Hubachiisa:</strong> Gabaasni sa'aatii 2 keessatti qofaa fooyyessuu fi haquu dandeessu.
                                Yeroo darbee booda ilaaluu qofa dandeessu. <strong>Waliigala Hunda</strong> keessatti Miseensa, Miseensa Hin Taane, fi <strong>Gurmaa'insaan (Additional)</strong> hunda dabalee shallofame.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .table th, .table td {
        vertical-align: middle;
        font-size: 12px;
        padding: 6px 4px;
    }
    .btn-xs {
        padding: 3px 5px;
        font-size: 10px;
    }
    .table-hover tbody tr:hover {
        background: #f5f5f5;
    }
    .content-wrapper {
        min-height: 100%;
        background: #f4f6f9;
    }
    tfoot td {
        border-top: 2px solid #2c5f2d;
        font-weight: 700;
    }
    .label {
        font-weight: 600;
    }
</style>