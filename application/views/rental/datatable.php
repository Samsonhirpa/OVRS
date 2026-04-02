<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
</head>
<body>
<div class="row justify-content-center mt-5">
<div class="col-md-6">
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-md-6">
<select class="form-control" id="country">
<option value="">Select Country</option>
<option value="USA">USA</option>
<option value="India">India</option>
</select>
</div>
<div class="col-md-6">
<select class="form-control" id="status">
<option value="">Select Status</option>
<option value="Active">active</option>
<option value="Inactive">not active</option>
</select>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row justify-content-center mt-5">
<div class="col-md-8">
<div class="card">
<div class="card-body">
<table class="table" id="myTable">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Company Name</th>
<th scope="col">Active/Inactive Status</th>
<th scope="col">Country</th>
</tr>
</thead>
<tbody> </tbody>
</table>
</div>
</div>
</div>
</div>
</body></html>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
function reloadDatatable(){
$('#myTable').DataTable({
"ajax" : {
"url": "<?php echo base_url('Welcome/getdata');?>", //give your controller & function name
"type":"post",
"data":{ country:$('#country').val(),status:$('#status').val(),}
},
bDestroy:true,
});
}
reloadDatatable() // function call
$('#country').change(function(){
reloadDatatable();
})
$('#status').change(function(){
reloadDatatable();
})
</script>