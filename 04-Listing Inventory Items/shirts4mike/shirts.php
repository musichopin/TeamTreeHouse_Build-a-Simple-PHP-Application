<?php

$products = array();
$products[101] = array(
	"name" => "Logo Shirt, Red",
	"img" => "img/shirts/shirt-101.jpg",
	"price" => 18	
);
$products[102] = array(
	"name" => "Mike the Frog Shirt, Black",
    "img" => "img/shirts/shirt-102.jpg",
    "price" => 20
);
$products[103] = array(
    "name" => "Mike the Frog Shirt, Blue",
    "img" => "img/shirts/shirt-103.jpg",    
    "price" => 20
);
$products[104] = array(
    "name" => "Logo Shirt, Green",
    "img" => "img/shirts/shirt-104.jpg",    
    "price" => 18);
$products[105] = array(
    "name" => "Mike the Frog Shirt, Yellow",
    "img" => "img/shirts/shirt-105.jpg",    
    "price" => 25
);
$products[106] = array(
    "name" => "Logo Shirt, Gray",
    "img" => "img/shirts/shirt-106.jpg",    
    "price" => 20
);
$products[107] = array(
    "name" => "Logo Shirt, Turquoise",
    "img" => "img/shirts/shirt-107.jpg",    
    "price" => 20
);
$products[108] = array(
    "name" => "Logo Shirt, Orange",
    "img" => "img/shirts/shirt-108.jpg",    
    "price" => 25,
);

?><?php 
$pageTitle = "Mike's Full Catalog of Shirts";
$section = "shirts";
include('inc/header.php'); ?>

		<div class="section shirts page">

			<div class="wrapper">

				<h1>Mike&rsquo;s Full Catalog of Shirts</h1>

				<ul class="products">
					<?php foreach($products as $product) { 
							echo "<li>";
							echo '<a href="#">';
							// ***we concatenate text and variables one after another with this style:
							// note that there are 3 distinct types of quotation marks below; one is for echo statement (which has been concatenated with periods), 2nd one is for html attribute values and 3rd one is for array variables (can take both single and double quots)
							echo '<img src="' . $product["img"] . '" alt="' . $product["name"] . '">';
							echo "<p>View Details</p>";
							echo "</a>";
							echo "</li>";
						}
					?>
					<!-- ***we used html markup inside php code because with former code below there happened to be empty spaces on the page source (between ul and li) which caused to have 3 column layout instead of 4. we cud have used the former code in case we left no empty spaces between php tags and li tags but that would reduce readability.
					#2 former code:*** -->
					<?php foreach($products as $product) { ?>
					<!-- <li>
						<a href="#">
							<img src="<?php echo $product["img"]; ?>" alt="<?php echo $product["name"]; ?>">
							<p>View Details</p>
						</a>
					</li> -->
					<?php } ?>
				</ul>

			</div>

		</div>

<?php include('inc/footer.php') ?>