<div class="content-wrapper" style="background: #f4f6f9; padding-top: 15px;">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="padding: 15px 20px; background: white; border-bottom: 1px solid #e0e0e0; margin-bottom: 15px;">
        <h1 style="font-size: 28px; margin: 0; font-weight: 400; color: #333;">
            <i class="fa fa-dashboard text-green" style="margin-right: 8px;"></i> Daashboordii Admin
            <small style="font-size: 14px; color: #777; margin-left: 5px;">Oromia PP - 178 Naannoo Filannoo</small>
        </h1>
        <ol class="breadcrumb" style="padding: 0; margin: 5px 0 0; background: none;">
            <li><a href="#"><i class="fa fa-home"></i> Daashboordii</a></li>
            <li class="active">Admin</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="padding: 0 20px 20px 20px;">
        
        <?php
        // Get today's date
        $today = date('Y-m-d');
        
        // Get counts from voting_reports table
        $this->db->where('report_date', $today);
        $today_reports = $this->db->count_all_results('voting_reports');
        
        $this->db->where('report_date', $today);
        $this->db->where('report_session', 'morning');
        $morning_count = $this->db->count_all_results('voting_reports');
        
        $this->db->where('report_date', $today);
        $this->db->where('report_session', 'afternoon');
        $afternoon_count = $this->db->count_all_results('voting_reports');
        
        // Total voters (sum of actual_grand_total)
        $this->db->select('SUM(actual_grand_total) as total_voters, 
                          SUM(actual_member_male) as total_member_male,
                          SUM(actual_member_female) as total_member_female,
                          SUM(actual_nonmember_male) as total_nonmember_male,
                          SUM(actual_nonmember_female) as total_nonmember_female');
        $totals_result = $this->db->get('voting_reports')->row();
        $total_voters = $totals_result->total_voters ?: 0;
        $total_member_male = $totals_result->total_member_male ?: 0;
        $total_member_female = $totals_result->total_member_female ?: 0;
        $total_nonmember_male = $totals_result->total_nonmember_male ?: 0;
        $total_nonmember_female = $totals_result->total_nonmember_female ?: 0;
        
        // Current month stats
        $month_start = date('Y-m-01');
        $month_end = date('Y-m-t');
        
        $this->db->where('report_date >=', $month_start);
        $this->db->where('report_date <=', $month_end);
        $month_reports = $this->db->count_all_results('voting_reports');
        
        $this->db->where('report_date >=', $month_start);
        $this->db->where('report_date <=', $month_end);
        $this->db->select('SUM(actual_grand_total) as month_voters');
        $month_voters_result = $this->db->get('voting_reports')->row();
        $month_voters = $month_voters_result->month_voters ?: 0;
        
        // Get regions that reported today
        $this->db->distinct();
        $this->db->select('naannoofil_id');
        $this->db->where('report_date', $today);
        $reported_today = $this->db->get('voting_reports')->result_array();
        $reported_ids = array_column($reported_today, 'naannoofil_id');
        $reported_count = count($reported_ids);
        
        // Get total number of Naannoo Filannoo users (role_id = 3)
        $this->db->where('role_id', 3);
        $total_naannoo_filannoo = $this->db->count_all_results('useraccount');
        
        // Calculate completion rate
        $completion_rate = $total_naannoo_filannoo > 0 ? round(($reported_count / $total_naannoo_filannoo) * 100) : 0;
        $total_possible_today = $total_naannoo_filannoo * 2;
        $total_completion_rate = $total_possible_today > 0 ? round(($today_reports / $total_possible_today) * 100) : 0;
        
        // Get weekly data for chart
        $weekly_labels = [];
        $weekly_morning = [];
        $weekly_afternoon = [];
        $weekly_voters = [];
        
        for($i = 6; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-$i days"));
            $weekly_labels[] = date('D', strtotime($date));
            
            // Morning count for this day
            $this->db->where('report_date', $date);
            $this->db->where('report_session', 'morning');
            $weekly_morning[] = $this->db->count_all_results('voting_reports');
            
            // Afternoon count for this day
            $this->db->where('report_date', $date);
            $this->db->where('report_session', 'afternoon');
            $weekly_afternoon[] = $this->db->count_all_results('voting_reports');
            
            // Total voters for this day
            $this->db->select('SUM(actual_grand_total) as day_voters');
            $this->db->where('report_date', $date);
            $day_result = $this->db->get('voting_reports')->row();
            $weekly_voters[] = $day_result->day_voters ?: 0;
        }
        
        // Get all naannoo filannoo with their zone/city information - FIXED COLUMN NAMES
        $this->db->select('u.naannoofil, u.zone_id, u.magala_id, u.kmagala_id, u.akmagala_id, 
                          z.zname as zone_name, c.cname as city_name, 
                          sc.subcity_name, scw.sbw_name as subcity_woreda_name');
        $this->db->from('useraccount u');
        $this->db->join('zone z', 'u.zone_id = z.zid', 'left');
        $this->db->join('city c', 'u.magala_id = c.cid', 'left'); // Changed from 'city' to 'magala_id'
        $this->db->join('subcity sc', 'u.kmagala_id = sc.subcity_id', 'left');
        $this->db->join('subcity_woreda scw', 'u.akmagala_id = scw.sbw_id', 'left');
        $this->db->where('u.role_id', 3); // Naannoo Filannoo role
        $this->db->group_by('u.naannoofil');
        $all_regions = $this->db->get()->result();
        
        // Get regions by zone
        $this->db->select('z.zname, COUNT(DISTINCT u.naannoofil) as region_count');
        $this->db->from('useraccount u');
        $this->db->join('zone z', 'u.zone_id = z.zid', 'left');
        $this->db->where('u.role_id', 3);
        $this->db->group_by('u.zone_id');
        $regions_by_zone = $this->db->get()->result();
        
        // Get regions by city - FIXED COLUMN NAME
        $this->db->select('c.cname, COUNT(DISTINCT u.naannoofil) as region_count');
        $this->db->from('useraccount u');
        $this->db->join('city c', 'u.magala_id = c.cid', 'left'); // Changed from 'city' to 'magala_id'
        $this->db->where('u.role_id', 3);
        $this->db->group_by('u.magala_id');
        $regions_by_city = $this->db->get()->result();
        
        // Get top performing regions this month with their location - FIXED COLUMN NAMES
        $this->db->select('vr.naannoofil_id, vr.voting_region_name, 
                          COUNT(*) as report_count, 
                          SUM(vr.actual_grand_total) as total_voters,
                          SUM(vr.actual_member_male) as member_male,
                          SUM(vr.actual_member_female) as member_female,
                          SUM(vr.actual_nonmember_male) as nonmember_male,
                          SUM(vr.actual_nonmember_female) as nonmember_female,
                          u.zone_id, z.zname as zone_name,
                          u.magala_id, c.cname as city_name'); // Changed from 'city' to 'magala_id'
        $this->db->from('voting_reports vr');
        $this->db->join('useraccount u', 'vr.naannoofil_id = u.naannoofil', 'left');
        $this->db->join('zone z', 'u.zone_id = z.zid', 'left');
        $this->db->join('city c', 'u.magala_id = c.cid', 'left'); // Changed from 'city' to 'magala_id'
        $this->db->where('vr.report_date >=', $month_start);
        $this->db->where('vr.report_date <=', $month_end);
        $this->db->group_by('vr.naannoofil_id');
        $this->db->order_by('report_count', 'DESC');
        $this->db->order_by('total_voters', 'DESC');
        $this->db->limit(10);
        $top_regions = $this->db->get()->result();
        
        // Get recent reports with region info - FIXED COLUMN NAMES
        $this->db->select('vr.*, u.zone_id, z.zname as zone_name, 
                          u.magala_id, c.cname as city_name'); // Changed from 'city' to 'magala_id'
        $this->db->from('voting_reports vr');
        $this->db->join('useraccount u', 'vr.naannoofil_id = u.naannoofil', 'left');
        $this->db->join('zone z', 'u.zone_id = z.zid', 'left');
        $this->db->join('city c', 'u.magala_id = c.cid', 'left'); // Changed from 'city' to 'magala_id'
        $this->db->order_by('vr.created_at', 'DESC');
        $this->db->limit(15);
        $recent_reports = $this->db->get()->result();
        ?>
        
        <!-- Welcome Admin Card -->
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-12">
                <div class="box box-success" style="border-radius: 4px; box-shadow: 0 3px 10px rgba(0,0,0,0.1); border-top: 3px solid #2c5f2d;">
                    <div class="box-body" style="padding: 20px; background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);">
                        <div class="row">
                            <div class="col-md-8">
                                <h3 style="margin: 0 0 10px 0; font-size: 24px; font-weight: 500;">
                                    <i class="fa fa-hand-peace-o text-green" style="margin-right: 10px;"></i>
                                    Akkam jirtu, Admin! 
                                </h3>
                                <p style="font-size: 16px; color: #555; margin-bottom: 5px;">
                                    <i class="fa fa-globe text-green" style="margin-right: 8px;"></i>
                                    Waliigala: <strong><?php echo count($all_regions); ?></strong> Naannoo Filannoo galmaa'an
                                </p>
                                <p style="font-size: 16px; color: #555;">
                                    <i class="fa fa-check-circle text-green" style="margin-right: 8px;"></i>
                                    Har'aa: <strong><?php echo $reported_count; ?></strong> naannoo gabaasan (<?php echo $completion_rate; ?>%)
                                </p>
                            </div>
                            <div class="col-md-4 text-right">
                                <div style="background: #e8f0e8; padding: 15px; border-radius: 8px; display: inline-block; text-align: center;">
                                    <span style="font-size: 14px; color: #555;">Guyyaa har'aa</span>
                                    <h4 style="margin: 5px 0 0 0; color: #2c5f2d; font-weight: 700;"><?php echo date('d F Y'); ?></h4>
                                    <span style="font-size: 13px; color: #777;">Yeroo: <?php echo date('h:i A'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Summary Cards Row -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green" style="border-radius: 4px; box-shadow: 0 3px 10px rgba(0,0,0,0.1);">
                    <div class="inner">
                        <h3><?php echo $total_naannoo_filannoo; ?><sup style="font-size: 20px"></sup></h3>
                        <p>Naannoo Filannoo</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <a href="#" class="small-box-footer">Oromia PP <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua" style="border-radius: 4px; box-shadow: 0 3px 10px rgba(0,0,0,0.1);">
                    <div class="inner">
                        <h3><?php echo $today_reports; ?></h3>
                        <p>Gabaasa Har'aa</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file-text"></i>
                    </div>
                    <a href="#" class="small-box-footer">Guyyaa har'aa <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow" style="border-radius: 4px; box-shadow: 0 3px 10px rgba(0,0,0,0.1);">
                    <div class="inner">
                        <h3><?php echo number_format($total_voters); ?></h3>
                        <p>Filattoota Galmaa'an</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="#" class="small-box-footer">Waliigala <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red" style="border-radius: 4px; box-shadow: 0 3px 10px rgba(0,0,0,0.1);">
                    <div class="inner">
                        <h3><?php echo $total_completion_rate; ?>%</h3>
                        <p>Sadarkaa Guutuu</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-percent"></i>
                    </div>
                    <a href="#" class="small-box-footer">Har'aa <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        
        <!-- Gender Breakdown Row -->
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-12">
                <div class="box box-default" style="border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); border-top: 3px solid #00c0ef;">
                    <div class="box-header with-border" style="padding: 15px 20px; background: #f9f9f9;">
                        <h3 class="box-title" style="font-size: 18px; font-weight: 500;">
                            <i class="fa fa-venus-mars text-info"></i> Filattoota Saalaan
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="info-box bg-green" style="margin-bottom: 0;">
                                    <span class="info-box-icon"><i class="fa fa-male"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Miseensa Dhiira</span>
                                        <span class="info-box-number"><?php echo number_format($total_member_male); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="info-box bg-green" style="margin-bottom: 0;">
                                    <span class="info-box-icon"><i class="fa fa-female"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Miseensa Dubartii</span>
                                        <span class="info-box-number"><?php echo number_format($total_member_female); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="info-box bg-yellow" style="margin-bottom: 0;">
                                    <span class="info-box-icon"><i class="fa fa-male"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Miseensa Hin Taane Dhiira</span>
                                        <span class="info-box-number"><?php echo number_format($total_nonmember_male); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="info-box bg-yellow" style="margin-bottom: 0;">
                                    <span class="info-box-icon"><i class="fa fa-female"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Miseensa Hin Taane Dubartii</span>
                                        <span class="info-box-number"><?php echo number_format($total_nonmember_female); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Regions by Location Row -->
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-6">
                <div class="box box-primary" style="border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); border-top: 3px solid #3c8dbc;">
                    <div class="box-header with-border" style="padding: 15px 20px; background: #f9f9f9;">
                        <h3 class="box-title" style="font-size: 16px; font-weight: 600;">
                            <i class="fa fa-map text-blue"></i> Naannoo Filannoo Godinaan
                        </h3>
                    </div>
                    <div class="box-body" style="padding: 0;">
                        <table class="table table-hover" style="margin: 0;">
                            <thead>
                                <tr style="background: #f0f0f0;">
                                    <th style="padding: 12px 15px;">Godina</th>
                                    <th style="padding: 12px 15px; text-align: center;">Baay'ina Naannoo</th>
                                    <th style="padding: 12px 15px; text-align: center;">%</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($regions_by_zone)): ?>
                                    <?php foreach($regions_by_zone as $zone): ?>
                                    <tr>
                                        <td style="padding: 10px 15px;"><?php echo $zone->zname ?: 'Kan hin beekamne'; ?></td>
                                        <td style="padding: 10px 15px; text-align: center; font-weight: 600;"><?php echo $zone->region_count; ?></td>
                                        <td style="padding: 10px 15px; text-align: center;">
                                            <?php echo $total_naannoo_filannoo > 0 ? round(($zone->region_count / $total_naannoo_filannoo) * 100) : 0; ?>%
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="3" class="text-center" style="padding: 20px;">Odeeffannoon hin jiru</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="box box-primary" style="border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); border-top: 3px solid #00a65a;">
                    <div class="box-header with-border" style="padding: 15px 20px; background: #f9f9f9;">
                        <h3 class="box-title" style="font-size: 16px; font-weight: 600;">
                            <i class="fa fa-building text-green"></i> Naannoo Filannoo Magaalaan
                        </h3>
                    </div>
                    <div class="box-body" style="padding: 0;">
                        <table class="table table-hover" style="margin: 0;">
                            <thead>
                                <tr style="background: #f0f0f0;">
                                    <th style="padding: 12px 15px;">Magaalaa</th>
                                    <th style="padding: 12px 15px; text-align: center;">Baay'ina Naannoo</th>
                                    <th style="padding: 12px 15px; text-align: center;">%</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($regions_by_city)): ?>
                                    <?php foreach($regions_by_city as $city): ?>
                                    <tr>
                                        <td style="padding: 10px 15px;"><?php echo $city->cname ?: 'Kan hin beekamne'; ?></td>
                                        <td style="padding: 10px 15px; text-align: center; font-weight: 600;"><?php echo $city->region_count; ?></td>
                                        <td style="padding: 10px 15px; text-align: center;">
                                            <?php echo $total_naannoo_filannoo > 0 ? round(($city->region_count / $total_naannoo_filannoo) * 100) : 0; ?>%
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="3" class="text-center" style="padding: 20px;">Odeeffannoon hin jiru</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Map and Progress Row -->
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-7">
                <!-- Oromia Map Placeholder -->
                <div class="box box-success" style="border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); border-top: 3px solid #2c5f2d;">
                    <div class="box-header with-border" style="padding: 15px 20px; background: #f9f9f9;">
                        <h3 class="box-title"><i class="fa fa-map"></i> Kaartaa Naannoo Oromia - <?php echo $total_naannoo_filannoo; ?> Naannoo Filannoo</h3>
                        <div class="box-tools pull-right">
                            <span class="label label-success">Haala Har'aa</span>
                        </div>
                    </div>
                    <div class="box-body" style="padding: 20px;">
                        <div style="position: relative; background: #e8f0e8; min-height: 300px; padding: 20px; text-align: center; border-radius: 4px;">
                            <!-- Simple Map Representation -->
                            <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 5px; margin-top: 20px;">
                                <?php
                                if(!empty($all_regions)):
                                    foreach($all_regions as $region):
                                        $reported = in_array($region->naannoofil, $reported_ids);
                                        $location = $region->zone_name ?: ($region->city_name ?: 'Unknown');
                                ?>
                                    <div style="position: relative; display: inline-block; margin: 2px;" title="Naannoo Filannoo: <?php echo $region->naannoofil; ?> - <?php echo $location; ?>">
                                        <div style="width: 12px; height: 12px; background: <?php echo $reported ? '#2c5f2d' : '#ccc'; ?>; border-radius: 50%; border: 1px solid <?php echo $reported ? '#1e4b1f' : '#999'; ?>; cursor: pointer;"></div>
                                    </div>
                                <?php 
                                    endforeach;
                                endif; 
                                ?>
                            </div>
                            <p style="margin-top: 25px; color: #555;">
                                <span style="display: inline-block; width: 15px; height: 15px; background: #2c5f2d; border-radius: 50%; margin-right: 5px;"></span> Gabaaseera (<?php echo $reported_count; ?>) 
                                <span style="display: inline-block; width: 15px; height: 15px; background: #ccc; border-radius: 50%; margin-left: 15px; margin-right: 5px;"></span> Hin Gabaasin (<?php echo $total_naannoo_filannoo - $reported_count; ?>)
                            </p>
                            <p><strong>Ida'ama:</strong> <?php echo $total_naannoo_filannoo; ?> Naannoo Filannoo Oromia PP keessatti</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-5">
                <!-- Today's Progress -->
                <div class="box box-primary" style="border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); border-top: 3px solid #3c8dbc;">
                    <div class="box-header with-border" style="padding: 15px 20px; background: #f9f9f9;">
                        <h3 class="box-title"><i class="fa fa-clock-o"></i> Haala Har'aa (<?php echo date('F j, Y'); ?>)</h3>
                    </div>
                    <div class="box-body" style="padding: 20px;">
                        <!-- Morning Progress -->
                        <div class="progress-group">
                            <span class="progress-text">Kan Ganama (8:00-12:00)</span>
                            <span class="progress-number"><b><?php echo $morning_count; ?></b>/<?php echo $total_naannoo_filannoo; ?></span>
                            <div class="progress sm">
                                <div class="progress-bar progress-bar-success" style="width: <?php echo $total_naannoo_filannoo > 0 ? ($morning_count/$total_naannoo_filannoo)*100 : 0; ?>%"></div>
                            </div>
                        </div>
                        
                        <!-- Afternoon Progress -->
                        <div class="progress-group">
                            <span class="progress-text">Kan Waaree Booda (14:00-17:00)</span>
                            <span class="progress-number"><b><?php echo $afternoon_count; ?></b>/<?php echo $total_naannoo_filannoo; ?></span>
                            <div class="progress sm">
                                <div class="progress-bar progress-bar-warning" style="width: <?php echo $total_naannoo_filannoo > 0 ? ($afternoon_count/$total_naannoo_filannoo)*100 : 0; ?>%"></div>
                            </div>
                        </div>
                        
                        <!-- Total Progress -->
                        <div class="progress-group">
                            <span class="progress-text">Waliigala</span>
                            <span class="progress-number"><b><?php echo $today_reports; ?></b>/<?php echo $total_naannoo_filannoo * 2; ?></span>
                            <div class="progress sm">
                                <div class="progress-bar progress-bar-primary" style="width: <?php echo $total_naannoo_filannoo > 0 ? ($today_reports/($total_naannoo_filannoo*2))*100 : 0; ?>%"></div>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <!-- Status Summary -->
                        <div class="row text-center">
                            <div class="col-xs-4">
                                <div class="knob-container">
                                    <input type="text" class="knob" value="<?php echo $total_naannoo_filannoo > 0 ? round(($reported_count/$total_naannoo_filannoo)*100) : 0; ?>" data-skin="tron" data-thickness="0.2" data-width="80" data-height="80" data-fgcolor="#00a65a" data-readonly="true">
                                    <div class="knob-label">Naannoo</div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="knob-container">
                                    <input type="text" class="knob" value="<?php echo $total_naannoo_filannoo > 0 ? round(($morning_count/$total_naannoo_filannoo)*100) : 0; ?>" data-skin="tron" data-thickness="0.2" data-width="80" data-height="80" data-fgcolor="#f39c12" data-readonly="true">
                                    <div class="knob-label">Ganama</div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="knob-container">
                                    <input type="text" class="knob" value="<?php echo $total_naannoo_filannoo > 0 ? round(($afternoon_count/$total_naannoo_filannoo)*100) : 0; ?>" data-skin="tron" data-thickness="0.2" data-width="80" data-height="80" data-fgcolor="#00c0ef" data-readonly="true">
                                    <div class="knob-label">Waaree</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Charts and Top Regions Row -->
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-7">
                <!-- Weekly Report Chart -->
                <div class="box box-info" style="border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); border-top: 3px solid #00c0ef;">
                    <div class="box-header with-border" style="padding: 15px 20px; background: #f9f9f9;">
                        <h3 class="box-title"><i class="fa fa-line-chart"></i> Gabaasa Torban Kana</h3>
                    </div>
                    <div class="box-body" style="padding: 20px;">
                        <canvas id="weeklyChart" style="height: 280px; width: 100%;"></canvas>
                    </div>
                </div>
            </div>
            
            <div class="col-md-5">
                <!-- Top Performing Regions with Location -->
                <div class="box box-warning" style="border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); border-top: 3px solid #f39c12;">
                    <div class="box-header with-border" style="padding: 15px 20px; background: #f9f9f9;">
                        <h3 class="box-title"><i class="fa fa-trophy"></i> Naannoo Filannoo Beebbeyyen</h3>
                    </div>
                    <div class="box-body" style="padding: 0;">
                        <table class="table table-hover" style="margin: 0;">
                            <thead>
                                <tr style="background: #f0f0f0;">
                                    <th style="padding: 12px 10px;">#</th>
                                    <th style="padding: 12px 10px;">Naannoo</th>
                                    <th style="padding: 12px 10px;">Teessoo</th>
                                    <th style="padding: 12px 10px; text-align: center;">Gabaasa</th>
                                    <th style="padding: 12px 10px; text-align: right;">Filattoota</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(empty($top_regions)): ?>
                                    <tr>
                                        <td colspan="5" class="text-center" style="padding: 30px;">Gabaasi hin argamne</td>
                                    </tr>
                                <?php else: ?>
                                    <?php $i = 1; foreach($top_regions as $region): ?>
                                    <tr>
                                        <td style="padding: 10px; font-weight: 600;"><?php echo $i++; ?></td>
                                        <td style="padding: 10px;"><strong><?php echo $region->voting_region_name ?: $region->naannoofil_id; ?></strong></td>
                                        <td style="padding: 10px;">
                                            <?php 
                                            $location = $region->zone_name ?: ($region->city_name ?: 'Kan hin beekamne');
                                            echo $location;
                                            ?>
                                        </td>
                                        <td style="padding: 10px; text-align: center;">
                                            <span class="label label-success"><?php echo $region->report_count; ?></span>
                                        </td>
                                        <td style="padding: 10px; text-align: right; font-weight: 600;">
                                            <?php echo number_format($region->total_voters); ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Recent Reports Table with Location -->
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-12">
                <div class="box box-default" style="border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); border-top: 3px solid #2c5f2d;">
                    <div class="box-header with-border" style="padding: 15px 20px; background: #f9f9f9;">
                        <h3 class="box-title"><i class="fa fa-file-text"></i> Gabaasawwan Dhihootti Galmaa'an</h3>
                        <div class="box-tools pull-right">
                            <a href="<?php echo base_url('admin/all_reports'); ?>" class="btn btn-sm btn-success">Hunda Ilaali</a>
                        </div>
                    </div>
                    <div class="box-body" style="padding: 0;">
                        <div class="table-responsive">
                            <table class="table table-hover" style="margin: 0;">
                                <thead>
                                    <tr style="background: #f0f0f0;">
                                        <th style="padding: 12px 10px;">Yeroo</th>
                                        <th style="padding: 12px 10px;">Naannoo Filannoo</th>
                                        <th style="padding: 12px 10px;">Teessoo</th>
                                        <th style="padding: 12px 10px; text-align: center;">Miseensa (Dhi/Dub)</th>
                                        <th style="padding: 12px 10px; text-align: center;">Miseensa Hin Taane (Dhi/Dub)</th>
                                        <th style="padding: 12px 10px; text-align: right;">Waliigala</th>
                                        <th style="padding: 12px 10px; text-align: center;">Haala</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(empty($recent_reports)): ?>
                                        <tr>
                                            <td colspan="7" class="text-center" style="padding: 30px;">Gabaasi hin argamne</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach($recent_reports as $report): 
                                            $session_label = $report->report_session == 'morning' ? 'warning' : 'primary';
                                            $session_text = $report->report_session == 'morning' ? 'Ganama' : 'Waaree Booda';
                                            $location = $report->zone_name ?: ($report->city_name ?: 'Kan hin beekamne');
                                        ?>
                                        <tr>
                                            <td style="padding: 10px; vertical-align: middle;">
                                                <?php echo date('H:i', strtotime($report->created_at)); ?><br>
                                                <small><?php echo date('d/m', strtotime($report->report_date)); ?></small>
                                            </td>
                                            <td style="padding: 10px; vertical-align: middle;">
                                                <strong><?php echo $report->voting_region_name ?: $report->naannoofil_id; ?></strong>
                                            </td>
                                            <td style="padding: 10px; vertical-align: middle;">
                                                <small><?php echo $location; ?></small>
                                            </td>
                                            <td style="padding: 10px; text-align: center; vertical-align: middle;">
                                                <?php echo number_format($report->actual_member_male); ?>/<?php echo number_format($report->actual_member_female); ?>
                                            </td>
                                            <td style="padding: 10px; text-align: center; vertical-align: middle;">
                                                <?php echo number_format($report->actual_nonmember_male); ?>/<?php echo number_format($report->actual_nonmember_female); ?>
                                            </td>
                                            <td style="padding: 10px; text-align: right; vertical-align: middle; font-weight: 700; color: #2c5f2d;">
                                                <?php echo number_format($report->actual_grand_total); ?>
                                            </td>
                                            <td style="padding: 10px; text-align: center; vertical-align: middle;">
                                                <span class="label label-<?php echo $session_label; ?>"><?php echo $session_text; ?></span>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer Stats -->
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-12">
                <div class="box box-solid" style="background: #f9f9f9; border: 1px solid #ddd; border-radius: 4px;">
                    <div class="box-body" style="padding: 20px;">
                        <div class="row">
                            <div class="col-md-2 col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header"><?php echo $total_naannoo_filannoo; ?></h5>
                                    <span class="description-text">NAANNOO FILANNOO</span>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header"><?php echo $reported_count; ?></h5>
                                    <span class="description-text">HAR'AA GABAASAN</span>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header"><?php echo $total_naannoo_filannoo - $reported_count; ?></h5>
                                    <span class="description-text">HIN GABAASIN</span>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header"><?php echo number_format($total_voters); ?></h5>
                                    <span class="description-text">FILATTOOTA</span>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header"><?php echo number_format($total_member_male + $total_nonmember_male); ?></h5>
                                    <span class="description-text">DHIIRA</span>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header"><?php echo number_format($total_member_female + $total_nonmember_female); ?></h5>
                                    <span class="description-text">DUBARTII</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
</div>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Weekly Chart Data
    var ctx = document.getElementById('weeklyChart').getContext('2d');
    var weeklyChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($weekly_labels); ?>,
            datasets: [{
                label: 'Kan Ganama',
                data: <?php echo json_encode($weekly_morning); ?>,
                backgroundColor: 'rgba(0, 166, 90, 0.1)',
                borderColor: '#00a65a',
                borderWidth: 2,
                tension: 0.3,
                fill: false
            }, {
                label: 'Kan Waaree Booda',
                data: <?php echo json_encode($weekly_afternoon); ?>,
                backgroundColor: 'rgba(243, 156, 18, 0.1)',
                borderColor: '#f39c12',
                borderWidth: 2,
                tension: 0.3,
                fill: false
            }, {
                label: 'Filattoota (Haar)',
                data: <?php echo json_encode($weekly_voters); ?>,
                backgroundColor: 'rgba(60, 141, 188, 0.1)',
                borderColor: '#3c8dbc',
                borderWidth: 2,
                tension: 0.3,
                fill: false,
                yAxisID: 'y1'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    type: 'linear',
                    display: true,
                    position: 'left',
                    title: {
                        display: true,
                        text: 'Baay\'ina Gabaasa'
                    },
                    beginAtZero: true,
                    max: <?php echo $total_naannoo_filannoo; ?>
                },
                y1: {
                    type: 'linear',
                    display: true,
                    position: 'right',
                    title: {
                        display: true,
                        text: 'Baay\'ina Filattoota'
                    },
                    beginAtZero: true,
                    grid: {
                        drawOnChartArea: false
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });
</script>

<!-- jQuery Knob for circular stats -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-knob/js/jquery.knob.js"></script>
<script>
    $(function() {
        $(".knob").knob({
            draw: function() {
                // Custom draw for knobs
            }
        });
    });
</script>