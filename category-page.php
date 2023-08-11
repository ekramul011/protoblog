
<?php include "inc/header.php" ?>

			<div role="main" class="main">

				<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
					<div class="container">
						<div class="row">

							<div class="col-md-12 align-self-center p-static order-2 text-center">

								<h1 class="text-dark font-weight-bold text-8">Large Image Right Sidebar</h1>
								<span class="sub-title text-dark">Check out our Latest News!</span>
							</div>

							<div class="col-md-12 align-self-center order-1">

								<ul class="breadcrumb d-block text-center">
									<li><a href="#">Home</a></li>
									<li class="active">Blog</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<div class="container py-4">

					<div class="row">
						<div class="col-lg-3 order-lg-2">
							<?php include "inc/sidebar.php"; ?>
						</div>


						<div class="col-lg-9 order-lg-1">
							<div class="blog-posts">

								<?php 

									if (isset($_GET['id'])) {
										$category_id = $_GET['id'];

										$sql = "SELECT * FROM post WHERE category_id = '$category_id' AND status = 1 ORDER BY id DESC";
											$postData = mysqli_query($db, $sql);

											$tPostInCate = mysqli_num_rows($postData);
											if ($tPostInCate==0) {
												echo '<div class="alert alert-info">Opps!!! No Post Found in this category. We will post soon.</div>';
											}
											else{
												while($row = mysqli_fetch_assoc($postData))
													{
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


														<article class="post post-large">
															<div class="post-image">
																<a href="single.php?id=<?php echo $id; ?>">
																	<?php 

																		if (!empty($image)) {
																			echo '<img src = "admin/assets/images/posts/'.$image.'"class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="'. $title .'">';
																		}
																		else{
																			?>

																			<img src="assets/img/blog/wide/blog-11.jpg"  />

																			<?php
																		}

																	 ?>

																</a>
															</div>
														
															<div class="post-date">
																<!-- <span class="day">10</span> -->
																<span class="month"><?php echo $post_date; ?></span>
															</div>
														
															<div class="post-content">
														
																<h2 class="font-weight-semibold text-6 line-height-3 mb-3"><a href="single.php?id=<?php echo $id; ?>"><?php echo $title; ?></a></h2>
																<p><?php echo substr($description, 0, 350); ?> [...]</p>
														
																<div class="post-meta">
																	<span>
																		<i class="far fa-user"></i> By 
																		<?php 
																			$sqlAuthor = "SELECT * FROM users WHERE id = '$author_id' ";
																			$authorData = mysqli_query($db, $sqlAuthor);
																			while ($row = mysqli_fetch_assoc($authorData)) {
																				$authorId 		= $row['id'];
																				$authorName 	= $row['name'];

																				echo '<a href="#">'.$authorName.'</a>';
																			}
																		?>
																		 
																	</span>

																	<span>
																		<i class="far fa-folder"></i> 
																		<?php 
																			$sqlCate = "SELECT * FROM category WHERE id = '$category_id' ";
																			$cateData = mysqli_query($db, $sqlCate);
																			while ($row = mysqli_fetch_assoc($cateData)) {
																				$cateId 	= $row['id'];
																				$cateName 	= $row['name'];

																				echo '<a href="#">'. $cateName .'</a>';
																			}
																		?>
																		 
																		
																	</span>
																	<span>
																		<i class="far fa-comments"></i> 
																		<a href="#">0 Comments</a>
																	</span>
																	<span class="d-block d-sm-inline-block float-sm-right mt-3 mt-sm-0"><a href="single.php?id=<?php echo $id; ?>" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
																</div>
														
															</div>
														</article>


												<?php
													}
											}
											
									}

									

								 ?>


								

								<ul class="pagination float-right">
									<li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
									<li class="page-item active"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
								</ul>

							</div>
						</div>
					</div>

				</div>

			</div>


<?php include "inc/footer.php" ?>
			