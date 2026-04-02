<div class="content-wrapper" style="background: #f4f6f9;">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="padding: 10px 15px;">
        <h1 style="font-size: 20px; margin: 0;">
            <?php echo $pageTitle; ?>
            <small style="font-size: 13px;">Naannoo Filannoo</small>
        </h1>
        <ol class="breadcrumb" style="padding: 0; margin: 5px 0 0; background: none;">
            <li><a href="<?php echo base_url(); ?>VotingReport/dashboard"><i class="fa fa-dashboard"></i> Daashboordii</a></li>
            <li class="active">Galmee Ragaa</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="padding: 10px;">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-default" style="box-shadow: none; border-radius: 0;">
                    <div class="box-body" style="padding: 15px;">
                        
  <!-- Flash Messages -->
<?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible" style="padding: 8px; margin-bottom: 10px;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <i class="icon fa fa-check"></i> <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if($this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible" style="padding: 8px; margin-bottom: 10px;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>
                        <!-- User Info Bar - Shows Naannoo Filannoo from Profile -->
                        <div class="row" style="margin-bottom: 15px; background: #e8f0e8; padding: 12px; border-left: 4px solid #2c5f2d;">
                            <div class="col-md-4">
                                <strong><i class="fa fa-user"></i> Gabaasaa:</strong> <?php echo $reporter_name; ?>
                            </div>
                            <div class="col-md-4">
                                <strong><i class="fa fa-map-marker"></i> Naannoo Filannoo:</strong> 
                                <span class="text-green" style="font-weight: bold;"><?php echo $voting_region_name; ?></span>
                            </div>
                            <div class="col-md-4">
                                <strong><i class="fa fa-hashtag"></i> Lakkoofsa Tarree:</strong> #<?php echo $serial_number; ?>
                            </div>
                        </div>
                        
                        <!-- Session Status - Top Row -->
                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-md-6">
                                <div style="background: <?php echo $morning_report ? '#dff0d8' : '#fcf8e3'; ?>; padding: 8px 12px; border-left: 3px solid <?php echo $morning_report ? '#3c763d' : '#8a6d3b'; ?>;">
                                    <span style="font-weight: bold;">Kan Ganama (8:00-12:00)</span>
                                    <span style="float: right;"><?php echo $morning_report ? '✓ Galmaa\'eera' : '⏳ Hin Galmaa\'in'; ?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="background: <?php echo $afternoon_report ? '#dff0d8' : '#fcf8e3'; ?>; padding: 8px 12px; border-left: 3px solid <?php echo $afternoon_report ? '#3c763d' : '#8a6d3b'; ?>;">
                                    <span style="font-weight: bold;">Kan Waaree Booda (14:00-17:00)</span>
                                    <span style="float: right;"><?php echo $afternoon_report ? '✓ Galmaa\'eera' : '⏳ Hin Galmaa\'in'; ?></span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Registration Form -->
                        <form method="post" action="<?php echo base_url('VotingReport/save'); ?>" id="votingForm">
                            
                          <!-- Hidden Fields - naannoofil_id from user profile (VARCHAR) -->
<input type="hidden" name="naannoofil_id" value="<?php echo $naannoofil; ?>">
                            <input type="hidden" name="report_date" value="<?php echo $today; ?>">
                            <input type="hidden" name="report_time" value="<?php echo $current_time; ?>">
                            <input type="hidden" name="serial_number" value="<?php echo $serial_number; ?>">
                           
                            <input type="hidden" name="reporter_id" value="<?php echo $reporter_id; ?>">
                            <input type="hidden" name="reporter_name" value="<?php echo $reporter_name; ?>">
                            
                            <!-- Yeroo Gabaasaa Selection Only -->
                            <div class="row" style="margin-bottom: 20px;">
                                <div class="col-md-4 col-md-offset-4">
                                    <div class="form-group">
                                        <label style="font-size: 14px; font-weight: 600;">Yeroo Gabaasaa <span class="text-red">*</span></label>
                                        <select name="report_session" class="form-control" style="height: 38px;" required>
                                            <option value="">-- Yeroo Filadhu --</option>
                                            <option value="morning" <?php echo ($current_session == 'morning' && !$morning_report) ? 'selected' : ''; ?> <?php echo $morning_report ? 'disabled' : ''; ?>>Kan Ganama</option>
                                            <option value="afternoon" <?php echo ($current_session == 'afternoon' && !$afternoon_report) ? 'selected' : ''; ?> <?php echo $afternoon_report ? 'disabled' : ''; ?>>Kan Waaree Booda</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- ============================================= -->
                            <!-- ROW 1: KAROORA (Plan) - 3 BIG COLUMNS -->
                            <!-- ============================================= -->
                            <div style="margin-bottom: 20px; border: 1px solid #2c5f2d;">
                                <div style="background: #2c5f2d; color: white; padding: 8px 12px; font-weight: bold; font-size: 15px;">
                                    <i class="fa fa-pencil-square-o"></i> KAROORA (QOPHII)
                                </div>
                                <div style="padding: 15px;">
                                    <div class="row">
                                        <!-- COLUMN 1: Miseensa -->
                                        <div class="col-md-4" style="border-right: 1px solid #ddd;">
                                            <div style="font-weight: bold; margin-bottom: 10px; font-size: 14px; color: #2c5f2d;">Miseensa</div>
                                            <div class="row">
                                                <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dhiira</div>
                                                <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dubartii</div>
                                                <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Ida'ama</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4"><input type="number" name="plan_member_male" id="plan_member_male" class="form-control" value="0" min="0" onchange="calculateAll()" placeholder="0" style="height: 32px;"></div>
                                                <div class="col-xs-4"><input type="number" name="plan_member_female" id="plan_member_female" class="form-control" value="0" min="0" onchange="calculateAll()" placeholder="0" style="height: 32px;"></div>
                                                <div class="col-xs-4"><input type="text" name="plan_member_total" id="plan_member_total" class="form-control" readonly value="0" placeholder="0" style="height: 32px; background: #f5f5f5;"></div>
                                            </div>
                                        </div>
                                        
                                        <!-- COLUMN 2: Miseensa Hin Taane -->
                                        <div class="col-md-4" style="border-right: 1px solid #ddd;">
                                            <div style="font-weight: bold; margin-bottom: 10px; font-size: 14px; color: #2c5f2d;">Miseensa Hin Taane</div>
                                            <div class="row">
                                                <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dhiira</div>
                                                <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dubartii</div>
                                                <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Ida'ama</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4"><input type="number" name="plan_nonmember_male" id="plan_nonmember_male" class="form-control" value="0" min="0" onchange="calculateAll()" placeholder="0" style="height: 32px;"></div>
                                                <div class="col-xs-4"><input type="number" name="plan_nonmember_female" id="plan_nonmember_female" class="form-control" value="0" min="0" onchange="calculateAll()" placeholder="0" style="height: 32px;"></div>
                                                <div class="col-xs-4"><input type="text" name="plan_nonmember_total" id="plan_nonmember_total" class="form-control" readonly value="0" placeholder="0" style="height: 32px; background: #f5f5f5;"></div>
                                            </div>
                                        </div>
                                        
                                        <!-- COLUMN 3: Ida'ama Waliigalaa -->
                                        <div class="col-md-4">
                                            <div style="font-weight: bold; margin-bottom: 10px; font-size: 14px; color: #2c5f2d;">Ida'ama Waliigalaa</div>
                                            <div class="row">
                                                <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dhiira</div>
                                                <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dubartii</div>
                                                <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Waliigala</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4"><input type="text" name="plan_total_male" id="plan_total_male" class="form-control" readonly value="0" placeholder="0" style="height: 32px; background: #f5f5f5;"></div>
                                                <div class="col-xs-4"><input type="text" name="plan_total_female" id="plan_total_female" class="form-control" readonly value="0" placeholder="0" style="height: 32px; background: #f5f5f5;"></div>
                                                <div class="col-xs-4"><input type="text" name="plan_grand_total" id="plan_grand_total" class="form-control" readonly value="0" placeholder="0" style="height: 32px; background: #f5f5f5;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- ============================================= -->
                            <!-- ROW 2: HOJIIN RAAWWATAME (Actual) - 3 BIG COLUMNS WITH % -->
                            <!-- ============================================= -->
                            <div style="margin-bottom: 20px; border: 1px solid #3e7c40;">
                                <div style="background: #3e7c40; color: white; padding: 8px 12px; font-weight: bold; font-size: 15px;">
                                    <i class="fa fa-check-circle-o"></i> HOJIIN RAAWWATAME
                                </div>
                                <div style="padding: 15px;">
                                    <div class="row">
                                        <!-- COLUMN 1: Miseensa with % -->
                                        <div class="col-md-4" style="border-right: 1px solid #ddd;">
                                            <div style="font-weight: bold; margin-bottom: 10px; font-size: 14px; color: #3e7c40;">Miseensa</div>
                                            <div class="row">
                                                <div class="col-xs-3 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dhiira</div>
                                                <div class="col-xs-3 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dubartii</div>
                                                <div class="col-xs-3 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Ida'ama</div>
                                                <div class="col-xs-3 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">%</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3"><input type="number" name="actual_member_male" id="actual_member_male" class="form-control" value="0" min="0" onchange="calculateAll()" placeholder="0" style="height: 32px;"></div>
                                                <div class="col-xs-3"><input type="number" name="actual_member_female" id="actual_member_female" class="form-control" value="0" min="0" onchange="calculateAll()" placeholder="0" style="height: 32px;"></div>
                                                <div class="col-xs-3"><input type="text" name="actual_member_total" id="actual_member_total" class="form-control" readonly value="0" placeholder="0" style="height: 32px; background: #f5f5f5;"></div>
                                                <div class="col-xs-3"><input type="text" name="actual_member_percent" id="actual_member_percent" class="form-control" readonly value="0.00" placeholder="%" style="height: 32px; background: #f5f5f5;"></div>
                                            </div>
                                        </div>
                                        
                                        <!-- COLUMN 2: Miseensa Hin Taane with % -->
                                        <div class="col-md-4" style="border-right: 1px solid #ddd;">
                                            <div style="font-weight: bold; margin-bottom: 10px; font-size: 14px; color: #3e7c40;">Miseensa Hin Taane</div>
                                            <div class="row">
                                                <div class="col-xs-3 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dhiira</div>
                                                <div class="col-xs-3 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dubartii</div>
                                                <div class="col-xs-3 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Ida'ama</div>
                                                <div class="col-xs-3 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">%</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3"><input type="number" name="actual_nonmember_male" id="actual_nonmember_male" class="form-control" value="0" min="0" onchange="calculateAll()" placeholder="0" style="height: 32px;"></div>
                                                <div class="col-xs-3"><input type="number" name="actual_nonmember_female" id="actual_nonmember_female" class="form-control" value="0" min="0" onchange="calculateAll()" placeholder="0" style="height: 32px;"></div>
                                                <div class="col-xs-3"><input type="text" name="actual_nonmember_total" id="actual_nonmember_total" class="form-control" readonly value="0" placeholder="0" style="height: 32px; background: #f5f5f5;"></div>
                                                <div class="col-xs-3"><input type="text" name="actual_nonmember_percent" id="actual_nonmember_percent" class="form-control" readonly value="0.00" placeholder="%" style="height: 32px; background: #f5f5f5;"></div>
                                            </div>
                                        </div>
                                        
                                        <!-- COLUMN 3: Ida'ama Waliigalaa with % -->
                                        <div class="col-md-4">
                                            <div style="font-weight: bold; margin-bottom: 10px; font-size: 14px; color: #3e7c40;">Ida'ama Waliigalaa</div>
                                            <div class="row">
                                                <div class="col-xs-3 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dhiira</div>
                                                <div class="col-xs-3 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dubartii</div>
                                                <div class="col-xs-3 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Waliigala</div>
                                                <div class="col-xs-3 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">%</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3"><input type="text" name="actual_total_male" id="actual_total_male" class="form-control" readonly value="0" placeholder="0" style="height: 32px; background: #f5f5f5;"></div>
                                                <div class="col-xs-3"><input type="text" name="actual_total_female" id="actual_total_female" class="form-control" readonly value="0" placeholder="0" style="height: 32px; background: #f5f5f5;"></div>
                                                <div class="col-xs-3"><input type="text" name="actual_grand_total" id="actual_grand_total" class="form-control" readonly value="0" placeholder="0" style="height: 32px; background: #f5f5f5;"></div>
                                                <div class="col-xs-3"><input type="text" name="actual_total_percent" id="actual_total_percent" class="form-control" readonly value="0.00" placeholder="%" style="height: 32px; background: #f5f5f5;"></div>
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
                                    <div style="border: 1px solid #ff8c00;">
                                        <div style="background: #ff8c00; color: white; padding: 8px 12px; font-weight: bold; font-size: 15px;">
                                            <i class="fa fa-plus-circle"></i> GALMEE GURMAA'IINSAAN
                                        </div>
                                        <div style="padding: 15px;">
                                            <div class="row">
                                                <!-- Column 1: Miseensa Dabalataa -->
                                                <div class="col-md-4" style="border-right: 1px solid #ddd;">
                                                    <div style="font-weight: bold; margin-bottom: 10px; font-size: 14px; color: #ff8c00;">Miseensa</div>
                                                    <div class="row">
                                                        <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dhiira</div>
                                                        <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dubartii</div>
                                                        <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Ida'ama</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-4"><input type="number" name="additional_member_male" id="additional_member_male" class="form-control" value="0" min="0" onchange="calculateAll()" placeholder="0" style="height: 32px;"></div>
                                                        <div class="col-xs-4"><input type="number" name="additional_member_female" id="additional_member_female" class="form-control" value="0" min="0" onchange="calculateAll()" placeholder="0" style="height: 32px;"></div>
                                                        <div class="col-xs-4"><input type="text" name="additional_member_total" id="additional_member_total" class="form-control" readonly value="0" placeholder="0" style="height: 32px; background: #f5f5f5;"></div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Column 2: Miseensa Hin Taane Dabalataa -->
                                                <div class="col-md-4" style="border-right: 1px solid #ddd;">
                                                    <div style="font-weight: bold; margin-bottom: 10px; font-size: 14px; color: #ff8c00;">Miseensa Hin Taane</div>
                                                    <div class="row">
                                                        <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dhiira</div>
                                                        <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dubartii</div>
                                                        <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Ida'ama</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-4"><input type="number" name="additional_nonmember_male" id="additional_nonmember_male" class="form-control" value="0" min="0" onchange="calculateAll()" placeholder="0" style="height: 32px;"></div>
                                                        <div class="col-xs-4"><input type="number" name="additional_nonmember_female" id="additional_nonmember_female" class="form-control" value="0" min="0" onchange="calculateAll()" placeholder="0" style="height: 32px;"></div>
                                                        <div class="col-xs-4"><input type="text" name="additional_nonmember_total" id="additional_nonmember_total" class="form-control" readonly value="0" placeholder="0" style="height: 32px; background: #f5f5f5;"></div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Column 3: Ida'ama Dabalataa -->
                                                <div class="col-md-4">
                                                    <div style="font-weight: bold; margin-bottom: 10px; font-size: 14px; color: #ff8c00;">Ida'ama Dabalataa</div>
                                                    <div class="row">
                                                        <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dhiira</div>
                                                        <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Dubartii</div>
                                                        <div class="col-xs-4 text-center" style="font-size: 12px; color: #555; margin-bottom: 5px;">Waliigala</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-4"><input type="text" name="additional_total_male" id="additional_total_male" class="form-control" readonly value="0" placeholder="0" style="height: 32px; background: #f5f5f5;"></div>
                                                        <div class="col-xs-4"><input type="text" name="additional_total_female" id="additional_total_female" class="form-control" readonly value="0" placeholder="0" style="height: 32px; background: #f5f5f5;"></div>
                                                        <div class="col-xs-4"><input type="text" name="additional_grand_total" id="additional_grand_total" class="form-control" readonly value="0" placeholder="0" style="height: 32px; background: #f5f5f5;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- HUBANNOO - 4 Columns -->
                                <div class="col-md-4">
                                    <div style="border: 1px solid #777; height: 100%;">
                                        <div style="background: #777; color: white; padding: 8px 12px; font-weight: bold; font-size: 15px;">
                                            <i class="fa fa-comment"></i> HUBANNOO
                                        </div>
                                        <div style="padding: 15px;">
                                            <textarea name="remarks" class="form-control" rows="6" style="height: 155px; padding: 8px; font-size: 13px; resize: none;" placeholder="Hubannoo yoo jiraate as irratti barreessi..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Submit Buttons -->
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success" style="padding: 8px 30px; font-weight: bold;" <?php echo ($morning_report && $afternoon_report) ? 'disabled' : ''; ?>>
                                        <i class="fa fa-save"></i> Galmee Gabaa
                                    </button>
                                    <button type="reset" class="btn btn-warning" style="padding: 8px 30px; margin-left: 10px; font-weight: bold;">
                                        <i class="fa fa-undo"></i> Irra Deebi'i
                                    </button>
                                    <a href="<?php echo base_url(); ?>VotingReport/dashboard" class="btn btn-info" style="padding: 8px 30px; margin-left: 10px;">
                                        <i class="fa fa-arrow-left"></i> Daashboordiitti Deebi'i
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
<script>
// Force remove any error messages when the page loads
document.addEventListener('DOMContentLoaded', function() {
    // Find and remove any error alerts
    var errorAlerts = document.querySelectorAll('.alert-danger');
    errorAlerts.forEach(function(alert) {
        // Check if it contains the specific error message
        if(alert.innerHTML.indexOf('Odeeffannoo fayyadamaa hin argamne') !== -1) {
            alert.style.display = 'none';
        }
    });
});
</script>