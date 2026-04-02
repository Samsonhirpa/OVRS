<div class="content-wrapper" style="background: #f4f6f9; padding-top: 15px;">
    <!-- Content Header -->
    <section class="content-header" style="padding: 10px 20px; margin-bottom: 10px; background: white; border-bottom: 1px solid #e0e0e0;">
        <h1 style="font-size: 24px; margin: 0; font-weight: 400; color: #333;">
            <i class="fa fa-users text-green" style="margin-right: 8px;"></i> 
            FAYYADAMTOOTA SIRNA GALMEE FILANNOO OROMIYAA
            <small style="font-size: 14px; color: #777; margin-left: 5px;">Bulchiinsa Fayyadamtootaa</small>
        </h1>
        <ol class="breadcrumb" style="padding: 0; margin: 5px 0 0; background: none;">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Daashboordii</a></li>
            <li class="active">Fayyadamtoota</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="padding: 15px 20px;">
        <!-- Flash Messages -->
        <?php if ($this->session->flashdata('success_msg')): ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check-circle"></i> <?php echo $this->session->flashdata('success_msg'); ?>
            </div>
        <?php endif; ?>
        
        <?php if ($this->session->flashdata('error_msg')): ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-exclamation-circle"></i> <?php echo $this->session->flashdata('error_msg'); ?>
            </div>
        <?php endif; ?>

        <!-- Add User Button -->
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-12">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-add-user" style="border-radius: 4px; padding: 8px 20px;">
                    <i class="fa fa-plus-circle"></i> FAYYADAMAA HAARAA GALMEESSI
                </button>
            </div>
        </div>

        <!-- Users Table -->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-list text-green"></i> FAYYADAMTOOTA SIRNAA</h3>
                        <div class="box-tools pull-right">
                            <span class="label label-success">Waliigala: <?php echo count($this->str->getUser()); ?></span>
                        </div>
                    </div>
                    
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr style="background: #2c5f2d; color: white;">
                                        <th style="text-align: center; width: 40px;">#</th>
                                        <th style="min-width: 200px;">Maqaa Guutuu</th>
                                        <th style="text-align: center; width: 80px;">Saala</th>
                                        <th style="text-align: center; width: 110px;">Bilbila</th>
                                        <th style="text-align: center; width: 120px;">Gahee</th>
                                        <th style="text-align: center; min-width: 150px;">NAANNOO FILANNOO</th>
                                        <th style="text-align: center; min-width: 150px;">Godina/Magaalaa</th>
                                        <th style="text-align: center; width: 120px;">Maqaa Herregaa</th>
                                        <th style="text-align: center; width: 80px;">Haala</th>
                                        <th style="text-align: center; width: 200px;">Gocha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    $users = $this->str->getUser();
                                    foreach ($users as $row):
                                        $no++;
                                        // Gender display logic
                                        $gender_display = '';
                                        if($row->gender_id == 1) {
                                            $gender_display = '<span style="color: #2c5f2d;"><i class="fa fa-male"></i> Dhiira</span>';
                                        } elseif($row->gender_id == 2) {
                                            $gender_display = '<span style="color: #d9534f;"><i class="fa fa-female"></i> Dubartii</span>';
                                        } else {
                                            $gender_display = '<span style="color: #f0ad4e;"><i class="fa fa-question-circle"></i> Hin beekkamne</span>';
                                        }
                                    ?>
                                    <tr>
                                        <td style="text-align: center; vertical-align: middle;"><?php echo $no; ?></td>
                                        <td style="vertical-align: middle;">
                                            <strong><?php echo $row->first_name . ' ' . $row->middle_name . ' ' . $row->last_name; ?></strong>
                                            <br><small style="color: #999;">ID: <?php echo $row->id; ?></small>
                                        </td>
                                        <td style="text-align: center; vertical-align: middle;"><?php echo $gender_display; ?></td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            <i class="fa fa-phone"></i> <?php echo $row->phoneno; ?>
                                        </td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            <span class="label" style="background: <?php 
                                                if($row->role_id == 1) echo '#dc3545';
                                                elseif($row->role_id == 2) echo '#17a2b8';
                                                elseif($row->role_id == 3) echo '#28a745';
                                                else echo '#6c757d';
                                            ?>; color: white; padding: 5px 12px; border-radius: 20px; display: inline-block;">
                                                <i class="fa fa-user-shield"></i> <?php echo $row->role_name; ?>
                                            </span>
                                        </td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            <?php if($row->naannoofil && $row->naannoofil != ''): ?>
                                                <span class="label label-success" style="background: #2c5f2d; padding: 5px 12px;">
                                                    <i class="fa fa-map-marker"></i> <?php echo $row->naannoofil; ?>
                                                </span>
                                            <?php else: ?>
                                                <span class="label label-default" style="background: #95a5a6;">
                                                    <i class="fa fa-minus-circle"></i> Hin jiru
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            <?php 
                                            if($row->zone_id) {
                                                $zone = $this->db->where('zid', $row->zone_id)->get('zone')->row();
                                                if($zone) {
                                                    echo '<i class="fa fa-globe"></i> ' . $zone->zname;
                                                } else {
                                                    echo '<span style="color: #999;">-</span>';
                                                }
                                            } elseif($row->magala_id) {
                                                $city = $this->db->where('cid', $row->magala_id)->get('city')->row();
                                                if($city) {
                                                    echo '<i class="fa fa-building"></i> ' . $city->cname;
                                                } else {
                                                    echo '<span style="color: #999;">-</span>';
                                                }
                                            } else {
                                                echo '<span style="color: #999;">-</span>';
                                            }
                                            ?>
                                        </td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            <code style="background: #f4f4f4; padding: 4px 8px; border-radius: 4px;">
                                                <i class="fa fa-user-circle"></i> <?php echo $row->username; ?>
                                            </code>
                                        </td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            <?php if ($row->status == 1): ?>
                                                <span class="label label-success" style="background: #28a745; padding: 5px 12px;">
                                                    <i class="fa fa-check-circle"></i> Bana
                                                </span>
                                            <?php else: ?>
                                                <span class="label label-danger" style="background: #dc3545; padding: 5px 12px;">
                                                    <i class="fa fa-ban"></i> Cufama
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            <div class="btn-group">
                                                <?php if ($row->status == 1): ?>
                                                    <a href="<?php echo base_url('Structure/Deacivate_user/' . $row->id); ?>" class="btn btn-xs btn-warning" title="Cufi" onclick="return confirm('Fayyadamaa kana cufuu barbaaddaa?')">
                                                        <i class="fa fa-toggle-on"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <a href="<?php echo base_url('Structure/Acivate_user/' . $row->id); ?>" class="btn btn-xs btn-success" title="Bani" onclick="return confirm('Fayyadamaa kana banuu barbaaddaa?')">
                                                        <i class="fa fa-toggle-off"></i>
                                                    </a>
                                                <?php endif; ?>
                                                
                                                <a href="#" class="btn btn-xs btn-info" data-toggle="modal" data-target="#modal-edit-<?php echo $row->id; ?>" title="Fooyyessuu">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                
                                                <a href="<?php echo base_url('Structure/Delete_user/' . $row->id); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Fayyadamaa kana haquu barbaaddaa?')" title="Haquu">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Edit User Modal -->
                                    <div class="modal fade" id="modal-edit-<?php echo $row->id; ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background: #2c5f2d; color: white;">
                                                    <button type="button" class="close" data-dismiss="modal" style="color: white;">&times;</button>
                                                    <h4 class="modal-title">
                                                        <i class="fa fa-edit"></i> Odeeffannoo Fayyadamaa Fooyyessuu - <?php echo $row->first_name . ' ' . $row->last_name; ?>
                                                    </h4>
                                                </div>
                                                <form role="form" action="<?php echo base_url('Structure/Edit_User/'.$row->id); ?>" method="post">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Maqaa <span style="color: red;">*</span></label>
                                                                    <input type="text" name="fname" value="<?php echo $row->first_name; ?>" class="form-control" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Maqaa Abbaa <span style="color: red;">*</span></label>
                                                                    <input type="text" name="middle_name" value="<?php echo $row->middle_name; ?>" class="form-control" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Maqaa Akaakayu <span style="color: red;">*</span></label>
                                                                    <input type="text" name="lname" value="<?php echo $row->last_name; ?>" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Saala <span style="color: red;">*</span></label>
                                                                    <select class="form-control" name="sex" required>
                                                                        <option value="1" <?php echo ($row->gender_id == 1) ? 'selected' : ''; ?>>Dhiira (Male)</option>
                                                                        <option value="2" <?php echo ($row->gender_id == 2) ? 'selected' : ''; ?>>Dubartii (Female)</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Bilbila <span style="color: red;">*</span></label>
                                                                    <input type="text" name="phoneno" value="<?php echo $row->phoneno; ?>" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Guyyaa Dhaloota</label>
                                                                    <input type="date" name="dob" value="<?php echo $row->dob; ?>" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input type="email" name="email" value="<?php echo $row->email; ?>" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Gahee <span style="color: red;">*</span></label>
                                                                    <select name="role" class="form-control" required>
                                                                        <?php foreach ($this->str->getRole() as $role): ?>
                                                                            <option value="<?php echo $role->role_id; ?>" <?php echo ($role->role_id == $row->role_id) ? 'selected' : ''; ?>>
                                                                                <?php echo $role->role_name; ?>
                                                                            </option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>NAANNOO FILANNOO</label>
                                                                    <input type="text" name="naannoofil" value="<?php echo $row->naannoofil; ?>" class="form-control" placeholder="Naannoo filannoo kan hojjettu">
                                                                    <small class="text-muted">Fayyadamaan kun bakka kamirratti hojjeta?</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Maqaa Herregaa</label>
                                                                    <input type="text" name="username" value="<?php echo $row->username; ?>" class="form-control" readonly>
                                                                    <small class="text-muted">Maqaa herregaa jijjiiruun hin danda'amu</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Jecha Darbii (Haraa)</label>
                                                                    <input type="password" name="password" class="form-control" placeholder="Jecha darbii haraa galchi (yoo barbaadde)">
                                                                    <small class="text-muted">Jecha darbii jijjiiruuf, haaraa galchi</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                                            <i class="fa fa-times"></i> Cuf
                                                        </button>
                                                        <button type="submit" class="btn btn-success">
                                                            <i class="fa fa-save"></i> Oomishii
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="modal-add-user">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: #2c5f2d; color: white;">
                <button type="button" class="close" data-dismiss="modal" style="color: white;">&times;</button>
                <h4 class="modal-title"><i class="fa fa-user-plus"></i> FAYYADAMAA HAARAA GALMEESSI</h4>
            </div>
            <form role="form" action="<?php echo base_url('Structure/saveemployee'); ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Maqaa <span style="color: red;">*</span></label>
                                <input type="text" name="fname" placeholder="Maqaa" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Maqaa Abbaa <span style="color: red;">*</span></label>
                                <input type="text" name="middle_name" placeholder="Maqaa Abbaa" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Maqaa Akaakayu <span style="color: red;">*</span></label>
                                <input type="text" name="lname" placeholder="Maqaa Akaakayu" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Saala <span style="color: red;">*</span></label>
                                <select class="form-control" name="sex" required>
                                    <option value="">-- Saala Filadhu --</option>
                                    <option value="1">Dhiira (Male)</option>
                                    <option value="2">Dubartii (Female)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bilbila <span style="color: red;">*</span></label>
                                <input type="text" name="phoneno" placeholder="09xxxxxxxx" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Guyyaa Dhaloota</label>
                                <input type="date" name="dob" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="email@example.com" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gahee <span style="color: red;">*</span></label>
                                <select name="role" class="form-control" required>
                                    <option value="">-- Gahee Filadhu --</option>
                                    <?php foreach ($this->str->getRole() as $role): ?>
                                        <option value="<?php echo $role->role_id; ?>"><?php echo $role->role_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NAANNOO FILANNOO</label>
                                <input type="text" name="naannoofil" class="form-control" placeholder="Naannoo filannoo kan hojjettu">
                                <small class="text-muted">Fayyadamaan kun bakka kamirratti hojjeta?</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Maqaa Herregaa <span style="color: red;">*</span></label>
                                <input type="text" name="username" placeholder="Maqaa herregaa" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jecha Darbii <span style="color: red;">*</span></label>
                                <input type="password" name="password" placeholder="Jecha darbii" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        <i class="fa fa-times"></i> Cuf
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Galmeessi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- DataTables CSS and JS -->
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.bootstrap.min.css">
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script> -->

