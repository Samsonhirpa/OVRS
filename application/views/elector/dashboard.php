<div class="content-wrapper">
    <section class="content-header"><h1><?php echo $pageTitle; ?></h1></section>
    <section class="content">
        <div class="row">
            <div class="col-md-3"><div class="small-box bg-aqua"><div class="inner"><h3><?php echo number_format($summary->total_reports); ?></h3><p>Total Reports (Month)</p></div><div class="icon"><i class="fa fa-file"></i></div></div></div>
            <div class="col-md-3"><div class="small-box bg-green"><div class="inner"><h3><?php echo number_format($summary->male_total); ?></h3><p>Male Electors</p></div><div class="icon"><i class="fa fa-mars"></i></div></div></div>
            <div class="col-md-3"><div class="small-box bg-yellow"><div class="inner"><h3><?php echo number_format($summary->female_total); ?></h3><p>Female Electors</p></div><div class="icon"><i class="fa fa-venus"></i></div></div></div>
            <div class="col-md-3"><div class="small-box bg-purple"><div class="inner"><h3><?php echo number_format($summary->grand_total); ?></h3><p>Total Electors</p></div><div class="icon"><i class="fa fa-users"></i></div></div></div>
        </div>

        <div class="box box-primary">
            <div class="box-header"><h3 class="box-title">Recent Registrations</h3></div>
            <div class="box-body table-responsive">
                <table class="table table-striped table-bordered">
                    <thead><tr><th>Date</th><th>Party</th><th>Total</th><th>Situation</th></tr></thead>
                    <tbody>
                        <?php if(!empty($recent_reports)): foreach($recent_reports as $row): ?>
                            <tr>
                                <td><?php echo $row->report_date; ?></td>
                                <td><?php echo $row->party_name; ?></td>
                                <td><?php echo number_format($row->total_electors); ?></td>
                                <td><?php echo ucfirst($row->security_status); ?></td>
                            </tr>
                        <?php endforeach; else: ?>
                            <tr><td colspan="4" class="text-center">No records found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
