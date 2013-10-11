<?php

require('global.php');

//make sure the user is authenticated
check_auth();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/order.css" />
		<meta charset=UTF-8>
		<title>Custom Cupcakes</title>
	</head>
	<body>
		<form action="ajax.php" method="post">
		<div id="orderList">
			<h3>Your Order</h3>
			<div>
				<table>
                                    <?php
                                    for($i=0;$i<count($_SESSION['cart']);$i++){
                                        ?>
					<tr>
						<td><img src="images/cupcake_icon.png" alt="small cupcake img"</td>
						<td>Cupcake - convert numbers to text with javascript using menu.json</td>
                                                <td><button type="submit" name="removefromcart" value="<?php echo $i ?>">remove</button></td>
					</tr>
                                       <?php } ?>
				</table>
			</div>
			<p><button type="submit" name="action" value="placeorder"/>Place Order</button></p>
		</div>
		<div id="Favorites">
			<h2>Favorites</h2>
			<div></div>
		</div>
		<div id="flavor">
			<h2>Cupcake Flavor</h2>
			<div>
				<table>
					<tr>
						<td><img src="images/banana.png" alt="Banana img"></td>
						<td><img src="images/carrot.png" alt="Carrot img"></td>
						<td><img src="images/chocolate.png" alt="Chocolate img"></td>
						<td><img src="images/coconut.png" alt="Coconut img"></td>
						<td><img src="images/cranberry.png" alt="Cranberry img"></td>
						<td><img src="images/dark_chocolate.png" alt="Dark Chocolate img"></td>
						<td><img src="images/grape.png" alt="Grape img"></td>
						<td><img src="images/kiwi.png" alt="Kiwi img"></td>
						<td><img src="images/lemon.png" alt="Lemon img"></td>
						<td><img src="images/milk_chocolate.png" alt="Milk Chocolate img"></td>
						<td><img src="images/orange.png" alt="Orange img"></td>
						<td><img src="images/pineapple.png" alt="Pineapple img"></td>
						<td><img src="images/redvelvet.png" alt="Redvelvet img"></td>
						<td><img src="images/vanilla.png" alt="Vanilla img"></td>
					</tr>
					<tr>
						<td>Banana<input type="radio" name="flavor" value="1"></td>
						<td>Carrot<input type="radio" name="flavor" value="2"></td>
						<td>Chocolate<input type="radio" name="flavor" value="3"></td>
						<td>Coconut<input type="radio" name="flavor" value="4"></td>
						<td>Cranberry<intput type="radio" name="flavor" value="5"></td>
						<td>Dark Chocolate<input type="radio" name="flavor" value="6"></td>
						<td>Grape<input type="radio" name="flavor" value="7"></td>
						<td>Kiwi<input type="radio" name="flavor" value="8"></td>
						<td>Lemon<input type="radio" name="flavor" value="9"></td>
						<td>Milk Chocolate<input type="radio" name="flavor" value="10"></td>
						<td>Orange<input type="radio" name="flavor" value="11"></td>
						<td>Pineapple<input type="radio" name="flavor" value="12"></td>
						<td>Redvelvet<input type="radio" name="flavor" value="13"></td>
						<td>Vanilla<input type="radio" name="flavor" value="14"></td>
					</tr>
				</table>
			</div>
		</div>
		<div id="filling">
			<h2>Filling</h2>
			<div>
				<table>
					<tr>
						<td><img src="images/none.gif" alt="No img"/></td>
						<td><img src="images/blueberry.gif" alt="Blueberry img"/></td>
						<td><img src="images/chocolate_chip.gif" alt="chocolate chips img"/></td>
					</tr>
					<tr>
						<td>None<input type="radio" name="filling" value="0"></td>
						<td>Blueberries<input type="radio" name="filling" value="1"></td>
						<td>Chocolate Chips<input type="radio" name="filling" value="2"></td>
					</tr>
				</table>
			</div>
		</div>
		<div id="icing">
			<h2>Icing</h2>
			<div>
				<table>
					<tr>
						<td><img src="images/banana_pie_frosting.png" alt="Banana Pie icing img"/></td>
						<td><img src="images/blueberry_cheesecake_frosting.png" alt="blueberry cheesecake icing img"/></td>
						<td><img src="images/buttered_popcorn_frosting.png" alt="buttered popcorn icing img"/></td>
						<td><img src="images/caramel_mudslide_frosting.png" alt="caramel mudslide icing img"/></td>
						<td><img src="images/chai_latte_frosting.png" alt="Chai Latte icing img"/></td>
						<td><img src="images/chocolate_frosting.png" alt="Chocolate icing img"/></td>
						<td><img src="images/chocolate_hazelnut_frosting.png" alt="Chocolate Hazelnut icing img"/></td>
						<td><img src="images/chocolate_orange_frosting.png" alt="Chocolate Orange icing img"/></td>
						<td><img src="images/cinnamon_toast_frosting.png" alt="Cinnamon Toast icing img"/></td>
						<td><img src="images/cookie_dough_frosting.png" alt="Cookie dough icing img"/></td>
						<td><img src="images/creme_cheese_frosting.png" alt="Creme Cheese icing img"/></td>
						<td><img src="images/earl_grey_frosting.png" alt="Earl Grey icing img"/></td>
						<td><img src="images/honey_rosemary_frosting.png" alt="Honey Rosemary icing img"/></td>
						<td><img src="images/lavender_caramel_frosting.png" alt="Lavender Caramel icing img"/></td>
						<td><img src="images/lemon_frosting.png" alt="Lemon icing img"/></td>
						<td><img src="images/lemon_poppyseed_frosting.png" alt="Lemon Poppyseed img"/></td>
						<td><img src="images/raspberry_ripple_frosting.png" alt="Raspberry Ripple icing img"/></td>
						<td><img src="images/raspberry_white_chocolate_frosting.png" alt="Raspberry White chocolate icing img"/></td>
						<td><img src="images/salted_caramel_frosting.png" alt="Salted Caramel icing img"/></td>
						<td><img src="images/strawberries_creame_frosting.png" alt="Strawberries creame icing img"/></td>
						<td><img src="images/toffee_apple_frosting.png" alt="Toffee Apple icing img"/></td>
						<td><img src="images/vanilla_frosting.png" alt="Vanilla icing img"/></td>
						<td><img src="images/vegan_vanilla_frosting.png" alt="Vegan Vanilla icing img"/></td>
					</tr>
					<tr>
						<td>Banana Pie<input type="radio" name="icing" value="1"></td>
						<td>Blueberry Cheesecake<input type="radio" name="icing" value="2"></td>
						<td>Buttered Popcorn<input type="radio" name="icing" value="3"></td>
						<td>Caramel Mudslide<input type="radio" name="icing" value="4"></td>
						<td>Chai Latte<input type="radio" name="icing" value="5"></td>
						<td>Chocolate<input type="radio" name="icing" value="6"></td>
						<td>Chocolate Hazelnut<input type="radio" name="icing" value="7"></td>
						<td>Chocolate Orange<input type="radio" name="icing" value="8"></td>
						<td>Cinammon Toast<input type="radio" name="icing" value="9"></td>
						<td>Cookie Dough<input type="radio" name="icing" value="10"></td>
						<td>Creme Cheese<input type="radio" name="icing" value="11"></td>
						<td>Earl Grey<input type="radio" name="icing" value="12"></td>
						<td>Honey Rosemary<input type="radio" name="icing" value="13"></td>
						<td>Lavendar Caramel<input type="radio" name="icing" value="14"></td>
						<td>Lemon<input type="radio" name="icing" value="15"></td>
						<td>Lemon Poppyseed<input type="radio" name="icing" value="16"></td>
						<td>Raspberry Ripple<input type="radio" name="icing" value="17"></td>
						<td>Raspberry White Chocolate<input type="radio" name="icing" value="18"></td>
						<td>Salted Caramel<input type="radio" name="icing" value="19"></td>
						<td>Strawberry Creame<input type="radio" name="icing" value="20"></td>
						<td>Toffee Apple<input type="radio" name="icing" value="21"></td>
						<td>Vanilla<input type="radio" name="icing" value="22"></td>
						<td>Vegan Vanilla<input type="radio" name="icing" value="23"></td>
					</tr>
				</table>
			</div>
		</div>
		<div id="toppings">
			<h2>Toppings</h2>
			<div>
				<table>
					<tr>
						<td><input type="checkbox" name="toppings[]" value="1">Sprinkles</td>
						<td><input type="checkbox" name="toppings[]" value="2">Bacon</td>
						<td><input type="checkbox" name="toppings[]" value="3">M&Ms</td>
						<td><input type="checkbox" name="toppings[]" value="4">Reese's Pieces</td>
						<td><input type="checkbox" name="toppings[]" value="5">Skittles</td>
						<td><input type="checkbox" name="toppings[]" value="6">Mini Chocolate Chips</td>
						<td><input type="checkbox" name="toppings[]" value="7">Oreo Bits</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="toppings[]" value="8">Twix Bits</td>
						<td><input type="checkbox" name="toppings[]" value="9">Butterfinger Bits</td>
						<td><input type="checkbox" name="toppings[]" value="10">Snicker Bits</td>
						<td><input type="checkbox" name="toppings[]" value="11">Mini Marshemellows</td>
					</tr>
				</table>
			<input type="button" value="Clear All Toppings"/>
			</div>
		</div>
		<div id="cupcake">
			<input type="button" value="Reset Cupcake" />
                        <button type="submit" name="action" value="addtocart">Add to Order</button>
		</div>
		<div id="addFav">
                    Favorite name: <input type="text" name="favorite_name" />
                        <button type="submit" name="action" value="addtofavorites">Add to Favorites</button>
		</div>
		</form>
	</body>
</html>