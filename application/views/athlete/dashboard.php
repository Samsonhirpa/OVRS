<!-- dashboard.php -->
<div class="content-wrapper">
    <section class="content">
        <!-- Page Header -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <i class="fa fa-dashboard"></i> Dashboard Overview
                        </h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="row">
            <!-- Athletes Count -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $stats['total_athletes']; ?></h3>
                        <p>Total Athletes</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="<?php echo site_url('athlete'); ?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Officers Count -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $stats['total_officers']; ?></h3>
                        <p>Total Officers</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-tie"></i>
                    </div>
                    <a href="<?php echo site_url('officer'); ?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Active Sports -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $stats['active_sports']; ?></h3>
                        <p>Active Sports</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-futbol"></i>
                    </div>
                    <a href="<?php echo site_url('athlete'); ?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- New This Month -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $stats['new_this_month']; ?></h3>
                        <p>New This Month</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-chart-line"></i>
                    </div>
                    <a href="<?php echo site_url('reports'); ?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Reports Section -->
        <div class="row">
            <!-- Athletes Report -->
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <i class="fa fa-users"></i> Athletes Report
                        </h3>
                        <div class="box-tools pull-right">
                            <a href="<?php echo site_url('athlete/export'); ?>" class="btn btn-sm btn-default">
                                <i class="fa fa-download"></i> Export
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="bg-light-blue">
                                        <th colspan="3">Athlete Statistics</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="60%"><strong>Total Athletes</strong></td>
                                        <td width="40%" class="text-right"><?php echo $stats['total_athletes']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Male Athletes</strong></td>
                                        <td class="text-right"><?php echo $stats['male_count']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Female Athletes</strong></td>
                                        <td class="text-right"><?php echo $stats['female_count']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Other</strong></td>
                                        <td class="text-right"><?php echo $stats['other_count']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Average Age</strong></td>
                                        <td class="text-right"><?php echo $stats['avg_age']; ?> years</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Top Sport</strong></td>
                                        <td class="text-right"><?php echo $stats['top_sport']['name']; ?> (<?php echo $stats['top_sport']['count']; ?>)</td>
                                    </tr>
                                    <tr>
                                        <td><strong>New This Month</strong></td>
                                        <td class="text-right"><?php echo $stats['new_athletes_month']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Last Registration</strong></td>
                                        <td class="text-right"><?php echo $stats['last_registration']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Gender Distribution -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="info-box bg-blue">
                                    <span class="info-box-icon"><i class="fa fa-male"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Male Athletes</span>
                                        <span class="info-box-number"><?php echo $stats['male_count']; ?></span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?php echo $stats['male_percentage']; ?>%"></div>
                                        </div>
                                        <span class="progress-description"><?php echo $stats['male_percentage']; ?>% of total</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="info-box bg-red">
                                    <span class="info-box-icon"><i class="fa fa-female"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Female Athletes</span>
                                        <span class="info-box-number"><?php echo $stats['female_count']; ?></span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?php echo $stats['female_percentage']; ?>%"></div>
                                        </div>
                                        <span class="progress-description"><?php echo $stats['female_percentage']; ?>% of total</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Officers Report -->
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <i class="fa fa-user-tie"></i> Officers Report
                        </h3>
                        <div class="box-tools pull-right">
                            <a href="<?php echo site_url('officer/export'); ?>" class="btn btn-sm btn-default">
                                <i class="fa fa-download"></i> Export
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="bg-green">
                                        <th colspan="3">Officer Statistics</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="60%"><strong>Total Officers</strong></td>
                                        <td width="40%" class="text-right"><?php echo $stats['total_officers']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Active Officers</strong></td>
                                        <td class="text-right"><?php echo $stats['active_officers']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Inactive Officers</strong></td>
                                        <td class="text-right"><?php echo $stats['inactive_officers']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Average Experience</strong></td>
                                        <td class="text-right"><?php echo $stats['avg_experience']; ?> years</td>
                                    </tr>
                                    <tr>
                                        <td><strong>New This Month</strong></td>
                                        <td class="text-right"><?php echo $stats['new_officers_month']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Last Assignment</strong></td>
                                        <td class="text-right"><?php echo $stats['last_assignment']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Officer to Athlete Ratio</strong></td>
                                        <td class="text-right">1:<?php echo $stats['officer_athlete_ratio']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Officer Status -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="info-box bg-green">
                                    <span class="info-box-icon"><i class="fa fa-user-check"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Active Officers</span>
                                        <span class="info-box-number"><?php echo $stats['active_officers']; ?></span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?php echo $stats['active_officer_percentage']; ?>%"></div>
                                        </div>
                                        <span class="progress-description"><?php echo $stats['active_officer_percentage']; ?>% of total</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="info-box bg-yellow">
                                    <span class="info-box-icon"><i class="fa fa-user-clock"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Inactive Officers</span>
                                        <span class="info-box-number"><?php echo $stats['inactive_officers']; ?></span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?php echo $stats['inactive_officer_percentage']; ?>%"></div>
                                        </div>
                                        <span class="progress-description"><?php echo $stats['inactive_officer_percentage']; ?>% of total</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="row">
            <!-- Recent Athletes -->
            <div class="col-md-6">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <i class="fa fa-user-plus"></i> Recently Added Athletes
                        </h3>
                        <div class="box-tools pull-right">
                            <span class="label label-warning"><?php echo count($recent_athletes); ?> New</span>
                        </div>
                    </div>
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            <?php foreach ($recent_athletes as $athlete): ?>
                            <li class="item">
                                <div class="product-img">
                                    <?php if (!empty($athlete['photo'])): ?>
                                        <img src="<?php echo base_url('uploads/athletes/' . $athlete['photo']); ?>" 
                                             alt="<?php echo htmlspecialchars($athlete['full_name']); ?>"
                                             class="img-circle" style="width: 50px; height: 50px;">
                                    <?php else: ?>
                                        <div class="img-circle bg-gray" style="width:50px;height:50px;text-align:center;line-height:50px;">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="product-info">
                                    <a href="<?php echo site_url('athlete/edit/' . $athlete['id']); ?>" class="product-title">
                                        <?php echo htmlspecialchars($athlete['full_name']); ?>
                                        <span class="label label-warning pull-right"><?php echo $athlete['age']; ?> yrs</span>
                                    </a>
                                    <span class="product-description">
                                        <i class="fa fa-<?php echo strtolower($athlete['sex']) == 'male' ? 'male' : 'female'; ?>"></i> 
                                        <?php echo $athlete['sex']; ?> | 
                                        <?php echo $athlete['sport']; ?> | 
                                        <?php echo $athlete['region']; ?>
                                        <span class="text-muted pull-right">
                                            <i class="fa fa-calendar"></i> <?php echo $athlete['created_at']; ?>
                                        </span>
                                    </span>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php if (empty($recent_athletes)): ?>
                            <div class="text-center text-muted">
                                <i class="fa fa-users fa-3x"></i>
                                <p>No recent athletes found</p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="box-footer text-center">
                        <a href="<?php echo site_url('athlete'); ?>" class="uppercase">View All Athletes</a>
                    </div>
                </div>
            </div>

            <!-- Recent Officers -->
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <i class="fa fa-user-tie"></i> Recent Officers
                        </h3>
                        <div class="box-tools pull-right">
                            <span class="label label-danger"><?php echo count($recent_officers); ?> New</span>
                        </div>
                    </div>
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            <?php foreach ($recent_officers as $officer): ?>
                            <li class="item">
                                <div class="product-img">
                                    <?php if (!empty($officer['photo'])): ?>
                                        <img src="<?php echo base_url('uploads/officers/' . $officer['photo']); ?>" 
                                             alt="<?php echo htmlspecialchars($officer['name']); ?>"
                                             class="img-circle" style="width: 50px; height: 50px;">
                                    <?php else: ?>
                                        <div class="img-circle bg-gray" style="width:50px;height:50px;text-align:center;line-height:50px;">
                                            <i class="fa fa-user-tie"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="product-info">
                                    <a href="<?php echo site_url('officer/edit/' . $officer['id']); ?>" class="product-title">
                                        <?php echo htmlspecialchars($officer['name']); ?>
                                        <span class="label label-<?php echo $officer['status'] == 'active' ? 'success' : 'danger'; ?> pull-right">
                                            <?php echo ucfirst($officer['status']); ?>
                                        </span>
                                    </a>
                                    <span class="product-description">
                                        <?php echo $officer['position']; ?> | <?php echo $officer['department']; ?>
                                        <span class="text-muted pull-right">
                                            <i class="fa fa-calendar"></i> <?php echo $officer['assigned_at']; ?>
                                        </span>
                                    </span>
                                    <?php if ($officer['experience'] > 0): ?>
                                    <small class="text-muted">
                                        <i class="fa fa-star"></i> <?php echo $officer['experience']; ?> years experience
                                    </small>
                                    <?php endif; ?>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php if (empty($recent_officers)): ?>
                            <div class="text-center text-muted">
                                <i class="fa fa-user-tie fa-3x"></i>
                                <p>No recent officers found</p>
                                <a href="<?php echo site_url('officer/create'); ?>" class="btn btn-primary btn-sm">
                                    <i class="fa fa-plus"></i> Add First Officer
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="box-footer text-center">
                        <a href="<?php echo site_url('officer'); ?>" class="uppercase">View All Officers</a>
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
                        <div class="row text-center">
                            <div class="col-md-3 col-sm-6">
                                <a href="<?php echo site_url('athlete/create'); ?>" class="btn btn-app btn-lg">
                                    <i class="fa fa-user-plus fa-3x"></i> Add Athlete
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <a href="<?php echo site_url('officer/create'); ?>" class="btn btn-app btn-lg">
                                    <i class="fa fa-user-tie fa-3x"></i> Add Officer
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <a href="<?php echo site_url('reports'); ?>" class="btn btn-app btn-lg">
                                    <i class="fa fa-file-pdf fa-3x"></i> Generate Report
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <a href="<?php echo site_url('settings'); ?>" class="btn btn-app btn-lg">
                                    <i class="fa fa-cog fa-3x"></i> Settings
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

