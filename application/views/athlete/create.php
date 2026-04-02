<!-- athlete/create.php -->
<div class="content-wrapper">
    <section class="content" style="min-height: 526px;">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <i class="fa fa-user-plus"></i> <?php echo $title; ?>
                        </h3>
                        <div class="box-tools pull-right">
                            <a href="<?php echo site_url('athlete'); ?>" class="btn btn-sm btn-default">
                                <i class="fa fa-arrow-left"></i> Back to List
                            </a>
                        </div>
                    </div>
                    
                    <div class="box-body">
                        <?php echo form_open_multipart('athlete/create', ['id' => 'athleteForm']); ?>
                        
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
                                <i class="fa fa-info-circle"></i> Athlete Information
                            </h4>
                            <p>Please fill in all required fields marked with *</p>
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
                                           value="<?php echo set_value('full_name'); ?>" 
                                           placeholder="Enter full name"
                                           required>
                                </div>
                                
                                <!-- Sex -->
                                <div class="form-group">
                                    <label for="sex">Sex *</label>
                                    <select class="form-control" id="sex" name="sex" required>
                                        <option value="">Select Sex</option>
                                        <option value="Male" <?php echo set_select('sex', 'Male'); ?>>Male</option>
                                        <option value="Female" <?php echo set_select('sex', 'Female'); ?>>Female</option>
                                        <option value="Other" <?php echo set_select('sex', 'Other'); ?>>Other</option>
                                    </select>
                                </div>
                                
                                <!-- Age -->
                                <div class="form-group">
                                    <label for="age">Age *</label>
                                    <input type="number" 
                                           class="form-control" 
                                           id="age" 
                                           name="age" 
                                           value="<?php echo set_value('age'); ?>" 
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
                                        <option value="Magaaalaa" <?php echo set_select('teessoo', 'Magaaalaa'); ?>>City</option>
                                        <option value="Godina" <?php echo set_select('teessoo', 'Godina'); ?>>Zone</option>
                                    </select>
                                </div>
                                
                                <!-- Zone Selection -->
                                <div class="form-group" id="zone_group" 
                                     style="display: <?php echo set_select('teessoo', 'Godina') ? 'block' : 'none'; ?>;">
                                    <label>Zone *</label>
                                    <select class="form-control" name="zone_id" id="zone_id">
                                        <option value="">-- Select Zone --</option>
                                        <?php foreach ($this->b->getzone() as $row): ?>
                                            <option value="<?php echo $row->zname; ?>" <?php echo set_select('zone_id', $row->zname); ?>>
                                                <?php echo $row->zname; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <!-- City Selection -->
                                <div class="form-group" id="city_group" 
                                     style="display: <?php echo set_select('teessoo', 'Magaaalaa') ? 'block' : 'none'; ?>;">
                                    <label>City *</label>
                                    <select class="form-control" name="city_id" id="city_id">
                                        <option value="">-- Select City --</option>
                                        <?php foreach ($this->b->getcity() as $row): ?>
                                            <option value="<?php echo $row->cname; ?>" <?php echo set_select('city_id', $row->cname); ?>>
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
                                            <option value="Qillee" <?php echo set_select('sport', 'Qillee'); ?>>Qillee</option>
                                            <option value="Wallaansoo" <?php echo set_select('sport', 'Wallaansoo'); ?>>Wallaansoo</option>
                                            <option value="Qastii/xiyyaa" <?php echo set_select('sport', 'Qastii/xiyyaa'); ?>>Qastii/xiyyaa</option>
                                            <option value="Qast wal makaa" <?php echo set_select('sport', 'Qast wal makaa'); ?>>Qast wal makaa</option>
                                        </optgroup>
                                        <optgroup label="Horse Sports">
                                            <option value="Korboo Qeenxee" <?php echo set_select('sport', 'Korboo Qeenxee'); ?>>Korboo Qeenxee</option>
                                            <option value="Korboo wal_makaa" <?php echo set_select('sport', 'Korboo wal_makaa'); ?>>Korboo wal_makaa</option>
                                            <option value="Saddeqaa abba 12" <?php echo set_select('sport', 'Saddeqaa abba 12'); ?>>Saddeqaa abba 12</option>
                                            <option value="Saddeqaa abba 18" <?php echo set_select('sport', 'Saddeqaa abba 18'); ?>>Saddeqaa abba 18</option>
                                            <option value="Gugsii fardaa" <?php echo set_select('sport', 'Gugsii fardaa'); ?>>Gugsii fardaa</option>
                                            <option value="Gulufaa fardaa" <?php echo set_select('sport', 'Gulufaa fardaa'); ?>>Gulufaa fardaa</option>
                                        </optgroup>
                                        <optgroup label="Other Sports">
                                            <option value="Shaah" <?php echo set_select('sport', 'Shaah'); ?>>Shaah</option>
                                            <option value="Buub" <?php echo set_select('sport', 'Buub'); ?>>Buub</option>
                                            <option value="Feestivaalaa agarsiisa aadaa" <?php echo set_select('sport', 'Feestivaalaa agarsiisa aadaa'); ?>>Feestivaalaa agarsiisa aadaa</option>
                                        </optgroup>
                                    </select>
                                    <span class="help-block">Select the sport discipline</span>
                                </div>
                                
                                <!-- Photo -->
                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-default btn-file">
                                                Browse... <input type="file" id="photo" name="photo" accept="image/*">
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" readonly id="photo_filename">
                                    </div>
                                    <span class="help-block">Allowed: JPG, PNG, GIF. Max size: 2MB</span>
                                    
                                    <!-- Photo Preview -->
                                    <div class="mt-2" id="photoPreview" style="display: none;">
                                        <img id="previewImage" src="" alt="Preview" 
                                             style="max-width: 150px; max-height: 150px; border: 1px solid #ddd; padding: 5px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Submit Button - INDEX STYLE BLUE BUTTON -->
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fa fa-save"></i> Register Athlete
                            </button>
                            <button type="reset" class="btn btn-secondary btn-lg" onclick="resetForm()">
                                <i class="fa fa-refresh"></i> Reset
                            </button>
                            <a href="<?php echo site_url('athlete'); ?>" class="btn btn-secondary btn-lg">
                                <i class="fa fa-times"></i> Cancel
                            </a>
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

