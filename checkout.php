<?php

    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require('mysqli_connect.php');
        
    if(empty($_POST['first']) || empty($_POST['last']) ){     
          echo "First name or Last name cannot be empty";
            
        }
          else {

          $first = mysqli_real_escape_string($dbc, $_POST['first']);
          $last = mysqli_real_escape_string($dbc, $_POST['last']);
          $payment = mysqli_real_escape_string($dbc, $_POST['payment']);
            
          $sql="INSERT INTO orders (firstname, lastname, payment, bookID) VALUES ('$first', '$last', '$payment', '$_SESSION[bookID]')";

          $value = mysqli_query($dbc, $sql);
          $newQuantity = (int)$_SESSION['quantity'] - 1;
              
          $a1 = "UPDATE BookInventory SET quantity = $newQuantity WHERE bookID = {$_SESSION['bookID']}";
            $b = @mysqli_query($dbc, $a); 
            $b1 = @mysqli_query($dbc, $a1);

        }

            session_destroy();
            mysqli_close($dbc);
        
        
    
    
    }
    
    ?>





<!DOCTYPE html>
<html lang="en">
<head>
<title>Bookstore</title>
    <link href="CSS/style.css" rel="stylesheet" type="text/css" media="all">
</head>
    
<body>
    <header>Bookstore</header>
    
    
<ul>
  <li><a href="home.html">Home</a></li>
  <li><a href="order.php">Products</a></li>
</ul>
    <br><br>
    
    <form action="checkout.php" method="post">

	<fieldset><legend>Checkout form:</legend>

	<p><label>First Name: <input type="text" name="first" value=""></label></p>
	<p><label>Last Name:  <input type="text" name="last"></label></p>
    
        <label for="pay">Payment Method: </label>
<div>
<div>
  <input type="radio" id="credit" name="payment" value="creditcard">
  <label for="credit">Credit Card</label>
</div>
    <div>
  <input type="radio" id="master" name="payment" value="master">
  <label for="credit">Mastercard</label>
</div>
<div>
  <input type="radio" id="debit" name="payment" value="debitcard">
  
  <label for="debitcard">Debit Card</label>
</div>
</div>
    

	</fieldset>

	<p align="center"><input type="submit" name="submit" value="Submit"></p>

</form>

    
    
    
</body>
    <footer style="text-align: center;background-color:transparent;color: black;font-size: 20px;font-weight: bold"><br>
    Chirag &copy 2020</footer>
</html>
