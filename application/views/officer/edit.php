<!-- application/views/officer/edit.php -->
<div class="content-wrapper">
    <section class="content" style="min-height: 526px;">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <i class="fa fa-edit"></i> <?php echo $title; ?>
                        </h3>
                        <div class="box-tools pull-right">
                            <a href="<?php echo site_url('officer'); ?>" class="btn btn-sm btn-default">
                                <i class="fa fa-arrow-left"></i> Back to List
                            </a>
                        </div>
                    </div>
                    
                    <div class="box-body">
                        <?php echo form_open_multipart('officer/update/' . $officer['id'], ['id' => 'officerForm']); ?>
                        
                        <!-- Validation Errors -->
                        <?php if (validation_errors()): ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-ban"></i> Validation Error!</h4>
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="callout callout-info">
                            <h4 class="box-title">
                                <i class="fa fa-info-circle"></i> Edit Officer Information
                            </h4>
                            <p>Please update the officer information below</p>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Full Name -->
                                <div class="form-group">
                                    <label for="full_name">Full Name *</label>
                                    <input type="text" 
                                           class="form-control" 
                                           id="full_name" 
                                           name="full_name" 
                                           value="<?php echo set_value('full_name', $officer['full_name']); ?>" 
                                           placeholder="Enter full name"
                                           required>
                                </div>
                                
                                <!-- Sex -->
                                <div class="form-group">
                                    <label for="sex">Sex *</label>
                                    <select class="form-control" id="sex" name="sex" required>
                                        <option value="">Select Sex</option>
                                        <option value="Male" <?php echo set_select('sex', 'Male', $officer['sex'] == 'Male'); ?>>Male</option>
                                        <option value="Female" <?php echo set_select('sex', 'Female', $officer['sex'] == 'Female'); ?>>Female</option>
                                        <option value="Other" <?php echo set_select('sex', 'Other', $officer['sex'] == 'Other'); ?>>Other</option>
                                    </select>
                                </div>
                                
                                <!-- Location Type -->
                                <div class="form-group">
                                    <label>Location Type *</label>
                                    <select class="form-control" name="teessoo" id="teessoo" required 
                                            onchange="toggleLocationType(this.value)">
                                        <option value="">-- Select Location Type --</option>
                                        <option value="Magaaalaa" <?php echo set_select('teessoo', 'Magaaalaa', $officer['teessoo'] == 'Magaaalaa'); ?>>City</option>
                                        <option value="Godina" <?php echo set_select('teessoo', 'Godina', $officer['teessoo'] == 'Godina'); ?>>Zone</option>
                                    </select>
                                </div>
                                
                                <!-- Zone Selection -->
                                <div class="form-group" id="zone_group" 
                                     style="display: <?php echo ($officer['teessoo'] == 'Godina') ? 'block' : 'none'; ?>;">
                                    <label>Zone *</label>
                                    <select class="form-control" name="zone_id" id="zone_id">
                                        <option value="">-- Select Zone --</option>
                                        <?php foreach ($this->b->getzone() as $row): ?>
                                            <option value="<?php echo $row->zname; ?>" 
                                                <?php echo set_select('zone_id', $row->zname, $officer['region'] == $row->zname); ?>>
                                                <?php echo $row->zname; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <!-- City Selection -->
                                <div class="form-group" id="city_group" 
                                     style="display: <?php echo ($officer['teessoo'] == 'Magaaalaa') ? 'block' : 'none'; ?>;">
                                    <label>City *</label>
                                    <select class="form-control" name="city_id" id="city_id">
                                        <option value="">-- Select City --</option>
                                        <?php foreach ($this->b->getcity() as $row): ?>
                                            <option value="<?php echo $row->cname; ?>" 
                                                <?php echo set_select('city_id', $row->cname, $officer['region'] == $row->cname); ?>>
                                                <?php echo $row->cname; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <!-- Position -->
                                <div class="form-group">
                                    <label for="position">የኮራ ድርሻ (Position) *</label>
                                    <input type="text" 
                                           class="form-control" 
                                           id="position" 
                                           name="position" 
                                           value="<?php echo set_value('position', $officer['position']); ?>" 
                                           placeholder="የኮራ ድርሻ አቶምሪኩ"
                                           required>
                                </div>
                                
                                <!-- Current Photo -->
                                <div class="form-group">
                                    <label>Current Photo</label>
                                    <?php if (!empty($officer['photo'])): ?>
                                        <div class="photo-container">
                                            <img src="<?php echo base_url('uploads/officers/' . $officer['photo']); ?>" 
                                                 alt="Current Photo" 
                                                 style="max-width: 150px; max-height: 150px; border: 1px solid #ddd; padding: 5px;">
                                            <span class="photo-label">Current</span>
                                        </div>
                                        <input type="hidden" name="old_photo" value="<?php echo $officer['photo']; ?>">
                                    <?php else: ?>
                                        <div class="no-photo" style="padding: 20px; background: #f8f9fc; border-radius: 4px; border: 1px dashed #d2d6de; text-align: center;">
                                            <i class="fa fa-user-tie fa-2x text-muted"></i>
                                            <p class="text-muted mt-2">No photo uploaded</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                                <!-- New Photo -->
                                <div class="form-group">
                                    <label for="photo">Change Photo (Optional)</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-default btn-file">
                                                <i class="fa fa-folder-open"></i> Browse... 
                                                <input type="file" id="photo" name="photo" accept="image/*">
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" readonly id="photo_filename" placeholder="No file selected">
                                    </div>
                                    <span class="help-block">Leave empty to keep current photo. Allowed: JPG, PNG, GIF. Max size: 2MB</span>
                                    
                                    <!-- New Photo Preview -->
                                    <div class="mt-2" id="photoPreview" style="display: none;">
                                        <h5 style="color: #4e73df; font-size: 13px; margin-bottom: 10px;">
                                            <i class="fa fa-eye"></i> New Photo Preview:
                                        </h5>
                                        <img id="previewImage" src="" alt="Preview" 
                                             style="max-width: 150px; max-height: 150px; border: 1px solid #ddd; padding: 5px;">
                                    </div>
                                </div>
                                
                                <!-- Registration Date -->
                                <div class="form-group">
                                    <label>Registration Date</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" style="background-color: #f8f9fc; border: 1px solid #dddfeb; color: #4e73df;">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="text" 
                                               class="form-control" 
                                               value="<?php echo date('d F Y', strtotime($officer['created_at'])); ?>" 
                                               readonly>
                                    </div>
                                    <small class="form-text text-muted">Original registration date</small>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Form Actions - INDEX STYLE BUTTONS -->
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="box-footer text-center" style="background-color: white; border-top: 1px solid #e3e6f0; padding: 20px; border-radius: 0 0 8px 8px;">
                                    <button type="submit" class="btn btn-primary btn-lg" style="min-width: 200px;">
                                        <i class="fa fa-save"></i> Update Officer
                                    </button>
                                    <button type="reset" class="btn btn-secondary btn-lg" onclick="resetForm()">
                                        <i class="fa fa-refresh"></i> Reset Changes
                                    </button>
                                    <a href="<?php echo site_url('officer'); ?>" class="btn btn-secondary btn-lg">
                                        <i class="fa fa-times"></i> Cancel
                                    </a>
                                    <button type="button" class="btn btn-danger btn-lg pull-right" 
                                            onclick="confirmDelete(<?php echo $officer['id']; ?>, '<?php echo htmlspecialchars(addslashes($officer['full_name'])); ?>')">
                                        <i class="fa fa-trash"></i> Delete Officer
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.content-wrapper {
    background-color: #f8f9fc;
}

