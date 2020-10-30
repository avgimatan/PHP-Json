<?php include "templates/header.php"?>
<?php require "functions.php"?>

	<!-- Page Content -->
	<div class="container mb-5">

		<!-- Page Heading/Breadcrumbs -->
		<h1 class="mt-4 mb-3">Products
		</h1>

		<button id="hide_show" class="btn btn-primary mb-3">Click To Show</button>

		<!-- Marketing Icons Section -->
		<div class="row d-none" id="products">
			<div class="col-lg-12 mb-12">
				<div class="card h-100">
					<h4 class="card-header">Products Listing</h4>
					<div class="card-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Id</th>
									<th>Title</th>
									<th>Price</th>
									<th>Categories</th>
									<th>Attribute</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($json['products'] as $key => $value) {
									?>
									<tr>
										<td><?php echo $value['id']; ?></td>
										<td><?php echo $value['title']; ?></td>
										<td><?php echo $value['price']; ?></td>
										<td><?php
											foreach ($value['categories'] as $key => $categories) {
												echo $categories['title'].'.';
												if ($categories['title'] == 'Pants' || $categories['title'] =='Shirts') {
													$category_title = $categories['title'];
												}											
											} ?></td>
										<td><?php
											$color_str = "";
											$size = "";
											$attributes = setAttributes($json);
											foreach ($value['labels'] as $key => $labels) {
												if (isset($attributes["color"][$labels])) {
													$color_str .= $attributes["color"][$labels].', ';
												}
												if ($category_title == "Shirts") {
													if (isset($attributes["shirt"][$labels])) {
														$size .= $attributes["shirt"][$labels].', ';
													}
												}
												else {
													if (isset($attributes["pants"][$labels])) {
														$size .= $attributes["pants"][$labels].', ';
													}
												}

											} ?>Color : <?php echo $color_str; ?><br>Size : <?php echo $size; ?></td>
									</tr>
									<?php
								}
								?>
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