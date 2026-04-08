<div class="content-wrapper">
    <section class="content-header"><h1><?php echo $pageTitle; ?></h1></section>
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <form method="get" class="row">
                    <div class="col-md-2"><input type="date" name="start_date" value="<?php echo $start_date; ?>" class="form-control"></div>
                    <div class="col-md-2"><input type="date" name="end_date" value="<?php echo $end_date; ?>" class="form-control"></div>
                    <div class="col-md-3">
                        <select name="region" class="form-control">
                            <option value="all">All Regions</option>
                            <?php foreach($regions as $r): ?>
                                <option value="<?php echo $r->naannoofil_id; ?>" <?php echo ($selected_region == $r->naannoofil_id ? 'selected' : ''); ?>><?php echo $r->naannoofil_id; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="security" class="form-control">
                            <option value="all" <?php echo ($selected_security == 'all' ? 'selected' : ''); ?>>All status</option>
                            <option value="green" <?php echo ($selected_security == 'green' ? 'selected' : ''); ?>>Green</option>
                            <option value="yellow" <?php echo ($selected_security == 'yellow' ? 'selected' : ''); ?>>Yellow</option>
                            <option value="red" <?php echo ($selected_security == 'red' ? 'selected' : ''); ?>>Red</option>
                        </select>
                    </div>
                    <div class="col-md-2"><button class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button></div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2"><div class="small-box bg-aqua"><div class="inner"><h3><?php echo $summary->total_reports; ?></h3><p>Reports</p></div></div></div>
            <div class="col-md-2"><div class="small-box bg-green"><div class="inner"><h3><?php echo $summary->male_total; ?></h3><p>Male</p></div></div></div>
            <div class="col-md-2"><div class="small-box bg-yellow"><div class="inner"><h3><?php echo $summary->female_total; ?></h3><p>Female</p></div></div></div>
            <div class="col-md-2"><div class="small-box bg-purple"><div class="inner"><h3><?php echo $summary->grand_total; ?></h3><p>Total</p></div></div></div>
            <div class="col-md-2"><div class="small-box bg-olive"><div class="inner"><h3><?php echo $summary->green_count; ?></h3><p>Green</p></div></div></div>
            <div class="col-md-2"><div class="small-box bg-red"><div class="inner"><h3><?php echo $summary->red_count; ?></h3><p>Red</p></div></div></div>
        </div>

        <div class="box box-primary">
            <div class="box-header"><h3 class="box-title">District detail</h3></div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead><tr><th>Date</th><th>Naannoo</th><th>Party</th><th>Male</th><th>Female</th><th>Total</th><th>Status</th></tr></thead>
                    <tbody>
                        <?php if(!empty($reports)): foreach($reports as $r): ?>
                            <tr>
                                <td><?php echo $r->report_date; ?></td>
                                <td><?php echo $r->naannoofil_id; ?></td>
                                <td><?php echo $r->party_name; ?></td>
                                <td><?php echo number_format($r->male_electors); ?></td>
                                <td><?php echo number_format($r->female_electors); ?></td>
                                <td><strong><?php echo number_format($r->total_electors); ?></strong></td>
                                <td><?php echo ucfirst($r->security_status); ?></td>
                            </tr>
                        <?php endforeach; else: ?>
                            <tr><td colspan="7" class="text-center">No data</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