.box {
    border-top: 3px solid #4e73df;
    background: #fff;
    margin-bottom: 20px;
    border-radius: 8px;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
}

.box-primary {
    border-top-color: #4e73df;
}

.box-header {
    color: #444;
    display: block;
    padding: 1rem 1.35rem;
    position: relative;
    border-bottom: 1px solid #e3e6f0;
}

.box-header .box-title {
    display: inline-block;
    font-size: 18px;
    margin: 0;
    line-height: 1;
    font-weight: 600;
    color: #4e73df;
}

.box-footer {
    background-color: white;
    border-top: 1px solid #e3e6f0;
    padding: 20px;
    border-radius: 0 0 8px 8px;
}

.callout {
    border-radius: 8px;
    margin: 0 0 20px 0;
    padding: 15px 30px 15px 15px;
    border-left: 5px solid #4e73df;
    background-color: #f0f7ff;
    color: #31708f;
}

.callout-info {
    background-color: #f0f7ff;
    border-color: #4e73df;
}

.form-control {
    border-radius: 4px;
    box-shadow: none;
    border-color: #d2d6de;
    padding: 10px 12px;
    height: auto;
    transition: all 0.2s;
}

.form-control:focus {
    border-color: #4e73df;
    box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
}

.form-control.is-invalid {
    border-color: #e74a3b;
}

