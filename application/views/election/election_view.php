<div class="content-wrapper" style="background: linear-gradient(135deg, #f5f7fc 0%, #eef2f8 100%); min-height: 100vh;">
    <section class="content-header" style="padding: 25px 30px 0 30px;">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
            <div>
                <h1 style="font-size: 28px; margin: 0; font-weight: 700; background: linear-gradient(135deg, #2c5f2d 0%, #1e4620 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                    <i class="fa fa-eye" style="color: #2c5f2d; margin-right: 12px; -webkit-text-fill-color: initial;"></i>
                    Ilaalchuu Gabaasaa Filannoo Paartii
                </h1>
                <p style="margin: 5px 0 0; color: #6c86a3; font-size: 13px;">
                    <i class="fa fa-flag-checkered"></i> Odeeffannoo Gabaasaa Guutuu
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
                
                <!-- Edit Alert for 1 Hour Window -->
                <?php if(isset($report->can_edit) && $report->can_edit): ?>
                <div style="background: linear-gradient(135deg, #fff3e0, #ffe0b2); border-radius: 16px; padding: 12px 20px; margin-bottom: 20px; border-left: 4px solid #e67e22;">
                    <i class="fa fa-clock-o" style="color: #e67e22;"></i>
                    <span style="color: #e67e22; font-weight: 500;">
                        <strong>Hubachiisa:</strong> Gabaasa kana sa'aatii 1 keessatti fooyyessuu dandeessa. Yeroo hafe: 
                        <span id="countdown" style="font-weight: 700;"></span>
                    </span>
                </div>
                <?php endif; ?>
                
                <!-- Main Card -->
                <div style="background: white; border-radius: 24px; box-shadow: 0 20px 40px rgba(0,0,0,0.06); overflow: hidden;">
                    
                    <!-- Header -->
                    <div style="background: linear-gradient(135deg, #2c5f2d 0%, #1e4620 100%); padding: 25px 30px;">
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <div style="background: rgba(255,255,255,0.15); border-radius: 18px; width: 55px; height: 55px; display: flex; align-items: center; justify-content: center;">
                                <i class="fa fa-file-text" style="font-size: 26px; color: white;"></i>
                            </div>
                            <div>
                                <h3 style="margin: 0; color: white; font-weight: 600; font-size: 20px;">Gabaasa Filannoo Paartii</h3>
                                <p style="margin: 5px 0 0; color: rgba(255,255,255,0.8); font-size: 13px;">
                                    Lakk. Tarree: #<?php echo str_pad($report->serial_number, 4, '0', STR_PAD_LEFT); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Body -->
                    <div style="padding: 30px;">
                        
                        <!-- Basic Information Section -->
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
                                        <label style="font-size: 12px; color: #718096; margin-bottom: 5px; display: block;">Guyyaa Filannoo</label>
                                        <strong style="font-size: 16px; color: #2c5f2d;"><?php echo date('l, d F Y', strtotime($report->report_date)); ?></strong>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div style="background: #f8fafc; border-radius: 16px; padding: 15px;">
                                        <label style="font-size: 12px; color: #718096; margin-bottom: 5px; display: block;">Yeroo Galmee</label>
                                        <strong style="font-size: 16px; color: #2c5f2d;"><?php echo date('h:i A', strtotime($report->created_at)); ?></strong>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div style="background: #f8fafc; border-radius: 16px; padding: 15px;">
                                        <label style="font-size: 12px; color: #718096; margin-bottom: 5px; display: block;">Gabaasaa</label>
                                        <strong style="font-size: 16px; color: #2c5f2d;"><i class="fa fa-user"></i> <?php echo $report->reporter_name; ?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Party Information -->
                        <div style="margin-bottom: 30px;">
                            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
                                <div style="background: linear-gradient(135deg, #e67e22, #f39c12); width: 6px; height: 28px; border-radius: 4px;"></div>
                                <h4 style="margin: 0; font-size: 18px; font-weight: 600; color: #e67e22;">
                                    <i class="fa fa-flag"></i> Odeeffannoo Paartii
                                </h4>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="background: linear-gradient(135deg, #fff8e6, #fff3e0); border-radius: 16px; padding: 20px; text-align: center;">
                                        <i class="fa fa-trophy" style="font-size: 28px; color: #e67e22;"></i>
                                        <h2 style="margin: 10px 0 0; font-size: 28px; font-weight: 700; color: #e67e22;"><?php echo $report->party_name; ?></h2>
                                        <p style="margin: 5px 0 0; color: #718096;">Paartii Filatame</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Voter Statistics - SIMPLIFIED (Male & Female Only) -->
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
                                    <div style="background: linear-gradient(135deg, #ffffff, #f8fff8); border: 1px solid #e0e8e0; border-radius: 20px; overflow: hidden;">
                                        <div style="background: linear-gradient(135deg, #2c5f2d, #3e8e41); padding: 15px 20px;">
                                            <h5 style="margin: 0; color: white; font-weight: 600;"><i class="fa fa-mars"></i> Dhiira (Male)</h5>
                                        </div>
                                        <div style="padding: 30px 20px; text-align: center;">
                                            <div style="background: linear-gradient(135deg, #e8f5e9, #d4e8d4); border-radius: 20px; padding: 25px;">
                                                <i class="fa fa-mars" style="font-size: 48px; color: #2c5f2d;"></i>
                                                <h2 style="margin: 15px 0 0; font-size: 52px; font-weight: 800; color: #2c5f2d;"><?php echo number_format($report->male_voters ?? 0); ?></h2>
                                                <p style="margin: 10px 0 0; color: #4a5568;">Lakkoofsa Dhiiraa</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Female Voters Card -->
                                <div class="col-md-6">
                                    <div style="background: linear-gradient(135deg, #ffffff, #fff8f0); border: 1px solid #f0e0d0; border-radius: 20px; overflow: hidden;">
                                        <div style="background: linear-gradient(135deg, #e67e22, #f39c12); padding: 15px 20px;">
                                            <h5 style="margin: 0; color: white; font-weight: 600;"><i class="fa fa-venus"></i> Dubartii (Female)</h5>
                                        </div>
                                        <div style="padding: 30px 20px; text-align: center;">
                                            <div style="background: linear-gradient(135deg, #fde8e0, #f8d8c8); border-radius: 20px; padding: 25px;">
                                                <i class="fa fa-venus" style="font-size: 48px; color: #e67e22;"></i>
                                                <h2 style="margin: 15px 0 0; font-size: 52px; font-weight: 800; color: #e67e22;"><?php echo number_format($report->female_voters ?? 0); ?></h2>
                                                <p style="margin: 10px 0 0; color: #4a5568;">Lakkoofsa Dubartii</p>
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
                                    <div style="background: linear-gradient(135deg, #1e4620 0%, #2c5f2d 100%); border-radius: 20px; padding: 30px; text-align: center;">
                                        <p style="margin: 0; color: rgba(255,255,255,0.8); font-size: 14px;">WALIIGALA FILATTOOTA</p>
                                        <?php 
                                            $male_voters = $report->male_voters ?? 0;
                                            $female_voters = $report->female_voters ?? 0;
                                            $grand_total = $male_voters + $female_voters;
                                        ?>
                                        <h2 style="margin: 10px 0 0; font-size: 52px; font-weight: 800; color: white;"><?php echo number_format($grand_total); ?></h2>
                                        <div style="margin-top: 15px;">
                                            <span style="background: rgba(255,255,255,0.15); border-radius: 30px; padding: 5px 15px; display: inline-block; color: white;">
                                                <i class="fa fa-mars"></i> Dhiira: <?php echo number_format($male_voters); ?> | 
                                                <i class="fa fa-venus"></i> Dubartii: <?php echo number_format($female_voters); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Remarks Section -->
                        <?php if($report->remarks): ?>
                        <div style="margin-bottom: 20px;">
                            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 15px;">
                                <div style="background: linear-gradient(135deg, #6c757d, #5a6268); width: 6px; height: 28px; border-radius: 4px;"></div>
                                <h4 style="margin: 0; font-size: 18px; font-weight: 600; color: #6c757d;">
                                    <i class="fa fa-comment"></i> Hubannoo
                                </h4>
                            </div>
                            <div style="background: #f8fafc; border-radius: 16px; padding: 20px; border-left: 4px solid #6c757d;">
                                <p style="margin: 0; color: #4a5568;"><?php echo nl2br(htmlspecialchars($report->remarks)); ?></p>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <!-- Action Buttons -->
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-md-12 text-center">
                                <a href="<?php echo base_url('ElectionReport/listReports'); ?>" class="btn btn-default" style="border-radius: 40px; padding: 12px 35px; background: #6c757d; color: white; border: none;">
                                    <i class="fa fa-arrow-left"></i> Gabaasawwan Kootti Deebi'i
                                </a>
                                <?php if(isset($report->can_edit) && $report->can_edit): ?>
                                    <a href="<?php echo base_url('ElectionReport/editReport/'.$report->id); ?>" class="btn btn-warning" style="border-radius: 40px; padding: 12px 35px; margin-left: 10px; background: linear-gradient(135deg, #e67e22, #f39c12); border: none; color: white;">
                                        <i class="fa fa-edit"></i> Gabaasa Fooyyessuu
                                    </a>
                                    <a href="<?php echo base_url('ElectionReport/deleteReport/'.$report->id); ?>" class="btn btn-danger" style="border-radius: 40px; padding: 12px 35px; margin-left: 10px;" onclick="return confirm('Gabaasa kana haquu barbaaddaa?')">
                                        <i class="fa fa-trash"></i> Gabaasa Haquu
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
// Countdown timer for 1 hour edit window
<?php if(isset($report->can_edit) && $report->can_edit): ?>
function startCountdown() {
    const createdAt = new Date("<?php echo date('Y-m-d H:i:s', strtotime($report->created_at)); ?>").getTime();
    const now = new Date().getTime();
    const expiryTime = createdAt + (60 * 60 * 1000); // 1 hour
    const remaining = expiryTime - now;
    
    if(remaining > 0) {
        const minutes = Math.floor((remaining % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((remaining % (1000 * 60)) / 1000);
        document.getElementById('countdown').innerHTML = minutes + ' daqiiqaa ' + seconds + ' sekoondii';
        
        setTimeout(startCountdown, 1000);
    } else {
        document.getElementById('countdown').innerHTML = 'Yeroo darbeera, fooyyessuu hin dandeessu';
        location.reload();
    }
}
startCountdown();
<?php endif; ?>
</script>