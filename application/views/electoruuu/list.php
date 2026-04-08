<div class="content-wrapper">
    <section class="content-header"><h1><?php echo $pageTitle; ?></h1></section>
    <section class="content">
        <?php if($this->session->flashdata('success')): ?><div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div><?php endif; ?>
        <?php if($this->session->flashdata('error')): ?><div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div><?php endif; ?>

        <div class="box box-info">
            <div class="box-header">
                <form method="get" class="row">
                    <div class="col-md-3"><input type="date" name="start_date" value="<?php echo $start_date; ?>" class="form-control"></div>
                    <div class="col-md-3"><input type="date" name="end_date" value="<?php echo $end_date; ?>" class="form-control"></div>
                    <div class="col-md-3"><button class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button></div>
                </form>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Date</th><th>Party</th><th>Male</th><th>Female</th><th>Total</th><th>Situation</th><th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($reports)): foreach($reports as $row): ?>
                        <tr>
                            <td><?php echo $row->report_date; ?></td>
                            <td><?php echo $row->party_name; ?></td>
                            <td><?php echo number_format($row->male_electors); ?></td>
                            <td><?php echo number_format($row->female_electors); ?></td>
                            <td><strong><?php echo number_format($row->total_electors); ?></strong></td>
                            <td>
                                <?php if($row->security_status == 'green'): ?><span class="label label-success">Green</span><?php endif; ?>
                                <?php if($row->security_status == 'yellow'): ?><span class="label label-warning">Yellow</span><?php endif; ?>
                                <?php if($row->security_status == 'red'): ?><span class="label label-danger">Red</span><?php endif; ?>
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="<?php echo base_url('ElectorRegistration/edit/'.$row->id); ?>">Edit</a>
                                <a class="btn btn-xs btn-danger" onclick="return confirm('Delete this record?')" href="<?php echo base_url('ElectorRegistration/delete/'.$row->id); ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="7" class="text-center">No data found.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