.form-control.is-invalid:focus {
    border-color: #e74a3b;
    box-shadow: 0 0 0 0.2rem rgba(231, 74, 59, 0.25);
}

/* LABELS - Brand blue */
label {
    font-weight: 600;
    color: #4e73df;
    margin-bottom: 8px;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

/* INDEX STYLE BUTTONS */
.btn {
    border-radius: 4px;
    font-weight: 500;
    padding: 10px 20px;
    font-size: 14px;
    transition: all 0.2s;
    border: none;
}

.btn-lg {
    padding: 12px 30px;
    font-size: 16px;
}

.btn-sm {
    padding: 6px 12px;
    font-size: 12px;
}

.btn-primary {
    background-color: #4e73df;
    border-color: #4e73df;
    color: white;
}

.btn-primary:hover {
    background-color: #2e59d9;
    border-color: #2653d4;
    transform: translateY(-1px);
    box-shadow: 0 2px 5px rgba(78, 115, 223, 0.3);
}

.btn-secondary {
    background-color: #858796;
    border-color: #858796;
    color: white;
}

.btn-secondary:hover {
    background-color: #717384;
    border-color: #6b6d7d;
    transform: translateY(-1px);
    box-shadow: 0 2px 5px rgba(133, 135, 150, 0.3);
}

.btn-danger {
    background-color: #e74a3b;
    border-color: #e74a3b;
    color: white;
}

.btn-danger:hover {
    background-color: #be2617;
    border-color: #b21f12;
    transform: translateY(-1px);
    box-shadow: 0 2px 5px rgba(231, 74, 59, 0.3);
}

.btn-default {
    background-color: #f8f9fc;
    border: 1px solid #dddfeb;
    color: #4e73df;
}

.btn-default:hover {
    background-color: #eaecf4;
    border-color: #d1d3e2;
}

/* File input button */
.btn-file {
    position: relative;
    overflow: hidden;
    background-color: #f8f9fc;
    border: 1px solid #dddfeb;
    color: #4e73df;
}

.btn-file:hover {
    background-color: #eaecf4;
    border-color: #d1d3e2;
}

.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    opacity: 0;
    outline: none;
    cursor: inherit;
    display: block;
}

/* Select dropdown styling - Brand blue arrow */
select.form-control {
    appearance: none;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3e%3cpath fill='%234e73df' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 0.75rem center;
    background-size: 8px 10px;
    padding-right: 2rem;
}

/* Input group addon */
.input-group-addon {
    background-color: #f8f9fc;
    border: 1px solid #dddfeb;
    color: #4e73df;
    border-radius: 4px 0 0 4px;
}

/* Help text */
.help-block {
    color: #6c757d;
    font-size: 12px;
    margin-top: 5px;
}

/* Photo container */
.photo-container {
    position: relative;
    display: inline-block;
}

.photo-label {
    position: absolute;
    bottom: 5px;
    left: 5px;
    background: rgba(78, 115, 223, 0.9);
    color: white;
    padding: 3px 8px;
    border-radius: 20px;
    font-size: 10px;
    font-weight: 600;
}

/* Photo preview */
#photoPreview {
    margin-top: 15px;
    padding: 15px;
    background: #f8f9fc;
    border-radius: 4px;
    border: 1px solid #e3e6f0;
}

/* Form spacing */
.form-group {
    margin-bottom: 1.2rem;
}

.mt-4 {
    margin-top: 2rem;
}

/* Pull right */
.pull-right {
    float: right;
}

/* Responsive */
@media (max-width: 768px) {
    .btn-lg {
        width: 100%;
        margin-bottom: 10px;
    }
    
    .pull-right {
        float: none;
        width: 100%;
    }
}
</style>

<script>
// Set initial state based on saved location type
document.addEventListener('DOMContentLoaded', function() {
    var teessoo = document.getElementById('teessoo').value;
    toggleLocationType(teessoo);
});

