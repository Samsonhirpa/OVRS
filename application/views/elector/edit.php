<div class="content-wrapper">
    <section class="content-header"><h1><?php echo $pageTitle; ?></h1></section>
    <section class="content">
        <div class="box box-warning">
            <form method="post" action="<?php echo base_url('ElectorRegistration/update/'.$record->id); ?>">
                <div class="box-body row">
                    <div class="form-group col-md-4">
                        <label>Dhiira</label>
                        <input type="number" min="0" name="male_electors" value="<?php echo $record->male_electors; ?>" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Dubartii</label>
                        <input type="number" min="0" name="female_electors" value="<?php echo $record->female_electors; ?>" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Haala Nageenyaa</label>
                        <select name="security_status" class="form-control" required>
                            <option value="green" <?php echo ($record->security_status=='green'?'selected':''); ?>>Green</option>
                            <option value="yellow" <?php echo ($record->security_status=='yellow'?'selected':''); ?>>Yellow</option>
                            <option value="red" <?php echo ($record->security_status=='red'?'selected':''); ?>>Red</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Hubannoo</label>
                        <textarea name="remarks" class="form-control"><?php echo $record->remarks; ?></textarea>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-warning">Update</button>
                    <a class="btn btn-default" href="<?php echo base_url('ElectorRegistration/listRecords'); ?>">Back</a>
                </div>
            </form>
        </div>
    </section>
</div>
