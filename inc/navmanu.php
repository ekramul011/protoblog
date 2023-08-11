										
	<div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
		<nav class="collapse header-mobile-border-top">
			<ul class="nav nav-pills" id="mainNav">

				<li class="dropdown">
					<a class="dropdown-item dropdown-toggle active" href="index.php">
						Home
					</a>
				</li>


				<?php 

					$sql = "SELECT id AS 'paCateID', name AS 'paCateName' FROM category WHERE is_parent = 0 AND status = 1 ORDER BY name ASC";

					$paCate = mysqli_query($db, $sql);
					while ($row = mysqli_fetch_assoc($paCate)) {
						extract($row);
					

						$sql2 = "SELECT id AS 'chCateID', name As 'chCateName' FROM category WHERE is_parent = '$paCateID' AND status = 1 ORDER BY name ASC";

						$chCate = mysqli_query($db, $sql2);
						$numOfChild = mysqli_num_rows($chCate);

						if ($numOfChild==0) {
							?>

							<li class="dropdown">
								<a class="dropdown-item dropdown-toggle" href="category-page.php?id=<?php echo $paCateID; ?>">
									<?php echo $paCateName; ?>
								</a>
							</li>

							<?php
						}
						else{
							?>

							<li class="dropdown">
								<a class="dropdown-item dropdown-toggle" href="#">
									<?php echo $paCateName; ?>
								</a>
								<ul class="dropdown-menu">
									<?php 

										while ($row = mysqli_fetch_assoc($chCate)) {
											extract($row);

									 ?>
									<li class="dropdown-submenu">
										<a class="dropdown-item" href="category-page.php?id=<?php echo $chCateID; ?>"><?php echo $chCateName; ?></a>
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


				<!-- <?php 

					if (!empty($_SESSION['id'])) {
						$userID = $_SESSION['id'];

						$sql 		= "SELECT * FROM users WHERE id = '$userID'";
						$userData 	= mysqli_query($db, $sql);

						while($row = mysqli_fetch_assoc($userData)){
							$authID 	= $row['id'];
							$authName 	= $row['name'];
							?>

							<li class="dropdown">
								<a class="dropdown-item dropdown-toggle" href="#">
									<span class="btn btn-xs btn-outline-primary">
										<?php echo $authName; ?>
									</span>
								</a>
								<ul class="dropdown-menu">
									<li class="dropdown-submenu">
										<a class="dropdown-item" href="">Profile Update</a>
									</li>
									<li class="dropdown-submenu">
										<a class="dropdown-item" href="logout.php">Logout</a>
									</li>
									
								</ul>
							</li>


							<?php 
						}
						

						
					}
					else{
						?>

						<li class="dropdown">
							<a class="dropdown-item dropdown-toggle" href="login.php">
								<span class="btn btn-xs btn-outline-primary">Login / Register</span>
							</a>
						</li>							

						<?php
					}

				?> -->
				

			</ul>
		</nav>
	</div>