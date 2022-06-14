<style>
	.employee-list .dt-button {
		border-radius: 20px !important;
		margin-right: 10px !important;
	}
</style>
<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper employee-list">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-primary"><i class="fa fa-users" style="color:#0d6efd" aria-hidden="true"></i> Employee</h3>
		</div>
		<div class="col-md-7 align-self-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
				<li class="breadcrumb-item active">Employee</li>
			</ol>
		</div>
	</div>
	<div class="message"></div>
	<div class="container-fluid p-2 px-4">
		<div class="row m-b-10">
			<div class="col-12 pb-2">
				<button type="button" class="btn-rounded mr-2 btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url(); ?>employee/Add_employee" class="text-white"><i class="" aria-hidden="true"></i> Add Employee</a></button>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card card-outline-info">
					<div class="card-header">
						<h4 class="m-b-0 text-white"><i class="fa fa-user-o" aria-hidden="true"></i> Employee List</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive ">
							<table id="employees123" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Employee Name</th>
										<th>PIN</th>
										<th>Email </th>
										<th>Contact </th>
										<th>User Type</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($employee as $value) : ?>
										<tr>
											<td title="<?php echo $value->first_name . ' ' . $value->last_name; ?>"><?php echo $value->first_name . ' ' . $value->last_name; ?></td>
											<td><?php echo $value->em_code; ?></td>
											<td><?php echo $value->em_email; ?></td>
											<td><?php echo $value->em_phone; ?></td>
											<td><?php echo $value->em_role; ?></td>
											<td class="jsgrid-align-center d-flex justify-content-center">
												<a href="<?php echo base_url(); ?>employee/view?I=<?php echo base64_encode($value->em_id); ?>" title="Edit" class="btn-circle btn-info d-flex justify-content-center align-items-center waves-effect waves-light"><i class="fa fa-pencil"></i></a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view('backend/footer'); ?>
		<script>
			$('#employees123').DataTable({
				"aaSorting": [
					[1, 'asc']
				],
				dom: 'Bfrtip',
				buttons: [
					'copy', 'csv', 'excel', 'pdf', 'print'
				]
			});
		</script>