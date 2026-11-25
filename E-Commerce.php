<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>E-Commerce</title>
	<style>
		body {
			background-color: white;
		}

		header {
			margin: 0;
			background-color: #780000;
			display: flex;
			justify-content: space-around;
			color: white;
			align-items: center;
			padding: 10px;
		}

		h1{
			font-family: system-ui;
		}

		a {
			font-family: Arial, sans-serif;
			text-decoration: none;
			color: white;
			font-size: 20px;
			margin-right: 10px;
			justify-content: center;
			align-items: center;
			margin-top: 5px;
		}

		a:hover {
			text-decoration: inline;
			color: black;
		}

		nav button {
            		padding: 8px 15px;
            		border: none;
            		border-radius: 5px;
            		cursor: pointer;
        	}

		.box {
			background-color: white;
           		border: 1px solid #dddddd;
            		border-radius: 15px;
			width: 25vw;
			height: 70vh;
            		text-align: center;
            		box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
			display:flex;
			align-items: center;
			flex-direction: column;
			justify-content: center;
			margin-right: 10px
		}

		.box:hover {
			transform: translateY(-2px);
			box-shadow: 0 7px 16px rgba (0, 0, 0, 0, 13);
		}

		img {
			width: 60%;
			height: 10%;
			border-radius: 10px;
			padding: 50px;
			display: flex;
		}

		.container {
      			display: flex;
			justify-content: center
			border: 1 px solid grey;
			border-radius: 10px
        	}


		.img-holder {
            		width: 100%;
            		height: 200px;
            		background-color: white;
            		border-radius: 10px;
            		display: flex;
            		justify-content: center;
            		align-items: center;
        	}

        	.img-holder img {
            		width: 100%;
            		height: 100%;
            		object-fit: contain; /* ginamit q to para yung image di ma-cut or distort kahit anong size ng container gamitin, magf-fit pa rin sya 					sa cotainer. pwede rin gumamit ng fill and cover sa object-fit pero di pwede yunng style n yunn sa design q*/
            		padding: 10px;
			grid-template-columns: repeat(2, minmax(0, 1fr));
        	}

        	.product-name {
            		font-size: 20px;
            		font-weight: bold;
            		margin-bottom: 8px;
        	}

        	.product-price {
            		color: #780000;
            		font-size: 18px;
            		font-weight: bold;
            		margin-bottom: 8px;
        	}

        	.product-stock {
            		color: #666666;
            		font-size: 14px;
            		margin-bottom: 15px;
        	}

        	.btn1 {
            		display: flex;
            		gap: 8px;
			width: 70%;
			height: 10%;
        	}

        	.btn1 button {
            		flex: 1;
            		padding: 3px;
            		border: 1px solid #780000;
            		border-radius: 10px;
            		background-color: white;
            		color: #780000;
            		cursor: pointer;
        	}

        	.btn1 button:last-child { /*style to sa last btn which is yung buy now, kaya last child kz sya yung last btn/code sa div para sa btn*/
            		background-color: #780000;
            		color: white;
        	}

        	.btn1 button:hover {
            		background-color: #a00000;
            		color: white;
        	}
	</style>

</head>

<body>
	<header>
		<h1>Lei Commerce</h1>
		<nav>
			<a href="#">Home</a>
			<a href="#">About</a>
			<a href="#">Product</a>
			<a href="#">Admin</a>
			<button>Sign In</button>
	</header>

	<?php
	include 'db.php';

	$sql = "SELECT * FROM product";
	$result = $conn->query($sql);
	?>

	<br>
	<div class="container">

		<?php
		if ($result && $result->num_rows > 0) {
			while ($product = $result->fetch_assoc()) {
		?>

				<div class="box">

					<div class="img-holder">
						<img src="image/<?php echo $product['img']; ?>" alt="product">
					</div>

				<div class="product-name">
					<?php echo htmlspecialchars($product['product_name']); ?>
				</div>

				<div class="product-price">
					$<?php echo number_format($product['price'], 2); ?>
				</div>

				<div class="product-stock">
					Stocks : <?php echo (int)$product['stock']; ?>
				</div>

				<div class="btn1">
					<button>Add to Cart</button>
					<button>Buy Now</button>
				</div>
			</div>
	<?php
		}
		} else {
			echo "<p> No Products Available. </p>";
		}
		$conn->close();
	?>
	</div>
	
	<br>
		<h2>Product Checkout</h2>
	
		<div class="p-container">

			<button>x</button>
			<div class="img-holder">
				<!--<img src="image/<?php echo $product['img']; ?>" alt="product">-->
					<img src="image">Product Image
			</div>

			<div class="product-name">
				<!--<?php echo htmlspecialchars($product['product_name']); ?>-->
					<h4>Product Name</h4>
			</div>

			<div class="product-price">
				<!--$<?php echo number_format($product['price'], 2); ?>-->
					<label>Price: ₱0.00</label>
			</div>

			<div class="product-stock">
				<!--Stocks : <?php echo (int)$product['stock']; ?>-->
					<label>Available Stocks: 0</label>
			</div>
		</div>

	<br>
	<form>
		<h2>Customer Information</h2>

		<div class="sub-container">
			<label>Full Name:</label>
			<input type="input" placeholder="Enter Your Full Name" type="text">
	<br>
	<br>
			<label>Delivery Address:</label>
			<textarea id="textArea" placeholder="Enter Your Complete Address" rows="5" cols="30"></textarea>
	<br>
	<br>
			<label>Contact Number:</label>
			<input type="input" placeholder="Enter Your Contact Number" type="text">
	<br>
	<br>
			<label>Quantity of Order:</label>
			<input type="number" required min="1" placeholder="1">
			<label>Minimum Order: 1</label>
	<br>
	<br>
			<label>Total Amount: ₱0.00</label>
	<br>
			<div class="btns">
				<button>Cancel</button>
				<button>Confirm Purchase</button>
			</div>
		</div>
	</form>
	
	

</body>
</html>