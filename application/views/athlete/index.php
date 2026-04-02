<!-- athlete/index.php -->
<div class="content-wrapper">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fa fa-users mr-2"></i><?php echo $title; ?>
                </h1>
                <a href="<?php echo base_url('athlete/create'); ?>" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> Add New Athlete
                </a>
            </div>

            <!-- Filters Card -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fa fa-filter mr-2"></i>Filter Athletes
                    </h6>
                </div>
                <div class="card-body" id="filterSection">
                    <div class="row align-items-end">
                        <!-- SPORT FILTER -->
                        <div class="col-md-3 mb-3">
                            <label for="sportFilter" class="font-weight-bold text-dark">Sport</label>
                            <select class="form-control filter-select" id="sportFilter">
                                <option value="">All Sports</option>
                                <option value="Qillee">Qillee</option>
                                <option value="Wallaansoo">Wallaansoo</option>
                                <option value="Qastii/xiyyaa">Qastii/xiyyaa</option>
                                <option value="Qast wal makaa">Qast wal makaa</option>
                                <option value="Korboo Qeenxee">Korboo Qeenxee</option>
                                <option value="Korboo wal_makaa">Korboo wal_makaa</option>
                                <option value="Saddeqaa abba 12">Saddeqaa abba 12</option>
                                <option value="Saddeqaa abba 18">Saddeqaa abba 18</option>
                                <option value="Gugsii fardaa">Gugsii fardaa</option>
                                <option value="Gulufaa fardaa">Gulufaa fardaa</option>
                                <option value="Shaah">Shaah</option>
                                <option value="Buub">Buub</option>
                                <option value="Feestivaalaa agarsiisa aadaa">Feestivaalaa agarsiisa aadaa</option>
                            </select>
                        </div>

                        <!-- SEX FILTER -->
                        <div class="col-md-2 mb-3">
                            <label for="sexFilter" class="font-weight-bold text-dark">Sex</label>
                            <select class="form-control filter-select" id="sexFilter">
                                <option value="">All Sex</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <!-- LOCATION TYPE FILTER -->
                        <div class="col-md-2 mb-3">
                            <label for="teessooFilter" class="font-weight-bold text-dark">Location Type</label>
                            <select class="form-control filter-select" id="teessooFilter" onchange="toggleLocationFilter(this.value)">
                                <option value="">All Locations</option>
                                <option value="Magaaalaa">City</option>
                                <option value="Godina">Zone</option>
                            </select>
                        </div>

                        <!-- ZONE FILTER (hidden by default) -->
                        <div class="col-md-2 mb-3" id="zoneFilterGroup" style="display: none;">
                            <label for="zoneFilter" class="font-weight-bold text-dark">Zone</label>
                            <select class="form-control filter-select" id="zoneFilter">
                                <option value="">All Zones</option>
                                <?php 
                                $zones = [];
                                if (!empty($athletes)) {
                                    foreach ($athletes as $athlete) {
                                        if ($athlete['teessoo'] == 'Godina' && !empty($athlete['region']) && !in_array($athlete['region'], $zones)) {
                                            $zones[] = $athlete['region'];
                                        }
                                    }
                                    sort($zones);
                                    foreach ($zones as $zone) {
                                        echo '<option value="' . htmlspecialchars($zone) . '">' . htmlspecialchars($zone) . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <!-- CITY FILTER (hidden by default) -->
                        <div class="col-md-2 mb-3" id="cityFilterGroup" style="display: none;">
                            <label for="cityFilter" class="font-weight-bold text-dark">City</label>
                            <select class="form-control filter-select" id="cityFilter">
                                <option value="">All Cities</option>
                                <?php 
                                $cities = [];
                                if (!empty($athletes)) {
                                    foreach ($athletes as $athlete) {
                                        if ($athlete['teessoo'] == 'Magaaalaa' && !empty($athlete['region']) && !in_array($athlete['region'], $cities)) {
                                            $cities[] = $athlete['region'];
                                        }
                                    }
                                    sort($cities);
                                    foreach ($cities as $city) {
                                        echo '<option value="' . htmlspecialchars($city) . '">' . htmlspecialchars($city) . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Apply & Reset Buttons -->
                        <div class="col-md-3 mb-3">
                            <div class="d-flex">
                                <button type="button" class="btn btn-primary btn-block mr-2" id="applyFilters">
                                    <i class="fa fa-search fa-sm"></i> Apply
                                </button>
                                <button type="button" class="btn btn-secondary btn-block" id="resetFilters">
                                    <i class="fa fa-redo fa-sm"></i> Reset
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Active Filters Summary -->
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="d-flex align-items-center">
                                <span class="font-weight-bold text-dark mr-3">Active Filters:</span>
                                <div class="filter-summary" id="filterSummary">
                                    <span class="text-muted small">No active filters</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Athletes Table -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fa fa-list mr-2"></i>Registered Athletes List
                        <span class="badge badge-primary ml-2" id="recordCount">
                            <?php echo count($athletes); ?> athletes
                        </span>
                    </h6>
                    <div class="d-flex align-items-center">
                        <input type="text" id="tableSearch" class="form-control form-control-sm" placeholder="Search table..." style="width: 200px;">
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="athletesTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Photo</th>
                                    <th>Full Name</th>
                                    <th>Sex</th>
                                    <th>Age</th>
                                    <th>Location Type</th>
                                    <th>Region</th>
                                    <th>Sport</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($athletes)): ?>
                                    <?php foreach ($athletes as $athlete): ?>
                                        <tr>
                                            <td><?php echo $athlete['id']; ?></td>
                                            <td class="text-center">
                                                <?php if (!empty($athlete['photo']) && file_exists(FCPATH . 'uploads/athletes/' . $athlete['photo'])): ?>
                                                    <img src="<?php echo base_url('uploads/athletes/' . $athlete['photo']); ?>" 
                                                         alt="<?php echo htmlspecialchars($athlete['full_name']); ?>" 
                                                         class="rounded-circle img-thumbnail"
                                                         style="width: 50px; height: 50px; object-fit: cover;">
                                                <?php else: ?>
                                                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center bg-light"
                                                         style="width: 50px; height: 50px; border: 1px solid #dee2e6;">
                                                        <i class="fa fa-user text-muted"></i>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo htmlspecialchars($athlete['full_name']); ?></td>
                                            <td><?php echo $athlete['sex']; ?></td>
                                            <td><?php echo $athlete['age']; ?></td>
                                            <td>
                                                <?php if ($athlete['teessoo'] == 'Magaaalaa'): ?>
                                                    <span class="badge badge-info">City</span>
                                                <?php elseif ($athlete['teessoo'] == 'Godina'): ?>
                                                    <span class="badge badge-success">Zone</span>
                                                <?php else: ?>
                                                    <span class="badge badge-secondary">N/A</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo htmlspecialchars($athlete['region']); ?></td>
                                            <td><?php echo htmlspecialchars($athlete['sport']); ?></td>
                                            <td>
                                                <?php if (isset($athlete['created_at'])): ?>
                                                    <?php echo date('d/m/Y', strtotime($athlete['created_at'])); ?>
                                                <?php else: ?>
                                                    <span class="text-muted">N/A</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <a href="<?php echo site_url('athlete/edit/' . $athlete['id']); ?>" 
                                                       class="btn btn-warning"
                                                       title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo site_url('athlete/delete/' . $athlete['id']); ?>" 
                                                       class="btn btn-danger"
                                                       title="Delete"
                                                       onclick="return confirm('Are you sure you want to delete <?php echo htmlspecialchars(addslashes($athlete['full_name'])); ?>?')">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="10" class="text-center py-5">
                                            <div class="empty-state">
                                                <i class="fa fa-users fa-3x text-muted mb-3"></i>
                                                <h4 class="text-muted">No Athletes Found</h4>
                                                <a href="<?php echo site_url('athlete/create'); ?>" class="btn btn-primary">
                                                    <i class="fa fa-plus mr-2"></i> Add First Athlete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.content-wrapper {
    background-color: #f8f9fc;
}

.card {
    border: none;
    border-radius: 8px;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
    margin-bottom: 20px;
}

.card-header {
    background-color: white;
    border-bottom: 1px solid #e3e6f0;
    padding: 1rem 1.35rem;
}

.card-header h6 {
    margin: 0;
    font-size: 1rem;
}

#athletesTable {
    border-collapse: separate;
    border-spacing: 0;
}

#athletesTable thead th {
    background-color: #4e73df;
    color: white;
    border: none;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 12px;
    letter-spacing: 0.5px;
    padding: 12px 10px;
}

#athletesTable tbody td {
    padding: 12px 10px;
    vertical-align: middle;
    border-top: 1px solid #e3e6f0;
}

