<div class="content-wrapper" style="background: #f4f6f9; padding-top: 15px;">
    <!-- Content Header -->
    <section class="content-header" style="padding: 10px 15px; margin-bottom: 10px; background: white; border-bottom: 1px solid #e0e0e0;">
        <div class="row">
            <div class="col-xs-12 col-sm-8">
                <h1 style="font-size: 18px; margin: 0; font-weight: 400; color: #333;">
                    <i class="fa fa-list-alt text-green" style="margin-right: 8px;"></i> 
                    Gabaasawwan Naannoo Koo
                    <small style="font-size: 12px; color: #777; display: block; margin-top: 5px;"><?php echo $voting_region_name; ?></small>
                </h1>
            </div>
            <div class="col-xs-12 col-sm-4 text-right" style="margin-top: 5px;">
                <ol class="breadcrumb" style="padding: 0; margin: 0; background: none; display: inline-block;">
                    <li><a href="<?php echo base_url(); ?>VotingReport/dashboard"><i class="fa fa-dashboard"></i> Daashboordii</a></li>
                    <li class="active">Gabaasawwan Koo</li>
                </ol>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content" style="padding: 10px 15px;">
        
        <!-- Region Info Card -->
        <div class="row" style="margin-bottom: 15px;">
            <div class="col-xs-12">
                <div class="box box-success" style="border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); border-left: 4px solid #2c5f2d;">
                    <div class="box-body" style="padding: 10px 15px; background: #f9f9f9;">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6" style="margin-bottom: 5px;">
                                <strong style="font-size: 14px;">
                                    <i class="fa fa-map-marker text-green" style="margin-right: 5px;"></i>
                                    Naannoo: <span style="color: #2c5f2d; font-weight: 700;"><?php echo $voting_region_name; ?></span>
                                </strong>
                            </div>
                            <div class="col-xs-12 col-sm-6 text-left text-sm-right">
                                <strong style="font-size: 14px;">
                                    <i class="fa fa-user text-green" style="margin-right: 5px;"></i>
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
            <div class="alert alert-success alert-dismissible" style="border-radius: 4px; padding: 10px 12px; margin-bottom: 15px; border-left: 4px solid #2c5f2d; background: #dff0d8; color: #3c763d; font-size: 13px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color: #3c763d;">&times;</button>
                <i class="icon fa fa-check-circle" style="margin-right: 8px;"></i> 
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible" style="border-radius: 4px; padding: 10px 12px; margin-bottom: 15px; border-left: 4px solid #c9302c; background: #f2dede; color: #a94442; font-size: 13px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color: #a94442;">&times;</button>
                <i class="icon fa fa-exclamation-circle" style="margin-right: 8px;"></i> 
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-default" style="border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); border-top: 3px solid #2c5f2d;">
                    <div class="box-header with-border" style="padding: 10px 15px; border-bottom: 1px solid #e0e0e0; background: #f9f9f9;">
                        <div class="row">
                            <div class="col-xs-7 col-sm-8">
                                <h3 class="box-title" style="font-size: 16px; font-weight: 500; color: #333; margin: 5px 0;">
                                    <i class="fa fa-file-text-o text-green" style="margin-right: 8px;"></i> 
                                    Gabaasawwan Naannoo Koo
                                </h3>
                            </div>
                            <div class="col-xs-5 col-sm-4 text-right">
                                <a href="<?php echo base_url('VotingReport/register'); ?>" class="btn btn-success btn-sm" style="border-radius: 3px; padding: 4px 10px; font-weight: 500; font-size: 12px;">
                                    <i class="fa fa-plus-circle"></i> <span class="hidden-xs">Haaraa Galmeessi</span><span class="visible-xs">Haaraa</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="box-body" style="padding: 15px;">
                        <!-- Filter Form - Responsive -->
                        <div class="row" style="margin-bottom: 20px; background: #f5f5f5; padding: 10px; border-radius: 4px;">
                            <div class="col-xs-12">
                                <form method="get" action="<?php echo base_url('VotingReport/listReports'); ?>" class="form-inline" style="display: flex; flex-wrap: wrap; gap: 10px;">
                                    <div class="form-group" style="flex: 1; min-width: 120px;">
                                        <label style="font-weight: 600; color: #555; font-size: 12px; display: block;">Guyyaa Jalqabaa:</label>
                                        <input type="date" name="start_date" class="form-control input-sm" value="<?php echo $start_date; ?>" style="width: 100%; height: 32px; border-radius: 3px; border: 1px solid #ccc; padding: 4px 8px; font-size: 12px;">
                                    </div>
                                    <div class="form-group" style="flex: 1; min-width: 120px;">
                                        <label style="font-weight: 600; color: #555; font-size: 12px; display: block;">Guyyaa Xumuraa:</label>
                                        <input type="date" name="end_date" class="form-control input-sm" value="<?php echo $end_date; ?>" style="width: 100%; height: 32px; border-radius: 3px; border: 1px solid #ccc; padding: 4px 8px; font-size: 12px;">
                                    </div>
                                    <div class="form-group" style="flex: 1; min-width: 120px;">
                                        <label style="font-weight: 600; color: #555; font-size: 12px; display: block;">Yeroo:</label>
                                        <select name="session" class="form-control input-sm" style="width: 100%; height: 32px; border-radius: 3px; border: 1px solid #ccc; padding: 4px 8px; font-size: 12px;">
                                            <option value="all" <?php echo $session == 'all' ? 'selected' : ''; ?>>Hunda</option>
                                            <option value="morning" <?php echo $session == 'morning' ? 'selected' : ''; ?>>Kan Ganama</option>
                                            <option value="afternoon" <?php echo $session == 'afternoon' ? 'selected' : ''; ?>>Kan Waaree Booda</option>
                                        </select>
                                    </div>
                                    <div class="form-group" style="display: flex; gap: 5px; align-items: flex-end;">
                                        <button type="submit" class="btn btn-primary btn-sm" style="border-radius: 3px; padding: 4px 12px; font-weight: 500; background: #2c5f2d; border-color: #2c5f2d; font-size: 12px;">
                                            <i class="fa fa-filter"></i> Calleessii
                                        </button>
                                        <a href="<?php echo base_url('VotingReport/listReports'); ?>" class="btn btn-default btn-sm" style="border-radius: 3px; padding: 4px 12px; font-weight: 500; font-size: 12px;">
                                            <i class="fa fa-refresh"></i> Haari
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <?php if(empty($reports)): ?>
                            <div class="alert alert-info" style="border-radius: 4px; padding: 15px; text-align: center; background: #d9edf7; border-color: #bce8f1; color: #31708f;">
                                <i class="fa fa-info-circle" style="font-size: 20px; margin-bottom: 8px; display: block;"></i>
                                <strong style="font-size: 14px;">Naannoo keetiif gabaasi hin jiru!</strong>
                                <p style="margin-top: 8px; font-size: 12px;">Gabaasa haaraa galmeessuuf <a href="<?php echo base_url('VotingReport/register'); ?>" style="color: #2c5f2d; font-weight: 600;">kana tuqi</a>.</p>
                            </div>
                        <?php else: ?>
                            <!-- Responsive Table with Horizontal Scroll -->
                            <div class="table-responsive" style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
                                <table class="table table-bordered table-hover" style="width: 100%; border-collapse: collapse; font-size: 11px; min-width: 1000px;">
                                    <thead>
                                        <tr style="background: #2c5f2d; color: white;">
                                            <th style="padding: 8px 4px; text-align: center; vertical-align: middle; width: 40px;" rowspan="2">#</th>
                                            <th style="padding: 8px 4px; text-align: center; vertical-align: middle; width: 70px;" rowspan="2">Guyyaa</th>
                                            <th style="padding: 8px 4px; text-align: center; vertical-align: middle; width: 50px;" rowspan="2">Yeroo</th>
                                            <th style="padding: 8px 4px; text-align: center; vertical-align: middle; width: 50px;" rowspan="2">L.T</th>
                                            <th style="padding: 8px 4px; text-align: center; vertical-align: middle;" colspan="2">Miseensa</th>
                                            <th style="padding: 8px 4px; text-align: center; vertical-align: middle;" colspan="2">Miseensa Hin Taane</th>
                                            <th style="padding: 4px 3px; text-align: center; vertical-align: middle; background: #e67e22;" colspan="2">Gurmiin Miseensa</th>
                                            <th style="padding: 4px 3px; text-align: center; vertical-align: middle; background: #e67e22;" colspan="2">Gurmiin Mis Hin Taane</th>
                                            <th style="padding: 8px 4px; text-align: center; vertical-align: middle; width: 60px;" rowspan="2">Waliigala</th>
                                            <th style="padding: 8px 4px; text-align: center; vertical-align: middle; width: 50px;" rowspan="2">Yeroo</th>
                                            <th style="padding: 8px 4px; text-align: center; vertical-align: middle; width: 60px;" rowspan="2">Haala</th>
                                            <th style="padding: 8px 4px; text-align: center; vertical-align: middle; width: 80px;" rowspan="2">Gocha</th>
                                        </tr>
                                        <tr style="background: #2c5f2d; color: white;">
                                            <th style="padding: 5px 3px; text-align: center; font-size: 9px;">Dhi</th>
                                            <th style="padding: 5px 3px; text-align: center; font-size: 9px;">Dub</th>
                                            <th style="padding: 5px 3px; text-align: center; font-size: 9px;">Dhi</th>
                                            <th style="padding: 5px 3px; text-align: center; font-size: 9px;">Dub</th>
                                            <th style="padding: 5px 3px; text-align: center; font-size: 9px; background: #f0ad4e;">Dhi</th>
                                            <th style="padding: 5px 3px; text-align: center; font-size: 9px; background: #f0ad4e;">Dub</th>
                                            <th style="padding: 5px 3px; text-align: center; font-size: 9px; background: #f0ad4e;">Dhi</th>
                                            <th style="padding: 5px 3px; text-align: center; font-size: 9px; background: #f0ad4e;">Dub</th>
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
                                            <td style="padding: 6px 4px; text-align: center; font-weight: 600;"><?php echo $i++; ?></td>
                                            <td style="padding: 6px 4px; text-align: center;"><?php echo date('d/m/Y', strtotime($report->report_date)); ?></td>
                                            <td style="padding: 6px 4px; text-align: center;">
                                                <?php if($report->report_session == 'morning'): ?>
                                                    <span class="label" style="background: #ffc107; color: #333; padding: 3px 6px; border-radius: 20px; font-size: 9px;">Ganama</span>
                                                <?php else: ?>
                                                    <span class="label" style="background: #17a2b8; color: white; padding: 3px 6px; border-radius: 20px; font-size: 9px;">Waaree</span>
                                                <?php endif; ?>
                                            </td>
                                            <td style="padding: 6px 4px; text-align: center; font-weight: 600;">#<?php echo $report->serial_number; ?></td>
                                            
                                            <!-- Miseensa (Actual) -->
                                            <td style="padding: 6px 4px; text-align: center; background: #e8f5e9;"><?php echo number_format($report->actual_member_male); ?></td>
                                            <td style="padding: 6px 4px; text-align: center; background: #e8f5e9;"><?php echo number_format($report->actual_member_female); ?></td>
                                            
                                            <!-- Miseensa Hin Taane (Actual) -->
                                            <td style="padding: 6px 4px; text-align: center; background: #fff8e1;"><?php echo number_format($report->actual_nonmember_male); ?></td>
                                            <td style="padding: 6px 4px; text-align: center; background: #fff8e1;"><?php echo number_format($report->actual_nonmember_female); ?></td>
                                            
                                            <!-- Gurmaa'insaan Miseensa (Additional Member) -->
                                            <td style="padding: 6px 4px; text-align: center; background: #fde0c4; font-weight: 600; color: #e67e22;"><?php echo number_format($add_member_male); ?></td>
                                            <td style="padding: 6px 4px; text-align: center; background: #fde0c4; font-weight: 600; color: #e67e22;"><?php echo number_format($add_member_female); ?></td>
                                            
                                            <!-- Gurmaa'insaan Miseensa Hin Taane (Additional Non-Member) -->
                                            <td style="padding: 6px 4px; text-align: center; background: #fde0c4; font-weight: 600; color: #e67e22;"><?php echo number_format($add_nonmember_male); ?></td>
                                            <td style="padding: 6px 4px; text-align: center; background: #fde0c4; font-weight: 600; color: #e67e22;"><?php echo number_format($add_nonmember_female); ?></td>
                                            
                                            <!-- Waliigala Hunda (All categories combined) -->
                                            <td style="padding: 6px 4px; text-align: center; font-weight: 800; background: #c8e6c9; color: #1b5e20;">
                                                <?php echo number_format($grand_total); ?>
                                            </td>
                                            
                                            <td style="padding: 6px 4px; text-align: center;"><?php echo date('H:i', strtotime($report->created_at)); ?></td>
                                            <td style="padding: 6px 4px; text-align: center;">
                                                <?php if($report->can_edit): ?>
                                                    <span class="label" style="background: #28a745; color: white; padding: 3px 6px; border-radius: 20px; font-size: 9px;">Fooyyessuu</span>
                                                <?php else: ?>
                                                    <span class="label" style="background: #6c757d; color: white; padding: 3px 6px; border-radius: 20px; font-size: 9px;">Sa'a 2 darbe</span>
                                                <?php endif; ?>
                                            </td>
                                            <td style="padding: 6px 4px; text-align: center;">
                                                <div class="btn-group" style="display: flex; gap: 2px; justify-content: center;">
                                                    <a href="<?php echo base_url('VotingReport/viewReport/'.$report->id); ?>" class="btn btn-xs" style="background: #17a2b8; color: white; padding: 3px 5px; border-radius: 3px; font-size: 10px;" title="Ilaalchuu">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    
                                                    <?php if($report->can_edit): ?>
                                                        <a href="<?php echo base_url('VotingReport/editReport/'.$report->id); ?>" class="btn btn-xs" style="background: #ffc107; color: #333; padding: 3px 5px; border-radius: 3px; font-size: 10px;" title="Fooyyessuu">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="<?php echo base_url('VotingReport/deleteReport/'.$report->id); ?>" class="btn btn-xs" style="background: #dc3545; color: white; padding: 3px 5px; border-radius: 3px; font-size: 10px;" onclick="return confirm('Gabaasa kana haquu barbaaddaa?')" title="Haquu">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    <?php else: ?>
                                                        <button class="btn btn-xs" style="background: #e0e0e0; color: #999; padding: 3px 5px; border-radius: 3px; font-size: 10px;" disabled><i class="fa fa-edit"></i></button>
                                                        <button class="btn btn-xs" style="background: #e0e0e0; color: #999; padding: 3px 5px; border-radius: 3px; font-size: 10px;" disabled><i class="fa fa-trash"></i></button>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr style="background: #f0f2f5; font-weight: 700;">
                                            <td colspan="4" style="padding: 8px 4px; text-align: right;"><strong>Waliigala:</strong></td>
                                            <!-- Miseensa totals -->
                                            <td style="padding: 8px 4px; text-align: center; background: #c8e6c9;"><?php echo number_format($total_member_male); ?></td>
                                            <td style="padding: 8px 4px; text-align: center; background: #c8e6c9;"><?php echo number_format($total_member_female); ?></td>
                                            <!-- Miseensa Hin Taane totals -->
                                            <td style="padding: 8px 4px; text-align: center; background: #fff8e1;"><?php echo number_format($total_nonmember_male); ?></td>
                                            <td style="padding: 8px 4px; text-align: center; background: #fff8e1;"><?php echo number_format($total_nonmember_female); ?></td>
                                            <!-- Gurmaa'insaan Miseensa totals -->
                                            <td style="padding: 8px 4px; text-align: center; background: #fde0c4; color: #e67e22;"><?php echo number_format($total_add_member_male); ?></td>
                                            <td style="padding: 8px 4px; text-align: center; background: #fde0c4; color: #e67e22;"><?php echo number_format($total_add_member_female); ?></td>
                                            <!-- Gurmaa'insaan Miseensa Hin Taane totals -->
                                            <td style="padding: 8px 4px; text-align: center; background: #fde0c4; color: #e67e22;"><?php echo number_format($total_add_nonmember_male); ?></td>
                                            <td style="padding: 8px 4px; text-align: center; background: #fde0c4; color: #e67e22;"><?php echo number_format($total_add_nonmember_female); ?></td>
                                            <!-- Grand total all categories -->
                                            <td style="padding: 8px 4px; text-align: center; font-weight: 800; background: #a5d6a7; color: #1b5e20; font-size: 13px;">
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
                            
                            <!-- Summary Row - Responsive cards for mobile -->
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-xs-12">
                                    <div class="well" style="background: #f9f9f9; padding: 12px; border-radius: 4px; border: 1px solid #ddd;">
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-3" style="margin-bottom: 10px;">
                                                <div style="text-align: center;">
                                                    <span style="font-size: 20px; font-weight: 700; color: #2c5f2d;"><?php echo count($reports); ?></span>
                                                    <span style="display: block; font-size: 11px; color: #555;">Waliigala Gabaasa</span>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-3" style="margin-bottom: 10px;">
                                                <div style="text-align: center;">
                                                    <?php 
                                                    $total_morning = 0;
                                                    $total_afternoon = 0;
                                                    foreach($reports as $r) {
                                                        if($r->report_session == 'morning') $total_morning++;
                                                        if($r->report_session == 'afternoon') $total_afternoon++;
                                                    }
                                                    ?>
                                                    <span style="font-size: 20px; font-weight: 700; color: #ffc107;"><?php echo $total_morning; ?></span>
                                                    <span style="display: block; font-size: 11px; color: #555;">Kan Ganama</span>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-3" style="margin-bottom: 10px;">
                                                <div style="text-align: center;">
                                                    <span style="font-size: 20px; font-weight: 700; color: #17a2b8;"><?php echo $total_afternoon; ?></span>
                                                    <span style="display: block; font-size: 11px; color: #555;">Kan Waaree</span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <div style="text-align: center;">
                                                    <span style="font-size: 22px; font-weight: 800; color: #28a745;"><?php echo number_format($all_total); ?></span>
                                                    <span style="display: block; font-size: 11px; color: #555;">Waliigala Hunda</span>
                                                    <small style="font-size: 9px; color: #888; display: block;">
                                                        M: <?php echo number_format($total_member_male + $total_member_female); ?> | 
                                                        H-M: <?php echo number_format($total_nonmember_male + $total_nonmember_female); ?>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="alert alert-info" style="margin-top: 15px; padding: 10px 12px; border-radius: 4px; background: #d1ecf1; border-color: #bee5eb; color: #0c5460; font-size: 11px;">
                                <i class="fa fa-info-circle"></i> 
                                <strong>Hubachiisa:</strong> Gabaasni sa'aatii 2 keessatti qofaa fooyyessuu fi haquu dandeessu.
                                <span class="hidden-xs">Yeroo darbee booda ilaaluu qofa dandeessu.</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    @media (max-width: 768px) {
        .content-wrapper {
            padding-top: 5px !important;
        }
        .box-body {
            padding: 10px !important;
        }
        .well {
            padding: 10px !important;
        }
        .table-responsive {
            border: none !important;
        }
    }
    
    @media (max-width: 480px) {
        .table th, .table td {
            font-size: 9px !important;
            padding: 4px 2px !important;
        }
        .btn-xs {
            padding: 2px 3px !important;
            font-size: 8px !important;
        }
        .label {
            font-size: 8px !important;
            padding: 2px 4px !important;
        }
    }
    
    .table th, .table td {
        vertical-align: middle;
    }
    .btn-xs {
        padding: 3px 5px;
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
    
    /* Better touch scrolling on mobile */
    .table-responsive {
        -webkit-overflow-scrolling: touch;
    }
</style>