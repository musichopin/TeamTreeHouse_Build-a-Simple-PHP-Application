<?php
// **we make new paypal button for each shirt at paypal.com**
$products = array();
$products[101] = array(
	"name" => "Logo Shirt, Red",
	"img" => "img/shirts/shirt-101.jpg",
	"price" => 18,
	"paypal" => "9P7DLECFD4LKE",
    "sizes" => array("Small","Medium","Large","X-Large")
    // **with this 3rd array our array becomes 3 dimensional deep:
    // 1st array contains a list of shirts
    // 2nd array contains a list of attributes about the shirt
    // this 3rd array contains a list of sizes about the size attribute in which that shirt is available**
);
$products[102] = array(
	"name" => "Mike the Frog Shirt, Black",
    "img" => "img/shirts/shirt-102.jpg",
    "price" => 20,
    "paypal" => "SXKPTHN2EES3J",
    "sizes" => array("Small","Medium","Large","X-Large")
);
$products[103] = array(
    "name" => "Mike the Frog Shirt, Blue",
    "img" => "img/shirts/shirt-103.jpg",    
    "price" => 20,
    "paypal" => "7T8LK5WXT5Q9J",
    "sizes" => array("Small","Medium","Large","X-Large")
);
$products[104] = array(
    "name" => "Logo Shirt, Green",
    "img" => "img/shirts/shirt-104.jpg",    
    "price" => 18,
    "paypal" => "YKVL5F87E8PCS",
    "sizes" => array("Small","Medium","Large","X-Large")
);
$products[105] = array(
    "name" => "Mike the Frog Shirt, Yellow",
    "img" => "img/shirts/shirt-105.jpg",    
    "price" => 25,
    "paypal" => "4CLP2SCVYM288",
    "sizes" => array("Small","Medium","Large","X-Large")
);
$products[106] = array(
    "name" => "Logo Shirt, Gray",
    "img" => "img/shirts/shirt-106.jpg",    
    "price" => 20,
    "paypal" => "TNAZ2RGYYJ396",
    "sizes" => array("Small","Medium","Large","X-Large")
);
$products[107] = array(
    "name" => "Logo Shirt, Teal",
    "img" => "img/shirts/shirt-107.jpg",    
    "price" => 20,
    "paypal" => "S5FMPJN6Y2C32",
    "sizes" => array("Small","Medium","Large","X-Large")
);
$products[108] = array(
    "name" => "Mike the Frog Shirt, Orange",
    "img" => "img/shirts/shirt-108.jpg",    
    "price" => 25,
    "paypal" => "JMFK7P7VEHS44",
    "sizes" => array("Large","X-Large")
);

?>