/* INDEX STYLE BUTTONS */
.btn {
    border-radius: 4px;
    font-weight: 500;
    padding: 10px 20px;
    font-size: 14px;
    transition: all 0.2s;
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
}

.btn-secondary {
    background-color: #858796;
    border-color: #858796;
    color: white;
}

.btn-secondary:hover {
    background-color: #717384;
    border-color: #6b6d7d;
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

.btn-file {
    position: relative;
    overflow: hidden;
    background-color: #f8f9fc;
    border-color: #dddfeb;
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

/* Select dropdown styling */
select.form-control {
    appearance: none;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3e%3cpath fill='%234e73df' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 0.75rem center;
    background-size: 8px 10px;
    padding-right: 2rem;
}

/* Optgroup styling */
select.form-control optgroup {
    font-weight: 600;
    color: #4e73df;
    background-color: #f8f9fc;
}

select.form-control option {
    padding: 8px;
    color: #333;
}

/* Help text */
.help-block {
    color: #6c757d;
    font-size: 12px;
    margin-top: 5px;
}

/* Photo preview */
#photoPreview {
    margin-top: 10px;
    padding: 10px;
    background: #f8f9fc;
    border-radius: 4px;
    border: 1px solid #e3e6f0;
}

/* Form spacing */
.form-group {
    margin-bottom: 1.2rem;
}

label {
    font-weight: 600;
    color: #4e73df;
    margin-bottom: 8px;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

/* Responsive */
@media (max-width: 768px) {
    .btn-lg {
        width: 100%;
        margin-bottom: 10px;
    }
    
    .btn-group {
        display: block;
    }
    
    .btn {
        margin-bottom: 5px;
    }
}
</style>

<!-- JavaScript -->
<script>
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
    
    return true;
});

// Reset form
function resetForm() {
    if (confirm('Are you sure you want to reset the form?')) {
        document.getElementById('zone_group').style.display = 'none';
        document.getElementById('city_group').style.display = 'none';
        document.getElementById('photoPreview').style.display = 'none';
        document.getElementById('photo_filename').value = '';
        document.getElementById('photo').value = '';
        
        document.getElementById('zone_id').required = false;
        document.getElementById('city_id').required = false;
    }
}
</script>