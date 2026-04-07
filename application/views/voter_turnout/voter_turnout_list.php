<div class="content-wrapper" style="background: linear-gradient(135deg, #f5f7fc 0%, #eef2f8 100%); min-height: 100vh;">
    <section class="content-header" style="padding: 25px 30px 0 30px;">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
            <div>
                <h1 style="font-size: 28px; margin: 0; font-weight: 700; background: linear-gradient(135deg, #2c5f2d 0%, #1e4620 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                    <i class="fa fa-list-alt" style="color: #2c5f2d; margin-right: 12px; -webkit-text-fill-color: initial;"></i>
                    Gabaasawwan Baayyina Filattoota
                </h1>
                <p style="margin: 5px 0 0; color: #6c86a3; font-size: 13px;">
                    <i class="fa fa-flag-checkered"></i> <?php echo $voting_region_name; ?> - Waliigala Gabaasa
                </p>
            </div>
            <div>
                <a href="<?php echo base_url('VoterTurnout/register'); ?>" class="btn btn-success" style="border-radius: 30px; padding: 10px 25px; background: linear-gradient(135deg, #2c5f2d, #1e4620); border: none; box-shadow: 0 2px 8px rgba(44,95,45,0.3);">
                    <i class="fa fa-plus-circle"></i> Haaraa Galmeessi
                </a>
                <?php if($role == 1): ?>
                <a href="<?php echo base_url('VoterTurnout/adminDashboard'); ?>" class="btn btn-info" style="border-radius: 30px; padding: 10px 25px; margin-left: 10px; background: linear-gradient(135deg, #17a2b8, #138496); border: none;">
                    <i class="fa fa-dashboard"></i> Daashboordii Admin
                </a>
                <?php endif; ?>
                <a href="<?php echo base_url(); ?>dashboard" class="btn btn-default" style="border-radius: 30px; padding: 10px 25px; margin-left: 10px; background: white; border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
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
                        <form method="get" action="<?php echo base_url('VoterTurnout/listReports'); ?>">
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
                                        <label style="font-weight: 600; color: #555; margin-bottom: 5px;">Haala Naannoo:</label>
                                        <select name="status_level" class="form-control" style="border-radius: 10px; width: 100%; height: 40px;">
                                            <option value="all" <?php echo $selected_status == 'all' ? 'selected' : ''; ?>>Hunda</option>
                                            <option value="green" <?php echo $selected_status == 'green' ? 'selected' : ''; ?>>Green (Nagaa)</option>
                                            <option value="yellow" <?php echo $selected_status == 'yellow' ? 'selected' : ''; ?>>Yellow (Rakkina xixiqqoo)</option>
                                            <option value="red" <?php echo $selected_status == 'red' ? 'selected' : ''; ?>>Red (Rakkina guddaa)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group" style="width: 100%; margin-top: 22px;">
                                        <button type="submit" class="btn btn-primary" style="background: #2c5f2d; border: none; border-radius: 10px; padding: 8px 20px;">
                                            <i class="fa fa-search"></i> Calleessii
                                        </button>
                                        <a href="<?php echo base_url('VoterTurnout/listReports'); ?>" class="btn btn-default" style="border-radius: 10px; padding: 8px 20px; margin-left: 8px; background: #f0f0f0; border: none;">
                                            <i class="fa fa-refresh"></i> Haari
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Summary Stats Cards -->
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
                
                <!-- Status Summary Row -->
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-md-4">
                        <div style="background: #e8f5e9; border-radius: 16px; padding: 15px; text-align: center; border-left: 4px solid #28a745;">
                            <i class="fa fa-check-circle" style="color: #28a745; font-size: 24px;"></i>
                            <h4 style="margin: 5px 0; color: #28a745;">Green (Nagaa)</h4>
                            <h2 style="margin: 0; font-size: 28px;"><?php echo number_format($summary->green_count ?? 0); ?></h2>
                            <small>Gabaasa</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="background: #fff3e0; border-radius: 16px; padding: 15px; text-align: center; border-left: 4px solid #ffc107;">
                            <i class="fa fa-warning" style="color: #ffc107; font-size: 24px;"></i>
                            <h4 style="margin: 5px 0; color: #ffc107;">Yellow (Rakkina xixiqqoo)</h4>
                            <h2 style="margin: 0; font-size: 28px;"><?php echo number_format($summary->yellow_count ?? 0); ?></h2>
                            <small>Gabaasa</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="background: #ffebee; border-radius: 16px; padding: 15px; text-align: center; border-left: 4px solid #dc3545;">
                            <i class="fa fa-exclamation-triangle" style="color: #dc3545; font-size: 24px;"></i>
                            <h4 style="margin: 5px 0; color: #dc3545;">Red (Rakkina guddaa)</h4>
                            <h2 style="margin: 0; font-size: 28px;"><?php echo number_format($summary->red_count ?? 0); ?></h2>
                            <small>Gabaasa</small>
                        </div>
                    </div>
                </div>
                
                <!-- Reports Table Card -->
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
                                <p style="margin-top: 15px; color: #718096;">Gabaasi baayyina filattoota hin jiru!</p>
                                <a href="<?php echo base_url('VoterTurnout/register'); ?>" class="btn btn-success" style="border-radius: 30px; margin-top: 10px;">
                                    <i class="fa fa-plus-circle"></i> Gabaasa Haaraa Galmeessi
                                </a>
                            </div>
                        <?php else: ?>
                            <table class="table" style="margin-bottom: 0; width: 100%; border-collapse: collapse;">
                                <thead>
                                    <tr style="background: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                                        <th style="padding: 15px 12px; font-weight: 700; color: #2c5f2d; text-align: center;">#</th>
                                        <?php if($role == 1): ?>
                                        <th style="padding: 15px 12px; font-weight: 700; color: #2c5f2d;">Naannoo</th>
                                        <?php endif; ?>
                                        <th style="padding: 15px 12px; font-weight: 700; color: #2c5f2d;">Guyyaa & Yeroo</th>
                                        <th style="padding: 15px 12px; font-weight: 700; color: #2c5f2d; text-align: center;">Dhiira</th>
                                        <th style="padding: 15px 12px; font-weight: 700; color: #2c5f2d; text-align: center;">Dubartii</th>
                                        <th style="padding: 15px 12px; font-weight: 700; color: #2c5f2d; text-align: center;">Waliigala</th>
                                        <th style="padding: 15px 12px; font-weight: 700; color: #2c5f2d; text-align: center;">Haala Naannoo</th>
                                        <th style="padding: 15px 12px; font-weight: 700; color: #2c5f2d; text-align: center;">Gocha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1; 
                                    $currentTime = time();
                                    foreach($reports as $report): 
                                        $reportTime = strtotime($report->created_at);
                                        $timeDiff = ($currentTime - $reportTime) / 3600;
                                        $can_edit = ($timeDiff <= 1);
                                        
                                        // Status badge styling
                                        $statusClass = '';
                                        $statusIcon = '';
                                        if($report->status_level == 'green') {
                                            $statusClass = 'background: #e8f5e9; color: #28a745;';
                                            $statusIcon = 'fa-check-circle';
                                        } elseif($report->status_level == 'yellow') {
                                            $statusClass = 'background: #fff3e0; color: #ffc107;';
                                            $statusIcon = 'fa-warning';
                                        } else {
                                            $statusClass = 'background: #ffebee; color: #dc3545;';
                                            $statusIcon = 'fa-exclamation-triangle';
                                        }
                                    ?>
                                    <tr style="border-bottom: 1px solid #edf2f7; transition: background 0.2s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='white'">
                                        <td style="padding: 12px; text-align: center; font-weight: 600;"><?php echo $i++; ?></td>
                                        <?php if($role == 1): ?>
                                        <td style="padding: 12px;">
                                            <strong><?php echo $report->naannoofil_id; ?></strong>
                                        </td>
                                        <?php endif; ?>
                                        <td style="padding: 12px;">
                                            <strong><?php echo date('d/m/Y', strtotime($report->report_date)); ?></strong><br>
                                            <small style="color: #718096;"><i class="fa fa-clock-o"></i> <?php echo date('H:i', strtotime($report->created_at)); ?></small>
                                        </td>
                                        <td style="padding: 12px; text-align: center;">
                                            <strong style="color: #2c5f2d;"><?php echo number_format($report->male_voters); ?></strong>
                                        </td>
                                        <td style="padding: 12px; text-align: center;">
                                            <strong style="color: #e67e22;"><?php echo number_format($report->female_voters); ?></strong>
                                        </td>
                                        <td style="padding: 12px; text-align: center;">
                                            <span style="background: #e8f5e9; padding: 5px 12px; border-radius: 12px; font-weight: 700; color: #2c5f2d;">
                                                <?php echo number_format($report->total_voters); ?>
                                            </span>
                                        </td>
                                        <td style="padding: 12px; text-align: center;">
                                            <span style="padding: 5px 12px; border-radius: 20px; font-size: 11px; font-weight: 600; <?php echo $statusClass; ?>">
                                                <i class="fa <?php echo $statusIcon; ?>"></i> 
                                                <?php echo strtoupper($report->status_level); ?>
                                            </span>
                                            <?php if($report->status_reason): ?>
                                                <br><small style="color: #718096;"><?php echo substr($report->status_reason, 0, 50); ?></small>
                                            <?php endif; ?>
                                        </td>
                                        <td style="padding: 12px; text-align: center;">
                                            <div style="display: flex; gap: 5px; justify-content: center;">
                                                <a href="<?php echo base_url('VoterTurnout/viewReport/'.$report->id); ?>" class="btn btn-sm" style="background: #17a2b8; color: white; border-radius: 8px; padding: 6px 12px;" title="Ilaalchuu">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <?php if($can_edit): ?>
                                                    <a href="<?php echo base_url('VoterTurnout/editReport/'.$report->id); ?>" class="btn btn-sm" style="background: #e67e22; color: white; border-radius: 8px; padding: 6px 12px;" title="Fooyyessuu">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('VoterTurnout/deleteReport/'.$report->id); ?>" class="btn btn-sm" style="background: #dc3545; color: white; border-radius: 8px; padding: 6px 12px;" onclick="return confirm('Gabaasa kana haquu barbaaddaa?')" title="Haquu">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <button class="btn btn-sm" style="background: #e0e0e0; color: #999; border-radius: 8px; padding: 6px 12px;" disabled>
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm" style="background: #e0e0e0; color: #999; border-radius: 8px; padding: 6px 12px;" disabled>
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
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
</style>