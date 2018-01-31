<?php include("inc/products.php"); ?><?php 
$pageTitle = "Mike's Full Catalog of Shirts";
$section = "shirts";
include('inc/header.php'); ?>

		<div class="section shirts page">

			<div class="wrapper">

				<h1>Mike&rsquo;s Full Catalog of Shirts</h1>

				<ul class="products">
					<?php foreach($products as $product_id => $product) {
							echo "<li>";
							// ***since layout and functionality for each of the specific shirt page would be the same (except data) we made these changes through attaching product id to query string instead of creating 8 different shirt pages (if we created 8 different shirt pages we wudnt be able to use foreach loop as well)
							// also note that we included products.php (which stores different datas for each of the shirts) in both shirts.php and shirt.php pages instead of duplicating***
							echo '<a href="shirt.php?id=' . $product_id . '">';
							echo '<img src="' . $product["img"] . '"alt="' . $product["name"] . '">';
							echo "<p>View Details</p>";
							echo "</a>";
							echo "</li>";
						}
					?>
				</ul>

			</div>

		</div>

<?php include('inc/footer.php') ?>