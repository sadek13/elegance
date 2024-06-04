<table border='1' id="ordersTable">
  
<?php foreach($allOrders as $sub){ 
  $items=$order->getProductsByOrderId($sub['order_ID'])?>

    <tr class="clickable" id="<?php echo $sub['order_ID'] ?>">
       
    <td class='bold'>Order No:<span class='details'><?php echo $sub['order_ID'] ?> <span></td>
<td class='bold'>Total:<span class='details'><?php echo $sub['order_total'] ?> <span> </td>
<td class='bold'>Status:<span class='details'><?php echo $sub['ordered_at'] ?> <span> </td>
    </tr>
    <tr class="hidden-row <?php echo $sub['order_ID'] ?>">
        <td>
          <ul><span class='italic'> Items:</span>
            <?php foreach($items as $item) { ?>
        <li>
        <span><?php echo $item['prod_title'] ?></span><span>(<?php echo $item['quantity'] ?>)</span><span>($ <?php echo $item['price'] ?>)</span>
            </li>  
            <?php } ?>
      </ul>
      </td>

      <td class='italic'>Driver:</td>
      <td class='italic'>Ordered_At:<span class='details'><?php echo $sub['ordered_at'] ?></span></td>
  

    </tr>


  <tr class="hidden-row <?php echo $sub['order_ID'] ?>">
      
      <td><h6>Recipient Details:</h6></td>

            </tr>

            <tr class="hidden-row <?php echo $sub['order_ID'] ?>">
      
      <td class='italic'>First Name:<span class='details'><?php echo $sub['first_name'] ?></span></td>
      <td class='italic'>Last Name:<span class='details'><?php echo $sub['last_name'] ?></span></td>
      <td class='italic'>Mobile Number:<span class='details'><?php echo $sub['mobile'] ?></span></td>

            </tr>

            <tr class="hidden-row <?php echo $sub['order_ID'] ?>">
      
      <td class='italic'>City:<span class='details'><?php echo $sub['city'] ?></span></td>
      <td class='italic'>Street:<span class='details'><?php echo $sub['street'] ?></span></td>
      <td class='italic'>Building & Floor:<span class='details'><?php echo $sub['building'] ?></span></td>
      
            </tr>

        

  
<?php } ?>

    <!-- Add more rows as needed -->
</table>
