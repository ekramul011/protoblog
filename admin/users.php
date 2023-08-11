<?php include "inc/header.php"; ?>

			<div class="page-content">

					<div class="row row-cols-1 row-cols-md-12 row-cols-xl-12">
						
						<?php 

						$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

							if ($do == 'Manage') {
						?>

						<h6 class="mb-0 text-uppercase">Manage All Users</h6>
						<hr/>
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table id="example" class="table table-striped table-bordered" style="width:100%">
											<thead>
												<tr>
													<th>id</th>
													<th>Image</th>
													<th>Name</th>
													<th>Email Address</th>
													<th>Phone Number</th>
													<th>Address</th>
													<th>Role</th>
													<th>Status</th>
													<th>Join Date</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>

												<?php 

													$sql = "SELECT * FROM users WHERE status = 1 ORDER BY name ASC";
													$allData = mysqli_query($db, $sql);
													$countData = mysqli_num_rows($allData);

													if ($countData == 0) {
														echo '<div class="alert alert-info">Sorry no data found form Database</div>';
													}
													else{

														$sl = 0;

														while ($row = mysqli_fetch_assoc($allData)){
															$id 		= $row['id'];
															$name 		= $row['name'];
															$email		= $row['email'];
															$password 	= $row['password'];
															$phone 		= $row['phone'];
															$address 	= $row['address'];
															$role 		= $row['role'];
															$status 	= $row['status'];
															$image	 	= $row['image'];
															$join_date 	= $row['join_date'];
															$sl++;
														
							
														?>

														<tr>
													<td><?php echo $sl; ?></td>
													<td>
														<?php 

														if (!empty($image)) {
															echo '<img src="assets/images/users/'. $image .'" style="width:40px;">';
														}
														else{
															echo '<img src="assets/images/users/default.png'. $image .'" style="width:40px;">';
														}

														 ?>
													</td>
													<td><?php echo $name; ?></td>
													<td><?php echo $email; ?></td>
													<td><?php echo $phone; ?></td>
													<td><?php echo $address; ?></td>
													<td>

														<?php

														if ($role == 1) {
															echo '<div class="badge bg-info">Admin</div>';
														}
														elseif($role == 2){
															echo '<div class="badge bg-primary">User</div>';
														}

														?>
														
													</td>
													<td>
														<?php

														if ($status == 1) {
															echo '<div class="badge bg-success">Active</div>';
														}
														elseif($status == 2){
															echo '<div class="badge bg-danger">Inactive</div>';
														}

														?>
													</td>
													<td><?php echo $join_date; ?></td>
													<td>
														<ul class="list-unstyled list-group list-group-horizontal">
															<li class="">
																<a href="users.php?do=Edit&id=<?php echo $id; ?>">
																	<i class="fadeIn animated bx bx-pencil text-important"></i>
																</a>
															</li>
															<li class="ms-3 ">
																<a href="" data-bs-toggle="modal" data-bs-target="#deleteUser<?php echo $id; ?>">
																	<i class="fadeIn animated bx bx-trash text-danger"></i>
																</a>
															</li>
														</ul>
													</td>
												</tr>

													<!-- Modal -->
													<div class="modal fade" id="deleteUser<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
													  <div class="modal-dialog">
													    <div class="modal-content">
													      <div class="modal-header">
													        <h1 class="modal-title fs-5" id="exampleModalLabel">Are You Confirm to Delete this user in trash?</h1>
													        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													      </div>
													      <div class="modal-body">
													        <div class="modal-action">
													        	<ul class="list-unstyled list-group list-group-horizontal">
													        		<li class="mx-auto">
													        			<a href="users.php?do=Trash&id=<?php echo $id; ?>" class="btn btn-danger btn-sm">Confirm</a>
													        		</li>
													        		<li class="mx-auto">
													        			<a href="" class="btn btn-info btn-sm" data-bs-dismiss="modal">Cancel</a>
													        		</li>
													        	</ul>
													        </div>
													      </div>

													    </div>
													  </div>
													</div>


												<?php
													}
												}
												 ?>	

											</tbody>
										</table>
									</div>
								</div>
							</div>

							<?php

								}
								elseif ($do == 'Add') {
								?>

								<h6 class="mb-0 text-uppercase">Add New User</h6>
								<hr/>
									<div class="card">
										<div class="card-body">
											<form action="users.php?do=Store" method="POST" enctype="multipart/form-data">
												<div class="row">
													<div class="col-lg-4">
														<div class="mb-3">
															<label>Full Name</label>
															<input type="name" name="name" class="form-control" placeholder="Enter your Full Name" required="required" autocomplete="off" autofocus />
														</div>

														<div class="mb-3">
															<label>Email Address</label>
															<input type="email" name="email" class="form-control" placeholder="Enter your Email Address" required="required" autocomplete="off" autofocus />
														</div>

														<div class="mb-3">
															<label>Password</label>
															<input type="password" name="password" class="form-control" placeholder="Enter your Password" required="required" autocomplete="off" autofocus />
														</div>

														<div class="mb-3">
															<label>Confirm Password</label>
															<input type="password" name="confirm_password" class="form-control" placeholder="Enter your Password Again" required="required" autocomplete="off" autofocus />
														</div>

													</div>

													<div class="col-lg-4">
														<div class="mb-3">
															<label>Phone</label>
															<input type="text" name="phone" class="form-control" placeholder="Enter your Phone Number" autocomplete="off" autofocus />
														</div>

														<div class="mb-3">
															<label>Address</label>
															<input type="text" name="address" class="form-control" placeholder="Enter your Address" autocomplete="off" autofocus />
														</div>

														<div class="mb-3">
															<label>Role</label>
															<select class="form-select" name="role">
																<option>Please Seclect your Role</option>
																<option value="1">Admin</option>
																<option value="2">User</option>
															</select>
														</div>

														<div class="mb-3">
															<label>Status</label>
															<select class="form-select" name="status">
																<option>Please Seclect Account Status</option>
																<option value="1">Active</option>
																<option value="2">Inactive</option>
															</select>
														</div>
													</div>

													<div class="col-lg-4">
														<div class="mb-3">
															<label>Image</label>
															<input type="file" name="image" class="form-control">
														</div>

														<div class="mb-3">
															<input type="submit" name="addUser" value="Add New User" class="btn btn-primary">
														</div>

													</div>

												</div>
											</form>
										</div>
									</div>

								<?php
								}
								elseif ($do == 'Store') {
									if (isset($_POST['addUser'])) {
										
										$name 		= mysqli_real_escape_string ( $db, $_POST['name']);
										$email		= mysqli_real_escape_string ( $db, $_POST['email']);
										$password 	= mysqli_real_escape_string ( $db, $_POST['password']);
										$confirm_password 	= mysqli_real_escape_string ( $db, $_POST['confirm_password']);
										$phone 		= mysqli_real_escape_string ( $db, $_POST['phone']);
										$address 	= mysqli_real_escape_string ( $db, $_POST['address']);
										$role 		= mysqli_real_escape_string ( $db, $_POST['role']);
										$status 	= mysqli_real_escape_string ( $db, $_POST['status']);


											//we will image work soon
										$image = $_FILES['image']['name'];
										$img_tmp = $_FILES['image']['tmp_name'];

										

										if ($password == $confirm_password) {
											$hashedPass = sha1($password);

											if (!empty($image)) {
											$img = rand(1,9999999) . $image;
											move_uploaded_file($img_tmp, "C:/xampp/htdocs/shikhbe_sobai/project_one/admin/assets/images/users/".$img);
											}
											else{
												$img = '';
											}
											
											$sql = "INSERT INTO users ( name, email, password, phone, address, role, status, image, join_date ) VALUES ( '$name', '$email', '$hashedPass', '$phone', '$address', '$role', '$status', '$img', now() )";
											
											$dataInsert = mysqli_query($db, $sql);

											if ($dataInsert) {
												header("Location: users.php?do=Manage");
											}
											else{
												die("Mysqli Error." . mysqli_error($db));
											}
										}

									}
								}


								elseif ($do == 'Edit') {
									if (isset($_GET['id'])) {
										$updateID = $_GET['id'];

										$sql = "SELECT * FROM users WHERE id = '$updateID'";
										$readData = mysqli_query($db, $sql);

										while ($row = mysqli_fetch_assoc($readData)){
											$id 		= $row['id'];
											$name 		= $row['name'];
											$email		= $row['email'];
											$password 	= $row['password'];
											$phone 		= $row['phone'];
											$address 	= $row['address'];
											$role 		= $row['role'];
											$status 	= $row['status'];
											$image 		= $row['image'];
											
											?>

											<h6 class="mb-0 text-uppercase">Update User Information</h6>
											<hr/>
												<div class="card">
													<div class="card-body">
														
														<form action="users.php?do=Update" method="POST" enctype="multipart/form-data">
															<input type="hidden" name="upID" value="<?php echo $id; ?>" />
															<div class="row">
																<div class="col-lg-4">
																	<div class="mb-3">
																		<label>Full Name</label>
																		<input type="name" name="name" class="form-control" value="<?php echo $name; ?>" required="required" autocomplete="off" autofocus />
																	</div>

																	<div class="mb-3">
																		<label>Email Address</label>
																		<input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required="required" autocomplete="off" autofocus />
																	</div>

																	<div class="mb-3">
																		<label>Password</label>
																		<input type="password" name="password" class="form-control" placeholder="Enter your Password" autocomplete="off" autofocus />
																	</div>

																	<div class="mb-3">
																		<label>Confirm Password</label>
																		<input type="password" name="confirm_password" class="form-control" placeholder="Enter your Password Again" autocomplete="off" autofocus />
																	</div>

																</div>

																<div class="col-lg-4">
																	<div class="mb-3">
																		<label>Phone</label>
																		<input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>" autocomplete="off" autofocus />
																	</div>

																	<div class="mb-3">
																		<label>Address</label>
																		<input type="text" name="address" class="form-control" value="<?php echo $address; ?>" autocomplete="off" autofocus />
																	</div>

																	<div class="mb-3">
																		<label>Role</label>
																		<select class="form-select" name="role">
																			<option>Please Seclect your Role</option>
																			<option value="1" <?php if ($role == 1) {
																				echo 'selected';
																			} ?>>Admin</option>
																			<option value="2" <?php if ($role == 2) {
																				echo 'selected';
																			} ?>>User</option>
																		</select>
																	</div>

																	<div class="mb-3">
																		<label>Status</label>
																		<select class="form-select" name="status">
																			<option>Please Select Account Status</option>
																			<option value="1" <?php if ($status == 1) {
																				echo "selected";
																			} ?>>Active</option>
																			<option value="2" <?php if ($status == 2) {
																				echo "selected";
																			} ?>>Inactive</option>
																		</select>
																	</div>
																</div>

																<div class="col-lg-4">
																	<div class="mb-3">
																		<label>Image</label>
																		<input type="file" name="image" class="form-control">
																	</div>

																	<div class="mb-3">
																		<input type="submit" name="updateUser" value="Update Information" class="btn btn-primary">
																	</div>

																</div>

															</div>
														</form>
													</div>
												</div>

											<?php
										}
									}
								}


								elseif ($do == 'Update') {
									if (isset($_POST['updateUser'])) {
										$upID 		=   $_POST['upID'];
										$name 		= mysqli_real_escape_string ( $db, $_POST['name']);
										$email		= mysqli_real_escape_string ( $db, $_POST['email']);
										$password 	= mysqli_real_escape_string ( $db, $_POST['password']);
										$confirm_password 	= mysqli_real_escape_string ( $db, $_POST['confirm_password']);
										$phone 		= mysqli_real_escape_string ( $db, $_POST['phone']);
										$address 	= mysqli_real_escape_string ( $db, $_POST['address']);
										$role 		= mysqli_real_escape_string ( $db, $_POST['role']);
										$status 	= mysqli_real_escape_string ( $db, $_POST['status']);
										
										if (!empty($password)) {

											if ($password == $confirm_password) {
												$hashedPass = sha1($password);

												//Update All The Data with Password
												$sql = "UPDATE users SET name='$name', email='$email', password='$hashedPass', phone='$phone', address='$address', role='$role', status='$status' WHERE id = '$upID'";
												echo $sql;

												$updateData = mysqli_query($db, $sql);

												if ($updateData) {
													header('Location: users.php?do=Manage');
												}
												else{
													die("Mysqli Failed." . mysqli_error($db));
												}
										  	}
										}
										else{
											//Update All The Data without Password
											$sql = "UPDATE users SET name='$name', email='$email', phone='$phone', address='$address', role='$role', status='$status' WHERE id = '$upID'";
											echo $sql;

											$updateData = mysqli_query($db, $sql);

											if ($updateData) {
												
												header('Location: users.php?do=Manage');
											}
											else{
												die("Mysqli Failed." . mysqli_error($db));
											}
										}
									}
								}


								elseif ($do == 'Trash') {
									if (isset($_GET['id'])) {
										$trashID = $_GET['id'];

										$sql = "UPDATE users SET status = '2' WHERE id = '$trashID'";

										$trashData = mysqli_query($db, $sql);

										if ($trashData) {
											header('Location: users.php?do=Manage');
										}
										else{
											die("Mysqli Failed to Connect" . mysqli_error($db));
										}
									}
								}

								elseif ($do == 'ManageTrash') {
								?>

								<h6 class="mb-0 text-uppercase">Manage All Trash Users</h6>
								<hr/>
									<div class="card">
										<div class="card-body">
											<div class="table-responsive">
												<table id="example" class="table table-striped table-bordered" style="width:100%">
													<thead>
														<tr>
															<th>id</th>
															<th>Image</th>
															<th>Name</th>
															<th>Email Address</th>
															<th>Phone Number</th>
															<th>Address</th>
															<th>Role</th>
															<th>Status</th>
															<th>Join Date</th>
															<th>Action</th>
														</tr>
													</thead>

													<tbody>

														<?php 

															$sql = "SELECT * FROM users WHERE status = 2 ORDER BY name ASC";
															$allData = mysqli_query($db, $sql);
															$countData = mysqli_num_rows($allData);

															if ($countData == 0) {
																echo '<div class="alert alert-info">Sorry no data found form Database</div>';
															}
															else{

																$sl = 0;

																while ($row = mysqli_fetch_assoc($allData)){
																	$id 		= $row['id'];
																	$name 		= $row['name'];
																	$email		= $row['email'];
																	$password 	= $row['password'];
																	$phone 		= $row['phone'];
																	$address 	= $row['address'];
																	$role 		= $row['role'];
																	$status 	= $row['status'];
																	$join_date 	= $row['join_date'];
																	$sl++;
																
									
																?>

																<tr>
															<td><?php echo $sl; ?></td>
															<td>Image</td>
															<td><?php echo $name; ?></td>
															<td><?php echo $email; ?></td>
															<td><?php echo $phone; ?></td>
															<td><?php echo $address; ?></td>
															<td>

																<?php

																if ($role == 1) {
																	echo '<div class="badge bg-info">Admin</div>';
																}
																elseif($role == 2){
																	echo '<div class="badge bg-primary">User</div>';
																}

																?>
																
															</td>
															<td>
																<?php

																if ($status == 1) {
																	echo '<div class="badge bg-success">Active</div>';
																}
																elseif($status == 2){
																	echo '<div class="badge bg-danger">Inactive</div>';
																}

																?>
															</td>
															<td><?php echo $join_date; ?></td>
															<td>
																<ul class="list-unstyled list-group list-group-horizontal">
																	<li class="">
																		<a href="users.php?do=Edit&id=<?php echo $id; ?>">
																			<i class="fadeIn animated bx bx-pencil text-important"></i>
																		</a>
																	</li>
																	<li class="ms-3 ">
																		<a href="" data-bs-toggle="modal" data-bs-target="#deleteUser<?php echo $id; ?>">
																			<i class="fadeIn animated bx bx-trash text-danger"></i>
																		</a>
																	</li>
																</ul>
															</td>
														</tr>

															<!-- Modal -->
															<div class="modal fade" id="deleteUser<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
															  <div class="modal-dialog">
															    <div class="modal-content">
															      <div class="modal-header">
															        <h1 class="modal-title fs-5" id="exampleModalLabel">Are You Confirm to Delete this user in trash?</h1>
															        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															      </div>
															      <div class="modal-body">
															        <div class="modal-action">
															        	<ul class="list-unstyled list-group list-group-horizontal">
															        		<li class="mx-auto">
															        			<a href="users.php?do=Delete&id=<?php echo $id; ?>" class="btn btn-danger btn-sm">Confirm</a>
															        		</li>
															        		<li class="mx-auto">
															        			<a href="" class="btn btn-info btn-sm" data-bs-dismiss="modal">Cancel</a>
															        		</li>
															        	</ul>
															        </div>
															      </div>

															    </div>
															  </div>
															</div>


														<?php
															}
														}
														 ?>	

													</tbody>
												</table>
											</div>
										</div>
									</div>

									<?php

										}

								elseif ($do == 'Delete') {
									if (isset($_GET['id'])) {
										$deleteID = $_GET['id'];

										$sql = "DELETE FROM users WHERE id = '$deleteID'";

										$deleteData = mysqli_query($db, $sql);

										if ($deleteData) {
											header('Location: users.php?do=ManageTrash');
										}
										else{
											die("Mysqli Failed to Connect" . mysqli_error($db));
										}
									}
								}

								else
								{
									echo '<div class="alert alert-warning">Sorry you trying access wrong url</div>';
								}


						

							?>
						
					</div>
				
			</div>

<?php include "inc/footer.php"; ?>			
		