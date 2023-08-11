<?php include "inc/header.php"; ?>

	<div class="page-content">

		<div class="row row-cols-1 row-cols-md-12 row-cols-xl-12">
			
			<?php 

			$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

				if ($do == 'Manage') {
			?>

			<h6 class="mb-0 text-uppercase">Manage All Comments</h6>
			<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>#SL.</th>
										<th>Post Title</th>
										<th>User Name</th>
										<th>Comments</th>
										<th>Status</th>
										<th>Comments Date</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody>

									<?php 

										$sql = "SELECT * FROM comments WHERE status = 1 ORDER BY id DESC";
										$allData = mysqli_query($db, $sql);
										$countData = mysqli_num_rows($allData);

										if ($countData == 0) {
											echo '<div class="alert alert-info">Sorry no Comments found form Database</div>';
										}
										else{

											$sl = 0;

											while ($row = mysqli_fetch_assoc($allData)){
												$id 				= $row['id'];
												$postID 			= $row['postID'];
												$userID				= $row['userID'];
												$comments 			= $row['comments'];
												$status 			= $row['status'];
												$cmt_date 			= $row['cmt_date'];
												$sl++;
											
				
											?>

										<tr>
											<td><?php echo $sl; ?></td>
											<td>
												<?php 
													$sqlPost = "SELECT * FROM post WHERE id = '$postID' ";
													$postData = mysqli_query($db, $sqlPost);
													while ($row = mysqli_fetch_assoc($postData)) {
														$postId 		= $row['id'];
														$postTitle 		= $row['title'];

														echo $postTitle;
													}
												?>
											</td>
											<td>
												<?php 
													$sqlUser = "SELECT * FROM users WHERE id = '$userID' ";
													$userData = mysqli_query($db, $sqlUser);
													while ($row = mysqli_fetch_assoc($userData)) {
														$userId 		= $row['id'];
														$userName 		= $row['name'];

														echo $userName;
													}
												?>
											</td>
											<td><?php echo substr($comments, 0, 45); ?></td>
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
											<td><?php echo $cmt_date; ?></td>
											<td>
												<ul class="list-unstyled list-group list-group-horizontal">
													<li class="">
														<a href="comments.php?do=Edit&id=<?php echo $id; ?>">
															<i class="fadeIn animated bx bx-pencil text-important"></i>
														</a>
													</li>
													<li class="ms-3 ">
														<a href="" data-bs-toggle="modal" data-bs-target="#deleteComment<?php echo $id; ?>">
															<i class="fadeIn animated bx bx-trash text-danger"></i>
														</a>
													</li>
												</ul>
											</td>
										</tr>

										<!-- Modal -->
										<div class="modal fade" id="deleteComment<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h1 class="modal-title fs-5" id="exampleModalLabel">Are You Confirm to Delete this Comment in trash?</h1>
										        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										      </div>
										      <div class="modal-body">
										        <div class="modal-action">
										        	<ul class="list-unstyled list-group list-group-horizontal">
										        		<li class="mx-auto">
										        			<a href="comments.php?do=Trash&id=<?php echo $id; ?>" class="btn btn-danger btn-sm">Confirm</a>
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
					elseif ($do == 'Edit') {
						if (isset($_GET['id'])) {
							$updateID = $_GET['id'];

							$sql = "SELECT * FROM comments WHERE id = '$updateID'";
							$readData = mysqli_query($db, $sql);

							while ($row = mysqli_fetch_assoc($readData)){
								$id 				= $row['id'];
								$postID 			= $row['postID'];
								$userID				= $row['userID'];
								$comments 			= $row['comments'];
								$status 			= $row['status'];
								$cmt_date 			= $row['cmt_date'];
								
								?>

								<h6 class="mb-0 text-uppercase">Update Comments Information</h6>
								<hr/>
									<div class="card">
										<div class="card-body">
											<form action="comments.php?do=Update" method="POST" enctype="multipart/form-data">
												<input type="hidden" name="upID" value="<?php echo $id; ?>" />
												<div class="row">
													<div class="col-lg-4">
														<div class="mb-3">
															<label>Post Title</label>
															<input type="name" name="title" class="form-control"
															value=
															"<?php 
																$sqlPost = "SELECT * FROM post WHERE id = '$postID' ";
																$postData = mysqli_query($db, $sqlPost);
																while ($row = mysqli_fetch_assoc($postData)) {
																	$postId 		= $row['id'];
																	$postTitle 		= $row['title'];

																	echo $postTitle;
																}
															?>" 
															required="required" autocomplete="off" readonly />
														</div>

														<div class="mb-3">
															<label>Status</label>
															<select class="form-select" name="status" autofocus >
																<option>Please Seclect Comment Status</option>
																<option value="1"<?php if ($status == 1) {
																	echo 'selected';
																} ?>>Active</option>
																<option value="2"<?php if ($status == 2) {
																	echo 'selected';
																} ?>>Inactive</option>
															</select>
														</div>

													</div>

													<div class="col-lg-8">
														

													</div>

													<div class="col-lg-12">
														<div class="mb-3">
															<input type="submit" name="updateComment" value="Update Post" class="btn btn-primary">
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
						if (isset($_POST['updateComment'])) {
							$upID 			= $_POST['upID'];
							$status 		= mysqli_real_escape_string ( $db, $_POST['status']);

								//Update Comment Data
								$sql = "UPDATE comments SET status='$status' WHERE id = '$upID'";
								echo $sql;

								$updateData = mysqli_query($db, $sql);

								if ($updateData) {
									header('Location: comments.php?do=Manage');
								}
								else{
									die("Mysqli Failed." . mysqli_error($db));
								}

						}
					}


					elseif ($do == 'Trash') {
						if (isset($_GET['id'])) {
							$trashID = $_GET['id'];

							$sql = "UPDATE comments SET status = '2' WHERE id = '$trashID'";

							$trashData = mysqli_query($db, $sql);

							if ($trashData) {
								header('Location: comments.php?do=Manage');
							}
							else{
								die("Mysqli Failed to Connect" . mysqli_error($db));
							}
						}
					}

					elseif ($do == 'ManageTrash') {
						?>

						<h6 class="mb-0 text-uppercase">Manage All Trash Post</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>#SL.</th>
												<th>Post Title</th>
												<th>User Name</th>
												<th>Comments</th>
												<th>Status</th>
												<th>Comments Date</th>
												<th>Action</th>
											</tr>
										</thead>

										<tbody>

											<?php 

												$sql = "SELECT * FROM comments WHERE status = 2 ORDER BY id DESC";
												$allData = mysqli_query($db, $sql);
												$countData = mysqli_num_rows($allData);

												if ($countData == 0) {
													echo '<div class="alert alert-info">Sorry no Comments found form Database</div>';
												}
												else{

													$sl = 0;

													while ($row = mysqli_fetch_assoc($allData)){
														$id 				= $row['id'];
														$postID 			= $row['postID'];
														$userID				= $row['userID'];
														$comments 			= $row['comments'];
														$status 			= $row['status'];
														$cmt_date 			= $row['cmt_date'];
														$sl++;
						
														?>

														<tr>
															<td><?php echo $sl; ?></td>
															<td>
																<?php 
																	$sqlPost = "SELECT * FROM post WHERE id = '$postID' ";
																	$postData = mysqli_query($db, $sqlPost);
																	while ($row = mysqli_fetch_assoc($postData)) {
																		$postId 		= $row['id'];
																		$postTitle 		= $row['title'];

																		echo $postTitle;
																	}
																?>
															</td>
															<td>
																<?php 
																	$sqlUser = "SELECT * FROM users WHERE id = '$userID' ";
																	$userData = mysqli_query($db, $sqlUser);
																	while ($row = mysqli_fetch_assoc($userData)) {
																		$userId 		= $row['id'];
																		$userName 		= $row['name'];

																		echo $userName;
																	}
																?>
															</td>
															<td><?php echo $comments; ?></td>
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
															<td><?php echo $cmt_date; ?></td>
															<td>
																<ul class="list-unstyled list-group list-group-horizontal">
																	<li class="">
																		<a href="comments.php?do=Edit&id=<?php echo $id; ?>">
																			<i class="fadeIn animated bx bx-pencil text-important"></i>
																		</a>
																	</li>
																	<li class="ms-3 ">
																		<a href="" data-bs-toggle="modal" data-bs-target="#deleteComment<?php echo $id; ?>">
																			<i class="fadeIn animated bx bx-trash text-danger"></i>
																		</a>
																	</li>
																</ul>
															</td>
														</tr>

														<!-- Modal -->
														<div class="modal fade" id="deleteComment<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
														  <div class="modal-dialog">
														    <div class="modal-content">
														      <div class="modal-header">
														        <h1 class="modal-title fs-5" id="exampleModalLabel">Are You Confirm to Delete this Comment?</h1>
														        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														      </div>
														      <div class="modal-body">
														        <div class="modal-action">
														        	<ul class="list-unstyled list-group list-group-horizontal">
														        		<li class="mx-auto">
														        			<a href="comments.php?do=Delete&id=<?php echo $id; ?>" class="btn btn-danger btn-sm">Confirm</a>
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

							$sql = "DELETE FROM comments WHERE id = '$deleteID'";

							$deleteData = mysqli_query($db, $sql);

							if ($deleteData) {
								header('Location: comments.php?do=ManageTrash');
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
		