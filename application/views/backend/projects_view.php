<style>
	.font-weight-700 {
		font-weight: 600;
	}
</style>
<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">
	<div class="message"></div>
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-primary"><i class="fa fa-archive" aria-hidden="true"></i> Projects</h3>
		</div>
		<div class="col-md-7 align-self-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
				<li class="breadcrumb-item active">Projects</li>
			</ol>
		</div>
	</div>
	<div class="container-fluid p-4">

		<div class="row">
			<div class="col-lg-12 col-xlg-12 col-md-12">
				<div class="card">
					<!-- Nav tabs -->
					<div id="tabs">
						<ul class="nav nav-tabs profile-tab" role="tablist">
							<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"> Project View </a> </li>
							<!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tasks" role="tab">Projects tasks </a> </li> -->
							<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#office" role="tab">Projects tasks </a> </li>
							<!--<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#field" role="tab">Field tasks </a> </li>-->
							<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#education" role="tab"> Projects files</a> </li>
							<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#experience" role="tab"> Manager Comments </a> </li>
							<!-- Notes -->
							<?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#expenses" role="tab">
										Complete Task/Incentive Tokens
									</a>
								</li>
							<?php } else { ?>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#expenses" role="tab">
										Review Tasks/Award Tokens
									</a>
								</li>
							<?php } ?>
							<!-- Expenses -->
							<!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#logid" role="tab"> Logistic</a> </li> -->
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<div class="tab-pane active" id="home" role="tabpanel">
								<div class="row">
									<div class="col-md-4">

										<div class="card">
											<div class="card-body">
												<center class="m-t-30">
													<!--progress bar-->
													<div class="container">


													</div>
													<!--end progress-->
													<h1 class="card-title fs-30 m-t-10"><?php echo $details->pro_name; ?></h1>
												</center>
											</div>
											<div>
												<hr>
											</div>
											<div class="card-body"> <small class="text-muted">Start Date </small>
												<h6><?php echo $details->pro_start_date; ?></h6> <small class="text-muted p-t-30 db">End date</small>
												<h6><?php echo $details->pro_end_date; ?></h6> <small class="text-muted p-t-30 db">Status</small>
												<h6><?php echo $details->pro_status; ?></h6>

												<br />
											</div>
										</div>
									</div>
									<div class="col-md-8">
										<div class="card">
											<div class="card-body">
												<form method="post" action="Add_Projects" id="btnSubmit" enctype="multipart/form-data">
													<div class="modal-body">

														<div class="form-group">
															<label class="control-label">Project Title</label>
															<input type="text" name="protitle" <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?> readonly <?php } ?> value="<?php echo $details->pro_name; ?>" class="form-control" id="recipient-name1" minlength="8" maxlength="250" required>
														</div>
														<div class="form-group">
															<label class="control-label">Project Start Date</label>
															<input type="text" name="startdate" value="<?php echo $details->pro_start_date; ?>" <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?> readonly <?php } ?> class="form-control mydatepicker" id="recipient-name1" required>
														</div>
														<div class="form-group">
															<label class="control-label">Project End Date</label>
															<input type="text" name="enddate" value="<?php echo $details->pro_end_date; ?>" <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?> readonly <?php } ?> class="form-control mydatepicker" id="recipient-name1" required>
														</div>
														<div class="form-group">
															<label for="message-text" class="control-label">Project Summary</label>
															<textarea class="form-control" value="<?php echo $details->pro_summary; ?>" name="summery" rows="6" id="message-text1" minlength="5" <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?> readonly <?php } ?> maxlength="512"><?php echo $details->pro_summary; ?></textarea>
														</div>
														<div class="form-group">
															<label for="message-text" class="control-label">Details</label>
															<textarea class="form-control" rows="10" <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?> readonly <?php } ?> name="details" value="<?php echo $details->pro_description; ?>" id="message-text1" minlength="10" maxlength="1300"><?php echo $details->pro_description; ?></textarea>
														</div>
														<div class="form-group">
															<label class="control-label">Status</label>
															<select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="prostatus" <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?> readonly <?php } ?> required>
																<option value="<?php echo $details->pro_status; ?>"><?php echo $details->pro_status; ?></option>
																<option value="upcoming">Upcoming</option>
																<option value="complete">Complete</option>
																<option value="running">Running</option>
															</select>
														</div>

													</div>
													<div class="modal-footer">
														<input type="hidden" name="proid" value="<?php echo $details->id; ?>">
														<button type="button" class="btn-rounded btn-secondary" data-dismiss="modal">Close</button>
														<button type="submit" <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?> disabled <?php } ?> class="btn-rounded btn-info">Submit</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>

							</div>
							<!--second tab-->
							<div class="tab-pane" id="tasks" role="tabpanel">
								<div class="card">awarf
									<div class="card-body">
										<h3 class="card-title">Project tasks</h3>
										<div class="table-responsive " id="">
											<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>Id</th>
														<th>Task Title </th>
														<th>Start Date </th>
														<th>End Date </th>
														<th>Assigned users </th>
													</tr>
												</thead>
												<!-- <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Task Title </th>
                                    <th>Start Date </th>
                                    <th>End Date </th>
                                    <th>Assigned users </th>
                                </tr>
                            </tfoot> -->
												<tbody>
													<?php foreach ($tasklist as $value) : ?>
														<tr>
															<td><?php echo $value->id ?></td>
															<td><?php echo $value->task_title ?></td>
															<td><?php echo $value->start_date ?></td>
															<td><?php echo $value->end_date ?></td>
															<td>
																<?php
																$id = $value->id;
																$assignvalue = $this->project_model->getTaskAssignUser($id);  ?>
																<?php foreach ($assignvalue as $value1) : ?>
																	<img src="<?php echo base_url(); ?>assets/images/users/<?php echo $value1->em_image ?>" height="40px" width="40px" style="border-radius:50px" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $value1->user_type; ?>">
																	<?php $value1->user_type; ?>
																<?php endforeach; ?>
															</td>
														</tr>
													<?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="office" role="tabpanel">
								<div class="card">
									<div class="card-body">
										<h3 class="card-title">Office tasks</h3>
										<span class="pull-right">
											<?php if ($this->session->userdata('user_type') != 'EMPLOYEE') { ?>
												<a data-toggle="modal" data-target="#tasksmodel" data-whatever="@getbootstrap" class="text-white btn-rounded pb-2 btn-info"> Add Tasks</a></span> <?php } ?>
									<div class="table-responsive " id="">
										<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>Id</th>
													<th>Task Title </th>
													<th>Start Date </th>
													<th>End Date </th>
													<th>Assigned users </th>
													<th>Action </th>
												</tr>
											</thead>
											<!-- <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Task Title </th>
                                    <th>Start Date </th>
                                    <th>End Date </th>
                                    <th>Assigned users </th>
                                    <th>Action </th>
                                </tr>
                            </tfoot> -->
											<tbody>
												<?php foreach ($tasklist as $value) : ?>
													<tr>
														<td><?php echo $value->id ?></td>
														<td><?php echo $value->task_title ?></td>
														<td><?php echo $value->start_date ?></td>
														<td><?php echo $value->end_date ?></td>
														<td>
															<?php
															$id = $value->id;
															$assignvalue = $this->project_model->getTaskAssignUser($id);  ?>
															<?php foreach ($assignvalue as $value1) : ?>
																<?php if (!empty($value1->em_image)) { ?>
																	<img src="<?php echo base_url(); ?>assets/images/users/<?php echo $value1->em_image ?>" height="40px" width="40px" style="border-radius:50px" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $value1->user_type; ?>">
																<?php } else { ?>
																	<img src="<?php echo base_url(); ?>assets/images/users/user.png ?>" height="40px" width="40px" style="border-radius:50px" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $value1->user_type; ?>">
																<?php } ?>

															<?php endforeach; ?>
														</td>

														<?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>

														<?php } else { ?>
															<td class="jsgrid-align-center d-flex">
																<a href="#" title="Edit" class="btn-circle btn-info d-flex justify-content-center mr-3 align-items-center waves-effect waves-light taskmodal" data-id="<?php echo $value->id ?>"><i class="fa fa-pencil"></i></a>
																<a onclick="alert('Are you sure, you want to delete this?')" href="#" title="Delete" class="btn-circle btn-danger d-flex justify-content-center align-items-center waves-effect waves-light TasksDelet" data-id="<?php echo $value->id ?>"><i class="fa fa-trash-o"></i></a>
															</td>
														<?php } ?>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="field" role="tabpanel">
								<div class="card">
									<div class="card-body">
										<h3 class="card-title">Field tasks</h3>
										<span class="pull-right">
											<?php if ($this->session->userdata('user_type') != 'EMPLOYEE') { ?>
												<a data-toggle="modal" data-target="#fieldmodel" data-whatever="@getbootstrap" class="text-white btn btn-info"> Add Field visit</a></span> <?php } ?>
									<div class="table-responsive " id="">
										<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>Id</th>
													<th>Task Title </th>
													<th>Start Date </th>
													<th>End Date </th>
													<th>Assigned users </th>
													<th>Status </th>
												</tr>
											</thead>
											<!-- <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Task Title </th>
                                    <th>Start Date </th>
                                    <th>End Date </th>
                                    <th>Assigned users </th>
                                    <th>Status </th>
                                </tr>
                            </tfoot> -->
											<tbody>
												<?php foreach ($tasklist as $value) : ?>
													<tr>
														<td><?php echo $value->id ?></td>
														<td><?php echo $value->task_title ?></td>
														<td><?php echo $value->start_date ?></td>
														<td><?php echo $value->end_date ?></td>
														<td>
															<?php
															$id = $value->id;
															$assignvalue = $this->project_model->getTaskAssignUser($id);  ?>
															<?php foreach ($assignvalue as $value1) : ?>
																<img src="<?php echo base_url(); ?>assets/images/users/<?php echo $value1->em_image ?>" height="40px" width="40px" style="border-radius:50px" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $value1->user_type; ?>">
																<?php $value1->user_type; ?>
															<?php endforeach; ?>
														</td>

														<?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
															<!--                                       <td class="jsgrid-align-center ">  
                                        <a href="#" title="Edit" class="btn btn-sm btn-info waves-effect waves-light taskmodal" data-id="<?php #echo $value->id 
																																																																					?>"><i class="fa fa-pencil-square-o"></i></a>
                                        </td> -->
														<?php } else { ?>
															<td class="jsgrid-align-center ">
																<a href="#" title="Edit" class="btn btn-sm btn-primary waves-effect waves-light taskmodal" data-id="<?php echo $value->id ?>"><i class="fa fa-pencil-square-o"></i></a>
																<a onclick="alert('Are you sure, you want to delete this?')" href="#" title="Delete" class="btn btn-sm btn-info waves-effect waves-light TasksDelet" data-id="<?php echo $value->id ?>"><i class="fa fa-trash-o"></i></a>
															</td>
														<?php } ?>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="education" role="tabpanel">
								<div class="card">
									<div class="card-body">
										<div class="table-responsive ">
											<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>File details</th>
														<th>file</th>
														<th>Assigned Employee </th>
														<th>Action </th>
													</tr>
												</thead>
												<!-- <tfoot>
                                <tr>
                                    <th>File details</th>
                                    <th>file</th>
                                    <th>Assigned Employee </th>
                                    <th>Action </th>
                                </tr>
                            </tfoot> -->
												<tbody>
													<?php foreach ($files as $value) : ?>
														<tr>
															<td><?php echo $value->file_details ?></td>
															<td>
																<a href="<?php echo base_url(); ?>assets/images/projects/<?php echo $value->file_url ?>" title="" data-toggle="app-modal" data-sidebar="1" data-url="<?php echo base_url(); ?>assets/images/projects/<?php echo $value->file_url ?>"><?php echo $value->file_url ?></a>
															</td>
															<td><img src="<?php echo base_url(); ?>assets/images/users/<?php echo $value->em_image ?>" height="40px" width="40px" style="border-radius:50px" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $value->first_name; ?>">
															</td>

															<td class="jsgrid-align-center ">
																<?php if ($this->session->userdata('user_type') != 'EMPLOYEE') { ?>
																	<a href="#" title="Delete" class="btn btn-sm btn-info waves-effect waves-light filedelet" data-id="<?php echo $value->id ?>"><i class="fa fa-trash-o"></i></a>
																<?php } ?>
															</td>
														</tr>
													<?php endforeach; ?>
												</tbody>
											</table>
										</div>
										<?php if ($this->session->userdata('user_type') != 'EMPLOYEE') { ?>
											<form class="row" id="insert_education" action="Add_File" method="post" enctype="multipart/form-data">
												<span id="error"></span>
												<div class="form-group col-md-6 m-t-5">
													<label>File Name</label>
													<input type="text" class="form-control form-control-line" placeholder=" File description" name="details" required minlength="12">
												</div>
												<div class="form-group col-md-6 m-t-5">
													<label>Assign To</label>
													<select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="assignto" required>
														<?php
														$id = $details->id;
														echo $id;
														$assignvalue = $this->project_model->getProjectAssignUser($id);
														?>
														<?php foreach ($assignvalue as $value) : ?>
															<option value="<?php echo $value->em_id ?>"><?php echo $value->first_name . ' ' . $value->last_name; ?></option>
														<?php endforeach; ?>
													</select>
												</div>
												<div class="form-group col-md-6 m-t-5">
													<label>File</label>
													<input type="file" name="img_url" class="form-control form-control-line" placeholder=" Result" required>
												</div>
												<div class="form-actions col-md-6">
													<input type="hidden" name="proid" value="<?php echo $details->id; ?>">
													<button type="submit" class="btn-rounded btn-info"> <i class="fa fa-check"></i> Save</button>
													<button type="button" class="btn-rounded btn-secondary">Cancel</button>
												</div>
											</form>
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="experience" role="tabpanel">
								<div class="card">
									<div class="card-body">
										<div class="table-responsive ">
											<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>Note title</th>
														<th>Assigned users </th>
														<th>Status </th>
													</tr>
												</thead>
												<!-- <tfoot>
                                <tr>
                                    <th>Note title</th>
                                    <th>Assigned users </th>
                                    <th>Status </th>
                                </tr>
                            </tfoot> -->
												<tbody>
													<?php foreach ($notes as $value) : ?>
														<tr>
															<td><?php echo substr($value->details, 0, 60) . '...'; ?></td>
															<td><img src="<?php echo base_url(); ?>assets/images/users/<?php echo $value->em_image ?>" height="40px" width="40px" style="border-radius:50px" alt=""></td>
															<td class="jsgrid-align-center ">
																<a href="#" title="Edit" class="btn btn-sm btn-primary waves-effect waves-light notes" data-id="<?php echo $value->id ?>"><i class="fa fa-pencil-square-o"></i></a>
																<?php if ($this->session->userdata('user_type') != 'EMPLOYEE') { ?>
																	<a href="#" title="Delete" class="btn btn-sm btn-danger waves-effect waves-light notesdelet" data-id="<?php echo $value->id ?>"><i class="fa fa-trash-o"></i></a>
																<?php } ?>
															</td>
														</tr>
													<?php endforeach; ?>
												</tbody>
											</table>
										</div>
										<?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>

										<?php } else { ?>

											<form class="row" action="Add_Pro_Notes" method="post" enctype="multipart/form-data" id="notesform">
												<div class="form-group col-md-6 m-t-5">
													<label> notes</label>
													<input type="text" name="details" class="form-control form-control-line company_name" placeholder="Notes details">
												</div>
												<div class="form-group col-md-6 m-t-5">
													<label>Assign To</label>
													<select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="assignto">
														<?php
														$id = $details->id;
														echo $id;
														$assignvalue = $this->project_model->getProjectAssignUser($id);
														?>
														<?php foreach ($assignvalue as $value) : ?>
															<option value="<?php echo $value->em_id ?>"><?php echo $value->first_name . ' ' . $value->last_name; ?></option>
														<?php endforeach; ?>
													</select>
												</div>
												<div class="form-actions col-md-12">
													<input type="hidden" name="id" value="">
													<input type="hidden" name="proid" value="<?php echo $details->id; ?>">
													<button <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?> disabled <?php } ?> type="submit" class="btn-rounded btn-info"> <i class="fa fa-check"></i> Save</button>
													<button type="button" class="btn-rounded btn-secondary">Cancel</button>
												</div>
											</form>
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="expenses" role="tabpanel">
								<div class="card">
									<div class="card-body">
										<div class="table-responsive ">
											<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>Details</th>
														<th>Completed By </th>
														<th>Date </th>
														<th>Wallet Address </th>
														<th>Status </th>
													</tr>
												</thead>
												<!-- <tfoot>
                                <tr>
                                    <th>Details</th>
                                    <th>Assigned users </th>
                                    <th>Date </th>
                                    <th>Amount </th>
                                    <th>Status </th>
                                </tr>
                            </tfoot> -->
												<tbody>
													<?php foreach ($expenses as $value) : ?>
														<tr>
															<td><?php echo $value->details ?></td>

															<td><img src="<?php echo base_url(); ?>assets/images/users/<?php echo $value->em_image ?>" height="40px" width="40px" style="border-radius:50px" title="<?php echo $value->first_name . ' ' . $value->last_name ?>" alt=""></td>
															<td><?php echo $value->date ?></td>
															<td><?php echo $value->amount ?></td>
															<td class="jsgrid-align-center ">
																<?php if ($this->session->userdata('user_type') != 'EMPLOYEE') { ?>
																	<a href="#" title="Edit" class="btn btn-sm btn-primary waves-effect waves-light expenses" data-id="<?php echo $value->id ?>"><i class="fa fa-pencil-square-o"></i></a>
																	<a href="#" onclick="confirm('Are you sure to delete this value?')" title="Delete" class="btn btn-sm btn-danger waves-effect waves-light exdelet" data-id="<?php echo $value->id ?>"><i class="fa fa-trash-o"></i></a>
																<?php } ?>
															</td>
														</tr>
													<?php endforeach; ?>
												</tbody>
											</table>
											<?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
												<form class="row container-fluid" action="Add_Expenses" method="post" enctype="multipart/form-data" id="expenseform">
													<div class="form-group col-md-6 m-t-5">
														<label>Details</label>
														<input type="text" class="form-control form-control-line" placeholder="details..." name="details">
													</div>
													<div class="form-group col-md-6 m-t-5">
														<label>Completed By</label>
														<select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="assignto">

															<?php
															$id = $details->id;
															echo $id;
															$assignvalue = $this->project_model->getProjectAssignUser($id);
															?>
															<?php foreach ($assignvalue as $value) : ?>
																<option value="<?php echo $value->em_id ?>"><?php echo $value->first_name . ' ' . $value->last_name; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
													<div class="form-group col-md-6 m-t-5">
														<label>Wallet Address</label>
														<input type="text" class="form-control form-control-line" placeholder="Wallet Address" name="amount">
													</div>
													<div class="form-group col-md-6 m-t-5">
														<label>Date</label>
														<input type="text" class="form-control form-control-line mydatetimepickerFull" placeholder="" name="date" value>
													</div>
													<div class="form-actions col-md-12">
														<input type="hidden" name="id" value="">
														<input type="hidden" name="proid" value="<?php echo $details->id; ?>">
														<button type="submit" class="btn-rounded btn-info"> <i class="fa fa-check"></i> Save</button>
														<button type="button" class="btn-rounded btn-secondary">Cancel</button>
													</div>
												</form>
												<br>
												<hr>
												<h3>Login to Check your Credit Tokens(ETH)</h3>
												<button type="submit" class="btn-rounded btn-success" id="walletLogin" onclick="walletLogin()">Wallet Login</button>
												<p id="userWalletAddress" class="py-2"></p>

												<button type="button" class="btn-rounded btn-warning" onclick="getCreditPoints()">Check Incentive tokens</button>
												<p id="creditScore" class="py-2"></p>

											<?php } else { ?>
												<hr>
												<h3>Login to Distribute Credit Tokens(ETH)</h3>
												<button type="submit" class="btn-rounded btn-info" id="walletLogin" onclick="walletLogin()">Wallet Login</button>

												<p id="userWalletAddress"></p>

												<label for="exampleInputEmail1" class="font-weight-700 pt-3">Employee Wallet Address</label>
												<input type="email" class="form-control" id="employeeWalletAddress" aria-describedby="emailHelp" placeholder="Enter Employee Wallet Address">
												<small id="emailHelp" class="form-text text-muted">We'll never share your wallet address with anyone else.</small>
												<label for="exampleInputEmail1" class="font-weight-700 pt-4">Credit Tokens(ETH)</label>
												<input type="number" class="form-control" id="creditPoints" aria-describedby="emailHelp" placeholder="Enter Credit points">
												<small id="emailHelp" class="form-text text-muted">How many Tokens(ETH) would you like to award?</small>
												<button type="button" class="btn-rounded btn-warning" onclick="sendCreditPoints()">Award</button>

											<?php } ?>

										</div>
									</div>
								</div>
								</tbody>
								</table>
							</div>
						</div>
					</div>
				</div> -->
			</div>
		</div>
	</div>
