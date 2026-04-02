<!-- application/views/officer/index.php -->
<div class="content-wrapper">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fa fa-user-tie mr-2"></i><?php echo $title; ?>
                </h1>
               
                <a href="<?php echo base_url('officer/create'); ?>" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> Register New Officer
                </a>
            </div>

            <!-- Filters Card -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fa fa-filter mr-2"></i>Filter Officers
                    </h6>
                </div>
                <div class="card-body" id="filterSection">
                    <div class="row align-items-end">
                        <!-- Search by Name -->
                        <div class="col-md-3 mb-3">
                            <label for="nameSearch" class="font-weight-bold text-dark">Search by Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control filter-input" id="nameSearch" 
                                       placeholder="Enter officer name...">
                                <button class="btn btn-primary" type="button" id="searchBtn">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Sex Filter -->
                        <div class="col-md-2 mb-3">
                            <label for="sexFilter" class="font-weight-bold text-dark">Sex</label>
                            <select class="form-control filter-select" id="sexFilter">
                                <option value="">All Sex</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <!-- Location Type Filter -->
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
                                if (!empty($officers)) {
                                    foreach ($officers as $officer) {
                                        if ($officer['teessoo'] == 'Godina' && !empty($officer['region']) && !in_array($officer['region'], $zones)) {
                                            $zones[] = $officer['region'];
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
                                if (!empty($officers)) {
                                    foreach ($officers as $officer) {
                                        if ($officer['teessoo'] == 'Magaaalaa' && !empty($officer['region']) && !in_array($officer['region'], $cities)) {
                                            $cities[] = $officer['region'];
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

            <!-- Officers List Card -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fa fa-list mr-2"></i>Registered Officers List
                        <span class="badge badge-primary ml-2" id="recordCount">
                            <?php echo count($officers); ?> officers
                        </span>
                    </h6>
                    <div class="d-flex align-items-center">
                        <input type="text" id="tableSearch" class="form-control form-control-sm" placeholder="Search table..." style="width: 200px;">
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="officersTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Photo</th>
                                    <th>Full Name</th>
                                    <th>Sex</th>
                                    <th>Location Type</th>
                                    <th>Region</th>
                                    <th>Position</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($officers)): ?>
                                    <?php foreach ($officers as $officer): ?>
                                        <tr>
                                            <td><?php echo $officer['id']; ?></td>
                                            <td class="text-center">
                                                <?php if (!empty($officer['photo']) && file_exists(FCPATH . 'uploads/officers/' . $officer['photo'])): ?>
                                                    <img src="<?php echo base_url('uploads/officers/' . $officer['photo']); ?>" 
                                                         alt="<?php echo htmlspecialchars($officer['full_name']); ?>" 
                                                         class="rounded-circle img-thumbnail"
                                                         style="width: 50px; height: 50px; object-fit: cover;">
                                                <?php else: ?>
                                                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center bg-light"
                                                         style="width: 50px; height: 50px; border: 1px solid #dee2e6;">
                                                        <i class="fa fa-user-tie text-muted"></i>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo htmlspecialchars($officer['full_name']); ?></td>
                                            <td><?php echo $officer['sex']; ?></td>
                                            <td>
                                                <?php if ($officer['teessoo'] == 'Magaaalaa'): ?>
                                                    <span class="badge badge-info">City</span>
                                                <?php elseif ($officer['teessoo'] == 'Godina'): ?>
                                                    <span class="badge badge-success">Zone</span>
                                                <?php else: ?>
                                                    <span class="badge badge-secondary">N/A</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo htmlspecialchars($officer['region']); ?></td>
                                            <td><?php echo htmlspecialchars($officer['position']); ?></td>
                                            <td>
                                                <?php if (isset($officer['created_at'])): ?>
                                                    <?php echo date('d/m/Y', strtotime($officer['created_at'])); ?>
                                                <?php else: ?>
                                                    <span class="text-muted">N/A</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <a href="<?php echo site_url('officer/edit/' . $officer['id']); ?>" 
                                                       class="btn btn-warning"
                                                       title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo site_url('officer/delete/' . $officer['id']); ?>" 
                                                       class="btn btn-danger"
                                                       title="Delete"
                                                       onclick="return confirm('Are you sure you want to delete <?php echo htmlspecialchars(addslashes($officer['full_name'])); ?>?')">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="9" class="text-center py-5">
                                            <div class="empty-state">
                                                <i class="fa fa-user-tie fa-3x text-muted mb-3"></i>
                                                <h4 class="text-muted">No Officers Found</h4>
                                                <a href="<?php echo site_url('officer/create'); ?>" class="btn btn-primary">
                                                    <i class="fa fa-plus mr-2"></i> Register First Officer
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

#officersTable {
    border-collapse: separate;
    border-spacing: 0;
}

#officersTable thead th {
    background-color: #4e73df;
    color: white;
    border: none;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 12px;
    letter-spacing: 0.5px;
    padding: 12px 10px;
}

#officersTable tbody td {
    padding: 12px 10px;
    vertical-align: middle;
    border-top: 1px solid #e3e6f0;
}

#officersTable tbody tr:hover {
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

.form-control {
    border-radius: 4px;
    border: 1px solid #d2d6de;
    padding: 10px 12px;
    height: auto;
    transition: all 0.2s;
}

.form-control:focus {
    border-color: #4e73df;
    box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
}

/* Button Styles */
.btn {
    border-radius: 4px;
    font-weight: 500;
    padding: 10px 20px;
    font-size: 14px;
    transition: all 0.2s;
    border: none;
}

.btn-sm {
    padding: 8px 16px;
    font-size: 13px;
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

.btn-warning {
    background-color: #f6c23e;
    border-color: #f6c23e;
    color: white;
}

.btn-warning:hover {
    background-color: #e0a800;
    border-color: #d39e00;
}

.btn-danger {
    background-color: #e74a3b;
    border-color: #e74a3b;
    color: white;
}

.btn-danger:hover {
    background-color: #be2617;
    border-color: #b21f12;
}

/* Badge Styles */
.badge {
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 500;
}

.badge-info {
    background-color: #36b9cc;
    color: white;
}

.badge-success {
    background-color: #1cc88a;
    color: white;
}

.badge-primary {
    background-color: #4e73df;
    color: white;
}

.badge-secondary {
    background-color: #858796;
    color: white;
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

/* Input group styling */
.input-group .btn {
    padding: 10px 16px;
    margin: 0;
}

/* Empty state */
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
    
    .btn {
        width: 100%;
        margin-bottom: 5px;
    }
    
    .d-flex {
        flex-direction: column;
    }
}
</style>

<script>
$(document).ready(function() {
    // Initialize DataTable
    var table = $('#officersTable').DataTable({
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
               "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        "buttons": ['copy', 'csv', 'excel', 'pdf', 'print'],
        "columns": [
            null, // ID
            { "orderable": false }, // Photo
            null, // Full Name
            null, // Sex
            null, // Location Type
            null, // Region
            null, // Position
            null, // Created
            { "orderable": false } // Actions
        ]
    });
    
    // Hide default search box
    $('.dataTables_filter').hide();
    
    // Connect custom search
    $('#tableSearch').on('keyup', function() {
        table.search(this.value).draw();
        updateRecordCount();
        updateFilterSummary();
    });
    
    // Function to apply all filters
    function applyFilters() {
        $.fn.dataTable.ext.search = [];
        
        var nameSearch = $('#nameSearch').val();
        var sexFilter = $('#sexFilter').val();
        var teessooFilter = $('#teessooFilter').val();
        var zoneFilter = $('#zoneFilter').val();
        var cityFilter = $('#cityFilter').val();
        
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                // Name search - column index 2
                if (nameSearch) {
                    var name = data[2].toLowerCase();
                    if (name.indexOf(nameSearch.toLowerCase()) === -1) {
                        return false;
                    }
                }
                
                // Sex filter - column index 3
                if (sexFilter && data[3] !== sexFilter) {
                    return false;
                }
                
                // Location Type filter - column index 4
                if (teessooFilter) {
                    var locationTypeText = data[4].toLowerCase();
                    if (teessooFilter === 'Magaaalaa' && !locationTypeText.includes('city')) {
                        return false;
                    }
                    if (teessooFilter === 'Godina' && !locationTypeText.includes('zone')) {
                        return false;
                    }
                }
                
                // Zone filter - column index 5
                if (zoneFilter && data[5] !== zoneFilter) {
                    return false;
                }
                
                // City filter - column index 5
                if (cityFilter && data[5] !== cityFilter) {
                    return false;
                }
                
                return true;
            }
        );
        
        table.draw();
        updateRecordCount();
        updateFilterSummary();
    }
    
    // Apply Filters button click
    $('#applyFilters').on('click', function() {
        applyFilters();
    });
    
    // Search button click
    $('#searchBtn').on('click', function() {
        applyFilters();
    });
    
    // Enter key in search field
    $('#nameSearch').on('keyup', function(e) {
        if (e.keyCode === 13) {
            applyFilters();
        }
    });
    
    // Auto-apply filters when dropdowns change
    $('#sexFilter, #teessooFilter, #zoneFilter, #cityFilter').on('change', function() {
        applyFilters();
    });
    
    // Reset Filters button click
    $('#resetFilters').on('click', function() {
        // Reset all filter inputs
        $('#nameSearch').val('');
        $('#sexFilter').val('');
        $('#teessooFilter').val('');
        $('#zoneFilter').val('');
        $('#cityFilter').val('');
        $('#tableSearch').val('');
        
        // Hide zone and city filter groups
        $('#zoneFilterGroup').hide();
        $('#cityFilterGroup').hide();
        
        // Clear DataTable filters
        $.fn.dataTable.ext.search = [];
        table.search('').draw();
        
        // Update UI
        updateRecordCount();
        $('#filterSummary').html('<span class="text-muted small">No active filters</span>');
    });
    
    // Update record count
    function updateRecordCount() {
        var count = table.rows({search: 'applied'}).count();
        $('#recordCount').text(count + ' officers');
    }
    
    // Update filter summary
    function updateFilterSummary() {
        var activeFilters = [];
        
        var nameSearch = $('#nameSearch').val();
        var sexFilter = $('#sexFilter').val();
        var teessooFilter = $('#teessooFilter').val();
        var zoneFilter = $('#zoneFilter').val();
        var cityFilter = $('#cityFilter').val();
        var searchText = $('#tableSearch').val();
        
        if (nameSearch) {
            activeFilters.push('<span class="badge badge-primary mr-2 mb-1"><i class="fa fa-user mr-1"></i> ' + nameSearch + '</span>');
        }
        
        if (sexFilter) {
            var icon = sexFilter === 'Male' ? 'fa-male' : (sexFilter === 'Female' ? 'fa-female' : 'fa-genderless');
            var color = sexFilter === 'Male' ? 'primary' : (sexFilter === 'Female' ? 'danger' : 'secondary');
            activeFilters.push('<span class="badge badge-' + color + ' mr-2 mb-1"><i class="fa ' + icon + ' mr-1"></i> ' + sexFilter + '</span>');
        }
        
        if (teessooFilter) {
            var typeText = teessooFilter === 'Magaaalaa' ? 'City' : 'Zone';
            var typeIcon = teessooFilter === 'Magaaalaa' ? 'fa-building' : 'fa-map-marker-alt';
            activeFilters.push('<span class="badge badge-info mr-2 mb-1"><i class="fa ' + typeIcon + ' mr-1"></i> ' + typeText + '</span>');
        }
        
        if (zoneFilter) {
            activeFilters.push('<span class="badge badge-success mr-2 mb-1"><i class="fa fa-map-marker-alt mr-1"></i> Zone: ' + zoneFilter + '</span>');
        }
        
        if (cityFilter) {
            activeFilters.push('<span class="badge badge-success mr-2 mb-1"><i class="fa fa-building mr-1"></i> City: ' + cityFilter + '</span>');
        }
        
        if (searchText) {
            activeFilters.push('<span class="badge badge-secondary mr-2 mb-1"><i class="fa fa-search mr-1"></i> ' + searchText + '</span>');
        }
        
        var summary = $('#filterSummary');
        if (activeFilters.length > 0) {
            summary.html(activeFilters.join(''));
        } else {
            summary.html('<span class="text-muted small">No active filters</span>');
        }
    }
    
    // Update record count when table is drawn
    table.on('draw', function() {
        updateRecordCount();
        updateFilterSummary();
    });
    
    // Initial UI update
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