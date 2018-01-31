<?php include("inc/products.php");

if (isset($_GET["id"])) {
	$product_id = $_GET["id"];
	if (isset($products[$product_id])) {
		$product = $products[$product_id];
	}
}
// ***amacımız invalid shirt id nin url'den girilmesi durumunda userın 
// shirts.php'ye yönlendirilmesi (yukarıdaki ve aşağıdaki if statementların yapısına dikkat)***
if (!isset($product)) {
	header("Location: shirts.php");
	exit();
}

$section = "shirts";
$pageTitle = $product["name"];
include("inc/header.php"); ?>

		<div class="section page">

			<div class="wrapper">

				<div class="breadcrumb"><a href="shirts.php">Shirts</a> &gt; <?php echo $product["name"]; ?></div>

				<div class="shirt-picture">
					<span>
						<img src="<?php echo $product["img"]; ?>" alt="<?php echo $product["name"]; ?>">
					</span>
				</div>

				<div class="shirt-details">

					<h1><span class="price">$<?php echo $product["price"]; ?></span> <?php echo $product["name"]; ?></h1>
					<!-- we use paypal to persist the shopping cart and process the credit card payment.
					input type="hidden" doesn't appear on screen but submitted to the server with corresponding values.-->
					<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
						<input type="hidden" name="cmd" value="_s-xclick"> <!-- for security -->
						<!-- with this element paypal verifies the corresponding item (in terms of default name, price, id/key etc) 
						we created paypal var in product array for each item 1 by 1 on paypal.com-->
						<input type="hidden" name="hosted_button_id" value="<?php echo $product["paypal"]; ?>">
						<!-- **we added this element later on and overrode the default name we had created at paypal.com when we had created paypal button.
						thanks to this flexibility products array can become the single source for this information about our shirts without also having to change the save button on our paypal account (ancak her item için paypal.com da save button yaratılırken belirttiğimiz id/keylerin (101, 102 vs) ve otomatik oluşan kodların (9P7DLECFD4LKE vs) ve belirttiğimiz fiyatların products arrayde sonradan değişmemesine (zira değişirse ya hata verir ya da paypal.com u etkilemez) dikkat)** -->
						<input type="hidden" name="item_name" value="<?php echo $product["name"]; ?>">
						<table>
						<tr>
							<th>
								<!-- on0 (option name 0) indicates that this goes with 1st option which is Size (name of dropdown which we indicated at paypal) (?)-->
								<input type="hidden" name="on0" value="Size">
								<label for="os0">Size</label>
							</th>
							<td>
								<!-- os0 (option select 0) indicates that this goes with 1st option-->
								<select name="os0" id="os0">
									<?php foreach($product["sizes"] as $size) { ?>
									<!-- **"$product["sizes"] as $size" ile arrayde 2 kademe birden inilmesine dikkat** -->
									<option value="<?php echo $size; ?>"> <?php echo $size; ?> </option>
									<?php } ?>
									
									<!-- **alt:** -->
									<!-- <?php 
									// foreach($product["sizes"] as $size) {
									// 	echo '<option value="'. $size . '">' . $size . '</option>';
									// } 
									?> -->
								</select>
							</td>
						</tr>
						</table>
						<input type="submit" value="Add to Cart" name="submit">
					</form>

					<p class="note-designer">* All shirts are designed by Mike the Frog.</p>

				</div>

			</div>

		</div>

<?php include("inc/footer.php"); ?>