#athletesTable tbody tr:hover {
    background-color: #f8f9fa;
}

.filter-summary {
    min-height: 30px;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}

.filter-summary .badge {
    font-size: 0.8rem;
    padding: 0.35em 0.65em;
}

.btn-group .btn {
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
    margin-right: 3px;
}

.form-control:focus {
    border-color: #4e73df;
    box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
}

.btn-primary {
    background-color: #4e73df;
    border-color: #4e73df;
}

.btn-primary:hover {
    background-color: #2e59d9;
    border-color: #2653d4;
}

.btn-secondary {
    background-color: #858796;
    border-color: #858796;
}

.btn-secondary:hover {
    background-color: #717384;
    border-color: #6b6d7d;
}

.badge-info {
    background-color: #36b9cc;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 500;
}

.badge-success {
    background-color: #1cc88a;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 500;
}

.empty-state {
    padding: 40px 0;
}

.empty-state i {
    font-size: 48px;
    opacity: 0.5;
}

/* Responsive */
@media (max-width: 768px) {
    .card-header {
        flex-direction: column;
        align-items: flex-start !important;
    }
    
    .card-header > div {
        margin-top: 10px;
        width: 100%;
    }
    
    .filter-summary .badge {
        margin-bottom: 5px;
    }
}
</style>

