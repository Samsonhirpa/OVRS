<div class="content-wrapper">
    <section class="content-header">
        <h1><?php echo $pageTitle; ?></h1>
    </section>
    <section class="content">
        <?php if($this->session->flashdata('success')): ?><div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div><?php endif; ?>
        <?php if($this->session->flashdata('error')): ?><div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div><?php endif; ?>

        <div class="box box-primary">
            <div class="box-header"><h3 class="box-title">Naannoo: <?php echo $naannoofil; ?></h3></div>
            <form method="post" action="<?php echo base_url('ElectorRegistration/save'); ?>">
                <div class="box-body row">
                    <div class="form-group col-md-4">
                        <label>Guyyaa</label>
                        <input type="date" name="report_date" class="form-control" value="<?php echo $today; ?>" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Haala Nageenyaa</label>
                        <select name="security_status" class="form-control" required>
                            <option value="green">Green (Very Safe)</option>
                            <option value="yellow">Yellow (Some Disturbance)</option>
                            <option value="red">Red (Not Safe)</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Lakkoofsa Filattoota Dhiiraa</label>
                        <input type="number" min="0" name="male_electors" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Lakkoofsa Filattoota Dubartii</label>
                        <input type="number" min="0" name="female_electors" class="form-control" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Hubannoo</label>
                        <textarea name="remarks" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Galmeessi</button>
                    <a href="<?php echo base_url('ElectorRegistration/listRecords'); ?>" class="btn btn-default">Tarree Ilaali</a>
                </div>
            </form>
        </div>
    </section>
</div>
