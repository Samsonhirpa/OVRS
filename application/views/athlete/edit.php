<!-- athlete/edit.php -->
<div class="content-wrapper">
    <section class="content" style="min-height: 526px;">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <i class="fa fa-edit"></i> Edit Athlete
                        </h3>
                        <div class="box-tools pull-right">
                            <a href="<?php echo site_url('athlete'); ?>" class="btn btn-sm btn-default">
                                <i class="fa fa-arrow-left"></i> Back to List
                            </a>
                        </div>
                    </div>
                    
                    <div class="box-body">
                        <?php echo form_open_multipart('athlete/update/' . $athlete['id'], ['id' => 'athleteForm']); ?>
                        
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
                                <i class="fa fa-info-circle"></i> Edit Athlete Information
                            </h4>
                            <p>Update athlete details below</p>
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
                                           value="<?php echo set_value('full_name', $athlete['full_name']); ?>" 
                                           placeholder="Enter full name"
                                           required>
                                </div>
                                
                                <!-- Sex -->
                                <div class="form-group">
                                    <label for="sex">Sex *</label>
                                    <select class="form-control" id="sex" name="sex" required>
                                        <option value="">Select Sex</option>
                                        <option value="Male" <?php echo set_select('sex', 'Male', $athlete['sex'] == 'Male'); ?>>Male</option>
                                        <option value="Female" <?php echo set_select('sex', 'Female', $athlete['sex'] == 'Female'); ?>>Female</option>
                                        <option value="Other" <?php echo set_select('sex', 'Other', $athlete['sex'] == 'Other'); ?>>Other</option>
                                    </select>
                                </div>
                                
                                <!-- Age -->
                                <div class="form-group">
                                    <label for="age">Age *</label>
                                    <input type="number" 
                                           class="form-control" 
                                           id="age" 
                                           name="age" 
                                           value="<?php echo set_value('age', $athlete['age']); ?>" 
                                           placeholder="Enter age"
                                           min="13" 
                                           max="59" 
                                           required>
                                    <span class="help-block">Age must be between 13 and 59</span>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <!-- Location Type -->
                                <div class="form-group">
                                    <label>Location Type *</label>
                                    <select class="form-control" name="teessoo" id="teessoo" required 
                                            onchange="toggleLocationType(this.value)">
                                        <option value="">-- Select Location Type --</option>
                                        <option value="Magaaalaa" <?php echo set_select('teessoo', 'Magaaalaa', $athlete['teessoo'] == 'Magaaalaa'); ?>>City</option>
                                        <option value="Godina" <?php echo set_select('teessoo', 'Godina', $athlete['teessoo'] == 'Godina'); ?>>Zone</option>
                                    </select>
                                </div>
                                
                                <!-- Zone Selection -->
                                <div class="form-group" id="zone_group" 
                                     style="display: <?php echo ($athlete['teessoo'] == 'Godina') ? 'block' : 'none'; ?>;">
                                    <label>Zone *</label>
                                    <select class="form-control" name="zone_id" id="zone_id">
                                        <option value="">-- Select Zone --</option>
                                        <?php foreach ($this->b->getzone() as $row): ?>
                                            <option value="<?php echo $row->zname; ?>" 
                                                <?php echo set_select('zone_id', $row->zname, $athlete['region'] == $row->zname); ?>>
                                                <?php echo $row->zname; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <!-- City Selection -->
                                <div class="form-group" id="city_group" 
                                     style="display: <?php echo ($athlete['teessoo'] == 'Magaaalaa') ? 'block' : 'none'; ?>;">
                                    <label>City *</label>
                                    <select class="form-control" name="city_id" id="city_id">
                                        <option value="">-- Select City --</option>
                                        <?php foreach ($this->b->getcity() as $row): ?>
                                            <option value="<?php echo $row->cname; ?>" 
                                                <?php echo set_select('city_id', $row->cname, $athlete['region'] == $row->cname); ?>>
                                                <?php echo $row->cname; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <!-- Sport - CLEAN SINGLE SELECT WITHOUT NUMBERS -->
                                <div class="form-group">
                                    <label for="sport">Sport *</label>
                                    <select class="form-control" id="sport" name="sport" required>
                                        <option value="">-- Select Sport --</option>
                                        <optgroup label="Traditional Sports">
                                            <option value="Qillee" <?php echo set_select('sport', 'Qillee', $athlete['sport'] == 'Qillee'); ?>>Qillee</option>
                                            <option value="Wallaansoo" <?php echo set_select('sport', 'Wallaansoo', $athlete['sport'] == 'Wallaansoo'); ?>>Wallaansoo</option>
                                            <option value="Qastii/xiyyaa" <?php echo set_select('sport', 'Qastii/xiyyaa', $athlete['sport'] == 'Qastii/xiyyaa'); ?>>Qastii/xiyyaa</option>
                                            <option value="Qast wal makaa" <?php echo set_select('sport', 'Qast wal makaa', $athlete['sport'] == 'Qast wal makaa'); ?>>Qast wal makaa</option>
                                        </optgroup>
                                        <optgroup label="Horse Sports">
                                            <option value="Korboo Qeenxee" <?php echo set_select('sport', 'Korboo Qeenxee', $athlete['sport'] == 'Korboo Qeenxee'); ?>>Korboo Qeenxee</option>
                                            <option value="Korboo wal_makaa" <?php echo set_select('sport', 'Korboo wal_makaa', $athlete['sport'] == 'Korboo wal_makaa'); ?>>Korboo wal_makaa</option>
                                            <option value="Saddeqaa abba 12" <?php echo set_select('sport', 'Saddeqaa abba 12', $athlete['sport'] == 'Saddeqaa abba 12'); ?>>Saddeqaa abba 12</option>
                                            <option value="Saddeqaa abba 18" <?php echo set_select('sport', 'Saddeqaa abba 18', $athlete['sport'] == 'Saddeqaa abba 18'); ?>>Saddeqaa abba 18</option>
                                            <option value="Gugsii fardaa" <?php echo set_select('sport', 'Gugsii fardaa', $athlete['sport'] == 'Gugsii fardaa'); ?>>Gugsii fardaa</option>
                                            <option value="Gulufaa fardaa" <?php echo set_select('sport', 'Gulufaa fardaa', $athlete['sport'] == 'Gulufaa fardaa'); ?>>Gulufaa fardaa</option>
                                        </optgroup>
                                        <optgroup label="Other Sports">
                                            <option value="Shaah" <?php echo set_select('sport', 'Shaah', $athlete['sport'] == 'Shaah'); ?>>Shaah</option>
                                            <option value="Buub" <?php echo set_select('sport', 'Buub', $athlete['sport'] == 'Buub'); ?>>Buub</option>
                                            <option value="Feestivaalaa agarsiisa aadaa" <?php echo set_select('sport', 'Feestivaalaa agarsiisa aadaa', $athlete['sport'] == 'Feestivaalaa agarsiisa aadaa'); ?>>Feestivaalaa agarsiisa aadaa</option>
                                        </optgroup>
                                    </select>
                                    <span class="help-block">Select the sport discipline</span>
                                </div>
                                
                                <!-- Current Photo -->
                                <div class="form-group">
                                    <label>Current Photo</label>
                                    <?php if (!empty($athlete['photo'])): ?>
                                        <div class="photo-container">
                                            <img src="<?php echo base_url('uploads/athletes/' . $athlete['photo']); ?>" 
                                                 alt="<?php echo htmlspecialchars($athlete['full_name']); ?>"
                                                 class="current-photo">
                                            <span class="photo-label">Current Photo</span>
                                        </div>
                                        <input type="hidden" name="old_photo" value="<?php echo $athlete['photo']; ?>">
                                    <?php else: ?>
                                        <div class="alert alert-info">
                                            <i class="fa fa-info-circle"></i> No photo uploaded yet
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
                                        <div class="preview-container">
                                            <h5>New Photo Preview:</h5>
                                            <img id="previewImage" src="" alt="Preview" class="preview-image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Form Actions - INDEX STYLE BUTTONS -->
                        <div class="form-group mt-4">
                            <div class="action-buttons">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fa fa-save"></i> Update Athlete
                                </button>
                                <button type="reset" class="btn btn-secondary btn-lg" onclick="resetForm()">
                                    <i class="fa fa-refresh"></i> Reset Changes
                                </button>
                                <a href="<?php echo site_url('athlete'); ?>" class="btn btn-secondary btn-lg">
                                    <i class="fa fa-times"></i> Cancel
                                </a>
                                <button type="button" class="btn btn-danger btn-lg pull-right" 
                                        onclick="confirmDelete(<?php echo $athlete['id']; ?>, '<?php echo htmlspecialchars(addslashes($athlete['full_name'])); ?>')">
                                    <i class="fa fa-trash"></i> Delete Athlete
                                </button>
                            </div>
                        </div>
                        
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Styles - Matching Index Page -->
<style>
/* Main Background */
.content-wrapper {
    background-color: #f8f9fc;
}

