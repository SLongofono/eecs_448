<?php

// Set currency units to dollars (Thanks w3schools!)
setlocale(LC_MONETARY, 'en_US');

// Cost values
$costs = array(10000.0, 25000.0, 32500.0, 50000.0, 30000.0, 45000.0);
$s1 = 0.0;
$s2 = 5.0;
$s3 = 50.0;
$ship_cost = 0;
$subt = 0.0;
$products = Array();
$colors = Array();

for($j=0; $j<6; $j++){
    $products[$j] = $_POST['quantity'.($j+1)];
    $colors[$j] = $_POST['product'.($j+1)];
}

echo '<!DOCTYPE html>';
echo "<head><link href='../css/style.css' type='text/css' rel='stylesheet'></link></head>";
echo "<body>";

// Frame table and display username, password per problem specs
echo "<div class='row'><div class='inner'>";
echo "<div class='receipt'>";
echo "<h1>Thank you for your business!</h1>";
echo "<h3>Your order details:</h3>";
echo "<p>Username:&nbsp&nbsp&nbsp&nbsp".$_POST['user']."<br>Password:&nbsp&nbsp&nbsp&nbsp".$_POST['pass']."</p>";
echo "<br><br><br><table>";
echo "<th></th><th>Quantity Ordered</th><th>Cost Per Item</th><th>Subtotal</th>";

// Build product rows
for($i = 0; $i < 6; $i++){
    $subt += (ceil($products[$i]) * $costs[$i]);
    echo "<tr>";
        echo "<td class='label'>";
            echo "Bridge ".($i+1).", painted ".$colors[$i];
        echo "</td>";
        echo "<td>";
            echo ceil($products[$i]);
        echo "</td>";
        echo "<td>";
            echo money_format('%(#10n', $costs[$i]);
        echo "</td>";
        echo "<td>";
            echo money_format('%(#10n', $subt);
        echo "</td>";
    echo "</tr>";
}

// Build subtotal rows

echo "<tr><td class='label'>Shipping Mode</td>";
if($_POST['shipping'] == 0){
    echo "<td colspan='2'>Free</td>";
}
else if($_POST['shipping'] == 1){
    echo "<td colspan='2'>Three Day</td>";
    $ship_cost = 5.;
}
else{
    echo "<td colspan='2'>Express Overnight</td>";
    $ship_cost = 50.;
}
echo "<td>";
    echo money_format('%(#10n', $ship_cost);
echo "</td>";
echo "</tr>";

// Build grand total
echo "<td colspan='3' class='label'>Grand Total</td><td>".money_format('%(#10n', ($subt + $ship_cost))."</td>";
// Wrap up

echo "</table><br><br><br>";

echo "<a href='../index.htm'>Home</a>";

echo "</div></div></div>";

echo "</body></html>";

?>
