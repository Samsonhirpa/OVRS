 <div class="content-wrapper">
<section class="content" style="min-height: 526px;">
        <div class="col-xs-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h1 class="box-title" style="font-family: Times New Roman, Times, serif; font-size: 30px;"><i class="fa fa-plus"></i> <?php echo lang('index_heading');?> Registration</h1></div>
</div>

<div class="stu-master-create">
    <style>
.box .box-solid {
     background-color: #F8F8F8;
}
</style>

<script>
$(function () {
  $('[data-toggle="popover"]').popover({placement: function() { return $(window).width() < 768 ? 'bottom' : 'right'; }})
})
</script>

<div class="col-xs-12 col-lg-12">
  <div class="box-success box view-item col-xs-12 col-lg-12">
    
      <!-- <div class="box-header with-border"> -->
         <!-- <h4 class="box-title"><i class="fa fa-info-circle"></i> <h1><?php echo lang('index_heading');?></h1></h4> -->
      </div>

<!-- <h1><?php echo lang('index_heading');?></h1>
<p><?php echo lang('index_subheading');?></p> -->


<div id="infoMessage"><?php echo $message;?></div>

<div class="box-body">
     <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
<table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info"  cellpadding=10 cellspacing=10>
	<tr role="row"><thead>
		<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 318.017px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"><?php echo lang('index_fname_th');?></th>
		<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 318.017px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"><?php echo lang('index_lname_th');?></th>
		<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 318.017px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"><?php echo lang('index_email_th');?></th>
		<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 318.017px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"><?php echo lang('index_groups_th');?></th>
		<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 218.017px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"><?php echo lang('index_status_th');?></th>
		<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 218.017px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"><?php echo lang('index_action_th');?></th></thead></tr>
	
			<?php foreach ($users as $user):?>
				<tr>
            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                <?php endforeach?>
			</td>
			<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
			<td><b><?php echo anchor("auth/edit_user/".$user->id, 'Edit User') ;?></b></td>
      
		</tr>
	<?php endforeach;?>
</table><br>
<p><b><?php echo anchor('auth/create_user', lang('index_create_user_link'))?>   |   <?php echo anchor('auth/create_group', lang('index_create_group_link'))?></b></p>
</div>
</div>
</div>
</div>
</section>
</div>







<script>
$(document).ready(function() {
    $('#example2').DataTable( {
      "pageLength": 10,
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