<!-- JavaScript -->
<script>
$(document).ready(function() {
    // Initialize tooltips
    $('[data-toggle="tooltip"]').tooltip();
    
    // Auto-refresh dashboard every 60 seconds
    setInterval(refreshDashboard, 60000);
    
    function refreshDashboard() {
        $.ajax({
            url: '<?php echo site_url("dashboard/refresh"); ?>',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Update stats boxes with animation
                    updateStatBox('.bg-aqua .inner h3', response.data.total_athletes);
                    updateStatBox('.bg-green .inner h3', response.data.total_officers);
                    updateStatBox('.bg-yellow .inner h3', response.data.active_sports);
                    updateStatBox('.bg-red .inner h3', response.data.new_this_month);
                    
                    // Show notification
                    showNotification('Dashboard updated', 'success');
                }
            },
            error: function() {
                showNotification('Failed to update dashboard', 'error');
            }
        });
    }
    
    function updateStatBox(selector, newValue) {
        var $element = $(selector);
        var oldValue = parseInt($element.text());
        
        if (oldValue !== newValue) {
            $element.fadeOut(300, function() {
                $(this).text(newValue).fadeIn(300);
            });
            
            // Add pulse animation to the parent box
            $(selector).closest('.small-box').addClass('animated pulse');
            setTimeout(function() {
                $(selector).closest('.small-box').removeClass('animated pulse');
            }, 1000);
        }
    }
    
    function showNotification(message, type) {
        var alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
        var icon = type === 'success' ? 'fa-check' : 'fa-exclamation';
        
        var html = '<div class="alert ' + alertClass + ' alert-dismissible">' +
                   '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
                   '<h4><i class="icon fa ' + icon + '"></i> ' + (type === 'success' ? 'Success!' : 'Error!') + '</h4>' +
                   message +
                   '</div>';
        
        // Add to top of content
        $('.content').prepend(html);
        
        // Auto remove after 3 seconds
        setTimeout(function() {
            $('.alert').fadeOut('slow', function() {
                $(this).remove();
            });
        }, 3000);
    }
});
</script>