<script>
$(document).ready(function() {
    $('#example').DataTable({
        dom: 'lBfrtip',
        buttons: [
            { extend: 'copy', text: '<i class="fa fa-copy"></i> Copy', className: 'btn btn-sm btn-default' },
            { extend: 'csv', text: '<i class="fa fa-file-excel-o"></i> CSV', className: 'btn btn-sm btn-success' },
            { extend: 'excel', text: '<i class="fa fa-file-excel-o"></i> Excel', className: 'btn btn-sm btn-success' },
            { extend: 'pdf', text: '<i class="fa fa-file-pdf-o"></i> PDF', className: 'btn btn-sm btn-danger' },
            { extend: 'print', text: '<i class="fa fa-print"></i> Print', className: 'btn btn-sm btn-info' }
        ],
        language: {
            search: "Barbaadi:",
            lengthMenu: "Agarsiisi _MENU_ galmee",
            info: "Galmee _START_ hanga _END_ kan _TOTAL_ keessaa",
            infoEmpty: "Galmeen hin jiru",
            infoFiltered: "(yiddu _MAX_ galmee keessaa calleefame)",
            zeroRecords: "Wanti walsimu hin jiru",
            paginate: {
                first: "Jalqaba",
                last: "Dhuma",
                next: "Kan ittu",
                previous: "Kan dura"
            }
        },
        pageLength: 10,
        responsive: true
    });
});
</script>

<style>
.table th, .table td { vertical-align: middle; font-size: 13px; }
.btn-group .btn { margin: 0 2px; border-radius: 3px; }
.label { font-weight: 500; font-size: 11px; padding: 5px 12px; border-radius: 20px; display: inline-block; }
.modal-content { border-radius: 8px; overflow: hidden; }
.modal-header { border-top-left-radius: 8px; border-top-right-radius: 8px; }
.form-control { border-radius: 4px; border: 1px solid #ddd; padding: 6px 12px; }
.form-control:focus { border-color: #2c5f2d; box-shadow: 0 0 0 2px rgba(44,95,45,0.1); }
.btn { border-radius: 4px; transition: all 0.3s ease; }
.btn:hover { transform: translateY(-1px); box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
.dataTables_wrapper .dt-buttons { margin-bottom: 10px; }
.dataTables_wrapper .dt-buttons .btn { margin-right: 5px; }
code { font-size: 12px; background: #f8f9fa; color: #2c5f2d; }
.table-hover tbody tr:hover { background: #f5f5f5; }
.text-muted { font-size: 11px; }
i.fa { margin-right: 3px; }
</style>