</div>
<!-- Column -->
</div>
</div>

<?php $this->load->view('backend/pro_modal'); ?>

<!-- Veryyy Important WEB3 CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.6.1/web3.min.js" integrity="sha512-5erpERW8MxcHDF7Xea9eBQPiRtxbse70pFcaHJuOhdEBQeAxGQjUwgJbuBDWve+xP/u5IoJbKjyJk50qCnMD7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- CONTRACT ABI AND ADDRESS FOR CONTRACT INTAIALIZATION => contractConnect  -->
<script src="<?php echo base_url(); ?>assets/js/smartContract/contractCon.js">
</script>


<!-- Web3 setUp with ethereum -->
<script type="text/javascript">
	window.onload = async () => {
		if (window.ethereum) {
			window.web3 = new Web3(ethereum);
			console.log("hey web3 ethereum setup successfully");
		} else {
			alert("Please connect to your Metamask wallet");
		}
	};
	window.userAddress = null;

	// LOGGIN to metamask or Wallet
	async function walletLogin() {
		if (web3) {
			try {
				console.log("Web3 Available");
				await web3.currentProvider.enable()
				const accounts = await web3.eth.getAccounts();
				window.localStorage.setItem("userAddress", accounts[0]);
				window.userAddress = window.localStorage.getItem("userAddress");
				console.log(accounts);
				console.log();

				try {
					contractConnect();
					console.log("connected to contract successfully");
				} catch (error) {
					console.log(error, "erroe while connecting to contract");
				}
				contractConnect();
				showAddress()
			} catch (error) {
				console.log(error);
			}
		} else {
			alert("Please connect to your Metamask wallet")
		}
	}
	// Showing wallet address in p tag
	function showAddress() {
		console.log("showAddress funtion");
		if (window.userAddress != null)
			document.getElementById("userWalletAddress").innerText = `You're Logged into: ${window.userAddress}`
	}

	// Sending or Trasaction of credit points

	function sendCreditPoints() {
		console.log("Sending credit points");
		if (window.userAddress != null) {
			var employeeWalletAddress = document.getElementById("employeeWalletAddress").value
			var creditPoints = parseInt(document.getElementById("creditPoints").value)
			//  console.log(creditPoints);

			contract.methods.distributePoints(employeeWalletAddress, creditPoints).send({
				from: userAddress
			}).then(function(response) {
				console.log(response);
				console.log("Trasaction of credit points successful");
			})
		} else {
			alert("Please log in to Wallet first!!")
		}
	}

	function getCreditPoints() {
		if (window.userAddress != null) {
			console.log("Checking your points...");
			// let userWalletAddress = document.getElementById('userWalletAddress').innerText.toString().trim().substring(20)
			contract.methods.creditPoints(userAddress).call().then(function(res) {
				console.log(`Your Incentive Tokens ${res}`)
				document.getElementById("creditScore").innerHTML = `Your Incentive Tokens : <b>${res}</b>`
			})
		} else {
			alert('Please Login to wallet first!.')
		}
	}
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$(".notes").click(function(e) {
			e.preventDefault(e);
			// Get the record's ID via attribute  
			var iid = $(this).attr('data-id');
			$('#notesform').trigger("reset");
			$.ajax({
				url: 'NotesById?id=' + iid,
				method: 'GET',
				data: '',
				dataType: 'json',
			}).done(function(response) {
				console.log(response);
				// Populate the form fields with the data returned from server
				$('#notesform').find('[name="id"]').val(response.notesbyidvalue.id).end();
				$('#notesform').find('[name="details"]').val(response.notesbyidvalue.details).end();
				$('#notesform').find('[name="assignto"]').val(response.notesbyidvalue.assign_to).end();
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".expenses").click(function(e) {
			e.preventDefault(e);
			// Get the record's ID via attribute  
			var iid = $(this).attr('data-id');
			$('#expenseform').trigger("reset");
			$.ajax({
				url: 'ExpensesById?id=' + iid,
				method: 'GET',
				data: '',
				dataType: 'json',
			}).done(function(response) {
				console.log(response);
				// Populate the form fields with the data returned from server
				$('#expenseform').find('[name="id"]').val(response.expensesvalue.id).end();
				$('#expenseform').find('[name="details"]').val(response.expensesvalue.details).end();
				$('#expenseform').find('[name="assignto"]').val(response.expensesvalue.assign_to).end();
				$('#expenseform').find('[name="amount"]').val(response.expensesvalue.amount).end();
				$('#expenseform').find('[name="date"]').val(response.expensesvalue.date).end();
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#logisticeid").click(function(e) {
			e.preventDefault(e);
			// Get the record's ID via attribute  
			var iid = $(this).attr('data-id');
			$('#logisModalform').trigger("reset");
			$('#logisticmodel').modal('show');
			$.ajax({
				url: 'LogisTicById?id=' + iid,
				method: 'GET',
				data: '',
				dataType: 'json',
			}).done(function(response) {
				console.log(response);
				// Populate the form fields with the data returned from server
				$('#logisModalform').find('[name="id"]').val(response.logisticevalue.ass_id).end();
				$('#logisModalform').find('[name="proid"]').val(response.logisticevalue.project_id).end();
				$('#logisModalform').find('[name="teamhead"]').val(response.logisticevalue.assign_id).end();
				$('#logisModalform').find('[name="taskid"]').val(response.logisticevalue.task_id).end();
				$('#logisModalform').find('[name="startdate"]').val(response.logisticevalue.start_date).end();
				$('#logisModalform').find('[name="enddate"]').val(response.logisticevalue.end_date).end();
				$('#logisModalform').find('[name="remarks"]').val(response.logisticevalue.remarks).end();
				$('#logisModalform').find('[name="logistic"]').val(response.logisticevalue.asset_id).end();
				$('#logisModalform').find('[name="qty"]').val(response.logisticevalue.log_qty).end();
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".taskmodal").click(function(e) {
			e.preventDefault(e);
			// Get the record's ID via attribute  
			var iid = $(this).attr('data-id');
			$('#tasksModalform').trigger("reset");
			$('#tasksmodel').modal('show');
			$.ajax({
				url: 'TasksById?id=' + iid,
				method: 'GET',
				data: '',
				dataType: 'json',
			}).done(function(response) {
				console.log(response);
				// Populate the form fields with the data returned from server
				$('#tasksModalform').find('[name="id"]').val(response.tasksvalue.id).end();
				$('#tasksModalform').find('[name="projectid"]').val(response.tasksvalue.pro_id).end();
				$('#tasksModalform').find('[name="assignto[]"]').val(response.tasksvalue.assign_user).end();
				$('#tasksModalform').find('[name="tasktitle"]').val(response.tasksvalue.task_title).end();
				$('#tasksModalform').find('[name="startdate"]').val(response.tasksvalue.start_date).end();
				$('#tasksModalform').find('[name="enddate"]').val(response.tasksvalue.end_date).end();
				$('#tasksModalform').find('[name="details"]').val(response.tasksvalue.description).end();
				$('#tasksModalform').find('[name="status"]').val(response.tasksvalue.status).end();
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".TasksDelet").click(function(e) {
			e.preventDefault(e);
			// Get the record's ID via attribute  
			var iid = $(this).attr('data-id');
			$.ajax({
				url: 'TasksDeletByid?id=' + iid,
				method: 'GET',
				data: 'data',
			}).done(function(response) {
				console.log(response);
				$(".message").fadeIn('fast').delay(3000).fadeOut('fast').html(response);
				window.setTimeout(function() {
					location.reload()
				}, 2000)
				// Populate the form fields with the data returned from server
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".exdelet").click(function(e) {
			e.preventDefault(e);
			// Get the record's ID via attribute  
			var iid = $(this).attr('data-id');
			$.ajax({
				url: 'deletExpenses?D=' + iid,
				method: 'GET',
				data: 'data',
			}).done(function(response) {
				console.log(response);
				$(".message").fadeIn('fast').delay(3000).fadeOut('fast').html(response);
				window.setTimeout(function() {
					location.reload()
				}, 2000)
				// Populate the form fields with the data returned from server
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".notesdelet").click(function(e) {
			e.preventDefault(e);
			// Get the record's ID via attribute  
			var iid = $(this).attr('data-id');
			$.ajax({
				url: 'DeletNotes?D=' + iid,
				method: 'GET',
				data: 'data',
			}).done(function(response) {
				console.log(response);
				$(".message").fadeIn('fast').delay(3000).fadeOut('fast').html(response);
				window.setTimeout(function() {
					location.reload()
				}, 2000)
				// Populate the form fields with the data returned from server
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".filedelet").click(function(e) {
			e.preventDefault(e);
			// Get the record's ID via attribute  
			var iid = $(this).attr('data-id');
			$.ajax({
				url: 'FileDeletById?id=' + iid,
				method: 'GET',
				data: 'data',
			}).done(function(response) {
				console.log(response);
				$(".message").fadeIn('fast').delay(3000).fadeOut('fast').html(response);
				window.setTimeout(function() {
					location.reload()
				}, 2000)
				// Populate the form fields with the data returned from server
			});
		});
	});
</script>
<?php $this->load->view('backend/footer'); ?>