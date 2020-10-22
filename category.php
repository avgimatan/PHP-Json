<?php include "templates/header.php"?>
	<!-- Page Content -->
	<div class="container mb-5">

		<!-- Page Heading/Breadcrumbs -->
		<h1 class="mt-4 mb-3">Categories
		</h1>
		<button id="hide_show" class="btn btn-primary mb-3">Click To Show</button>
		<?php
			$str = file_get_contents('catalog.json');
			$json = json_decode($str, true);
			foreach ($json['attributes'][0]['labels'] as $key => $value) {
				$color[$value['id']] = $value['title'];
			}
			foreach ($json['attributes'][1]['labels'] as $key => $value) {
				$shirt[$value['id']] = $value['title'];
			}
			foreach ($json['attributes'][2]['labels'] as $key => $value) {
				$pants[$value['id']] = $value['title'];
			}

			foreach ($json['products'] as $key => $value) {
				foreach ($value['categories'] as $key => $categories) {
					$cat[$categories['title']]['count'] = @$cat[$categories['title']]['count'] + 1;

					foreach ($value['labels'] as $key => $labels) {
						if(isset($color[$labels])){
							$cat[$categories['title']]['color'][$color[$labels]]['count'] = @$cat[$categories['title']]['color'][$color[$labels]]['count'] + 1;
						}
						if(isset($shirt[$labels])){
							$cat[$categories['title']]['size'][$shirt[$labels]]['count'] = @$cat[$categories['title']]['size'][$shirt[$labels]]['count'] + 1;
						}
						if(isset($pants[$labels])){
							$cat[$categories['title']]['size'][$pants[$labels]]['count'] = @$cat[$categories['title']]['size'][$pants[$labels]]['count'] + 1;
						}
						
					}

				}
			}
		?>

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
								<?php $i = 1; foreach ($cat as $key => $value) { 
									
									?>

									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $key; ?></td>
										<td><?php echo $value['count']; ?></td>
										<td>
											Color:
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