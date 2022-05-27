<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM pet WHERE p_id='" . $_GET["p_id"] . "'");
			$itemArray = array($productByCode[0]["p_id"]=>array('p_name'=>$productByCode[0]["p_name"], 'p_id'=>$productByCode[0]["p_id"], 'quantity'=>$_POST["quantity"], 'p_amount'=>$productByCode[0]["p_amount"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["p_id"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["p_id"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) 
			{
					if($_GET["action"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<HTML>
<HEAD>
<TITLE>Shopping Cart</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<input  type="button" value="Back" class="btnAddAction" onclick="window.location.href='welcome.php';"/><br>
<div id="shopping-cart">
<div class="txt-heading"><b>SHOPPING CART</b></div>

<a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;"><b>Name</b></th>
<th style="text-align:left;"><b>Pet Id</b></th>
<th style="text-align:right;" width="5%"><b>Quantity</b></th>
<th style="text-align:right;" width="10%"><b>Unit Price</b></th>
<th style="text-align:right;" width="10%"><b>Price</b></th>
<th style="text-align:center;" width="5%"><b>Remove</b></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["p_amount"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><b><?php echo $item["p_name"]; ?></b></td>
				<td><b><?php echo $item["p_id"]; ?></b></td>
				<td style="text-align:right;"><b><?php echo $item["quantity"]; ?></b></td>
				<td  style="text-align:right;"><b><?php echo "Rs.".$item["p_amount"]; ?></b></td>
				<td  style="text-align:right;"><b><?php echo "Rs.". number_format($item_price,2); ?></b></td>
				<td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $item["p_id"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["p_amount"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right"><b>Total:</b></td>
<td align="right"><b><?php echo $total_quantity; ?></b></td>
<td align="right" colspan="2"><strong><?php echo "Rs.".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records"><b>Your Cart is Empty</b></div>
<?php 
}
?>
</div>
<div id="product-grid">
	<div class="txt-heading"><b>PRODUCTS</b></div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM pet ORDER BY p_id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="cart.php?action=add&p_id=<?php echo $product_array[$key]["p_id"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>" height="170px" width="250px"></div>
			<div class="product-tile-footer">
			<div class="product-title"><b><?php echo $product_array[$key]["p_name"]; ?></b></div>
			<div class="product-price"><b><?php echo "Rs.".$product_array[$key]["p_amount"]; ?></b></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" />
			<input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>
</BODY>
</HTML>