<script>
$(document).ready(function() {
    // Initialize DataTable
    var table = $('#athletesTable').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "pageLength": 10,
        "language": {
            "search": "Search:",
            "lengthMenu": "Show _MENU_ entries",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "infoEmpty": "No entries available",
            "zeroRecords": "No matching records found"
        },
        "dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
               "<'row'<'col-sm-12'tr>>" +
               "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>"
    });
    
    // Hide default search box
    $('.dataTables_filter').hide();
    
    // Connect custom search
    $('#tableSearch').on('keyup', function() {
        table.search(this.value).draw();
        updateRecordCount();
        updateFilterSummary();
    });
    
    // Function to apply filters
    function applyFilters() {
        $.fn.dataTable.ext.search = [];
        
        var sportFilter = $('#sportFilter').val();
        var sexFilter = $('#sexFilter').val();
        var teessooFilter = $('#teessooFilter').val();
        var zoneFilter = $('#zoneFilter').val();
        var cityFilter = $('#cityFilter').val();
        
        $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
            // Sport filter - column index 7
            if (sportFilter && data[7] != sportFilter) {
                return false;
            }
            
            // Sex filter - column index 3
            if (sexFilter && data[3] != sexFilter) {
                return false;
            }
            
            // Location Type filter - column index 5
            if (teessooFilter) {
                var locationType = data[5].toLowerCase();
                if (teessooFilter === 'Magaaalaa' && !locationType.includes('city')) {
                    return false;
                }
                if (teessooFilter === 'Godina' && !locationType.includes('zone')) {
                    return false;
                }
            }
            
            // Zone filter - column index 6 (region)
            if (zoneFilter && data[6] != zoneFilter) {
                return false;
            }
            
            // City filter - column index 6 (region)
            if (cityFilter && data[6] != cityFilter) {
                return false;
            }
            
            return true;
        });
        
        table.draw();
        updateRecordCount();
        updateFilterSummary();
    }
    
    // Apply filters button
    $('#applyFilters').on('click', function() {
        applyFilters();
    });
    
    // Auto-apply on change
    $('#sportFilter, #sexFilter, #teessooFilter, #zoneFilter, #cityFilter').on('change', function() {
        applyFilters();
    });
    
    // Reset filters
    $('#resetFilters').on('click', function() {
        $('#sportFilter').val('');
        $('#sexFilter').val('');
        $('#teessooFilter').val('');
        $('#zoneFilter').val('');
        $('#cityFilter').val('');
        $('#tableSearch').val('');
        
        // Hide zone and city filter groups
        $('#zoneFilterGroup').hide();
        $('#cityFilterGroup').hide();
        
        $.fn.dataTable.ext.search = [];
        table.search('').draw();
        
        $('#recordCount').text(table.rows().count() + ' athletes');
        $('#filterSummary').html('<span class="text-muted small">No active filters</span>');
    });
    
    // Update record count
    function updateRecordCount() {
        var count = table.rows({search: 'applied'}).count();
        $('#recordCount').text(count + ' athletes');
    }
    
    // Update filter summary
    function updateFilterSummary() {
        var activeFilters = [];
        
        var sportFilter = $('#sportFilter').val();
        var sexFilter = $('#sexFilter').val();
        var teessooFilter = $('#teessooFilter').val();
        var zoneFilter = $('#zoneFilter').val();
        var cityFilter = $('#cityFilter').val();
        var searchText = $('#tableSearch').val();
        
        if (sportFilter) {
            activeFilters.push('<span class="badge badge-success mr-2 mb-1">Sport: ' + sportFilter + '</span>');
        }
        
        if (sexFilter) {
            var color = sexFilter === 'Male' ? 'primary' : (sexFilter === 'Female' ? 'danger' : 'secondary');
            activeFilters.push('<span class="badge badge-' + color + ' mr-2 mb-1">Sex: ' + sexFilter + '</span>');
        }
        
        if (teessooFilter) {
            var typeText = teessooFilter === 'Magaaalaa' ? 'City' : 'Zone';
            activeFilters.push('<span class="badge badge-info mr-2 mb-1">Type: ' + typeText + '</span>');
        }
        
        if (zoneFilter) {
            activeFilters.push('<span class="badge badge-warning mr-2 mb-1">Zone: ' + zoneFilter + '</span>');
        }
        
        if (cityFilter) {
            activeFilters.push('<span class="badge badge-warning mr-2 mb-1">City: ' + cityFilter + '</span>');
        }
        
        if (searchText) {
            activeFilters.push('<span class="badge badge-secondary mr-2 mb-1">Search: ' + searchText + '</span>');
        }
        
        if (activeFilters.length > 0) {
            $('#filterSummary').html(activeFilters.join(''));
        } else {
            $('#filterSummary').html('<span class="text-muted small">No active filters</span>');
        }
    }
    
    // Update record count when table is drawn
    table.on('draw', function() {
        updateRecordCount();
        updateFilterSummary();
    });
    
    // Initial update
    updateRecordCount();
});

// Toggle location filter visibility
function toggleLocationFilter(value) {
    if (value === 'Godina') {
        $('#zoneFilterGroup').show();
        $('#cityFilterGroup').hide();
        $('#cityFilter').val('');
    } else if (value === 'Magaaalaa') {
        $('#cityFilterGroup').show();
        $('#zoneFilterGroup').hide();
        $('#zoneFilter').val('');
    } else {
        $('#zoneFilterGroup').hide();
        $('#cityFilterGroup').hide();
        $('#zoneFilter').val('');
        $('#cityFilter').val('');
    }
}
</script>