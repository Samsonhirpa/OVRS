<div class="content-wrapper" style="background: linear-gradient(135deg, #f5f7fc 0%, #eef2f8 100%); min-height: 100vh;">
    <section class="content-header" style="padding: 25px 30px 0 30px;">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
            <div>
                <h1 style="font-size: 28px; margin: 0; font-weight: 700; background: linear-gradient(135deg, #2c5f2d 0%, #1e4620 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                    <i class="fa fa-list-alt" style="color: #2c5f2d; margin-right: 12px; -webkit-text-fill-color: initial;"></i>
                    Gabaasawwan Filannoo Paartii
                </h1>
                <p style="margin: 5px 0 0; color: #6c86a3; font-size: 13px;">
                    <i class="fa fa-flag-checkered"></i> <?php echo $voting_region_name; ?> - Waliigala Gabaasa
                </p>
            </div>
            <div>
                <a href="<?php echo base_url('ElectionReport/register'); ?>" class="btn btn-success" style="border-radius: 30px; padding: 10px 25px; background: linear-gradient(135deg, #2c5f2d, #1e4620); border: none; box-shadow: 0 2px 8px rgba(44,95,45,0.3);">
                    <i class="fa fa-plus-circle"></i> Haaraa Galmeessi
                </a>
                <a href="<?php echo base_url(); ?>ElectionReport/dashboard" class="btn btn-default" style="border-radius: 30px; padding: 10px 25px; margin-left: 10px; background: white; border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                    <i class="fa fa-dashboard"></i> Daashboordii
                </a>
            </div>
        </div>
    </section>

    <section class="content" style="padding: 20px 30px;">
        <div class="row">
            <div class="col-md-12">
                
                <!-- Flash Messages -->
                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible" style="border-radius: 12px; border-left: 4px solid #28a745; background: #e8f5e9; padding: 15px 20px;">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible" style="border-radius: 12px; border-left: 4px solid #dc3545; background: #ffebee; padding: 15px 20px;">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <i class="fa fa-exclamation-circle"></i> <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
                
                <!-- Filter Card -->
                <div style="background: white; border-radius: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.04); margin-bottom: 25px; overflow: hidden;">
                    <div style="background: #f8fafc; padding: 15px 25px; border-bottom: 1px solid #e2e8f0;">
                        <h5 style="margin: 0; font-weight: 600; color: #2c5f2d;">
                            <i class="fa fa-filter"></i> Calleessii Gabaasa
                        </h5>
                    </div>
                    <div style="padding: 20px 25px;">
                        <form method="get" action="<?php echo base_url('ElectionReport/listReports'); ?>">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group" style="width: 100%;">
                                        <label style="font-weight: 600; color: #555; margin-bottom: 5px;">Guyyaa Jalqabaa:</label>
                                        <input type="date" name="start_date" class="form-control" value="<?php echo $start_date; ?>" style="border-radius: 10px; width: 100%; height: 40px;">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group" style="width: 100%;">
                                        <label style="font-weight: 600; color: #555; margin-bottom: 5px;">Guyyaa Xumuraa:</label>
                                        <input type="date" name="end_date" class="form-control" value="<?php echo $end_date; ?>" style="border-radius: 10px; width: 100%; height: 40px;">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group" style="width: 100%;">
                                        <label style="font-weight: 600; color: #555; margin-bottom: 5px;">Paartii:</label>
                                        <select name="party" class="form-control" style="border-radius: 10px; width: 100%; height: 40px;">
                                            <option value="all" <?php echo $selected_party == 'all' ? 'selected' : ''; ?>>Paartii Hunda</option>
                                            <?php foreach($parties as $value => $label): ?>
                                                <?php if($value != ''): ?>
                                                    <option value="<?php echo $value; ?>" <?php echo $selected_party == $value ? 'selected' : ''; ?>><?php echo $label; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group" style="width: 100%; margin-top: 22px;">
                                        <button type="submit" class="btn btn-primary" style="background: #2c5f2d; border: none; border-radius: 10px; padding: 8px 20px;">
                                            <i class="fa fa-search"></i> Calleessii
                                        </button>
                                        <a href="<?php echo base_url('ElectionReport/listReports'); ?>" class="btn btn-default" style="border-radius: 10px; padding: 8px 20px; margin-left: 8px; background: #f0f0f0; border: none;">
                                            <i class="fa fa-refresh"></i> Haari
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Summary Stats Cards (Updated: Male & Female only) -->
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-md-3">
                        <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 16px; padding: 20px; color: white;">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div>
                                    <p style="margin: 0; opacity: 0.8; font-size: 12px;">WALIIGALA GABAASA</p>
                                    <h2 style="margin: 5px 0; font-size: 32px; font-weight: 700;"><?php echo number_format($summary->total_reports ?? 0); ?></h2>
                                </div>
                                <div style="background: rgba(255,255,255,0.2); border-radius: 12px; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa fa-file-text" style="font-size: 24px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div style="background: linear-gradient(135deg, #2c5f2d 0%, #3e8e41 100%); border-radius: 16px; padding: 20px; color: white;">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div>
                                    <p style="margin: 0; opacity: 0.8; font-size: 12px;">DHIIRA (MALE)</p>
                                    <h2 style="margin: 5px 0; font-size: 32px; font-weight: 700;"><?php echo number_format($summary->total_male_voters ?? 0); ?></h2>
                                </div>
                                <div style="background: rgba(255,255,255,0.2); border-radius: 12px; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa fa-mars" style="font-size: 24px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div style="background: linear-gradient(135deg, #e67e22 0%, #f39c12 100%); border-radius: 16px; padding: 20px; color: white;">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div>
                                    <p style="margin: 0; opacity: 0.8; font-size: 12px;">DUBARTII (FEMALE)</p>
                                    <h2 style="margin: 5px 0; font-size: 32px; font-weight: 700;"><?php echo number_format($summary->total_female_voters ?? 0); ?></h2>
                                </div>
                                <div style="background: rgba(255,255,255,0.2); border-radius: 12px; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa fa-venus" style="font-size: 24px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); border-radius: 16px; padding: 20px; color: #333;">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div>
                                    <p style="margin: 0; opacity: 0.7; font-size: 12px;">WALIIGALA FILATTOOTA</p>
                                    <h2 style="margin: 5px 0; font-size: 32px; font-weight: 700;"><?php echo number_format($summary->total_voters ?? 0); ?></h2>
                                </div>
                                <div style="background: rgba(0,0,0,0.1); border-radius: 12px; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa fa-check-circle" style="font-size: 24px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Reports Table Card (Updated: Male & Female only) -->
                <div style="background: white; border-radius: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.04); overflow: hidden;">
                    <div style="background: linear-gradient(135deg, #2c5f2d, #1e4620); padding: 18px 25px;">
                        <h4 style="margin: 0; color: white; font-weight: 600;">
                            <i class="fa fa-list"></i> Gabaasawwan Galmaa'an
                        </h4>
                    </div>
                    
                    <div style="padding: 0; overflow-x: auto;">
                        <?php if(empty($reports)): ?>
                            <div style="text-align: center; padding: 60px 20px;">
                                <i class="fa fa-inbox" style="font-size: 64px; color: #cbd5e0;"></i>
                                <p style="margin-top: 15px; color: #718096;">Gabaasi filannoo paartii hin jiru!</p>
                                <a href="<?php echo base_url('ElectionReport/register'); ?>" class="btn btn-success" style="border-radius: 30px; margin-top: 10px;">
                                    <i class="fa fa-plus-circle"></i> Gabaasa Haaraa Galmeessi
                                </a>
                            </div>
                        <?php else: ?>
                            <table class="table" style="margin-bottom: 0; width: 100%; border-collapse: collapse;">
                                <thead>
                                    <tr style="background: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                                        <th style="padding: 15px 12px; font-weight: 700; color: #2c5f2d; text-align: center;">#</th>
                                        <th style="padding: 15px 12px; font-weight: 700; color: #2c5f2d;">Guyyaa & Yeroo</th>
                                        <th style="padding: 15px 12px; font-weight: 700; color: #2c5f2d;">Paartii</th>
                                        <th style="padding: 15px 12px; font-weight: 700; color: #2c5f2d; text-align: center;">Dhiira (Male)</th>
                                        <th style="padding: 15px 12px; font-weight: 700; color: #2c5f2d; text-align: center;">Dubartii (Female)</th>
                                        <th style="padding: 15px 12px; font-weight: 700; color: #2c5f2d; text-align: center;">Waliigala</th>
                                        <th style="padding: 15px 12px; font-weight: 700; color: #2c5f2d; text-align: center;">Haala</th>
                                        <th style="padding: 15px 12px; font-weight: 700; color: #2c5f2d; text-align: center;">Gocha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1; 
                                    $currentTime = time();
                                    foreach($reports as $report): 
                                        // Calculate can_edit for each report (1 hour window)
                                        $reportTime = strtotime($report->created_at);
                                        $timeDiff = ($currentTime - $reportTime) / 3600;
                                        $can_edit = ($timeDiff <= 1);
                                        $remaining_minutes = floor((60 - (($currentTime - $reportTime) / 60)));
                                        if($remaining_minutes < 0) $remaining_minutes = 0;
                                        
                                        // Use new column names
                                        $male_voters = $report->male_voters ?? 0;
                                        $female_voters = $report->female_voters ?? 0;
                                        $grand_total = $male_voters + $female_voters;
                                    ?>
                                    <tr style="border-bottom: 1px solid #edf2f7; transition: background 0.2s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='white'">
                                        <td style="padding: 12px; text-align: center; font-weight: 600;"><?php echo $i++; ?></td>
                                        <td style="padding: 12px;">
                                            <strong><?php echo date('d/m/Y', strtotime($report->report_date)); ?></strong><br>
                                            <small style="color: #718096;"><i class="fa fa-clock-o"></i> <?php echo date('H:i', strtotime($report->created_at)); ?></small>
                                        </td>
                                        <td style="padding: 12px;">
                                            <span style="background: linear-gradient(135deg, #e67e22, #f39c12); color: white; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; display: inline-block;">
                                                <?php echo $report->party_name; ?>
                                            </span>
                                        </td>
                                        <td style="padding: 12px; text-align: center;">
                                            <div style="background: linear-gradient(135deg, #2c5f2d20, #3e8e4130); border-radius: 12px; padding: 8px; display: inline-block; min-width: 80px;">
                                                <i class="fa fa-mars" style="color: #2c5f2d;"></i>
                                                <strong style="font-size: 18px; color: #2c5f2d; margin-left: 8px;"><?php echo number_format($male_voters); ?></strong>
                                            </div>
                                        </td>
                                        <td style="padding: 12px; text-align: center;">
                                            <div style="background: linear-gradient(135deg, #e67e2220, #f39c1230); border-radius: 12px; padding: 8px; display: inline-block; min-width: 80px;">
                                                <i class="fa fa-venus" style="color: #e67e22;"></i>
                                                <strong style="font-size: 18px; color: #e67e22; margin-left: 8px;"><?php echo number_format($female_voters); ?></strong>
                                            </div>
                                        </td>
                                        <td style="padding: 12px; text-align: center;">
                                            <span style="background: #e8f5e9; padding: 8px 15px; border-radius: 12px; font-weight: 800; color: #2c5f2d; display: inline-block;">
                                                <?php echo number_format($grand_total); ?>
                                            </span>
                                        </td>
                                        <td style="padding: 12px; text-align: center;">
                                            <?php if($can_edit): ?>
                                                <span style="background: #fff3e0; color: #e67e22; padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 600;">
                                                    <i class="fa fa-edit"></i> Fooyyessuu dandeessa
                                                </span>
                                                <br><small style="color: #e67e22;"><?php echo $remaining_minutes; ?> daqiiqaa hafe</small>
                                            <?php else: ?>
                                                <span style="background: #e0e0e0; color: #999; padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 600;">
                                                    <i class="fa fa-clock-o"></i> Yeroo darbe
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td style="padding: 12px; text-align: center;">
                                            <div style="display: flex; gap: 5px; justify-content: center;">
                                                <a href="<?php echo base_url('ElectionReport/viewReport/'.$report->id); ?>" class="btn btn-sm" style="background: #17a2b8; color: white; border-radius: 8px; padding: 6px 12px; transition: all 0.2s;" title="Ilaalchuu">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <?php if($can_edit): ?>
                                                    <a href="<?php echo base_url('ElectionReport/editReport/'.$report->id); ?>" class="btn btn-sm" style="background: #e67e22; color: white; border-radius: 8px; padding: 6px 12px; transition: all 0.2s;" title="Fooyyessuu">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('ElectionReport/deleteReport/'.$report->id); ?>" class="btn btn-sm" style="background: #dc3545; color: white; border-radius: 8px; padding: 6px 12px; transition: all 0.2s;" onclick="return confirm('Gabaasa kana haquu barbaaddaa?')" title="Haquu">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <button class="btn btn-sm" style="background: #e0e0e0; color: #999; border-radius: 8px; padding: 6px 12px;" disabled title="Sa'aatii 1 darbeera">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm" style="background: #e0e0e0; color: #999; border-radius: 8px; padding: 6px 12px;" disabled title="Sa'aatii 1 darbeera">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr style="background: #f8fafc; border-top: 2px solid #e2e8f0; font-weight: 700;">
                                        <td colspan="3" style="padding: 15px 12px; text-align: right;"><strong>WALIIGALA:</strong></td>
                                        <td style="padding: 15px 12px; text-align: center;">
                                            <strong style="font-size: 18px; color: #2c5f2d;"><?php echo number_format($summary->total_male_voters ?? 0); ?></strong>
                                            <br><small>Dhiira</small>
                                        </td>
                                        <td style="padding: 15px 12px; text-align: center;">
                                            <strong style="font-size: 18px; color: #e67e22;"><?php echo number_format($summary->total_female_voters ?? 0); ?></strong>
                                            <br><small>Dubartii</small>
                                        </td>
                                        <td style="padding: 15px 12px; text-align: center;">
                                            <strong style="font-size: 20px; color: #1e4620;"><?php echo number_format($summary->total_voters ?? 0); ?></strong>
                                        </td>
                                        <td colspan="2"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Info Note -->
                <div style="margin-top: 20px; background: #e3f2fd; border-radius: 12px; padding: 12px 20px; border-left: 4px solid #17a2b8;">
                    <i class="fa fa-info-circle" style="color: #17a2b8;"></i>
                    <span style="font-size: 12px; color: #0c5460;">
                        <strong>Hubachiisa:</strong> Gabaasni sa'aatii 1 keessatti qofaa fooyyessuu fi haquu danda'ama. Yeroo darbee booda ilaaluu qofa dandeessu.
                    </span>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .table th, .table td {
        vertical-align: middle;
    }
    .btn-sm {
        transition: all 0.2s ease;
    }
    .btn-sm:hover {
        transform: translateY(-2px);
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    }
    .table tbody tr {
        transition: background 0.2s ease;
    }
    .alert {
        transition: all 0.3s ease;
    }
    .form-control:focus {
        border-color: #2c5f2d;
        box-shadow: 0 0 0 3px rgba(44, 95, 45, 0.1);
        outline: none;
    }
    select.form-control {
        cursor: pointer;
    }
    .btn {
        transition: all 0.2s ease;
    }
    .btn:hover {
        transform: translateY(-2px);
    }
</style>