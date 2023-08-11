<?php include "inc/header.php"; ?>

	<div class="page-content">

		<div class="row row-cols-1 row-cols-md-12 row-cols-xl-12">
			
			<?php 

			$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

				if ($do == 'Manage') {
			?>

			<h6 class="mb-0 text-uppercase">Manage All Post</h6>
			<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>id</th>
										<th>Image</th>
										<th>Title</th>
										<th>Category</th>
										<th>Tags</th>
										<th>Author</th>
										<th>Status</th>
										<th>Post Date</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody>

									<?php 

										$sql = "SELECT * FROM post WHERE status = 1 ORDER BY id DESC";
										$allData = mysqli_query($db, $sql);
										$countData = mysqli_num_rows($allData);

										if ($countData == 0) {
											echo '<div class="alert alert-info">Sorry no Post found form Database</div>';
										}
										else{

											$sl = 0;

											while ($row = mysqli_fetch_assoc($allData)){
												$id 				= $row['id'];
												$title 				= $row['title'];
												$description		= $row['description'];
												$image 				= $row['image'];
												$category_id 		= $row['category_id'];
												$author_id 			= $row['author_id'];
												$tags 				= $row['tags'];
												$status 			= $row['status'];
												$post_date 			= $row['post_date'];
												$sl++;
											
				
											?>

										<tr>
											<td><?php echo $sl; ?></td>
											<td>
												<?php 

												if (!empty($image)) {
													echo '<img src="assets/images/posts/'. $image .'" style="width:40px;">';
												}
												else{
													echo '<img src="assets/images/users/default.png'. $image .'" style="width:40px;">';
												}

												 ?>
											</td>
											<td><?php echo $title; ?></td>
											<td>
												<?php 
													$sqlCate = "SELECT * FROM category WHERE id = '$category_id' ";
													$cateData = mysqli_query($db, $sqlCate);
													while ($row = mysqli_fetch_assoc($cateData)) {
														$cateId 	= $row['id'];
														$cateName 	= $row['name'];

														echo $cateName;
													}
												?>
												
											</td>
											<td><?php echo $tags; ?></td>
											<td>
												<?php 
													$sqlAuthor = "SELECT * FROM users WHERE id = '$author_id' ";
													$authorData = mysqli_query($db, $sqlAuthor);
													while ($row = mysqli_fetch_assoc($authorData)) {
														$authorId 		= $row['id'];
														$authorName 	= $row['name'];

														echo $authorName;
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
											<td><?php echo $post_date; ?></td>
											<td>
												<ul class="list-unstyled list-group list-group-horizontal">
													<li class="">
														<a href="post.php?do=Edit&id=<?php echo $id; ?>">
															<i class="fadeIn animated bx bx-pencil text-important"></i>
														</a>
													</li>
													<li class="ms-3 ">
														<a href="" data-bs-toggle="modal" data-bs-target="#deletePost<?php echo $id; ?>">
															<i class="fadeIn animated bx bx-trash text-danger"></i>
														</a>
													</li>
												</ul>
											</td>
										</tr>

										<!-- Modal -->
										<div class="modal fade" id="deletePost<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h1 class="modal-title fs-5" id="exampleModalLabel">Are You Confirm to Delete this Post in trash?</h1>
										        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										      </div>
										      <div class="modal-body">
										        <div class="modal-action">
										        	<ul class="list-unstyled list-group list-group-horizontal">
										        		<li class="mx-auto">
										        			<a href="post.php?do=Trash&id=<?php echo $id; ?>" class="btn btn-danger btn-sm">Confirm</a>
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

					<h6 class="mb-0 text-uppercase">Add New Post</h6>
					<hr/>
						<div class="card">
							<div class="card-body">
								<form action="post.php?do=Store" method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="col-lg-4">
											<div class="mb-3">
												<label>Post Title</label>
												<input type="name" name="title" class="form-control" placeholder="Post Title" required="required" autocomplete="off" autofocus />
											</div>

											<div class="mb-3">
												<label>Category Name</label>
												<select class="form-control" name="category_id">
													<option>Please Select The Category</option>
													<?php 

														$sql = "SELECT * FROM category WHERE is_parent = 0 AND status = 1 ORDER BY name ASC";
														$paCate = mysqli_query($db, $sql);
														while ($row = mysqli_fetch_assoc($paCate)) {
															$paCateId 	= $row['id'];
															$paCateName = $row['name'];

															?>
															<option value="<?php echo $paCateId; ?>"><?php echo $paCateName; ?></option>

														<?php

														$sql2 = "SELECT * FROM category WHERE is_parent = '$paCateId' AND status = 1 ORDER BY name ASC";
														$chCate = mysqli_query($db, $sql2);
														while ($row = mysqli_fetch_assoc($chCate)) {
															$chCateId 	= $row['id'];
															$chCateName = $row['name'];

															?>

															<option value="<?php echo $chCateId; ?>">---<?php echo $chCateName; ?></option>

														<<?php 
															}

														}

													 ?>
												</select>
											</div>

											<div class="mb-3">
												<label>Meta Tags</label>
												<input type="text" name="tags" class="form-control" placeholder="Meta Tags" autocomplete="off" autofocus />
											</div>

											<div class="mb-3">
												<label>Status</label>
												<select class="form-select" name="status">
													<option>Please Seclect Account Status</option>
													<option value="1">Active</option>
													<option value="2">Inactive</option>
												</select>
											</div>

											<div class="mb-3">
												<label>Image</label>
												<input type="file" name="image" class="form-control">
											</div>

										</div>

										<div class="col-lg-8">
											<div class="mb-3">
												<textarea name="description" class="form-control" rows="15" id="descriptionBox"></textarea>
											</div>

										</div>

										<div class="col-lg-12">
											<div class="mb-3">
												<input type="submit" name="addPost" value="Add New Post" class="btn btn-primary">
											</div>

										</div>

									</div>
								</form>
							</div>
						</div>

					<?php
					}
					elseif ($do == 'Store') {
						if (isset($_POST['addPost'])) {
							
							$title 				= mysqli_real_escape_string ( $db, $_POST['title']);
							$description		= mysqli_real_escape_string ( $db, $_POST['description']);
							$category_id 		= mysqli_real_escape_string ( $db, $_POST['category_id']);
							$author_id 			= $_SESSION['id'];
							$tags 				= mysqli_real_escape_string ( $db, $_POST['tags']);
							$status 			= mysqli_real_escape_string ( $db, $_POST['status']);


								//we will image work soon
							$image = $_FILES['image']['name'];
							$img_tmp = $_FILES['image']['tmp_name'];


								if (!empty($image)) {
								$img = rand(1,9999999) . $image;
								move_uploaded_file($img_tmp, "C:/xampp/htdocs/shikhbe_sobai/project_one/admin/assets/images/posts/".$img);
								}
								else{
									$img = '';
								}
								
								$sql = "INSERT INTO post ( title, description, image, category_id, author_id, tags, status, post_date ) VALUES ( '$title', '$description', '$img', '$category_id', '$author_id', '$tags','$status', now() )";
								
								$dataInsert = mysqli_query($db, $sql);

								if ($dataInsert) {
									header("Location: post.php?do=Manage");
								}
								else{
									die("Mysqli Error." . mysqli_error($db));
								}

						}
					}


					elseif ($do == 'Edit') {
						if (isset($_GET['id'])) {
							$updateID = $_GET['id'];

							$sql = "SELECT * FROM post WHERE id = '$updateID'";
							$readData = mysqli_query($db, $sql);

							while ($row = mysqli_fetch_assoc($readData)){
								$id 				= $row['id'];
								$title 				= $row['title'];
								$description		= $row['description'];
								$image 				= $row['image'];
								$category_id 		= $row['category_id'];
								$author_id 			= $row['author_id'];
								$tags 				= $row['tags'];
								$status 			= $row['status'];
								$post_date 			= $row['post_date'];
								
								?>

								<h6 class="mb-0 text-uppercase">Update Post Information</h6>
								<hr/>
									<div class="card">
										<div class="card-body">
											<form action="post.php?do=Update" method="POST" enctype="multipart/form-data">
												<input type="hidden" name="upID" value="<?php echo $id; ?>" />
												<div class="row">
													<div class="col-lg-4">
														<div class="mb-3">
															<label>Post Title</label>
															<input type="name" name="title" class="form-control" value="<?php echo $title; ?>" required="required" autocomplete="off" autofocus />
														</div>

														<div class="mb-3">
															<label>Category Name</label>
															<select class="form-control" name="category_id">
																<option>Please Select The Category</option>
																<?php 

																	$sql = "SELECT * FROM category WHERE is_parent = 0 AND status = 1 ORDER BY name ASC";
																	$paCate = mysqli_query($db, $sql);
																	while ($row = mysqli_fetch_assoc($paCate)) {
																		$paCateId 	= $row['id'];
																		$paCateName = $row['name'];

																		?>
																		<option value="<?php echo $paCateId; ?>" <?php if ($category_id == $paCateId) {
																			echo 'selected';
																		} ?>><?php echo $paCateName; ?></option>

																	<?php

																		$sql2 = "SELECT * FROM category WHERE is_parent = '$paCateId' AND status = 1 ORDER BY name ASC";
																		$chCate = mysqli_query($db, $sql2);
																		while ($row = mysqli_fetch_assoc($chCate)) {
																			$chCateId 	= $row['id'];
																			$chCateName = $row['name'];

																			?>

																			<option value="<?php echo $chCateId; ?>"<?php if ($category_id == $chCateId) {
																			echo 'selected';
																		} ?>>---<?php echo $chCateName; ?></option>

																	<<?php 
																		}

																	}

																 ?>
															</select>
														</div>

														<div class="mb-3">
															<label>Meta Tags</label>
															<input type="text" name="tags" class="form-control" value="<?php echo $tags; ?>" autocomplete="off" autofocus />
														</div>

														<div class="mb-3">
															<label>Status</label>
															<select class="form-select" name="status">
																<option>Please Seclect Account Status</option>
																<option value="1"<?php if ($status == 1) {
																	echo 'selected';
																} ?>>Active</option>
																<option value="2"<?php if ($status == 2) {
																	echo 'selected';
																} ?>>Inactive</option>
															</select>
														</div>

														<div class="mb-3">
															<label>Image</label>
															<input type="file" name="image" class="form-control">
														</div>

													</div>

													<div class="col-lg-8">
														<div class="mb-3">
															<textarea name="description" class="form-control" rows="15" id="descriptionBox"><?php echo $description; ?></textarea>
														</div>

													</div>

													<div class="col-lg-12">
														<div class="mb-3">
															<input type="submit" name="updatePost" value="Update Post" class="btn btn-primary">
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
						if (isset($_POST['updatePost'])) {
							$upID 				=   $_POST['upID'];
							$title 				= mysqli_real_escape_string ( $db, $_POST['title']);
							$description		= mysqli_real_escape_string ( $db, $_POST['description']);
							$category_id 		= mysqli_real_escape_string ( $db, $_POST['category_id']);
							$author_id 			= $_SESSION['id'];
							$tags 				= mysqli_real_escape_string ( $db, $_POST['tags']);
							$status 			= mysqli_real_escape_string ( $db, $_POST['status']);
							
								//we will image work soon
							$image = $_FILES['image']['name'];
							$img_tmp = $_FILES['image']['tmp_name'];


							if (!empty($image)) {
								$img = rand(1,9999999) . $image;
								move_uploaded_file($img_tmp, "C:/xampp/htdocs/shikhbe_sobai/project_one/admin/assets/images/posts/".$img);

								//Update All Post Data 
								$sql = "UPDATE post SET title='$title', description='$description', image='$img', category_id='$category_id', author_id='$author_id', tags='$tags', status='$status' WHERE id = '$upID'";
								echo $sql;

								$updateData = mysqli_query($db, $sql);

								if ($updateData) {
									header('Location: post.php?do=Manage');
								}
								else{
									die("Mysqli Failed." . mysqli_error($db));
								}


							}
							else{

								$sql = "UPDATE post SET title='$title', description='$description', category_id='$category_id', author_id='$author_id', tags='$tags', status='$status' WHERE id = '$upID'";
								echo $sql;

								$updateData = mysqli_query($db, $sql);

								if ($updateData) {
									header('Location: post.php?do=Manage');
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

							$sql = "UPDATE post SET status = '2' WHERE id = '$trashID'";

							$trashData = mysqli_query($db, $sql);

							if ($trashData) {
								header('Location: post.php?do=Manage');
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
												<th>id</th>
												<th>Image</th>
												<th>Title</th>
												<th>Category</th>
												<th>Author</th>
												<th>Status</th>
												<th>Join Date</th>
												<th>Action</th>
											</tr>
										</thead>

										<tbody>

											<?php 

												$sql = "SELECT * FROM post WHERE status = 2 ORDER BY id DESC";
												$allData 	= mysqli_query($db, $sql);
												$countData 	= mysqli_num_rows($allData);

												if ($countData == 0) {
													echo '<div class="alert alert-info">Sorry no Post found form Database</div>';
												}
												else{

													$sl = 0;

													while ($row = mysqli_fetch_assoc($allData)){
														$id 				= $row['id'];
														$title 				= $row['title'];
														$description		= $row['description'];
														$image 				= $row['image'];
														$category_id 		= $row['category_id'];
														$author_id 			= $row['author_id'];
														$tags 				= $row['tags'];
														$status 			= $row['status'];
														$post_date 			= $row['post_date'];
														$sl++;
													
						
													?>

												<tr>
													<td><?php echo $sl; ?></td>
													<td>
														<?php 

														if (!empty($image)) {
															echo '<img src="assets/images/posts/'. $image .'" style="width:40px;">';
														}
														else{
															echo '<img src="assets/images/users/default.png'. $image .'" style="width:40px;">';
														}

														 ?>
													</td>
													<td><?php echo $title; ?></td>
													<td><?php echo $category_id; ?></td>
													<td><?php echo $author_id; ?></td>
													<td><?php echo $tags; ?></td>
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
													<td><?php echo $post_date; ?></td>
													<td>
														<ul class="list-unstyled list-group list-group-horizontal">
															<li class="">
																<a href="post.php?do=Edit&id=<?php echo $id; ?>">
																	<i class="fadeIn animated bx bx-pencil text-important"></i>
																</a>
															</li>
															<li class="ms-3 ">
																<a href="" data-bs-toggle="modal" data-bs-target="#deletePost<?php echo $id; ?>">
																	<i class="fadeIn animated bx bx-trash text-danger"></i>
																</a>
															</li>
														</ul>
													</td>
												</tr>

												<!-- Modal -->
												<div class="modal fade" id="deletePost<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
												  <div class="modal-dialog">
												    <div class="modal-content">
												      <div class="modal-header">
												        <h1 class="modal-title fs-5" id="exampleModalLabel">Are You Confirm to Delete this Post in trash?</h1>
												        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												      </div>
												      <div class="modal-body">
												        <div class="modal-action">
												        	<ul class="list-unstyled list-group list-group-horizontal">
												        		<li class="mx-auto">
												        			<a href="post.php?do=Delete&id=<?php echo $id; ?>" class="btn btn-danger btn-sm">Confirm</a>
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

							$sql = "DELETE FROM post WHERE id = '$deleteID'";

							$deleteData = mysqli_query($db, $sql);

							if ($deleteData) {
								header('Location: post.php?do=ManageTrash');
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
		