<?php include "inc/header.php"; ?>

<div class="page-content">

	<div class="row row-cols-1 row-cols-md-12 row-cols-xl-12">
		
		<?php 

		$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

			if ($do == 'Manage') {
		?>

		<h6 class="mb-0 text-uppercase">Manage All Category</h6>
		<hr/>
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
									<th>#sl</th>
									<th>Category Name</th>
									<th>Description</th>
									<th>Parent / Sub Category</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>

							<tbody>

								<?php 

									$sql = "SELECT * FROM category WHERE is_parent = 0 AND status = 1 ORDER BY name ASC";
									$allData = mysqli_query($db, $sql);
									$countData = mysqli_num_rows($allData);

									if ($countData == 0) {
										echo '<div class="alert alert-info">Sorry no data found form Database</div>';
									}
									else{

										$sl = 0;

										while ($row = mysqli_fetch_assoc($allData)){
											$id 				= $row['id'];
											$name 				= $row['name'];
											$description		= $row['description'];
											$is_parent 			= $row['is_parent'];
											$status 			= $row['status'];
											$sl++;
										
			
										?>

									<tr>
										<td><?php echo $sl; ?></td>
										<td><?php echo $name; ?></td>
										<td><?php echo $description; ?></td>
										<td>
											<?php
											if ($is_parent == 0) {
												echo '<span class="badge bg-primary">Parent Category</span>'; 
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
										<td>
											<ul class="list-unstyled list-group list-group-horizontal">
												<li class="">
													<a href="category.php?do=Edit&id=<?php echo $id; ?>">
														<i class="fadeIn animated bx bx-pencil text-important"></i>
													</a>
												</li>
												<li class="ms-3 ">
													<a href="" data-bs-toggle="modal" data-bs-target="#deleteCategory<?php echo $id; ?>">
														<i class="fadeIn animated bx bx-trash text-danger"></i>
													</a>
												</li>
											</ul>
										</td>
									</tr>

									<!-- Modal -->
									<div class="modal fade" id="deleteCategory<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h1 class="modal-title fs-5" id="exampleModalLabel">Are You Confirm to Delete this Category in trash?</h1>
									        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									      </div>
									      <div class="modal-body">
									        <div class="modal-action">
									        	<ul class="list-unstyled list-group list-group-horizontal">
									        		<li class="mx-auto">
									        			<a href="category.php?do=Trash&id=<?php echo $id; ?>" class="btn btn-danger btn-sm">Confirm</a>
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

									<!-- To Check Sub Category -->

									<?php 	

										$sql2 = "SELECT * FROM category WHERE is_parent ='$id' AND status = 1 ORDER BY name ASC";
										$allchData = mysqli_query($db, $sql2);
										while ($row = mysqli_fetch_assoc($allchData)) {
											$id 				= $row['id'];
											$name 				= $row['name'];
											$description		= $row['description'];
											$is_parent 			= $row['is_parent'];
											$status 			= $row['status'];
											$sl++;
										
									 ?>
									 	<tr>
										<td><?php echo $sl; ?></td>
										<td>-- <?php echo $name; ?></td>
										<td><?php echo $description; ?></td>
										<td>
											<?php
											if ($is_parent == 0) {
												echo '<span class="badge bg-primary">Parent Category</span>'; 
											}
											else{
												echo '<span class="badge bg-info">Child Category</span>';
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
										<td>
											<ul class="list-unstyled list-group list-group-horizontal">
												<li class="">
													<a href="category.php?do=Edit&id=<?php echo $id; ?>">
														<i class="fadeIn animated bx bx-pencil text-important"></i>
													</a>
												</li>
												<li class="ms-3 ">
													<a href="" data-bs-toggle="modal" data-bs-target="#deleteCategory<?php echo $id; ?>">
														<i class="fadeIn animated bx bx-trash text-danger"></i>
													</a>
												</li>
											</ul>
										</td>
									</tr>

									<!-- Modal -->
									<div class="modal fade" id="deleteCategory<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h1 class="modal-title fs-5" id="exampleModalLabel">Are You Confirm to Delete this Category in trash?</h1>
									        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									      </div>
									      <div class="modal-body">
									        <div class="modal-action">
									        	<ul class="list-unstyled list-group list-group-horizontal">
									        		<li class="mx-auto">
									        			<a href="category.php?do=Trash&id=<?php echo $id; ?>" class="btn btn-danger btn-sm">Confirm</a>
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

				<h6 class="mb-0 text-uppercase">Add New Category</h6>
				<hr/>
					<div class="card">
						<div class="card-body">
							<form action="category.php?do=Store" method="POST" enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-4">
										<div class="mb-3">
											<label>Category Name</label>
											<input type="name" name="name" class="form-control" placeholder="Enter your Full Name" required="required" autocomplete="off" autofocus />
										</div>

										<div class="mb-3">
											<label>Select Parent Category (If Any)</label>
											<select class="form-select" name="is_parent">
												<option>Please Seclect Parent Category</option>
												<?php 

													$sql = "SELECT * FROM category WHERE is_parent = 0 AND status = 1 ORDER BY name ASC ";
													$paCate = mysqli_query($db, $sql);
													while ($row = mysqli_fetch_assoc($paCate)){
														$paId 	= $row['id'];
														$paName = $row['name'];
														?>
														<option value="<?php echo $paId; ?>"><?php echo $paName; ?></option>

													<?php
													}
												 ?>
												
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
											<textarea class="form-control" rows="5" name="description"></textarea>
										</div>								
									</div>

									<div class="col-lg-4">
										<div class="mb-3">
											<input type="submit" name="addCategory" value="Add New Category" class="btn btn-primary">
										</div>

									</div>

								</div>
							</form>
						</div>
					</div>

				<?php
				}
				elseif ($do == 'Store') {
					if (isset($_POST['addCategory'])) {
						
						$name 				= mysqli_real_escape_string ( $db, $_POST['name']);
						$description		= mysqli_real_escape_string ( $db, $_POST['description']);
						$is_parent 			= mysqli_real_escape_string ( $db, $_POST['is_parent']);
						$status 			= mysqli_real_escape_string ( $db, $_POST['status']);
							
						$sql = "INSERT INTO category ( name, description, is_parent, status ) VALUES ( '$name', '$description', '$is_parent', '$status')";
						
						$dataInsert = mysqli_query($db, $sql);

						if ($dataInsert) {
							header("Location: category.php?do=Manage");
						}
						else{
							die("Mysqli Error." . mysqli_error($db));
						}

					}
				}


				elseif ($do == 'Edit') {
					if (isset($_GET['id'])) {
						$updateID = $_GET['id'];

						$sql = "SELECT * FROM category WHERE id = '$updateID'";
						$readData = mysqli_query($db, $sql);

						while ($row = mysqli_fetch_assoc($readData)){
							$id 				= $row['id'];
							$name 				= $row['name'];
							$description		= $row['description'];
							$is_parent 			= $row['is_parent'];
							$status 			= $row['status'];
							
							?>

							<h6 class="mb-0 text-uppercase">Update Category Information</h6>
							<hr/>
								<div class="card">
									<div class="card-body">
										
										<form action="category.php?do=Update" method="POST" enctype="multipart/form-data">
											<input type="hidden" name="upID" value="<?php echo $id; ?>" />
											<div class="row">
												<div class="col-lg-4">
													<div class="mb-3">
														<label>Category Name</label>
														<input type="name" name="name" class="form-control" placeholder="Enter your Full Name" value="<?php echo $name; ?>" required="required" autocomplete="off" autofocus />
													</div>

												<div class="mb-3">
													<label>Select Parent Category (If Any)</label>
													<select class="form-select" name="is_parent">
														<option value="0">Please Seclect Parent Category</option>
														<?php 

															$sql = "SELECT * FROM category WHERE is_parent = 0 AND status = 1 ORDER BY name ASC ";
															$paCate = mysqli_query($db, $sql);
															while ($row = mysqli_fetch_assoc($paCate)){
																$paId 	= $row['id'];
																$paName = $row['name'];
																?>
																<option value="<?php echo $paId; ?>" <?php if ($paId == $is_parent) {
																	echo 'selected';
																} ?>><?php echo $paName; ?></option>

															<?php
															}
														 ?>
														
													</select>
												</div>

												<div class="mb-3">
													<label>Category Status</label>
													<select class="form-select" name="status">
														<option>Please Select Caregory Status</option>
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
														<textarea class="form-control" rows="5" name="description"><?php echo $description; ?></textarea>
													</div>								
												</div>

												<div class="col-lg-4">
													<div class="mb-3">
														<input type="submit" name="updateCategory" value="Update Category" class="btn btn-primary">
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
					if (isset($_POST['updateCategory'])) {
						$upID 				= mysqli_real_escape_string ( $db, $_POST['upID']);
						$name 				= mysqli_real_escape_string ( $db, $_POST['name']);
						$description		= mysqli_real_escape_string ( $db, $_POST['description']);
						$is_parent 			= mysqli_real_escape_string ( $db, $_POST['is_parent']);
						$status 			= mysqli_real_escape_string ( $db, $_POST['status']);

						//Update All Category
						$sql = "UPDATE category SET name='$name', description='$description', is_parent='$is_parent', status='$status' WHERE id = '$upID'";
						echo $sql;

						$updateData = mysqli_query($db, $sql);

						if ($updateData) {
							header('Location: category.php?do=Manage');
						}
						else{
							die("Mysqli Failed." . mysqli_error($db));
						}
					}
				}


				elseif ($do == 'Trash') {
					if (isset($_GET['id'])) {
						$trashID = $_GET['id'];

						$sql = "UPDATE category SET status = '2' WHERE id = '$trashID'";

						$trashData = mysqli_query($db, $sql);

						if ($trashData) {
							header('Location: category.php?do=Manage');
						}
						else{
							die("Mysqli Failed to Connect" . mysqli_error($db));
						}
					}
				}

				elseif ($do == 'ManageTrash') {
				?>

				<h6 class="mb-0 text-uppercase">Manage All Trash Category</h6>
				<hr/>
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table id="example" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>	
											<th>#sl</th>
											<th>Category Name</th>
											<th>Description</th>
											<th>Parent / Sub Category</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody>

										<?php 

											$sql = "SELECT * FROM category WHERE status = 2 ORDER BY name ASC";
											$allData = mysqli_query($db, $sql);
											$countData = mysqli_num_rows($allData);

											if ($countData == 0) {
												echo '<div class="alert alert-info">Sorry no data found form Database</div>';
											}
											else{

												$sl = 0;

												while ($row = mysqli_fetch_assoc($allData)){
													$id 				= $row['id'];
													$name 				= $row['name'];
													$description		= $row['description'];
													$is_parent 			= $row['is_parent'];
													$status 			= $row['status'];
													$sl++;
												
					
												?>

												<tr>
											<td><?php echo $sl; ?></td>
											<td><?php echo $name; ?></td>
											<td><?php echo $description; ?></td>
											<td>
												
											<?php
											if ($is_parent == 0) {
												echo '<span class="badge bg-primary">Parent Category</span>'; 
											}
											else{
												echo '<span class="badge bg-info">Child Category</span>';
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
											<td>
												<ul class="list-unstyled list-group list-group-horizontal">
													<li class="">
														<a href="category.php?do=Edit&id=<?php echo $id; ?>">
															<i class="fadeIn animated bx bx-pencil text-important"></i>
														</a>
													</li>
													<li class="ms-3 ">
														<a href="" data-bs-toggle="modal" data-bs-target="#deleteCategory<?php echo $id; ?>">
															<i class="fadeIn animated bx bx-trash text-danger"></i>
														</a>
													</li>
												</ul>
											</td>
										</tr>

											<!-- Modal -->
											<div class="modal fade" id="deleteCategory<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  <div class="modal-dialog">
											    <div class="modal-content">
											      <div class="modal-header">
											        <h1 class="modal-title fs-5" id="exampleModalLabel">Are You Confirm to Delete this Category in trash?</h1>
											        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											      </div>
											      <div class="modal-body">
											        <div class="modal-action">
											        	<ul class="list-unstyled list-group list-group-horizontal">
											        		<li class="mx-auto">
											        			<a href="category.php?do=Delete&id=<?php echo $id; ?>" class="btn btn-danger btn-sm">Confirm</a>
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

						$sql = "DELETE FROM category WHERE id = '$deleteID'";

						$deleteData = mysqli_query($db, $sql);

						if ($deleteData) {
							header('Location: category.php?do=ManageTrash');
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
		