<style>
.small-box {
    border-radius: 3px;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    margin-bottom: 20px;
}

.info-box {
    min-height: 90px;
    margin-bottom: 15px;
    border-radius: 3px;
}

.box {
    border-top: 3px solid;
    border-radius: 3px;
    margin-bottom: 20px;
}

.box-primary {
    border-top-color: #3c8dbc;
}

.box-success {
    border-top-color: #00a65a;
}

.box-warning {
    border-top-color: #f39c12;
}

.box-danger {
    border-top-color: #dd4b39;
}

.bg-light-blue {
    background-color: #3c8dbc !important;
    color: white !important;
}

.bg-green {
    background-color: #00a65a !important;
    color: white !important;
}

.products-list .product-info {
    margin-left: 60px;
}

.btn-app {
    border-radius: 3px;
    position: relative;
    padding: 15px 5px;
    margin: 0 0 10px 10px;
    min-width: 80px;
    height: 60px;
    text-align: center;
    color: #666;
    border: 1px solid #ddd;
    background-color: #f4f4f4;
    font-size: 12px;
}

.btn-app:hover {
    background: #f4f4f4;
    color: #444;
    border-color: #aaa;
}

.btn-app > .fa {
    font-size: 20px;
    display: block;
    margin-bottom: 5px;
}

.btn-app.btn-lg {
    height: 80px;
    min-width: 100px;
}

.btn-app.btn-lg > .fa {
    font-size: 30px;
    margin-bottom: 10px;
}

/* Animation for updates */
.animated {
    animation-duration: 1s;
    animation-fill-mode: both;
}

@keyframes pulse {
    from {
        transform: scale3d(1, 1, 1);
    }
    50% {
        transform: scale3d(1.05, 1.05, 1.05);
    }
    to {
        transform: scale3d(1, 1, 1);
    }
}

.pulse {
    animation-name: pulse;
}

/* Responsive adjustments */
@media (max-width: 767px) {
    .col-md-3, .col-md-6 {
        margin-bottom: 15px;
    }
    
    .btn-app {
        margin: 0 5px 10px 0;
        min-width: 70px;