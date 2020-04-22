<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Receipt</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <style type="text/css">
            body {
                background-color: lightcyan;
                font-family: 'Open Sans', sans-serif;
            }
        </style>
    </head>
    <body>
        <?php 
        
        $fullName = $_REQUEST['fullName'];
        $email = $_REQUEST['email'];
        $address = $_REQUEST['address'];
        
        $popcorn = $_REQUEST['popcorn'];
        $bread = $_REQUEST['bread'];
        $cheese = $_REQUEST['cheese'];
        $sprees = $_REQUEST['sprees'];
        $water = $_REQUEST['water'];
            
        $cardNumber = $_REQUEST['cardNumber'];
        
        echo "<h1>Receipt</h1>";
        
        $lastfour = substr($cardNumber, 12, 4);
        
        echo "Thanks " . $fullName . " for ordering! We have your address as " . $address . " and your credit card as " . "************$lastfour" . ".<br>";
        echo "Today is " . date("m/d/Y") . ".<br>";
        
        $subTotal = 0;
        $tax = .06;
        $taxTotal = 0;
        $tempPrice = 0;
        
        if ($popcorn > 0) {
            $tempPrice = (4*$popcorn);
            if ($popcorn == 1) {
                echo "<br> $popcorn Bag of Popcorn -- $ $tempPrice.00";
            } else {
                echo "<br> $popcorn Bags of Popcorn -- $ $tempPrice.00";
            }
            $subTotal += $tempPrice;
        }
        
        if ($bread > 0) {
            $tempPrice = (4*$bread);
            if ($bread == 1) {
                echo "<br> $bread Loaf of Bread -- $ $tempPrice.00";
            } else {
                echo "<br> $bread Loaves of Bread -- $ $tempPrice.00";
            }
            $subTotal += $tempPrice;
        }
        
        if ($cheese > 0) {
            $tempPrice = (6*$cheese);
            if ($cheese == 1) {
                echo "<br> $cheese Cheese Slice -- $ $tempPrice.00";
            } else {
                echo "<br> $cheese Cheese Slices -- $ $tempPrice.00";
            }
            $subTotal += $tempPrice;
        }
        
        if ($sprees > 0) {
            $tempPrice = (5*$sprees);
            if ($sprees == 1) {
                echo "<br> $sprees Bag of Sprees -- $ $tempPrice.00";
            } else {
                echo "<br> $sprees Bags of Sprees -- $ $tempPrice.00";
            }
            $subTotal += $tempPrice;
        }
        
        if ($water > 0) {
            $tempPrice = (2*$water);
            if ($water == 1) {
                echo "<br> $water Water Bottle -- $ $tempPrice.00";
            } else {
                echo "<br> $water Water Bottles -- $ $tempPrice.00";
            }
            $subTotal += $tempPrice;
        }
        
        setlocale(LC_MONETARY,"en_US");
        echo money_format("<br><br>Subtotal: $%i", $subTotal);
        
        $taxTotal = $subTotal*$tax;
        
        echo "<br>Tax: " . $taxTotal . " (6%)";
        
        
        $finalTotal = $subTotal + $taxTotal;
        
        echo "<br>FINAL TOTAL: " . money_format("$%i", $finalTotal);
        
        echo "<br><br>Thank you!"
        
        ?>
    </body>
</html>
    
    
    
    