							
	<aside class="sidebar">
		<form action="search-result.php" method="get">
			<div class="input-group mb-3 pb-1">
				<input class="form-control text-1" placeholder="Search..." name="search" id="s" type="text" required="required">
				<span class="input-group-append">
					<button type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>
				</span>
			</div>
		</form>
		<h5 class="font-weight-bold pt-4">Categories</h5>

		<ul class="nav nav-list flex-column mb-5">

			<?php 

				$sql = "SELECT id AS 'paCateID', name AS 'paCateName' FROM category WHERE is_parent = 0 AND status = 1 ORDER BY name ASC";

				$paCate = mysqli_query($db, $sql);
				while ($row = mysqli_fetch_assoc($paCate)) {
					extract($row);
				

					$sql2 = "SELECT id AS 'chCateID', name As 'chCateName' FROM category WHERE is_parent = '$paCateID' AND status = 1 ORDER BY name ASC";

					$chCate = mysqli_query($db, $sql2);
					$numOfChild = mysqli_num_rows($chCate);


					$query = "SELECT * FROM post WHERE category_id ='$paCateID'";
								$postDataRead = mysqli_query($db, $query);
								$postNum = mysqli_num_rows($postDataRead);

					if ($numOfChild==0) {
						?>

						<li class="nav-item">
							<a class="nav-link" href="category-page.php?id=<?php echo $paCateID; ?>"><?php echo $paCateName; ?> (<?php 	echo $postNum; ?>)</a>
						</li>

						<?php
					}
					else{
						?>

						<li class="nav-item">
							<a class="nav-link" href="category-page.php?id=<?php echo $paCateID; ?>"><?php echo $paCateName; ?></a>
							
							<ul>
								<?php 

									while ($row = mysqli_fetch_assoc($chCate)) {
										extract($row);

										$query2 = "SELECT * FROM post WHERE category_id ='$chCateID'";
										$postData = mysqli_query($db, $query2);
										$postNumber = mysqli_num_rows($postData);


								 ?>

								<li class="nav-item">
									<a class="nav-link" href="category-page.php?id=<?php echo $chCateID; ?>"><?php echo $chCateName; ?> (<?php 	echo $postNumber ?>)</a>
								</li>

								<?php 
									}
								 ?>
							</ul>
						</li>

						<?php
					}

				}
			 ?>
			
		</ul>

		<div class="tabs tabs-dark mb-4 pb-2">
			<ul class="nav nav-tabs">
				<li class="nav-item active"><a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#popularPosts" data-toggle="tab">Popular</a></li>
				<li class="nav-item"><a class="nav-link text-1 font-weight-bold text-uppercase" href="#recentPosts" data-toggle="tab">Recent</a></li>
			</ul>
			<div class="tab-content">

				<div class="tab-pane active" id="popularPosts">
					<ul class="simple-post-list">
						<?php 	

							$sql = "SELECT * FROM post WHERE status = 1 ORDER BY view DESC LIMIT 3";
							$allPost = mysqli_query($db, $sql);

							while($row = mysqli_fetch_assoc($allPost)){

								$id 				= $row['id'];
								$title 				= $row['title'];
								$description		= $row['description'];
								$image 				= $row['image'];
								$post_date 			= $row['post_date'];
								$view 				= $row['view'];

								?>

								<li>
									<div class="post-image">
										<div class="img-thumbnail img-thumbnail-no-borders d-block">
											<a href="single.php?id=<?php echo $id; ?>">

												<?php 	

													if (!empty($image)) {
														?>

														<img src="admin/assets/images/posts/<?php echo $image; ?>" width="50" height="50" alt="">

														<?php 
													}

												 ?>
												
											</a>
										</div>
									</div>
									<div class="post-info">
										<a href="single.php?id=<?php echo $id; ?>"><?php 	echo $title; ?></a>
										<div class="post-meta">
											 <?php 	echo $post_date; ?>
										</div>
									</div>
								</li>


								<?php	
							}

						 ?>
					</ul>
				</div>


				<div class="tab-pane" id="recentPosts">
					<ul class="simple-post-list">

						<?php 	

							$sql = "SELECT * FROM post WHERE status = 1 ORDER BY id DESC LIMIT 3";
							$allPost = mysqli_query($db, $sql);

							while($row = mysqli_fetch_assoc($allPost)){

								$id 				= $row['id'];
								$title 				= $row['title'];
								$description		= $row['description'];
								$image 				= $row['image'];
								$post_date 			= $row['post_date'];

								?>

								<li>
									<div class="post-image">
										<div class="img-thumbnail img-thumbnail-no-borders d-block">
											<a href="single.php?id=<?php echo $id; ?>">

												<?php 	

													if (!empty($image)) {
														?>

														<img src="admin/assets/images/posts/<?php echo $image; ?>" width="50" height="50" alt="">

														<?php 
													}

												 ?>
												
											</a>
										</div>
									</div>
									<div class="post-info">
										<a href="single.php?id=<?php echo $id; ?>"><?php 	echo $title; ?></a>
										<div class="post-meta">
											 <?php 	echo $post_date; ?>
										</div>
									</div>
								</li>


								<?php	
							}

						 ?>

						

					</ul>
				</div>
			</div>
		</div>


		<h5 class="font-weight-bold pt-4">Tags</h5>

		<?php 

			$sql = "SELECT * FROM post WHERE status = 1 ORDER BY view DESC LIMIT 3";
			$allPost = mysqli_query($db, $sql);

			while($row = mysqli_fetch_assoc($allPost)){

				$id 				= $row['id'];
				$tags				= $row['tags'];

				//String to array conversion
				$postTags = explode(',', $tags);

				foreach($postTags as $tag){
					?>

					<a href="single.php?id=<?php echo $id; ?>">
						<span class="badge badge-primary"><?php echo $tag; ?></span>
					</a>

				<?php
				}
			}	

		 ?>

		


	</aside>