// Toggle location type
function toggleLocationType(type) {
    var zoneGroup = document.getElementById('zone_group');
    var cityGroup = document.getElementById('city_group');
    var zoneSelect = document.getElementById('zone_id');
    var citySelect = document.getElementById('city_id');
    
    if (type === "Godina") {
        zoneGroup.style.display = 'block';
        cityGroup.style.display = 'none';
        zoneSelect.required = true;
        citySelect.required = false;
        citySelect.value = '';
    } else if (type === "Magaaalaa") {
        cityGroup.style.display = 'block';
        zoneGroup.style.display = 'none';
        citySelect.required = true;
        zoneSelect.required = false;
        zoneSelect.value = '';
    } else {
        zoneGroup.style.display = 'none';
        cityGroup.style.display = 'none';
        zoneSelect.required = false;
        citySelect.required = false;
    }
}

// File input change handler with validation
document.getElementById('photo').addEventListener('change', function(e) {
    var file = e.target.files[0];
    var preview = document.getElementById('previewImage');
    var previewDiv = document.getElementById('photoPreview');
    var filenameInput = document.getElementById('photo_filename');
    
    if (file) {
        // Validate file size (2MB max)
        if (file.size > 2 * 1024 * 1024) {
            alert('File size must be less than 2MB');
            this.value = '';
            filenameInput.value = '';
            previewDiv.style.display = 'none';
            return;
        }
        
        // Validate file type
        var validTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!validTypes.includes(file.type)) {
            alert('Only JPG, PNG, and GIF files are allowed');
            this.value = '';
            filenameInput.value = '';
            previewDiv.style.display = 'none';
            return;
        }
        
        var reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            previewDiv.style.display = 'block';
        }
        reader.readAsDataURL(file);
        
        // Update filename
        filenameInput.value = file.name;
    } else {
        previewDiv.style.display = 'none';
        filenameInput.value = '';
    }
});

// Form validation before submit
document.getElementById('officerForm').addEventListener('submit', function(e) {
    var fullName = document.getElementById('full_name').value.trim();
    var sex = document.getElementById('sex').value;
    var teessoo = document.getElementById('teessoo').value;
    var zoneId = document.getElementById('zone_id').value;
    var cityId = document.getElementById('city_id').value;
    var position = document.getElementById('position').value.trim();
    
    var errors = [];
    
    if (!fullName) {
        errors.push('Full Name is required');
        document.getElementById('full_name').classList.add('is-invalid');
    } else {
        document.getElementById('full_name').classList.remove('is-invalid');
    }
    
    if (!sex) {
        errors.push('Sex is required');
        document.getElementById('sex').classList.add('is-invalid');
    } else {
        document.getElementById('sex').classList.remove('is-invalid');
    }
    
    if (!teessoo) {
        errors.push('Location Type is required');
        document.getElementById('teessoo').classList.add('is-invalid');
    } else {
        document.getElementById('teessoo').classList.remove('is-invalid');
    }
    
    if (teessoo === 'Godina' && !zoneId) {
        errors.push('Please select a zone');
        document.getElementById('zone_id').classList.add('is-invalid');
    } else if (teessoo === 'Godina') {
        document.getElementById('zone_id').classList.remove('is-invalid');
    }
    
    if (teessoo === 'Magaaalaa' && !cityId) {
        errors.push('Please select a city');
        document.getElementById('city_id').classList.add('is-invalid');
    } else if (teessoo === 'Magaaalaa') {
        document.getElementById('city_id').classList.remove('is-invalid');
    }
    
    if (!position) {
        errors.push('Position is required');
        document.getElementById('position').classList.add('is-invalid');
    } else {
        document.getElementById('position').classList.remove('is-invalid');
    }
    
    if (errors.length > 0) {
        e.preventDefault();
        alert('Please fix the following errors:\n\n- ' + errors.join('\n- '));
        return false;
    }
    
    // Confirm before updating (only for edit page)
    <?php if ($this->uri->segment(2) == 'edit'): ?>
    if (!confirm('Are you sure you want to update this officer?')) {
        e.preventDefault();
        return false;
    }
    <?php endif; ?>
    
    return true;
});

// Reset form
function resetForm() {
    if (confirm('Are you sure you want to reset the form?')) {
        location.reload();
    }
}

// Delete confirmation
function confirmDelete(id, name) {
    if (confirm('Are you sure you want to delete officer: ' + name + '?\n\nThis action cannot be undone!')) {
        window.location.href = '<?php echo site_url("officer/delete/"); ?>' + id;
    }
}
</script>