/* Box Styling */
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

/* Callout Styling - Keep original label colors */
.callout {
    border-radius: 8px;
    margin: 0 0 20px 0;
    padding: 15px 30px 15px 15px;
    border-left: 5px solid #4e73df;
}

.callout-info {
    background-color: #f0f7ff;
    border-color: #4e73df;
    color: #31708f;
}

/* Form Controls - Keep original label colors */
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

/* Labels - Keep original colors */
label {
    font-weight: 600;
    color: #495057;
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
    border-color: #dddfeb;
    color: #4e73df;
}

.btn-default:hover {
    background-color: #eaecf4;
    border-color: #d1d3e2;
}

/* File Input Styling */
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

/* Select Dropdown Styling */
select.form-control {
    appearance: none;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3e%3cpath fill='%234e73df' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 0.75rem center;
    background-size: 8px 10px;
    padding-right: 2rem;
}

/* Optgroup Styling */
select.form-control optgroup {
    font-weight: 600;
    color: #4e73df;
    background-color: #f8f9fc;
    padding: 8px 0;
}

select.form-control option {
    padding: 8px 12px;
    color: #333;
}

/* Help Text */
.help-block {
    color: #6c757d;
    font-size: 12px;
    margin-top: 5px;
}

/* Photo Styling */
.photo-container {
    position: relative;
    display: inline-block;
    max-width: 150px;
}

