<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $pageTitle; ?>
            <small>Naannoo Filannoo</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Dawashii</a></li>
            <li class="active">Galmee Ragaa</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Guyyaa Guyyaa Galmee Ragaa Filannoo</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    
                    <div class="box-body">
                        
                        <!-- Flash Messages -->
                        <?php if($this->session->flashdata('success')): ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> Milkaa'ina!</h4>
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-ban"></i> Dogoggora!</h4>
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Information Section -->
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-md-3">
                                <div class="info-box bg-green">
                                    <span class="info-box-icon"><i class="fa fa-calendar"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Guyyaa</span>
                                        <span class="info-box-number"><?php echo date('Y-m-d', strtotime($today)); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-box bg-yellow">
                                    <span class="info-box-icon"><i class="fa fa-clock-o"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Yeroo</span>
                                        <span class="info-box-number"><?php echo $current_time; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-box bg-aqua">
                                    <span class="info-box-icon"><i class="fa fa-hashtag"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Lakkoofsa Tarree</span>
                                        <span class="info-box-number">#<?php echo $serial_number; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-box bg-purple">
                                    <span class="info-box-icon"><i class="fa fa-user"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Gabaasaa</span>
                                        <span class="info-box-number"><?php echo $reporter_name; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Session Status -->
                        <div class="row" style="margin-bottom: 25px;">
                            <div class="col-md-6">
                                <div class="small-box <?php echo $morning_report ? 'bg-green' : 'bg-yellow'; ?>">
                                    <div class="inner">
                                        <h3><?php echo $morning_report ? 'Galmaa\'eera' : 'Hin Galmaa\'in'; ?></h3>
                                        <p>Kan Ganama (8:00-12:00)</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa <?php echo $morning_report ? 'fa-check-circle' : 'fa-clock-o'; ?>"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="small-box <?php echo $afternoon_report ? 'bg-green' : 'bg-yellow'; ?>">
                                    <div class="inner">
                                        <h3><?php echo $afternoon_report ? 'Galmaa\'eera' : 'Hin Galmaa\'in'; ?></h3>
                                        <p>Kan Waaree Booda (14:00-17:00)</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa <?php echo $afternoon_report ? 'fa-check-circle' : 'fa-clock-o'; ?>"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Registration Form -->
                        <form method="post" action="<?php echo base_url('VotingReport/save'); ?>" id="votingForm">
                            
                            <!-- Hidden Fields -->
                            <input type="hidden" name="voting_region_id" value="<?php echo $voting_region_id; ?>">
                            <input type="hidden" name="voting_region_name" value="<?php echo $voting_region_name; ?>">
                            <input type="hidden" name="report_date" value="<?php echo $today; ?>">
                            <input type="hidden" name="report_time" value="<?php echo $current_time; ?>">
                            <input type="hidden" name="serial_number" value="<?php echo $serial_number; ?>">
                            <input type="hidden" name="reporter_id" value="<?php echo $reporter_id; ?>">
                            <input type="hidden" name="reporter_name" value="<?php echo $reporter_name; ?>">
                            
                            <!-- Session Selection -->
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label class="control-label">Yeroo Gabaasaa <span class="text-red">*</span></label>
                                        <select name="report_session" class="form-control" required>
                                            <option value="">-- Yeroo filadhu --</option>
                                            <option value="morning" <?php echo ($current_session == 'morning' && !$morning_report) ? 'selected' : ''; ?> <?php echo $morning_report ? 'disabled' : ''; ?>>Kan Ganama (8:00-12:00)</option>
                                            <option value="afternoon" <?php echo ($current_session == 'afternoon' && !$afternoon_report) ? 'selected' : ''; ?> <?php echo $afternoon_report ? 'disabled' : ''; ?>>Kan Waaree Booda (14:00-17:00)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Main Table -->
                            <div class="table-responsive" style="overflow-x: auto;">
                                <table class="table table-bordered table-striped" style="min-width: 1800px;">
                                    <!-- Header Row 1 -->
                                    <thead>
                                        <tr>
                                            <th rowspan="3" style="vertical-align: middle; background-color: #2c5f2d; color: white; width: 50px;">#</th>
                                            <th rowspan="3" style="vertical-align: middle; background-color: #2c5f2d; color: white; width: 200px;">Naannoo Filannoo</th>
                                            <th colspan="9" style="background-color: #2c5f2d; color: white; text-align: center;">KAROORA (QOPHII)</th>
                                            <th colspan="12" style="background-color: #2c5f2d; color: white; text-align: center;">HOJIIN RAAWWATAME</th>
                                            <th colspan="6" style="background-color: #2c5f2d; color: white; text-align: center;">GALMEE DABALATAA</th>
                                            <th rowspan="3" style="vertical-align: middle; background-color: #2c5f2d; color: white; width: 200px;">HUBANNOO</th>
                                        </tr>
                                        
                                        <!-- Header Row 2 -->
                                        <tr>
                                            <th colspan="3" style="background-color: #3e7c40; color: white; text-align: center;">Abbaa Miseensa</th>
                                            <th colspan="3" style="background-color: #3e7c40; color: white; text-align: center;">Miseensa Hin Taane</th>
                                            <th colspan="3" style="background-color: #3e7c40; color: white; text-align: center;">Ida'ama Waliigalaa</th>
                                            
                                            <th colspan="4" style="background-color: #3e7c40; color: white; text-align: center;">Abbaa Miseensa</th>
                                            <th colspan="4" style="background-color: #3e7c40; color: white; text-align: center;">Miseensa Hin Taane</th>
                                            <th colspan="4" style="background-color: #3e7c40; color: white; text-align: center;">Ida'ama Waliigalaa</th>
                                            
                                            <th colspan="3" style="background-color: #3e7c40; color: white; text-align: center;">Abbaa Miseensa</th>
                                            <th colspan="3" style="background-color: #3e7c40; color: white; text-align: center;">Miseensa Hin Taane</th>
                                        </tr>
                                        
                                        <!-- Header Row 3 -->
                                        <tr style="background-color: #e8f0e8;">
                                            <!-- Karoora -->
                                            <th>Dhiira</th>
                                            <th>Dubartii</th>
                                            <th>Ida'ama</th>
                                            
                                            <th>Dhiira</th>
                                            <th>Dubartii</th>
                                            <th>Ida'ama</th>
                                            
                                            <th>Dhiira</th>
                                            <th>Dubartii</th>
                                            <th>Ida'ama</th>
                                            
                                            <!-- Hojiin Raawwatame -->
                                            <th>Dhiira</th>
                                            <th>Dubartii</th>
                                            <th>Ida'ama</th>
                                            <th>%</th>
                                            
                                            <th>Dhiira</th>
                                            <th>Dubartii</th>
                                            <th>Ida'ama</th>
                                            <th>%</th>
                                            
                                            <th>Dhiira</th>
                                            <th>Dubartii</th>
                                            <th>Ida'ama</th>
                                            <th>%</th>
                                            
                                            <!-- Galmee Dabalataa -->
                                            <th>Dhiira</th>
                                            <th>Dubartii</th>
                                            <th>Ida'ama</th>
                                            
                                            <th>Dhiira</th>
                                            <th>Dubartii</th>
                                            <th>Ida'ama</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <!-- Data Row -->
                                        <tr>
                                            <td class="text-center"><strong>1</strong></td>
                                            <td>
                                                <input type="text" name="voting_region_name_display" class="form-control" value="<?php echo $voting_region_name; ?>" placeholder="Maqaa Naannoo Filannoo" required>
                                            </td>
                                            
                                            <!-- Karoora - Abbaa Miseensa -->
                                            <td><input type="number" name="plan_member_male" id="plan_member_male" class="form-control" value="0" min="0" onchange="calculateAll()"></td>
                                            <td><input type="number" name="plan_member_female" id="plan_member_female" class="form-control" value="0" min="0" onchange="calculateAll()"></td>
                                            <td><input type="text" name="plan_member_total" id="plan_member_total" class="form-control" readonly value="0"></td>
                                            
                                            <!-- Karoora - Miseensa Hin Taane -->
                                            <td><input type="number" name="plan_nonmember_male" id="plan_nonmember_male" class="form-control" value="0" min="0" onchange="calculateAll()"></td>
                                            <td><input type="number" name="plan_nonmember_female" id="plan_nonmember_female" class="form-control" value="0" min="0" onchange="calculateAll()"></td>
                                            <td><input type="text" name="plan_nonmember_total" id="plan_nonmember_total" class="form-control" readonly value="0"></td>
                                            
                                            <!-- Karoora - Ida'ama Waliigalaa -->
                                            <td><input type="text" name="plan_total_male" id="plan_total_male" class="form-control" readonly value="0"></td>
                                            <td><input type="text" name="plan_total_female" id="plan_total_female" class="form-control" readonly value="0"></td>
                                            <td><input type="text" name="plan_grand_total" id="plan_grand_total" class="form-control" readonly value="0"></td>
                                            
                                            <!-- Hojiin Raawwatame - Abbaa Miseensa -->
                                            <td><input type="number" name="actual_member_male" id="actual_member_male" class="form-control" value="0" min="0" onchange="calculateAll()"></td>
                                            <td><input type="number" name="actual_member_female" id="actual_member_female" class="form-control" value="0" min="0" onchange="calculateAll()"></td>
                                            <td><input type="text" name="actual_member_total" id="actual_member_total" class="form-control" readonly value="0"></td>
                                            <td><input type="text" name="actual_member_percent" id="actual_member_percent" class="form-control" readonly value="0.00"></td>
                                            
                                            <!-- Hojiin Raawwatame - Miseensa Hin Taane -->
                                            <td><input type="number" name="actual_nonmember_male" id="actual_nonmember_male" class="form-control" value="0" min="0" onchange="calculateAll()"></td>
                                            <td><input type="number" name="actual_nonmember_female" id="actual_nonmember_female" class="form-control" value="0" min="0" onchange="calculateAll()"></td>
                                            <td><input type="text" name="actual_nonmember_total" id="actual_nonmember_total" class="form-control" readonly value="0"></td>
                                            <td><input type="text" name="actual_nonmember_percent" id="actual_nonmember_percent" class="form-control" readonly value="0.00"></td>
                                            
                                            <!-- Hojiin Raawwatame - Ida'ama Waliigalaa -->
                                            <td><input type="text" name="actual_total_male" id="actual_total_male" class="form-control" readonly value="0"></td>
                                            <td><input type="text" name="actual_total_female" id="actual_total_female" class="form-control" readonly value="0"></td>
                                            <td><input type="text" name="actual_grand_total" id="actual_grand_total" class="form-control" readonly value="0"></td>
                                            <td><input type="text" name="actual_total_percent" id="actual_total_percent" class="form-control" readonly value="0.00"></td>
                                            
                                            <!-- Galmee Dabalataa - Abbaa Miseensa -->
                                            <td><input type="number" name="additional_member_male" id="additional_member_male" class="form-control" value="0" min="0" onchange="calculateAll()"></td>
                                            <td><input type="number" name="additional_member_female" id="additional_member_female" class="form-control" value="0" min="0" onchange="calculateAll()"></td>
                                            <td><input type="text" name="additional_member_total" id="additional_member_total" class="form-control" readonly value="0"></td>
                                            
                                            <!-- Galmee Dabalataa - Miseensa Hin Taane -->
                                            <td><input type="number" name="additional_nonmember_male" id="additional_nonmember_male" class="form-control" value="0" min="0" onchange="calculateAll()"></td>
                                            <td><input type="number" name="additional_nonmember_female" id="additional_nonmember_female" class="form-control" value="0" min="0" onchange="calculateAll()"></td>
                                            <td><input type="text" name="additional_nonmember_total" id="additional_nonmember_total" class="form-control" readonly value="0"></td>
                                            
                                            <!-- Hubannoo -->
                                            <td><input type="text" name="remarks" class="form-control" placeholder="Hubannoo yoo jiraate..."></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <!-- Submit Buttons -->
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success btn-lg" <?php echo ($morning_report && $afternoon_report) ? 'disabled' : ''; ?>>
                                        <i class="fa fa-save"></i> Galmee Gabaa
                                    </button>
                                    <button type="reset" class="btn btn-default btn-lg">
                                        <i class="fa fa-undo"></i> Irra Deebi'i
                                    </button>
                                    <a href="<?php echo base_url(); ?>dashboard" class="btn btn-warning btn-lg">
                                        <i class="fa fa-arrow-left"></i> Deebi'i
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
    // Get Karoora values
    let planMemberMale = parseFloat(document.getElementById('plan_member_male').value) || 0;
    let planMemberFemale = parseFloat(document.getElementById('plan_member_female').value) || 0;
    let planNonmemberMale = parseFloat(document.getElementById('plan_nonmember_male').value) || 0;
    let planNonmemberFemale = parseFloat(document.getElementById('plan_nonmember_female').value) || 0;
    
    // Calculate Karoora totals
    let planMemberTotal = planMemberMale + planMemberFemale;
    let planNonmemberTotal = planNonmemberMale + planNonmemberFemale;
    let planTotalMale = planMemberMale + planNonmemberMale;
    let planTotalFemale = planMemberFemale + planNonmemberFemale;
    let planGrandTotal = planMemberTotal + planNonmemberTotal;
    
    document.getElementById('plan_member_total').value = planMemberTotal;
    document.getElementById('plan_nonmember_total').value = planNonmemberTotal;
    document.getElementById('plan_total_male').value = planTotalMale;
    document.getElementById('plan_total_female').value = planTotalFemale;
    document.getElementById('plan_grand_total').value = planGrandTotal;
    
    // Get Actual values
    let actualMemberMale = parseFloat(document.getElementById('actual_member_male').value) || 0;
    let actualMemberFemale = parseFloat(document.getElementById('actual_member_female').value) || 0;
    let actualNonmemberMale = parseFloat(document.getElementById('actual_nonmember_male').value) || 0;
    let actualNonmemberFemale = parseFloat(document.getElementById('actual_nonmember_female').value) || 0;
    
    // Calculate Actual totals
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
    
    // Calculate percentages
    if(planMemberTotal > 0) {
        let memberPercent = (actualMemberTotal / planMemberTotal * 100).toFixed(2);
        document.getElementById('actual_member_percent').value = memberPercent;
    } else {
        document.getElementById('actual_member_percent').value = '0.00';
    }
    
    if(planNonmemberTotal > 0) {
        let nonmemberPercent = (actualNonmemberTotal / planNonmemberTotal * 100).toFixed(2);
        document.getElementById('actual_nonmember_percent').value = nonmemberPercent;
    } else {
        document.getElementById('actual_nonmember_percent').value = '0.00';
    }
    
    if(planGrandTotal > 0) {
        let totalPercent = (actualGrandTotal / planGrandTotal * 100).toFixed(2);
        document.getElementById('actual_total_percent').value = totalPercent;
    } else {
        document.getElementById('actual_total_percent').value = '0.00';
    }
    
    // Get Additional values
    let additionalMemberMale = parseFloat(document.getElementById('additional_member_male').value) || 0;
    let additionalMemberFemale = parseFloat(document.getElementById('additional_member_female').value) || 0;
    let additionalNonmemberMale = parseFloat(document.getElementById('additional_nonmember_male').value) || 0;
    let additionalNonmemberFemale = parseFloat(document.getElementById('additional_nonmember_female').value) || 0;
    
    // Calculate Additional totals
    let additionalMemberTotal = additionalMemberMale + additionalMemberFemale;
    let additionalNonmemberTotal = additionalNonmemberMale + additionalNonmemberFemale;
    
    document.getElementById('additional_member_total').value = additionalMemberTotal;
    document.getElementById('additional_nonmember_total').value = additionalNonmemberTotal;
}

// Calculate on page load
window.onload = function() {
    calculateAll();
    
    // Add input event listeners for all number inputs
    let numberInputs = document.querySelectorAll('input[type="number"]');
    numberInputs.forEach(function(input) {
        input.addEventListener('input', calculateAll);
    });
};