<!-- dashboard.php -->
<div class="content-wrapper">
    <section class="content">
        <!-- Page Header -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <i class="fa fa-dashboard"></i> Dashboard
                        </h3>
                    </div>
                    <div class="box-body">
                        <p class="lead">Welcome to Athlete Management System</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Athlete Statistics -->
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $stats['total_athletes']; ?></h3>
                        <p>Total Athletes</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="<?php echo site_url('athlete'); ?>" class="small-box-footer">
                        View All <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $stats['male_count']; ?></h3>
                        <p>Male Athletes</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-male"></i>
                    </div>
                    <a href="<?php echo site_url('athlete'); ?>?sex=Male" class="small-box-footer">
                        View Males <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $stats['female_count']; ?></h3>
                        <p>Female Athletes</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-female"></i>
                    </div>
                    <a href="<?php echo site_url('athlete'); ?>?sex=Female" class="small-box-footer">
                        View Females <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $stats['active_sports']; ?></h3>
                        <p>Active Sports</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-futbol"></i>
                    </div>
                    <a href="<?php echo site_url('athlete'); ?>" class="small-box-footer">
                        View Sports <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Recent Athletes -->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <i class="fa fa-users"></i> Recent Athletes
                        </h3>
                        <div class="box-tools pull-right">
                            <span class="label label-primary"><?php echo count($recent_athletes); ?> athletes</span>
                        </div>
                    </div>
                    <div class="box-body">
                        <?php if (!empty($recent_athletes)): ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr class="bg-light-blue">
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Sport</th>
                                            <th>Region</th>
                                            <th>Registered</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($recent_athletes as $index => $athlete): ?>
                                        <tr>
                                            <td><?php echo $index + 1; ?></td>
                                            <td>
                                                <strong><?php echo htmlspecialchars($athlete['full_name']); ?></strong>
                                            </td>
                                            <td><?php echo $athlete['age']; ?></td>
                                            <td><?php echo htmlspecialchars($athlete['sport']); ?></td>
                                            <td><?php echo htmlspecialchars($athlete['region']); ?></td>
                                            <td><?php echo $athlete['created_at']; ?></td>
                                            <td>
                                                <a href="<?php echo site_url('athlete/edit/' . $athlete['id']); ?>" 
                                                   class="btn btn-xs btn-warning" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="<?php echo site_url('athlete/delete/' . $athlete['id']); ?>" 
                                                   class="btn btn-xs btn-danger" title="Delete"
                                                   onclick="return confirm('Delete this athlete?')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="text-center text-muted" style="padding: 40px;">
                                <i class="fa fa-users fa-4x"></i>
                                <h4>No athletes found</h4>
                                <p>Start by adding your first athlete</p>
                                <a href="<?php echo site_url('athlete/create'); ?>" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Add First Athlete
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="box-footer clearfix">
                        <a href="<?php echo site_url('athlete'); ?>" class="btn btn-sm btn-primary btn-flat pull-left">
                            <i class="fa fa-list"></i> View All Athletes
                        </a>
                        <a href="<?php echo site_url('athlete/create'); ?>" class="btn btn-sm btn-success btn-flat pull-right">
                            <i class="fa fa-plus"></i> Add New Athlete
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- System Summary -->
        <div class="row">
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <i class="fa fa-chart-pie"></i> Gender Distribution
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="progress-group">
                            <span class="progress-text">Male Athletes</span>
                            <span class="progress-number"><?php echo $stats['male_count']; ?></span>
                            <div class="progress sm">
                                <div class="progress-bar progress-bar-aqua" style="width: <?php echo $stats['male_percentage']; ?>%"></div>
                            </div>
                        </div>
                        
                        <div class="progress-group">
                            <span class="progress-text">Female Athletes</span>
                            <span class="progress-number"><?php echo $stats['female_count']; ?></span>
                            <div class="progress sm">
                                <div class="progress-bar progress-bar-red" style="width: <?php echo $stats['female_percentage']; ?>%"></div>
                            </div>
                        </div>
                        
                        <div class="progress-group">
                            <span class="progress-text">Other</span>
                            <span class="progress-number"><?php echo $stats['other_count']; ?></span>
                            <div class="progress sm">
                                <div class="progress-bar progress-bar-green" style="width: <?php echo $stats['other_percentage']; ?>%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <i class="fa fa-info-circle"></i> System Information
                        </h3>
                    </div>
                    <div class="box-body">
                        <dl class="dl-horizontal">
                            <dt>Total Athletes:</dt>
                            <dd><?php echo $stats['total_athletes']; ?></dd>
                            
                            <dt>Average Age:</dt>
                            <dd><?php echo $stats['avg_age']; ?> years</dd>
                            
                            <dt>Active Sports:</dt>
                            <dd><?php echo $stats['active_sports']; ?></dd>
                            
                            <dt>Top Sport:</dt>
                            <dd><?php echo $stats['top_sport']['name']; ?> (<?php echo $stats['top_sport']['count']; ?> athletes)</dd>
                            
                            <dt>New This Month:</dt>
                            <dd><?php echo $stats['new_this_month']; ?></dd>
                            
                            <dt>Last Registration:</dt>
                            <dd><?php echo $stats['last_registration']; ?></dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <i class="fa fa-bolt"></i> Quick Actions
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 text-center">
                                <a href="<?php echo site_url('athlete/create'); ?>" class="btn btn-app">
                                    <i class="fa fa-user-plus fa-2x"></i> Add Athlete
                                </a>
                            </div>
                            
                            <div class="col-md-3 col-sm-6 text-center">
                                <?php if ($stats['total_officers'] > 0): ?>
                                    <a href="<?php echo site_url('officer'); ?>" class="btn btn-app">
                                        <i class="fa fa-user-tie fa-2x"></i> View Officers
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo site_url('officer/create'); ?>" class="btn btn-app">
                                        <i class="fa fa-user-tie fa-2x"></i> Add Officer
                                    </a>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-md-3 col-sm-6 text-center">
                                <a href="<?php echo site_url('reports'); ?>" class="btn btn-app">
                                    <i class="fa fa-file-alt fa-2x"></i> Reports
                                </a>
                            </div>
                            
                            <div class="col-md-3 col-sm-6 text-center">
                                <a href="<?php echo site_url('settings'); ?>" class="btn btn-app">
                                    <i class="fa fa-cog fa-2x"></i> Settings
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

<!-- No JavaScript needed - keeps it simple -->