.current-photo {
    max-width: 150px;
    max-height: 150px;
    border: 3px solid #fff;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
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

/* Preview Container */
.preview-container {
    padding: 15px;
    background: #f8f9fc;
    border-radius: 8px;
    border: 1px solid #e3e6f0;
}

.preview-image {
    max-width: 150px;
    max-height: 150px;
    border: 3px solid #fff;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

/* Alert Styling */
.alert-info {
    background-color: #f0f7ff;
    border-color: #b8e1f0;
    color: #31708f;
    border-radius: 8px;
}

/* Action Buttons Container */
.action-buttons {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}

.pull-right {
    margin-left: auto;
}

/* Form Spacing */
.form-group {
    margin-bottom: 1.2rem;
}

.mt-4 {
    margin-top: 2rem;
}

.mt-2 {
    margin-top: 1rem;
}

/* Responsive */
@media (max-width: 768px) {
    .btn-lg {
        width: 100%;
        margin-bottom: 10px;
    }
    
    .action-buttons {
        flex-direction: column;
    }
    
    .pull-right {
        margin-left: 0;
        width: 100%;
    }
    
    .btn {
        width: 100%;
    }
}
</style>

<!-- JavaScript -->
<script>
// Set initial state based on saved location type
document.addEventListener('DOMContentLoaded', function() {
    var teessoo = document.getElementById('teessoo').value;
    toggleLocationType(teessoo);
});

// Toggle location type with animation
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
        
        // Smooth animation
        $(zoneGroup).hide().slideDown(300);
        
    } else if (type === "Magaaalaa") {
        cityGroup.style.display = 'block';
        zoneGroup.style.display = 'none';
        citySelect.required = true;
        zoneSelect.required = false;
        zoneSelect.value = '';
        
        // Smooth animation
        $(cityGroup).hide().slideDown(300);
        
    } else {
        $(zoneGroup).slideUp(300);
        $(cityGroup).slideUp(300);
        zoneSelect.required = false;
        citySelect.required = false;
    }
}

// File input change handler
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
            $(previewDiv).hide().slideDown(300);
        }
        reader.readAsDataURL(file);
        
        // Update filename
        filenameInput.value = file.name;
    } else {
        $(previewDiv).slideUp(300);
        filenameInput.value = '';
    }
});

// Form validation before submit
document.getElementById('athleteForm').addEventListener('submit', function(e) {
    var fullName = document.getElementById('full_name').value.trim();
    var sex = document.getElementById('sex').value;
    var age = document.getElementById('age').value;
    var teessoo = document.getElementById('teessoo').value;
    var zoneId = document.getElementById('zone_id').value;
    var cityId = document.getElementById('city_id').value;
    var sport = document.getElementById('sport').value;
    
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
    
    if (!age) {
        errors.push('Age is required');
        document.getElementById('age').classList.add('is-invalid');
    } else {
        document.getElementById('age').classList.remove('is-invalid');
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
    
    if (!sport) {
        errors.push('Please select a sport');
        document.getElementById('sport').classList.add('is-invalid');
    } else {
        document.getElementById('sport').classList.remove('is-invalid');
    }
    
    if (errors.length > 0) {
        e.preventDefault();
        alert('Please fix the following errors:\n\n- ' + errors.join('\n- '));
        return false;
    }
    
    // Confirm before updating
    if (!confirm('Are you sure you want to update this athlete?')) {
        e.preventDefault();
        return false;
    }
    
    return true;
});

// Reset form to original values
function resetForm() {
    if (confirm('Reset all changes to original values?')) {
        location.reload();
    }
}

// Delete confirmation
function confirmDelete(id, name) {
    if (confirm('Are you sure you want to delete athlete: ' + name + '?\n\nThis action cannot be undone!')) {
        window.location.href = '<?php echo site_url("athlete/delete/"); ?>' + id;
    }
}
</script>