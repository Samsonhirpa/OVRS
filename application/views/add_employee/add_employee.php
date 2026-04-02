<div class="content-wrapper" style="background: #f4f6f9;">
    <!-- Content Header -->
    <section class="content-header" style="padding: 15px 20px;">
        <h1 style="font-size: 24px; margin: 0; font-weight: 400;">
            <i class="fa fa-user-plus text-green"></i> Fayyadamaa Haaraa Galmeessi
            <small style="font-size: 14px;">Add New User</small>
        </h1>
        <ol class="breadcrumb" style="padding: 0; margin: 5px 0 0; background: none;">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Dawashii</a></li>
            <li><a href="<?php echo base_url(); ?>userListing">Fayyadamtoota</a></li>
            <li class="active">Haaraa Galmeessi</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="padding: 15px;">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-success" style="border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.08); overflow: hidden;">
                    <div class="box-header with-border" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px 25px;">
                        <h3 class="box-title" style="font-size: 20px; font-weight: 600;">
                            <i class="fa fa-edit"></i> Odeeffannoo Fayyadamaa
                        </h3>
                        <div class="box-tools pull-right">
                            <span class="label" style="background: rgba(255,255,255,0.2); font-size: 12px; padding: 5px 10px;">* Barbaachisaa</span>
                        </div>
                    </div>
                    
                    <form role="form" action="<?php echo base_url('Structure/saveemployee'); ?>" method="post" style="padding: 30px;">
                        <div class="box-body" style="padding: 0;">
                            <!-- Personal Information Section -->
                            <div class="row" style="margin-bottom: 25px;">
                                <div class="col-md-12">
                                    <div class="section-title" style="border-left: 4px solid #667eea; padding-left: 15px; margin-bottom: 20px;">
                                        <h4 style="margin: 0; font-size: 18px; font-weight: 600; color: #333;">
                                            <i class="fa fa-user" style="color: #667eea; margin-right: 8px;"></i> Odeeffannoo Dhuunfaa
                                        </h4>
                                        <p style="margin: 5px 0 0 0; font-size: 12px; color: #777;">Personal Information</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" style="margin-bottom: 20px;">
                                        <label style="font-weight: 600; color: #555; margin-bottom: 8px; display: block;">
                                            Maqaa <span style="color: #dc3545;">*</span>
                                        </label>
                                        <input name="fname" class="form-control modern-input" placeholder="Maqaa keessan galchi" type="text" required style="height: 45px; border-radius: 8px; border: 1px solid #e0e0e0; padding: 0 15px;">
                                    </div>
                                    
                                    <div class="form-group" style="margin-bottom: 20px;">
                                        <label style="font-weight: 600; color: #555; margin-bottom: 8px; display: block;">
                                            Maqaa Abbaa <span style="color: #dc3545;">*</span>
                                        </label>
                                        <input name="middle_name" class="form-control modern-input" placeholder="Maqaa abbaa keessan galchi" type="text" required style="height: 45px; border-radius: 8px; border: 1px solid #e0e0e0; padding: 0 15px;">
                                    </div>
                                    
                                    <div class="form-group" style="margin-bottom: 20px;">
                                        <label style="font-weight: 600; color: #555; margin-bottom: 8px; display: block;">
                                            Maqaa Akaakayu <span style="color: #dc3545;">*</span>
                                        </label>
                                        <input name="lname" class="form-control modern-input" placeholder="Maqaa akaakayu keessan galchi" type="text" required style="height: 45px; border-radius: 8px; border: 1px solid #e0e0e0; padding: 0 15px;">
                                    </div>
                                    
                                    <div class="form-group" style="margin-bottom: 20px;">
                                        <label style="font-weight: 600; color: #555; margin-bottom: 8px; display: block;">
                                            Saala <span style="color: #dc3545;">*</span>
                                        </label>
                                        <select class="form-control modern-select" name="sex" required style="height: 45px; border-radius: 8px; border: 1px solid #e0e0e0; padding: 0 15px;">
                                            <option value="">-- Saala Filadhu --</option>
                                            <?php foreach ($this->str->getGender() as $row): ?>
                                                <option value="<?php echo $row->gender_id; ?>"><?php echo $row->gender_name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group" style="margin-bottom: 20px;">
                                        <label style="font-weight: 600; color: #555; margin-bottom: 8px; display: block;">
                                            Guyyaa Hojii Eegale
                                        </label>
                                        <input name="dob" class="form-control modern-input" placeholder="Guyyaa dhaloota" type="date" value="<?php echo date('Y-m-d'); ?>" style="height: 45px; border-radius: 8px; border: 1px solid #e0e0e0; padding: 0 15px;">
                                    </div>
                                    
                                    <div class="form-group" style="margin-bottom: 20px;">
                                        <label style="font-weight: 600; color: #555; margin-bottom: 8px; display: block;">
                                            Email
                                        </label>
                                        <div class="input-group" style="border-radius: 8px; overflow: hidden;">
                                            <span class="input-group-addon" style="background: #f8f9fa; border: 1px solid #e0e0e0; border-right: none;">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <input name="email" class="form-control" placeholder="email@example.com" type="email" style="height: 45px; border: 1px solid #e0e0e0; border-left: none;">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group" style="margin-bottom: 20px;">
                                        <label style="font-weight: 600; color: #555; margin-bottom: 8px; display: block;">
                                            Bilbila <span style="color: #dc3545;">*</span>
                                        </label>
                                        <div class="input-group" style="border-radius: 8px; overflow: hidden;">
                                            <span class="input-group-addon" style="background: #f8f9fa; border: 1px solid #e0e0e0; border-right: none;">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <input name="phoneno" class="form-control" placeholder="09xxxxxxxx" type="text" required style="height: 45px; border: 1px solid #e0e0e0; border-left: none;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Account Information Section -->
                            <div class="row" style="margin-top: 30px; margin-bottom: 25px;">
                                <div class="col-md-12">
                                    <div class="section-title" style="border-left: 4px solid #667eea; padding-left: 15px; margin-bottom: 20px;">
                                        <h4 style="margin: 0; font-size: 18px; font-weight: 600; color: #333;">
                                            <i class="fa fa-lock" style="color: #667eea; margin-right: 8px;"></i> Odeeffannoo Herregaa
                                        </h4>
                                        <p style="margin: 5px 0 0 0; font-size: 12px; color: #777;">Account Information</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" style="margin-bottom: 20px;">
                                        <label style="font-weight: 600; color: #555; margin-bottom: 8px; display: block;">
                                            Maqaa Herregaa <span style="color: #dc3545;">*</span>
                                        </label>
                                        <div class="input-group" style="border-radius: 8px; overflow: hidden;">
                                            <span class="input-group-addon" style="background: #f8f9fa; border: 1px solid #e0e0e0; border-right: none;">
                                                <i class="fa fa-user-circle"></i>
                                            </span>
                                            <input name="username" class="form-control" placeholder="Maqaa herregaa" type="text" required style="height: 45px; border: 1px solid #e0e0e0; border-left: none;">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group" style="margin-bottom: 20px;">
                                        <label style="font-weight: 600; color: #555; margin-bottom: 8px; display: block;">
                                            Jecha Darbii <span style="color: #dc3545;">*</span>
                                        </label>
                                        <div class="input-group" style="border-radius: 8px; overflow: hidden;">
                                            <span class="input-group-addon" style="background: #f8f9fa; border: 1px solid #e0e0e0; border-right: none;">
                                                <i class="fa fa-key"></i>
                                            </span>
                                            <input name="password" class="form-control" placeholder="Jecha darbii" type="password" required style="height: 45px; border: 1px solid #e0e0e0; border-left: none;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Role Section -->
                            <div class="row" style="margin-top: 30px; margin-bottom: 25px;">
                                <div class="col-md-12">
                                    <div class="section-title" style="border-left: 4px solid #667eea; padding-left: 15px; margin-bottom: 20px;">
                                        <h4 style="margin: 0; font-size: 18px; font-weight: 600; color: #333;">
                                            <i class="fa fa-sitemap" style="color: #667eea; margin-right: 8px;"></i> Gahee fi Teessoo
                                        </h4>
                                        <p style="margin: 5px 0 0 0; font-size: 12px; color: #777;">Role & Location Information</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" style="margin-bottom: 20px;">
                                        <label style="font-weight: 600; color: #555; margin-bottom: 8px; display: block;">
                                            Gahee <span style="color: #dc3545;">*</span>
                                        </label>
                                        <select name="role" class="form-control modern-select" id="roleSelect" required onchange="toggleVotingRegion()" style="height: 45px; border-radius: 8px; border: 1px solid #e0e0e0;">
                                            <option value="">-- Gahee Filadhu --</option>
                                            <?php foreach ($this->str->getRole() as $row): ?>
                                                <option value="<?php echo $row->role_id; ?>"><?php echo $row->role_name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group" style="margin-bottom: 20px;">
                                        <label style="font-weight: 600; color: #555; margin-bottom: 8px; display: block;">
                                            Teessoo <span style="color: #dc3545;">*</span>
                                        </label>
                                        <select class="form-control modern-select" id="locationType" name="location_type" required onchange="toggleLocationType()" style="height: 45px; border-radius: 8px; border: 1px solid #e0e0e0;">
                                            <option value="">-- Teessoo Filadhu --</option>
                                            <option value="Magaaalaa">🏙️ Magaalaa</option>
                                            <option value="Godina">🌄 Godina</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Voting Region Field -->
                            <div class="row" id="votingRegionRow" style="display: none; margin-top: 15px;">
                                <div class="col-md-12">
                                    <div class="alert alert-info" style="background: linear-gradient(135deg, #e3f2fd 0%, #f3e5f5 100%); border: none; border-radius: 10px; margin-bottom: 15px; padding: 15px;">
                                        <i class="fa fa-info-circle" style="font-size: 18px;"></i> 
                                        <strong>Naannoo Filannoo:</strong> Gahee kanaaf maqaa naannoo filannoo galchi
                                    </div>
                                </div>
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group" style="margin-bottom: 20px;">
                                        <label style="font-weight: 600; color: #555; margin-bottom: 8px; display: block;">
                                            Maqaa Naannoo Filannoo <span style="color: #dc3545;">*</span>
                                        </label>
                                        <div class="input-group" style="border-radius: 8px; overflow: hidden;">
                                            <span class="input-group-addon" style="background: #f8f9fa; border: 1px solid #e0e0e0;">
                                                <i class="fa fa-map-marker"></i>
                                            </span>
                                            <input type="text" name="naannoofil" id="votingRegionInput" class="form-control" placeholder="Maqaa Naannoo Filannoo galchi" disabled style="height: 45px; border: 1px solid #e0e0e0;">
                                        </div>
                                        <small class="text-muted" style="display: block; margin-top: 5px;">
                                            <i class="fa fa-question-circle"></i> Fayyadamaan kun naannoo filannoo kamirratti hojjeta?
                                        </small>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Beautiful Location Fields - Godina and Magaalaa -->
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-12">
                                    <div class="location-card" style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); border-radius: 12px; padding: 20px; border: 1px solid #e0e0e0;">
                                        <div style="margin-bottom: 15px;">
                                            <i class="fa fa-map-marker" style="color: #667eea; font-size: 18px;"></i>
                                            <strong style="margin-left: 8px; font-size: 16px; color: #333;">Teessoo Filannoo</strong>
                                        </div>
                                        
                                        <!-- Godina Field -->
                                        <div id="godinaField" style="display: none;">
                                            <div class="form-group" style="margin-bottom: 0;">
                                                <label style="font-weight: 600; color: #555; margin-bottom: 10px; display: block;">
                                                    <i class="fa fa-globe" style="color: #667eea; margin-right: 5px;"></i> 
                                                    Godina <span style="color: #dc3545;">*</span>
                                                </label>
                                                <select name="zone" id="zone" class="form-control location-select" style="height: 48px; border-radius: 10px; border: 2px solid #e0e0e0; padding: 0 15px; font-size: 14px; transition: all 0.3s;">
                                                    <option value="">-- Godina Filadhu --</option>
                                                    <?php foreach($this->str->getzone() as $row): ?>
                                                        <option value="<?php echo $row->zid; ?>"><?php echo $row->zname; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <small class="text-muted" style="display: block; margin-top: 5px;">
                                                    <i class="fa fa-info-circle"></i> Godina fayyadamaan hojjetu filadhu
                                                </small>
                                            </div>
                                        </div>
                                        
                                        <!-- Magaalaa Field -->
                                        <div id="magaalaaField" style="display: none;">
                                            <div class="form-group" style="margin-bottom: 0;">
                                                <label style="font-weight: 600; color: #555; margin-bottom: 10px; display: block;">
                                                    <i class="fa fa-building" style="color: #667eea; margin-right: 5px;"></i> 
                                                    Magaalaa <span style="color: #dc3545;">*</span>
                                                </label>
                                                <select name="magala_id" id="city" class="form-control location-select" style="height: 48px; border-radius: 10px; border: 2px solid #e0e0e0; padding: 0 15px; font-size: 14px; transition: all 0.3s;">
                                                    <option value="">-- Magaalaa Filadhu --</option>
                                                    <?php foreach($this->str->getcity() as $row): ?>
                                                        <option value="<?php echo $row->cid; ?>"><?php echo $row->cname; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <small class="text-muted" style="display: block; margin-top: 5px;">
                                                    <i class="fa fa-info-circle"></i> Magaalaa fayyadamaan jiraatu filadhu
                                                </small>
                                            </div>
                                        </div>
                                        
                                        <!-- Placeholder when no location type selected -->
                                        <div id="locationPlaceholder" style="text-align: center; padding: 30px 20px; color: #999;">
                                            <i class="fa fa-map-marker" style="font-size: 48px; margin-bottom: 15px; opacity: 0.3;"></i>
                                            <p>Akkamitti teessoo filachuuf, sadarkaa teessoo olii irraa filadhu</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Form Footer -->
                        <div class="box-footer" style="background: #f8f9fa; padding: 20px 30px; margin-top: 30px; border-radius: 0 0 10px 10px;">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success" style="padding: 10px 40px; font-weight: 600; border-radius: 8px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; min-width: 150px;">
                                        <i class="fa fa-save"></i> Galmeessi
                                    </button>
                                    <button type="reset" class="btn btn-warning" style="padding: 10px 40px; margin-left: 12px; font-weight: 600; border-radius: 8px; background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); border: none; min-width: 150px;">
                                        <i class="fa fa-undo"></i> Irra Deebi'i
                                    </button>
                                    <a href="<?php echo base_url(); ?>userListing" class="btn btn-default" style="padding: 10px 40px; margin-left: 12px; font-weight: 600; border-radius: 8px; background: #6c757d; color: white; border: none; min-width: 150px;">
                                        <i class="fa fa-times"></i> Haqi
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- JavaScript -->
<script type="text/javascript">
    function toggleVotingRegion() {
        var roleSelect = document.getElementById('roleSelect');
        var votingRegionRow = document.getElementById('votingRegionRow');
        var votingRegionInput = document.getElementById('votingRegionInput');
        
        if(roleSelect.value == '3') {
            votingRegionRow.style.display = 'block';
            votingRegionInput.disabled = false;
            votingRegionInput.setAttribute('required', 'required');
        } else {
            votingRegionRow.style.display = 'none';
            votingRegionInput.disabled = true;
            votingRegionInput.removeAttribute('required');
            votingRegionInput.value = '';
        }
    }

    function toggleLocationType() {
        var locationType = document.getElementById('locationType').value;
        var godinaField = document.getElementById('godinaField');
        var magaalaaField = document.getElementById('magaalaaField');
        var locationPlaceholder = document.getElementById('locationPlaceholder');
        var zoneSelect = document.getElementById('zone');
        var citySelect = document.getElementById('city');
        
        // Hide all fields and placeholder
        godinaField.style.display = 'none';
        magaalaaField.style.display = 'none';
        locationPlaceholder.style.display = 'none';
        
        // Remove required attributes
        zoneSelect.removeAttribute('required');
        citySelect.removeAttribute('required');
        
        // Show selected location type
        if (locationType == "Godina") {
            godinaField.style.display = 'block';
            zoneSelect.setAttribute('required', 'required');
            godinaField.style.animation = 'slideDown 0.3s ease';
        } else if (locationType == "Magaaalaa") {
            magaalaaField.style.display = 'block';
            citySelect.setAttribute('required', 'required');
            magaalaaField.style.animation = 'slideDown 0.3s ease';
        } else {
            locationPlaceholder.style.display = 'block';
        }
    }

    // Add animation styles
    var style = document.createElement('style');
    style.textContent = `
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .modern-input:focus, .modern-select:focus, .location-select:focus {
            border-color: #667eea !important;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1) !important;
            outline: none;
        }
        
        .location-select:hover {
            border-color: #667eea !important;
        }
        
        .location-card {
            transition: all 0.3s ease;
        }
        
        .location-card:hover {
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transform: translateY(-2px);
        }
        
        .btn {
            transition: all 0.3s ease;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        
        .section-title {
            transition: all 0.3s ease;
        }
        
        .form-control, .modern-select {
            transition: all 0.3s ease;
        }
    `;
    document.head.appendChild(style);
</script>

<!-- Additional Styling -->
<style>
    .form-group {
        margin-bottom: 20px;
    }
    
    .modern-input, .modern-select {
        transition: all 0.3s ease;
    }
    
    .modern-input:focus, .modern-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    
    .location-card {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border-radius: 12px;
        padding: 20px;
        border: 1px solid #e0e0e0;
        transition: all 0.3s ease;
    }
    
    .location-card:hover {
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }
    
    .btn {
        transition: all 0.3s ease;
    }
    
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    #godinaField, #magaalaaField {
        animation: fadeIn 0.3s ease;
    }
    
    .alert-info {
        border-left: 4px solid #667eea;
    }
</style>