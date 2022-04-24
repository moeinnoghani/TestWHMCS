<?php
//
$products = $result['products']['product'];
//print json_encode($products);
//die;
//print $products[1]['pid'];

echo "
<br><br>
<form method='post' action='addonmodules.php?module=manage_pricing'>
  <label for=fname>Change Price in Currency format or %:</label>
  <input name=changePriceValue type=text id=fname style='width: 70px'>
  <input type=submit value=Submit style='margin-left: 10px'>
  <br><br>
  
<table id= myTable class= table style=font-size: larger>
    <thead class=table>
    <tr>
        <th>Product Id</th>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
        <th>Payment Type</th>
        <th>Finaincial Parameters</th>
        <th></th>
    </tr>
    </thead> ";
foreach ($products as $product) {
    echo "
    <tr>
    <td>{$product['pid']}</td>
    <td>{$product['name']}</td>
    <td>{$product['type']}</td>
    <td>{$product['description']}</td>
    <td>{$product['paytype']}</td>
   ";

    foreach ($product['pricing'] as $pricing => $pricingArray) {

        echo "<td>
              <ul style=list-style-type:none;> ";
        foreach ($pricingArray as $key => $val) {
            if ($val <= 0) {
                continue;
            }
            echo "<li><input type=text name='periods[]' readonly value='{$key}' style='width: fit-content'></li>";
        }
        echo "</ul></td>";

        echo "<td>
              <ul style=list-style-type:none;> ";
        foreach ($pricingArray as $key => $val) {
            if ($val <= 0) {
                continue;
            }
            echo "<li>{$val}</li>";
        }
        echo "</ul></td>";

        echo "<td>
              <ul style=list-style-type:none;> ";
        foreach ($pricingArray as $key => $val) {

            if ($val <= 0) {
                continue;
            }
            echo "<li><input type='checkbox' name='checkboxes[]' value={$product['pid']}.{$key}></li>";
        }
        echo "</ul></td>";

        echo "<td>";

        foreach ($pricingArray as $key => $val) {
            if ($val <= 0) {
                continue;
            }
            echo "<form class=navbar-form navbar-left role=search method=post action=addonmodules.php?module=manage_pricing>
  <ul style=list-style-type:none>
   <li>
    <select class=btn btn-default dropdown-toggle stylebackground: #b4dbed;font-size: 20px name=selectedTag id=inlineFormCustomSelect>
        <option class=none selected disabled>Select Currency</option>
      <option class=none value=$pricing> $pricing</option>
    </select>
      </li></ul>";
        };

        echo "</td>";

        echo "</tr>";
    }

}
echo "</table></form>";
