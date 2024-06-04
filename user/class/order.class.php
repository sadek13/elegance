<?php require_once('DAL.class.php');



class Order extends DAL{
    

    public function insertOrder($userID,$firstName,$lastName,$mobile,$email,$city,$street,$building,$orderTotal){
        $sql = "INSERT INTO orders (user_ID, first_name, last_name, mobile, email, city, street, building, order_total) 
        VALUES ($userID, '$firstName', '$lastName', '$mobile', '$email', '$city', '$street', '$building', '$orderTotal')";

        return $this->execute($sql);
    }

    public function product_order($product_ID,$quantity,$price,$order_ID){
        $sql = "INSERT INTO product_order (product_ID, quantity, price, order_ID) 
        VALUES ($product_ID, '$quantity', '$price', $order_ID)";

        return $this->execute($sql);
    }
}