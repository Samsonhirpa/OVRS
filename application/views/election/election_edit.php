<div class="content-wrapper" style="background: linear-gradient(135deg, #f5f7fc 0%, #eef2f8 100%); min-height: 100vh;">
    <section class="content-header" style="padding: 25px 30px 0 30px;">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
            <div>
                <h1 style="font-size: 28px; margin: 0; font-weight: 700; background: linear-gradient(135deg, #e67e22 0%, #f39c12 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                    <i class="fa fa-edit" style="color: #e67e22; margin-right: 12px; -webkit-text-fill-color: initial;"></i>
                    Gabaasa Fooyyessuu - Filannoo Paartii
                </h1>
                <p style="margin: 5px 0 0; color: #6c86a3; font-size: 13px;">
                    <i class="fa fa-clock-o"></i> Yeroo hafe: <strong id="countdown" style="color: #e67e22;"></strong>
                </p>
            </div>
            <div>
                <a href="<?php echo base_url('ElectionReport/listReports'); ?>" class="btn btn-default" style="border-radius: 30px; padding: 10px 25px; background: white; border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                    <i class="fa fa-arrow-left"></i> Deebi'i
                </a>
            </div>
        </div>
    </section>

    <section class="content" style="padding: 20px 30px;">
        <div class="row">
            <div class="col-md-12">
                
                <!-- Warning Alert -->
                <div style="background: linear-gradient(135deg, #fff3e0, #ffe0b2); border-radius: 16px; padding: 15px 20px; margin-bottom: 20px; border-left: 4px solid #e67e22;">
                    <i class="fa fa-warning" style="color: #e67e22;"></i>
                    <span style="color: #e67e22;">
                        <strong>Hubachiisa:</strong> Gabaasa kana sa'aatii 1 keessatti qofa fooyyessuu dandeessa. Yeroo darbee booda fooyyessuu hin dandeessu!
                    </span>
                </div>
                
                <!-- Edit Form Card -->
                <form method="post" action="<?php echo base_url('ElectionReport/updateReport/'.$report->id); ?>" id="editForm">
                    <div style="background: white; border-radius: 24px; box-shadow: 0 20px 40px rgba(0,0,0,0.06); overflow: hidden;">
                        
                        <!-- Header -->
                        <div style="background: linear-gradient(135deg, #e67e22 0%, #f39c12 100%); padding: 25px 30px;">
                            <div style="display: flex; align-items: center; gap: 15px;">
                                <div style="background: rgba(255,255,255,0.15); border-radius: 18px; width: 55px; height: 55px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa fa-pencil-square-o" style="font-size: 26px; color: white;"></i>
                                </div>
                                <div>
                                    <h3 style="margin: 0; color: white; font-weight: 600; font-size: 20px;">Fooyyessuu Gabaasaa</h3>
                                    <p style="margin: 5px 0 0; color: rgba(255,255,255,0.8); font-size: 13px;">
                                        Lakk. Tarree: #<?php echo str_pad($report->serial_number, 4, '0', STR_PAD_LEFT); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Body -->
                        <div style="padding: 30px;">
                            
                            <!-- Basic Information (Read-only) -->
                            <div style="margin-bottom: 30px;">
                                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
                                    <div style="background: linear-gradient(135deg, #2c5f2d, #3e8e41); width: 6px; height: 28px; border-radius: 4px;"></div>
                                    <h4 style="margin: 0; font-size: 18px; font-weight: 600; color: #1a3c2c;">
                                        <i class="fa fa-info-circle"></i> Odeeffannoo Gabaasaa
                                    </h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div style="background: #f8fafc; border-radius: 16px; padding: 15px;">
                                            <label style="font-size: 12px; color: #718096;">Guyyaa Filannoo</label>
                                            <div><strong><?php echo date('l, d F Y', strtotime($report->report_date)); ?></strong></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div style="background: #f8fafc; border-radius: 16px; padding: 15px;">
                                            <label style="font-size: 12px; color: #718096;">Yeroo Galmee</label>
                                            <div><strong><?php echo date('h:i A', strtotime($report->created_at)); ?></strong></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div style="background: #f8fafc; border-radius: 16px; padding: 15px;">
                                            <label style="font-size: 12px; color: #718096;">Gabaasaa</label>
                                            <div><strong><i class="fa fa-user"></i> <?php echo $report->reporter_name; ?></strong></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Party Selection (Editable) -->
                            <div style="margin-bottom: 30px;">
                                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
                                    <div style="background: linear-gradient(135deg, #e67e22, #f39c12); width: 6px; height: 28px; border-radius: 4px;"></div>
                                    <h4 style="margin: 0; font-size: 18px; font-weight: 600; color: #e67e22;">
                                        <i class="fa fa-flag"></i> Filannoo Paartii
                                    </h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="font-weight: 600; color: #333; margin-bottom: 10px;">Maqaa Paartii <span class="text-red">*</span></label>
                                            <select name="party_name" class="form-control" style="height: 48px; border-radius: 12px; border: 2px solid #e2e8f0;" required>
                                                <option value="">-- Paartii Filadhu --</option>
                                                <?php foreach($parties as $value => $label): ?>
                                                    <?php if($value != ''): ?>
                                                        <option value="<?php echo $value; ?>" <?php echo ($report->party_name == $value) ? 'selected' : ''; ?>>
                                                            <?php echo $label; ?>
                                                        </option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Voter Statistics (Simplified: Male & Female Only) -->
                            <div style="margin-bottom: 30px;">
                                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
                                    <div style="background: linear-gradient(135deg, #17a2b8, #138496); width: 6px; height: 28px; border-radius: 4px;"></div>
                                    <h4 style="margin: 0; font-size: 18px; font-weight: 600; color: #17a2b8;">
                                        <i class="fa fa-bar-chart"></i> Lakkoofsa Filattoota (Saalaan)
                                    </h4>
                                </div>
                                <div class="row">
                                    <!-- Male Voters Card -->
                                    <div class="col-md-6">
                                        <div style="border: 1px solid #e0e8e0; border-radius: 20px; overflow: hidden;">
                                            <div style="background: linear-gradient(135deg, #2c5f2d, #3e8e41); padding: 15px 20px;">
                                                <h5 style="margin: 0; color: white;"><i class="fa fa-mars"></i> Dhiira (Male)</h5>
                                            </div>
                                            <div style="padding: 30px 20px; text-align: center;">
                                                <div style="background: linear-gradient(135deg, #e8f5e9, #d4e8d4); border-radius: 20px; padding: 25px;">
                                                    <i class="fa fa-mars" style="font-size: 48px; color: #2c5f2d;"></i>
                                                    <h3 style="margin: 15px 0 10px; font-weight: 700;">Lakkoofsa Dhiiraa</h3>
                                                    <input type="number" name="male_voters" id="male_voters" class="form-control" value="<?php echo $report->male_voters ?? 0; ?>" min="0" onchange="calculateTotal()" style="text-align: center; font-size: 28px; font-weight: 800; border-radius: 12px; padding: 12px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Female Voters Card -->
                                    <div class="col-md-6">
                                        <div style="border: 1px solid #f0e0d0; border-radius: 20px; overflow: hidden;">
                                            <div style="background: linear-gradient(135deg, #e67e22, #f39c12); padding: 15px 20px;">
                                                <h5 style="margin: 0; color: white;"><i class="fa fa-venus"></i> Dubartii (Female)</h5>
                                            </div>
                                            <div style="padding: 30px 20px; text-align: center;">
                                                <div style="background: linear-gradient(135deg, #fde8e0, #f8d8c8); border-radius: 20px; padding: 25px;">
                                                    <i class="fa fa-venus" style="font-size: 48px; color: #e67e22;"></i>
                                                    <h3 style="margin: 15px 0 10px; font-weight: 700;">Lakkoofsa Dubartii</h3>
                                                    <input type="number" name="female_voters" id="female_voters" class="form-control" value="<?php echo $report->female_voters ?? 0; ?>" min="0" onchange="calculateTotal()" style="text-align: center; font-size: 28px; font-weight: 800; border-radius: 12px; padding: 12px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Grand Total Section -->
                            <div style="margin-bottom: 30px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="background: linear-gradient(135deg, #1e4620 0%, #2c5f2d 100%); border-radius: 20px; padding: 25px; text-align: center;">
                                            <p style="margin: 0; color: rgba(255,255,255,0.8); font-size: 14px;">WALIIGALA FILATTOOTA</p>
                                            <?php 
                                                $male_voters = $report->male_voters ?? 0;
                                                $female_voters = $report->female_voters ?? 0;
                                                $grand_total = $male_voters + $female_voters;
                                            ?>
                                            <h2 style="margin: 10px 0 0; font-size: 42px; font-weight: 800; color: white;" id="grand_total_display"><?php echo number_format($grand_total); ?></h2>
                                            <input type="hidden" name="grand_total" id="grand_total" value="<?php echo $grand_total; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Remarks -->
                            <div style="margin-bottom: 30px;">
                                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 15px;">
                                    <div style="background: linear-gradient(135deg, #6c757d, #5a6268); width: 6px; height: 28px; border-radius: 4px;"></div>
                                    <h4 style="margin: 0; font-size: 18px; font-weight: 600; color: #6c757d;">
                                        <i class="fa fa-comment"></i> Hubannoo
                                    </h4>
                                </div>
                                <textarea name="remarks" class="form-control" rows="3" style="border-radius: 16px; border: 1px solid #e2e8f0; padding: 15px;"><?php echo $report->remarks; ?></textarea>
                            </div>
                            
                            <!-- Submit Buttons -->
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-warning" style="border-radius: 40px; padding: 12px 35px; background: linear-gradient(135deg, #e67e22, #f39c12); border: none; color: white; font-weight: 600;">
                                        <i class="fa fa-save"></i> Fooyyessii Gabaa
                                    </button>
                                    <a href="<?php echo base_url('ElectionReport/viewReport/'.$report->id); ?>" class="btn btn-default" style="border-radius: 40px; padding: 12px 35px; margin-left: 10px; background: #6c757d; color: white; border: none;">
                                        <i class="fa fa-times"></i> Haqi
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
function calculateTotal() {
    // Get male and female values
    let maleVoters = parseFloat(document.getElementById('male_voters').value) || 0;
    let femaleVoters = parseFloat(document.getElementById('female_voters').value) || 0;
    
    // Calculate grand total
    let grandTotal = maleVoters + femaleVoters;
    document.getElementById('grand_total').value = grandTotal;
    document.getElementById('grand_total_display').innerHTML = grandTotal.toLocaleString();
}

// Countdown timer
const createdAt = new Date("<?php echo date('Y-m-d H:i:s', strtotime($report->created_at)); ?>").getTime();
const expiryTime = createdAt + (60 * 60 * 1000); // 1 hour

function startCountdown() {
    const now = new Date().getTime();
    const remaining = expiryTime - now;
    
    if(remaining > 0) {
        const minutes = Math.floor((remaining % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((remaining % (1000 * 60)) / 1000);
        document.getElementById('countdown').innerHTML = minutes + ' daqiiqaa ' + seconds + ' sekoondii';
        
        setTimeout(startCountdown, 1000);
    } else {
        document.getElementById('countdown').innerHTML = 'Yeroo darbeera!';
        document.querySelector('button[type="submit"]').disabled = true;
        document.querySelector('button[type="submit"]').style.opacity = '0.5';
    }
}
startCountdown();

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    calculateTotal();
    document.querySelectorAll('input[type="number"]').forEach(function(input) {
        input.addEventListener('input', calculateTotal);
    });
});
</script>