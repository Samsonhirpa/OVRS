<div class="content-wrapper" style="background: linear-gradient(135deg, #f0f9ff 0%, #e6f0fa 100%); min-height: 100vh; padding: 30px;">
    <div class="profile-container" style="max-width: 1200px; margin: 0 auto; background: white; border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); overflow: hidden; border: 1px solid #e2e8f0;">
        
        <!-- Profile Header with Light Theme -->
        <div style="background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%); padding: 50px 40px; color: white; text-align: center; position: relative; overflow: hidden;">
            <!-- Flag Stripes -->
            <div style="position: absolute; top: 0; left: 0; right: 0; height: 6px; display: flex;">
                <div style="flex: 1; background: black;"></div>
                <div style="flex: 1; background: red;"></div>
                <div style="flex: 1; background: white;"></div>
            </div>
            
            <!-- Profile Image -->
            <div style="width: 120px; height: 120px; background: linear-gradient(135deg, #1e40af, #2563eb); border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center; border: 4px solid rgba(255,255,255,0.3); position: relative; z-index: 2; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                <i class="fa fa-vote-yea" style="font-size: 60px; color: white;"></i>
            </div>
            
            <h1 style="margin: 0; font-size: 32px; font-weight: 700; text-shadow: 1px 1px 2px rgba(0,0,0,0.2); position: relative; z-index: 2;">
                <?php echo $useraccount->first_name . ' ' . $useraccount->middle_name . ' ' . $useraccount->last_name; ?>
            </h1>
            
            <!-- Naannoo Filannoo Badge -->
            <div style="margin: 20px 0 10px; position: relative; z-index: 2;">
                <span style="background: rgba(255,255,255,0.15); padding: 10px 30px; border-radius: 50px; font-size: 18px; font-weight: 600; border: 2px solid #FCDD09; display: inline-flex; align-items: center; gap: 10px;">
                    <i class="fa fa-map-marker-alt" style="color: #FCDD09;"></i>
                    NAANNOO FILANNOO: <span style="color: #FCDD09; font-weight: 700;"><?php echo $useraccount->naannoofil ?? 'Kan hin beekamne'; ?></span>
                </span>
            </div>
            
            <p style="margin: 15px 0 0; opacity: 0.9; font-size: 16px; position: relative; z-index: 2;">
                <i class="fa fa-envelope"></i> <?php echo $useraccount->email; ?> | 
                <i class="fa fa-phone"></i> <?php echo $useraccount->phoneno ?? '—'; ?>
            </p>
            
            <div style="margin-top: 20px; display: flex; gap: 15px; justify-content: center; position: relative; z-index: 2;">
                <span style="background: rgba(255,255,255,0.15); padding: 8px 25px; border-radius: 50px; font-size: 14px; font-weight: 600;">
                    <i class="fa fa-shield-alt" style="color: #FCDD09;"></i> <?php echo $useraccount->role_name; ?>
                </span>
                <span style="background: rgba(255,255,255,0.15); padding: 8px 25px; border-radius: 50px; font-size: 14px; font-weight: 600;">
                    <i class="fa fa-id-card" style="color: #FCDD09;"></i> ID: <?php echo $useraccount->id; ?>
                </span>
            </div>
        </div>

        <!-- Voting Statistics Bar - Light Theme -->
        <?php
        // Get report statistics for this user
        $this->db->where('reporter_id', $useraccount->id);
        $this->db->where('status', 1);
        $total_reports = $this->db->count_all_results('voting_reports');
        
        $this->db->where('reporter_id', $useraccount->id);
        $this->db->where('report_session', 'morning');
        $this->db->where('status', 1);
        $morning_reports = $this->db->count_all_results('voting_reports');
        
        $this->db->where('reporter_id', $useraccount->id);
        $this->db->where('report_session', 'afternoon');
        $this->db->where('status', 1);
        $afternoon_reports = $this->db->count_all_results('voting_reports');
        
        $this->db->select('SUM(actual_grand_total) as total_voters');
        $this->db->where('reporter_id', $useraccount->id);
        $this->db->where('status', 1);
        $voters_result = $this->db->get('voting_reports')->row();
        $total_voters = $voters_result->total_voters ?? 0;
        
        // Calculate days since registration
        $date_started = $useraccount->dob ?? $useraccount->created_at ?? date('Y-m-d');
        $date1 = new DateTime($date_started);
        $date2 = new DateTime();
        $days_registered = $date2->diff($date1)->days;
        ?>
        
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); background: linear-gradient(135deg, #f8fafc, #f1f5f9); padding: 25px; border-bottom: 1px solid #e2e8f0;">
            <div style="text-align: center; border-right: 1px solid #e2e8f0; padding-right: 20px;">
                <div style="color: #64748b; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px;">Total Reports</div>
                <div style="font-size: 32px; font-weight: 700; color: #2563eb;"><?php echo $total_reports; ?></div>
                <div style="color: #64748b; font-size: 12px; margin-top: 5px;">Ganama: <?php echo $morning_reports; ?> | Waaree: <?php echo $afternoon_reports; ?></div>
            </div>
            <div style="text-align: center; border-right: 1px solid #e2e8f0; padding: 0 20px;">
                <div style="color: #64748b; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px;">Voters Registered</div>
                <div style="font-size: 32px; font-weight: 700; color: #10b981;"><?php echo number_format($total_voters); ?></div>
                <div style="color: #64748b; font-size: 12px; margin-top: 5px;">Waliigala filattoota</div>
            </div>
            <div style="text-align: center; border-right: 1px solid #e2e8f0; padding: 0 20px;">
                <div style="color: #64748b; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px;">Days Active</div>
                <div style="font-size: 32px; font-weight: 700; color: #f59e0b;"><?php echo $days_registered; ?></div>
                <div style="color: #64748b; font-size: 12px; margin-top: 5px;">Guyyaa hojii irra jira</div>
            </div>
            <div style="text-align: center; padding-left: 20px;">
                <div style="color: #64748b; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px;">Avg Daily Reports</div>
                <div style="font-size: 32px; font-weight: 700; color: #8b5cf6;"><?php echo $days_registered > 0 ? round($total_reports / $days_registered, 1) : 0; ?></div>
                <div style="color: #64748b; font-size: 12px; margin-top: 5px;">Gabaasa guyyaa</div>
            </div>
        </div>

        <!-- Quick Info Bar -->
        <div style="display: grid; grid-template-columns: repeat(5, 1fr); background: white; padding: 15px 20px; border-bottom: 1px solid #e2e8f0;">
            <div style="text-align: center;">
                <div style="color: #64748b; font-size: 11px; text-transform: uppercase; letter-spacing: 1px;">Username</div>
                <div style="font-weight: 600; color: #0f172a;"><?php echo $useraccount->username; ?></div>
            </div>
            <div style="text-align: center;">
                <div style="color: #64748b; font-size: 11px; text-transform: uppercase; letter-spacing: 1px;">Phone</div>
                <div style="font-weight: 600; color: #0f172a;"><?php echo $useraccount->phoneno ?? '—'; ?></div>
            </div>
            <div style="text-align: center;">
                <div style="color: #64748b; font-size: 11px; text-transform: uppercase; letter-spacing: 1px;">Gender</div>
                <div style="font-weight: 600; color: #0f172a;">
                    <?php 
                    if($useraccount->gender_id == 1) echo 'Dhiira';
                    elseif($useraccount->gender_id == 2) echo 'Dubartii';
                    else echo '—';
                    ?>
                </div>
            </div>
            <div style="text-align: center;">
                <div style="color: #64748b; font-size: 11px; text-transform: uppercase; letter-spacing: 1px;">Date Started</div>
                <div style="font-weight: 600; color: #0f172a;"><?php echo date('d/m/Y', strtotime($useraccount->dob ?? $useraccount->created_at ?? date('Y-m-d'))); ?></div>
            </div>
            <div style="text-align: center;">
                <div style="color: #64748b; font-size: 11px; text-transform: uppercase; letter-spacing: 1px;">Last Login</div>
                <div style="font-weight: 600; color: #0f172a;"><?php echo date('d/m/Y H:i', strtotime($useraccount->last_login ?? date('Y-m-d H:i:s'))); ?></div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div style="padding: 20px 30px; background: white; border-bottom: 1px solid #e2e8f0; display: flex; gap: 15px; flex-wrap: wrap;">
            <button onclick="openModal()" style="background: linear-gradient(135deg, #2563eb, #3b82f6); color: white; border: none; padding: 12px 25px; border-radius: 50px; font-weight: 600; font-size: 14px; display: flex; align-items: center; gap: 8px; cursor: pointer; transition: all 0.3s ease;">
                <i class="fa fa-lock"></i> JECHAA DARBII JIJJIIRI
            </button>
            <a href="<?php echo base_url('VotingReport/listReports'); ?>" style="background: linear-gradient(135deg, #10b981, #059669); color: white; border: none; padding: 12px 25px; border-radius: 50px; font-weight: 600; font-size: 14px; display: flex; align-items: center; gap: 8px; cursor: pointer; transition: all 0.3s ease; text-decoration: none;">
                <i class="fa fa-file-alt"></i> GABAASA KOO
            </a>
            <a href="<?php echo base_url('VotingReport/register'); ?>" style="background: linear-gradient(135deg, #f59e0b, #fbbf24); color: white; border: none; padding: 12px 25px; border-radius: 50px; font-weight: 600; font-size: 14px; display: flex; align-items: center; gap: 8px; cursor: pointer; transition: all 0.3s ease; text-decoration: none;">
                <i class="fa fa-plus-circle"></i> GABAASA HAARAA
            </a>
        </div>

        <!-- Profile Information Sections -->
        <div style="padding: 30px;">
            <!-- Personal Information -->
            <div style="margin-bottom: 30px; background: white; border-radius: 16px; border: 1px solid #e2e8f0; overflow: hidden;">
                <div style="background: linear-gradient(90deg, #f8fafc, white); padding: 18px 25px; border-bottom: 1px solid #e2e8f0;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #2563eb, #3b82f6); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white;">
                            <i class="fa fa-user"></i>
                        </div>
                        <div>
                            <h3 style="margin: 0; font-size: 18px; font-weight: 700; color: #0f172a;">ODEFFANNOO DHUUNFAA</h3>
                            <p style="margin: 4px 0 0; font-size: 13px; color: #64748b;">IBSA BU'URAA KEESSAN</p>
                        </div>
                    </div>
                </div>
                <div style="padding: 25px;">
                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px;">
                        <div>
                            <div style="font-size: 12px; color: #64748b; margin-bottom: 5px; text-transform: uppercase; letter-spacing: 1px;">MAQAA</div>
                            <div style="font-size: 16px; font-weight: 600; color: #0f172a; background: #f8fafc; padding: 12px 15px; border-radius: 12px; border: 1px solid #e2e8f0;"><?php echo $useraccount->first_name ?? '—'; ?></div>
                        </div>
                        <div>
                            <div style="font-size: 12px; color: #64748b; margin-bottom: 5px; text-transform: uppercase; letter-spacing: 1px;">MAQAA ABBAA</div>
                            <div style="font-size: 16px; font-weight: 600; color: #0f172a; background: #f8fafc; padding: 12px 15px; border-radius: 12px; border: 1px solid #e2e8f0;"><?php echo $useraccount->middle_name ?? '—'; ?></div>
                        </div>
                        <div>
                            <div style="font-size: 12px; color: #64748b; margin-bottom: 5px; text-transform: uppercase; letter-spacing: 1px;">MAQAA AKKAAYUU</div>
                            <div style="font-size: 16px; font-weight: 600; color: #0f172a; background: #f8fafc; padding: 12px 15px; border-radius: 12px; border: 1px solid #e2e8f0;"><?php echo $useraccount->last_name ?? '—'; ?></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Voting Registration Information - Simplified with only Godina/Magaalaa -->
            <div style="margin-bottom: 30px; background: white; border-radius: 16px; border: 1px solid #e2e8f0; overflow: hidden;">
                <div style="background: linear-gradient(90deg, #f8fafc, white); padding: 18px 25px; border-bottom: 1px solid #e2e8f0;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #2563eb, #3b82f6); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white;">
                            <i class="fa fa-vote-yea"></i>
                        </div>
                        <div>
                            <h3 style="margin: 0; font-size: 18px; font-weight: 700; color: #0f172a;">ODEFFANNOO GALMEE FILANNOO</h3>
                            <p style="margin: 4px 0 0; font-size: 13px; color: #64748b;">NAANNOO FILANNOO FI TEEESSOO</p>
                        </div>
                    </div>
                </div>
                <div style="padding: 25px;">
                    <!-- Naannoo Filannoo Info -->
                    <div style="background: linear-gradient(135deg, #f8fafc, #f1f5f9); padding: 20px; border-radius: 16px; margin-bottom: 25px; border: 1px solid #e2e8f0;">
                        <div style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
                            <div style="background: white; padding: 15px; border-radius: 12px; border: 1px solid #e2e8f0;">
                                <i class="fa fa-map-marker-alt" style="font-size: 30px; color: #2563eb;"></i>
                            </div>
                            <div>
                                <div style="color: #64748b; font-size: 13px; margin-bottom: 5px;">NAANNOO FILANNOO</div>
                                <div style="color: #0f172a; font-size: 24px; font-weight: 700;"><?php echo $useraccount->naannoofil ?? 'Kan hin beekamne'; ?></div>
                                <div style="color: #2563eb; font-size: 14px; margin-top: 5px;">
                                    <i class="fa fa-check-circle"></i> Bakka hojii keessan
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Simplified Address Grid - Only Godina or Magaalaa -->
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
                        <!-- Location Type Badge -->
                        <div style="grid-column: span 2; margin-bottom: 10px;">
                            <div style="display: inline-flex; align-items: center; gap: 10px; background: #e0f2fe; padding: 8px 20px; border-radius: 50px;">
                                <i class="fa fa-info-circle" style="color: #0284c7;"></i>
                                <span style="font-size: 13px; color: #0369a1; font-weight: 500;">
                                    <?php if(isset($useraccount->zone_id) && $useraccount->zone_id): ?>
                                        Teessoo: <strong>GODINA</strong>
                                    <?php elseif(isset($useraccount->magala_id) && $useraccount->magala_id): ?>
                                        Teessoo: <strong>MAGAALAA</strong>
                                    <?php else: ?>
                                        Teessoo: <strong>Kan hin beekamne</strong>
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                        
                        <!-- Godina or Magaalaa Field -->
                        <div style="background: #f8fafc; padding: 20px; border-radius: 12px; border: 1px solid #e2e8f0;">
                            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 15px;">
                                <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #2563eb, #3b82f6); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa fa-map" style="color: white; font-size: 18px;"></i>
                                </div>
                                <div>
                                    <div style="font-size: 12px; color: #64748b; text-transform: uppercase; letter-spacing: 1px;">
                                        <?php if(isset($useraccount->zone_id) && $useraccount->zone_id): ?>
                                            GODINA
                                        <?php elseif(isset($useraccount->magala_id) && $useraccount->magala_id): ?>
                                            MAGAALAA
                                        <?php else: ?>
                                            TEEESSOO
                                        <?php endif; ?>
                                    </div>
                                    <div style="font-size: 20px; font-weight: 700; color: #0f172a;">
                                        <?php 
                                        if(isset($useraccount->zname) && $useraccount->zname):
                                            echo $useraccount->zname;
                                        elseif(isset($useraccount->cname) && $useraccount->cname):
                                            echo $useraccount->cname;
                                        else:
                                            echo 'Kan hin beekamne';
                                        endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top: 15px; padding-top: 15px; border-top: 1px solid #e2e8f0;">
                                <div style="display: flex; gap: 15px; font-size: 13px; color: #64748b;">
                                    <div>
                                        <i class="fa fa-hashtag"></i> ID: 
                                        <strong style="color: #0f172a;">
                                            <?php echo $useraccount->zone_id ?? $useraccount->magala_id ?? '—'; ?>
                                        </strong>
                                    </div>
                                    <div>
                                        <i class="fa fa-calendar"></i> Galmee: 
                                        <strong style="color: #0f172a;">
                                            <?php echo date('d/m/Y', strtotime($useraccount->created_at ?? date('Y-m-d'))); ?>
                                        </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Location Information Card -->
                        <div style="background: linear-gradient(135deg, #fef9e3, #fff7ed); padding: 20px; border-radius: 12px; border: 1px solid #fed7aa;">
                            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 15px;">
                                <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #f59e0b, #fbbf24); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa fa-info-circle" style="color: white; font-size: 18px;"></i>
                                </div>
                                <div>
                                    <div style="font-size: 12px; color: #92400e; text-transform: uppercase; letter-spacing: 1px;">Haala Teessoo</div>
                                    <div style="font-size: 20px; font-weight: 700; color: #78350f;">
                                        <?php 
                                        if(isset($useraccount->zone_id) && $useraccount->zone_id):
                                            echo 'Godina Keessatti';
                                        elseif(isset($useraccount->magala_id) && $useraccount->magala_id):
                                            echo 'Magaalaa Keessatti';
                                        else:
                                            echo 'Teessoo hin jiru';
                                        endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top: 10px;">
                                <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
                                    <span style="background: white; padding: 5px 12px; border-radius: 50px; font-size: 12px; color: #92400e;">
                                        <i class="fa fa-user-check"></i> Fayyadamaa
                                    </span>
                                    <span style="background: white; padding: 5px 12px; border-radius: 50px; font-size: 12px; color: #92400e;">
                                        <i class="fa fa-chart-line"></i> Gabaasa: <?php echo $total_reports; ?>
                                    </span>
                                    <span style="background: white; padding: 5px 12px; border-radius: 50px; font-size: 12px; color: #92400e;">
                                        <i class="fa fa-users"></i> Filattoota: <?php echo number_format($total_voters); ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Account Information -->
            <div style="margin-bottom: 30px; background: white; border-radius: 16px; border: 1px solid #e2e8f0; overflow: hidden;">
                <div style="background: linear-gradient(90deg, #f8fafc, white); padding: 18px 25px; border-bottom: 1px solid #e2e8f0;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #2563eb, #3b82f6); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white;">
                            <i class="fa fa-id-card"></i>
                        </div>
                        <div>
                            <h3 style="margin: 0; font-size: 18px; font-weight: 700; color: #0f172a;">ODEFFANNOO HERRGAA</h3>
                            <p style="margin: 4px 0 0; font-size: 13px; color: #64748b;">Account details</p>
                        </div>
                    </div>
                </div>
                <div style="padding: 25px;">
                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                        <div>
                            <div style="font-size: 12px; color: #64748b; margin-bottom: 5px;">MAQAA HERRGAA</div>
                            <div style="font-size: 16px; font-weight: 600; color: #0f172a;"><?php echo $useraccount->username; ?></div>
                        </div>
                        <div>
                            <div style="font-size: 12px; color: #64748b; margin-bottom: 5px;">GAHEE</div>
                            <div style="font-size: 16px; font-weight: 600; color: #0f172a;"><?php echo $useraccount->role_name; ?></div>
                        </div>
                        <div>
                            <div style="font-size: 12px; color: #64748b; margin-bottom: 5px;">HAALA</div>
                            <div style="font-size: 16px; font-weight: 600; color: #0f172a;">
                                <?php if($useraccount->status == 1): ?>
                                    <span style="color: #10b981;">BANA</span>
                                <?php else: ?>
                                    <span style="color: #ef4444;">CUFAMA</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Registration Dates -->
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-top: 20px; padding-top: 20px; border-top: 1px solid #e2e8f0;">
                        <div>
                            <div style="font-size: 12px; color: #64748b; margin-bottom: 5px;">GUYYAA JALQABAA</div>
                            <div style="font-size: 16px; font-weight: 600; color: #0f172a;"><?php echo date('d F Y', strtotime($useraccount->dob ?? $useraccount->created_at ?? date('Y-m-d'))); ?></div>
                        </div>
                        <div>
                            <div style="font-size: 12px; color: #64748b; margin-bottom: 5px;">GUYYAA GALMEE</div>
                            <div style="font-size: 16px; font-weight: 600; color: #0f172a;"><?php echo date('d F Y', strtotime($useraccount->created_at ?? date('Y-m-d'))); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Password Modal -->
    <div id="passwordModal" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5); backdrop-filter: blur(5px); align-items: center; justify-content: center; z-index: 9999;">
        <div style="width: 90%; max-width: 450px; background: white; border-radius: 20px; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25); animation: slideIn 0.3s ease;">
            <div style="background: linear-gradient(135deg, #2563eb, #3b82f6); padding: 20px 25px; color: white; display: flex; align-items: center; justify-content: space-between; border-radius: 20px 20px 0 0;">
                <h4 style="margin: 0; font-size: 20px; font-weight: 600; display: flex; align-items: center; gap: 10px;">
                    <i class="fa fa-lock"></i> Update Password
                </h4>
                <button onclick="closeModal()" style="background: rgba(255,255,255,0.2); border: none; color: white; width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s ease;">
                    <i class="fa fa-times"></i>
                </button>
            </div>
            <div style="padding: 30px;">
                <form action="<?php echo base_url('Structure/updateprofile/'.$useraccount->id);?>" method="post">
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-size: 13px; font-weight: 600; color: #475569; margin-bottom: 8px;">
                            <i class="fa fa-user"></i> Username
                        </label>
                        <input type="text" name="username" value="<?php echo $useraccount->username; ?>" readonly style="width: 100%; padding: 12px 15px; background: #f1f5f9; border: 2px solid #e2e8f0; border-radius: 12px; font-size: 14px; color: #64748b; cursor: not-allowed;">
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-size: 13px; font-weight: 600; color: #475569; margin-bottom: 8px;">
                            <i class="fa fa-key"></i> New Password
                        </label>
                        <input type="password" name="password" id="password" placeholder="Enter new password" onkeyup="checkPasswordStrength(this.value)" style="width: 100%; padding: 12px 15px; background: white; border: 2px solid #e2e8f0; border-radius: 12px; font-size: 14px; transition: all 0.3s ease;">
                        <div style="margin-top: 8px; height: 4px; background: #e2e8f0; border-radius: 2px; overflow: hidden;">
                            <div id="strengthBar" style="height: 100%; width: 0; transition: all 0.3s ease;"></div>
                        </div>
                    </div>
                    
                    <div style="margin-bottom: 25px;">
                        <label style="display: block; font-size: 13px; font-weight: 600; color: #475569; margin-bottom: 8px;">
                            <i class="fa fa-check-circle"></i> Confirm Password
                        </label>
                        <input type="password" name="repassword" id="repassword" placeholder="Confirm new password" onkeyup="checkPasswordMatch(this.value)" style="width: 100%; padding: 12px 15px; background: white; border: 2px solid #e2e8f0; border-radius: 12px; font-size: 14px; transition: all 0.3s ease;">
                        <small id="passwordMatchMsg" style="display: none; margin-top: 8px; font-size: 12px;"></small>
                    </div>
                    
                    <button type="submit" name="save" style="width: 100%; background: linear-gradient(135deg, #10b981, #059669); color: white; border: none; padding: 14px; border-radius: 50px; font-weight: 600; font-size: 15px; display: flex; align-items: center; justify-content: center; gap: 10px; cursor: pointer; transition: all 0.3s ease;">
                        <i class="fa fa-save"></i> Update Password
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    // Modal Functions
    function openModal() {
        document.getElementById('passwordModal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        document.getElementById('passwordModal').style.display = 'none';
        document.body.style.overflow = 'auto';
        document.getElementById('password').value = '';
        document.getElementById('repassword').value = '';
        document.getElementById('strengthBar').style.width = '0';
        document.getElementById('passwordMatchMsg').style.display = 'none';
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('passwordModal');
        if (event.target == modal) {
            closeModal();
        }
    }

    // Password Strength Checker
    function checkPasswordStrength(password) {
        const strengthBar = document.getElementById('strengthBar');
        let strength = 0;
        
        if (password.length >= 8) strength += 25;
        if (password.match(/[a-z]+/)) strength += 25;
        if (password.match(/[A-Z]+/)) strength += 25;
        if (password.match(/[0-9]+/)) strength += 25;
        if (password.match(/[$@#&!]+/)) strength += 25;
        
        strength = Math.min(strength, 100);
        strengthBar.style.width = strength + '%';
        
        if (strength < 30) strengthBar.style.background = '#ef4444';
        else if (strength < 60) strengthBar.style.background = '#f59e0b';
        else strengthBar.style.background = '#10b981';
    }

    // Password Match Checker
    function checkPasswordMatch(confirmPassword) {
        const password = document.getElementById('password').value;
        const msgElement = document.getElementById('passwordMatchMsg');
        
        if (confirmPassword === '') {
            msgElement.style.display = 'none';
            return;
        }
        
        msgElement.style.display = 'block';
        
        if (password === confirmPassword) {
            msgElement.style.color = '#10b981';
            msgElement.innerHTML = '<i class="fa fa-check-circle"></i> Passwords match';
        } else {
            msgElement.style.color = '#ef4444';
            msgElement.innerHTML = '<i class="fa fa-exclamation-circle"></i> Passwords do not match';
        }
    }

    // Form validation
    document.querySelector('form[action*="updateprofile"]')?.addEventListener('submit', function(e) {
        const password = document.getElementById('password').value;
        const repassword = document.getElementById('repassword').value;
        
        if (password !== repassword) {
            e.preventDefault();
            alert('Passwords do not match!');
        }
        
        if (password.length < 6) {
            e.preventDefault();
            alert('Password must be at least 6 characters!');
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeModal();
        }
    });
</script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
    @keyframes slideIn {
        from { transform: translateY(-30px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
    
    button:hover, a:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px -3px rgba(0,0,0,0.1);
    }
    
    input:focus {
        outline: none;
        border-color: #2563eb !important;
        box-shadow: 0 0 0 4px rgba(37,99,235,0.1);
    }
    
    .profile-container {
        animation: fadeIn 0.5s ease;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>