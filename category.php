<?php include "templates/header.php"?>
<?php require "functions.php"?>
	<!-- Page Content -->
	<div class="container mb-5">

		<!-- Page Heading/Breadcrumbs -->
		<h1 class="mt-4 mb-3">Categories
		</h1>
		<button id="hide_show" class="btn btn-primary mb-3">Click To Show</button>

		<!-- Marketing Icons Section -->
		<div class="row d-none" id="products">
			<div class="col-lg-12 mb-12">
				<div class="card h-100">
					<h4 class="card-header">Categories Listing</h4>
					<div class="card-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<td>ID</td>
									<td>Title</td>
									<td>Counter</td>
									<td>Attributes</td>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1;
									  $cat = setProducts($json);
									  foreach ($cat as $key => $value) { 
									?>

									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $key; ?></td>
										<td><?php echo $value['count']; ?></td>
										<td>Color:
											<?php foreach ($value['color'] as $key => $color) { 
												echo $key.' ('.$color['count'].'), ';
											} ?>
											<br>
											Size:
											<?php foreach ($value['size'] as $key => $size) { 
												echo $key.' ('.$size['count'].'), ';
											} ?>
										</td>
									</tr>
									<?php 
									$i = $i + 1;
								} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- /.row -->

	</div>
	<!-- /.container -->
	<?php include "templates/footer.php" ?>