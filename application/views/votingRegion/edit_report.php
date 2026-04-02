<div class="content-wrapper" style="background: #f4f6f9; padding-top: 15px;">
    <!-- Content Header -->
    <section class="content-header" style="padding: 10px 20px; margin-bottom: 10px; background: white; border-bottom: 1px solid #e0e0e0;">
        <h1 style="font-size: 24px; margin: 0; font-weight: 400; color: #333;">
            <i class="fa fa-edit text-warning" style="margin-right: 8px;"></i> Gabaasa Fooyyessuu
            <small style="font-size: 14px; color: #777; margin-left: 5px;">#<?php echo $report->serial_number; ?> - <?php echo date('d/m/Y', strtotime($report->report_date)); ?></small>
        </h1>
        <ol class="breadcrumb" style="padding: 0; margin: 5px 0 0; background: none;">
            <li><a href="<?php echo base_url(); ?>VotingReport/dashboard"><i class="fa fa-dashboard"></i> Daashboordii</a></li>
            <li><a href="<?php echo base_url(); ?>VotingReport/listReports">Gabaasawwan</a></li>
            <li class="active">Fooyyessuu</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="padding: 15px 20px;">
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
            <div class="col-md-12">
                <!-- Time Warning -->
                <div class="alert alert-warning" style="border-radius: 4px; padding: 12px 15px; margin-bottom: 20px; border-left: 4px solid #ff8c00; background: #fff3cd; color: #856404;">
                    <i class="fa fa-clock-o" style="margin-right: 8px; font-size: 16px;"></i>
                    <strong>Hubachiisa Yeroo:</strong> Gabaasa kana sa'aatii 2 keessatti qofa fooyyessuu dandeessa. Yeroo ammaa: <?php echo date('H:i:s'); ?>
                    <br>
                    <small>Gabaasni kun kan galmaa'e: <?php echo date('d/m/Y H:i:s', strtotime($report->created_at)); ?></small>
                </div>

                <!-- User Info Bar -->
                <div class="row" style="margin-bottom: 20px; background: #e8f0e8; padding: 15px; border-left: 4px solid #2c5f2d; border-radius: 4px;">
                    <div class="col-md-3">
                        <strong><i class="fa fa-user"></i> Gabaasaa:</strong> <?php echo $report->reporter_name; ?>
                    </div>
                    <div class="col-md-3">
                        <strong><i class="fa fa-map-marker"></i> Naannoo Filannoo:</strong> 
                        <span class="text-green" style="font-weight: bold;"><?php echo $report->naannoofil_id; ?></span>
                    </div>
                    <div class="col-md-3">
                        <strong><i class="fa fa-calendar"></i> Guyyaa:</strong> <?php echo date('d/m/Y', strtotime($report->report_date)); ?>
                    </div>
                    <div class="col-md-3">
                        <strong><i class="fa fa-hashtag"></i> Lakkoofsa Tarree:</strong> #<?php echo $report->serial_number; ?>
                    </div>
                </div>

                <!-- Session Info -->
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-md-6">
                        <div style="background: <?php echo $report->report_session == 'morning' ? '#fff3cd' : '#f8f9fa'; ?>; padding: 10px 15px; border-left: 3px solid <?php echo $report->report_session == 'morning' ? '#ffc107' : '#6c757d'; ?>; border-radius: 4px;">
                            <span style="font-weight: bold;">Yeroo Gabaasaa:</span>
                            <?php if($report->report_session == 'morning'): ?>
                                <span class="label" style="background: #ffc107; color: #333; padding: 5px 15px; border-radius: 20px; font-size: 12px; font-weight: 500; margin-left: 10px;">Kan Ganama (8:00-12:00)</span>
                            <?php else: ?>
                                <span class="label" style="background: #17a2b8; color: white; padding: 5px 15px; border-radius: 20px; font-size: 12px; font-weight: 500; margin-left: 10px;">Kan Waaree Booda (14:00-17:00)</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Edit Form -->
                <form method="post" action="<?php echo base_url('VotingReport/updateReport/'.$report->id); ?>" id="editForm">
                    
                    <!-- Hidden Fields -->
                    <input type="hidden" name="naannoofil_id" value="<?php echo $report->naannoofil_id; ?>">
                    <input type="hidden" name="report_date" value="<?php echo $report->report_date; ?>">
                    <input type="hidden" name="report_session" value="<?php echo $report->report_session; ?>">
                    <input type="hidden" name="serial_number" value="<?php echo $report->serial_number; ?>">
                    
                    <!-- ============================================= -->
                    <!-- ROW 1: KAROORA (Plan) - 3 BIG COLUMNS -->
                    <!-- ============================================= -->
                    <div style="margin-bottom: 20px; border: 1px solid #2c5f2d; border-radius: 4px; overflow: hidden;">
                        <div style="background: #2c5f2d; color: white; padding: 12px 15px; font-weight: bold; font-size: 16px;">
                            <i class="fa fa-pencil-square-o"></i> KAROORA (QOPHII)
                        </div>
                        <div style="padding: 20px; background: white;">
                            <div class="row">
                                <!-- COLUMN 1: Miseensa -->
                                <div class="col-md-4" style="border-right: 1px solid #ddd;">
                                    <div style="font-weight: bold; margin-bottom: 15px; font-size: 15px; color: #2c5f2d;">Miseensa</div>
                                    <div class="row">
                                        <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dhiira</div>
                                        <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dubartii</div>
                                        <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Ida'ama</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4"><input type="number" name="plan_member_male" id="plan_member_male" class="form-control" value="<?php echo $report->plan_member_male; ?>" min="0" onchange="calculateAll()" style="height: 38px;"></div>
                                        <div class="col-xs-4"><input type="number" name="plan_member_female" id="plan_member_female" class="form-control" value="<?php echo $report->plan_member_female; ?>" min="0" onchange="calculateAll()" style="height: 38px;"></div>
                                        <div class="col-xs-4"><input type="text" name="plan_member_total" id="plan_member_total" class="form-control" readonly value="<?php echo $report->plan_member_total; ?>" style="height: 38px; background: #f5f5f5;"></div>
                                    </div>
                                </div>
                                
                                <!-- COLUMN 2: Miseensa Hin Taane -->
                                <div class="col-md-4" style="border-right: 1px solid #ddd;">
                                    <div style="font-weight: bold; margin-bottom: 15px; font-size: 15px; color: #2c5f2d;">Miseensa Hin Taane</div>
                                    <div class="row">
                                        <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dhiira</div>
                                        <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dubartii</div>
                                        <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Ida'ama</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4"><input type="number" name="plan_nonmember_male" id="plan_nonmember_male" class="form-control" value="<?php echo $report->plan_nonmember_male; ?>" min="0" onchange="calculateAll()" style="height: 38px;"></div>
                                        <div class="col-xs-4"><input type="number" name="plan_nonmember_female" id="plan_nonmember_female" class="form-control" value="<?php echo $report->plan_nonmember_female; ?>" min="0" onchange="calculateAll()" style="height: 38px;"></div>
                                        <div class="col-xs-4"><input type="text" name="plan_nonmember_total" id="plan_nonmember_total" class="form-control" readonly value="<?php echo $report->plan_nonmember_total; ?>" style="height: 38px; background: #f5f5f5;"></div>
                                    </div>
                                </div>
                                
                                <!-- COLUMN 3: Ida'ama Waliigalaa -->
                                <div class="col-md-4">
                                    <div style="font-weight: bold; margin-bottom: 15px; font-size: 15px; color: #2c5f2d;">Ida'ama Waliigalaa</div>
                                    <div class="row">
                                        <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dhiira</div>
                                        <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dubartii</div>
                                        <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Waliigala</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4"><input type="text" name="plan_total_male" id="plan_total_male" class="form-control" readonly value="<?php echo $report->plan_total_male; ?>" style="height: 38px; background: #f5f5f5;"></div>
                                        <div class="col-xs-4"><input type="text" name="plan_total_female" id="plan_total_female" class="form-control" readonly value="<?php echo $report->plan_total_female; ?>" style="height: 38px; background: #f5f5f5;"></div>
                                        <div class="col-xs-4"><input type="text" name="plan_grand_total" id="plan_grand_total" class="form-control" readonly value="<?php echo $report->plan_grand_total; ?>" style="height: 38px; background: #f5f5f5;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- ============================================= -->
                    <!-- ROW 2: HOJIIN RAAWWATAME (Actual) - 3 BIG COLUMNS WITH % -->
                    <!-- ============================================= -->
                    <div style="margin-bottom: 20px; border: 1px solid #3e7c40; border-radius: 4px; overflow: hidden;">
                        <div style="background: #3e7c40; color: white; padding: 12px 15px; font-weight: bold; font-size: 16px;">
                            <i class="fa fa-check-circle-o"></i> HOJIIN RAAWWATAME
                        </div>
                        <div style="padding: 20px; background: white;">
                            <div class="row">
                                <!-- COLUMN 1: Miseensa with % -->
                                <div class="col-md-4" style="border-right: 1px solid #ddd;">
                                    <div style="font-weight: bold; margin-bottom: 15px; font-size: 15px; color: #3e7c40;">Miseensa</div>
                                    <div class="row">
                                        <div class="col-xs-3 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dhiira</div>
                                        <div class="col-xs-3 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dubartii</div>
                                        <div class="col-xs-3 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Ida'ama</div>
                                        <div class="col-xs-3 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">%</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-3"><input type="number" name="actual_member_male" id="actual_member_male" class="form-control" value="<?php echo $report->actual_member_male; ?>" min="0" onchange="calculateAll()" style="height: 38px;"></div>
                                        <div class="col-xs-3"><input type="number" name="actual_member_female" id="actual_member_female" class="form-control" value="<?php echo $report->actual_member_female; ?>" min="0" onchange="calculateAll()" style="height: 38px;"></div>
                                        <div class="col-xs-3"><input type="text" name="actual_member_total" id="actual_member_total" class="form-control" readonly value="<?php echo $report->actual_member_total; ?>" style="height: 38px; background: #f5f5f5;"></div>
                                        <div class="col-xs-3"><input type="text" name="actual_member_percent" id="actual_member_percent" class="form-control" readonly value="<?php echo $report->actual_member_percent; ?>" style="height: 38px; background: #f5f5f5;"></div>
                                    </div>
                                </div>
                                
                                <!-- COLUMN 2: Miseensa Hin Taane with % -->
                                <div class="col-md-4" style="border-right: 1px solid #ddd;">
                                    <div style="font-weight: bold; margin-bottom: 15px; font-size: 15px; color: #3e7c40;">Miseensa Hin Taane</div>
                                    <div class="row">
                                        <div class="col-xs-3 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dhiira</div>
                                        <div class="col-xs-3 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dubartii</div>
                                        <div class="col-xs-3 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Ida'ama</div>
                                        <div class="col-xs-3 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">%</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-3"><input type="number" name="actual_nonmember_male" id="actual_nonmember_male" class="form-control" value="<?php echo $report->actual_nonmember_male; ?>" min="0" onchange="calculateAll()" style="height: 38px;"></div>
                                        <div class="col-xs-3"><input type="number" name="actual_nonmember_female" id="actual_nonmember_female" class="form-control" value="<?php echo $report->actual_nonmember_female; ?>" min="0" onchange="calculateAll()" style="height: 38px;"></div>
                                        <div class="col-xs-3"><input type="text" name="actual_nonmember_total" id="actual_nonmember_total" class="form-control" readonly value="<?php echo $report->actual_nonmember_total; ?>" style="height: 38px; background: #f5f5f5;"></div>
                                        <div class="col-xs-3"><input type="text" name="actual_nonmember_percent" id="actual_nonmember_percent" class="form-control" readonly value="<?php echo $report->actual_nonmember_percent; ?>" style="height: 38px; background: #f5f5f5;"></div>
                                    </div>
                                </div>
                                
                                <!-- COLUMN 3: Ida'ama Waliigalaa with % -->
                                <div class="col-md-4">
                                    <div style="font-weight: bold; margin-bottom: 15px; font-size: 15px; color: #3e7c40;">Ida'ama Waliigalaa</div>
                                    <div class="row">
                                        <div class="col-xs-3 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dhiira</div>
                                        <div class="col-xs-3 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dubartii</div>
                                        <div class="col-xs-3 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Waliigala</div>
                                        <div class="col-xs-3 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">%</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-3"><input type="text" name="actual_total_male" id="actual_total_male" class="form-control" readonly value="<?php echo $report->actual_total_male; ?>" style="height: 38px; background: #f5f5f5;"></div>
                                        <div class="col-xs-3"><input type="text" name="actual_total_female" id="actual_total_female" class="form-control" readonly value="<?php echo $report->actual_total_female; ?>" style="height: 38px; background: #f5f5f5;"></div>
                                        <div class="col-xs-3"><input type="text" name="actual_grand_total" id="actual_grand_total" class="form-control" readonly value="<?php echo $report->actual_grand_total; ?>" style="height: 38px; background: #f5f5f5;"></div>
                                        <div class="col-xs-3"><input type="text" name="actual_total_percent" id="actual_total_percent" class="form-control" readonly value="<?php echo $report->actual_total_percent; ?>" style="height: 38px; background: #f5f5f5;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- ============================================= -->
                    <!-- ROW 3: DABALATAA (Additional) and HUBANNOO (Remarks) -->
                    <!-- ============================================= -->
                    <div class="row" style="margin-bottom: 20px;">
                        <!-- DABALATAA - 3 Columns -->
                        <div class="col-md-8">
                            <div style="border: 1px solid #ff8c00; border-radius: 4px; overflow: hidden;">
                                <div style="background: #ff8c00; color: white; padding: 12px 15px; font-weight: bold; font-size: 16px;">
                                    <i class="fa fa-plus-circle"></i> GALMEE DABALATAA
                                </div>
                                <div style="padding: 20px; background: white;">
                                    <div class="row">
                                        <!-- Column 1: Miseensa Dabalataa -->
                                        <div class="col-md-4" style="border-right: 1px solid #ddd;">
                                            <div style="font-weight: bold; margin-bottom: 15px; font-size: 15px; color: #ff8c00;">Miseensa</div>
                                            <div class="row">
                                                <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dhiira</div>
                                                <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dubartii</div>
                                                <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Ida'ama</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4"><input type="number" name="additional_member_male" id="additional_member_male" class="form-control" value="<?php echo $report->additional_member_male; ?>" min="0" onchange="calculateAll()" style="height: 38px;"></div>
                                                <div class="col-xs-4"><input type="number" name="additional_member_female" id="additional_member_female" class="form-control" value="<?php echo $report->additional_member_female; ?>" min="0" onchange="calculateAll()" style="height: 38px;"></div>
                                                <div class="col-xs-4"><input type="text" name="additional_member_total" id="additional_member_total" class="form-control" readonly value="<?php echo $report->additional_member_total; ?>" style="height: 38px; background: #f5f5f5;"></div>
                                            </div>
                                        </div>
                                        
                                        <!-- Column 2: Miseensa Hin Taane Dabalataa -->
                                        <div class="col-md-4" style="border-right: 1px solid #ddd;">
                                            <div style="font-weight: bold; margin-bottom: 15px; font-size: 15px; color: #ff8c00;">Miseensa Hin Taane</div>
                                            <div class="row">
                                                <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dhiira</div>
                                                <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dubartii</div>
                                                <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Ida'ama</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4"><input type="number" name="additional_nonmember_male" id="additional_nonmember_male" class="form-control" value="<?php echo $report->additional_nonmember_male; ?>" min="0" onchange="calculateAll()" style="height: 38px;"></div>
                                                <div class="col-xs-4"><input type="number" name="additional_nonmember_female" id="additional_nonmember_female" class="form-control" value="<?php echo $report->additional_nonmember_female; ?>" min="0" onchange="calculateAll()" style="height: 38px;"></div>
                                                <div class="col-xs-4"><input type="text" name="additional_nonmember_total" id="additional_nonmember_total" class="form-control" readonly value="<?php echo $report->additional_nonmember_total; ?>" style="height: 38px; background: #f5f5f5;"></div>
                                            </div>
                                        </div>
                                        
                                        <!-- Column 3: Ida'ama Dabalataa -->
                                        <div class="col-md-4">
                                            <div style="font-weight: bold; margin-bottom: 15px; font-size: 15px; color: #ff8c00;">Ida'ama Dabalataa</div>
                                            <div class="row">
                                                <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dhiira</div>
                                                <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dubartii</div>
                                                <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Waliigala</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4"><input type="text" name="additional_total_male" id="additional_total_male" class="form-control" readonly value="<?php echo ($report->additional_member_male + $report->additional_nonmember_male); ?>" style="height: 38px; background: #f5f5f5;"></div>
                                                <div class="col-xs-4"><input type="text" name="additional_total_female" id="additional_total_female" class="form-control" readonly value="<?php echo ($report->additional_member_female + $report->additional_nonmember_female); ?>" style="height: 38px; background: #f5f5f5;"></div>
                                                <div class="col-xs-4"><input type="text" name="additional_grand_total" id="additional_grand_total" class="form-control" readonly value="<?php echo ($report->additional_member_total + $report->additional_nonmember_total); ?>" style="height: 38px; background: #f5f5f5;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- HUBANNOO - 4 Columns -->
                        <div class="col-md-4">
                            <div style="border: 1px solid #777; border-radius: 4px; overflow: hidden; height: 100%;">
                                <div style="background: #777; color: white; padding: 12px 15px; font-weight: bold; font-size: 16px;">
                                    <i class="fa fa-comment"></i> HUBANNOO
                                </div>
                                <div style="padding: 20px; background: white;">
                                    <textarea name="remarks" class="form-control" rows="8" style="height: 200px; padding: 10px; font-size: 14px; resize: none; border-radius: 4px;"><?php echo $report->remarks; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="row" style="margin-top: 25px;">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-warning" style="padding: 10px 35px; font-size: 16px; font-weight: 600; border-radius: 4px; background: #ffc107; border-color: #ffc107; color: #333; margin-right: 10px;">
                                <i class="fa fa-save"></i> Gabaasa Fooyyessi
                            </button>
                            <a href="<?php echo base_url('VotingReport/listReports'); ?>" class="btn btn-default" style="padding: 10px 35px; font-size: 16px; font-weight: 600; border-radius: 4px; background: #6c757d; border-color: #6c757d; color: white;">
                                <i class="fa fa-times"></i> Haqi
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<!-- JavaScript for Calculations -->
<script>
function calculateAll() {
    // KAROORA Calculations
    let planMemberMale = parseFloat(document.getElementById('plan_member_male').value) || 0;
    let planMemberFemale = parseFloat(document.getElementById('plan_member_female').value) || 0;
    let planNonmemberMale = parseFloat(document.getElementById('plan_nonmember_male').value) || 0;
    let planNonmemberFemale = parseFloat(document.getElementById('plan_nonmember_female').value) || 0;
    
    document.getElementById('plan_member_total').value = planMemberMale + planMemberFemale;
    document.getElementById('plan_nonmember_total').value = planNonmemberMale + planNonmemberFemale;
    document.getElementById('plan_total_male').value = planMemberMale + planNonmemberMale;
    document.getElementById('plan_total_female').value = planMemberFemale + planNonmemberFemale;
    document.getElementById('plan_grand_total').value = (planMemberMale + planMemberFemale) + (planNonmemberMale + planNonmemberFemale);
    
    // HOJIIN RAAWWATAME Calculations
    let actualMemberMale = parseFloat(document.getElementById('actual_member_male').value) || 0;
    let actualMemberFemale = parseFloat(document.getElementById('actual_member_female').value) || 0;
    let actualNonmemberMale = parseFloat(document.getElementById('actual_nonmember_male').value) || 0;
    let actualNonmemberFemale = parseFloat(document.getElementById('actual_nonmember_female').value) || 0;
    
    let actualMemberTotal = actualMemberMale + actualMemberFemale;
    let actualNonmemberTotal = actualNonmemberMale + actualNonmemberFemale;
    let actualTotalMale = actualMemberMale + actualNonmemberMale;
    let actualTotalFemale = actualMemberFemale + actualNonmemberFemale;
    let actualGrandTotal = actualMemberTotal + actualNonmemberTotal;
    
    document.getElementById('actual_member_total').value = actualMemberTotal;
    document.getElementById('actual_nonmember_total').value = actualNonmemberTotal;
    document.getElementById('actual_total_male').value = actualTotalMale;
    document.getElementById('actual_total_female').value = actualTotalFemale;
    document.getElementById('actual_grand_total').value = actualGrandTotal;
    
    // Percentages
    let planMemberTotal = parseFloat(document.getElementById('plan_member_total').value) || 0;
    let planNonmemberTotal = parseFloat(document.getElementById('plan_nonmember_total').value) || 0;
    let planGrandTotal = parseFloat(document.getElementById('plan_grand_total').value) || 0;
    
    document.getElementById('actual_member_percent').value = planMemberTotal > 0 ? (actualMemberTotal / planMemberTotal * 100).toFixed(2) : '0.00';
    document.getElementById('actual_nonmember_percent').value = planNonmemberTotal > 0 ? (actualNonmemberTotal / planNonmemberTotal * 100).toFixed(2) : '0.00';
    document.getElementById('actual_total_percent').value = planGrandTotal > 0 ? (actualGrandTotal / planGrandTotal * 100).toFixed(2) : '0.00';
    
    // DABALATAA Calculations
    let additionalMemberMale = parseFloat(document.getElementById('additional_member_male').value) || 0;
    let additionalMemberFemale = parseFloat(document.getElementById('additional_member_female').value) || 0;
    let additionalNonmemberMale = parseFloat(document.getElementById('additional_nonmember_male').value) || 0;
    let additionalNonmemberFemale = parseFloat(document.getElementById('additional_nonmember_female').value) || 0;
    
    let additionalMemberTotal = additionalMemberMale + additionalMemberFemale;
    let additionalNonmemberTotal = additionalNonmemberMale + additionalNonmemberFemale;
    let additionalTotalMale = additionalMemberMale + additionalNonmemberMale;
    let additionalTotalFemale = additionalMemberFemale + additionalNonmemberFemale;
    let additionalGrandTotal = additionalMemberTotal + additionalNonmemberTotal;
    
    document.getElementById('additional_member_total').value = additionalMemberTotal;
    document.getElementById('additional_nonmember_total').value = additionalNonmemberTotal;
    
    if(document.getElementById('additional_total_male')) {
        document.getElementById('additional_total_male').value = additionalTotalMale;
    }
    if(document.getElementById('additional_total_female')) {
        document.getElementById('additional_total_female').value = additionalTotalFemale;
    }
    if(document.getElementById('additional_grand_total')) {
        document.getElementById('additional_grand_total').value = additionalGrandTotal;
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    calculateAll();
    
    // Add event listeners for all number inputs
    document.querySelectorAll('input[type="number"]').forEach(function(input) {
        input.addEventListener('input', calculateAll);
    });
});
</script>

<style>
    .form-control {
        border-radius: 4px;
        box-shadow: none;
        border: 1px solid #ddd;
    }
    .form-control:focus {
        border-color: #2c5f2d;
        box-shadow: 0 0 0 2px rgba(44,95,45,0.1);
    }
    .btn {
        transition: all 0.3s ease;
    }
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 3px 8px rgba(0,0,0,0.1);
    }
</style>