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
    
    <h3>Books Avaiable in the store are: </h3>
    
    
<table id= "books">

    <tr>
        <th>BookId</th>
        <th>Book_name</th>
        <th>Quantity</th>
    
    
    </tr>

<tbody>
        
<?php

session_start();

require('mysqli_connect.php'); 

$a = "SELECT * FROM BookInventory";
$b = @mysqli_query($dbc, $a); 

if ($b) { 

while ($row = mysqli_fetch_array($b, MYSQLI_ASSOC)) {
    $_SESSION['bookID'] = $row['bookID'];
    $_SESSION['book_name'] = $row['book_name'];
    $_SESSION['quantity'] = $row['quantity'];
    
    //echo "".$_SESSION['bookID']."".$_SESSION['book_name']."".$_SESSION['quantity']."<br>";
    
    ?>
    <tr>
            <td><?php echo "$_SESSION[bookID]" ?></td>
        <td> <a href="checkout.php"><?php echo "$_SESSION[book_name]" ?></a></td>
            <td><?php echo "$_SESSION[quantity]" ?></td>
        
        
        
        </tr>
 <?php 
}

mysqli_free_result($b); 
mysqli_close($dbc);
    
}

?>
        
    
    
</tbody>
    
    
</table>
    
    
</body>
    <footer style="text-align: center;background-color:transparent;color: black;font-size: 20px;font-weight: bold"><br>
    Chirag &copy 2020</footer>
</html>